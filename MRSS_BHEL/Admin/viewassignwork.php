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
<div class="col-sm-8 offset-sm-2 mt-5 form-container">
    <h3 class="text-center">Assigned Work Details</h3>
    <?php
    if(isset($_REQUEST['view'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM assignmaintenancework_tb WHERE request_id = '$id'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Request ID</td>
                        <td><?php echo $row['request_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Request Info</td>
                        <td><?php echo $row['request_info']; ?></td>
                    </tr>
                    <tr>
                        <td>Request Description</td>
                        <td><?php echo $row['request_desc']; ?></td>
                    </tr>
                    <tr>
                        <td>Requester Name</td>
                        <td><?php echo $row['requester_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Address Line 1</td>
                        <td><?php echo $row['requester_add1']; ?></td>
                    </tr>
                    <tr>
                        <td>Address Line 2</td>
                        <td><?php echo $row['requester_add2']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $row['requester_city']; ?></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><?php echo $row['requester_state']; ?></td>
                    </tr>
                    <tr>
                        <td>Pin Code</td>
                        <td><?php echo $row['requester_zip']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row['requester_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><?php echo $row['requester_mobile']; ?></td>
                    </tr>
                    <tr>
                        <td>Assigned Date</td>
                        <td><?php echo $row['assign_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Technician Name</td>
                        <td><?php echo $row['assign_tech']; ?></td>
                    </tr>
                    <tr>
                        <td>Customer Sign</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Technician Sign</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <form action="" class="d-print-none d-inline">
                    <input class="btn btn-danger mr-3" type="button" value="Print" onClick="window.print()">
                </form>
                <form action="Work.php" method="get" class="d-print-none d-inline">
                    <button class="btn btn-secondary" type="submit">Close</button>
                </form>
            </div>
    <?php
        }
    }
    ?>
</div>
<!-- Ending 2nd Column -->

<?php
include('Includes/AdminFooter.php');
?>
