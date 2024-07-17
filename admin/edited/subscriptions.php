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
                    </div> 
                    </div>

                </h5>
              </div>
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
                    <th>Subscribed_on</th>
                    <th>Expiry Date</th>
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='grant' AND addedby='".$_SESSION['rolenumber']."' ORDER BY auto_id desc ");
                    $count_products=$result_products->rowCount();
                    $row_products=$result_products->fetchObject();
                    if($count_products>0){
                      $n=1;
                      do{
                        //get institution
                    $result_scrap=$dbh->query("SELECT * FROM scrap where autoid='".$row_products->institution."'");
                    $count_scrap=$result_scrap->rowCount();
                    $row_scrap=$result_scrap->fetchObject();

                    $result_nature=$dbh->query("SELECT * FROM scrap where autoid = '".$row_products->nature."'");
                    $count_nature=$result_nature->rowCount();
                    $row_nature=$result_nature->fetchObject();

                      echo "<tr>
                      <td>".$n++."</td>
                      <td>".$row_products->title."</td>
                      <td>".$row_nature->item."</td>
                      <td>".$row_products->amount_range."</td>"; ?>
                  </tr>
                     <?php
                      }while($row_products=$result_products->fetchObject());
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
