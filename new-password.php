<?php
global $dbh;
error_reporting(1);
include ('dashboard/pages/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';?>
<body style="background-color:#e0aa3e3b !important;">

<?php include 'include/nav2.php';  ?>

<style>
    .btn-success{
        background-color:#b02494 !important; 
        border-color:#b02494;
    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini" style="display:none;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Getting Started</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content bg_gray">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if(!isset($_GET['edwerrtrttgysdsdertryyddswe'])){

}else {
    $email = $_GET['edwerrtrttgysdsdertryyddswe'];
    //check if resetLink isnt expired
    $result_password_reset = $dbh ->query("SELECT * FROM password_reset WHERE email_id = '$email'");
    $row_pass = $result_password_reset -> fetchObject();
    $row_pass->expiryDateTime;
    $currentTime = new DateTime();

    if ($currentTime->format('Y-m-d H:i:s') > $row_pass->expiryDateTime) {
        echo "<div class='alert  alert-danger '>This expired Please ! 
<a href='forgot-password'>Click here to resend a new reset link</a></div> ";

        $password_reset = $dbh ->query("DELETE FROM password_reset WHERE email_id = ' $email '");


    } else if(isset($_POST["newPassword"])) {
    $password = $_POST['password'];
    $cpassword = $_POST['comfirmPassword'];
    if($password === $cpassword) {
        $insert_users=$dbh->query("UPDATE users SET password='$password' WHERE email = '$email'");

        if( $insert_users){
            $insert_k=$dbh->query("UPDATE keyfields SET password='$password' WHERE username = '$email'");

            $password_reset = $dbh ->query("DELETE FROM password_reset WHERE email_id = ' $email '");

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.twewole.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'twewoleaccounts@twewole.com';
            $mail->Password = 'Credit2023';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
            $mail->addAddress($email, $email);
            $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = "Hello, ".$email."
                   You have changed your password successfully. New Password is ".$password."</a><hr> Thank you !</hr>.";
            $mail->send();

            echo "<div class='alert alert-success'>New Password has been set successfully.. </div>";
            ?>
            <script>
                var allowed=function(){window.location='login';}
                setTimeout(allowed,1000);
            </script>
            <?php

        }else {

        }
    } else {
        echo "<div class='alert alert-danger'>Failed ! Password dont Match, Try Again</div>";
    }
}
}
?>

<!-- START LOGIN SECTION -->
<style>
    .btn-fill-out {
    background-color: transparent;
    border: 1px solid #f7cd12; }
    
    .btn-fill-out:hover {
    color: #FF324D !important;
}
</style>
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Set Password</h3>
                        </div>
                        <form method="post">
                            <div class="form-group mb-3">
                                <input type="password" required="" class="form-control" name="password" placeholder="Your New Password">
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" required="" class="form-control" name="comfirmPassword" placeholder="Comfirm Password">
                            </div>
                         
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-block"  name="newPassword">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("pid");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


</div>
<!-- END MAIN CONTENT -->

<?php include 'include/footer.php'; ?>

</body>
</html>