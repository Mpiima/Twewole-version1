<?php

global $dbh;
session_start();
include 'connect.php';
error_reporting(1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
$row_users=$result_users->fetchObject();
$fullname = $row_users->firstname." ".$row_users->lastname;
$email = $row_users->email;

$result_subs=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_SESSION['rolenumber']."' ORDER BY subscribedon desc LIMIT 1");
$row_subs=$result_subs->fetchObject();
$endDate = $row_subs->expired_date;
$endDateTime = new DateTime($endDate);
$currentDate = new DateTime();
$remainingDays = $currentDate->diff($endDateTime)->days;

sendEmailWhenSubscriptionAboutToEnd($remainingDays,$currentDate,$endDate,$fullname,$email);
function sendEmailWhenSubscriptionAboutToEnd($remainingDays,$currentDate,$endDate,$fullname,$email){

        //send email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.twewole.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'twewoleaccounts@twewole.com';
        $mail->Password = 'Credit2023';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
        $mail->addAddress($email, $fullname);
        $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
        $mail->isHTML(true);
        $mail->Subject = 'Subscription Notice';
        //Notify The User
    if($remainingDays === 5 ) {
        $mail->Body = "Hello, " . $fullname . "<br> You have only " . $remainingDays . " days remaining for your account to expire, your account will expire on " . $endDate . "<br> 
                       <a href='https://twewole.com/login'>Click here to renew your account</a><hr> Thank you !</hr>.";
        $mail->send();
    }else if($remainingDays === 0) {
        $mail->Body = "Hello, " . $fullname . "<br> Your account expired on " . $endDate . "<br> 
                       <a href='https://twewole.com/login'>Click here to renew your account </a><hr> Thank you !</hr>.";
        $mail->send();

        //set status to 0 when account expired
        $update_users=$dbh->query("UPDATE users set status=0 WHERE rolenumber='".$_SESSION['rolenumber']."'");
        $update_key=$dbh->query("UPDATE keyfields set status=0 WHERE rolenumber='".$_SESSION['rolenumber']."'");
    }


}


$result_products=$dbh->query("SELECT * FROM products where addedby='".$_SESSION['rolenumber']."'");
$count_products=$result_products->rowCount();

$sql = "SELECT 
    a.monthly, a.quarterly, a.biannual, a.annual, a.accounttype, a.status, a.slots,
      at.accountname, at.banner, at.autoid,
      s.noofdays, s.subscribedon, s.expired_date, s.account, s.period, s.rolenumber, s.status AS subscription_status
  FROM account a
  JOIN account_type at ON a.accounttype = at.autoid
  JOIN subscriptions s ON a.autoid = s.account 
  WHERE s.rolenumber = '".$_SESSION['rolenumber']."'";

$result = $dbh->query($sql);
$row=$result->fetchObject();
$slots = $row->slots;
$used_slots = $count_products;
$available_slots = $slots - $used_slots;

sendEmailWhenSlotsAreFew($available_slots,$email,$fullname);
function sendEmailWhenSlotsAreFew($available_slots,$email,$fullname){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.twewole.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'twewoleaccounts@twewole.com';
    $mail->Password = 'Credit2023';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
    $mail->addAddress($email, $fullname);
    $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
    $mail->isHTML(true);
    $mail->Subject = 'Subscription Notice';
    if($available_slots === 5 ) {
        $mail->Body = "Hello, " . $fullname . "<br> You have only " . $available_slots . " slots remaining on your account <br> 
                       <a href='https://twewole.com/login'>Click here for help !</a><hr> Thank you !</hr>.";
        $mail->send();
    }else if($available_slots === 0) {
        $mail->Body = "Hello, " . $fullname . "<br> Your account slots are all used <br> 
                       <a href='https://twewole.com/login'>Click here for Help </a><hr> Thank you !</hr>.";
        $mail->send();
    }
}

//When someone forgets his password/send email to re-active new password
function sendEmailToResetPassword(){

}

