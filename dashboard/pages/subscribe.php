<?php

global $dbh;
session_start();
include 'connect.php';
error_reporting(1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if(!isset($_SESSION['rolenumber'])){
?>
<script>
var allowed=function(){window.location='../../login';}
setTimeout(allowed,1);
</script>
<?php
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Twewole - Subscribe</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
    .price {
      font-size: 22px;
      margin: 10px 0;
      color: #e83e8c;
      font-weight: bold;
    }

    .btn-outline-warning {
      color: #e83e8c !important;
      border-color: #e83e8c !important;
      margin-top: 15px;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #f8f9fa;
      border-bottom: 2px solid #e83e8c;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: #e83e8c;
    }

    .table th {
      background-color: #e83e8c;
      color: white;
      text-align: center;
      font-size: 18px;
    }

    .table td {
      text-align: center;
      vertical-align: middle;
    }

    .card-body {
      padding: 20px;
    }

    .subscription-details {
      text-align: center;
      margin-bottom: 15px;
    }

    .subscription-details h4 {
      color: #343a40;
      font-size: 18px;
      font-weight: bold;
    }

    .subscription-details p {
      color: #6c757d;
      font-size: 14px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini" >
<div style="background-color:#f8f9fa !important">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../contactus" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">
         <b>Hi</b>, <?php echo $_SESSION['firstname']; ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout" role="button">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Main content -->
    <section class="content" style="margin-bottom:120px;margin-top:30px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                Subscription Packages
              </div>
              <div class="card-body">
              <?php 
                if(isset($_POST['submit_monthly'])){
                  $amount=$_POST['amount'];
                  $rolenumber=$_POST['rolenumber'];
                  $expireddate=date('Y-m-d',strtotime('+30 day', strtotime(Date('y-m-d')))); 
                  // add 30 days to date
                  $result_sub=$dbh->query("SELECT * FROM subscriptions");
                  $count_sub=$result_sub->rowCount();
                  $row_sub=$result_sub->fetchObject();
                  if($count_sub>0){
                    $subscriptionid=$row_sub->autoid+1;
                  }else{
                    $subscriptionid=1;
                  }
                    $status=1;

                    $accounttype=$_POST['accounttype'];
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(30,'$expireddate','$accounttype','monthly','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
                      $ndays = 30;
                      sendEmail($expireddate,$accounttype,$ndays);
                   echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
                   ?>
                <script>
                var allowed=function(){window.location='dashboard';}
                setTimeout(allowed,2000);
                </script>
                <?php
                  }else{
                    echo "<div class='alert alert-danger'>Failed! Try again </div>";
                  }

                }
                //quaterly
                if(isset($_POST['submit_quartely'])){
                  $amount=$_POST['amount'];
                  $rolenumber=$_POST['rolenumber'];
                  $expireddate=date('Y-m-d',strtotime('+120 day', strtotime(Date('y-m-d')))); 
                  // add 120 days to date
                  $result_sub=$dbh->query("SELECT * FROM subscriptions");
                  $count_sub=$result_sub->rowCount();
                  $row_sub=$result_sub->fetchObject();
                  if($count_sub>0){
                    $subscriptionid=$row_sub->autoid+1;
                  }else{
                    $subscriptionid=1;
                  }
                    $status=1;

                    $accounttype=$_POST['accounttype'];
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(120,'$expireddate','$accounttype','quartely','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
                      $ndays = 120;
                      sendEmail($expireddate,$accounttype,$ndays);
                   echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
                   ?>
                <script>
                var allowed=function(){window.location='dashboard';}
                setTimeout(allowed,2000);
                </script>
                <?php
                  }else{
                    echo "<div class='alert alert-danger'>Failed! Try again </div>";
                  }
                }
                //
                if(isset($_POST['submit_biannual'])){
                  $amount=$_POST['amount'];
                  $rolenumber=$_POST['rolenumber'];
                  $expireddate=date('Y-m-d',strtotime('+180 day', strtotime(Date('y-m-d')))); 
                  // add 120 days to date
                  $result_sub=$dbh->query("SELECT * FROM subscriptions");
                  $count_sub=$result_sub->rowCount();
                  $row_sub=$result_sub->fetchObject();
                  if($count_sub>0){
                    $subscriptionid=$row_sub->autoid+1;
                  }else{
                    $subscriptionid=1;
                  }
                    $status=1;

                    $accounttype=$_POST['accounttype'];
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(180,'$expireddate','$accounttype','biannual','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
                      $ndays = 180;
                      sendEmail($expireddate,$accounttype,$ndays);
                   echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
                   ?>
                <script>
                var allowed=function(){window.location='dashboard';}
                setTimeout(allowed,2000);
                </script>
                <?php
                  }else{
                    echo "<div class='alert alert-danger'>Failed! Try again </div>";
                  }

                }
                if(isset($_POST['submit_annual'])){

                  $amount=$_POST['amount'];
                  $rolenumber=$_POST['rolenumber'];
                  $expireddate=date('Y-m-d',strtotime('+360 day', strtotime(Date('y-m-d')))); 
                  // add 120 days to date
                  $result_sub=$dbh->query("SELECT * FROM subscriptions");
                  $count_sub=$result_sub->rowCount();
                  $row_sub=$result_sub->fetchObject();
                  if($count_sub>0){
                    $subscriptionid=$row_sub->autoid+1;
                  }else{
                    $subscriptionid=1;
                  }
                    $status=1;

                    $accounttype=$_POST['accounttype'];
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(360,'$expireddate','$accounttype','annually','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
                       $ndays = 360;
                      sendEmail($expireddate,$accounttype,$ndays);
                   echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
                   ?>
                <script>
                var allowed=function(){window.location='dashboard';}
                setTimeout(allowed,2000);
                </script>
                <?php
                  }else{
                    echo "<div class='alert alert-danger'>Failed! Try again </div>";
                  }

                }

                if(isset($_POST['submit_trial'])){
                  $amount=0;
                  $rolenumber=$_POST['rolenumber'];
                  $expireddate=date('Y-m-d',strtotime('+30 day', strtotime(Date('y-m-d')))); 
                  $expireddate;
                  $result_sub=$dbh->query("SELECT * FROM subscriptions");
                  $count_sub=$result_sub->rowCount();
                  $row_sub=$result_sub->fetchObject();
                  if($count_sub>0){
                    $subscriptionid=$row_sub->autoid+1;
                  }else{
                    $subscriptionid=1;
                  }
                    $status=1;

                    $accounttype=7;
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(30,'$expireddate','$accounttype','trial','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
                   
                   $ndays = 30; 
                  sendEmail($expireddate,$accounttype,$ndays);
                   echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
                   ?>
                <script>
                var allowed=function(){window.location='dashboard';}
                setTimeout(allowed,2000);
                </script>
                <?php
                  }else{
                    echo "<div class='alert alert-danger'>Failed! Try again </div>";
                  }

                }
                

                function sendEmail( $expired_date,$accounttype,$no_days){
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
                <table id="subscriptionTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Plan</th>
                    <th>Monthly Rate</th>
                    <th>Quarterly Rate</th>
                    <th>Bi-Annual Rate</th>
                    <th>Annual Rate</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $yy=date("Y");$fyy=substr($yy,2,2);
                    $mm=date("m");$dd=date("d");$hi=date("h");
                    $mi=date("i");$sa=date("sa");$fsa=substr($sa,0,2);
                    $transactionid=$_SESSION['rolenumber'].$yy.$mm.$mi.$fyy.$dd.$fsa;
                    $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
                    $count_users=$result_users->rowCount();
                    $row_users=$result_users->fetchObject();
                    if($count_users){
                       do{
                    $result_sub=$dbh->query("SELECT * FROM account where accounttype=$row_users->accounttype");
                    $count_sub=$result_sub->rowCount();
                    $row_sub=$result_sub->fetchObject();
                    if($count_sub>0){
                        do{ ?>
                    <tr>
                      <td>
                        <div class="subscription-details">
                          <span class="price">UGX. 0</span>
                          <h4>Free Trial</h4>
                          <p>This package is for a period of 1 month from the time of subscription.</p>
                          <form method="POST" id="paymentForm">
                      <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_trial" onclick="return confirmSubmission()">Start Today</button>
                      </form>
                        </div>
                      </td>
                      <td>
                        <div class="subscription-details">
                          <span class="price">UGX. <?php echo number_format($row_sub->monthly); ?></span>
                          <p>This package is for a period of 1 month from the time of subscription.</p>
                          <!-- <form method="POST" action="processPayment" id="paymentForm">
                            <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                            <input type="hidden" value="<?php echo $row_sub->monthly; ?>" name="amount">
                            <input type="hidden" value="<?php echo $row_sub->accounttype; ?>" name="accounttype">
                            <button class="btn btn-outline-warning" type="submit" name="submit_monthly">Subscribe</button> -->
                            <form method="POST" action="processPayment" id="paymentForm">
                     <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                     <input type="hidden" value="<?php echo $row_sub->monthly; ?>" name="amount">
                     <input type="hidden" value="<?php echo $row_sub->accounttype; ?>" name="accounttype">
                      <input type="hidden" value="<?php echo $row_sub->autoid; ?>" name="subscription">
                      <input type="hidden" name="description" value="monthly subscription"/>
                      <input type="hidden" name="currency" value="UGX"/> 
                      <input type="hidden" name="payment_method" value="card"/> 
                      <input type="hidden" name="email" value="<?php echo $row_users->email; ?>"/> 
                       <input type="hidden" name="first_name" value="<?php echo $row_users->firstname; ?>"/>
                      <input type="hidden" name="last_name" value="<?php echo $row_users->lastname; ?>"/> 
                      <input type="hidden" name="phone_number" value="<?php echo $row_users->phonenumber; ?>"/> 
                      <input type="hidden" name="pay_button_text" value="Complete Payment"/>
                      <input type="hidden" name="tx_ref" value="<?php echo $transactionid; ?>"/>
                      <input type="hidden" name="success_url" value="success?status=success&&amount=<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&&subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <input type="hidden" name="failure_url" value="failed?status=failed">
                      <input type="hidden" name="cancel_url" value="cancelled?status=cancelled">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_monthly">subscribe</button>
                  </form>
                        </div>
                      </td>
                      <td>
                        <div class="subscription-details">
                          <span class="price">UGX. <?php echo number_format($row_sub->quarterly); ?></span>
                          <p>This package is for a period of 3 months from the time of subscription.</p>
                          <form method="POST" action="processPayment" id="paymentForm">
                     <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                     <input type="hidden" value="<?php echo $row_sub->quarterly; ?>" name="amount">
                     <input type="hidden" value="<?php echo $row_sub->accounttype; ?>" name="accounttype">
                      <input type="hidden" value="<?php echo $row_sub->autoid; ?>" name="subscription">
                      <input type="hidden" name="description" value="Quartely subscription"/>
                      <input type="hidden" name="currency" value="UGX"/> 
                      <input type="hidden" name="payment_method" value="card"/> 
                      <input type="hidden" name="email" value="<?php echo $row_users->email; ?>"/> 
                       <input type="hidden" name="first_name" value="<?php echo $row_users->firstname; ?>"/>
                      <input type="hidden" name="last_name" value="<?php echo $row_users->lastname; ?>"/> 
                      <input type="hidden" name="phone_number" value="<?php echo $row_users->phonenumber; ?>"/> 
                      <input type="hidden" name="pay_button_text" value="Complete Payment"/>
                      <input type="hidden" name="tx_ref" value="<?php echo $transactionid; ?>"/>
                      <input type="hidden" name="success_url" value="success?status=success&&amount=<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&&subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <input type="hidden" name="failure_url" 
                      value="failed?status=failed&&amount<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&& subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_quartely">subscribe</button>
                  </form>
                        </div>
                      </td>
                      <td>
                        <div class="subscription-details">
                          <span class="price">UGX. <?php echo number_format($row_sub->biannual); ?></span>
                          <p>This package is for a period of 6 months from the time of subscription.</p>
                          <form method="POST" action="processPayment" id="paymentForm">
                     <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                     <input type="hidden" value="<?php echo $row_sub->biannual; ?>" name="amount">
                     <input type="hidden" value="<?php echo $row_sub->accounttype; ?>" name="accounttype">
                      <input type="hidden" value="<?php echo $row_sub->autoid; ?>" name="subscription">
                      <input type="hidden" name="description" value="Biannual subscription"/>
                      <input type="hidden" name="currency" value="UGX"/> 
                      <input type="hidden" name="payment_method" value="card"/> 
                      <input type="hidden" name="email" value="<?php echo $row_users->email; ?>"/> 
                       <input type="hidden" name="first_name" value="<?php echo $row_users->firstname; ?>"/>
                      <input type="hidden" name="last_name" value="<?php echo $row_users->lastname; ?>"/> 
                      <input type="hidden" name="phone_number" value="<?php echo $row_users->phonenumber; ?>"/> 
                      <input type="hidden" name="pay_button_text" value="Complete Payment"/>
                      <input type="hidden" name="tx_ref" value="<?php echo $transactionid; ?>"/>
                      <input type="hidden" name="success_url" value="success?status=success&&amount=<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&&subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <input type="hidden" name="failure_url" 
                      value="failed?status=failed&&amount<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&& subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_biannual">subscribe</button>
                  </form>
                        </div>
                      </td>
                      <td>
                        <div class="subscription-details">
                          <span class="price">UGX. <?php echo number_format($row_sub->annual); ?></span>
                          <p>This package is for a period of 1 year from the time of subscription.</p>
                          <form method="POST" action="processPayment" id="paymentForm">
                     <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                     <input type="hidden" value="<?php echo $row_sub->annual; ?>" name="amount">
                     <input type="hidden" value="<?php echo $row_sub->accounttype; ?>" name="accounttype">
                      <input type="hidden" value="<?php echo $row_sub->autoid; ?>" name="subscription">
                      <input type="hidden" name="description" value="Annual subscription"/>
                      <input type="hidden" name="currency" value="UGX"/> 
                      <input type="hidden" name="payment_method" value="card"/> 
                      <input type="hidden" name="email" value="<?php echo $row_users->email; ?>"/> 
                       <input type="hidden" name="first_name" value="<?php echo $row_users->firstname; ?>"/>
                      <input type="hidden" name="last_name" value="<?php echo $row_users->lastname; ?>"/> 
                      <input type="hidden" name="phone_number" value="<?php echo $row_users->phonenumber; ?>"/> 
                      <input type="hidden" name="pay_button_text" value="Complete Payment"/>
                      <input type="hidden" name="tx_ref" value="<?php echo $transactionid; ?>"/>
                      <input type="hidden" name="success_url" value="success?status=success&&amount=<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&&subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <input type="hidden" name="failure_url" 
                      value="failed?status=failed&&amount<?php echo$row_sub->quarterly;?>&&rolenumber=<?php echo $_SESSION['rolenumber']; ?>&&accounttype=<?php echo $row_sub->accounttype; ?>&& subscription=<?php echo $row_sub->autoid; ?>&&tx_ref=<?php echo $transactionid; ?>">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_annual">subscribe</button>
                  </form> 
                        </div>
                      </td>
                    </tr>
                    <?php  }while($row_sub=$result_sub->fetchObject());
                    }
                       }while($row_users=$result_users->fetchObject());
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<script>
    function confirmSubmission() {
        return confirm("Are you sure you want to proceed?");
    }
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
