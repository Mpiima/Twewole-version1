<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
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

<!-- START HEADER -->
<?php include 'include/nav.php'; ?>
<!-- END HEADER -->

<!-- START MAIN CONTENT -->
<div class="main_content" style="background-color:#f2f2f2 !important;">
<?php
error_reporting(0);
if(isset($_POST['register'])){
    //get variables
//insert into temp_users//=
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$tradename=$_POST['tradename'];
$password=$_POST['password'];
$email=$_POST['email'];

$yy=date("Y");$fyy=substr($yy,2,2);
$mm=date("m");$dd=date("d");$hi=date("h");
$mi=date("i");$sa=date("sa");$fsa=substr($sa,0,2);   

$role="CL";

$result_users=$dbh->query("select * from users order by autoid desc Limit 1");
$row_users=$result_users->fetchObject();
echo $autoid=$row_users->autoid + 1;

$rolenumber =$role.$autoid;
$status=1;
$ispending=2;
$uid=$role.$fyy.$mm.$dd.$hi.$mi.$fsa+$autoid;

$insert_users=$dbh->query("INSERT INTO users(firstname,lastname,tradename,email,username,password,status,rolenumber,userid,role,ispending)VALUES('$fname','$lname','$tradename','$email','$email','$password','$status','$rolenumber','$uid','$role','$ispending')");

$insert_keyfields=$dbh->query("INSERT INTO keyfields(rolenumber, password, pswdexpiry, 
    status, username)VALUEs('$rolenumber','$password','$psd','$status','$email')");

$insert_tempusers=$dbh->query("INSERT INTO tempusers(firstname,lastname,tradename,password,email)
    VALUES('$fname','$lname','$tradename','$password','$email')");
if($insert_keyfields){
    echo "<div class='alert alert-success'>Successfully registered</div>";
    //redirect to login
    ?>
<script>
var allowed=function(){window.location='login.php';}
setTimeout(allowed,4000);
</script>
<?php
}else{
    echo "<div class='alert alert-danger'>Error! Failed to register, Try Again</div>";
}
}

 ?>
<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h4 style="font-size:16px;">Start Today with Twewole</h4>
                        </div>
                        <form method="post" >
                            <div class="form-group mb-3">
                                <input type="text" required="true" class="form-control" name="fname" placeholder="Enter First name">
                            </div>
                             <div class="form-group mb-3">
                                <input type="text" required="true" class="form-control" name="lname" placeholder="Enter Last name">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required="true" class="form-control" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required="true" class="form-control" name="tradename" placeholder="Trading/Business name">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" id="myInput" required="" type="password" name="password" placeholder="Password">
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div> 
                           
                            <div class="form-group mb-3">
                                <button  type="submit" class="btn btn-fill-out btn-block" name="register" >Create your  account</button>

                                 <div class="login_footer form-group mb-3" style="margin-top:10px;">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" style="border-color: #b02494;">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>I acknowledge that I have read and do hereby accept the terms and conditions
                                    in the Twewole's Terms of Use,
                                    <a href="" style="color:blue;"> Merchant Agreement</a> and <a style="color:blue;" href="">Privacy Policy</a>.</span></label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>
                      
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

<?php include 'include/footer.php'; ?>




</body>
</html>