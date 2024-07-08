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
.btn-primary{
    background-color:#ffe1e1;
    color:purple !important;
    font-weight:800px ;
    border-color:#ffe1e1;
}
.bg_gray {
    background-color:  transparent !important;
    margin-top:40px;
    padding-bottom:40px;
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
<?php include 'include/nav2.php'; ?>
<div class="breadcrumb_section  page-title-mini" style="display:none;">
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
                    <li class="breadcrumb-item active">Sign Up</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content bg_gray">
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
var allowed=function(){window.location='login';}
setTimeout(allowed,4000);
</script>
<?php
}else{
    echo "<div class='alert alert-danger'>Error! Failed to register, Try Again</div>";
}
}
 ?>   
<div class="row d-flex justify-content-center align-items-center" >
 <div class="col-md-12">

<section class="content">
  <div class="container-fluid">

    <div class="demo">
    <div class="container">
         <div class="row" style="margin-top:40px; bottom:40px;">
            <div class="col-md-2 col-sm-6"></div>




<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleUser" tabindex="-1" aria-labelledby="exampleUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p class="mt-2">
       Thank you for choosing Twewole as your source of Money, Credit, and Finance Opportunities.
       </p>
       <p>
        <form>
           <!-- <label>Are you </label><br><br> -->
          <a class="btn btn-primary"  href="membership">
           Get Started As An Individual</a><br>
          <a href="membership"  class="btn btn-warning mt-2" >
          Get Started As Small Business</a><br>
           <br>
           Or<br>
           <a href="membership"  class="btn btn-danger mt-2" >
          Both</a><br>

        </form>
       </p>
      </div>
      <!-- <div class="modal-footer">
      
       Get started (link: <a style="color:blue" href="https://twewole.com/membership">https://twewole.com/membership</a>) 
    
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="exampleUser2" tabindex="-1" aria-labelledby="exampleUser2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p class="mt-2">
       Welcome to Twewole Business!
Enjoy your 30-Day Trial as you showcase your products and services.
We’ll remind you when you have few days left in your trial.<br><br>
<a class="link-primary"  href="business">
•	Are you a Supervised Financial Institution?<br>
•	Are you a Government MDA?<br>
•	Are you a Funding Organization?<br>
•	Are you a Business Entity?<br>
•	Are you a Professional Expert?<br>
•	Are you a different Entity from the above?<br></a>

       </p>
       <p>
        <!-- <form>
   <a class="btn btn-primary"  href="business">
           Get Started As An Individual</a><br>
          <a href="business"  class="btn btn-warning mt-2" >
          Get Started As Small Business</a><br>
           <br>
           Or<br>
           <a href="business"  class="btn btn-danger mt-2" >
          Both</a><br>

        </form> -->
       </p>
      </div>
      <!-- <div class="modal-footer">
      
       Get started (link: <a style="color:blue" href="https://twewole.com/membership">https://twewole.com/membership</a>) 
    
      </div> -->
    </div>
  </div>
</div>





        <div class="col-md-4 col-sm-6">
                <div class="pricingTable"style="height:380px;" style="background-color:#b02494 !important;" >
                   
                    <div class="price-value" >Twewole Account</div>
                    <p style="color:white; font-size: 14px; text-align: justified;">
                     For Individuals/Small businesses who want to view the credit opportunities available. Feel free to sign up. 
                    </p>
                        <!-- <a href="membership" class="btn btn-sm btn-primary">
                        SIGN UP <i class="fas fa-arrow"></i></a> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleUser">SIGN UP</button>
                         
            </div>
        </div>

        <div class="col-md-4 col-sm-6" style="" >
                <div class="pricingTable" style="height:380px;background-color:#E0AA3E !important;">
                    
                    <div class="price-value">Twewole Business</div>
                    <p style="color:white; font-size: 14px; text-align: justified;">
                    Twewole Business Account: For Supervised financial institutions/Government entities/Funding
                     organizations/Accredited credit providers/Professional experts/Auctioneers 
                    who want to upload their credit products & services. Feel Free to sign up.
                    </p>
                          <!-- <a href="business" class="btn btn-sm btn-primary" >
                        SIGN UP</a> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleUser2">SIGN UP</button>
                          
            </div>
        </div>

        <div class="col-md-2 col-sm-6"></div>
    </div>
    
</div>


</div>
 
<style type="text/css">
:root{ --main-color: #d852a7; }
.pricingTable{
    color: #fff;
    background: var(--main-color);
    font-family: 'Open Sans', sans-serif;
    text-align: center;
    padding: 30px 20px;
    margin: 0 15px;
    border-radius: 30px;
}
.pricingTable .pricingTable-header{ margin: 0 20px 30px; }
.pricingTable .title{
    color: #fff;
    font-size: 22px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0;
}
.pricingTable .price-value{
    color: var(--main-color);
    background: #ffe1e1;
    font-size: 25px;
    font-weight: 700;
    margin: 0 30px 30px -35px;
    border-radius: 0 30px 0 0;
    box-shadow: 3px 3px 5px rgba(0,0,0,0.3);
    position: relative;
}
.pricingTable .price-value:before{
    content: "";
    background: linear-gradient(to top right, transparent 49%, #f79d9b 50%);
    width: 15px;
    height: 15px;
    position: absolute;
    bottom: -15px;
    left: 0;
}
.pricingTable .pricing-content{
    padding: 0;
    margin: 0 0 30px;
    list-style: none;
}
.pricingTable .pricing-content li{
    color:#fff;
    font-size: 17px;
    line-height: 25px;
    text-transform: capitalize;
    margin: 0 0 15px;
}
.pricingTable .pricing-content li:last-child{ margin: 0; }
.pricingTable .pricingTable-signup a{
    color: var(--main-color);
    background: #FCD2D1;
    font-size: 25px;
    font-weight: 900;
    text-transform: uppercase;
    padding: 5px 15px;
    display: inline-block;
    transition: all 0.3s ease-in-out;
}
.pricingTable .pricingTable-signup a:hover{ 
    text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.4);
}
.pricingTable.purple{ --main-color: #7a54f2; }
.pricingTable.blue{ --main-color: #1c9cea; }
@media only screen and (max-width: 990px){
    .pricingTable{ margin: 0 0 40px; }
}
</style>
    
  </div>
  
</section></div>
 </div> </div></div>



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