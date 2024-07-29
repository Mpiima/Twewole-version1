<?php include("zini_genesis.php"); 
// include 'warning.php';
// header("Location: /");
?>

<?php
// Set the start date and end date
$startDate = '2024-07-20 00:00:00'; // Example start date
$endDate = '2024-08-01 00:00:00'; // Example end date

// Pass the end date to JavaScript
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php echo kheader(); ?>
  <style>
    .card-header>.card-tools .input-group, .card-header>.card-tools .nav, .card-header>.card-tools .pagination {
    margin-bottom: -0.3rem;
    margin-top: -0.3rem;
    display: none;
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    display: none;
}
.btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    font-variant: diagonal-fractions;
    display: none;
}

        #countdown {
            font-size: 2rem;
            text-align: center;
        }
        .animate {
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
 
  </style>
</head>

<body onload="status_checker()" class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>
<?php echo kleftbar();  ?>
<?php  if(isset($_SESSION['role'])){  ?>

<!-- Main content -->
<section class='content'>
<div class='container-fluid'>

<section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-tite">
                    <div class="row">
                        <div class="col-lg-7">SUBSCRIPTION</div> 
                        <div class="col-lg-5"><span>STATUS: </span><span style="color:green">ACTIVE</span>
                        [REMAINING DAYS : <span style="color:red">40</span>] 
                        <button class="btn btn-outline-warning">Renew Subscription</button>
                    </div> 
                    </div>

                </h5>
              </div>



              <div id="countdown" ></div>

<script>
    // JavaScript Countdown Logic
    const endDate = new Date('<?php echo $endDate; ?>').getTime();
    
    const countdown = () => {
        const now = new Date().getTime();
        const distance = endDate - now;

        if (distance < 0) {
            document.getElementById("countdown").innerHTML = "EXPIRED";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = `${days}days - ${hours}hrs - ${minutes}mins - ${seconds}sec`;
    };

    setInterval(countdown, 1000);
</script>
              <!-- /.card-header -->
              <div class="card-body p-2">  
            <div class="container " >
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                    <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>No</th>
                    <th>Package</th>
                    <th>Subscribed_on</th>
                    <th>Expiry Date</th>
                    <th>Slots</th>
                    <th>Used Slots</th>
                    <th>Available Slots</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                     error_reporting(0);
                    $result_subsc=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_SESSION['rolenumber']."' ORDER BY autoid desc ");
                    $count_subsc=$result_subsc->rowCount();
                    $row_sub=$result_subsc->fetchObject();

                    if($count_subsc>0){
                      $n=1;
                      do{

                        if($row_sub->account === 0){
                          $type="TRIAL";
                          $slots = 40;
                          $vslots = 30;
                          $uslots = 10;
                        }else{
                          $result_a=$dbh->query("SELECT * FROM account where status=1 AND autoid=$row_sub->account ");
                          $count_a=$result_a->rowCount();
                          $row_a=$result_a->fetchObject();
                          $type =  $row_a->accountname;

                          do{
                           
                          }while($row_a=$result_a->fetchObject());
                        }
                       $status = "ACTIVE";

                      echo "<tr>
                      <td>".$n++."</td>
                        <td>".$type."</td>
                      <td>".$row_sub->subscribedon."</td>
                      <td>".$row_sub->expired_date."</td>
                        <td>".$slots."</td>
                         <td>".$uslots."</td>
                          <td>".$vslots."</td>
                      <td>".$status."</td>"; ?>
                  </tr>
                     <?php
                      }while($row_sub=$result_subsc->fetchObject());
                    }
                    ?>
                  </tbody>
                </table>
                    </div>
            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>        
        </div>
        <!-- /.row -->
  </section>
<!-- /.content -->
</div>

<?php } ?>

<script>
function account_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>  
<?php echo lscripts(); ?>
</body>
</html>
