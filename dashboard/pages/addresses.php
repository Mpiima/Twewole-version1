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
        var allowed=function(){window.location='addresses';}
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
var allowed=function(){window.location='addresses';}
setTimeout(allowed,1000);
</script>
<?php
    }else{
        echo "<div class='alert alert-danger'>Failed</div>";
    }

}
 error_reporting(1);
if(isset($_POST['delete'])){
    
     $autoid=$_POST['autoid'];
    $delete_street=$dbh->query("DELETE FROM street WHERE auto_id=$autoid");
    if($delete_street){
          echo "<div class='alert alert-success'>Deleted </div>";
          ?><script>
          var allowed=function(){window.location='addresses';}
          setTimeout(allowed,1000);
          </script>
          <?php
    }else {
          echo "<div class='alert alert-danger'>Failed</div>";
    }
}

if(isset($_POST['deleted'])){
    
    $autoid=$_POST['autoid'];
   $delete_street=$dbh->query("DELETE FROM district WHERE autoid=$autoid");
   if($delete_street){
         echo "<div class='alert alert-success'>Deleted </div>";
         ?><script>
         var allowed=function(){window.location='addresses';}
         setTimeout(allowed,1000);
         </script>
         <?php
   }else {
         echo "<div class='alert alert-danger'>Failed</div>";
   }
}
if(isset($_GET['dist'])){

    $autoid=$_GET['dist'];

    $result_district=$dbh->query("SELECT * FROM district where autoid=$autoid");
    $count_di=$result_district->rowCount();
    $row_district=$result_district->fetchObject();
    
}
if(isset($_POST['updateDistrict'])){
    $autoid=$_GET['dist'];

    $district = $_POST['district'];
    $update_street=$dbh->query("UPDATE district set district='$district' WHERE autoid=$autoid");
 
    if($update_street){
          echo "<div class='alert alert-success'>Deleted </div>";
          ?><script>
          var allowed=function(){window.location='addresses';}
          setTimeout(allowed,1000);
          </script>
          <?php
    }else {
          echo "<div class='alert alert-danger'>Failed</div>";
    } 
 }

 if(isset($_GET['ss'])){

    $autoid=$_GET['ss'];

    $result_ss=$dbh->query("SELECT * FROM street where auto_id=$autoid");
    $count_ss=$result_ss->rowCount();
    $row_ss=$result_ss->fetchObject();
    
}

if(isset($_POST['updateStreet'])){
    $autoid=$_GET['ss'];

    $street = $_POST['street'];
    $d=$_POST['districtid'];
    $update_ss=$dbh->query("UPDATE street set street='$street', districtid='$d' WHERE auto_id=$autoid");
 
    if($update_ss){
          echo "<div class='alert alert-success'>Deleted </div>";
          ?><script>
          var allowed=function(){window.location='addresses';}
          setTimeout(allowed,1000);
          </script>
          <?php
    }else {
          echo "<div class='alert alert-danger'>Failed</div>";
    } 
 }

?>

<div class="row">
<div class="col-lg-6">
<form method="POST">
<label>District</label>
<input required type="text" name="district" placeholder="District Name" class="form-control" value="<?php echo  $row_district->district; ?>">  
<br>
<div class="form-group">
<?php if(isset($_GET['dist'])){ ?>
    <input type="submit"  name ="updateDistrict" class="btn btn-sm btn-primary" value="Submit"><?php

}else{ ?><input type="submit"  name ="saved" class="btn btn-sm btn-primary" value="Submit"> <?php } ?> 
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
    <td>".$row_d->district."</td>"; ?>
    <td>
        <form method='post' onsubmit="return delete_checker('Data','Deleted');">
        <a href='?dist=<?php echo $row_d->autoid; ?>'>
        <i  style='color:blue' class='fa fa-edit'></i></a>
        &nbsp;|
        <input type='hidden' name='autoid' value='<?php echo $row_d->autoid; ?>'>
        <button type='submit' name='deleted' class='' style="border:0px;" >
        <i style='color:red' class='fa fa-trash'></i></button>
 </form>
    </td>
<?php echo "</tr>
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
<select name="districtid" class="form-control" required> 
    <option value="">-select-</option>
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
<input type="text" required name="street" placeholder="Street Name" class="form-control" value="<?php echo $row_ss->street; ?>">  
<br><br>
<div class="form-group">
<?php if(isset($_GET['ss'])){ ?>
    <input type="submit"  name ="updateStreet" class="btn btn-sm btn-primary" value="Submit"><?php

}else{ ?><input type="submit"  name ="savestreet" class="btn btn-sm btn-primary" value="Submit"> <?php } ?>  
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
                    <td>".$row_d->district."</td>"; ?>
                    <td>
                        <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                        <a href='?ss=<?php echo $row_s->auto_id; ?>'>
                        <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|
                        <input type='hidden' name='autoid' value='<?php echo $row_s->auto_id; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      </form>
                    </td>
                      <?php echo "</tr>";

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
<script>
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>

<?php lscripts(); ?>
</body>
</html>
