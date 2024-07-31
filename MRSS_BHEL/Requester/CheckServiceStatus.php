<?php
define('TITLE', 'Service Status');
define('PAGE', 'CheckServiceStatus');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='UserLogin.php'</script>";
}
include('Includes/Header.php');
?>

<style>
    .form-container {
    margin-top: 100px; 
    padding-top: 40px; 
}
</style>

<!-- Starting 2nd Column -->
<div class="col-sm-8 offset-sm-2 mt-5 form-container">
    <form action="" class="mt-3 form-inline d-print-none" method="post">
        <div class="form-group mr-3">
            <label for="checkid">Enter Request ID: </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
    <?php
    if(isset($_REQUEST['checkid'])) {
        if($_REQUEST['checkid'] == "") {
            $msg = '<div class="alert alert-warning mt-4" role="alert">Fill all Fields!</div>';
        }
        else {
            $sql = "SELECT * FROM assignmaintenancework_tb WHERE request_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['request_id'] == $_REQUEST['checkid'])) { ?>
            <h3 class="text-center mt-5">Assigned Work Details</h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Request ID</td>
                        <td>
                            <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Request Info</td>
                        <td>
                            <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Request Description</td>
                        <td>
                            <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Requester Name</td>
                        <td>
                            <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Address Line 1</td>
                        <td>
                            <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Adress Line 2</td>
                        <td>
                            <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>
                            <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>
                            <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pin Code</td>
                        <td>
                            <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Assigned Date</td>
                        <td>
                            <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Technician Name</td>
                        <td>
                            <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?>
                        </td>
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
                <form class="d-print-none d-inline mr-3">
                    <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                    <input class="btn btn-secondary" type="submit" value="Close">
                </form>
            </div>
            <?php }
            else {
                echo '<div class="alert alert-info mt-4" role="alert">Your Request is Still Pending!</div>';
            }
        }
    } 
    ?>
    <?php if(isset($msg)) {echo $msg;} ?>
</div> 
<!-- Ending 2nd Column -->

<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php
include('Includes/Footer.php');
?>
