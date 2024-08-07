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
                  <span style="font-size: 13px;">Asset Leasing list</span><span style="font-size: 15px;">&nbsp;| &nbsp;</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                 style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;create</a>
              </div>

    <?php 
  error_reporting(0);
  if(isset($_POST['saveloan'])){
    $title = $_POST['title']; 
    $nature = $_POST['nature']; 
    $amount = $_POST['amount']; 
    $link = $_POST['link']; 
    $summary = $_POST['summary'];
    $status = 1;
    
    // Fetch user information
    $stmt_users = $dbh->prepare("SELECT * FROM users WHERE rolenumber = :rolenumber LIMIT 1");
    $stmt_users->bindParam(':rolenumber', $_SESSION['rolenumber']);
    $stmt_users->execute();
    $row_users = $stmt_users->fetch(PDO::FETCH_OBJ);
    
    // Fetch scrap information
    $stmt_scrap = $dbh->prepare("SELECT * FROM scrap WHERE item = :tradename");
    $stmt_scrap->bindParam(':tradename', $row_users->tradename);
    $stmt_scrap->execute();
    $row_scrap = $stmt_scrap->fetch(PDO::FETCH_OBJ);
    $inst = $row_scrap->autoid;
    
    // Generate loan ID
    $role = "PRDT";
    $yy = date("Y"); 
    $fyy = substr($yy, 2, 2);
    $mm = date("m"); 
    $dd = date("d");
    $hi = date("h"); 
    $mi = date("i");
    $fsa = date("sa"); // Assuming this is a typo, as $sa is already formatted
    
    $loanid = $role; // Default loan ID
    
    // Check if there are existing products
    $stmt_products = $dbh->query("SELECT * FROM products ORDER BY auto_id DESC LIMIT 1");
    $row_products = $stmt_products->fetch(PDO::FETCH_OBJ);
    $count_products = $stmt_products->rowCount();
    
    if($count_products > 0){
        // Extract the last loan ID
        $last_loan_id = $row_products->loan_id;
        if(strpos($last_loan_id, $role) === 0){
            $last_auto_id = intval(substr($last_loan_id, strlen($role)));
            $loanid = $role . ($last_auto_id + 1);
        }
    }
    
    // Construct loan ID
    $id = $loanid . $fyy . $mm . $dd . $hi . $mi . $fsa;
    
    // File upload handling
    $target_dir = "uploads/banners/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is an actual image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
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
            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
            
            // Insert into database using prepared statement
            $stmt_insert = $dbh->prepare("INSERT INTO products (addedby, type, nature, institution, amount_range, summary, link, status, title, loan_id, advert) 
            VALUES (:addedby, 'lease', :nature, :inst, :amount, :summary, :link, :status, :title, :id, :advert)");
            
            $stmt_insert->bindParam(':addedby', $_SESSION['rolenumber']);
            $stmt_insert->bindParam(':nature', $nature);
            $stmt_insert->bindParam(':inst', $inst);
            $stmt_insert->bindParam(':amount', $amount);
            $stmt_insert->bindParam(':summary', $summary);
            $stmt_insert->bindParam(':link', $link);
            $stmt_insert->bindParam(':status', $status);
            $stmt_insert->bindParam(':title', $title);
            $stmt_insert->bindParam(':id', $id);
            $stmt_insert->bindParam(':advert', $target_file);
            
            if($stmt_insert->execute()){
                echo "<div class='alert alert-success'>Added Successfully</div>";
                echo "<script>setTimeout(function(){ window.location.href = 'create_lease'; }, 1000);</script>";
            } else {
                echo "<div class='alert alert-danger'>Added failed</div>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


// Update section
if(isset($_POST['updateData'])) {
  $title = $_POST['title']; 
  $nature = $_POST['nature']; 
  $amount = $_POST['amount']; 
  $link = $_POST['link']; 
  $summary = $_POST['summary'];
  $autoid = $_POST['autoid'];

  // Check if a new file was uploaded
  if($_FILES["fileToUpload"]["name"] != "") {
      $target_dir = "uploads/banners/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Check if image file is a valid image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }

      // Allow only certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }

      // If everything is ok, try to upload file
      if ($uploadOk == 1) {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
              $uploadOk = 0;
          }
      }
  }

  // Update database based on whether a new file was uploaded
  if ($uploadOk == 1) {
      // Prepare update query
      if (!empty($target_file)) {
          $stmt_update = $dbh->prepare("UPDATE products SET nature=?, amount_range=?, summary=?, link=?, title=?, advert=? WHERE auto_id=?");
          $stmt_update->bindParam(1, $nature);
          $stmt_update->bindParam(2, $amount);
          $stmt_update->bindParam(3, $summary);
          $stmt_update->bindParam(4, $link);
          $stmt_update->bindParam(5, $title);
          $stmt_update->bindParam(6, $target_file);
          $stmt_update->bindParam(7, $autoid);
      } else {
          $stmt_update = $dbh->prepare("UPDATE products SET nature=?, amount_range=?, summary=?, link=?, title=? WHERE auto_id=?");
          $stmt_update->bindParam(1, $nature);
          $stmt_update->bindParam(2, $amount);
          $stmt_update->bindParam(3, $summary);
          $stmt_update->bindParam(4, $link);
          $stmt_update->bindParam(5, $title);
          $stmt_update->bindParam(6, $autoid);
      }

      // Execute update query
      if ($stmt_update->execute()) {
          echo "<div class='alert alert-success'>Edited Successfully</div>";
          echo "<script>setTimeout(function(){ window.location.href = 'create_loan'; }, 1000);</script>";
      } else {
          echo "<div class='alert alert-danger'>Update failed</div>";
      }
  } else {
      echo "<div class='alert alert-danger'>Update failed due to file upload errors</div>";
  }
}

//delete
    if(isset($_POST['delete'])){
      $autoid=$_POST['autoid'];
     $delete_products=$dbh->query("UPDATE products SET status=0 WHERE auto_id=$autoid");
    if($delete_products){
     echo "<div class='alert alert-success'>Deleted Succcessfully</div>";
     ?><script>
       var allowed=function(){window.location='create_loan';}
       setTimeout(allowed,1000);
       </script>
       <?php
    }else{
     echo "<div class='alert alert-danger'>Deleting falied</div>";
    }
    }
    ?>


      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST"  enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control txtform" name="title" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Nature Of the Lease</label>
                        <select class="form-control" name="nature" required>
                            <option>-select-</option>
                            <?php
                    $result_scrap=$dbh->query("SELECT * FROM scrap where item2='lease'");
                    $count_scrap=$result_scrap->rowCount();
                    $row_scrap=$result_scrap->fetchObject();
                    if($count_scrap>0){
                        $n=1;
                        do{
                        echo "<option value='".$row_scrap->autoid."'>".$row_scrap->item."</option>";
                        }while($row_scrap=$result_scrap->fetchObject());
                    }
                    ?>
                      
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Amount Range/Details</label>
                        <input type="text" class="form-control txtform" name="amount">
                      </div></div>
                  </div>
                <div class="row">
                  <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Application Link</label>
                        <input type="text" class="form-control txtform" name="link">
                      </div>
                    </div>
                    <div class="col-sm-8">
                    <label>Promotion Image</label>
                    <div class="card-body">
                    <input required type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                    <label>Short Description</label>
                    <div class="card-body">
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="summary">
                       </textarea> 
                    </div>
                    </div>
                  </div>

               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="saveloan" class="btn btn-primary">submit</button>
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
                    <th>Title</th>
                    <th>Nature</th>
                    <th>Amount</th>
                    <th>Lease Benefits</th>
                    <th>Lease Requirements</th>
                    <th>Promotion Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='lease' AND addedby='".$_SESSION['rolenumber']."' ORDER BY auto_id desc ");
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
                      <td>
                      <a href="pdet?id=<?php echo $row_products->loan_id; ?>&&type=<?php echo "benefit"; ?>"  style="font-size:12px;"><i class="fa fa-plus"></i>&nbsp;add benefits</a>
                      <?php 
                $result_p=$dbh->query("SELECT * FROM p_details where productid='".$row_products->loan_id."' 
                and benefits !='' ");       
                $count_p=$result_p->rowCount();
                $row_p=$result_p->fetchObject();
                if($count_p>0){
                    do{
                      ?>
                        <li> <?php echo $row_p->benefit_title; ?> </li>
                      <?php 
                    }while($row_p=$result_p->fetchObject()); }
                   ?>
                      </td>
                      <td>
                        <a href="pdet?id=<?php echo $row_products->loan_id; ?>&&type=<?php echo "feature"; ?>" style="font-size:12px;"><i class="fa fa-plus"></i>&nbsp;add requirements </a>
                      <?php 
                $result_p=$dbh->query("SELECT * FROM p_details where productid='".$row_products->loan_id."' 
                and feature !='' ");       
                $count_p=$result_p->rowCount();
                $row_p=$result_p->fetchObject();
                if($count_p>0){
                    do{
                      ?>
                        <li> <?php echo $row_p->feature_title; ?> </li>
                      <?php 
                    }while($row_p=$result_p->fetchObject()); }
                   ?>
                      </td>
                      <td width="20%"><a href='<?php echo $row_products->advert; ?>' target='_blank'>
                      <img src="<?php echo $row_products->advert; ?> " width="20%" alt="No Image">
                    </a></td>
                      <td>
                     <form method='post' onsubmit="return delete_checker('Data','Deleted');">
            <a data-toggle='modal' data-target='#edit<?php echo $row_products->auto_id; ?>'>
          <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;<a target="_blank" href="../../pdetails?id=<?php echo $row_products->loan_id; ?>"><i style='color:orange' class='fa fa-eye'></i> view</a>
                        <input type='hidden' name='autoid' value='<?php echo $row_products->auto_id; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      </form>
                    
                    </td>
                  </tr>
      <!-- EDITING MODAL  -->
      <div class="modal fade" id="edit<?php echo $row_products->auto_id; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>   
            <form method="POST"  enctype="multipart/form-data">
              
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="hidden" name="autoid" value="<?php echo $row_products->auto_id; ?>">
                        <input type="text" class="form-control txtform" name="title" value="<?php echo $row_products->title;  ?>" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Nature Of the Lease</label>
                        <select class="form-control" name="nature" required>
                    <?php
                    $result_scrap1=$dbh->query("SELECT * FROM scrap where item2='lease' AND autoid='$row_products->nature'");
                    $row_scrap1=$result_scrap1->fetchObject();

                    $result_scrap=$dbh->query("SELECT * FROM scrap where item2='lease'");
                    $count_scrap=$result_scrap->rowCount();
                    $row_scrap=$result_scrap->fetchObject();

                    echo "<option value='$row_scrap1->autoid'>$row_scrap1->item</option>";
                    if($count_scrap>0){
                        $n=1;
                        do{
                        echo "<option value='".$row_scrap->autoid."'>".$row_scrap->item."</option>";
                        }while($row_scrap=$result_scrap->fetchObject());
                    }
                    ?>
                      
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Amount Range/Details</label>
                        <input type="text" class="form-control txtform" name="amount" value="<?php echo $row_products->amount_range;  ?>">
                      </div></div>
                  </div>
                <div class="row">
                  <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Application Link</label>
                        <input type="text" class="form-control txtform" name="link" value="<?php echo $row_products->link;  ?>">
                      </div>
                    </div>
                    <div class="col-sm-8">
                    <label>Promotion Image</label>
                    <div class="card-body">
                    <input  type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label>Short Description</label>
                    <div class="card-body">
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="summary" ><?php echo $row_products->summary;  ?>
                       </textarea> 
                    </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="updateData" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- ENDS here --> 
                     <?php
                      }while($row_products=$result_products->fetchObject());
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