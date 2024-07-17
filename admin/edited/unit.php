<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php kheader(); ?>
 <script type="text/javascript">
function submit_unit(){

if($("#unit_name").val()=='' && $("#base_unit").val()==''){}
else{
var unit_name=$("#unit_name").val();
var short_name=$("#short_name").val();
var base_unit=$("#base_unit").val();
var page="submit_unit";

$.ajax({
type: "POST",
url: "middlez.php",
data: {page:page,unit_name:unit_name,short_name:short_name,base_unit:base_unit},
success: function(output){
if(output==1){
document.getElementById("form_allrows").reset();
document.getElementById("unit_name").value='';
document.getElementById("base_unit").value='';
document.getElementById("alert_out").innerHTML="<div class='alert alert-success'>Unit Added Successfully. </div>";}
else{document.getElementById("alert_out").innerHTML="<div class='alert alert-danger'>Error : Unit not added. </div>";}

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
<div class="card card-header"><div class="card-title"><h4>Units/Packaging</h4></div></div>
<div class="card-body">
 <div id="alert_out"></div>

<form id="form_allrows">
<div class="row">
<div class="col-lg-4">
  <label>Name</label>
<input type="text" id="unit_name" placeholder="Unit Name" class="form-control">  
</div>
<div class="col-lg-4">
  <label>Short Name</label>
<input type="text" id="short_name" class="form-control" placeholder="Short Name">  
</div>
<div class="col-lg-4">
  <label>Base Unit</label>
<input type="text" id="base_unit" class="form-control" placeholder="Quantity">  
</div> 
</div>
</form>
<div class="col-lg-12"><br></div>
<div class="form-group">
<input type="submit" onClick="submit_unit()" class="btn btn-sm btn-primary btn-block" value="Submit">  
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
