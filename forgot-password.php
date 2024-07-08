<!DOCTYPE html>
<?php session_start(); error_reporting(1);  ?>
<html lang="en">
<?php include 'include/header.php';?>
<body style="background-color:#e0aa3e3b !important;">

<!-- LOADER -->
<!-- <div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div> -->

<?php include 'include/nav2.php';  ?>

<style>
    .btn-success{
        background-color:#b02494 !important; 
        border-color:#b02494;
    }
</style>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini" style="display:none;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Getting Started</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content bg_gray">
<?php
  session_start();
if(isset($_POST["login_user"])){
// include("logins/connect.php");
include ('main/pages/connect.php');
 $mypassword=$_POST["mypassword"];
 $myusername=$_POST["myusername"];
$status='1';
$currentdate=date("Y-m-d");
$result_users=$dbh->prepare("select * from keyfields where password=:passd and username=:usern and status=:stat  order by autoid desc limit 1");
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
if($row_use->role == "CL"){
    $_SESSION["username"] = $row_users->username;
    $_SESSION["firstname"]= $row_use->firstname;
    $_SESSION["lastname"]= $row_use->lastname;
     $_SESSION["role"] = $row_use->role;
    $_SESSION["rolenumber"] = $row_users->rolenumber;
    $_SESSION["db_name"] = $row_use->db_name;
    $_SESSION["tradename"] = $row_use->tradename;
    $_SESSION['logo']=$row_use->logo;


?>
<script>
var allowed=function(){window.location='my-account';}
setTimeout(allowed,1000);
</script>
<?php
}else{
    ?>
    <script>
    var allowed=function(){window.location='main/pages/dashboard';}
    setTimeout(allowed,1000);
    </script>
    <?php
}

}else{echo "<div class='alert alert-danger' style='text-align:center'>An Email hasbeen sent for you to reset your password . </div>";}
        }
?>

<!-- START LOGIN SECTION -->
<style>
    .btn-fill-out {
    background-color: transparent;
    border: 1px solid #f7cd12; }
    
    .btn-fill-out:hover {
    color: #FF324D !important;
}
</style>
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Reset Your Password</h3>
                        </div>
                        <form method="post">
                            <div class="form-group mb-3">
                                <input type="email" required="" class="form-control" name="myusername" placeholder="Your Email">
                            </div>
                         
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-success btn-block"  name="login_user">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("pid");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


</div>
<!-- END MAIN CONTENT -->

<?php include 'include/footer.php'; ?>

</body>
</html>