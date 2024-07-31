<?php
define('TITLE', 'Sell Product');
define('PAGE', 'Assets');
include('../dbconnection.php');

session_start();
if (!isset($_SESSION['is_adminlogin'])) {
    echo "<script> location.href='AdminLogin.php'</script>";
    exit();
}

$sql = "SELECT * FROM powerplantcustomer_tb WHERE custid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo '
    <div class="container mt-5 mr-5">
        <div class="col-sm-6 mx-auto jumbotron mt-5">
            <h3 class="text-center" style="font-weight: bold; font-family: Arial, sans-serif;">Customer Bill</h3>
            <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Customer ID</th>
                            <td>'.$row['custid'].'</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>'.$row['custname'].'</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>'.$row['custadd'].'</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>'.$row['cpname'].'</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>'.$row['cpquantity'].'</td>
                        </tr>
                        <tr>
                            <th>Price Each</th>
                            <td>'.$row['cpeach'].'</td>
                        </tr>
                        <tr>
                            <th>Total Cost</th>
                            <td>'.$row['cptotal'].'</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>'.$row['cpdate'].'</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <form class="d-inline d-print-none">
                                    <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                                </form>
                                <a href="Assets.php" class="btn btn-secondary d-inline ml-2 d-print-none">Close</a>
                            </td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>';
} else {
    echo "<div class='container mt-5'><p class='text-center'>Failed to retrieve data.</p></div>";
}

include('Includes/AdminHeader.php');
?>


<?php
include('Includes/AdminFooter.php');
?>