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
<div class="card card-header"><div class="card-title"><h4>ADDRESSES</h4></div></div>
<div class="card-body">
<div id="alert_out"></div>

<?php 
if(isset($_POST['saved'])){
    $district=$_POST['district'];
    $insert_district=$dbh->query("INSERT INTO district(district)values('$district')");
    if($insert_district){
        echo "<div class='alert alert-success'>Added successfully</div>";
        ?><script>
        var allowed=function(){window.location='addresses.php';}
        setTimeout(allowed,1000);
        </script>
        <?php
    }else{
        echo "<div class='alert alert-danger'>Failed! Try Again</div>";

    }

}

if(isset($_POST['savestreet'])){
     $districtid=$_POST['districtid'];
    $street=$_POST['street'];
    $insert_street=$dbh->query("INSERT INTO street(street,districtid)values('$street','$districtid')");
    if($insert_street){
        echo "<div class='alert alert-success'>Added successfully</div>";
        ?><script>
var allowed=function(){window.location='addresses.php';}
setTimeout(allowed,1000);
</script>
<?php
    }else{
        echo "<div class='alert alert-danger'>Failed</div>";
    }

}
?>

<div class="row">
<div class="col-lg-6">
<form method="POST">
<label>District</label>
<input required type="text" name="district" placeholder="District Name" class="form-control">  
<br>
<div class="form-group">
<input type="submit"  name ="saved" class="btn btn-sm btn-primary" value="Submit">  
</div>
</form><br>
<div class="card-body">
<table id="example" class="table table-striped table-bordered dataTable" 
cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
style="width: 100%;">
<thead>
<tr style="font-size: 13px;">
<th>No</th>
<th>Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    $result_districts=$dbh->query("SELECT * FROM district");
    $count_d=$result_districts->rowCount();
    $row_d=$result_districts->fetchObject();
    if($count_d>0){
        $n=1;
        do{
         echo "
    <tr>
    <td>".$n++."</td>
    <td>".$row_d->district."</td>
    <td></td>
</tr>
";
        }while($row_d=$result_districts->fetchObject());
    }
    ?>
</tbody>
</table>
</div>
</div>


<div class="col-lg-6">
<form method="POST">
<label>District</label>
<select name="districtid" class="form-control"> 
    <option>-select-</option>
     <?php
     $result_districts=$dbh->query("SELECT * FROM district");
     $count_d=$result_districts->rowCount();
     $row_d=$result_districts->fetchObject();
     if($count_d>0){
        do{ 
            echo "<option value='".$row_d->autoid."'>".$row_d->district."</option>";
      }while($row_d=$result_districts->fetchObject()); } ?>
</select>
<label>Street</label>
<input type="text" name="street" placeholder="Street Name" class="form-control">  
<br><br>
<div class="form-group">
<input type="submit" name="savestreet" class="btn btn-sm btn-primary" value="Submit Data">  
</div>
</form>
<br>
<div class="card-body">
                <table id="example" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>No</th>
                    <th>Street</th>
                    <th>District</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                   $result_streets=$dbh->query("SELECT * FROM street");
                   $count_s=$result_streets->rowCount();
                   $row_s=$result_streets->fetchObject();
                   if($count_s>0){
                    $no=1;
                    do{
                   $result_districts=$dbh->query("SELECT * FROM district where autoid='".$row_s->districtid."'");
                    $count_d=$result_districts->rowCount();
                    $row_d=$result_districts->fetchObject();

                    echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row_s->street."</td>
                    <td>".$row_d->district."</td>
                    <td></td>
                      </tr>";

                    }while($row_s=$result_streets->fetchObject());
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
