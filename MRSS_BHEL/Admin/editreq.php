<?php
define('TITLE', 'Update Power Plant Workers');
define('PAGE', 'Requester');
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
.btn-secondary {
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}
</style>

<!-- Starting 2nd Column -->
<div class="container mt-5 mr-5">
    <div class="col-sm-6 mx-auto jumbotron">
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Update Requester Details</h3>
        <br>
        <?php
        if (isset($_REQUEST['edit'])) {
            // Prepare and bind SQL statement to prevent SQL injection
            $sql = $conn->prepare("SELECT * FROM plantworkerlogin_tb WHERE r_login_id = ?");
            $sql->bind_param("i", $_REQUEST['id']);
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
        }

        if (isset($_REQUEST['requpdate'])) {
            // Check if all fields are filled
            if (empty($_REQUEST['r_login_id']) || empty($_REQUEST['r_name']) || empty($_REQUEST['r_email'])) {
                $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
            } else {
                // Retrieve and sanitize input
                $rid = $_REQUEST['r_login_id'];
                $rname = $_REQUEST['r_name'];
                $remail = $_REQUEST['r_email'];

                // Prepare and bind update statement
                $sql = $conn->prepare("UPDATE plantworkerlogin_tb SET r_name = ?, r_email = ? WHERE r_login_id = ?");
                $sql->bind_param("ssi", $rname, $remail, $rid);

                // Execute the query and check if update was successful
                if ($sql->execute()) {
                    $msg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
                } else {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to Update!</div>';
                }
            }
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="r_login_id">Requester ID</label>
                <input type="text" class="form-control" id="r_login_id" name="r_login_id" value="<?php if(isset($row['r_login_id'])) { echo htmlspecialchars($row['r_login_id']); } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="r_name">Name</label>
                <input type="text" class="form-control" id="r_name" name="r_name" value="<?php if(isset($row['r_name'])) { echo htmlspecialchars($row['r_name']); } ?>">
            </div>
            <div class="form-group">
                <label for="r_email">Email</label>
                <input type="email" class="form-control" id="r_email" name="r_email" value="<?php if(isset($row['r_email'])) { echo htmlspecialchars($row['r_email']); } ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
                <a href="Requester.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) {echo $msg; } ?>
        </form>  
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
include('Includes/AdminFooter.php');
?>
