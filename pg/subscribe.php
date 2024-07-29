<?php
session_start();
include 'connect.php';
error_reporting(0);
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
    .price{
      font-size:19px;
      margin:20px;
      color:orange;
      font-weight:bold;
    }

  
 .btn-outline-warning {
    color: #e83e8c !important;
    border-color: #e83e8c !important;
}

   
  </style>
</head>
<body class="hold-transition sidebar-mini" >
<div style="background-color:#e0aa3e3b !important">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style=" margin-left: 0px !important;">
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
        <a class="nav-link"  href="#" role="button">
         <b>Hi</b>, <?php echo $_SESSION['firstname']; ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="logout" role="button">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="cotainer">


    <!-- Main content -->
    <section class="content" style="margin-bottom:120px;margin-top:30px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="car">
              <div class="card-headr">
                <!-- <h3 class="card-title">SUBSCRIPTION PACKAGES</h3> -->
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

                    $accounttype=0;
                  //insert subscription
                  $insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
                  values(30,'$expireddate','$accounttype','trial','$rolenumber')");
                  //into tblstate
                  $insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
                  values('$rolenumber','$status','$subscriptionid')");

                  if($insert_tblstate){
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
                

                ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width:100%">
                  <thead>
                  <tr><th  colspan="1">Trial Period</th>
                 <th style="width:1px !important;"></th>
                    <th>Monthly Rate</th>
                    <th>Quartely Rate</th>
                    <th>Bi-Annual Rate</th>
                    <th>Annual Rate</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- //trial Period -->
                    <tr>
                      <td rowspan="4">
                      <span class="price">UGX. <?php echo number_format(0); ?></span>
                   
                    <div class="col-lg-12 mt-1">
                      <h4>Free Trial</h4>
                      <p>This Free package is for a period of 1 month from the time of subscription. </p>
                      <hr>
                     
                      </div>
                      <form method="POST" id="paymentForm">
                      <input type="hidden" value="<?php echo $_SESSION['rolenumber']; ?>" name="rolenumber">
                      <button  id="btn-of-destiny" class="btn btn-outline-warning" type="submit" name="submit_trial">Start Today</button>
                      </form>
                    </td>
                  </tr>

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
                  <td></td>
                  
                    <td><span class="price">UGX. <?php echo number_format($row_sub->monthly); ?></span>
                    <div class="row">
                      <div class="col-lg-12">
                      <p>This package is for a period of 1 month from the time of subscription. </p>
                      </div>
                      <div class="col-lg-12">
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
                    </div>
                  </td>
                    <td><span class="price">UGX. <?php echo number_format($row_sub->quarterly); ?></span>
                    <div class="col-lg-12">
                      <p>This package is for a period of 3 months from the time of subscription. </p>
                      </div>
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
                  </td>
                    <td><span class="price">UGX. <?php echo number_format($row_sub->biannual); ?></span>
                    <div class="col-lg-12">
                      <p>This package is for a period of 6 months from the time of subscription. </p>
                      </div>
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

                  </td>
                    <td><span class="price">UGX. <?php echo number_format($row_sub->annual); ?></span>
                    <div class="col-lg-12">
                      <p>This package is for a period of 12 months from the time of subscription. </p>
                      </div>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="margin-left: 0px;margin-bottom:0px; vertical_align:bottom;">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023 <a href=""></a>.</strong> All rights reserved Twewole LTd.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
