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
                 <span style="font-size: 18px; font-weight: bold;">Frequently Asked Questions</span> 
                 <span style="font-size: 13px;">-</span><span style="font-size: 15px;">&nbsp;|
                  &nbsp;FAQ</span> 

                </h3>
                <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" style="float: right; font-size: 13px;border-radius: 6px; border-color:blue;color: whitesmoke;;font-weight: bold;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create New FaQ</a>
              </div>
            <?php
            // if(isset($_POST['saveFaQ'])){
            //   $question=$_POST['question'];
            //   $answer=$_POST['answer'];
            //     $insert_faq=$dbh->query("INSERT INTO faq(question,answer)values('$question','$answer')");
            //     if($insert_faq){
            //         echo "<div class='alert alert-success'>Added successfully</div>";
            //         ?><script>
            //         var allowed=function(){window.location='faq';}
            //         setTimeout(allowed,1000);
            //         </script>
            //         <?php
            //     }else{
            //         echo "<div class='alert alert-danger'>Failed! Try Again</div>";

            //     }

            // } 
            
            if (isset($_POST['saveFaQ'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    // Prepare the SQL statement
    $insert_faq = $dbh->prepare("INSERT INTO faq (question, answer) VALUES (:question, :answer)");
    
    // Bind the parameters to the SQL query
    $insert_faq->bindParam(':question', $question);
    $insert_faq->bindParam(':answer', $answer);
    
    // Execute the query
    if ($insert_faq->execute()) {
        echo "<div class='alert alert-success'>Added successfully</div>";
        ?>
        <script>
        var allowed = function() {
            window.location = 'faq';
        }
        setTimeout(allowed, 1000);
        </script>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Failed! Try Again</div>";
    }
}


            //delete
    if(isset($_POST['delete'])){
        $autoid=$_POST['autoid'];
       $delete_faq=$dbh->query("DELETE FROM faq WHERE auto_id=$autoid");
      if($delete_faq){
       echo "<div class='alert alert-success'>Deleted Succcessfully</div>";
       ?><script>
         var allowed=function(){window.location='faq';}
         setTimeout(allowed,1000);
         </script>
         <?php
      }else{
       echo "<div class='alert alert-danger'>Deleting falied</div>";
      }
      }
            ?>

             <div class="modal fade" id="modal-lg">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New FAQ</h4>
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
                        <label>Question</label>
                        <input required type="text" class="form-control txtform" name="question" >
                      </div>
                      <div class="form-group">
                        <label>Answer</label>
                        <textarea required class="form-control" name="answer">

                        </textarea>
                      </div>

                    </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary" name="saveFaQ">submit</button>
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
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $result_faq=$dbh->query("SELECT * FROM faq");
                    $count_faq=$result_faq->rowCount();
                    $row_faq=$result_faq->fetchObject();
                    if($count_faq>0){
                        $n=1;
                        do{
                        echo "
                    <tr>
                    <td>".$n++."</td>
                    <td>".$row_faq->question."</td>
                     <td>".$row_faq->answer."</td>"; ?>
                    <td>
                    <form method='post' onsubmit="return delete_checker('FaQ','Deleted');">
                   <a data-toggle='modal' data-target='#edit<?php echo $row_faq->auto_id; ?>'>
                  <i  style='color:light-blue' class='fa fa-edit'></i></a>
                     &nbsp;|&nbsp;<i style='color:orange; display:none;' class='fa fa-eye'></i>
                        <input type='hidden' name='autoid' value='<?php echo $row_faq->auto_id; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      </form>
                    </td>
                    <?php "</tr>";
                        }while($row_faq=$result_faq->fetchObject());
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
<script>
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }
</script>
</body>
</html>
