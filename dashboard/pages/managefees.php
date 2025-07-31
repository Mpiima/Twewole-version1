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
if(!isset($_SESSION['role'])){
//redirect to A
}else if($_SESSION['role'] == "sp"){
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
                 <span style="font-size: 18px; font-weight: bold;">Slots/Fees</span>
                  <span style="font-size: 13px;">Slots/Fees</span><span style="font-size: 15px;">&nbsp;| &nbsp;</span> 

                </h3>
                <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                 style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color:
                  whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Notice Of Sale</a> -->
              </div>

    <?php 
  error_reporting(0);
  //insert activity 
   
    ?>



              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                  if(isset($_POST['deleten'])){
                    $aut=$_POST['autoid'];
                    $update_a=$dbh->query("UPDATE noticeofsale SET status=0 WHERE autoid=$aut");
                    if($update_a){
                      echo "<div class='alert alert-danger'>Deleted Successfully</div>";
                    }
                  }

                  if(isset($_POST["savedata"])){
                    $m=$_POST['monthly'];
                    $q=$_POST['quartely'];
                    $b=$_POST['biannual'];
                    $a=$_POST['annual'];
                    $slot=$_POST['slots'];
                    $id=$_POST['id'];
                    // <!-- `monthly`, `quarterly`, `biannual`, `annual`, -->
                    $update_c=$dbh->query("UPDATE account  SET monthly='$m', quarterly='$q', biannual='$b', annual='$a',slots='$slot' WHERE autoid='$id' ");
                    if($update_c){
                        echo "<div class='alert alert-success'>Edited successfully</div>";
                    }
                  }

                
                ?>
                <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Account</th>
                    <th>Monthly</th>
                    <th>Quartelly</th>
                    <th>Biannual</th>
                    <th>Annual</th>
                    <th>Slots</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                  $result_a=$dbh->query("SELECT * FROM account where status=1");
                  $count_a=$result_a->rowCount();
                  $row_a=$result_a->fetchObject();
                  if($count_a > 0){
                    do{ 
                      
                      $result_t=$dbh->query("SELECT * FROM account_type WHERE autoid='$row_a->accounttype'");
                        $row_t=$result_t->fetchObject();?>
                
                 <tr>
                  <td><?php echo $row_t->accountname; ?></td>
                  <td><?php echo $row_a->monthly; ?></td>
                  <td><?php echo $row_a->quarterly; ?></td>
                  <td><?php echo $row_a->biannual; ?></td>
                  <td><?php echo $row_a->annual; ?></td>
                  <td><?php echo $row_a->slots; ?></td>
                  
                  <td>
                    <form method='post' onsubmit="return delete_checker('Data','Deleted');">
                    
                    <a data-toggle='modal' data-target='#edit<?php echo $row_a->autoid; ?>'>
                     <i  style='color:blue' class='fa fa-edit'></i></a>
                     &nbsp;

                        <input type='hidden' name='autoid' value='<?php echo $row_a->autoid; ?>'>
                        <button type='submit' name='deleten' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                    </form>
                    </td>                   
                 </tr>

                 <div class="modal fade" id="edit<?php echo $row_a->autoid; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Manage Fees & Slots </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST"  enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Account </label>
                        <input type="text" class="form-control txtform" name="account"  value="<?php echo $row_t->accountname; ?>">
                       <input type="hidden" value="<?php echo $row_a->autoid; ?>" name="id">
                    </div>
                    </div>
                    <div class="col-sm-2">
                     <div class="form-group">
                        <label>Monthly</label>
                        <input type="number" class="form-control txtform" name="monthly" value="<?php echo $row_a->monthly; ?>" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Quarterly</label>
                        <input type="number" class="form-control txtform" name="quartely" value="<?php echo $row_a->quarterly; ?>" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Biannual</label>
                        <input type="number" class="form-control txtform" name="biannual" value="<?php echo $row_a->biannual; ?>" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Annual</label>
                        <input type="number" class="form-control txtform" name="annual" value="<?php echo $row_a->annual; ?>" >
                      </div>
                    </div>
                    <div class="col-sm-2">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Slots</label>
                        <input type="number" class="form-control txtform" name="slots" value="<?php echo $row_a->slots; ?>" >
                      </div>
                    </div>
                  
                  
           
               
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="savedata" class="btn btn-primary">Update Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


                    <?php }while($row_a=$result_a->fetchObject());
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


<?php }else{
include 'bncreate_loan.php';
} ?>

<?php lscripts(); ?>
</body>
</html>
