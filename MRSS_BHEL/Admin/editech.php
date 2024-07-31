<?php
define('TITLE', 'Update Technicians');
define('PAGE', 'Technician');
include('../dbconnection.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
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
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Update Technician Details</h3>
        <br>
        <?php
        if (isset($_REQUEST['edit'])) {
            // Prepare and bind SQL statement to prevent SQL injection
            $sql = $conn->prepare("SELECT * FROM technicians_tb WHERE empid = ?");
            $sql->bind_param("i", $_REQUEST['id']);
            $sql->execute();
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            $sql->close();
        }

        if (isset($_REQUEST['requpdate'])) {
            // Check if all fields are filled
            if (empty($_REQUEST['empId']) || empty($_REQUEST['empName']) || empty($_REQUEST['empCity']) || empty($_REQUEST['empMobile']) || empty($_REQUEST['empEmail'])) {
                $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
            } else {
                // Retrieve and sanitize input
                $eId = $_REQUEST['empId'];
                $eName = htmlspecialchars($_REQUEST['empName']);
                $eCity = htmlspecialchars($_REQUEST['empCity']);
                $eMobile = htmlspecialchars($_REQUEST['empMobile']);
                $eEmail = htmlspecialchars($_REQUEST['empEmail']);

                // Prepare and bind update statement
                $sql = $conn->prepare("UPDATE technicians_tb SET empName = ?, empCity = ?, empMobile = ?, empEmail = ? WHERE empid = ?");
                $sql->bind_param("ssisi", $eName, $eCity, $eMobile, $eEmail, $eId);

                // Execute the query and check if update was successful
                if ($sql->execute()) {
                    $msg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
                } else {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to Update!</div>';
                }
                $sql->close();
            }
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="empId">Technician ID</label>
                <input type="text" class="form-control" id="empId" name="empId" value="<?php if (isset($row['empid'])) { echo htmlspecialchars($row['empid']); } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" class="form-control" id="empName" name="empName" value="<?php if (isset($row['empName'])) { echo htmlspecialchars($row['empName']); } ?>">
            </div>
            <div class="form-group">
                <label for="empCity">City</label>
                <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if (isset($row['empCity'])) { echo htmlspecialchars($row['empCity']); } ?>">
            </div>
            <div class="form-group">
                <label for="empMobile">Mobile</label>
                <input type="tel" class="form-control" id="empMobile" name="empMobile" value="<?php if (isset($row['empMobile'])) { echo htmlspecialchars($row['empMobile']); } ?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" class="form-control" id="empEmail" name="empEmail" value="<?php if (isset($row['empEmail'])) { echo htmlspecialchars($row['empEmail']); } ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
                <a href="Technician.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if (isset($msg)) { echo $msg; } ?>
        </form>  
    </div>
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
include('Includes/AdminFooter.php');
?>
