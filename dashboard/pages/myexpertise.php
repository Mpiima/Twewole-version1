<?php include("zini_genesis.php"); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <?php kheader(); ?>
</head>
<body class='hold-transition <?php echo $mymode; ?> sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

<?php kleftbar(); ?>
<!-- Main content -->

<?php 
if(isset($_SESSION['role'])){
?>
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
                 <span style="font-size: 18px; font-weight: bold;">My Experience</span>
                  <span style="font-size: 13px;">Areas of Expertise</span><span style="font-size: 15px;">&nbsp;
                  | &nbsp;</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                 style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Area Of Expertise</a>
              </div>

    <?php 
   error_reporting(0);
    if(isset($_POST['saveData'])){
      $rolenumber=$_SESSION['rolenumber'];
      $cat = $_POST['category'];
      $desc=$_POST['description'];
      $fee=$_POST['fee'];
      $insert_exp =$dbh->query("INSERT INTO expertis(rolenumber,categoryid,description,charge)
      values('$rolenumber','$cat','$desc','$fee')");
      if($insert_exp){
        echo "<div class='alert alert-success'>Added successfully</div>";
      }else{
        echo "<div class='alert alert-danger'>Failed</div>";
      }

     }
//update
    if(isset($_POST['updateData'])){
      $id=$_POST['id'];
      $cat=$_POST['category'];
      $description=$_POST['description'];
      $fee=$_POST['fee'];
      // $rolenumber=$_SESSION['rolenumber'];
      $update_exper =$dbh->query("UPDATE expertis set description='$description',categoryid='$cat', charge='$fee' WHERE autoid=$id");
    }
//delete
    if(isset($_POST['delete'])){
      $autoid=$_POST['autoid'];
     $delete_e=$dbh->query("DELETE FROM expertis WHERE autoid='$autoid'");
    if($delete_e){
     echo "<div class='alert alert-success'>Deleted Succcessfully</div>";
     ?><script>
       var allowed=function(){window.location='myexpertise';}
       setTimeout(allowed,1000);
       </script>
       <?php
    }else{
     echo "<div class='alert alert-danger'>Deleting falied</div>";
    }
    }
    ?>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-l">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST"  enctype="multipart/form-data">   
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                           <option value="">-select-</option>
                           <option  value="loans">Loans</option>
                           <option  value="tradeunit">Trade Credit</option>
                           <option  value="grants">Grants</option>
                           <option  value="lease">Asset Leasing</option>
                           <option  value="insurance">Insurance</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    <label>Fee</label>
                    <div class="form-group">
                        <input type="text" class="form-control"  name="fee" >
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label>Short Description</label>
                    <div class="form-group">
                        <textarea class="form-control"  rows="3" cols="65" name="description" >
                       </textarea> 
                    </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="saveData" class="btn btn-primary">SaveData</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
            </div>
          </div>
         </form>
        </div>
        <!-- /.modal-dialog -->
      </div></div>
      <!-- /.modal -->



              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Category</th>
                    <th>Description</th>
                     <th>Fee</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_e=$dbh->query("SELECT * FROM expertis where rolenumber='".$_SESSION['rolenumber']."'");
                    $count_e=$result_e->rowCount();
                    $row_e=$result_e->fetchObject();
                    $n=1;
                    if($count_e>0){
                      do{  
                       
                        if($row_e->categoryid=="loans"){
                      $categoryid="Loans";
                      }if($row_e->categoryid=="lease"){
                        $categoryid="Asset Leasing";
                        }
                        if($row_e->categoryid=="grants"){
                          $categoryid="Grants";
                          }
                          if($row_e->categoryid=="insurance"){
                            $categoryid="Insurance";
                            }
                            if($row_e->categoryid=="tradeunit"){
                              $categoryid="Trade Credit";
                              }
                      echo "<tr>
                      <td>".$categoryid."</td>
                      <td>".$row_e->description."</td>
                      <td>".$row_e->charge."</td>"; ?>
                      <td>
                     <form method='post' onsubmit="return delete_checker('Content','Deleted');">
            <a data-toggle='modal' data-target='#edit<?php echo $row_e->autoid; ?>'>
          <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;<i style='color:orange' class='fa fa-eye'></i>
                        <input type='hidden' name='autoid' value='<?php echo $row_e->autoid; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      </form>
                    </td>
                  </tr>
      <!-- EDITING MODAL  -->
      <div class="modal fade" id="edit<?php echo $row_e->autoid; ?>">
        <div class="modal-dialog modal-l">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>   
          <form method="POST"  enctype="multipart/form-data">   
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Category</label>
                        <input type="hidden" value="<?php echo $row_e->autoid; ?>" name="id">
                        <select class="form-control" name="category">
                           <option value="<?php echo $row_e->categoryid; ?>"><?php echo $row_e->categoryid; ?></option>
                           <option  value="loans">Loans</option>
                           <option  value="tradeunit">Trade Credit</option>
                           <option  value="grants">Grants</option>
                           <option  value="lease">Asset Leasing</option>
                           <option  value="insurance">Insurance</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    <label>Fee</label>
                    <div class="form-group">
                        <input type="number" class="form-control"  name="fee" value="<?php echo $row_e->charge; ?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                    <label>Short Description</label>
                    <div class="form-group">
                        <textarea class="form-control rounded-0" cols="60" rows="3" name="description" ><?php echo $row_e->description;  ?>
                       </textarea> 
                    </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="updateData" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
         </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- ENDS here --> 
                     <?php
                      }while($row_e=$result_e->fetchObject());
                    }
                    ?>
                  </tbody>
                </table>
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


<?php } ?>

<?php lscripts(); ?>
</body>
</html>
