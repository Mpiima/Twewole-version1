
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
  //error_reporting(0);
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
                  $aut = $_POST['autoid'];
                  $update_a = $dbh->prepare("UPDATE activities SET status=0 WHERE autoid=:autoid");
                  $update_a->bindParam(':autoid', $aut, PDO::PARAM_INT);
                  if($update_a->execute()){
                      echo "<div class='alert alert-danger'>Deleted Successfully</div>";
                  } else {
                      echo "<div class='alert alert-danger'>Failed to delete</div>";
                  }
              }
              
              if(isset($_POST['savedata'])) {
                  $title = $_POST['title'];
                  $date = $_POST['date'];
                  $location = $_POST['location'];
                  $details = $_POST['details'];
                  $time = $_POST['time'];
                  $target_dir = "uploads/activity/";
                  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      $uploadOk = 1;
                  } else {
                      $uploadOk = 0;
                  }
                  if (file_exists($target_file)) {
                      $uploadOk = 0;
                  }
                  if ($_FILES["fileToUpload"]["size"] > 500000) {
                      $uploadOk = 0;
                  }
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0) {
                      echo "Sorry, your file was not uploaded.";
                  } else {
                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                          echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                          echo "Sorry, there was an error uploading your file.";
                      }
                  }   
                  // Insert
                  $insert_act = $dbh->prepare("INSERT INTO activities (scheduledon, title, details, flyer, companyid, locations, timeed, status) VALUES (:scheduledon, :title, :details, :flyer, :companyid, :locations, :timeed, 1)");
                  $insert_act->bindParam(':scheduledon', $date);
                  $insert_act->bindParam(':title', $title);
                  $insert_act->bindParam(':details', $details);
                  $insert_act->bindParam(':flyer', $target_file);
                  $insert_act->bindParam(':companyid', $_SESSION['rolenumber']);
                  $insert_act->bindParam(':locations', $location);
                  $insert_act->bindParam(':timeed', $time);
              
                  if($insert_act->execute()){
                      echo "<div class='alert alert-success'>Saved Successfully!</div>";
                  } else {
                      echo "<div class='alert alert-danger'>Failed to insert!</div>";
                  }
              }
              
              if(isset($_POST['updatedata'])) {
                  $autoid = $_POST['autoid'];
                  $title = $_POST['title'];
                  $date = $_POST['date'];
                  $location = $_POST['location'];
                  $details = $_POST['details'];
                  $time = $_POST['time'];
                  $target_dir = "uploads/activity/";
                  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                  $uploadOk = 1;
                  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      $uploadOk = 1;
                  } else {
                      $uploadOk = 0;
                  }
                  if (file_exists($target_file)) {
                      $uploadOk = 0;
                  }
                  if ($_FILES["fileToUpload"]["size"] > 500000) {
                      $uploadOk = 0;
                  }
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                      $uploadOk = 0;
                  }
                  if ($uploadOk == 0) {
                      echo "Sorry, your file was not uploaded.";
                  } else {
                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                          echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                          echo "Sorry, there was an error uploading your file.";
                      }
                  }
                  // Update
                  $update_act = $dbh->prepare("UPDATE activities SET scheduledon=:scheduledon, title=:title, details=:details, flyer=:flyer, locations=:locations, timeed=:timeed WHERE autoid=:autoid");
                  $update_act->bindParam(':scheduledon', $date);
                  $update_act->bindParam(':title', $title);
                  $update_act->bindParam(':details', $details);
                  $update_act->bindParam(':flyer', $target_file);
                  $update_act->bindParam(':locations', $location);
                  $update_act->bindParam(':timeed', $time);
                  $update_act->bindParam(':autoid', $autoid, PDO::PARAM_INT);
              
                  if($update_act->execute()){
                      echo "<div class='alert alert-success'>Updated Successfully!</div>";
                  } else {
                      echo "<div class='alert alert-danger'>Failed to update!</div>";
                  }
              }
              ?>
              
                
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
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
                  $result_a=$dbh->query("SELECT * FROM activities where status=1 AND companyid='".$_SESSION['rolenumber']."'");
                  $count_a=$result_a->rowCount();
                  $row_a=$result_a->fetchObject();
                  if($count_a > 0){
                    do{ 
                      $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_a->companyid'");
                        $row_users=$result_users->fetchObject();
                      ?>
                 <tr>
                  <td><?php echo $row_a->title; ?></td>
                  <td><?php echo $row_a->details; ?></td>
                  <td><?php echo $row_a->scheduledon; ?></td>
                  <td><?php echo $row_a->timeed; ?></td>
                  <td style="width:30%">
                  <img width="20%" src="<?php echo $row_a->flyer; ?>" alt="No image">
                </td>
                  <td>
                    <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                     <a data-toggle='modal' data-target='#edit<?php echo $row_a->autoid; ?>'>
                     <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;
                        <input type='hidden' name='autoid' value='<?php echo $row_a->autoid; ?>'>
                        <button type='submit' name='deleten' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                    </form>


        <div class="modal fade" id="edit<?php echo $row_a->autoid; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Activity </h4>
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
                        <input type="hidden" value="<?php echo $row_a->autoid; ?>" name="autoid" >
                        <input type="text" class="form-control txtform" name="title" value='<?php echo $row_a->title; ?>'>
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control txtform" name="date" value='<?php echo $row_a->scheduledon; ?>' >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control txtform" name="time" value='<?php echo $row_a->timeed; ?>'>
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control txtform" name="location"  placeholder="Location" value='<?php echo $row_a->locations; ?>'>
                      </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                        <label>Promotional Advert</label>
                        <input required type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                      </div></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <div class="card-body">
                    <label>Activity Details</label>
                        <textarea class="form-control rounded-0"  name="details" rows="10" >
                        <?php echo $row_a->details; ?>
                       </textarea> 
                    </div>
                    </div> 
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
                    </td>
        
                 </tr>
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


