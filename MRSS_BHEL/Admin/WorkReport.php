<?php
define('TITLE', 'Work Report');
define('PAGE', 'WorkReport');
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
    .form-container {
        margin-left: 300px;
        margin-top: 20px;
    }

    .print-button-container {
        text-align: center;
        margin-top: 20px;
    }

    .print-button-container .btn {
        font-size: 1rem;
    }
    
</style>

<!-- Starting 2nd Column -->
<div class="col-sm-10 workreport-area mt-5">
    <div class="form-container">
        <form action="" method="POST" class="d-print-none">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="startdate" name="startdate">
                </div> <span> to </span>
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="enddate" name="enddate">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
                </div>
            </div>
        </form>
        <?php
        if(isset($_REQUEST['searchsubmit'])) {
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            $sql = "SELECT * FROM assignmaintenancework_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<p class="bg-dark text-white p-2 mt-4 text-center">Details of Assigned Work in Power Plants</p>
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Request ID</th>
                            <th scope="col">Request Info.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Technician</th>
                            <th scope="col">Assigned Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                        <th scope="row">'.$row["request_id"].'</th>
                        <td>'.$row["request_info"].'</td>
                        <td>'.$row["requester_name"].'</td>
                        <td>'.$row["requester_add2"].'</td>
                        <td>'.$row["requester_city"].'</td>
                        <td>'.$row["requester_mobile"].'</td>
                        <td>'.$row["assign_tech"].'</td>
                        <td>'.$row["assign_date"].'</td>
                        </tr>';
                    }
                    echo '</tbody>
                </table>';
                
                // Print button outside the table
                echo '<div class="print-button-container d-print-none">
                    <button class="btn btn-danger btn-lg" onClick="window.print()">Print</button>
                </div>';
            } else {
                echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'>No Records Found!</div>";
            }
        }
        ?>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
include('Includes/AdminFooter.php');
?>
