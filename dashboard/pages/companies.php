<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<?php kheader(); ?>
</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php echo kleftbar(); ?>
<!-- Main content -->
<section class='content'>
<div class='container-fluid'>
<div class="card card-primary">
<div class="card card-header"><div class="card-title"><h4>COMPANIES - INSTITUTIONS</h4></div></div>
<div class="card-body">
<div id="alert_out"></div>

<?php 
if(isset($_POST['saved'])){
    $company=$_POST['company'];
    $item2="company";
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $category=$_POST['category'];
    $email=$_POST['email'];
$target_dir = "uploads/logos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    "Sorry, there was an error uploading your file.";
  }
}



$insert_company=$dbh->query("INSERT INTO scrap(item,type,item2,item3,item4,item5,item7)values('$company','$item2','$contact','$address',
'$target_file','$category','$email')");
if($insert_company){
    echo "<div class='alert alert-success'>Added successfully</div>";
    ?><script>
    var allowed=function(){window.location='companies';}
    setTimeout(allowed,1000);
    </script>
    <?php
}else{
    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

}

}


if(isset($_POST['update'])){
    $company=$_POST['company'];
    $item2="company";
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $category=$_POST['category'];
    $email=$_POST['email'];

$update_company=$dbh->query("UPDATE scrap SET item='$company', item2='$contact',item3='$address',item5='$category',item7='$email' WHERE autoid= '".$_GET['id']."' ");
if($update_company){
    echo "<div class='alert alert-success'>Updated successfully</div>";
    ?><script>
    var allowed=function(){window.location='companies';}
    setTimeout(allowed,1000);
    </script>
    <?php
}else{
    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

}

}

if(isset($_GET['delete'])){
  

$delete_company=$dbh->query("DELETE FROM scrap WHERE autoid= '".$_GET['delete']."' ");
if($delete_company){
    echo "<div class='alert alert-success'>Deleted successfully</div>";
    ?><script>
    var allowed=function(){window.location='companies';}
    setTimeout(allowed,1000);
    </script>
    <?php
}else{
    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

}

}


?>

<div class="row">
<div class="col-lg-6">
  
