<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php kheader(); ?>
</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php kleftbar(); ?>
<!-- Main content -->

<?php 
if(!isset($_SESSION['role'])){
//redirect to login
}else if($_SESSION['role'] == "sp"){
?>
<section class='content'>
<div class='container-fluid'>
<!-- Info boxes -->
<div class='row'>
<!-- fix for small devices only -->
<div class='clearfix hidden-md-up'></div>
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <span style="font-size: 18px; font-weight: bold;">Activities</span>
                  <span style="font-size: 13px;">Activities list</span><span style="font-size: 15px;">&nbsp;| &nbsp;</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                 style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color:
                  whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Activity</a>
              </div>

    <?php 
  error_reporting(0);
  //insert activity 
   
    ?>


      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Activity </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST"  enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control txtform" name="title" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control txtform" name="date" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control txtform" name="time" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control txtform" name="location"  placeholder="Location">
                      </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>Promotional Advert</label>
                        <input required type="file" name="fileToUpload" id="fileToUpload" class="form-control ">
                      </div></div>
                  </div>
           
                  <div class="row">
                    <div class="col-lg-12">
                    <div class="card-body">
                    <label>Activity Details</label>
                        <textarea class="form-control rounded-0"  name="details" rows="10">
                       </textarea> 
                    </div>
                    </div>
                  </div>

               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="savedata" class="btn btn-primary">Save Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if(isset($_POST['deleten'])){
                  $aut=$_POST['autoid'];
                  $update_a=$dbh->query("UPDATE activities SET status=0 WHERE autoid=$aut");
                  if($update_a){
                    echo "<div class='alert alert-danger'>Deleted Successfully</div>";
                  }
                }
                if(isset($_POST['savedata']))
                {
                  $title=$_POST['title'];
                  $date=$_POST['date'];
                  $location=$_POST['location'];
                  $details=$_POST['details'];
                  $time=$_POST['time'];
                  $target_dir = "uploads/adverts/";
                  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                  "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
                  } else {
                  "File is not an image.";
                  $uploadOk = 0;
                  }
                  if (file_exists($target_file)) {
                  "Sorry, file already exists.";
                  $uploadOk = 0;
                  }
                  if ($_FILES["fileToUpload"]["size"] > 500000) {
                  "Sorry, your file is too large.";
                  $uploadOk = 0;
                  }
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif" ) {
                  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                  }
                  if ($uploadOk == 0) {
                  "Sorry, your file was not uploaded.";
                  } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                  "Sorry, there was an error uploading your file.";
                  }
                  }   
                  //insert
                  $insert_act=$dbh->query("INSERT INTO activities(scheduledon,title,details,flyer,companyid,locations,timeed,status	
                  )value('$date','$title','$details','$target_file','".$_SESSION['rolenumber']."','location','$time',1)");
                  
                  if($insert_act){
                    echo "<div class='alert alert-success'>Saved Successfully !</div>";
                  }else{
                    echo "<div class='alert alert-danger'>Failed to insert !</div>";
                  }


                }
                ?>
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>ScheduledBy</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Advert</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $result_a=$dbh->query("SELECT * FROM activities where status=1");
                  $count_a=$result_a->rowCount();
                  $row_a=$result_a->fetchObject();
                  if($count_a > 0){
                    do{ 
                      $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_a->companyid'");
                        $row_users=$result_users->fetchObject();
                      ?>
                 <tr>
                  <td><?php echo $row_users->tradename; ?></td>
                  <td><?php echo $row_a->title; ?></td>
                  <td><?php echo $row_a->details; ?></td>
                  <td><?php echo $row_a->scheduledon; ?></td>
                  <td><?php echo $row_a->timeed; ?></td>
                  <td style="width:30%"><img width="20%" src="<?php echo $row_a->flyer ?>"></td>
                  <td>
                    <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                     <a data-toggle='modal' data-target='#edit<?php echo $row_a->autoid; ?>'>
                     <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;<i style='color:orange' class='fa fa-eye'></i>
                        <input type='hidden' name='autoid' value='<?php echo $row_a->autoid; ?>'>
                        <button type='submit' name='deleten' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                    </form>
                    
                    </td>
                 </tr>

                 <div class="modal fade" id="#edit<?php echo $row_a->autoid; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Activity </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST"  enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control txtform" name="title" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control txtform" name="date" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control txtform" name="time" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control txtform" name="location"  placeholder="Location">
                      </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>Promotional Advert</label>
                        <input required type="file" name="fileToUpload" id="fileToUpload" class="form-control ">
                      </div></div>
                  </div>
           
                  <div class="row">
                    <div class="col-lg-12">
                    <div class="card-body">
                    <label>Activity Details</label>
                        <textarea class="form-control rounded-0"  name="details" rows="10">
                       </textarea> 
                    </div>
                    </div>
                  </div>

               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="savedata" class="btn btn-primary">Save Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

                    <?php }while($row_a=$result_a->fetchObject());
                  }
                
                  ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

</div>
</div><!--/. container-fluid -->
</section>

<script>
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>


<?php }else{
include 'bnactivities.php';
} ?>

<?php lscripts(); ?>
</body>
</html>
