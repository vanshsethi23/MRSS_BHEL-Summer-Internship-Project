<?php
define('TITLE', 'Sell Report');
define('PAGE', 'SoldProductReport');
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
    .form-container {
        margin-left: 300px;
        margin-top: 20px;
    }

    .print-button-container {
        text-align: center;
        margin-top: 20px;
    }

    .print-button-container .btn {
        font-size: 1rem;
    }
    
</style>

<!-- Starting 2nd Column -->
<div class="col-sm-10 sellreport-area mt-5">
    <div class="form-container">
        <form action="" method="POST" class="d-print-none">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="startdate" name="startdate">
                </div> <span> to </span>
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="enddate" name="enddate">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
                </div>
            </div>
        </form>
        <?php
        if(isset($_REQUEST['searchsubmit'])) {
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            $sql = "SELECT * FROM powerplantcustomer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                echo '<p class="bg-dark text-white p-2 mt-4 text-center">Details of Power Plant Products Sold</p>
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price Each</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                        <th scope="row">'.$row["custid"].'</th>
                        <td>'.$row["custname"].'</td>
                        <td>'.$row["custadd"].'</td>
                        <td>'.$row["cpname"].'</td>
                        <td>'.$row["cpquantity"].'</td>
                        <td>'.$row["cpeach"].'</td>
                        <td>'.$row["cptotal"].'</td>
                        <td>'.$row["cpdate"].'</td>
                        </tr>';
                    }
                    echo '</tbody>
                </table>';
                
                // Print button outside the table
                echo '<div class="print-button-container d-print-none">
                    <button class="btn btn-danger btn-lg" onClick="window.print()">Print</button>
                </div>';
            } else {
                echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'>No Records Found!</div>";
            }
        }
        ?>
    </div>
</div>
<!-- Ending 2nd Column -->

<?php
include('Includes/AdminFooter.php');
?>
