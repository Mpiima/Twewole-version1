<?php
date_default_timezone_set('Africa/Kampala');
@session_start();
include("connect.php");

// include("notifications.php");

//checking for subscription status
$result_state = $dbh->query("SELECT * FROM tblstate WHERE rolenumber='".$_SESSION['rolenumber']."'");
$count_state=$result_state->rowCount();
$row_state=$result_state->fetchObject();
//checking if account exists
 if($count_state == 0){ ?>
  <script>
  function status_checker(names, act){
  var confirmer=confirm("Enjoy your 30-day trial as you showcase your products and services.  We’ll remind you when you have a few days left in your trial. Press Ok to continue.");
  if(confirmer==false){
    // return false;
    location.href = '../../login';
  }else{
    location.href = 'subscribe'; 
  } }
  </script>
  <body onload="status_checker()">
   <?php }else if($count_state > 0){
      //check if it expired or its not
      if($row_state->status==0){?>
  <script>
  function status_checker(names, act){
  var confirmer=confirm("RENEW YOUR ACCOUNT");
  if(confirmer==false){
    // return false;
    location.href = '../../login';
  }else{
    location.href = 'renew'; 
  } }
  </script>
  <body onload="status_checker()">
      <?php 
      }else{
      //loggined..
      }


   }

if (!isset($_SESSION['rolenumber'])) {
header('Location:../index?wasgoinghere='.urlencode($_SERVER['REQUEST_URI']));
}
$goodusers="and status='active'";
$rolenumber=$_SESSION["rolenumber"];
$role=$_SESSION["role"];
$today=date("Y-m-d H:m:s");
$todaynow=date("Y-m-d h:i:s");
$currentyear=date("y");
$currentmonth=date("m");
if(isset($_POST["theme_mode"])){
$theme_mode=$_POST["theme_mode"];
if($theme_mode=='dark-mode'){$theme_mode=$_POST["theme_mode"]; $specifier=1;}
elseif($theme_mode=='no-dark'){$theme_mode=$_POST["theme_mode"]; $specifier=0;}
$update_theme=$dbh->query("update scrap set item2='$theme_mode', item3='$specifier' where type='theme'");
}
$result_theme=$dbh->query("select * from scrap where type='theme'");
$count_theme=$result_theme->rowCount();
$row_theme=$result_theme->fetchObject();
if ($row_theme->item3==1) {$mymode=$row_theme->item2;}
elseif($row_theme->item3==0){$mymode=="";}
function fixTitle(&$input)
{
$input = str_replace('-', ' ',$input);
$pos = strpos($input,'.');
if($pos > 0)
$input = substr($input,0,$pos);
$input = ucwords($input);
}
function kheader(){
$aTitle = explode('/',trim($_SERVER['REQUEST_URI'],'/'));
$aTitle = array_reverse($aTitle);
array_walk($aTitle, 'fixTitle');

echo "<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='x-ua-compatible' content='ie=edge'>

<title>Twewole Business -".implode(' | ',$aTitle)."</title>

<!-- Google Font: Source Sans Pro -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>
<!-- Font Awesome Icons -->
<link rel='stylesheet' href='../plugins/fontawesome-free/css/all.min.css'>
<!-- overlayScrollbars -->
<link rel='stylesheet' href='../plugins/overlayScrollbars/css/OverlayScrollbars.min.css'>
<!-- Theme style -->
<link rel='stylesheet' href='../dist/css/adminlte.min.css'>
 <!-- iCheck for checkboxes and radio inputs -->
<link rel='stylesheet' href='../plugins/icheck-bootstrap/icheck-bootstrap.min.css'>
<!-- Bootstrap Color Picker -->
<link rel='stylesheet' href='../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'>
<!-- Tempusdominus Bootstrap 4 -->
<link rel='stylesheet' href='../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'>
<!-- Select2 -->
<link rel='stylesheet' href='../plugins/select2/css/select2.min.css'>
<link rel='stylesheet' href='../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'>
<!-- Bootstrap4 Duallistbox -->
<!-- BS Stepper -->
<link rel='stylesheet' href='../plugins/bs-stepper/css/bs-stepper.min.css'>
<link rel='stylesheet' href='../plugins/summernote/summernote-bs4.min.css'>


<!-- DataTables -->
  <link rel='stylesheet' href='../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'>
  <link rel='stylesheet' href='../plugins/datatables-responsive/css/responsive.bootstrap4.min.css'>
  <link rel='stylesheet' href='../plugins/datatables-buttons/css/buttons.bootstrap4.min.css'>
<script src='../js/jquery.js'></script> "; ?>
  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: blue;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.dataTables_filter {
  float:right;
  margin-bottom: 1em;
  
  &:after {
    clear:both;
  }
}

.dt-buttons a .glyphicon {
  visibility: hidden;
}
.dt-buttons a:hover .glyphicon {
  visibility: visible;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #647e99;
}

.buttons-copy {
  font-size: 13px;
  border:1px solid #3b82f6;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: #3b82f6;
    box-shadow: none;
    margin: 5px;
} 
.dark-mode .buttons-copy {
  font-size: 13px;
  border:1px solid #3b82f6;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: #3b82f6;
    box-shadow: none;
    margin: 5px;
}
.buttons-copy:hover {
      background-color:#3b82f6;
      transition: 0.7s;
  }

  .buttons-csv {
  font-size: 13px;
  border:1px solid orange;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: orange;
    box-shadow: none;
    margin: 5px;
}
.dark-mode   .buttons-csv {
  font-size: 13px;
  border:1px solid orange;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: orange;
    box-shadow: none;
    margin: 5px;
}
.buttons-csv:hover {
      background-color:orange;
      transition: 0.7s;
  }

   .buttons-excel {
  font-size: 13px;
  border:1px solid green;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: green;
    box-shadow: none;
    margin: 5px;
}
.dark-mode  .buttons-excel {
  font-size: 13px;
  border:1px solid green;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: green;
    box-shadow: none;
    margin: 5px;
}
.buttons-excel:hover {
      background-color:green;
      transition: 0.7s;
  }


   .buttons-pdf {
  font-size: 13px;
  border:1px solid red;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: red;
    box-shadow: none;
    margin: 5px;
}
.dark-mode   .buttons-pdf {
  font-size: 13px;
  border:1px solid red;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: red;
    box-shadow: none;
    margin: 5px;
}
.buttons-pdf:hover {
      background-color:red;
      transition: 0.7s;
  }

    .buttons-print {
  font-size: 13px;
  border:1px solid purple;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: purple;
    box-shadow: none;
    margin: 5px;
}
.dark-mode .buttons-print {
  font-size: 13px;
  border:1px solid purple;
  border-radius: 1px;
    color: green;
    background-color: whitesmoke;
    border-color: purple;
    box-shadow: none;
    margin: 5px;
}
.buttons-print:hover {
      background-color:purple;
      transition: 0.7s;
  }

div.dataTables_wrapper div.dataTables_info {
    padding-top: 0.85em;
    font-size: 13px;
}
div.dataTables_wrapper div.dataTables_paginate {
    margin: 0;
    white-space: nowrap;
    text-align: right;
    font-size: 13px;
}
body {
    margin: 0;
    font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 0.85rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: left;
    background-color: #fff;
}
.txtform{
      background-color:whitesmoke;
    }
    .txtfile{
      border:0px;
      background-color:white;
    }
    .fa-trash{
      color:red;
    }
    .fa-edit{
      color:orange;
    }
    [class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] 
    .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
    background-color:transparent;
    color: #fff;
}

