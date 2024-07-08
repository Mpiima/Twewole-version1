<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<?php kheader(); ?>
<script type="text/javascript">
function submit_cat(){

if($("#cat_name").val()=='' && $("#cat_code").val()==''){}
else{
var cat_name=$("#cat_name").val();
var cat_code=$("#cat_code").val();
var page="submit_cat";

$.ajax({
type: "POST",
url: "middlez.php",
data: {page:page,cat_name:cat_name,cat_code:cat_code},
success: function(output){
if(output==1){
document.getElementById("form_allrows").reset();
document.getElementById("cat_name").value='';
document.getElementById("cat_code").value='';
document.getElementById("alert_out").innerHTML="<div class='alert alert-success'>Category Added Successfully. </div>";}
else{document.getElementById("alert_out").innerHTML="<div class='alert alert-danger'>Error : Category not added. </div>";}

var close_alert=function(){$("#alert_out").slideUp();
document.getElementById("alert_out").innerHTML='';$("#alert_out").slideDown();}
setTimeout(close_alert,4000);

}
});

}
return false; } 
</script>
</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php kleftbar(); ?>
<!-- Main content -->
<section class='content'>
<div class='container-fluid'>
<div class="card card-primary">
<div class="card card-header"><div class="card-title"><h4>Product Category</h4></div></div>
<div class="card-body">
<div id="alert_out"></div>

<form id="form_allrows">
<div class="row">
<div class="col-lg-6">
<label>Name</label>
<input type="text" id="cat_name" placeholder="Category Name" class="form-control">  
</div>
<div class="col-lg-6">
<label>Code</label>
<input type="text" id="cat_code" class="form-control" placeholder="Category Code">  
</div> 
</div>
</form>
<div class="col-lg-12"><br></div>
<div class="form-group">
<input type="submit" onClick="submit_cat()" class="btn btn-sm btn-primary btn-block" value="Submit">  
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
