<?php
define('TITLE', 'Technicians');
define('PAGE', 'Technician');
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
            <p class="bg-dark text-white p-2">List of Technicians</p>
            <?php 
            $sql = "SELECT * FROM technicians_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<div class="table-responsive">';
                    echo '<table class="table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th scope="col">Emp ID</th>';
                                echo '<th scope="col">Name</th>';
                                echo '<th scope="col">City</th>';
                                echo '<th scope="col">Mobile</th>';
                                echo '<th scope="col">Email</th>';
                                echo '<th scope="col">Action</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                    echo '<td>'.$row["empid"].'</td>';
                                    echo '<td>'.$row["empName"].'</td>';
                                    echo '<td>'.$row["empCity"].'</td>';
                                    echo '<td>'.$row["empMobile"].'</td>';
                                    echo '<td>'.$row["empEmail"].'</td>';
                                    echo '<td>';
                                        echo '<form action="editech.php" class="d-inline" method="POST">';
                                            echo '<input type="hidden" name="id" value='.$row["empid"].'>';
                                            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">';
                                            echo '<i class="fas fa-pen"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                        echo '<form action="" method="POST" class="d-inline">';
                                            echo '<input type="hidden" name="id" value='.$row["empid"].'>';
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
                echo '<div class="alert alert-warning" role="alert">No technicians found.</div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
    if(isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM technicians_tb WHERE empid = {$_REQUEST['id']}";
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
    <a href="insertech.php" class="btn btn-danger">
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