[class*=sidebar-dark] .user-panel {
    border-bottom: 0px solid #4f5962;
}
</style>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<?php
}

function kleftbar(){
include("connect.php");
echo "
<div class='wrapper'>
<!-- Navbar -->
<nav class='main-header navbar navbar-expand navbar-dark'>
<!-- Left navbar links -->
<ul class='navbar-nav'>
<li class='nav-item'>
<a class='nav-link' data-widget='pushmenu' href='#' role='button'><i class='fas fa-bars'></i></a>
</li>
<li class='nav-item d-none d-sm-inline-block'>
<a href='dashboard' class='nav-link'>Home</a>
</li>
<li class='nav-item d-none d-sm-inline-block'>
<a href='#' class='nav-link'>Contact</a>
</li>
</ul>

<!-- Right navbar links -->
<ul class='navbar-nav ml-auto'>
<!-- Navbar Search -->
<li class='nav-item'>
<a class='nav-link' data-widget='navbar-search' href='#' role='button'>
<i class='fas fa-search'></i>
</a>
<div class='navbar-search-block'>
  <!-- navbar search -->
// <form class='form-inline'>
// <div class='input-group input-group-sm'>
// <input class='form-control form-control-navbar' type='search' placeholder='Search for everything' aria-label='Search'>
// <div class='input-group-append'>
// <button class='btn btn-navbar' type='submit'>
// <i class='fas fa-search'></i>
// </button>
// <button class='btn btn-navbar' type='button' data-widget='navbar-search'>
// <i class='fas fa-times'></i>
// </button>
// </div>
// </div>
// </form>
<!-- navbar search ends -->
</div>
</li>
<li class='nav-item mr-3'>
";?>

<form method='POST' onsubmit="return delete_checker('Your Account','Deleted Permanently. This Action can not be reversed!');">
<input type='hidden' name='rolenumber' value=".$_SESSION['rolenumber'].">
<button class='btn btn-block btn-outline-danger' name='deleteAccount'>DELETE ACCOUNT</button>
</form>

<?php echo "</li>
<li class='nav-item'>
<a href='../../index'  target='_blank' class='btn btn-block btn-outline-success'>VISIT SITE</a>
</li>

<!-- Messages Dropdown Menu -->

<!-- Notifications Dropdown Menu -->

<li class='nav-item dropdown'>
<a class='nav-link'  href='edit_profile'>
<i class='far fa-user'></i>
</a>
<div class='dropdown-menu dropdown-menu-lg dropdown-menu-right'>
<a href='edit_profile.php' class='dropdown-item'>
<i class='fas fa-users mr-2'></i> User profile
</a>
<div class='dropdown-divider'></div>
<a href='../logout.php' class='dropdown-item'>
<i class='fas fa-arrow-right mr-2'></i> Log Out
</a>
<div class='dropdown-divider'></div>

<div class='dropdown-divider'></div>
<a href='#' class='dropdown-item dropdown-footer'>Settings</a>
</div>
</li>
<li class='nav-item'>
<a class='nav-link' data-widget='fullscreen' href='#' role='button'>
<i class='fas fa-expand-arrows-alt'></i>
</a>
</li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class='main-sidebar sidebar-dark-primary elevation-4'>
<!-- Brand Logo -->
<a href='dashboard' class='brand-link'>
<img src='lg.png' alt='Zini Tech' class='brand-image img-circle elevation-3' style='opacity: .8'>
<span class='brand-text font-weight-light'>TWEWOLE</span>
</a>

<!-- Sidebar -->
<div class='sidebar'>
<!-- Sidebar user panel (optional) -->
<div class='user-panel mt-3 pb-3 mb-3 d-flex' style='display:none;'>
<div class='image' style='display:none;'>
<img src=".$_SESSION['logo']." class='img-circle elevation-2' alt='User Image'>
</div>
<div class='info' style='display:none;'> 
<a href='dashboard' class='d-block'>".$_SESSION['tradename']."</a>
</div>
</div>

<!-- SidebarSearch Form -->
<div class='form-inline' style='display:none;'>
<div class='input-group' data-widget='sidebar-search'>
<input class='form-control form-control-sidebar' type='search' placeholder='Search' aria-label='Search'>
<div class='input-group-append'>
<button class='btn btn-sidebar'>
<i class='fas fa-search fa-fw'></i>
</button>
</div>
</div>
</div>

<!-- Sidebar Menu -->
<nav class='mt-2'>
<ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class='nav-item menu-open'>
<a href='dashboard' class='nav-link active'>
<i class='nav-icon fas fa-tachometer-alt'></i>
<p>
Dashboard
</p>
</a>
</li>
";

$role=$_SESSION["role"];
$rolenumber=$_SESSION["rolenumber"];
$result_menutable=$dbh->query("select * from menu where role like '%$role%' and type='' order by itemorder asc");
$row_menutable=$result_menutable->fetchObject();
$count_menutable=$result_menutable->rowCount();

$result_subs=$dbh->query("SELECT * FROM subscriptions where rolenumber='".$_SESSION['rolenumber']."' ORDER BY subscribedon desc LIMIT 1");
$row_subs=$result_subs->fetchObject();
$endDate = $row_subs->expired_date;
$endDateTime = new DateTime($endDate);
$currentDate = new DateTime();
 $remainingDays = $currentDate->diff($endDateTime)->days;
 $row_subs->noofdays;

$expiryDate = new DateTime($endDate); // Set your expiry date
$currentDate = new DateTime();

    if ($count_menutable > 0) {
        do {
            $result_menutablex = $dbh->query("select * from menu where role like '%$role%' and type='$row_menutable->link' order by itemorder asc");
            $row_menutablex = $result_menutablex->fetchObject();
            $count_menutablex = $result_menutablex->rowCount();
              
           //disabble menu items if subscription is expired 
            $disableStyle = ($currentDate>=$expiryDate && $role !='sp') ? "style='pointer-events: none; opacity: 0.5;'" : "";

            if ($count_menutablex > 0) {
                echo "<li class='nav-item has-treeview' $disableStyle>
<a href='#' class='nav-link'><i class='nav-icon fas fa-" . $row_menutable->img . " text-warning'></i>
<p>" . $row_menutable->item . "<i class='right fas fa-angle-left'></i></p></a>
<ul class='nav nav-treeview'>";
                do {
                    echo "<li class='nav-item'>
<a href='" . $row_menutablex->link . "' class='nav-link'><p>
<i class='far fa-circle text-danger'></i>&nbsp" . $row_menutablex->item . "</p></a></li>";
                } while ($row_menutablex = $result_menutablex->fetchObject());
                echo "</ul></li>";
            } else {
                echo "<li class='nav-item has-treeview menu-open'>
<a href='" . $row_menutable->link . "' class='nav-link'>
<i class='nav-icon fas fa-" . $row_menutable->img . " text-warning'></i>
<p>" . $row_menutable->item . "</p></a></li>";
            }
        } while ($row_menutable = $result_menutable->fetchObject());
    }



?>
<div class="card">
<div class="card-body text-center">  
<form method='post'>
<?php 
$result_mode=$dbh->query("select * from scrap where type='theme'");
$count_mode=$result_mode->rowCount();
$row_mode=$result_mode->fetchObject();
if($row_mode->item3==1){
echo "
<span class='header-title' style='color:#ffffff;font-weight:bold;'>No Dark Mode</span><br>
<label class='switch'>
<input type='checkbox' name='theme_mode' onchange='this.form.submit()' value='no-dark'  >
<span style='background-color:red;' class='slider round'></span>
</label>";

}elseif($row_mode->item3==0){
echo "
<span class='header-title' style='color:#000000;font-weight:bold;'>Dark Mode</span><br>
<label class='switch'>
  <input type='checkbox' name='theme_mode' onchange='this.form.submit()' value='dark-mode'  >
  <span style='background-color:green;' class='slider round'></span>  
</label>";
}          
echo "
</form>
</div>
</div>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class='content-wrapper'>
<!-- Content Header (Page header) -->
<div class='content-header'>
<div class='container-fluid'>
<div class='row mb-2'>
<div class='col-sm-6'>
<h1 class='m-0'>Twewole</h1>
</div><!-- /.col -->
<div class='col-sm-6'>
<ol class='breadcrumb float-sm-right'>
<li class='breadcrumb-item'><a href='#'>Home</a></li>
<li class='breadcrumb-item active'>Twewole</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

";

}


