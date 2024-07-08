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
                 <span style="font-size: 18px; font-weight: bold;">Jobs</span> <span style="font-size: 13px;">Jobs list</span><span style="font-size: 15px;">&nbsp;| &nbsp;</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;create</a>
              </div>

    <?php 
    if(isset($_POST['savejob'])){
      $title=$_POST['title']; 
       $employer=$_POST['employer']; 
       $nature=$_POST['nature']; 
       $address=$_POST['address'];
       $jobcat=$_POST['jobcat']; 
       $salary=$_POST['salary']; 
       $joblink=$_POST['joblink']; 
       $howtoapply=$_POST['howtoapply']; 
       $summary=$_POST['summary'];
       $status=1;
       $jobid="id00";
       $insert_jobs=$dbh->query("INSERT INTO jobs(status,job_id,category_id,nature_id,employer_id,
       address_id, title,job_link,how_to_apply,job_summary)values('$status','$jobid','$jobcat','$nature','$employer','$address',
       '$title','$joblink','$howtoapply','$summary')");
       if($insert_jobs){
        echo "<div class='alert alert-success'>Added Succcessfully</div>";
       }else{
        echo "<div class='alert alert-danger'>Added falied</div>";
       }

    }
    
    
    ?>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
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
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" class="form-control txtform" name="title" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Employer|Company</label>
                        <select class="form-control" name="employer" required>
                        <option>-select company-</option>
                          <?php 
                            $result_emp=$dbh->query("SELECT * FROM employer");
                            $count_emp=$result_emp->rowCount();
                            $row_emp=$result_emp->fetchObject();
                            if($count_emp>0){
                              do{
                                echo "<option value='".$row_emp->autoid."'>".$row_emp->employer."</option>";
                              }while($row_emp=$result_emp->fetchObject());
                            }
                          
                          ?>
                            
                            
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nature Of the Job</label>
                        <select class="form-control" name="nature" required>
                            <option>-select-</option>
                            <?php
                    $result_c=$dbh->query("SELECT * FROM jobcat");
                    $count_c=$result_c->rowCount();
                    $row_c=$result_c->fetchObject();
                    if($count_c>0){
                        $n=1;
                        do{
                        echo "<option value='".$row_c->auto_id."'>".$row_c->category."</option>";
                        }while($row_c=$result_c->fetchObject());
                    }
                    ?>
                      
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Address Of Job</label>
                        <select  class="form-control" name="address" required>
                            <option>-select-</option>
                    <?php
                    $result_streets=$dbh->query("SELECT * FROM street");
                    $count_s=$result_streets->rowCount();
                    $row_s=$result_streets->fetchObject();
                    if($count_s>0){
                        do{
                        echo "<option value='".$row_s->auto_id."'>".$row_s->street."</option>";
                        }while($row_s=$result_streets->fetchObject());
                    }
                    ?>
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Job Category</label>
                        <select class="form-control" name="jobcat" required>
                            <option>-select-</option>
                        <?php
                    $result_cat=$dbh->query("SELECT * FROM cat");
                    $count_cat=$result_cat->rowCount();
                    $row_cat=$result_cat->fetchObject();
                    if($count_cat>0){
                        $n=1;
                        do{
                        echo "<option value='".$row_cat->auto_id."'>".$row_cat->category."</option> ";
                        }while($row_cat=$result_cat->fetchObject());
                    }
                    ?></select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Salary Scale</label>
                        <input type="text" class="form-control txtform" name="salary">
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-lg-12">
                    <label>Job Summary</label>
                    <div class="card-body">
                        <textarea id="summernote"  class="form-control" name="summary">
                       </textarea> 
                </div>
                    </div>
                  </div>

                 
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Job Link</label>
                        <input type="text" class="form-control txtform" name="joblink">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>How to Apply</label>
                        <input type="text" class="form-control txtform" name="howtoapply">
                      </div>
                    </div>
                  </div>
                 
                  
                 

                  
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" name="savejob" class="btn btn-primary">submit</button>
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
                    <th>Job</th>
                    <th>Nature</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Employer</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $result_jobs=$dbh->query("SELECT * FROM jobs where status=1 ORDER BY autoid desc");
                    $count_jobs=$result_jobs->rowCount();
                    $row_jobs=$result_jobs->fetchObject();
                    if($count_jobs>0){
                      $n=1;
                      do{
                    $result_c=$dbh->query("SELECT * FROM jobcat where auto_id='".$row_jobs->nature_id."'");
                    $count_c=$result_c->rowCount();
                    $row_c=$result_c->fetchObject();

                    $result_streets=$dbh->query("SELECT * FROM street where auto_id='".$row_jobs->address_id."'");
                    $count_s=$result_streets->rowCount();
                    $row_s=$result_streets->fetchObject();

                    $result_cat=$dbh->query("SELECT * FROM cat where auto_id='".$row_jobs->category_id."'");
                    $count_cat=$result_cat->rowCount();
                    $row_cat=$result_cat->fetchObject();

                    $result_emp=$dbh->query("SELECT * FROM employer where autoid='".$row_jobs->employer_id."'");
                    $count_emp=$result_emp->rowCount();
                    $row_emp=$result_emp->fetchObject();

                      echo "<tr>
                      <td>".$n++."</td>
                      <td>".$row_jobs->title."</td>
                      <td>".$row_c->category."</td>
                      <td>".$row_cat->category."</td>
                      <td>".$row_s->street."</td>
                      <td>".$row_emp->employer."</td>
                      <td><i style='color:blue' class='fa fa-edit'></i>&nbsp;|&nbsp;<i style='color:red' class='fa fa-trash'></i>&nbsp;|&nbsp;<i style='color:orange' class='fa fa-eye'></i></td>
                      
                  </tr>";
                      }while($row_jobs=$result_jobs->fetchObject());
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

<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>


<?php lscripts(); ?>
</body>
</html>
