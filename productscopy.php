<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
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

<!-- START HEADER -->
<?php include 'include/nav2.php'; ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="margin-top:20px;margin-bottom: 30px; background-image: url('assets/images/money.jpg'); max-width: 100%; padding: 30px;padding-top: 100px; height: 200px !important; background-repeat:no-repeat; background-size: cover;" >
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



<?php 
   $result_scrap=$dbh->query("SELECT * FROM scrap where item2 ='inst_cat' order by autodate asc");
    $count_scrap=$result_scrap->rowCount();
    $row_scrap=$result_scrap->fetchObject();
    if($count_scrap > 0){
        do{
?>
<section class="bg-light pt-5 pb-5 shadow-sm">
  <div class="container">
  <div class="row pt-5">
      <div class="col-12">
        <h3 class="text-uppercase border-bottom mb-4"><?php echo $row_scrap->item; ?></h3>
      </div>
    </div>
    <div class="row">
    <?php 
 //fetch from specific cat
    $result_s=$dbh->query("SELECT * FROM scrap where item5 ='".$row_scrap->autoid."'");
    $count_s=$result_s->rowCount();
    $row_s=$result_s->fetchObject();
      if($count_s>0){
        do{
  $result_products=$dbh->query("SELECT * FROM products where institution='".$row_s->autoid."' AND nature ='".$_GET['id']."' order by autodate desc");       
  $count_products=$result_products->rowCount();
  $row_products=$result_products->fetchObject();
  if($count_products>0){
    do{
?>
      <div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card">
          <img src="dashboard/pages/<?php echo $row_products->advert; ?>" class="card-img-top" alt="No Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $row_products->title; ?></h5>
            <p class="card-text mb-4">I<?php echo $row_products->summary; ?>.</p>
            <a href="pdetails?id=<?php echo $row_products->loan_id; ?>" 
            class="btn btn-primary mt-auto align-self-start">Get connected</a>
          </div>
        </div>
      </div>
      <?php 
}while($row_products=$result_products->fetchObject());}
}while($row_s=$result_s->fetchObject());
    }
?>
    </div>
  </div>
</section>




  <!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sale-banner mb-3 mb-md-4">
                    <a class="hover_effect1" href="#">
                        <img src="dashboard/pages/uploads/sliders/1.jpg" alt="shop_banner_img11">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->
  <!-- <div class="col-md-12"><br><br><br></div> -->

  <?php 
}while($row_scrap=$result_scrap->fetchObject());} 
    ?>


</div>
<!-- END MAIN CONTENT -->

<?php include 'include/footer.php'; ?>

</body>
</html>