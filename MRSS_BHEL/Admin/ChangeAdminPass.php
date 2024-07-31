<?php
define('TITLE', 'Change Password');
define('PAGE', 'ChangePassword');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}

$aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['passupdate'])) {
    if($_REQUEST['aPassword'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } else {
        $aPass = $_REQUEST['aPassword'];
        $sql = "UPDATE adminlogin_tb SET a_password = '$aPass' WHERE a_email = '$aEmail'";
        if($conn -> query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to Update!</div>';
        }
    }
}

include('Includes/AdminHeader.php');
?>

<style>
    .form-container {
        margin-left: 550px;
        margin-top: 10px;
        max-width: 500px;
        width: 100%;
    }
</style>

<!-- Starting Admin Change Password Form: 2nd Column -->
<div class="col-sm-10 profile-area mt-5">
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputnewpassword">New Password</label>
                <input type="password" class="form-control" name="aPassword" id="inputnewpassword">
            </div>
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <?php if(isset($passmsg)) {echo $passmsg;} ?>
        </form>
    </div>
</div>
<!-- Ending Admin Change Password Form: 2nd Column -->

<?php
include('Includes/Footer.php');
?>
