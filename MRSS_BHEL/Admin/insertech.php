<?php
define('TITLE', 'Insert Technicians');
define('PAGE', 'Technician');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

include('Includes/AdminHeader.php');

if(isset($_REQUEST['empsubmit'])) { 
    // Checking for Empty Fields
    if(empty($_REQUEST['empName']) || empty($_REQUEST['empCity']) || empty($_REQUEST['empMobile']) || empty($_REQUEST['empEmail'])) {
        // msg displayed if required field is missing
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } else {
        // Assigning User Values to Variable
        $eName = $_REQUEST['empName'];
        $eCity = $_REQUEST['empCity'];
        $eMobile = $_REQUEST['empMobile'];
        $eEmail = $_REQUEST['empEmail'];

        // Using Prepared Statement to prevent SQL Injection
        $sql = $conn->prepare("INSERT INTO technicians_tb (empName, empCity, empMobile, empEmail) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $eName, $eCity, $eMobile, $eEmail);

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
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Add New Technicians</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" class="form-control" id="empName" name="empName">
            </div>
            <div class="form-group">
                <label for="empCity">City</label>
                <input type="text" class="form-control" id="empCity" name="empCity">
            </div>
            <div class="form-group">
                <label for="empMobile">Mobile</label>
                <input type="tel" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" class="form-control" id="empEmail" name="empEmail">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
                <a href="Technician.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) { echo $msg; } ?>
        </form>  
    </div>
</div>

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
