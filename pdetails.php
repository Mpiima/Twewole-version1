<!DOCTYPE html>
<html lang="en">
<?php error_reporting(1);  session_start(); include 'include/header.php'; ?>
<head>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<style>
    .btn{
        border:1px solid #DFBD69 !important;
        /* background-color:#DFBD69 !important; */
    }
</style>
</head>
<body>
<!-- LOADER -->
<!-- <div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div> -->

<!-- END LOADER -->

<style>
  .btn-light{
    background-color: #0000003B !important;
  }
  </style>
  
<?php include 'include/nav2.php'; ?>
 <div ><!-- STRART CONTAINER -->
        <div>
            <!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="margin-top:0px;margin-bottom: 0px; background-image: url('assets/images/cover.png');  background-repeat:no-repeat; background-size: cover;" >
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title" > 
                <div class="btn btn-light btn-sm">
                    <span style="color:white !important;font-weight:bold" >
                    <?php 
                    $result_products=$dbh->query("SELECT * FROM products where loan_id='".$_GET['id']."'");       
                    $count_products=$result_products->rowCount();
                    $row_products=$result_products->fetchObject();
                    echo $row_products->title;
                    ?>
                    </span></div>
                </div>
            </div>
         
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="container pt-3 pb-3"  >
           <div class="row">
          
                <div class="col-md-12">
                    <?php 
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\SMTP;
                    use PHPMailer\PHPMailer\Exception;
                    require 'vendor/autoload.php';

                    $mail = new PHPMailer(true);
                    $mail3 = new PHPMailer(true);

                    $result_company=$dbh->query("SELECT * FROM scrap WHERE autoid= $row_products->institution");
                    $row_company=$result_company->fetchObject();

                    error_reporting(0);
                     if(isset($_POST['sendmessage'])){
                        $fname=$_POST['fname'];
                        $lname=$_POST['lastname'];
                        $fullname = $fname." ".$lname;
                        $message=$_POST['message'];
                        $email=$_POST['email'];
                        $contact=$_POST['contact'];
                        $user_number=$_SESSION['rolenumber'];
                        $provider=$_POST['companyId'];

                        $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='".$_SESSION['rolenumber']."'");
                        $count_users=$result_users->rowCount();
                        $row_users=$result_users->fetchObject();


                        $organised = $message."<br><hr> <h4>Customer Details</h4>Name : ". $row_users->firstname."<br>Email: ". $row_users->email."<br>Contact: ". $row_users->phonenumber."<br>Product :".$row_products->title."<br><br>"."<a href='twewole.com/login'>Click here to visit your Account</a>";
                        $ad = $message."<br><hr> <h4>Financial Provider </h4>Name : ".$row_company->item."<br>Email: ".$row_company->item7."<br>Contact: ".$row_company->item2."<br>Product :".$row_products->title."<br><br>"
                        ."<br><hr> <h4>Customer Details</h4>Name : ". $row_users->firstname."<br>Email: ". $row_users->email."<br>Contact: ". $row_users->phonenumber."<br>Product :".$row_products->title."<br><br>"."<a href='login'>Click here to visit your Account</a>";

                        $insert_m = $dbh->query("INSERT INTO messaged(sent_to,productid,mes,status,addedby,client,provider)
                        value('$row_products->institution','".$_GET['id']."','$message',1,'$row_products->addedby','$user_number','$provider')");
                        if($insert_m){
                            echo "<p style='color:orange'>Message sent! </p>";

                            //send Notification via Email
                            try {
                                //Server settings
                                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                                $mail->isSMTP();                                           
                                $mail->Host       = 'mail.twewole.com';                    
                                $mail->SMTPAuth   = true;                                   
                                $mail->Username   = 'twewoleaccounts@twewole.com';                     
                                $mail->Password   = 'Credit2023';                             
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                                $mail->Port       = 465;                              
                                $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole');    
                                $mail->addAddress($row_company->item7,$row_company->item); 
                                $mail->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
                                $mail->isHTML(true);
                                $mail->Subject = 'Customer Request';
                                $mail->Body    = $organised;
                                $mail->send();


                                $mail3->isSMTP();                                           
                                $mail3->Host       = 'mail.twewole.com';                    
                                $mail3->SMTPAuth   = true;                                   
                                $mail3->Username   = 'twewoleaccounts@twewole.com';                     
                                $mail3->Password   = 'Credit2023';                             
                                $mail3->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                                $mail3->Port       = 465;                              
                                $mail3->setFrom('twewoleaccounts@twewole.com', 'Twewole');   
                                $mail3->addAddress('twewoleaccounts@twewole.com','Twewole');
                                $mail3->addReplyTo('twewoleaccounts@twewole.com', 'Twewole');
                                $mail3->isHTML(true);
                                $mail3->Subject = 'Customer Request';
                                $mail3->Body    = $ad;
                                $mail3->send();
                                
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail3->ErrorInfo}";
                            }

                        }
                        }
                    ?>
                    <p style="font-size:15px; color:black;width:">
                        <?php 
                        echo  $row_products->summary."<br>";
                        echo " ".$row_products->amount_range;
                        ?>
                   </p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="<?php echo $row_products->howtoapply; ?>" class="btn btn-outline-warning"
                    data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color:black">Connect</a></div>
                <div class="col-md-3">
                <?php if(isset($_SESSION['rolenumber'])){
                    ?>
                    <!-- <a  data-bs-toggle="modal" data-bs-target="#staticBackdrop2" href="" class="btn btn-outline-success" style="color:black;">Ask Expert</a> -->
                    <?php } else{ ?>
                      
                    <?php } ?>
                </div>
                <div class="col-md-8"></div>
            </div>
        </div>
        </div>
        </div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Financial Provider  :  <?php echo $row_company->item; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-lg-8" style="display:non;">
            <!-- <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Contact :<a style="color:white;"  href="tel:<?php echo $row_company->item2; ?>">
            <span class="badge bg-primary rounded-pill"><?php echo $row_company->item2; ?></span></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Email :  
            <a style="color:white;" target="_blank" href="mailto:<?php echo $row_company->item7; ?>">
            <span class="badg bg-primary rounded-pill"><?php echo $row_company->item7; ?></span></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
           Address
            <span class="badge bg-primary rounded-pill">
            <?php  $row_company->item3; 
            $result_street=$dbh->query("SELECT * FROM street WHERE auto_id=$row_company->item3");
            $row_street=$result_street->fetchObject(); ?>
                <a style="color:white;" target="_blank" href="http://maps.google.com/maps?q=<?php echo $row_company->item; ?>">
               <?php $row_street->street; ?>View Location</a></span>
            </li>

            </ul> -->
        </div>
     



        <div class="">
            <form  method="POST" style="margin-top:2px;"  name="form1">
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span>
                 <span class="step"></span> <span class="step"></span> </div>
                         <div class="">
                            <div class="row">

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-4 mt-2">
                             <label>Message</label>
                             <input type="hidden" value="<?php echo $row_company->autoid; ?>" name="companyId">
                        <select class="form-select p-0 mt-3" name="message" required>
                            <option value="">-select-</option>
                         <option value="How do I apply?">How do I apply ?
                         </option>
                         <option value="Give more details">Give more details</option>
                         <option value="Schedule an appointment">Schedule an appointment</option>
                        </select>
                        </div>
                    </div>
                 

            
                          <div class="row ">
                          <div class="col-lg-4">
                          <input type="button" data-bs-dismiss="modal" aria-label="Close" class="
                          btn btn-danger p-2" name="cancel" value="Cancel" >
            </div>
            <div class="col-lg-8">
            <input type="submit" class="btn btn-primary p-2" name="sendmessage" value="Send Now" style="float:right">

            </div>
            </div>
                           
                        </div>
                         </div>

                     </div>
                    </div>
            </form>
        </div>
      </div>
      </div>
      <div class="modal-footer" style="display:none;">
        <div class="row">
            <div class="col-lg-6"> 
            <button type="button" class="btn btn-primary" style="float:right">Send</button>
            </div>
            <div class="col-lg-6">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
      
       
       
      </div>
    </div>
   </div>
   </div>        
  </div>
