<?php
 global $dbh;
error_reporting(1);
include("zini_genesis.php"); ?>
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
          <php 
          use PHPMailer\PHPMailer\PHPMailer;
          use PHPMailer\PHPMailer\SMTP;
          use PHPMailer\PHPMailer\Exception;
          require 'vendor/autoload.php';
          ?>

                <?php
       if(isset($_POST['deactivate'])){
        $rolen = $_POST['rolen'];
        $update_users=$dbh->query("UPDATE users set status=4 WHERE rolenumber='$rolen'");
        $update_key=$dbh->query("UPDATE keyfields set status=4 WHERE rolenumber='$rolen'");
        if($update_key){
            //sendEmail info the owner of deactivated account
            $result_u = $dbh->query("SELECT * FROM users WHERE rolenumber='$rolen'");
            $row_u = $result_u->fetchObject();
            $email = $row_u->email;

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.twewole.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'twewoleaccounts@twewole.com';
            $mail->Password = 'Credit2023';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
            $mail->addAddress($email, $email);
            $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
            $mail->isHTML(true);
            $mail->Subject = 'Account De-activated';
            $mail->Body = "Hello, ".$email."<br>
                   Your Hasbeen Deactivated ! Contact us for Help.<br> <hr> Thank you !</hr>.";
            $mail->send();


          echo "<div class='alert alert-success'>Account Deactivated </div>";
          echo "<script>
          setTimeout(function(){window.location.href = 'user_list'; }, 2000);</script>";
        }else{
          echo "<div class='alert alert-danger'>failed</div>";
        }
      } 

      if(isset($_POST['activate'])){
        $rolen = $_POST['rolen'];
          $update_users=$dbh->query("UPDATE users set status=1 WHERE rolenumber='$rolen'");
          $update_key=$dbh->query("UPDATE keyfields set status=1 WHERE rolenumber='$rolen'");
          if($update_key){

              $result_u = $dbh->query("SELECT * FROM users WHERE rolenumber='$rolen'");
              $row_u = $result_u->fetchObject();
              $email = $row_u->email;

              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = 'mail.twewole.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'twewoleaccounts@twewole.com';
              $mail->Password = 'Credit2023';
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
              $mail->Port = 465;
              $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
              $mail->addAddress($email, $email);
              $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
              $mail->isHTML(true);
              $mail->Subject = 'Account Activated';
              $mail->Body = "Hello, ".$email."<br>
                   Your Account Hasbeen activated! <a href='http://localhost/twewole/login'>Click here To Login</a> <br> <hr> Thank you !</hr>.";
              $mail->send();

            echo "<div class='alert alert-success'>Account Activated </div>";
            echo "<script>
            setTimeout(function(){window.location.href = 'user_list'; }, 2000);</script>";
          }else{
            echo "<div class='alert alert-danger'>failed</div>";
          }
        } 
        if(isset($_POST['notify'])){
         $stmt_users = $dbh->prepare("SELECT * FROM users WHERE rolenumber = :rolenumber LIMIT 1");
         $stmt_users->bindParam(':rolenumber', $_POST['rolen']);
         $stmt_users->execute();
         $row_users = $stmt_users->fetch(PDO::FETCH_OBJ);

        //  echo $row_users->email;
        $fullname = $row_users->firstname ." ".$row_users->lastname;

        $result_subs=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_POST['rolen']."' ORDER BY subscribedon desc LIMIT 1");
        $row_subs=$result_subs->fetchObject();
        $endDate = $row_subs->expired_date;

        //send email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.twewole.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'twewoleaccounts@twewole.com';
        $mail->Password = 'Credit2023';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
        $mail->addAddress($row_users->email, $fullname);
        $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
        $mail->isHTML(true);
        $mail->Subject = 'Subscription Notice';
        $mail->Body = "Hello, " . $fullname . "<br> Your account expired on " . $endDate . "<br> 
        <a href='https://twewole.com/login'>Click here to renew your account </a><hr> Thank you !</hr>.";
        $mail->send();

         
        }

        if(isset($_POST['delete'])){
          $rolen = $_POST['rolen'];
          $email=$_POST['email'];
          $update_users=$dbh->query("DELETE FROM users  WHERE rolenumber='".$_POST['rolen']."'");
          $update_key=$dbh->query("DELETE FROM keyfields  WHERE rolenumber='".$_POST['rolen']."'");
          $del_products=$dbh->query("DELETE FROM products  WHERE addedby='".$_POST['rolen']."'");
          $update_subcription=$dbh->query("DELETE FROM subscriptions  WHERE rolenumber='".$_POST['rolen']."'");
          $update_tblstate=$dbh->query("DELETE FROM tblstate  WHERE rolenumber='".$_POST['rolen']."'");

            if($update_key){
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'mail.twewole.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'twewoleaccounts@twewole.com';
                $mail->Password = 'Credit2023';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');
                $mail->addAddress($email, $email);
                $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
                $mail->isHTML(true);
                $mail->Subject = 'Account Deleted !';
                $mail->Body = "Hello, ".$email."<br>
                     Your Account Hasbeen Deleted Completely!
                      <a href='http://localhost/twewole/contactus'>Click here To Contact us for Information
                      .... </a> <br> <hr> Thank you for using Twewole !</hr>.";
                $mail->send();
  
              echo "<div class='alert alert-success'>Account Activated </div>";
              echo "<script>
              setTimeout(function(){window.location.href = 'user_list'; }, 2000);</script>";
            }else{
              echo "<div class='alert alert-danger'>failed</div>";
            }
          } 
      ?>

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

              <div class="row mb-2">

              <div class="col-lg-6 ">
            <form>
            <select class="form-control" id="accountType" name="accountType">
        <option  value="<?php echo $_GET['id']; ?>">
          <?php 
          if(isset($_GET['id'])){
            if($_GET['id'] =="BN") {
              echo "Twewole Business";
            }else {
              echo "Twewole Account";
            }
              
          }else {
            echo "- Filter By Account Type -";
          }
          ?>
        </option>
        <?php if($_GET['id'] =="CL"){}else{ ?><option value="CL">Twewole Account</option><?php } ?>
        <?php if($_GET['id'] =="BN"){}else{ ?><option value="BN">Twewole Business</option><?php } ?>
    </select>
           </form>
      </div>

              </div>

                <table id="example1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Name(Business Name)</th>
                    
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>status</th>   

                    <th>Attached Documents</th>
                    <th>Action</th>       
                  </tr>
                  </thead>
                  <tbody>
                <?php 
                  
                  if(isset($_GET['id']) && $_GET['id'] !='CL'){
                  $result_users=$dbh->query("SELECT * FROM users WHERE role != 'sp' AND role !='CL'");
                   $_POST['accountType'] = $_GET['id'];
                  }else {
                    $_POST['accountType'] = $_GET['id'];
                    $result_users=$dbh->query("SELECT * FROM users WHERE role != 'sp' AND role ='CL'");
                  }

                  $count_users=$result_users->rowCount();
                  $row_users=$result_users->fetchObject();
                  $n=1;
                  if($count_users>0){
                    do{
                      if($row_users->status == 1){
                        $status="ACTIVE";
                        $color="green";
                        $display="none";
                        $display2="true";
                      }else if($row_users->status == 4){
                        $status="DEACTIVATED";
                        $color="orange";
                        $display="none";
                        $display2="true";
                      }
                      else{
                        $status="EXPIRED";
                        $color="red";
                        $display="none";
                        $display2="true";
                      }

                       if($row_users->role == "CL"){
                        $type="User";
                      
                      }
                      else if ($row_users->role == "sp"){
                        $type="Admin";
                       
                      }else {
                         //$type= $row_users->accounttype;
                        if($row_users->accounttype == 1){
                             $type="Commercial Bank";
                        }
                         if($row_users->accounttype == 2){
                             $type="Non-Bank Financial Institution ";
                        }
                         if($row_users->accounttype == 3){
                             $type="Tier 4 Microfinance Institution ";
                        }
                         if($row_users->accounttype == 4){
                             $type="Development Bank";
                        }
                         if($row_users->accounttype == 5){
                             $type="Insurance Company or Broker";
                        }
                         if($row_users->accounttype == 6){
                             $type="Auctioneer";
                        }
                         if($row_users->accounttype == 7){
                             $type="Others/Trial";
                        }
                         if($row_users->accounttype == 8){
                             $type="Government Entity";
                        }
                         if($row_users->accounttype == 9){
                             $type="Funding Organization";
                        }
                         if($row_users->accounttype == 10){
                             $type="Leasing Company";
                        }
                         if($row_users->accounttype == 11){
                             $type="Business Entity";
                        }
                         if($row_users->accounttype == 12){
                             $type="Professional Expert";
                        }
                        if($row_users->accounttype == 13){
                             $type="Money Lender";
                        }
                      }
                 echo "
                <tr>
                  <td><a class='link link-primary' href='#?id=".$row_users->rolenumber."'>".$row_users->firstname." "
                    .$row_users->lastname."</a><br>".$row_users->tradename."</td>
                    <td>".$row_users->email."</td>
                     <td>".$row_users->phonenumber."</td>
                      <td><a href='#?id=".$row_users->rolenumber."'>".$type."</a>
                      
                      </td>
                      <td><a  style='color:".$color."'>".$status."</a></td>"; ?>
                      <td> - <a target="_blanc" href="<?php echo substr($row_users->document, 16); ?>">  <?php 
                      echo substr($row_users->document, 35); 
                      ?></a></td>

                      <td>
                      <?php if($status == "ACTIVE"){ ?>
                        <form method='POST' onsubmit="return delete_checker('This Account','Deactivated Temporarily !');">
                        <input type='hidden' name='rolen' value="<?php echo $row_users->rolenumber; ?>">
                        <button class='btn btn-block btn-outline-danger p-1' name='deactivate' >Deactivate</button>
                        </form>
                        <?php }else if($status == "DEACTIVATED") {?>
                        <form  method='POST' onsubmit="return delete_checker('Warning,comfirm if you are sure of that action !','Alert !');">
                        <input type='hidden' name='rolen' value="<?php echo $row_users->rolenumber; ?>">
                        <input type='hidden' name='email' value="<?php echo $row_users->email; ?>">
                        <button class='btn btn-block btn-outline-primary p-1' name='activate' >Activate</button><br>
                        <button class='btn btn-block btn-danger p-1' name='delete' >DELETE</button>
                        </form>

                          <?php }else { ?>
                            <form method='POST' onsubmit="return delete_checker('Email Notification will be','sent !');">
                        <input type='hidden' name='rolen' value="<?php echo $row_users->rolenumber; ?>">
                        <button class='btn btn-block btn-outline-success p-1' name='notify' >Notify <i class="fa fa-envelope"></i></button>
                        </form>
                        <?php }?>
                      </td>
                <?php echo"</tr>
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
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Confirm ");
if(confirmer==false){return false;} }


    document.getElementById("accountType").addEventListener("change", function() {
        let selectedValue = this.value;
        let url = new URL(window.location.href);
        
        if (selectedValue) {
            url.searchParams.set("id", selectedValue); // Set or update 'id' parameter
        } else {
            url.searchParams.delete("id"); // Remove 'id' parameter if empty
        }

        window.location.href = url.toString(); // Redirect with updated URL
    });

</script> 

<?php lscripts(); ?>
</body>
</html>
