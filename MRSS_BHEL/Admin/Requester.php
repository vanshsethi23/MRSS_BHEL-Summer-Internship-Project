<?php
define('TITLE', 'Power Plant Workers');
define('PAGE', 'Requester');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

include('Includes/AdminHeader.php');
?>

<style>
.btn-info {
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}
</style>

<!-- Starting 2nd Column -->
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9 col-md-10 offset-md-2 text-center">
            <!--Table-->
            <p class="bg-dark text-white p-2">List of Requesters</p>
            <?php 
            $sql = "SELECT * FROM plantworkerlogin_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<div class="table-responsive">';
                    echo '<table class="table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th scope="col">Requester ID</th>';
                                echo '<th scope="col">Name</th>';
                                echo '<th scope="col">Email</th>';
                                echo '<th scope="col">Action</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                    echo '<td>'.$row["r_login_id"].'</td>';
                                    echo '<td>'.$row["r_name"].'</td>';
                                    echo '<td>'.$row["r_email"].'</td>';
                                    echo '<td>';
                                        echo '<form action="editreq.php" class="d-inline" method="POST">';
                                            echo '<input type="hidden" name="id" value='.$row["r_login_id"].'>';
                                            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">';
                                            echo '<i class="fas fa-pen"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                        echo '<form action="" method="POST" class="d-inline">';
                                            echo '<input type="hidden" name="id" value='.$row["r_login_id"].'>';
                                            echo '<button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete">';
                                            echo '<i class="fas fa-trash-alt"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning" role="alert">No requesters found.</div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
    if(isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM plantworkerlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        }
        else {
            echo "Unable to Delete Data!";
        }
    }
?>

    </div>
    <!-- Ending Row -->
    <div class="float-right" style="margin-bottom: 20px; margin-right: 10px">
    <a href="insertreq.php" class="btn btn-danger">
        <i class="fas fa-plus fa-2x"></i>
    </a>
    </div>
</div>
<!-- Ending Container -->
            
    <!-- Bootstrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>
