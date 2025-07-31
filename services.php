<!DOCTYPE html>
<html lang="en">
<?php  session_start(); include 'include/header.php'; ?>
<?php include 'dashboard/pages/connect.php'; ?>
<body>
<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->
<style>
  .btn-light{
    background-color: #0000003B !important;
    color:white !important;
  }
  .badge span{
      color:purple !important;
  }
  </style>

<!-- START HEADER -->
<?php include 'include/nav2.php'; ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="margin-top:0px;margin-bottom: 0px; background-image: url('dashboard/pages/uploads/5.png');  background-repeat:no-repeat; background-size: cover;" >
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title" > 
                <div class="page-title" > 
                <div class="btn btn-light btn-sm">
                    <span style="color:white !important;font-weight:bold" >
                    <?php 
                    $a=$_GET['target'];
                    if($a=="loans"){
                    echo "LOANS"; 
                    }
                    else if($a=="tradeunit"){ echo "TRADE CREDIT"; }
                    else if($a=="insurance"){ echo "INSURANCE"; }
                    else if($a=="grants"){ echo "GRANTS"; }
                    else if($a=="lease"){ echo "ASSET LEASING"; }
                    ?>
                </span></div></div>
                    <!-- <h1 style="color: !important;"></h1> -->
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="display:none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">services</a></li>
                    <li class="breadcrumb-item active"><?php 
                    $result_c=$dbh->query("SELECT * FROM scrap where autoid='".$_GET['id']."'");
                    $count_c=$result_c->rowCount();
                    $row_c=$result_c->fetchObject();
                    echo $row_c->item;
                    
                    ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<div class="row shop_container" style="padding:40px;">
<!-- <?php
$result_c=$dbh->query("SELECT * FROM scrap where item2='".$_GET['target']."'");
$count_c=$result_c->rowCount();
$row_c=$result_c->fetchObject();
if($count_c>0){
do{
?>
<div class="col-md-3">
<a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'loan'; ?>">
<div class="card p-3 mb-2">
<div class="d-flex justify-content-between">
<div class="badge"><span>Apply</span></div>
</div>
<div class="mt-5">
<h4 class="heading"><?php echo $row_c->item; ?> </h4>
</div>
</div></a>
</div>
<?php }while($row_c=$result_c->fetchObject());
} ?> -->

<?php
$result_c=$dbh->query("SELECT * FROM scrap where item2='".$_GET['target']."'");
$count_c=$result_c->rowCount();
$row_c=$result_c->fetchObject();
if($count_c>0){
do{
    if($row_c->item4 == ""){
    $img = "dashboard/pages/uploads/download.png";
    }else{
    $img=$row_c->item4;
    }
?> 
    
    <div class="col-lg-4" style="margin-bottom:20px;">
    <div class="card">
    <img class="card-img" src="<?php echo $img; ?>" alt="No image">
    <div class="card-img-overlay">
    <div class="d-flex justify-content-between">
<div class="badge"><a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo $_GET['target']; ?>">
<span>Apply</span></a></div>
</div>
        <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo $_GET['target']; ?>" class="btn btn-light btn-sm"><?php echo $row_c->item; ?></a>
    </div>                                                         
    </div>
    </div>
<?php }while($row_c=$result_c->fetchObject());
} ?>
</div>

</div>
<!-- END MAIN CONTENT -->

<?php include 'include/footer.php'; ?>

</body>
</html>