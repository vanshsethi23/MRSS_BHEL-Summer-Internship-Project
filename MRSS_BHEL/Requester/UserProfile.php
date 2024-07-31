<?php
define('TITLE', 'User Profile');
define('PAGE', 'UserProfile');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='UserLogin.php'</script>";
}

$sql = "SELECT r_name, r_email FROM plantworkerlogin_tb WHERE r_email = '$rEmail'";
$result = $conn -> query($sql);
if($result -> num_rows == 1) {
    $row = $result -> fetch_assoc();
    $rName = $row['r_name'];
}

if(isset($_REQUEST['nameupdate'])) {
    if($_REQUEST['rName'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    }
    else {
        $rName = $_REQUEST['rName'];
        $sql = "UPDATE plantworkerlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
        if($conn -> query($sql) == TRUE) {
            $passmsg = '<div class = "alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
        }
        else {
            $passmsg = '<div class = "alert alert-danger col-sm-6 mt-2" role="alert">Unable to Update!</div>';
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
            
<!-- Start Profile Area (2nd Column) -->
<div class="col-sm-10 profile-area mt-5">
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="rEmail">Email</label>
                <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="rName">Name</label>
                <input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName?>">
            </div>
            <button type="submit" class="btn btn-danger" name="nameupdate">Update</button> 
            <?php if(isset($passmsg)) {echo $passmsg;} ?>
        </form>
    </div>
</div>
<!-- End Profile Area (2nd Column) -->

<?php
include('Includes/Footer.php');
?>