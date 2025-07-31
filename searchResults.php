<!DOCTYPE html>
<html lang="en">
<?php  session_start(); include 'include/header.php'; ?>
<?php include 'dashboard/pages/connect.php';
error_reporting(1);
?>
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
<?php include 'include/nav2.php'; ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="margin-top:0px;margin-bottom: 0px; background-image: url('assets/images/cover.png'); max-width: 100%; padding: 30px;padding-top: 100px; height: 100px !important; background-repeat:no-repeat; background-size: cover;" >
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title" > 
                    <h1 style="color: !important;"><?php 
                    $result_c=$dbh->query("SELECT * FROM scrap where autoid='".$_GET['id']."'");
                    $count_c=$result_c->rowCount();
                    $row_c=$result_c->fetchObject();
                    echo $row_c->item; 
                    ?></h1>
                </div>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
               
                    <li class="breadcrumb-item"><a href="#">Search Results</a></li>
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
<div class="main_content mb-10" >

<div class="row shop_container">
<?php
$key = $_GET['keyword'];

$key = $_GET['keyword'];
      $result_c=$dbh->query("SELECT * FROM scrap where item2='loans' AND  item LIKE '%".$key."%'  || item2='grants' AND  item LIKE '%".$key."%' || item2='insurance' AND  item LIKE '%".$key."%' || item2='tradeunit' AND  item LIKE '%".$key."%' || item2='lease' AND  item LIKE '%".$key."%'");
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
       
        <div class="col-lg-3 box mt-5" style="margin-bottom:20px;">
        <div class="card">
          <img class="card-img" src="<?php echo $img; ?>" alt="No image">
          <div class="card-img-overlay">
          <div class="d-flex justify-content-between">
  <div class="badge"><a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'loan'; ?>">
  <span>Apply</span></a></div>
  </div>
            <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'loan'; ?>" class="btn btn-light btn-sm"><?php echo $row_c->item; ?></a>
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