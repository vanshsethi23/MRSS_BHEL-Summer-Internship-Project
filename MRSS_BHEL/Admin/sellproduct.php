<?php
define('TITLE', 'Sell Product');
define('PAGE', 'Assets');
include('../dbconnection.php');

session_start();
if (!isset($_SESSION['is_adminlogin'])) {
    echo "<script> location.href='AdminLogin.php'</script>";
    exit();
}

if (isset($_REQUEST['psubmit'])) {
    // Checking for Empty Fields
    if (empty($_REQUEST['cname']) || empty($_REQUEST['cadd']) || empty($_REQUEST['pname']) || empty($_REQUEST['pquantity']) || empty($_REQUEST['psellingcost']) || empty($_REQUEST['totalcost']) || empty($_REQUEST['selldate'])) {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields!</div>';
    } elseif (!is_numeric($_REQUEST['pquantity']) || !is_numeric($_REQUEST['psellingcost']) || !is_numeric($_REQUEST['totalcost'])) {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Quantity, Selling Price, and Total Cost must be numeric!</div>';
    } else {
        $pid = $_REQUEST['pid'];
        $pava = ($_REQUEST['pava'] - $_REQUEST['pquantity']);

        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cpeach = $_REQUEST['psellingcost'];
        $cptotal = $_REQUEST['totalcost'];
        $cpdate = $_REQUEST['selldate'];

        // Using Prepared Statements to Prevent SQL Injection
        $stmt = $conn->prepare("INSERT INTO powerplantcustomer_tb (custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiiss", $custname, $custadd, $cpname, $cpquantity, $cpeach, $cptotal, $cpdate);

        if ($stmt->execute()) {
            $genid = $stmt->insert_id;
            $_SESSION['myid'] = $genid;
            // Update the stock quantity after inserting the record
            $stmt = $conn->prepare("UPDATE assets_tb SET pava = ? WHERE pid = ?");
            $stmt->bind_param("ii", $pava, $pid);
            $stmt->execute();

            echo "<script> location.href='productsellsuccess.php'; </script>";
            exit();
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Failed to process the sale!</div>';
        }
        $stmt->close();
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
        <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Customer Bill</h3>
        <?php
        if (isset($_REQUEST['issue'])) {
            $stmt = $conn->prepare("SELECT * FROM assets_tb WHERE pid = ?");
            $stmt->bind_param("i", $_REQUEST['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
        } 
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pid">Product ID</label>
                <input type="text" class="form-control" id="pid" name="pid" value="<?php echo isset($row['pid']) ? $row['pid'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cname">Customer Name</label>
                <input type="text" class="form-control" id="cname" name="cname">
            </div>
            <div class="form-group">
                <label for="cadd">Customer Address</label>
                <input type="text" class="form-control" id="cadd" name="cadd">
            </div>
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname" value="<?php echo isset($row['pname']) ? $row['pname'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="pava">Available</label>
                <input type="text" class="form-control" id="pava" name="pava" value="<?php echo isset($row['pava']) ? $row['pava'] : ''; ?>" onkeypress="isInputNumber(event)" readonly>
            </div>
            <div class="form-group">
                <label for="pquantity">Quantity</label>
                <input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="psellingcost">Selling Price</label>
                <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php echo isset($row['psellingcost']) ? $row['psellingcost'] : ''; ?>" onkeypress="isInputNumber(event)" readonly>
            </div>
            <div class="form-group">
                <label for="totalcost">Total Price</label>
                <input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="selldate">Date</label>
                <input type="date" class="form-control" id="selldate" name="selldate">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
                <a href="Assets.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if (isset($msg)) { echo $msg; } ?>
        </form>
    </div>
</div>

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
