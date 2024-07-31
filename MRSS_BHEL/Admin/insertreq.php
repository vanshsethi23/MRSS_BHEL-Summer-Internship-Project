<?php
define('TITLE', 'Insert Power Plant Workers');
define('PAGE', 'Requester');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

include('Includes/AdminHeader.php');

if(isset($_REQUEST['requpdate'])) { 
    // Checking for Empty Fields
    if(empty($_REQUEST['r_name']) || empty($_REQUEST['r_email']) || empty($_REQUEST['r_password'])) {
        // msg displayed if required field is missing
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } else {
        // Assigning User Values to Variable
        $rname = $_REQUEST['r_name'];
        $rEmail = $_REQUEST['r_email'];
        $rPassword = ($_REQUEST['r_password']);

        // Using Prepared Statement to prevent SQL Injection
        $sql = $conn->prepare("INSERT INTO plantworkerlogin_tb (r_name, r_email, r_password) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $rname, $rEmail, $rPassword);

        if($sql->execute()) {
            // Below msg display on form submit success
            $msg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Added Successfully!</div>';
        } else {
            // Below msg display on form submit failure
            $msg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to Add Data!</div>';
        }

        $sql->close();  // Close the prepared statement
    }
}
?>

<style>
.btn-secondary {
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.jumbotron {
    padding: 2rem 1rem;
    margin-top: 2rem;
}

.alert {
    margin-top: 1rem;
}
</style>

<!-- Starting 2nd Column -->
<div class="container mt-5 mr-5">
    <div class="col-sm-6 mx-auto jumbotron">
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Add New Plant Worker</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="r_name">Name</label>
                <input type="text" class="form-control" id="r_name" name="r_name">
            </div>
            <div class="form-group">
                <label for="r_email">Email</label>
                <input type="email" class="form-control" id="r_email" name="r_email">
            </div>
            <div class="form-group">
                <label for="r_password">Password</label>
                <input type="password" class="form-control" id="r_password" name="r_password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Submit</button>
                <a href="Requester.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) { echo $msg; } ?>
        </form>  
    </div>
</div>

<?php
include('Includes/AdminFooter.php');
?>
