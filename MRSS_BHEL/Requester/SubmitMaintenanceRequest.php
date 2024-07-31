<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitMaintenanceRequest');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='UserLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])) {
    // Checking for empty fields
    if(($_REQUEST['requestinfo'] == "") || 
    ($_REQUEST['requestdesc'] == "") || 
    ($_REQUEST['requestername'] == "") || 
    ($_REQUEST['requesteradd1'] == "") || 
    ($_REQUEST['requesteradd2'] == "") || 
    ($_REQUEST['requestercity'] == "") || 
    ($_REQUEST['requesterstate'] == "") || 
    ($_REQUEST['requesterzip'] == "") || 
    ($_REQUEST['requesteremail'] == "") || 
    ($_REQUEST['requestermobile'] == "") || 
    ($_REQUEST['requestdate'] == "")) {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> Fill All Fields!</div>";
    } 
    else {
        // Assigning User Values to Variables and Sanitizing Input
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requestdate'];
        $sql = "INSERT INTO submitmaintenancerequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
        // below msg display on form submit success
        if($conn -> query($sql) == TRUE) {
            $genid = mysqli_insert_id($conn);
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Request Submitted Successfully!</div>";
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='SubmitRequest_Success.php'</script>";
        }
        else {
            // below msg display on form submit failed
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Submit your Request!</div>";
        }
    }
}

include('Includes/Header.php');
?>


<style>
    .form-container {
        margin-left: 300px;
        margin-top: 130px;
        max-width: 1070px;
        width: 100%;
    }
</style>

<!-- Starting Maintenance Request Form: 2nd Column -->
<div class="container-fluid" style="margin-top: 80px;">
    <div class="col-sm-9 col-md-10 mt-5">
        <div class="form-container">
            <form class="mx-5" action="" method="POST">
                <div class="form-group">
                    <label for="inputRequestInfo">Maintenance Request Info</label>
                    <input type="text" class="form-control" id="inputRequestInfo" placeholder="Enter Maintenance Request Info" name="requestinfo">
                </div>
                <div class="form-group">
                    <label for="inputRequestDescription">Description</label>
                    <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write a brief Description" name="requestdesc">
                </div>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Enter your Name" name="requestername">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Address Line 1</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Enter power plant address" name="requesteradd1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Address Line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter power plant address" name="requesteradd2">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Enter city" name="requestercity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" class="form-control" id="inputState" placeholder="Enter state" name="requesterstate">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="Enter Zipcode" name="requesterzip" onkeypress="isInputNumber(event)">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email" name="requesteremail">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputMobile">Mobile</label>
                        <input type="text" class="form-control" id="inputMobile" name="requestermobile" placeholder="Enter your mobile" onkeypress="isInputNumber(event)">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputDate">Date</label>
                        <input type="date" class="form-control" id="inputDate" name="requestdate">
                    </div>
                </div>

                <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
            <!-- below msg display if required fill missing or form submitted success or failed -->
            <?php if(isset($msg)) {echo $msg;}?>
        </div>
    </div>
</div>
<!-- Ending Maintenance Request Form: 2nd Column -->

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
