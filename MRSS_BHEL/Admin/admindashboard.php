<?php
define('TITLE', 'Admin Dashboard');
define('PAGE', 'AdminDashboard');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

$sql = "SELECT COUNT(*) FROM submitmaintenancerequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];

$sql = "SELECT COUNT(*) FROM assignmaintenancework_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$assignedwork = $row[0];

$sql = "SELECT * FROM technicians_tb";
$result = $conn->query($sql);
$totaltech = $result->num_rows;

include('Includes/AdminHeader.php');
?>
            <!-- Starting Dashboard (2nd Column)-->
            <div class="col-sm-9 col-md-10 ml-sm-auto px-4">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Requests Received</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                                <a class="btn text-white" href="Request.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Assigned Work</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $assignedwork; ?></h4>
                                <a class="btn text-white" href="Work.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header">No. of Technicians</div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $totaltech; ?></h4>
                                <a class="btn text-white" href="Technician.php">View</a>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="mx-5 mt-5 text-center">
                <!--Table-->
                    <p class=" bg-dark text-white p-2">List of Requesters</p>
                    <?php
                    $sql = "SELECT * FROM plantworkerlogin_tb";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                         echo '<table class="table">
                         <thead>
                            <tr>
                                <th scope="col">Requester ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>';
                            while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                                echo '<td>'.$row["r_login_id"].'</td>';
                                echo '<td>'.$row["r_name"].'</td>';
                                echo '<td>'.$row["r_email"].'</td>';   
                            echo '</tr>';
                            }
                        echo '</tbody>
                    </table>';
                    } else{
                        echo "0 Result";
                    }
                    ?>
            </div>
            <!-- Ending Dashboard (2nd Column)-->

<?php
include('Includes/AdminFooter.php');
?>
