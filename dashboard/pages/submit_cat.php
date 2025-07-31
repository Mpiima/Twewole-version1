<?php
include("connect.php");
  $cat_name=$_POST['cat_name'];
  $cat_code=$_POST['cat_code'];
  $yy=date("Y"); $fyy=substr($yy,2,2);$mm=date("m"); $dd=date("d");
  $hi=date("h"); $mi=date("i");$sa=date("sa"); $fsa=substr($sa,0,2);   
  $cid="ct".$fyy.$mm.$dd.$hi.$mi.$fsa;
  $insert_scrap=$dbh->query("insert into scrap(item,item2,item3,type) values('$cid','$cat_name','$cat_code','cat')");
if($insert_scrap){ echo 1; } else {echo 0; }


?>