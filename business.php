<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
 <style type="text/css">

h1 {
    text-align: center
}

input.invalid {
    background-color: #ffdddd
}

.tab {
    display: none
}

button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

#prevBtn {
    background-color: #bbbbbb
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5
}

.step.active {
    opacity: 1
}

.step.finish {
    background-color: #4CAF50
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}

.container {
    display: block;
    position: relative;
    padding-left: 5px;
    margin-bottom: 12px;
    cursor: pointer;
    /*font-size: 22px;*/
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.must{
    color:red; 
    padding-left:5px;
}
    </style>
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
<?php include 'include/nav2.php';  ?>
<div class="breadcrumb_section bg_gray page-title-mini" style="display:none;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Get Started</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Get Started</a></li>
                    <li class="breadcrumb-item active">SignUp</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content bg_gray" style="background-color: !important;">
<?php
error_reporting(1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail2 = new PHPMailer(true);

if(isset($_POST['register'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$tradename=$_POST['tradename'];
$password=$_POST['password'];
$email=$_POST['email'];
$yy=date("Y");$fyy=substr($yy,2,2);
$mm=date("m");$dd=date("d");$hi=date("h");
$mi=date("i");$sa=date("sa");$fsa=substr($sa,0,2);   
$accounttype=$_POST['category2'];
$role="BN".$accounttype;
$category=$_POST['category'];
$website=$_POST['website'];
$phonenumber=$_POST['contact'];
$result_users=$dbh->query("select * from users order by autoid desc Limit 1");
$row_users=$result_users->fetchObject();
$autoid=$row_users->autoid + 1;
$rolenumber =$role.$autoid;
$status=1;
$ispending=2;
$uid=$role.$fyy.$mm.$dd.$hi.$mi.$fsa+$autoid;

$result_checkUser=$dbh->query("select * from users WHERE email='$email'");
$row_checkUsers=$result_checkUser->fetchObject();

if($row_checkUsers->email == $email){
    echo "<div class='alert alert-danger'>Error! Failed to register, Email Already Exists . Try Again</div>";
}else if($row_checkUsers->email != $email){
$organised2 = "Hi " . $lname . ",<br><br>
Welcome to your new account. Below are your credentials:<br><br>
Username: " . $email . "<br>
Password: " . $password . "<br><br>
You can log in anytime by visiting <a href='https://twewole.com/login'>https://twewole.com/login</a>. Please note that our staff will never ask for your password. If you have any questions, stop by the FAQ at <a href='https://twewole.com/faq'>https://twewole.com/faq</a>.<br><br>
Good luck!<br><br>
Contact us on:<br>
Call: 0743070700 or 0764045147<br>
WhatsApp: 0726093614<br>
Email: <a href='mailto:credit@twewole.com'>credit@twewole.com</a><br><br>
Sincerely,<br>
Twewole Family<br><br>
P.S: Subscribe to our Newsletter for the latest financing tips, products and services.";

$messageForUSer =  $tradename . " has successfully registered for a Twewole Business account with the username: " . $email . ".<br>";


$organised = "
<html>
<head>
    <title>Welcome to Twewole Business</title>
</head>
<body>
    <p>Hi $lname ($tradename)</p>
    <p>Thank you for choosing Twewole Business! Enjoy your 30-day trial as you showcase your products and services on our platform. Note that a recent Trading or Operating license or both is required to utilize your account fully.</p>
    <p>Below are your credentials:</p>
    <ul>
        <li>Username: $email</li>
        <li>Password: $password</li>
    </ul>
    <p>You can log in anytime by visiting <a href='https://twewole.com/login'>https://twewole.com/login</a>. Please note that our staff will never ask for your password. If you have any questions, stop by the FAQ at <a href='https://twewole.com/faq'>https://twewole.com/faq</a>.</p>
    <p>We’ll remind you when you have a few days left in your trial.</p>
    <p>Contact us:</p>
    <ul>
        <li>Call: 0743070700 or 0764045147</li>
        <li>WhatsApp: 0726093614</li>
        <li>Email: <a href='mailto:credit@twewole.com'>credit@twewole.com</a></li>
    </ul>
    <p>Sincerely,<br/>Twewole Family</p>
    <p>P.S. Subscribe to our Newsletter for the latest information on how to enjoy the services that come with your business account.</p>
</body>
</html>
";
//get the logo========
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
$logo=$_POST['logo'];
$target_dir = "dashboard/pages/uploads/logos/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["logo"]["tmp_name"]);
  if($check !== false) {
     "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    "File is not an image.";
    $uploadOk = 0;
  }
// Check if file already exists
if (file_exists($target_file)) {
   "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["logo"]["size"] > 500000) {
  "Sorry, your file is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
     "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
  } else {
    "Sorry, there was an error uploading your file.";
  }
}

} else {
    $target_file = "";
}



//get the document ====
$target_dir2 = "dashboard/pages/uploads/documents/";
$target_file2= $target_dir2 . basename($_FILES["document"]["name"]);

if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file2)) {
//   echo "The file " . basename($_FILES["document"]["name"]) . " has been uploaded.";
} else {
//   echo "Sorry, there was an error uploading your file.";
}

$item2="company";
// $category=$_POST['category'];
$address=$_POST['address'];
$psd="2030-01-01";


//=========end 
$insert_users=$dbh->query("INSERT INTO users(firstname,lastname,tradename,email,username,password,
status,rolenumber,userid,role,logo,document,website,phonenumber,accounttype)VALUES('$fname','$lname','$tradename','$email',
'$email','$password','$status','$rolenumber','$uid','$role','$target_file','$target_file2','$website','$phonenumber','$accounttype')");
$insert_keyfields=$dbh->query("INSERT INTO keyfields(rolenumber, password, pswdexpiry, 
    status, username)VALUEs('$rolenumber','$password','$psd','$status','$email')");

    

$insert_company=$dbh->query("INSERT INTO scrap(item,type,item2,item3,item4,item5,item6,item7)
values('$tradename','$item2','$phonenumber','$address','$target_file','$category','$website','$email')");

if($insert_users){
    
    echo "<div class='alert alert-success'>Successfully registered! Check your Email for Your Credentials</div>";
    try {
       
        // send notification to Admin                   
        $mail->isSMTP();                                           
        $mail->Host       = 'mail.twewole.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'twewoleaccounts@twewole.com';                     
        $mail->Password   = 'Credit2023';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                              
        $mail->setFrom('twewoleaccounts@twewole.com', 'Twewole'); 
        $mail->addAddress('twewoleaccounts@twewole.com','Twewole'); 
        $mail->isHTML(true);
        $mail->Subject = 'New User';
        $mail->Body    = $messageForUSer;    
        $mail->send();
        //end

         // send notification to user                   
         $mail2->isSMTP();                                           
         $mail2->Host       = 'mail.twewole.com';                    
         $mail2->SMTPAuth   = true;                                   
         $mail2->Username   = 'twewoleaccounts@twewole.com';                     
         $mail2->Password   = 'Credit2023';                              
         $mail2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
         $mail2->Port       = 465;                              
         $mail2->setFrom('twewoleaccounts@twewole.com', 'Twewole'); 
         $mail2->addAddress($email,$fname); 
         $mail2->isHTML(true);
         $mail2->Subject = 'Your Twewole Account';
         $mail2->Body    = $organised;    
         $mail2->send();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>
    <script>
    var allowed=function(){window.location='login';}
    setTimeout(allowed,2000);
    </script>
    <?php
    ?>
<script>
</script>
<?php
}
}else{
    echo "<div class='alert alert-danger'>Error! Failed to register, Try Again</div>";
}
}
 ?>

<div class="container mt-5" >
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <form id="regForm" style="margin-top:20px;" method="POST" enctype="multipart/form-data">
                <h1 id="register">Register for your account</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                         <div class="tab">
                            <div class="row">
                                <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label>First Name <span class="must">*</span></label>
                                <input type="text" required="true" class="form-control" name="fname" placeholder="Enter First name">
                            </div>
                             <div class="form-group mb-3">
                                 <label>Last Name<span class="must">*</span></label>
                                <input type="text" required="true" class="form-control" name="lname" placeholder="Enter Last name">
                            </div>
                            <div class="form-group mb-3">
                                 <label>Email<span class="must">*</span></label>
                                <input type="text" required="true" class="form-control" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mb-3">
                            <label>Company Address<span class="must">*</span></label>
                            <select name="address" class="form-control" required> 
                                <option>-select-</option>
                                <?php
                                $result_streets=$dbh->query("SELECT * FROM street");
                                $count_streets=$result_streets->rowCount();
                                $row_streets=$result_streets->fetchObject();
                                if($count_streets>0){
                                    do{ 
                                        echo "<option value='".$row_streets->auto_id."'>".$row_streets->street."</option>";
                                }while($row_streets=$result_streets->fetchObject()); } ?>
                            </select>
                            </div>
                            <div class="form-group mb-3">
                             <label>Category<span class="must">*</span></label>
                            <select class="form-control" name="category2" required>
                                <option>- select -</option>
                                <?php
                                $result_account=$dbh->query("SELECT * FROM account_type");
                                $count_account=$result_account->rowCount();
                                $row_account=$result_account->fetchObject();
                                if($count_account>0){
                                    do{
                                    echo "<option value=".$row_account->autoid.">".$row_account->accountname."</option>";
                                        }while($row_account=$result_account->fetchObject());
                                }
                                ?> 
                             </select>
                            </div>

                            <div class="form-group mb-3" style="display:none;">
                             <label>Sub Category</label>
                            <select class="form-control" name="category">
                                <?php
                                $result_scrap=$dbh->query("SELECT * FROM scrap where item2='inst_cat'");
                                $count_scrap=$result_scrap->rowCount();
                                $row_scrap=$result_scrap->fetchObject();
                                if($count_scrap>0){
                                    do{
                                    echo "<option value=".$row_scrap->autoid.">".$row_scrap->item."</option>";
                                        }while($row_scrap=$result_scrap->fetchObject());
                                }
                                ?> 
                             </select>
                            </div> 
                            
                            <div class="form-group mb-3">
                                 <label>Trading/Business name<span class="must">*</span></label>
                                <input type="text" required="true" class="form-control" name="tradename" placeholder="Trading/Business name">
                            </div>     
                         </div>
                         <div class="col-lg-6">
                        <div class="form-group mb-3">
                             <label>Brand/Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="logo">
                        </div>
                        <div class="form-group mb-3">
                             <label>Contact No.<span class="must">*</span></label>
                            <input type="text" required="true" class="form-control" name="contact" placeholder="Tel no.">
                        </div>
                         <div class="form-group mb-3">
                             <label>Website</label>
                            <input type="text" class="form-control" name="website" placeholder="Your Website">
                        </div>
                         <div class="form-group mb-3">
                             <label>Attach Trading License or Operating License or Both<span class="must">*</span></label>
                            <input type="file" required  class="form-control" name="document" id="document" placeholder="Tel no.">
                        </div>
                        <div class="form-group mb-3">
                                <label>Password<span class="must">*</span></label>
                                <input  class="form-control"  type="password" id="myInput" name="password"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase 
                               and lowercase letter, and at least 8 or more characters" required placeholder="Password">

                                <!-- <input class="form-control" id="myInput" required="true" type="password" 
                                name="password" placeholder="Password"> -->
                               <input  type="checkbox" onclick="myFunction()"> &nbsp;&nbsp;show password
                            </div> 

                            

                          <div class="form-group mb-3">
                          <input required type="checkbox"> &nbsp;&nbsp;<a href="toc" class="primary[">I agree to the Terms And Conditions </a><br><br>
                             <input type="submit" name="register" class="btn btn-primary">     
                         </div> 
                         </div>
                         

                     </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
var myInput = document.getElementById("myInput");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>




<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

    //your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

});

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        // document.getElementById("regForm").submit();
        // return false;
        //alert("sdf");
        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";




    }
    showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
    return valid;
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
    x[n].className += " active";
}
</script>






<?php include 'include/footer.php'; ?>




</body>
</html>