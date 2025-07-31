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
<div class='row'>
<!-- fix for small devices only -->
<div class='clearfix hidden-md-up'></div>
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <span style="font-size: 18px; font-weight: bold;"></span>
                  <span style="font-size: 13px;"></span><span style="font-size: 15px;">&nbsp;
                <?php 
                  if($_GET['type'] == "feature"){
                    echo "Requirements";
                  }else{
                    echo $_GET['type'];
                  }
                  
                  ?>| &nbsp;  </span> 
                </h3> 
              </div>
              <!-- /.card-header -->
             <?php 
$type = $_GET['type'];
if (isset($_POST['savedata']) && $type == "benefit") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $pid = $_POST['id'];
    // Insert benefits
    $stmt = $dbh->prepare("INSERT INTO p_details (productid, benefits, benefit_title, type) VALUES (?, ?, ?, 'benefit')");
    if ($stmt->execute([$pid, $description, $title])) {
        echo "<div class='alert alert-success'>Added</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed</div>";
    }
} else if (isset($_POST['savedata']) && $type == "feature") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $pid = $_POST['id'];
    // Insert features
    $stmt = $dbh->prepare("INSERT INTO p_details (productid, feature, feature_title, type) VALUES (?, ?, ?, 'feature')");
    if ($stmt->execute([$pid, $description, $title])) {
        echo "<div class='alert alert-success'>Added</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed</div>";
    }
}
if (isset($_POST['delete'])) {
    $del = $_POST['did'];
    $stmt = $dbh->prepare("DELETE FROM p_details WHERE autoid = ?");
    if ($stmt->execute([$del])) {
        echo "<div class='alert alert-danger'>Deleted</div>";
    }
}
$ty = $_GET['type'];
if (isset($_POST['edit_data'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $pid = $_POST['id'];
    $autoid = $_POST['autoid'];

    if ($ty == "benefit") {
        $stmt = $dbh->prepare("UPDATE p_details SET benefits = ?, benefit_title = ? WHERE autoid = ?");
    } else if ($ty == "feature") {
        $stmt = $dbh->prepare("UPDATE p_details SET feature = ?, feature_title = ? WHERE autoid = ?");
    }
    if ($stmt->execute([$description, $title, $autoid])) {
        echo "<div class='alert alert-success'>Edited</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed</div>";
    }
}
?>

              <div class="card-body">
                <div class="row">
            <div class="col-lg-6">
                <table id="example2" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th col="3">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_pd=$dbh->query("SELECT * FROM p_details where productid='".$_GET['id']."' and type='".$_GET['type']."'");
                    $count_pd=$result_pd->rowCount();
                    $row_pd=$result_pd->fetchObject();
                    $type=$_GET['type'];
                 
                    if($count_pd>0){
                      $n=1;
                      do{
                      if($row_pd->type=="benefit"){
                        
                        $title=$row_pd->benefit_title;
                        $desc=$row_pd->benefits;
                      }else{
                        $title=$row_pd->feature_title;
                        $desc=$row_pd->feature;
                      }
                      echo "<tr>
                      <td>".$n++."</td>
                      <td>".$title."</td>
                      <td>".$desc."</td>";
                      ?>
                      <td col="3">
                      <form method='post' onsubmit="return delete_checker('<?php echo $_GET['type']; ?>','Deleted');">
                        <input type='hidden' name='did' value='<?php echo $row_pd->autoid; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      <a href="pdet?id=<?php echo $row_pd->productid; ?>&&type=<?php echo $_GET['type'] ?>&&act=<?php echo 'delete'; ?>&&autoid=<?php echo $row_pd->autoid; ?>"><i style='color:blue' class='fa fa-edit'></i></a></td>
                      </form>
                 <?php echo "</tr>";
                      }while($row_pd=$result_pd->fetchObject());
                    }
                    
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-6">
              <?php
              if(isset($_GET['act']) && $_GET['type']=="benefit" ){
                $result_pd=$dbh->query("SELECT * FROM p_details where productid='".$_GET['id']."' and
                 type='".$_GET['type']."' and autoid='".$_GET['autoid']."'");
                $count_pd=$result_pd->rowCount();
                $row_pd=$result_pd->fetchObject();
                $title =$row_pd->benefit_title;
                $desc=$row_pd->benefits;
                $save="edit_data";
              }  else if(isset($_GET['act']) && $_GET['type']=="feature"){
                $result_pd=$dbh->query("SELECT * FROM p_details where productid='".$_GET['id']."' and
                 type='".$_GET['type']."' and autoid='".$_GET['autoid']."'");
                $count_pd=$result_pd->rowCount();
                $row_pd=$result_pd->fetchObject();
                $title =$row_pd->feature_title;
                $desc=$row_pd->feature;;
                $save="edit_data";
              }
              
              else{
                $title ="";
                $desc="";
                $save="savedata";
              }
                ?>
              <form method="POST">
              <input required type="text" class="form-control" placeholder="title goes here" name="title" value="<?php echo $title; ?>">
              <input type="hidden" class="form-control" value="<?php echo $_GET['id']; ?>"  name="id">
              <input type="hidden" class="form-control" value="<?php echo $_GET['autoid']; ?>"  name="autoid">
              <label>Short Details</label>
              <textarea required class="form-control" name="description" ><?php echo $desc; ?></textarea>
              <br>
              <button type="submit" class="btn btn-success" name="<?php echo $save; ?>" ><?php echo $save; ?></button>
              </form>
            </div>
            </div>
           
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

<?php lscripts(); ?>
</body>
</html>