function lscripts(){
echo " 

<!-- Main Footer -->
<footer class='main-footer'>
<strong>Copyright &copy;2022 <a href='https://zinitechnology.com'>Zini Technology</a>.</strong>
All rights reserved.
<div class='float-right d-none d-sm-inline-block'>
<b>Twewole Business</b>
</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src='../plugins/jquery/jquery.min.js'></script>
<!-- Bootstrap -->
<script src='../plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
<!-- overlayScrollbars -->
<script src='../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'></script>
<!-- AdminLTE App -->
<script src='../dist/js/adminlte.js'></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src='../plugins/summernote/summernote-bs4.min.js'></script>
<script src='../plugins/jquery-mousewheel/jquery.mousewheel.js'></script>
<script src='../plugins/raphael/raphael.min.js'></script>
<script src='../plugins/jquery-mapael/jquery.mapael.min.js'></script>
<script src='../plugins/jquery-mapael/maps/usa_states.min.js'></script>
<!-- ChartJS -->
<script src='../plugins/chart.js/Chart.min.js'></script>
<!-- Select2 -->
<script src='../plugins/select2/js/select2.full.min.js'></script>
<!-- InputMask -->
<script src='../plugins/moment/moment.min.js'></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src='../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'></script
>
<!-- Bootstrap Switch -->
<script src='../plugins/bootstrap-switch/js/bootstrap-switch.min.js'></script>
<!-- BS-Stepper -->
<script src='../plugins/bs-stepper/js/bs-stepper.min.js'></script>

<script src='../plugins/jquery/jquery.min.js'></script>
<!-- Bootstrap 4 -->
<script src='../plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
<!-- DataTables  & Plugins -->
<script src='../plugins/datatables/jquery.dataTables.min.js'></script>
<script src='../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'></script>
<script src='../plugins/datatables-responsive/js/dataTables.responsive.min.js'></script>
<script src='../plugins/datatables-responsive/js/responsive.bootstrap4.min.js'></script>
<script src='../plugins/datatables-buttons/js/dataTables.buttons.min.js'></script>
<script src='../plugins/datatables-buttons/js/buttons.bootstrap4.min.js'></script>
<script src='../plugins/jszip/jszip.min.js'></script>
<script src='../plugins/pdfmake/pdfmake.min.js'></script>
<script src='../plugins/pdfmake/vfs_fonts.js'></script>
<script src='../plugins/datatables-buttons/js/buttons.html5.min.js'></script>
<script src='../plugins/datatables-buttons/js/buttons.print.min.js'></script>
<script src='../plugins/datatables-buttons/js/buttons.colVis.min.js'></script>

";

}
// populate currency list in select
function popCurrencyLists() {
include('connect.php'); 
$result_scrap=$dbh->query("select * from scrap where type='currency' order by item2 asc");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<select class='form-control' name='default_currency' id='default_currency'>
<option>Select Currency</option>
";
do{
print "<option value=".$row_scrap->item.">".$row_scrap->item2."</option>";  
}while($row_scrap=$result_scrap->fetchObject());
echo "</select>";
}else{echo "<p>There are no currencies, please add some.</p>";}
}
// populate warehouse list in select
function popWarehouseLists() {
include('connect.php'); 
$result_scrap=$dbh->query("select * from scrap where type='warehouse' order by item2 asc");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<select class='form-control' name='ware' id='ware'>
<option>Select Warehouse</option>
";
do{
print "<option value=".$row_scrap->item.">".$row_scrap->item2."</option>";  
}while($row_scrap=$result_scrap->fetchObject());
echo "</select>";
}else{echo "<p>There are no warehouse, please add some.</p>";}
}

if(isset($_POST['deleteAccount'])){
  //delete all details
  $update_users=$dbh->query("DELETE FROM users  WHERE rolenumber='".$_SESSION['rolenumber']."'");
  $update_key=$dbh->query("DELETE FROM keyfields  WHERE rolenumber='".$_SESSION['rolenumber']."'");
  $del_products=$dbh->query("DELETE FROM products  WHERE addedby='".$_SESSION['rolenumber']."'");
  $update_subcription=$dbh->query("DELETE FROM subscriptions  WHERE rolenumber='".$_SESSION['rolenumber']."'");
  $update_tblstate=$dbh->query("DELETE FROM tblstate  WHERE rolenumber='".$_SESSION['rolenumber']."'");

  if($update_key){ 
    // echo "<div class='alert alert-success'>Account Deleted </div>";
    echo "<script>
    window.alert('Account Deleted Successfully');
    setTimeout(function(){window.location.href = 'logout'; }, 0);</script>";
  }else{
    echo "<div class='alert alert-danger'>failed</div>";
  }
}
?>

<script>
function delete_checker(names, act){
var confirmer=confirm(names+" Will  Be "+act+" Click Ok; To Delete ");
if(confirmer==false){return false;} }
</script>