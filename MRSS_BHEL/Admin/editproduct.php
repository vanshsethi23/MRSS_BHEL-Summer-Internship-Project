<?php
define('TITLE', 'Edit Product');
define('PAGE', 'Assets');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}

// Update
if(isset($_REQUEST['pupdate'])) {
    // Checking for Empty Fields
    if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")) {
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert"> Fill All Fields!</div>';
    } 
    else {
      // Assigning User Values to Variable
      $pid = $_REQUEST['pid'];
      $pname = $_REQUEST['pname'];
      $pdop = $_REQUEST['pdop'];
      $pava = $_REQUEST['pava'];
      $ptotal = $_REQUEST['ptotal'];
      $poriginalcost = $_REQUEST['poriginalcost'];
      $psellingcost = $_REQUEST['psellingcost'];
      $sql = "UPDATE assets_tb SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginalcost = '$poriginalcost', psellingcost = '$psellingcost' WHERE pid = '$pid'";
        if($conn->query($sql) == TRUE) {
            // below msg display on form submit success
            $msg = '<div class="alert alert-success col-sm-6 mt-2" role="alert">Updated Successfully!</div>';
        } 
        else {
            // below msg display on form submit failed
            $msg = '<div class="alert alert-danger col-sm-6   mt-2" role="alert">Unable to Update!</div>';
        }
    }
}

include('Includes/AdminHeader.php');
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
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Update Product Details</h3>
        <?php
        if(isset($_REQUEST['edit'])) {
            $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        } 
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pid">Product ID</label>
                <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
            </div>
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>">
            </div>
            <div class="form-group">
                <label for="pdop">Date of Purchase</label>
                <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])) {echo $row['pdop']; }?>">
            </div>
            <div class="form-group">
                <label for="pava">Available</label>
                <input type="text" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="ptotal">Total</label>
                <input type="text" class="form-control" id="ptotal" name="ptotal" value="<?php if(isset($row['ptotal'])) {echo $row['ptotal']; }?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="poriginalcost">Original Cost Each</label>
                <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" value="<?php if(isset($row['poriginalcost'])) {echo $row['poriginalcost']; }?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="psellingcost">Selling Cost Each</label>
                <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>" onkeypress="isInputNumber(event)">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
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