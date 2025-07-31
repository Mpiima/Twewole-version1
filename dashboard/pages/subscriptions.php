<?php include("zini_genesis.php"); 
// include 'warning.php';
// header("Location: /");
?>

<?php
error_reporting(1);
$result_subs=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_SESSION['rolenumber']."' ORDER BY subscribedon desc LIMIT 1");
$count_subs=$result_subs->rowCount();
$row_subs=$result_subs->fetchObject();

$startDate = $row_subs->subscribedon; 
$endDate = $row_subs->expired_date;
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
                    <!-- <div class="row">
                        <div class="col-lg-7">SUBSCRIPTION</div> 
                        <div class="col-lg-5"><span>STATUS: </span><span style="color:green">ACTIVE</span>
                        [REMAINING  : <span style="color:red">40</span>] 
                        <button class="btn btn-outline-warning">Renew Subscription</button>
                    </div>  -->
                    </div>

                </h5>
              </div>


              <div class="row alert alert-primary"> <div class="col-lg-4" style="text-align:right; ">
                 <b>REMAINING PERIOD :</b></div>
              <div class="col-lg-8" id="countdown" style="text-align:left; "></div>
            </div> 

<script>
    // JavaScript Countdown Logic
    const endDate = new Date('<?php echo $endDate; ?>').getTime();
    
    const countdown = () => {
        const now = new Date().getTime();
        const distance = endDate - now;

        if (distance < 0) {
            document.getElementById("countdown").innerHTML = "<span style='color:red;'>YOUR ACCOUNT HAS EXPIRED</span><br> <a href='renew_subscription' class='btn btn-success'>Renew Now</a>";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =  `${days}days - ${hours}hrs - ${minutes}mins - ${seconds}sec`;
    };

    setInterval(countdown, 1000);
</script>
              <!-- /.card-header -->
              <div class="card-body p-2">  
            <div class="container " >
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
           
               <table id="" class="table table-striped  " 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Package</th>
                    <th>Subscribed_on</th>
                    <th>Expiry Date</th>
                    <th>Slots</th>
                    <th>Used Slots</th>
                    <th>Remaining Slots</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

        <?php 
      
      $result_products=$dbh->query("SELECT * FROM products where addedby='".$_SESSION['rolenumber']."'");       
      $count_products=$result_products->rowCount();
      
              $sql = "
              SELECT 
                  a.monthly, a.quarterly, a.biannual, a.annual, a.accounttype, a.status, a.slots,
                  at.accountname, at.banner, at.autoid,
                  s.noofdays, s.subscribedon, s.expired_date, s.account, s.period, s.rolenumber, s.status AS subscription_status
              FROM account a
              JOIN account_type at ON a.accounttype = at.autoid
              JOIN subscriptions s ON a.autoid = s.account 
              WHERE s.rolenumber = '".$_SESSION['rolenumber']."'";

              $result = $dbh->query($sql);

              if ($result->rowCount() > 0) {
                  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    
                    $status = $row['subscription_status'] == 1 ? 'ACTIVE' : 'EXPIRED';
                    $slots = $row['slots'];
                    $used_slots = $count_products;
                    $available_slots = $slots - $used_slots;

                    echo "<tr>
                      <td>".$row['accountname']."</td>
                      <td>".$row['subscribedon']."</td>
                      <td>".$row['expired_date']."</td>
                      <td>".$row['slots']."</td>
                      <td>".$used_slots."</td>
                      <td>".$available_slots."</td>
                        <td class='".($status == 'ACTIVE' ? 'alert alert-success' : 'alert alert-danger')."'>".$status."</td>
                    </tr>";


                  }
              } else {
                  echo "0 results";
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
