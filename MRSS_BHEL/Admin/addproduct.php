<?php
define('TITLE', 'Add New Product');
define('PAGE', 'Assets');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

include('Includes/AdminHeader.php');

if(isset($_REQUEST['psubmit'])) { 
    // Checking for Empty Fields
    if(empty($_REQUEST['pname']) || empty($_REQUEST['pdop']) || empty($_REQUEST['pava']) || empty($_REQUEST['ptotal']) || empty($_REQUEST['poriginalcost']) || empty($_REQUEST['psellingcost'])) {
        // msg displayed if required field is missing
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } else {
        // Assigning User Values to Variable
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pava = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];

        // Using Prepared Statement to prevent SQL Injection
        $sql = $conn->prepare("INSERT INTO assets_tb (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters (assuming correct types)
        $sql->bind_param("sssidd", $pname, $pdop, $pava, $ptotal, $poriginalcost, $psellingcost);

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

<div class="container mt-5 mr-5">
    <div class="col-sm-6 mx-auto jumbotron">
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Add New Product</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname">
            </div>
            <div class="form-group">
                <label for="pdop">Date of Purchase</label>
                <input type="date" class="form-control" id="pdop" name="pdop">
            </div>
            <div class="form-group">
                <label for="pava">Available</label>
                <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="ptotal">Total</label>
                <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="poriginalcost">Original Cost Each</label>
                <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="psellingcost">Selling Cost Each</label>
                <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
                <a href="Assets.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) {echo $msg; } ?>
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