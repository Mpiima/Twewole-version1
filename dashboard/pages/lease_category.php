<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php kheader(); ?>
</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php kleftbar(); ?>
<!-- Main content -->
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
                 <span style="font-size: 18px; font-weight: bold;">Asset Leasing</span> 
                 <span style="font-size: 13px;">-</span><span style="font-size: 15px;">&nbsp;|
                  &nbsp;Asset Leasing Category</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;create</a>
              </div>
            <?php
            error_reporting(1);
            if(isset($_POST['savecat'])){
               $category=$_POST['category'];
               $type="lease";
             
                // Upload file
      $target_dir = "uploads/logos/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      } else {
          // if everything is ok, try to upload file
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }

      $up="dashboard/pages/".$target_file;
      $insert_scrap=$dbh->query("INSERT INTO scrap(item,item2,item4)values('$category','$type','$up')");

                if($insert_scrap){
                    echo "<div class='alert alert-success'>Added successfully</div>";
                    ?><script>
                    var allowed=function(){window.location='lease_category';}
                    setTimeout(allowed,1000);
                    </script>
                    <?php
                }else{
                    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

                }

            } 


            
            if(isset($_POST['updatecat'])){
              $category=$_POST['category'];
              $type="lease";
              $autoid=$_POST['autoid'];
            
              $target_file = "";
              $uploadOk = 1;

              if($_FILES["fileToUpload"]["name"] != ""){
               // Upload file
     $target_dir = "uploads/logos/";
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
     
     // Check if image file is a actual image or fake image
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
     
     // Check file size
     if ($_FILES["fileToUpload"]["size"] > 500000) {
         echo "Sorry, your file is too large.";
         $uploadOk = 0;
     }
     
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
     
     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
     } else {
         // if everything is ok, try to upload file
         if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
             echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
    }

    if(!empty($target_file)){
     $up="dashboard/pages/".$target_file;
     $update_scrap=$dbh->query("UPDATE scrap SET item = '$category', item4='$up' WHERE autoid=$autoid");
    }else{
      $update_scrap=$dbh->query("UPDATE scrap SET item = '$category' WHERE autoid=$autoid");
    }

    //  $up="dashboard/pages/".$target_file;
    //  $insert_scrap=$dbh->query("INSERT INTO scrap(item,item2,item4)values('$category','$type','$up')");

               if($update_scrap){
                   echo "<div class='alert alert-success'>updated successfully</div>";
                   ?><script>
                   var allowed=function(){window.location='lease_category';}
                   setTimeout(allowed,1000);
                   </script>
                   <?php
               }else{
                   echo "<div class='alert alert-danger'>Failed! Try Again</div>";

               }

           } 




           //delete
    if(isset($_POST['delete'])){
      $autoid = $_POST['autoid'];
     $delete_s=$dbh->query("DELETE FROM scrap WHERE autoid = $autoid");
    if($delete_s){
     echo "<div class='alert alert-success'>Deleted Succcessfully</div>";
     ?><script>
       var allowed=function(){window.location='lease_category';}
       setTimeout(allowed,1000);
       </script>
       <?php
    }else{
     echo "<div class='alert alert-danger'>Deleting falied</div>";
    }
    }
            ?>

             <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Category</label>
                        <input required type="text" class="form-control txtform" name="category" >
                      </div>

                      <div class="form-group">
                      <label>Category Image</label>
                    <div class="card-body">
                    <input required type="file" name="fileToUpload" id="fileToUpload">
                    </div>

                      </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary" name="savecat">submit</button>
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
            <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                style="width: 100%;">
                <thead>
                <tr style="font-size: 13px;">
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
                </tr>
                </thead>
                <tr>
                    <?php
                    $result_scrap=$dbh->query("SELECT * FROM scrap where item2='lease'");
                    $count_scrap=$result_scrap->rowCount();
                    $row_scrap=$result_scrap->fetchObject();
                    if($count_scrap>0){
                        $n=1;
                        do{
                        echo "
                    <tr>
                    <td>".$n++."</td>
                    <td>".$row_scrap->item."</td>"; ?>
                     <td> <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                   
                        <input type='hidden' name='autoid' value='<?php echo $row_scrap->autoid; ?>' >
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                        <a data-toggle='modal' data-target='#edit<?php echo $row_scrap->autoid; ?>'>
                        <i  style='color:blue' class='fa fa-edit'></i></a>
                      </form></td></tr>

                      <div class="modal fade"  id="edit<?php echo $row_scrap->autoid; ?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Category</label>
                        <input type="hidden" name="autoid" value="<?php echo $row_scrap->autoid; ?>">
                        <input required type="text"value="<?php echo $row_scrap->item; ?>"  class="form-control txtform" name="category" >
                      </div>

                      <div class="form-group">
                      <label>Category Image</label>
                    <div class="card-body">
                    <input  type="file" name="fileToUpload" id="fileToUpload">
                    </div>

                      </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary" name="updatecat">submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                <?php
                        }while($row_scrap=$result_scrap->fetchObject());
                    }
                    ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <script>
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>

</div>

<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>

<?php lscripts(); ?>
</body>
</html>
