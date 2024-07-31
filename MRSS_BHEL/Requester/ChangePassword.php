<?php
define('TITLE', 'Change Password');
define('PAGE', 'ChangePassword');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='UserLogin.php'</script>";
}

$rEmail = $_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])) {
    if($_REQUEST['rPassword'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } else {
        $rPass = $_REQUEST['rPassword'];
        $sql = "UPDATE plantworkerlogin_tb SET r_password = '$rPass' WHERE r_email = '$rEmail'";
        if($conn -> query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to Update!</div>';
        }
    }
}

include('Includes/Header.php');
?>

<style>
    .form-container {
        margin-left: 550px;
        margin-top: 130px;
        max-width: 500px;
        width: 100%;
    }
</style>

<!-- Starting User Change Password Form: 2nd Column -->
<div class="col-sm-10 profile-area mt-5">
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inputnewpassword">New Password</label>
                <input type="password" class="form-control" name="rPassword" id="inputnewpassword">
            </div>
            <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <?php if(isset($passmsg)) {echo $passmsg;} ?>
        </form>
    </div>
</div>
<!-- Ending User Change Password Form: 2nd Column -->

<?php
include('Includes/Footer.php');
?>
