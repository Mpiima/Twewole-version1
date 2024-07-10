<!DOCTYPE html>
<html lang="en">
<?php  session_start(); include 'include/header.php'; ?>
<?php include 'main/pages/connect.php'; ?>
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
<style>
  .btn-light{
    background-color: #0000003B !important;
  }
  </style>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="margin-top:0px;margin-bottom: 0px; background-image: url('main/pages/uploads/5.png');  background-repeat:no-repeat; background-size: cover;" >
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title" > 
                <div class="btn btn-light btn-sm">
                    <span style="color:white !important;font-weight:bold" ><?php 
                    $result_c=$dbh->query("SELECT * FROM scrap where autoid='".$_GET['id']."'");
                    $count_c=$result_c->rowCount();
                    $row_c=$result_c->fetchObject();
                    echo $row_c->item; 
                    ?></span></div>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="display:none">
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

//select from accounttype
$result_account=$dbh->query("SELECT * FROM account_type where autoid != 5 AND autoid !=6");
$count_account=$result_account->rowCount();
$row_account=$result_account->fetchObject();
if($count_account>0){
  do{
//  echo "<li>$row_account->accountname</li>";
 ?>
 <section class="bg-light pt-5 pb-5 shadow-sm">
  <div class="container">
  <div class="row pt-5">
      <div class="col-12">
        <h3 class="text-uppercase border-bottom mb-4"><?php echo $row_account->accountname; ?></h3>
      </div>
    </div>
    <div class="row">
 <?php
 $result_users=$dbh->query("SELECT * FROM users where accounttype='$row_account->autoid' ");
 $count_users=$result_users->rowCount();
 $row_users=$result_users->fetchObject();
 if( $count_users>0){
  do{
// echo "<span>$row_users->rolenumber<span>".",";
//products
$result_products=$dbh->query("SELECT * FROM products where addedby='".$row_users->rolenumber."' AND nature ='".$_GET['id']."' order by autodate desc");       
$count_products=$result_products->rowCount();
$row_products=$result_products->fetchObject();
if($count_products>0){
  do{ 
      ?>
<div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card">
          <img src="main/pages/<?php echo $row_products->advert; ?>" class="card-img-top" alt="No Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $row_products->title; ?></h5>
            <p class="card-text mb-4"><?php echo $row_products->summary; ?>.</p>
            <?php if(isset($_SESSION['rolenumber'])){ ?>
            <a href="pdetails?id=<?php echo $row_products->loan_id; ?>" 
            class="btn btn-primary mt-auto align-self-start">Get connected</a>
            <?php }else{?>
              <a href="login" 
            class="btn btn-primary mt-auto align-self-start">Get connected</a>
              <?php } ?>
          </div>
        </div>
      </div>
 <?php  
  }while($row_products=$result_products->fetchObject());
}
  }while($row_users=$result_users->fetchObject());
 }
?>

</div>
  </div>
</section>
  <!-- START SECTION BANNER --> 
<div class="section pb_20 smll_apt">
    <div class="containser">
        <div class="row">
            <div class="col-1s2">
                <div class="sale-banner mb-3 mb-md-4">
                    <a class="hover_effect1" href="#">
                        <img src="<?php echo $row_account->banner; ?>" alt="shop_banner_img11">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php }while($row_account=$result_account->fetchObject());
} ?>

</div>
<!-- END MAIN CONTENT -->

<?php include 'include/footer.php'; ?>

</body>
</html>