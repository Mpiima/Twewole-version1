<?php include("zini_genesis.php"); 
// include 'warning.php';
// header("Location: /");
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
  </style>
</head>

<body onload="status_checker()" class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>
<?php echo kleftbar();  ?>
<?php 
if(!isset($_SESSION['role'])){
//redirect to login
// || $_SESSION['role'] != "BN2" || $_SESSION['role'] != "BN3" 
// || $_SESSION['role'] != "BN4" || $_SESSION['role'] != "BN5" || $_SESSION['role'] != "BN6"
}else if($_SESSION['role'] == "BN1" || $_SESSION['role'] == "BN2" || $_SESSION['role'] == "BN3" || $_SESSION['role'] == "BN4" || $_SESSION['role'] == "BN5" || $_SESSION['role'] == "BN6"){
  include 'bndash.php';
}else{
?>
<!-- Main content -->
<section class='content'>
<div class='container-fluid'>
<!-- Info boxes -->
<div class='row'>
<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box'>
<span class='info-box-icon bg-info elevation-1'><i class='fa fa-briefcase'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Loans</span>
<span class='info-box-number'>
 <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='loan' ");
   echo $count_products=$result_products->rowCount();
 ?>
</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-danger elevation-1'><i class='fas fa-cart-plus'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Assets Leasing</span>
<span class='info-box-number'> <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='lease' ");
   echo $count_products=$result_products->rowCount();
 ?></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class='clearfix hidden-md-up'></div>

<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-success elevation-1'><i class='fas fa-book'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Trade Credits</span>
<span class='info-box-number'> <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='tradeunit' ");
   echo $count_products=$result_products->rowCount();
 ?></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-warning elevation-1'><i class='fas fa-users'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Engagements</span>
<span class='info-box-number'>
  <?php 
  $result_users=$dbh->query("SELECT * FROM users where role='BN'");
  echo $count_users=$result_users->rowCount();
  ?>
</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

<section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Engegements</h3>
                     <?php 
                     if(isset($_POST['activate'])){
                      $id=$_POST['id'];
                      $update_users=$dbh->query("UPDATE users set status=1 WHERE autoid=$id");
                    //   $update_k=$dbh->query("UPDATE keyfields set status=1 WHERE autoid=$id");
                    if($update_users){
                      echo "<div class='alert alert-success'>Account Activated Successfully</div>
                      <meta http-equiv='refresh' content='3;'/>
                      ";
                    }else{
                      echo "<div class='alert alert-danger'>Failed</div>";
                    }
                     }
                     if(isset($_POST['deactivate'])){
                      $id=$_POST['id'];
                      $update_users=$dbh->query("UPDATE users set status=0 WHERE autoid=$id");
                    //   $update_k=$dbh->query("UPDATE keyfields set status=0 WHERE autoid=$id");
                    if($update_users){
                      echo "<div class='alert alert-success'>Account Deactivated Successfully</div>
                      <meta http-equiv='refresh' content='3;'/>
                      ";
                    }else{
                      echo "<div class='alert alert-danger'>Failed</div>";
                    }
                     }
                     ?>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-5" style="height: 300px;">
                <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Expert</th>
                      <th>Client_Name</th>
                      <th>Client_No</th>
                      <th>Message</th>
                      <th>Sent_on</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_users=$dbh->query("SELECT * FROM users where role='BN'");
                    $count_users=$result_users->rowCount();
                    $row_users=$result_users->fetchObject();
                    if($count_users > 0){
                      do{ ?>
                    <tr>
                      <td><?php echo $row_users->firstname;  ?></td>
                      <td><?php echo $row_users->phonenumber;  ?></td>
                      <td><?php echo $row_users->tradename; ?></td>
                      <td><?php echo $row_users->email; ?></td>
                      <td><a href="../../<?php echo $row_users->document; ?>"><i class='fa fa-download'></i></a></td>
                      <td><?php 
                       $st = $row_users->status == 1 ? "<span style='color:orange;font-weight 800px;'>active</span>" :  "<span style='color:red'>Not Active</span>";
                       echo $st;
                       ?></td>
                      <td>
                      <?php 
                      //  $act = $row_users->status == 1 ? "<a href='' class='btn btn-danger'>Deactivate</a>" :
                      //    "<a href='' class='btn btn-success'>Activate</a>";
                      //  echo $act;
                       if($row_users->status == 1 ){
                        ?>
                       <form method='post' onsubmit="return account_checker('Account','Deactivated');">
                        <input type='hidden' name='id' value='<?php echo $row_users->autoid; ?>'>
                        <button type='submit' name='deactivate' class='btn btn-danger' >
                        Deactivate</button>
                        </form>
                       <?php
                       }else{
                       ?>
                       <form method='post' onsubmit="return account_checker('Account','Activated');">
                        <input type='hidden' name='id' value='<?php echo $row_users->autoid; ?>'>
                        <button type='submit' name='activate' class='btn btn-success' >
                        Activate</button>
                        </form>
                        <?php } ?>
                      </td>
                    </tr>
                     <?php  }while($row_users=$result_users->fetchObject());
                    } ?>
                  </tbody>
                </table>
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
<!-- <script src="../plugins/chart.js/Chart.min.js"></script> -->
<script>
  $(function () {
   // Get context with jQuery - using jQuery's .get() method.
   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

   

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: false
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      }
    }],
    yAxes: [{
      gridLines : {
        display : false,
      }
    }]
  }
}

// This will get the first returned node in the jQuery collection.
new Chart(areaChartCanvas, {
  type: 'line',
  data: areaChartData,
  options: areaChartOptions
})


 var areaChartData = {
      labels  : ['2022-11-21', '2022-11-22', '2022-11-23', '2022-11-24', '2022-11-25', '2022-11-26', '2022-11-27'],
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Purchases',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Laptop',
          'Wood',
          'TV',
          'Electronic kettle',
          'Motocycle',
          'Cars',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

     // Get context with jQuery - using jQuery's .get() method.
     var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

 
  })
</script>
<script>
function account_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>  
<?php echo lscripts(); ?>
</body>
</html>
