<?php
include('dbconnection.php');
if(isset($_REQUEST['rSignUp'])) {
    // Checking for empty fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")) {
        $regmsg = '<div class="alert alert-warning mt-2" role ="alert">All Fields are Required!</div>';
    }
    else {
        // Email ID already registered
        $sql = "SELECT r_email FROM plantworkerlogin_tb WHERE r_email = '".$_REQUEST['rEmail']."'";
        $result = $conn -> query($sql);
        if($result -> num_rows == 1) {
            $regmsg = '<div class="alert alert-warning mt-2" role ="alert">Email ID Already Registered!</div>';
        }
        else {
            // Assigning user's values to variables
            $rName = $_REQUEST['rName'];
            $rEmail = $_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];
            $sql = "INSERT INTO plantworkerlogin_tb (r_name, r_email, r_password) VALUES ('$rName', '$rEmail', '$rPassword')";
            if($conn->query($sql) == TRUE) {
                $regmsg = '<div class="alert alert-success mt-2" role ="alert">Account Succesfully Created!</div>';
            }
            else {
                $regmsg = '<div class="alert alert-danger mt-2" role ="alert">Unable to create account!</div>';
            }
        }
    }
}
?>

<!-- Start Registration Form -->
<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <i class="fas fa-user"></i>
                            <label for="name" class="font-weight-bold pl-2">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="rName" required>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <label for="email" class="font-weight-bold pl-2">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="rEmail" required>
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i>
                            <label for="pass" class="font-weight-bold pl-2">New Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                        </div>
                        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignUp">Sign Up</button>
                        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data Policy, and Cookie Policy</em>
                        <?php if(isset($regmsg)) {echo $regmsg;} ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Registration Form -->