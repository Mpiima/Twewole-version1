<?php session_start(); include 'include/header.php';  ?>
<!DOCTYPE html>
<html lang="en">
<style>
  .heading{
    font-size:16px;
  }
  .section {
    padding: 20px 0;
    position: relative;
}
@media (min-width: 1200px){
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1920px;
}
}
</style>
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
<?php
 include 'include/nav3.php';
?>  
<!-- END HEADER -->

<!-- START MAIN CONTENT -->
<div class="main_content bg_gray " >
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Loans</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#tradecredit" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Trade Credit</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#assets" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Asset Leasing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#grants" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Grants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#insurance" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Insurance</a>
                      </li>

     <!-- //settings -->
                      <li class="nav-item" style="background-color:black; color:white;">
                        <a style="color:white;" class="nav-link" id="" data-bs-toggle="tab" href="#" role="tab" aria-controls="address" aria-selected="true"><i class="ti-settings"></i>Settings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Autorefresh</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Clear Cache</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Notifications</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Favourites</a>
                      </li>



                     <!-- //settings -->
                      <li class="nav-item" style="background-color:black; color:white;">
                        <a style="color:white;" class="nav-link" id="" data-bs-toggle="tab" href="#" role="tab" aria-controls="address" aria-selected="true"><i class="ti-settings"></i>Info</a>
                      </li>
                    

                      <!-- <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Credible Match</a>
                      </li> -->
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Credit  Score</a>
                      </li> -->
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#calendar" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Events/Acitivities</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#experts" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Professional Experts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#noticeofsale" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Notice of Sale</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#help" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Help</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#privacy" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Privacy & Cookies</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#preference" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Consent Preferences</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#share" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Tell a Friend</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link"  href="contactus" ><i class="ti-location-pin"></i>Contact us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout"><i class="ti-lock"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               Here goes conetenemeee
                            </div>
                        </div>
                  	</div>

                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>LOANS CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:1100px;" >
                          <div class="tab-pane fade show active" id="loans" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <?php
                          $result_c=$dbh->query("SELECT * FROM scrap where item2='loans'");
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
                          } ?>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tradecredit" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>TRADE CREDIT CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:;" >
                          <div class="tab-pane fade show active" id="tradecredit" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <?php
                          $result_c=$dbh->query("SELECT * FROM scrap where item2='tradeunit'");
                          $count_c=$result_c->rowCount();
                          $row_c=$result_c->fetchObject();
                          if($count_c>0){
                          do{
                          ?>
                      <div class="col-md-3">
                      <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'loan'; ?>">
                      <div class="card p-3 mb-2">
                      <div class="d-flex justify-content-between">
                      <div class="badge"><span>Getstated</span></div>
                      </div>
                      <div class="mt-5">
                      <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                      </div>
                      </div></a>
                      </div>
                          <?php }while($row_c=$result_c->fetchObject());
                          } ?>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>
					

                    <div class="tab-pane fade" id="assets" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h3>ASSETS LEASING CATEGORY</h3>
                          </div>
                          <div class="card-body" style="height:;" >
                          <div>
                      <div class="row shop_container">
                      <?php
                          $result_c=$dbh->query("SELECT * FROM scrap where item2='lease'");
                          $count_c=$result_c->rowCount();
                          $row_c=$result_c->fetchObject();
                          if($count_c>0){
                          do{
                          ?>
                      <div class="col-md-3">
                      <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'lease'; ?>">
                      <div class="card p-3 mb-2">
                      <div class="d-flex justify-content-between">
                      <div class="badge"><span>Getstated</span></div>
                      </div>
                      <div class="mt-5">
                      <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                      </div>
                      </div></a>
                      </div>
                          <?php }while($row_c=$result_c->fetchObject());
                          } ?>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>


                    
                    <div class="tab-pane fade" id="grants" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>GRANTS CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:1100px;" >
                          <div>
                      <div class="row shop_container">
                      <?php
                          $result_c=$dbh->query("SELECT * FROM scrap where item2='grants'");
                          $count_c=$result_c->rowCount();
                          $row_c=$result_c->fetchObject();
                          if($count_c>0){
                          do{
                          ?>
                      <div class="col-md-3">
                      <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'grants'; ?>">
                      <div class="card p-3 mb-2">
                      <div class="d-flex justify-content-between">
                      <div class="badge"><span>Getstated</span></div>
                      </div>
                      <div class="mt-5">
                      <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                      </div>
                      </div></a>
                      </div>
                          <?php }while($row_c=$result_c->fetchObject());
                          } ?>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>INSURANCE CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:1100px;" >
                          <div>
                      <div class="row shop_container">
                      <?php
                          $result_c=$dbh->query("SELECT * FROM scrap where item2='insurance'");
                          $count_c=$result_c->rowCount();
                          $row_c=$result_c->fetchObject();
                          if($count_c>0){
                          do{
                          ?>
                      <div class="col-md-3">
                      <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'insurance'; ?>">
                      <div class="card p-3 mb-2">
                      <div class="d-flex justify-content-between">
                      <div class="badge"><span>Getstated</span></div>
                      </div>
                      <div class="mt-5">
                      <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                      </div>
                      </div></a>
                      </div>
                          <?php }while($row_c=$result_c->fetchObject());
                          } ?>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>
            

                    <div class="tab-pane fade " id="calendar" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Events/Activities</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               
                            </div>
                        </div>
                  	</div>

                    <div class="tab-pane fade " id="experts" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Experts</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               
                            </div>
                        </div>
                  	</div>

                    <div class="tab-pane fade " id="noticeofsale" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Notice Of Sale</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               
                            </div>
                        </div>
                  	</div>
                    
                    <div class="tab-pane fade " id="privacy" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Events/Activities</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               
                            </div>
                        </div>
                  	</div>
				</div><div class="tab-pane fade " id="help" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>HELP</h3>
                            </div>
                            <div class="card-body" style="height:1100px;">
                               
                            </div>
                        </div>
                  	</div>

                    <div class="tab-pane fade " id="share" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Tell A friend</h3>
                            </div>
                            <div class="card-body" style="">
                               
                            </div>
                        </div>
                  	</div>
			</div>
		</div>
	</div>
</div>
<!-- END SECTION SHOP -->

<?php include 'include/footer.php'; ?>
</body>
</html>