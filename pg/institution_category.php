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
                 <span style="font-size: 18px; font-weight: bold;">Institution</span> 
                 <span style="font-size: 13px;">-</span><span style="font-size: 15px;">&nbsp;|
                  &nbsp;Institution Category</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;create</a>
              </div>
            <?php
            if(isset($_POST['savecat'])){
               $category=$_POST['category'];
               $type="inst_cat";
                $insert_scrap=$dbh->query("INSERT INTO scrap(item,item2)values('$category','$type')");
                if($insert_scrap){
                    echo "<div class='alert alert-success'>Added successfully</div>";
                    ?><script>
                    var allowed=function(){window.location='institution_category.php';}
                    setTimeout(allowed,1000);
                    </script>
                    <?php
                }else{
                    echo "<div class='alert alert-danger'>Failed! Try Again</div>";

                }

            } 
            ?>

             <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="POST">
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Category</label>
                        <input required type="text" class="form-control txtform" name="category" >
                      </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary" name="savecat">submit</button>
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
            <table id="example1" class="table table-striped table-bordered dataTable" 
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
                    $result_scrap=$dbh->query("SELECT * FROM scrap where item2='inst_cat'");
                    $count_scrap=$result_scrap->rowCount();
                    $row_scrap=$result_scrap->fetchObject();
                    if($count_scrap>0){
                        $n=1;
                        do{
                        echo "
                    <tr>
                    <td>".$n++."</td>
                    <td>".$row_scrap->item."</td>
                    <td><i class='fa fa-edit'></i> | <i class='fa fa-trash'></i></td>
                </tr>
                ";
                        }while($row_scrap=$result_scrap->fetchObject());
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

<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>

<?php lscripts(); ?>
</body>
</html>