<?php 
if(isset($_GET['id'])){
    $result_scrap=$dbh->query("SELECT * FROM scrap where autoid='".$_GET['id']."' ");
    $count_scrap=$result_scrap->rowCount();
    $row_scrap=$result_scrap->fetchObject();
    if($count_scrap>0){
    $no=1;
    do{
    $result_scrap2=$dbh->query("SELECT * FROM scrap where autoid='".$row_scrap->item5."'");
    $count_scrap2=$result_scrap2->rowCount();
    $row_scrap2=$result_scrap2->fetchObject();

    $result_streets=$dbh->query("SELECT * FROM street where auto_id='".$row_scrap->item3."'");
    $count_streets=$result_streets->rowCount();
    $row_streets=$result_streets->fetchObject();

    $result_account=$dbh->query("SELECT * FROM account_type WHERE autoid='".$row_scrap->item5."'");
    $row_account=$result_account->fetchObject();
?>

<form method="POST" enctype="multipart/form-data">
    <label>Category</label>
    <select class="form-control" name="category">
            <option>- select -</option>
              <?php
              $result_account=$dbh->query("SELECT * FROM account_type");
              $count_account=$result_account->rowCount();
              $row_account=$result_account->fetchObject();
              if($count_account>0){
                  do{
                  echo "<option value=".$row_account->autoid.">".$row_account->accountname."</option>";
                      }while($row_account=$result_account->fetchObject());
              }
              ?> 
    </select>
<label>Company Name</label>
<input type="text" name="company" placeholder="Company Name" class="form-control" value="<?php echo $row_scrap->item; ?>">  
<br>
<label>Contact/Tel</label>
<input type="text" name="contact" placeholder="Company Contact" class="form-control"  value="<?php echo $row_scrap->item2; ?>">  
<br>
<label>Email</label>
<input type="text" name="email" placeholder="Company Email" class="form-control" value="<?php echo $row_scrap->item7; ?>">  
<br>
<label>Company Address</label>
<select name="address" class="form-control"> 
    <option>-select-</option>
     <?php
     $result_streets=$dbh->query("SELECT * FROM street");
     $count_streets=$result_streets->rowCount();
     $row_streets=$result_streets->fetchObject();
     if($count_streets>0){
        do{ 
            echo "<option value='".$row_streets->auto_id."'>".$row_streets->street."</option>";
      }while($row_streets=$result_streets->fetchObject()); } ?>
</select><br>

<div class="form-group">
<input type="submit" name="update" class="btn btn-sm btn-primary" value="Update Data">  
</div>
</form>

<?php 
 }while($row_scrap=$result_scrap->fetchObject()); }
}else { ?>

<form method="POST" enctype="multipart/form-data">
    <label>Category</label>
    <select class="form-control" name="category">
            <option>- select -</option>
              <?php
              $result_account=$dbh->query("SELECT * FROM account_type");
              $count_account=$result_account->rowCount();
              $row_account=$result_account->fetchObject();
              if($count_account>0){
                  do{
                  echo "<option value=".$row_account->autoid.">".$row_account->accountname."</option>";
                      }while($row_account=$result_account->fetchObject());
              }
              ?> 
    </select>
<label>Company Name</label>
<input type="text" name="company" placeholder="Company Name" class="form-control">  
<br>
<label>Contact/Tel</label>
<input type="text" name="contact" placeholder="Company Contact" class="form-control">  
<br>
<label>Email</label>
<input type="text" name="email" placeholder="Company Email" class="form-control">  
<br>

<label>Company Address</label>
<select name="address" class="form-control"> 
    <option>-select-</option>
     <?php
     $result_streets=$dbh->query("SELECT * FROM street");
     $count_streets=$result_streets->rowCount();
     $row_streets=$result_streets->fetchObject();
     if($count_streets>0){
        do{ 
            echo "<option value='".$row_streets->auto_id."'>".$row_streets->street."</option>";
      }while($row_streets=$result_streets->fetchObject()); } ?>
</select><br>
<label>Logo</label>
<input required type="file" name="fileToUpload" id="fileToUpload">
<br>
<br><br>
<div class="form-group">
<input type="submit" name="saved" class="btn btn-sm btn-primary" value="Submit Data">  
</div>
</form>

<?php } ?>
</div>






<div class="col-lg-6">
<div class="card-body">
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>No</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>logo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                   $result_scrap=$dbh->query("SELECT * FROM scrap where type='company'");
                   $count_scrap=$result_scrap->rowCount();
                   $row_scrap=$result_scrap->fetchObject();
                   if($count_scrap>0){
                    $no=1;
                    do{
                    $result_scrap2=$dbh->query("SELECT * FROM scrap where autoid='".$row_scrap->item5."'");
                   $count_scrap2=$result_scrap2->rowCount();
                   $row_scrap2=$result_scrap2->fetchObject();

                   $result_streets=$dbh->query("SELECT * FROM street where auto_id='".$row_scrap->item3."'");
                    $count_streets=$result_streets->rowCount();
                    $row_streets=$result_streets->fetchObject();

                    $result_account=$dbh->query("SELECT * FROM account_type WHERE autoid='".$row_scrap->item5."'");
                    $row_account=$result_account->fetchObject();

                    echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row_scrap->item."</td>
                    <td>".$row_account->accountname."</td>
                    <td>".$row_scrap->item7."</td>
                    <td>".$row_streets->street."</td>
                    <td><img style='width:50%' src=".$row_scrap->item4."></td>
                    <td>
                    <a href='companies?id=".$row_scrap->autoid."'><i class='fa fa-edit'></i> | 
                    <a href='companies?delete=".$row_scrap->autoid."'><i class='fa fa-trash'></i></a>
                    </td>
                      </tr>";
                    }while($row_scrap=$result_scrap->fetchObject());
                   }
                    ?>
                  
                
                  </tbody>
                </table>
              </div>
</div>

</div>



</div>  
</div>  

</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<?php lscripts(); ?>
</body>
</html>
