<?php
define('TITLE', 'Work Order');
define('PAGE', 'WorkOrder');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}
include('Includes/AdminHeader.php');
?>

<!-- Starting 2nd Column -->
<div class="mt-5">
    <div class="row">
        <div class="col-sm-9 col-md-10 offset-md-2">
            <?php 
            $sql = "SELECT * FROM assignmaintenancework_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<div class="table-responsive">';
                    echo '<table class="table">';
                        echo '<thead>';            
                            echo '<tr>';            
                                echo '<th scope="col">Req ID</th>';            
                                echo '<th scope="col">Request Info</th>';            
                                echo '<th scope="col">Name</th>';            
                                echo '<th scope="col">Address</th>';            
                                echo '<th scope="col">City</th>';            
                                echo '<th scope="col">Mobile</th>';            
                                echo '<th scope="col">Technician</th>';            
                                echo '<th scope="col">Assigned Date</th>';            
                                echo '<th scope="col">Action</th>';                        
                            echo '</tr>';            
                        echo '</thead>';
                        echo '<tbody>';
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                    echo '<td>' .$row["request_id"].'</td>';
                                    echo '<td>' .$row["request_info"].'</td>';
                                    echo '<td>' .$row["requester_name"].'</td>';
                                    echo '<td>' .$row["requester_add2"].'</td>';
                                    echo '<td>' .$row["requester_city"].'</td>';
                                    echo '<td>' .$row["requester_mobile"].'</td>';
                                    echo '<td>' .$row["assign_tech"].'</td>';
                                    echo '<td>' .$row["assign_date"].'</td>';
                                    echo '<td>';
                                        echo '<div class="btn-group" role="group">';
                                            echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
                                                echo '<input type="hidden" name="id" value="' . $row["request_id"] . '">';
                                                echo '<button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button>';
                                            echo '</form>';
                                            echo '<form action="" method="POST" class="d-inline">';
                                                echo '<input type="hidden" name="id" value="' . $row["request_id"] . '">';
                                                echo '<button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
                                            echo '</form>';
                                        echo '</div>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';
            }
            else {
               echo '0 Result';
            }
            if(isset($_REQUEST['delete'])) {
                $sql = "DELETE FROM assignmaintenancework_tb WHERE request_id = {$_REQUEST['id']}"; 
                if($conn->query($sql) === TRUE) {
                    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
                }
                else {
                    echo "Unable to Delete Data";
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
include('Includes/AdminFooter.php');
?>
