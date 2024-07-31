<?php
define('TITLE', 'Assets');
define('PAGE', 'Assets');
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

    .action-buttons {
        display: flex;
    }
</style>

<!-- Starting 2nd Column -->
<div class="mt-5">
    <div class="row">
        <div class="col-sm-9 col-md-10 offset-md-2">
            <!-- Table -->
            <p class="bg-dark text-white p-2 text-center">Power Plant Parts Details</p>
            <?php 
            $sql = "SELECT * FROM assets_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<div class="table-responsive">';
                    echo '<table class="table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th scope="col">Product ID</th>';
                                echo '<th scope="col">Name</th>';
                                echo '<th scope="col">D.O.P</th>';
                                echo '<th scope="col">Available</th>';
                                echo '<th scope="col">Total</th>';
                                echo '<th scope="col">Cost Price</th>';
                                echo '<th scope="col">Selling Price</th>';
                                echo '<th scope="col">Action</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                    echo '<td>'.$row["pid"].'</td>';
                                    echo '<td>'.$row["pname"].'</td>';
                                    echo '<td>'.$row["pdop"].'</td>';
                                    echo '<td>'.$row["pava"].'</td>';
                                    echo '<td>'.$row["ptotal"].'</td>';
                                    echo '<td>'.$row["poriginalcost"].'</td>';
                                    echo '<td>'.$row["psellingcost"].'</td>';
                                    echo '<td class="action-buttons">';
                                        echo '<form action="editproduct.php" method="POST">';
                                            echo '<input type="hidden" name="id" value="'.$row["pid"].'">';
                                            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">';
                                            echo '<i class="fas fa-pen"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                        echo '<form action="" method="POST">';
                                            echo '<input type="hidden" name="id" value="'.$row["pid"].'">';
                                            echo '<button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete">';
                                            echo '<i class="fas fa-trash-alt"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                        echo '<form action="sellproduct.php" method="POST">';
                                            echo '<input type="hidden" name="id" value="'.$row["pid"].'">';
                                            echo '<button type="submit" class="btn btn-warning mr-3" name="issue" value=Issue">';
                                            echo '<i class="fas fa-handshake"></i>';
                                            echo '</button>';
                                        echo '</form>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning" role="alert">No products found.</div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
    if(isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
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
    <a href="addproduct.php" class="btn btn-danger">
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
