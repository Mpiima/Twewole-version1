<?php
session_start();
include("connect.php");
$rolenumber=$_SESSION["rolenumber"];
$page=$_POST["page"];
if($page=="submit_warehouse"){include("submit_warehouse.php");}
elseif($page=="submit_cat"){include("submit_cat.php");}
elseif($page=="submit_brand"){include("submit_brand.php");}
elseif($page=="submit_currency"){include("submit_currency.php");}
elseif($page=="submit_unit"){include("submit_unit.php");}
?>