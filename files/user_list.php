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
                 <span style="font-size: 18px; font-weight: bold;">User Management</span> <span style="font-size: 13px;">user list</span><span style="font-size: 15px;">&nbsp;| &nbsp;user List</span> 

                </h3>
                <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" href="" style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;create</a> -->
              </div>


              <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form>
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control txtform">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control txtform">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>User Image</label>
                        <input type="file" class="form-control txtform txtfile">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control">
                          <option>Please select</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control txtform ">
                      </div>
                    </div>
                  
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary">submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>status</th>                   
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                  $result_users=$dbh->query("SELECT * FROM users");
                  $count_users=$result_users->rowCount();
                  $row_users=$result_users->fetchObject();
                  $n=1;
                  if($count_users>0){
                    do{
                      if($row_users->status == 1){
                        $status="ACTIVE";
                        $color="light-blue";
                      }else{
                        $status="INACTIVE";
                        $color="red";
                      }

                      if($row_users->role == "BN2"){
                        $type="Business";
                       
                      } else if($row_users->role == "CL"){
                        $type="User";
                      
                      }
                      else{
                        $type="Admin";
                       
                      }
                 echo "
                <tr>
                  <td><a class='link link-primary' href='#?id=".$row_users->rolenumber."'>".$row_users->firstname."</a></td>
                   <td>".$row_users->lastname."</td>
                    <td>".$row_users->email."</td>
                     <td>".$row_users->phonenumber."</td>
                      <td><a href='#?id=".$row_users->rolenumber."'>".$type."</a></td>
                      <td><a  style='color:".$color."'>".$status."</a></td>
                </tr>
                ";

               }while($row_users=$result_users->fetchObject()); } ?>
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>




</div>
<!-- /.row -->

<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<?php lscripts(); ?>
</body>
</html>
