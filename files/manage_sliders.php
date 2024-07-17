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
<div class="card card-header"><div class="card-title"><h4>BANNERS/SLIDERS</h4></div></div>
<div class="card-body">
<div id="alert_out"></div>

<?php 
if(isset($_POST['saved'])){
    $category=$_POST['category'];
    $heading=$_POST['heading'];
    $subheading=$_POST['subheading'];
    $description=$_POST['description'];
    $link=$_POST['link'];
    
$target_dir = "uploads/sliders/";
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

$insert_adverts=$dbh->query("INSERT INTO adverts(banner,heading,subheading,description,link,position,status
)values('$target_file','$heading','$subheading','$description','$link','$category',1)");
if($insert_adverts){
    echo "<div class='alert alert-success'>Added successfully</div>";
    ?><script>
    var allowed=function(){window.location='manage_sliders.php';}
    setTimeout(allowed,1000);
    </script>
    <?php
}else{
    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

}

}


?>

<div class="row">
<div class="col-lg-4">
<form method="POST" enctype="multipart/form-data">
<label>Category</label>
<select class="form-control" name="category">
<option>-select-</option>
<option value="top">Header Slider</option>
<option value="middle">Middle Banner</option>
<option value="bottom">Bottom Banner</option>
</select><br>
<label>Heading</label>
<input type="text" name="heading" placeholder="Heading" class="form-control">  
<br>
<label>Heading</label>
<input type="text" name="subheading" placeholder="Sub Heading" class="form-control">  
<br>
<label>Description</label>
<textarea name="description" placeholder="Description" class="form-control">  </textarea>
<br>
<label>Link</label>
<br>
<input type="text" name="link" placeholder="Your Link" class="form-control">  
<br>
<label>image</label><br>
<input required type="file" name="fileToUpload" id="fileToUpload" class="form-control">
<br>

<div class="form-group">
<input type="submit" name="saved" class="btn btn-sm btn-primary" value="Submit Data">  
</div>
</form>
</div>



<div class="col-lg-8">
<div class="card-body">
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>No</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>heading</th>
                    <th>Subheading</th>
                    <th>description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                //    SELECT `autoid`, `banner`, `heading`, `subheading`, `description`, `link`, 
                //    `position`, `status`, `createdon`, `updated_on` FROM `adverts` WHERE 1
                   $result_adverts=$dbh->query("SELECT * FROM adverts");
                   $count_adverts=$result_adverts->rowCount();
                   $row_adverts=$result_adverts->fetchObject();
                   if($count_adverts>0){
                    $no=1;
                    do{
                    echo "<tr>
                    <td>".$no++."</td>
                    <td><img style='width:100%' src=".$row_adverts->banner."></td>
                    <td>".$row_adverts->position."</td>
                    <td>".$row_adverts->heading."</td>
                    <td>".$row_adverts->subheading."</td>
                    <td>".$row_adverts->description."</td>
                    <td><i class='fa fa-edit'></i> | <i class='fa fa-trash'></i></td>
                      </tr>";

                    }while($row_adverts=$result_adverts->fetchObject());
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
