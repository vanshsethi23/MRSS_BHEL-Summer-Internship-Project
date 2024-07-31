<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])) {
    if(isset($_REQUEST['rEmail'])) {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
        $sql = "SELECT r_email, r_password FROM plantworkerlogin_tb WHERE r_email = '".$rEmail."' AND r_password = '".$rPassword."' limit 1";
        $result = $conn -> query($sql);
        if($result -> num_rows == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script> location.href='UserProfile.php'</script>";
            exit;
        }
        else {
            $msg = '<div class = "alert alert-warning mt-2">Enter Valid Email and Password</div>';
        }
    }
}
else {
    echo "<script> location.href='UserProfile.php'</script>";
    exit;
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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../CSS/custom.css">

    <title>User Login</title>
</head>
<body class="login-page">
    <div class="background-wrapper">
        <div class="container pt-5" id="login">
            <div class="text-center mb-4">
                <i class="fas fa-screwdriver fa-4x mb-3 text-primary"></i>
                <h2 class="text-center font-weight-bold" style="color: yellow;">Maintenance Request And Scheduling System</h2>
                <p class="text-center" style="font-size:30px; color: #f8f9fa; font-family: 'Ubuntu', sans-serif;"><i class="fas fa-user-secret text-white" style="font-size:30px;"></i> User Login Area
                </p>
            </div>
            <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <label for="email" class="font-weight-bold pl-2">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="rEmail" required>
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-key"></i>
                                <label for="pass" class="font-weight-bold pl-2">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                            </div>
                            <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold">Login</button>
                            <?php if(isset($msg)) {echo $msg;} ?>
                            <em style="font-size:10px;">Note - By clicking Login, you agree to our Terms, Data Policy, and Cookie Policy</em>
                        </form>
                        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    <!-- Bootstrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>