//When someone changes his password.
function sendEmailWhenPasswordChanges( $expired_date,$accounttype,$no_days){
    global $dbh;
    $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
    $row_users=$result_users->fetchObject();
    $fullname = $row_users->firstname." ".$row_users->lastname;
    $email = $row_users->email;

    $result_acc=$dbh->query("SELECT * FROM account_type WHERE autoid=$accounttype");
    $row_cc=$result_acc->fetchObject();
    $accountName = $row_cc->accountname;

    //send email
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'mail.twewole.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'twewoleaccounts@twewole.com';
    $mail->Password   = 'Credit2023';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
    $mail->addAddress($email,$fullname);
    $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
    $mail->isHTML(true);
    $mail->Subject = 'Subscription Notice';

    //Notify The User
    $mail->Body    = "Hello, ".$fullname."<br> You have successfully subscribed for ".$accountName. " account for ".$no_days. " days, expiring on ".$expired_date."<br> 
                                       <a href='https://twewole.com/login'>Click here to Access your account</a><hr> Thank you !</hr>.";
    $mail->send();

    //Notify the Admin/Twewole Staff
    //send email
    $mail_admin = new PHPMailer(true);
    $mail_admin->isSMTP();
    $mail_admin->Host       = 'mail.twewole.com';
    $mail_admin->SMTPAuth   = true;
    $mail_admin->Username   = 'twewoleaccounts@twewole.com';
    $mail_admin->Password   = 'Credit2023';
    $mail_admin->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail_admin->Port       = 465;
    $mail_admin->setFrom('twewoleaccounts@twewole.com', 'Twewole');
    $mail_admin->addAddress("twewoleaccounts@twewole.com","Admin");
    $mail_admin->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
    $mail_admin->isHTML(true);
    $mail_admin->Subject = 'Subscription Notice';

    //Notify The User
    $mail_admin->Body    = "Hello, <br> You have A new Member who has subscribed for ".$accountName. " account for ".$no_days.", expiring on ".$expired_date."<br> 
                                       <a href='https://twewole.com/login'>Click here to Login and View Details</a><hr> Thank you !</hr>.";
    $mail_admin->send();


}

//When Account is deactivated, activated or deleted.
function sendEmailWhenAccountDeactivated( $expired_date,$accounttype,$no_days){
    global $dbh;
    $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
    $row_users=$result_users->fetchObject();
    $fullname = $row_users->firstname." ".$row_users->lastname;
    $email = $row_users->email;

    $result_acc=$dbh->query("SELECT * FROM account_type WHERE autoid=$accounttype");
    $row_cc=$result_acc->fetchObject();
    $accountName = $row_cc->accountname;

    //send email
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'mail.twewole.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'twewoleaccounts@twewole.com';
    $mail->Password   = 'Credit2023';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
    $mail->addAddress($email,$fullname);
    $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
    $mail->isHTML(true);
    $mail->Subject = 'Subscription Notice';

    //Notify The User
    $mail->Body    = "Hello, ".$fullname."<br> You have successfully subscribed for ".$accountName. " account for ".$no_days. " days, expiring on ".$expired_date."<br> 
                                       <a href='https://twewole.com/login'>Click here to Access your account</a><hr> Thank you !</hr>.";
    $mail->send();

    //Notify the Admin/Twewole Staff
    //send email
    $mail_admin = new PHPMailer(true);
    $mail_admin->isSMTP();
    $mail_admin->Host       = 'mail.twewole.com';
    $mail_admin->SMTPAuth   = true;
    $mail_admin->Username   = 'twewoleaccounts@twewole.com';
    $mail_admin->Password   = 'Credit2023';
    $mail_admin->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail_admin->Port       = 465;
    $mail_admin->setFrom('twewoleaccounts@twewole.com', 'Twewole');
    $mail_admin->addAddress("twewoleaccounts@twewole.com","Admin");
    $mail_admin->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
    $mail_admin->isHTML(true);
    $mail_admin->Subject = 'Subscription Notice';

    //Notify The User
    $mail_admin->Body    = "Hello, <br> You have A new Member who has subscribed for ".$accountName. " account for ".$no_days.", expiring on ".$expired_date."<br> 
                                       <a href='https://twewole.com/login'>Click here to Login and View Details</a><hr> Thank you !</hr>.";
    $mail_admin->send();


}



?>