</div>


<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Proffessional Experts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>Trade Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Expertis</th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
         //experts 
         $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
         $count_users=$result_users->rowCount();
         $row_users=$result_users->fetchObject();
         if($count_users>0){
            do{
            ?>
            <tr>
                <td><?php  echo $row_users->tradename; ?></td>
                <td><?php echo $row_users->phonenumber; ?></td>
                <td><?php echo $row_users->email; ?></td>
                <td>
                    <?php 
                    $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
                    $count_expt=$result_exp->rowCount();
                    $row_expt=$result_exp->fetchObject();
                    if($count_expt>0){
                        do{
                         echo "<li>$row_expt->description</li>";
                        }while($row_expt=$result_exp->fetchObject());
                    }

                    ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
                </td>
            </tr>
            <?php }while($row_users=$result_users->fetchObject()); } ?>
            <?php ?>
        </tbody>
 
        <tfoot>
        <tr>
                <th>Trade Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Expertis</th>
                <th></th>
            </tr>
        </tfoot>
 
        <tbody>
        <?php 
            
              $result_users=$dbh->query("SELECT * FROM users WHERE role='BN5'");
              $count_users=$result_users->rowCount();
              $row_users=$result_users->fetchObject();
              if($count_users>0){

                do{
            ?>
            <tr>
               <td><a style="text-decoration:none;" target="_blank" href="http://maps.google.com/maps?q=<?php echo $row_users->tradename; ?>">
               <?php echo $row_users->tradename; ?></a></td>
                <td><a style="text-decoration:none;" href="tel:<?php echo $row_users->phonenumber; ?>"><?php echo $row_users->phonenumber; ?></a></td>
                <td><a style="text-decoration:none;" href="mailto:<?php echo $row_users->email; ?>"><?php echo $row_users->email; ?></a></td>
                <td>
                <ul class="list-group">
                    <?php 
                   $result_expert=$dbh->query("SELECT * FROM expertis where rolenumber='$row_users->rolenumber'");
                   $count_expert=$result_expert->rowCount();
                   $row_expert=$result_expert->fetchObject();
                   if($count_expert>0){
                       do{
                    ?>
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $row_expert->description; ?> 
                    <span class="badge bg-primary rounded-pill">
                    Fee - <?php echo $row_expert->charge; ?> 
                    </span>
                    </li>
                    

                   <?php }while( $row_expert=$result_expert->fetchObject());  }  ?>
                   </ul>
                </th>
               
            </tr>
            <?php
             }while($row_users=$result_users->fetchObject());
            }
             
            ?>
        </tbody>
    </table>

      </div>
      <div class="modal-footer" style="display:non;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
      </div>
    
    </div>
   </div>
   </div>        
  </div>
