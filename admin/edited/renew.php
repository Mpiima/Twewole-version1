<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
   <title> Twewole - SUBSCRIPTION</title>
</head>
<body class='hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>
<?php 
if(isset($_SESSION['rolenumber'])){
    echo $_SESSION['rolenumber'];
}
?>
</body>
</html>
