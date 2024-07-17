<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<script src='../js/jquery.js'></script>		
<?php kheader(); ?>
<script type="text/javascript">
$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
   url: "submit_brand.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("<div class='alert alert-danger'>Brand Not Added</div>").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html("<div class='alert alert-success'>Success: New Brand Added</div>").fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});	

</script>

</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php kleftbar(); ?>
<!-- Main content -->
<section class='content'>
<div class='container-fluid'>
<div class="card card-primary">
<div class="card card-header"><div class="card-title"><h4>Brand</h4></div></div>
<div class="card-body">
<div id="preview"></div><br>
<form id="form" enctype="multipart/form-data" autocomplete="off">
<div class="row">
<div class="col-lg-3">
<label>Brand Name</label>
<input type="text" name="brand_name" placeholder="Brand Name" class="form-control">  
</div>
<div class="col-lg-3">
<label>Brand Image</label>
<input type="file" name="brand_img" class="form-control">  
</div>
<div class="col-lg-6">
<label>Brand Description</label>
<input type="text" name="brand_desc" class="form-control" placeholder="Brand Description">  
</div> 
</div>
<div class="col-lg-12"><br></div>
<div class="form-group">
<button type="submit"  class="btn btn-sm btn-primary btn-block">Submit</button>  
</div>
</form> 
<div id="err"></div>
</div>  
</div>  

</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<?php lscripts(); ?>
</body>
</html>
