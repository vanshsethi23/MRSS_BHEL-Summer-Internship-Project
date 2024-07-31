<?php
define('TITLE', 'Success');
include('../dbconnection.php');

session_start();
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='UserLogin.php'</script>";
}

$sql = "SELECT * FROM submitmaintenancerequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn -> query($sql);
if($result -> num_rows == 1) {
    $row = $result -> fetch_assoc();
    echo "
    <div class='container mt-1'>
        <div class='row justify-content-center align-items-center min-vh-100'>
            <div class='col-md-8'>
                <div class='card w-55 mx-auto'>
                    <div class='card-header bg-danger text-white'>
                        <h3 class='text-center'>Maintenance Request Details</h3>
                    </div>
                    <div class='card-body'>
                        <table class='table'>
                            <tbody>
                                <tr>
                                    <th>Request ID</th>
                                    <td>{$row['request_id']}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{$row['requester_name']}</td>
                                </tr>
                                <tr>
                                    <th>Email ID</th>
                                    <td>{$row['requester_email']}</td>
                                </tr>
                                <tr>
                                    <th>Request Info</th>
                                    <td>{$row['request_info']}</td>
                                </tr>
                                <tr>
                                    <th>Request Description</th>
                                    <td>{$row['request_desc']}</td>
                                </tr>
                                <tr>
                                    <td colspan='2' class='text-center'>
                                        <form class='d-print-none'>
                                            <input class='btn btn-danger' type='button' value='Print' onClick='window.print()'>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
} else {
    echo "<div class='alert alert-danger'>Failed to retrieve request details.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../CSS/custom.css">

    <title><?php echo TITLE ?></title>

    <style> 
    .navbar-brand img {
        height: 70px;
        width: auto;
        margin-top: 10px;
        margin-left: 20px;
    }

    .navbar-nav {
        margin-left: auto;
        margin-right: 20px;
    }

    .navbar-text {
        margin-right: auto;
        margin-left: 5px;
        font-size: 16px;
        background: linear-gradient(to right, #bfff00, #ffe7e7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        font-weight: bold;
        letter-spacing: 1px;
    }
    </style>
</head>
<body>
    <!-- Starting Navigation Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="UserProfile.php" class="navbar-brand"><img src="../Images/BHEL_logo.jpeg" alt="BHEL Logo"></a>
        <span class="navbar-text">Powering Progress, Brightening Lives</span>
    </nav>
</body>
</html>
