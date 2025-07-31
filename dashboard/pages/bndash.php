<section class='content'>
<div class='container-fluid'>
<!-- Info boxes -->
<div class='row' style="display:none;">
<div class='col-12 col-sm-6 col-md-3' >
<div class='info-box'>
<span class='info-box-icon bg-info elevation-1'><i class='fa fa-briefcase'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Loans</span>
<span class='info-box-number'>
 <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='loan' ");
   echo $count_products=$result_products->rowCount();
 ?>
</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-danger elevation-1'><i class='fas fa-cart-plus'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Operating Lease</span>
<span class='info-box-number'> <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='lease' ");
   echo $count_products=$result_products->rowCount();
 ?></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->

</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class='clearfix hidden-md-up'></div>

<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-success elevation-1'><i class='fas fa-book'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Trade Credits</span>
<span class='info-box-number'> <?php 
   $result_products=$dbh->query("SELECT * FROM products where status=1 AND type='tradeunit' ");
   echo $count_products=$result_products->rowCount();
 ?></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class='col-12 col-sm-6 col-md-3'>
<div class='info-box mb-3'>
<span class='info-box-icon bg-warning elevation-1'><i class='fas fa-users'></i></span>

<div class='info-box-content'>
<span class='info-box-text'>Engagements</span>
<span class='info-box-number'>
  <?php 
  $result_users=$dbh->query("SELECT * FROM users where role='BN'");
  echo $count_users=$result_users->rowCount();
  ?>
</span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

<?php 
$result_subs=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_SESSION['rolenumber']."' ORDER BY subscribedon desc LIMIT 1");
$row_subs=$result_subs->fetchObject();
$endDate = $row_subs->expired_date;
$endDateTime = new DateTime($endDate);
$currentDate = new DateTime();
 $remainingDays = $currentDate->diff($endDateTime)->days;
//  $row_subs->noofdays;

$expiryDate = new DateTime($endDate); // Set your expiry date
$currentDate = new DateTime();

if($currentDate >= $expiryDate){
  // echo "<div class='alert alert-danger'>Subscription Expired</div>";
?>

<!-- //create an overlay to prevent user from accessing the page and redirect to the subscription page -->
<div id="overlay" style="display: block;"></div>
<div id="modal" style="display: block;">
  <div class="modal-content p-5">
    <p>Your Subscription has expired. Kindly renew your subscription to continue using the platform.</p>
    <a href="renew" class="btn btn-danger">Renew Subscription</a>
  </div>
</div>
<script>
  var modal = document.getElementById("modal");
  var overlay = document.getElementById("overlay");
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
    overlay.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      overlay.style.display = "none";
    }
  }
</script>


<?php } else {
?>

<section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">...Requests/Engagements...</h3>
                     <?php 
                     if(isset($_POST['activate'])){
                      $id=$_POST['id'];
                      $update_users=$dbh->query("UPDATE users set status=1 WHERE autoid=$id");
                    //   $update_k=$dbh->query("UPDATE keyfields set status=1 WHERE autoid=$id");
                    if($update_users){
                      echo "<div class='alert alert-success'>Account Activated Successfully</div>
                      <meta http-equiv='refresh' content='3;'/>
                      ";
                    }else{
                      echo "<div class='alert alert-danger'>Failed</div>";
                    }
                     }
                     if(isset($_POST['deactivate'])){
                      $id=$_POST['id'];
                      $update_users=$dbh->query("UPDATE users set status=0 WHERE autoid=$id");
                    //   $update_k=$dbh->query("UPDATE keyfields set status=0 WHERE autoid=$id");
                    if($update_users){
                      echo "<div class='alert alert-success'>Account Deactivated Successfully</div>
                      <meta http-equiv='refresh' content='3;'/>
                      ";
                    }else{
                      echo "<div class='alert alert-danger'>Failed</div>";
                    }
                     }
                     ?>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-5">
                <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>Product</th>
                      <th>Client</th>
                      <th>Message</th>
                      <th>Sent_On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($_POST['delete'])){
                      $autoid=$_POST['autoid'];
                      $del=$dbh->query("UPDATE messaged set status=0 where autoid='$autoid'");
                      if($del){
                        echo "Deleted";
                      }
                    }
                    $result_m=$dbh->query("SELECT * FROM messaged where status=1 AND addedby='".$_SESSION['rolenumber']."' ");
                    $count_m=$result_m->rowCount();
                    $row_m=$result_m->fetchObject();
                    if($count_m> 0){
                      do{ 
                        $result_users=$dbh->query("SELECT * FROM users WHERE autoid=$row_m->sent_to");
                        $row_users=$result_users->fetchObject();

                        $result_client=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_m->client'");
                        $row_client=$result_client->fetchObject();

                        $result_p=$dbh->query("SELECT * FROM products WHERE loan_id='$row_m->productid'");
                        $row_product=$result_p->fetchObject();
                        ?>
                    <tr>
                     
                      <td><?php echo $row_product->title;  ?></td>
                      <td>Name : <?php echo $row_client->firstname." ".$row_client->lastname; ?><br>
                      Email : <?php echo $row_client->email; ?><br>
                      Contact : <?php echo $row_client->phonenumber; ?>
                    </td>
     
                      <td><?php echo $row_m->mes; ?></td> 
                      <td><?php echo $row_m->createdon; ?></td>
                      <td>
                      <form method='post' onsubmit="return delete_checker('Data','Deleted');"> 
                        <input type='hidden' name='autoid' value='<?php echo $row_m->autoid; ?>'>
                        <button type='submit' name='delete' class='' style="border:0px;" >
                        <i style='color:red' class='fa fa-trash'></i></button>
                      </form>
                      </td>
                    </tr>
                     <?php  }while($row_m=$result_m->fetchObject());
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

         
        </div>
        <!-- /.row -->
  </section>
<!-- /.content -->

<?php } ?>
</div>