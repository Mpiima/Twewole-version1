<!DOCTYPE html>
<html lang="en">
<head>
<title>Twewole | Money Credit</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="logins/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logins/css/util.css">
	<link rel="stylesheet" type="text/css" href="logins/css/main.css">
<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<?php
  session_start();
if(isset($_POST["login_user"])){
include("logins/connect.php");
$mypassword=$_POST["mypassword"];
$myusername=$_POST["myusername"];
$status='1';
$currentdate=date("Y-m-d");
$result_users=$dbh->prepare("select * from keyfields where password=:passd and username=:usern and pswdexpiry>='$currentdate' and status=:stat  order by autoid desc limit 1");
$result_users->bindParam(':passd', $mypassword);
$result_users->bindParam(':usern', $myusername);
$result_users->bindParam(':stat', $status);
$result_users->execute();
$row_users=$result_users->fetchObject();
$count_users=$result_users->rowCount();

if($count_users>0){
    $result_use=$dbh->query("select * from users where rolenumber='$row_users->rolenumber' and autoid>0");
    $row_use=$result_use->fetchObject();
$_SESSION["username"] = $row_users->username;
$_SESSION["firstname"]= $row_use->firstname;
$_SESSION["lastname"]= $row_use->lastname;
$_SESSION["role"] = $row_use->role;
$_SESSION["rolenumber"] = $row_users->rolenumber;
$_SESSION["db_name"] = $row_use->db_name;
$_SESSION["tradename"] = $row_use->tradename;
$_SESSION['logo']=$row_use->logo;

echo "<div class='alert alert-success' style='text-align:center'>Access Granted.</div>";
?>
<script>
var allowed=function(){window.location='pages/dashboard';}
setTimeout(allowed,1000);
</script>
<?php
}else{echo "<div class='alert alert-danger' style='text-align:center'>Authenication failed. </div>";}
        }
?>

<form method="post" autocomplete="off">
<!-- <span class="login100-form-title p-b-30" style="font-size: 20px; display:none;">Welcome To <br><i style="font-size: 24px">
TWEWOLE </i></span> -->
<span class="login100-form-title p-b-5"><img src="logins/images/logo.png" width="60%" height="50%"></span>
<div class="wrap-input100 validate-input">
<input class="input100" type="text" name="myusername" placeholder="Enter Username"></div>
<div class="wrap-input100 validate-input">
<input class="input100" type="password" name="mypassword" placeholder="Enter Password"></div>
<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn"><div class="login100-form-bgbtn"></div>
<button class="login100-form-btn" type="submit" name="login_user">Sign In</button></div></div>

<div class="text-center p-t-20">
<a class="login100-form-title"  href='https://zinitechnology.com' style="font-size: 12px">Developed By Zini Technology</a></div>
</form>
</div></div>
<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="logins/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="logins/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="logins/vendor/bootstrap/js/popper.js"></script>
	<script src="logins/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="logins/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="logins/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="logins/js/main.js"></script>

</body>
</html>