</div>

<div class="main_content" style="background-color: !important;">

<div class="section bg_light_blue2 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="heading_s1 text-center">
                    <h2>Benefits</h2>
                </div>
               
            </div>
        </div>

        <div class="row justify-content-center">
            <?php 
            $result_p=$dbh->query("SELECT * FROM p_details where productid='".$row_products->loan_id."' and benefits !='' ");       
            $count_p=$result_p->rowCount();
            $row_p=$result_p->fetchObject();
            if($count_p>0){
                do{
            ?>
            <div class="col-lg-4 col-sm-6">
                <div class="icon_box icon_box_style4 box_shadow1">
                    <div class="icon">
                        <i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                        <h5><?php echo $row_p->benefit_title; ?></h5>
                        <p><?php echo $row_p->benefits; ?></p>
                    </div>
                </div>
            </div>
            <?php 
             }while($row_p=$result_p->fetchObject()); }
            ?>
            

        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-12" >
                <div class="page-title">
                    <h2 style="padding-top: 1px;padding-bottom: 15px;color: black;font-weight: bold;text-align: center;">Requirements</h2>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div id="accordion" class="accordion accordion_style1">
                     <?php 
            $result_p=$dbh->query("SELECT * FROM p_details where productid='".$row_products->loan_id."'
             and feature !='' ");       
            $count_p=$result_p->rowCount();
            $row_p=$result_p->fetchObject();
            if($count_p>0){
                do{
            ?>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapse<?php echo $row_p->autoid; ?>" aria-expanded="true" 
                                aria-controls="collapse<?php echo $row_p->autoid; ?>">
                                <?php echo $row_p->feature_title; ?></a> </h6>
                          </div>
                          <div id="collapse<?php echo $row_p->autoid; ?>" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="card-body">
                                <p><?php echo $row_p->feature; ?></p>
                            </div>
                        </div>
                    </div>
            <?php }while($row_p=$result_p->fetchObject()); } ?>
                  
                </div>
            </div>
             <div class="col-md-1"></div>
          
        </div>
    </div>
</div>



 <div class="container" style="margin-top:30px; background-color: #0000008F;max-width: 100%; padding: 20px;" ><!-- STRART CONTAINER -->
        <div class="row align-items-center">

            <div class="col-md-6" >
                <div class="page-title">
                    <h1 style="padding-top: 10px;padding-bottom: 10px;color: whitesmoke;font-weight: bold;">
                    <?php 
                    $result_products=$dbh->query("SELECT * FROM products where loan_id='".$_GET['id']."'");       
                    $count_products=$result_products->rowCount();
                    $row_products=$result_products->fetchObject();
                    echo $row_products->title;
                    ?>
                    </h1>
                </div>
            </div>
          

        </div>
        <div class="row">
                <div class="col-md-8">
                    <p style="font-size:15px; color:white;width:100%">
                    Enjoy Flexibility, Great value, and take advantage of the Latest and Most lucrative offers on the market.</p>

                </div>
                <div class="col-md-2"><a href="#" class="btn btn-outline-warning">Connect</a></div>
                <div class="col-md-2">
                    <?php if(isset($_SESSION['rolenumber'])){?>
                    <!-- <a href="login" class="btn btn-outline-success" style="color:white;">Ask Expert</a> -->
                    <!-- <a  data-bs-toggle="modal" data-bs-target="#staticBackdrop2" href="" class="btn btn-outline-success" style="color:white;">Ask Expert</a> -->
                    <?php }  else{ ?>
                        <!-- <a href="login" class="btn btn-outline-success" style="color:white;">Ask Expert</a> -->
                    <?php } ?>
                </div>
            </div>
            
    </div>
    
    
</div>
<script>
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>



<?php include 'include/footer.php'; ?>


</body>
</html>