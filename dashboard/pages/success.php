<?php
session_start();
include 'connect.php';
error_reporting(0);
// $_SESSION['rolenumber'] =$rolenumber=$_GET['rolenumber'];
$result_use=$dbh->query("select * from users where rolenumber='".$rolenumber=$_GET['rolenumber']."' and autoid>0");
$row_use=$result_use->fetchObject();
$_SESSION["username"] = $row_use->username;
$_SESSION["firstname"]= $row_use->firstname;
$_SESSION["lastname"]= $row_use->lastname;
$_SESSION["role"] = $row_use->role;
$_SESSION["rolenumber"] = $row_use->rolenumber;
$_SESSION["db_name"] = $row_use->db_name;
$_SESSION["tradename"] = $row_use->tradename;
$_SESSION['logo']=$row_use->logo;
if(!isset($_SESSION['rolenumber'])){
?>
<script>
var allowed=function(){window.location='../../login';}
setTimeout(allowed,1);
</script>
<?php
}
?> 
<?php 
if(isset($_GET['status'])){
 $status=$_GET['status'];
 $amount=$_GET['amount'];
$rolenumber=$_GET['rolenumber'];
$expireddate=date('Y-m-d',strtotime('+120 day', strtotime(Date('y-m-d')))); 
// add 120 days to date
$result_sub=$dbh->query("SELECT * FROM subscriptions");
$count_sub=$result_sub->rowCount();
$row_sub=$result_sub->fetchObject();
if($count_sub>0){
$subscriptionid=$row_sub->autoid+1;
}else{
$subscriptionid=1;
}
$status=1;

 $accounttype=$_GET['accounttype'];
//insert subscription
$insert_subc = $dbh->query("INSERT INTO subscriptions (noofdays,expired_date,account,period,rolenumber)
values(120,'$expireddate','$accounttype','quartely','$rolenumber')");
//into tblstate
$insert_tblstate=$dbh->query("INSERT INTO tblstate(rolenumber,status,subscriptionid)
values('$rolenumber','$status','$subscriptionid')");

if($insert_tblstate){
echo "<div class='alert alert-success'>Subscription Successfully! Redirecting to your account ............</div>";
?>
<script>
var allowed=function(){window.location='dashboard';}
setTimeout(allowed,3000);
</script>
<?php
}else{
echo "<div class='alert alert-danger'>Failed! Try again </div>";
}
}

?>