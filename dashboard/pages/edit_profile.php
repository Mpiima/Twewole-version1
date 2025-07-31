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
<?php  if(isset($_SESSION['role'])){  
  $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  ?>
<!-- Main content -->
<section class='content'>
<div class='container-fluid'>

<section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">PROFILE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">
               
              
<div class="container " >
    <div class="row d-flex justify-content-center align-items-center">
      <?php 
      if(isset($_POST['updatedetails'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        // $address=$_POST['address'];
        $website=$_POST['website'];
        $tradename=$_POST['tradename'];
        $update_users=$dbh->query("UPDATE users set firstname='$fname',lastname='$lname',email='$email',phonenumber='$contact',website='$website',tradename='$tradename' WHERE rolenumber='".$_SESSION['rolenumber']."'");
        if($update_users){ echo "<div class='alert alert-success'>updated successfully</div>";
            
               ?><script>
                    var allowed=function(){window.location='edit_profile';}
                    setTimeout(allowed,1000);
                    </script>
                    <?php
        }else{echo "<div class='alert alert-danger'>failed</div>";}
      }
      ?>
        <div class="col-md-12">
            <form id="regForm" style="margin-top:20px;" method="POST" enctype="multipart/form-data">
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                         <div class="tab">
                            <div class="row">
                                <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>First Name <span class="must">*</span></label>
                                <input type="text" value="<?php echo $row_users->firstname; ?>" required="true" class="form-control" name="fname" placeholder="Enter First name">
                            </div>
                             <div class="form-group mb-3">
                                 <label>Last Name<span class="must">*</span></label>
                                <input type="text"  value="<?php echo $row_users->lastname; ?>" required="true" class="form-control" name="lname" placeholder="Enter Last name">
                            </div>
                            <div class="form-group mb-3">
                                 <label>Email<span class="must">*</span></label>
                                <input type="text"  value="<?php echo $row_users->email; ?>" required="true" class="form-control" name="email" placeholder="Enter Your Email">
                            </div>
                            <!-- <div class="form-group mb-3">
                            <label>Company Address<span class="must">*</span></label>
                            <select name="address" class="form-control" required> 
                                <option>-select-</option>
                                <?php
                                $result_streets=$dbh->query("SELECT * FROM street");
                                $count_streets=$result_streets->rowCount();
                                $row_streets=$result_streets->fetchObject();
                                if($count_streets>0){
                                    do{ 
                                        echo "<option value='".$row_streets->auto_id."'>".$row_streets->street."</option>";
                                }while($row_streets=$result_streets->fetchObject()); } ?>
                            </select>
                            </div> -->
                            <div class="form-group mb-3">
                             <label>Contact No.<span class="must">*</span></label>
                            <input type="text"  value="<?php echo $row_users->phonenumber; ?>" required="true" class="form-control" name="contact" placeholder="Tel no.">
                        </div>
                         <div class="form-group mb-3">
                             <label>Website</label>
                            <input type="text"  value="<?php echo $row_users->website; ?>" class="form-control" name="website" placeholder="Your Website">
                        </div>
                            <div class="form-group mb-3">
                                 <label>Trading/Business name<span class="must">*</span></label>
                                <input type="text"  value="<?php echo $row_users->tradename; ?>" required="true" class="form-control" name="tradename" placeholder="Trading/Business name">
                            </div>     
                   
                         <div class="form-group mb-3">
                             <input type="submit" name="updatedetails" class="btn-sm btn-primary" value="UpdateProfileDetails">     
                         </div> </div></form>
                              
                         <?php 
                         error_reporting(0);
                         if(isset($_POST['updatelogo'])){
                        //get the logo========
                        // $logo=$_POST['logo'];
                        $target_dir = "uploads/logos/";
                        $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["logo"]["tmp_name"]);
                        if($check !== false) {
                        "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        } else {
                        "File is not an image.";
                        $uploadOk = 0;
                        }
                        // Check if file already exists
                        if (file_exists($target_file)) {
                        "Sorry, file already exists.";
                        $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["logo"]["size"] > 500000) {
                        "Sorry, your file is too large.";
                        $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                        "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
                        $update_logo=$dbh->query("UPDATE users set logo='$target_file' WHERE rolenumber='".$_SESSION['rolenumber']."'");
                     //meta refresh=======================================
                     if($update_logo){
                   
                        // echo "<div class='alert alert-success'>Edited Successfully</div>";
                        echo "<script>setTimeout(function(){ window.location.href = 'edit_profile'; }, 1000);</script>";
                      
                     }
                      } else {
                         "Sorry, there was an error uploading your file.";
                        }
                        }
                      }
                         ?>
                         <div class="col-lg-6" style="margin-top:50px;">
                         <form  enctype="multipart/form-data" method="POST">
                        <div class="form-group mb-3">
                          <div class="row">
                            <div class="col-lg-6">
                            <!-- <?php echo $row_users->logo; ?> -->
                            <img src="<?php echo $row_users->logo; ?>" alt="No Image" width="100%" >
                            </div>
                            <div class="col-lg-4">
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="logo">
                            </div>
                            <div class="col-lg-2">
                             <input type="submit" name="updatelogo" class="btn-sm btn-primary" value="updatePic">     
                         </div>
                          </div>
                        </div>
                      </form>

                       
                         <!-- <div class="form-group mb-3">                
                         <label>Attach Company Support Documents<span class="must">*</span></label>
                            <input type="file" required  class="form-control" name="document" id="document" placeholder="Tel no.">
                        </div> -->
                      <?php 
                      if(isset($_POST['changepssword'])){
                        $password=$_POST['password'];
                        $update_password=$dbh->query("UPDATE users SET password ='$password' where rolenumber='".$_SESSION['rolenumber']."'");
                        $update_k=$dbh->query("UPDATE keyfields SET password ='$password' where rolenumber='".$_SESSION['rolenumber']."'");
                        if($update_password){
                          echo "<div class='alert alert-success'>Password changed</div>";
                          session_destroy();
                          ?><script>
                    var allowed=function(){window.location='edit_profile';}
                    setTimeout(allowed,1000);
                    </script>
                    <?php
                        }else{
                          echo "<div class='alert alert-danger'>Falied </div>";
                        }
                      }
                      ?>
                       <form style="margin-top:100px;" method="POST"> 
                       <div class="row">
                        <div class="col-lg-10">
                              <!-- <label>Set NewPassword</label> -->
                                <input class="form-control" id="myInput" required="true" type="password" name="password" placeholder="Set New Password" >
                               <input  type="checkbox" onclick="myFunction()"> &nbsp;&nbsp;show password
                          </div> 
                              
                              <div class="col-lg-2">
                          <div class="form-group mb-3">
                             <input type="submit" name="changepssword" class="btn-sm btn-primary" 
                             value="Set New Password">     
                         </div> 
                         </div>  </div>
                              </div>
                         </form>
                         
                     </div>
                    </div>
         
        </div>
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
