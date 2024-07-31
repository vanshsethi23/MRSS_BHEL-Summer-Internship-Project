<?php
if (isset($_REQUEST['submit'])) {
    if (empty($_REQUEST['name']) || empty($_REQUEST['subject']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])) {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];

        $mailTo = "contact@geekyshows.com";
        $headers = "From: " . $email . "\r\n" .
                    "Reply-To: " . $email . "\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";
        $txt = "You have received an email from " . $name . ".\n\n" . $message;

        if (mail($mailTo, $subject, $txt, $headers)) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Sent Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Failed to Send Email</div>';
        }
    }
}
?> 
           
            <!--Start Contact Us-->
            <div class="col-md-8">
                <form action="" method="POST">
                    <input type="text" class="form-control" name="name" placeholder="Name" required><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required><br>
                    <input type="email" class="form-control" name="email" placeholder="Email" required><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px" required></textarea><br>
                    <input type="submit" class="btn btn-primary" value="Send" name="submit"><br><br>
                </form>
            </div>
            <!-- End Contact Us-->