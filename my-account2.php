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
.zoom {
  /* padding: 50px; */
  /* background-color: green; */
  transition: transform .2s;
  width: 50px;
  height: 50px;
  margin: 0 auto;
}
.zoom:hover {
  -ms-transform: scale(9.5); /* IE 9 */
  -webkit-transform: scale(9.5); /* Safari 3-8 */
  transform: scale(9.5); 
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
                      <!-- <li class="nav-item" style="background-color:black; color:white;">
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
                      </li> -->



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
                        	<!-- <div class="card-header">
                                <h3>Dashboard</h3>
                            </div> -->
                            <div class="card-body" style="height">
                            <section style="background-color: #eee;">
  <div class="container py-1">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Your Welcome !</a></li>
            <li class="breadcrumb-item active" aria-current="page">
        
            </li>
          </ol>
          <script src="https://cdn.logwork.com/widget/text.js"></script>
<a href="https://logwork.com/current-time-in-kampala-uganda" class="clock-widget-text" data-timezone="Africa/Kampala" data-language="en" 
data-textcolor="#ff8800" data-digitscolor="#ff5500">Kampala, Uganda</a>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $_SESSION['username']; ?></h5>
            <p class="text-muted mb-1">client</p>
            <p class="text-muted mb-4">Kampala Uganda</p>
            <div class="d-flex justify-content-center mb-2">
              <i class="fa fa-edit" style="color:blue">Edit</i>
             &nbsp;&nbsp;&nbsp; <i class="fa fa-trash" style="color:red">Delete</i>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0" style="display:non;">
          <div class="card-body p-0">
          <script src="https://cdn.logwork.com/widget/currency_converter.js"></script>
<a href="https://logwork.com/free-currency-converter-calculator" class="currency_convertor" data-currencies="USD,EUR,JPY,GBP,CNY,INR">Currency Convertor</a>
          </div>
        </div>
      </div>
      <?php 
      $result_users=$dbh->query("SELECT * FROM users where rolenumber='".$_SESSION['rolenumber']."'");
      $count_users=$result_users->rowCount();
      $row_users=$result_users->fetchObject();
      
      ?>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo  $row_users ->firstname ." ".  $row_users->lastname; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_users ->email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row_users ->phonenumber; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Not Available</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Not Available</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Messages</span>/Notifications
                </p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Recommended For </span> You
                </p>
                
             
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                            </div>
                        </div>
                  	</div>

                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>LOANS CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:800px;" >
                          <div class="tab-pane fade show active" id="loans" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='loans'");
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
                          </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="tradecredit" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>TRADE CREDIT CATEGORY</h6>
                          </div>
                          <div class="card-body">
                          <div class="tab-pane fade show active" id="tradecredit" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='tradeunit'");
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
                          </div>
                      </div>
                    </div>
					

                    <div class="tab-pane fade" id="assets" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h3>ASSETS LEASING CATEGORY</h3>
                          </div>
                          <div class="card-body" style="height:800px;" >
                          <div>
                      <div class="row shop_container">
                      <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='lease'");
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
                          </div>
                      </div>
                    </div>


                    
                    <div class="tab-pane fade" id="grants" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>GRANTS CATEGORY</h6>
                          </div>
                          <div class="card-body" style="height:800px;" >
                          <div>
                      <div class="row shop_container">
                      <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='grants'");
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
                          </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>INSURANCE CATEGORY</h6>
                          </div>
                          <div class="card-body">
                          <div>
                      <div class="row shop_container">
                      <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='insurance'");
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
                          </div>
                      </div>
                    </div>
            

                    <div class="tab-pane fade " id="calendar" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h6>Events/Activities<form style="float:right">
                               <input type="text" placeholder="Search here...." class="form-control">
                              </form></h6> 
                            </div>
                            <div class="card-body">
                            
                            <div class="container">

                            <div class="row">
                        <?php
                        $result_a=$dbh->query("SELECT * FROM activities where status=1");
                        $count_a=$result_a->rowCount();
                        $row_a=$result_a->fetchObject(); 
                        if($count_a > 0){
                          do{
                            $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_a->companyid'");
                            $row_users=$result_users->fetchObject();
                            if($row_a->flyer == ""){
                              $img = "dashboard/pages/uploads/download.png";
                              }else{
                               $img= "dashboard/pages/$row_a->flyer";
                              }
                        ?>
                              <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                             <div class="card">
                                <img class="card-img" src="<?php echo $img; ?>" alt="No image" width="300px;" style="height:150px;">
                               
                                <div class="card-img-overlay">
                                  <a href="#" class="btn btn-light btn-sm">Date: <?php echo $row_a->scheduledon; ?></a>
                                </div>

                                <div class="card-body">
                                  <h4 class="card-title"><?php echo $row_a->title; ?></h4>
                                  <small class="text-muted cat">
                                    <i class="fa fa-location-arrow text-info"></i> <?php echo $row_a->locations; ?>
                                  </small>
                                  <p class="card-text"><?php echo mb_strimwidth($row_a->details, 0, 100, "...");  ?></p>
                                  <a href="#" class="btn btn-sm btn-info">Read More</a>
                                </div>

                               
                              </div>
                              </div>
                              <?php }while($row_a=$result_a->fetchObject()); } ?>



                              </div>
                              </div> 
                            </div>
                        </div>
                  </div>


                      <div class="tab-pane fade " id="noticeofsale" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Notice Of Sale</h3>
                            </div>
                            <div class="card-body" style="height:800px;">
                            <!-- //search here -->
                            <form>
                              <input type="text" placeholder="Search here .." class="form-control">
                            </form>
                            <table id="example1" class="table table-striped table-bordered dataTable" 
                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                 style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Principal Debtor</th>
                    <th>Newspaper</th>
                    <th>Advertisedon</th>
                    
                    <th>Auctioneer</th>
                    <th>Advert</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $result_n=$dbh->query("SELECT * FROM noticeofsale where status=1");
                  $count_n=$result_n->rowCount();
                  $row_n=$result_n->fetchObject();
                  if($count_n > 0){
                    do{  
                      $result_users=$dbh->query("SELECT * FROM users WHERE rolenumber='$row_n->rolenumber'");
                        $row_users=$result_users->fetchObject();?>
                 <tr>
                  <td><?php echo $row_n->debtor; ?></td>
                  <td><?php echo $row_n->newspaper; ?></td>
                  <td><?php echo $row_n->advertisedon; ?></td>
                  <td><?php echo $row_users->tradename; ?></td>
                  <td style="width:30%"><img  class="zoom" width="30%" src="dashboard/pages/<?php echo $row_n->advert ?>">
                  </td>
                 </tr>
                    <?php }while($row_n=$result_n->fetchObject());
                  }
                
                  ?>
                
              
                  </tbody>
                </table>
                               



                            </div>
                        </div>
                  	</div>
     

                    <div class="tab-pane fade " id="experts" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Experts</h3>
                            </div>
                            <div class="card-body" style="height:800px;">
                            <div class="row">
                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="https://nairametrics.com/wp-content/uploads/2019/06/Loan1.jpg" alt="Bologna">
                                <div class="card-img-overlay">
                                  <a  data-bs-toggle="modal" data-bs-target="#loan" class="btn btn-light btn-sm">Loan Experts</a>
                                </div>                                                       
                              </div>
                         
                              </div>

                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="https://cdn.corporatefinanceinstitute.com/assets/trade-credit.jpeg" alt="Bologna">
                                <div class="card-img-overlay">
                                  <a data-bs-toggle="modal" data-bs-target="#trade"class="btn btn-light btn-sm">Trade Credit Experts</a>
                                </div>                                                         
                              </div>
                              </div>

                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="https://www.bizcover.com.au/bizwitty/wp-content/uploads/2022/04/AdobeStock_259698256-810x574.jpeg" alt="Bologna">
                                <div class="card-img-overlay">
                                  <a data-bs-toggle="modal" data-bs-target="#asset" class="btn btn-light btn-sm">Asset Leasing Experts</a>
                                </div>                                                         
                              </div>
                              </div>
                            </div>

                            <div class="row"><br><br></div>
                            <div class="row">
                            <div class="col-lg-4">
                            <div class="card">
                            <img class="card-img" src="https://images.squarespace-cdn.com/content/v1/62b201e44c6b053d7de1621c/1655859327907-PY0W0YPU4SR9S4TNCEMC/grants.jpg" alt="Bologna">
                            <div class="card-img-overlay">
                            <a data-bs-toggle="modal" data-bs-target="#grantts" class="btn btn-light btn-sm">Grants Experts</a>
                            </div>                                                         
                            </div>
                            </div>

                            <div class="col-lg-4">
                            <div class="card">
                            <img class="card-img" src="https://strategic-insurance.com/wp-content/uploads/2015/03/Fotolia_74551725_XS.jpg" alt="Bologna">
                            <div class="card-img-overlay">
                            <a data-bs-toggle="modal" data-bs-target="#insure" class="btn btn-light btn-sm">Insurances Experts</a>
                            </div>                                                         
                            </div>
                            </div>
                        </div>
                  	</div>
			</div>
		</div>
	</div>
</div>

<!-- loan modal ================================================================================== -->
<div class="modal fade" id="loan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Loan Experts</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
<thead>
    <tr>
        <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th> 
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
  //experts 
  $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  if($count_users>0){
    do{
    ?>
    <tr>
        <td><?php  echo $row_users->tradename; ?></td>
        <td><?php echo $row_users->phonenumber; ?></td>
        <td><?php echo $row_users->email; ?></td>
        <td>
            <?php 
            $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
            $count_expt=$result_exp->rowCount();
            $row_expt=$result_exp->fetchObject();
            if($count_expt>0){
                do{
                  echo "<li>$row_expt->description - <span style='color:orange'>fee : <b>$row_expt->charge</b></span></li>";
                }while($row_expt=$result_exp->fetchObject());
            }

            ?>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
        </td>
    </tr>
    <?php }while($row_users=$result_users->fetchObject()); } ?>
    <?php ?>
</tbody>
<tfoot>
<tr>
   <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<div class="modal-footer" style="display:non;">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary">Understood</button> -->
</div>
</div>
</div>
</div>
</div>        
</div>
</div>
<!-- //end of loan modal --> 

<!-- loan modal ================================================================================== -->
<div class="modal fade" id="grantts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Grants Experts</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
<thead>
    <tr>
        <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th> 
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
  //experts 
  $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  if($count_users>0){
    do{
    ?>
    <tr>
        <td><?php  echo $row_users->tradename; ?></td>
        <td><?php echo $row_users->phonenumber; ?></td>
        <td><?php echo $row_users->email; ?></td>
        <td>
            <?php 
            $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
            $count_expt=$result_exp->rowCount();
            $row_expt=$result_exp->fetchObject();
            if($count_expt>0){
                do{
                  echo "<li>$row_expt->description - <span style='color:orange'>fee : <b>$row_expt->charge</b></span></li>";
                }while($row_expt=$result_exp->fetchObject());
            }

            ?>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
        </td>
    </tr>
    <?php }while($row_users=$result_users->fetchObject()); } ?>
    <?php ?>
</tbody>
<tfoot>
<tr>
   <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<div class="modal-footer" style="display:non;">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary">Understood</button> -->
</div>
</div>
</div>
</div>
</div>        
</div>
</div>
<!-- //end of grants modal --> 
<!-- loan modal ================================================================================== -->
<div class="modal fade" id="trade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Trade Credit Experts</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
<thead>
    <tr>
        <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th> 
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
  //experts 
  $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  if($count_users>0){
    do{
    ?>
    <tr>
        <td><?php  echo $row_users->tradename; ?></td>
        <td><?php echo $row_users->phonenumber; ?></td>
        <td><?php echo $row_users->email; ?></td>
        <td>
            <?php 
            $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
            $count_expt=$result_exp->rowCount();
            $row_expt=$result_exp->fetchObject();
            if($count_expt>0){
                do{
                  echo "<li>$row_expt->description - <span style='color:orange'>fee : <b>$row_expt->charge</b></span></li>";
                }while($row_expt=$result_exp->fetchObject());
            }

            ?>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
        </td>
    </tr>
    <?php }while($row_users=$result_users->fetchObject()); } ?>
    <?php ?>
</tbody>
<tfoot>
<tr>
   <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<div class="modal-footer" style="display:non;">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary">Understood</button> -->
</div>
</div>
</div>
</div>
</div>        
</div>
</div>
<!-- //end of loan modal --> 


<!-- loan modal ================================================================================== -->
<div class="modal fade" id="asset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Asset Leasing Experts</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
<thead>
    <tr>
        <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th> 
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
  //experts 
  $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  if($count_users>0){
    do{
    ?>
    <tr>
        <td><?php  echo $row_users->tradename; ?></td>
        <td><?php echo $row_users->phonenumber; ?></td>
        <td><?php echo $row_users->email; ?></td>
        <td>
            <?php 
            $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
            $count_expt=$result_exp->rowCount();
            $row_expt=$result_exp->fetchObject();
            if($count_expt>0){
                do{
                  echo "<li>$row_expt->description - <span style='color:orange'>fee : <b>$row_expt->charge</b></span></li>";
                }while($row_expt=$result_exp->fetchObject());
            }

            ?>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
        </td>
    </tr>
    <?php }while($row_users=$result_users->fetchObject()); } ?>
    <?php ?>
</tbody>
<tfoot>
<tr>
   <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<div class="modal-footer" style="display:non;">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary">Understood</button> -->
</div>
</div>
</div>
</div>
</div>        
</div>
</div>
<!-- //end of loan modal --> 

<!-- Insurance modal ================================================================================== -->
<div class="modal fade" id="insure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Insurance Experts</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
<thead>
    <tr>
        <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th> 
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
  //experts 
  $result_users=$dbh->query("SELECT * FROM users where role ='BN2' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();
  if($count_users>0){
    do{
    ?>
    <tr>
        <td><?php  echo $row_users->tradename; ?></td>
        <td><?php echo $row_users->phonenumber; ?></td>
        <td><?php echo $row_users->email; ?></td>
        <td>
            <?php 
            $result_exp=$dbh->query("select * from expertis where rolenumber='$row_users->rolenumber'");
            $count_expt=$result_exp->rowCount();
            $row_expt=$result_exp->fetchObject();
            if($count_expt>0){
                do{
                  echo "<li>$row_expt->description - <span style='color:orange'>fee : <b>$row_expt->charge</b></span></li>";
                }while($row_expt=$result_exp->fetchObject());
            }

            ?>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-warning" href="">Contact</a>
        </td>
    </tr>
    <?php }while($row_users=$result_users->fetchObject()); } ?>
    <?php ?>
</tbody>
<tfoot>
<tr>
   <th>Trade Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Expertis</th>
        <th></th>
    </tr>
</tfoot>
</table>
</div>
<div class="modal-footer" style="display:non;">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
<!-- <button type="button" class="btn btn-primary">Understood</button> -->
</div>
</div>
</div>
</div>
</div>        
</div>
</div>
<!-- //end of loan modal --> 










<script>
  $(document).ready(function() {
    $('#example').dataTable();
} );
</script>

<?php include 'include/footer.php'; ?>
</body>
</html>