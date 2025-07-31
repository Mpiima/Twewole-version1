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
<div class="card card-primary">
<div class="card-header"><h4 class="card-title">List Expenses</h4></div>
<div class="card-body">
<table id="example1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">

<thead>
<tr>
<th>No</th>
<th>Given to</th>
<th>Location</th>
<th>Date</th>
<th>Amount</th>
<th>Category</th>
<th>Details</th>
</tr>
</thead>
</table>  
</div>  
</div>
<!-- /.row -->

<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<?php lscripts(); ?>
</body>
</html>
