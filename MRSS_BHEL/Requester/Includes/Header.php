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

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 80px; 
            left: 0;
            width: 300px;
            overflow-x: hidden;
            transition: all 0.3s;
            padding-top: 20px;
            z-index: 1000; 
            background-color: #f8f9fa; 
        }


        .sidebar .nav-link {
            font-size: 16px;
            font-weight: medium;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #f8f9fa;
            color: #0056b3;
            text-decoration: none;
        }

        .sidebar .nav-item {
            margin-bottom: 10px;
        }

        .active {
        background-color: #8DC28E; 
        color: navyblue !important;   
        border-radius: 3px;        
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        padding: 10px;             
        transition: background-color 0.3s ease, color 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Starting Navigation Bar -->
    <!-- Top Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="UserProfile.php" class="navbar-brand"><img src="../Images/BHEL_logo.jpeg" alt="BHEL Logo"></a>
        <span class="navbar-text">Powering Progress, Brightening Lives</span>
    </nav>
        
    <!-- Starting Container -->
    <div class="container-fluid" style="margin-top: 80px;">
        <!-- Starting Row -->
        <div class="row">
            <!-- Starting Side Bar (1st Column)-->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'UserProfile') {echo 'active';} ?>" href="UserProfile.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'SubmitMaintenanceRequest') {echo 'active';} ?>" href="SubmitMaintenanceRequest.php"><i class="fab fa-accessible-icon"></i> Submit Request</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'CheckServiceStatus') {echo 'active';} ?>" href="CheckServiceStatus.php"><i class="fas fa-tasks"></i> Service Status</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'ChangePassword') {echo 'active';} ?>" href="ChangePassword.php"><i class="fas fa-key"></i> Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </nav>
            <!-- Ending Side Bar (1st Column)-->
        </div>
        <!-- Ending Row -->
    </div>
    <!-- Ending Container -->

    <!-- Bootstrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>