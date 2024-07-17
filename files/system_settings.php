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
   url: "submit_business.php",
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
     $("#err").html("<div class='alert alert-danger'>System Settings Not Added</div>").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html("<div class='alert alert-success'>Success: New System Settings Added</div>").fadeIn();
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
<div class="card card-header"><div class="card-title"><h4>System Settings</h4></div></div>
<div class="card-body">
<div id="preview"></div><br>	
<form id="form" enctype="multipart/form-data" autocomplete="off">
<div class="row">
<div class="col-lg-4">
<label>Default Currency</label>
<?php popCurrencyLists(); ?> 
</div>
<div class="col-lg-4">
<label>Default Email</label>
<input type="email" name="default_email" placeholder="Company Email" class="form-control">  
</div>
<div class="col-lg-4">
<label>Change Logo</label>
<input type="file" name="default_logo" class="form-control">  
</div>  
</div>
<div class="col-lg-12"><br></div>  
<div class="row">
<div class="col-lg-4">
<label>Company Name</label>
<input type="text" name="company_name" placeholder="Company Name" class="form-control">  
</div>  
<div class="col-lg-4">
<label>Company Phone</label>
<input type="text" name="company_phone" placeholder="Company Phone" class="form-control">  
</div>
<div class="col-lg-4">
<label>Footer</label>
<input type="text" name="default_footer" placeholder="System Footer" class="form-control">
</div>
</div>
<div class="col-lg-12"><br></div>
<div class="row">
<div class="col-lg-4">
<label>Default Customer</label>
<select class="form-control" name="default_customer">
<option class="selected">Default Customer</option>
<option value="Walk In">Walk In</option>  
</select>  
</div>
<div class="col-lg-4">
<label>Default Warehouse</label>
<?php popWarehouseLists(); ?>
</div>
<div class="col-lg-4">
<label>Company Address</label>
<input type="text" name="company_address" class="form-control" placeholder="Company Address">  
</div>  
</div>
<div class="col-lg-12"><br></div>
<div class="form-group">
<button type="submit"  class="btn btn-sm btn-primary btn-block">Submit</button>  
</div>
</form>
<div class="col-lg-12"><br></div>
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
