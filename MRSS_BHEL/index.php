<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/custom.css">

    <title>MRSS_BHEL</title>
</head>
<body>
    <!-- Starting Navigation Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand"><img src="Images/BHEL_logo.jpeg" alt="BHEL Logo"></a>
        <span class="navbar-text">Powering Progress, Brightening Lives</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/UserLogin.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- Ending Navigation Bar -->

    <!-- Start Header Jumbotron-->
    <header class="jumbotron back-image" style="background-image: url(Images/Banner1.jpeg);">
        <div class="myclass mainHeading text-center">
            <h1 class="text-uppercase text-yellow text-shadow font-weight-bold">Maintenance Request and Scheduling System</h1>
            <p class="font-italic">Empowering Efficient Power Plant Operations</p>
            <a href="Requester/UserLogin.php" class="btn btn-success btn-custom">Login</a>
            <a href="#registration" class="btn btn-danger btn-custom">Sign Up</a>
        </div>
    </header> 
    <!-- End Header Jumbotron -->

    <!-- About MRSS Section -->
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <h3 class="text-center mb-4">About MRSS</h3>
                            <p class="text-justify">
                                Welcome to the Maintenance Request and Scheduling System (MRSS) of Bharat Heavy Electricals Ltd. (BHEL). Our system is designed to streamline the management of maintenance requests and scheduling for power plant equipments, ensuring smooth operations and minimal downtime.
                                For administrators, MRSS provides robust tools to oversee and manage maintenance tasks effectively. They can review and approve requests, assign tasks to technicians, and monitor progress in real-time. Comprehensive reporting features offer valuable insights for informed decision-making and process optimization.
                                Users benefit from a user-friendly interface to submit maintenance requests effortlessly. They can track request status, receive updates, and provide feedback, enhancing communication and accountability across the maintenance lifecycle.
                                With MRSS, BHEL continues its commitment to powering progress and improving lives by maintaining the reliability and efficiency of critical power plant equipment. Join us in advancing operational excellence with MRSS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About MRSS Section -->

    <!-- Start Service Section -->
    <div class="container-fluid py-5 service-section" id="Services">
        <div class="container text-center border-bottom">
            <h2>Power Plant Services</h2>
            <div class="row mt-4">
                <div class="col-sm-4 mb-4">
                    <div class="card service-card">
                        <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                        <h4 class="mt-4">Remote Monitoring and Control</h4>
                    </div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="card service-card">
                        <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                        <h4 class="mt-4">Preventive Maintenance</h4>
                    </div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="card service-card">
                        <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                        <h4 class="mt-4">Fault Repair</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Registration Form -->
    <?php include('userregistration.php')?>
    <!-- End Registration Form -->

    <!-- How the platform works starts-->
    <div class="jumbotron bg-danger" id="Howitworks">
        <div class="container">
            <h2 class="text-center text-white">How It Works</h2>
            <div class="row mt-5">
                <!-- Starting First Column -->
                <div class="col-lg-3 col-sm-6"> 
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="https://cdn.pixabay.com/photo/2015/11/03/08/46/number-1019717_1280.jpg" class="img-fluid" style="border-radius: 100px;" alt="step1">
                            <h4 class="card-title">Submit Request</h4>
                            <p class="card-text">Power Plant workers submit a maintenance request via the MRSS portal of BHEL.</p>
                        </div>
                    </div>
                </div>
                <!-- Ending First Column -->
                <!-- Starting Second Column -->
                <div class="col-lg-3 col-sm-6"> 
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="https://cdn.pixabay.com/photo/2015/11/03/08/47/number-1019719_1280.jpg" class="img-fluid" style="border-radius: 100px;" alt="step2">
                            <h4 class="card-title">Schedule Maintenance</h4>
                            <p class="card-text">The system schedules maintenance based on availability.</p>
                        </div>
                    </div>
                </div>
                <!-- Ending Second Column -->
                <!-- Starting Third Column -->
                <div class="col-lg-3 col-sm-6"> 
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="https://cdn.pixabay.com/photo/2015/11/03/08/47/number-1019720_1280.jpg" class="img-fluid" style="border-radius: 100px;" alt="step3">
                            <h4 class="card-title">Maintenance Execution</h4>
                            <p class="card-text">Technicians carry out the maintenance as per the schedule.</p>
                        </div>
                    </div>
                </div>
                <!-- Ending Third Column -->
                <!-- Starting Fouth Column -->
                <div class="col-lg-3 col-sm-6"> 
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="https://cdn.pixabay.com/photo/2015/11/03/08/47/number-1019721_1280.jpg" class="img-fluid" style="border-radius: 100px;" alt="step4">
                            <h4 class="card-title">Confirmation & Feedback</h4>
                            <p class="card-text">Confirmation is received and feedback is provided.</p>
                        </div>
                    </div>
                </div>
                <!-- Ending Fourth Column -->
            </div>      
        </div>
    </div>
    <!-- How the platform works ends -->

    <!-- Start Contact Us -->
    <div class="container" id="Contact">
        <h2 class="text-center mb-4" style="font-family: 'Ubuntu', sans-serif; font-weight: bold; color: #333; font-size: 2.5rem; margin-bottom: 30px;">Contact Us</h2>
        <div class="row">
            <!-- Start First Column -->
            <?php include('contactusform.php')?>
            <!-- End First Column -->
            <!-- Start Second Column -->
            <div class="col-md-4 text-center contact-info">
                <br><br>
                <strong>Headquarter:</strong><br>
                Corporate Office, BHEL House,<br>
                August Kranti Marg, Siri Fort Institutional<br>
                Siri Fort, New Delhi - 110049<br>
                India,<br>
                Phone:<br>
                <a href="tel:+91-1166 33 7598">+91-1166 33 7598</a><br>
                <a href="tel:+91-1166 33 7598">+91-1166 33 7598</a><br>
                <a href="https://www.bhel.com/" target="_blank">www.bhel.com</a>
            </div>
            <!-- End Second Column -->
        </div>
    </div>  
    <!-- End Contact Us -->

    <!-- Start Footer-->
    <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
        <!-- Start Footer Container -->
        <div class="container">
            <!-- Start Footer Row -->
            <div class="row py-3">
                <div class="col-md-6">
                    <!-- Start Footer 1st Column -->
                    <span class="pr-2">Follow Us: </span>
                    <a href="https://www.facebook.com/BHELOfficial/" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/BHEL_India/" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCNf9qk_Q8bYmdKz4LzBlnvQ" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="https://g.co/kgs/n3Z9Xon" target="_blank" class="pr-2 fi-color"><i class="fab fa-google"></i></a>
                </div>
                <!-- End Footer 1st Column -->
                <!-- Start Footer 2nd Column -->
                <div class="col-md-6 text-right">
                    <small> Designed by Vansh S. &copy; 2024.</small>
                    <small class="ml-2"><a href="Admin/AdminLogin.php" class="text-white">Admin Login</a></small>
                </div>
                <!-- End Footer 2nd Column -->
            </div>
            <!-- End Footer Row -->
        </div>
        <!-- End Footer Container -->
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap JavaScript -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>     
    <script src="JS/all.min.js"></script>   
</body>
</html>
