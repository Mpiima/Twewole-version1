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
                 <span style="font-size: 18px; font-weight: bold;">Hi, <?php echo $_SESSION['tradename'] ?></span><br>
                  <span style="font-size: 13px;">Notice Of Sale list</span><span style="font-size: 15px;">&nbsp;| &nbsp;</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                 style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color:
                  whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Notice Of Sale</a>
              </div>

    <?php 
 // error_reporting(0);
  //insert activity 
   
    ?>
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Notice Sale </h4>
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
                        <label>Principal Debtor </label>
                        <input type="text" class="form-control txtform" name="fullname"  placeholder="Fullname">
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Advertised on</label>
                        <input type="date" class="form-control txtform" name="advertisedon" >
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Newspaper</label>
                        <input type="text" class="form-control txtform" name="newspaper" placeholder="e.g Monitor">
                      </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
                        <label>Upload Advert</label>
                        <input required type="file" name="fileToUpload" id="fileToUpload" class="form-control txtform">
                      </div></div>
                  </div>
           
               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="savedata" class="btn btn-primary">Save Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
        </div>
      </div>
      <!-- /.modal -->



              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                error_reporting(0);
                  if(isset($_POST['deleten'])){
                    $aut=$_POST['autoid'];
                    $update_a=$dbh->query("UPDATE noticeofsale SET status=0 WHERE autoid=$aut");
                    if($update_a){
                      echo "<div class='alert alert-danger'>Deleted Successfully</div>";
                    }
                  }

                if(isset($_POST['savedata'])){
                  $fullname=$_POST['fullname'];
                  $newspaper=$_POST['newspaper'];
                  $advertisedon=$_POST['advertisedon'];

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
                  $insert_notice=$dbh->query("INSERT INTO noticeofsale(debtor,advertisedon,newspaper,advert,status)
                  value('$fullname','$advertisedon','$newspaper','$target_file',1)");

                  if($insert_notice){
                    echo "<div class='alert alert-success'>Saved Successfully !</div>";
                  }else{
                    echo "<div class='alert alert-danger'>Failed to insert !</div>";
                  }
                }

                if(isset($_POST['updatedata'])){
                    $fullname=$_POST['fullname'];
                    $newspaper=$_POST['newspaper'];
                    $advertisedon=$_POST['advertisedon'];
                    $id=$_POST['autoid'];
                   if($_FILE['fileToUpload2']['size'][0] ==0){
                    $target_dir = "uploads/adverts/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
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
                    if ($_FILES["fileToUpload2"]["size"] > 500000) {
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
                    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
                    "The file ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). " has been uploaded.";
                    } else {
                    "Sorry, there was an error uploading your file.";
                    }
                    } 
                    $update_notice=$dbh->query("UPDATE noticeofsale SET debtor='$fullname', advertisedon='$advertisedon',newspaper='$newspaper',advert=' $target_file' WHERE autoid=$id ");

                   }else{
                    $update_notice=$dbh->query("UPDATE noticeofsale SET debtor='$fullname', advertisedon='$advertisedon',newspaper='$newspaper' WHERE autoid=$id ");
                   }
                    if($update_notice){
                      echo "<div class='alert alert-success'>Edited Successfully !</div>";
                    }else{
                      echo "<div class='alert alert-danger'>Failed to Edit !</div>";
                    }
                  }


                ?>
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Principal Debtor</th>
                    <th>Newspaper</th>
                    <th>Advertisedon</th>
                    <th>Advert</th>                
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $result_n=$dbh->query("SELECT * FROM noticeofsale where status=1");
                  $count_n=$result_n->rowCount();
                  $row_n=$result_n->fetchObject();
                  if($count_n > 0){
                    do{ 
                      
                      $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_n->rolenumber'");
                        $row_users=$result_users->fetchObject();?>
                 <tr>
                  <td><?php echo $row_n->debtor; ?></td>
                  <td><?php echo $row_n->newspaper; ?></td>
                  <td><?php echo $row_n->advertisedon; ?></td>

                  <td style="width:30%"><img width="20%" src="<?php echo $row_n->advert ?>"></td>
                 
                  <td>
                    <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                     <a data-toggle='modal' data-target='#edit<?php echo $row_n->autoid; ?>'>
                     <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;
                        <input type='hidden' name='autoid' value='<?php echo $row_n->autoid; ?>'>
                        <button type='submit' name='deleten' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                    </form>
                    </td> 
                 </tr>

                  <!-- /.modal -->
    <div class="modal fade" id="edit<?php echo $row_n->autoid; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Notice Sale </h4>
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
                        <label>Principal Debtor </label>
                        <input type="text" value="<?php echo $row_n->autoid; ?>" name="autoid"> 
                        <input type="text" class="form-control txtform" name="fullname"  value="<?php echo $row_n->debtor; ?>">
                      </div> 
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Advertised on</label>
                        <input type="date" class="form-control txtform" name="advertisedon" value="<?php echo $row_n->advertisedon; ?>">
                      </div>
                    </div>
                    <div class="col-sm-3">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Newspaper</label>
                        <input type="text" class="form-control txtform" name="newspaper" value="<?php echo $row_n->newspaper; ?>">
                      </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
                        <label>Change Advert Image</label>
                        <input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control txtform">
                      </div></div>
                  </div>
           
               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
        </div>
      </div>
      <!-- /.modal -->
                    <?php }while($row_n=$result_n->fetchObject());
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

