<!DOCTYPE html>
<html lang="en">
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/fc886a4404c34b3434c07d218/d80a833a4ec9797ffa75199a8.js");</script>
<?php session_start(); include 'include/header.php'; ?>
<style>
    .text-success{
        font-size:20px;
    }
    .bg_strip::before {
    content: '';
    position: absolute;
    z-index: -1;
    right: 100%;
    top: 0;
    display: block;
    width: 0;
    height: 0px;
    border: 20px solid #E0AA3E;
    border-bottom-color: #E0AA3E;
    border-left-color: transparent;
}
.bg_strip::after {
    content: '';
    position: absolute;
    z-index: -1;
    left: 100%;
    top: 0;
    display: block;
    width: 0;
    height: 0px;
    border: 20px solid #E0AA3E;
    border-bottom-color: #E0AA3E;
    border-right-color: transparent;
}
.btn-white {
    background-color:  #E0AA3E;
    border: 1px solid  #E0AA3E;
    color: #292b2c !important;
    position: relative;
    overflow: hidden;
    z-index: 1;
}
.carousel-control-next:hover, .carousel-control-prev:hover, .light_arrow .carousel-control-next:hover, .light_arrow .carousel-control-prev:hover {
    background-color: #E0AA3E;
    color: #fff;
}

  .btn-light{
    background-color: #0000003B !important;
    color:white !important;
  }
  .badge{
      color:;
  }

  
  .social-media-section {
    background-color: #E0AA3E;
    border-radius: 15px;
    padding-top: 50px;
    padding-bottom: 50px;
}

.social-media-section h4 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #a4496f;
}

.social-media-section p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #ffffff;
}

.social-link {
    display: block;
    text-align: center;
    color: #fff;
    border-radius: 8px;
    padding: 15px;
    transition: background-color 0.3s ease;
}

.social-link i {
    font-size: 24px;
    margin-bottom: 10px;
}

.social-link span {
    display: block;
    font-size: 14px;
    font-weight: bold;
}

.social-link:hover {
    text-decoration: none;
    background-color: rgba(255, 255, 255, 0.1);
}


</style>

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
<?php include 'include/nav.php'; ?>
<!-- END HEADER -->





<!-- <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s3 text-center">
                                    <h4>Subscribe and Get Latest !</h4>
                                </div>
                                
                            </div>
                            <div id="mc_embed_shell" >
   <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
   <style type="text/css">
      #mc_embed_signup{background:re; false;clear:left; font:14px Helvetica,Arial,sans-serif; width:430px!important;}
     
   </style>
   <div id="mc_embed_signup">
      <form  action="https://twewole.us22.list-manage.com/subscribe/post?u=fc886a4404c34b3434c07d218&amp;id=641b5db84a&amp;f_id=00ddd2e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
         <div id="mc_embed_signup_scroll" >
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div>
            <div class="mc-field-group input-group">
               <strong>Twewole Accounts </strong>
               <ul>
                  <li><input type="radio" name="group[142]" id="mce-group[142]-142-0" value="1"><label for="mce-group[142]-142-0">Twewole account (For Individuals and Small businesses)</label></li>
                  <li><input type="radio" name="group[142]" id="mce-group[142]-142-1" value="2"><label for="mce-group[142]-142-1">Twewole business (For Financial products and service providers)</label></li>
               </ul>
               <span id="mce-group[142]-HELPERTEXT" class="helper_text"> Please confirm your account </span>
            </div>
            <div hidden=""><input type="hidden" name="tags" value="9696"></div>
            <div id="mce-responses" class="clear">
               <div class="response" id="mce-error-response" style="display: none;"></div>
               <div class="response" id="mce-success-response" style="display: none;"></div>
            </div>
            <div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_fc886a4404c34b3434c07d218_641b5db84a" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe"></div>
         </div>
      </form>
   </div>
   <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
</div>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div> -->



<!-- START SECTION BANNER -->
<div class="banner_section full_screen staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow carousel_style2" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg overlay_bg_50" data-img-src="dashboard/pages/uploads/sliders/slider1.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10">
                                <div class="banner_content text_white text-center">
                                    <h5 class="mb-3 bg_strip staggered-animation text-uppercase  "  data-animation="fadeInDown" data-animation-delay="0.2s">Welcome to Twewole</h5>
                                    <h2 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Searching for Credit is no longer a hustle;  </h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">Save Time, Money & Guessing as we bring all the credit opportunities available.</p>
                                    <a class="btn btn-white staggered-animation" href="login" data-animation="fadeInUp" data-animation-delay="0.9s">Get Credit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_50" data-img-src="dashboard/pages/uploads/sliders/slider2.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10">
                                <div class="banner_content text_white text-center">
                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="fadeInDown" data-animation-delay="0.2s">We support Your Financial goals!</h5>
                                    <h2 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Trust Us Today!</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.9s">Are you an Individual or a Small business? Twewole  is your Link to Financing.
Get connected to Loans, Trade credit, Asset leasing, and Grants to support your financial needs.</p>
                                    <a class="btn btn-white staggered-animation" href="login" data-animation="fadeInUp" data-animation-delay="0.4s">Get Connected</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg overlay_bg_60" data-img-src="dashboard/pages/uploads/sliders/baq.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10 mt-5">
                                <div class="banner_content text_white text-center">
                                    <!-- <h5 class="mb-3 staggered-animation font-weight-light" data-animation="fadeInDown" data-animation-delay="0.2s">Get A salary Loan</h5> -->
                                    <h2 class="staggered-animation" data-animation="fadeInDown" data-animation-delay="0.3s">Here To Serve</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">Get access to Professional experts, Insurance, Business partners and Tools that guide you towards financial success.</p>
                                    <a class="btn btn-white staggered-animation" href="login" data-animation="fadeInUp" data-animation-delay="0.4s">Get Connected</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->


<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- <div class="section pt-0 small_pb">
    <div class="container">
        <div class="row">
            <div class="col-12" >
                <div class="cat_overlap radius_all_5" style="background-color:#E0AA3E !important;">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="text-center text-md-start">
                                <h4 style="color:#a4496f !important;"><marquee
  direction="right"
  width="250"
  behavior="alternat">Social Media</marquee></h4>
                                <p class="mb-2" style="color:white;"> Follow us for insightful money, credit and finance content to help you succeed. Let’s take on this challenge together! </p>
                                <a href="contactus" class="btn btn-line-fill btn-sm" style="color:white !important;">Try Us </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="cat_slider mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "4"}}'>
                                <div class="item" >
                                    <div class="categories_box" style="background-color:red !important; ">
                                        <a href="https://www.facebook.com/share/1BReAiyHT3" style="color: #3b5998;">
                                            <i class="fab fa-facebook-f fa-2x"></i>
                                            <span>Facebook</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="categories_box">
                                        <a href="https://twitter.com/twewoleug" style="color: #55acee;" >
                                            <i class="fab fa-twitter fa-2x"></i>
                                            <span>Twitter</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="categories_box">
                                        <a href="https://wa.me/256726093614" style="color: #25d366;">
                                            <i class="fab fa-whatsapp fa-2x"></i>
                                            <span>Whatsapp</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                   <div class="categories_box">
                                       <a href="http://www.youtube.com/@twewoleug">
                                           <i class="fab fa-youtube fa-2x"></i>
                                           <span>Youtube</span>
                                       </a>
                                   </div>
                                </div>

                                <div class="item">
                                    <div class="categories_box">
                                        <a href="www.linkedin.com/company/twewoleug" style="color:  #0082ca;">
                                            <i class="fab fa-linkedin-in fa-2x"></i>
                                            <span>Linkedin</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- START SECTION SINGLE BANNER --> 
<div class="section bg_light_blue2 pb-0 pt-md-0" style="display:noe;">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-start">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">Who We Are</span>
                        <h2>A Digital financial network</h2>
                    </div>
                    <p class="mb-4">Twewole is a digital financial network that connects Individuals and Small businesses to Loans, Trade credit, Asset leasing, Grants, Valuers, Professional experts, Insurance, 
                        Business partners, Money markets and Tools that guide them towards Financial success.</p>
                    <a href="aboutus" class="btn btn-lg btn-primary animated_btn">Find Out More</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="dashboard/pages/uploads/sliders/slider1.jpg" alt="tranding_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER --> 



<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h3><small>OUR SERVICES</small></h3>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                       
                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#loans" role="tab" aria-controls="featured" aria-selected="false">Loans</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#tradecredit" role="tab" aria-controls="featured" aria-selected="false">Trade Credit</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-bs-toggle="tab" href="#leasing" role="tab" aria-controls="special" aria-selected="false">Operating Lease</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-bs-toggle="tab" href="#financial-lease" role="tab" aria-controls="special" aria-selected="false">Financing Lease</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#grants" role="tab" aria-controls="featured" aria-selected="false">Grants</a></li>
                             <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#insurance" role="tab" aria-controls="featured" aria-selected="false">Insurance</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                	                   
                    <div class="tab-pane fade show active" id="loans" role="tabpanel" aria-labelledby="featured-tab">
                    <div class="row shop_container">
                    <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='loans'");
                            $count_c=$result_c->rowCount();
                            $row_c=$result_c->fetchObject();
                            if($count_c>0){
                            do{
                               if($row_c->item4 == ""){
                               $img = "dashboard/pages/uploads/pd.png";
                               }else{
                                $img=$row_c->item4;
                               }
                            ?> 
                             
                              <div class="col-lg-3" style="margin-bottom:20px;">
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
                    <div class="tab-pane fade" id="leasing" role="tabpanel" aria-labelledby="special-tab">
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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
                        <!-- <div class="col-md-3">
                        <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'lease'; ?>">
                        <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                        <div class="badge"> <span>Apply</span> </div>
                        </div>
                        <div class="mt-5">
                        <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                        </div>
                        </div></a>
                        </div> -->
                            <?php }while($row_c=$result_c->fetchObject());
                            } ?>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="financial-lease" role="tabpanel" aria-labelledby="special-tab">
                    <div class="row shop_container">
                    <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='financial-lease'");
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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


                    <div class="tab-pane fade" id="grants" role="tabpanel" aria-labelledby="special-tab">
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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


                    <div class="tab-pane fade" id="tradecredit" role="tabpanel" aria-labelledby="special-tab">
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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

                    <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="special-tab">
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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
                        <!-- <div class="col-md-3">
                        <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'insurance'; ?>">

                        <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                        <div class="badge"> <span>Apply</span> </div>
                        </div>
                        <div class="mt-5">
                        <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                        </div>
                        </div></a>
                        </div> -->
                            <?php }while($row_c=$result_c->fetchObject());
                            } ?>
                        </div>
                    </div>


                    
                    <div class="tab-pane fade" id="investment" role="tabpanel" aria-labelledby="special-tab">
                    <div class="row shop_container">
                    <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='investment'");
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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
                        <!-- <div class="col-md-3">
                        <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'investment'; ?>">
                        <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                        <div class="badge"> <span>Apply</span> </div>
                        </div>
                        <div class="mt-5">
                        <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                        </div>
                        </div></a>
                        </div> -->
                            <?php }while($row_c=$result_c->fetchObject());
                            } ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="realestate" role="tabpanel" aria-labelledby="special-tab">
                    <div class="row shop_container">
                    <?php
                            $result_c=$dbh->query("SELECT * FROM scrap where item2='realestate'");
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
                             <div class="col-lg-3" style="margin-bottom:20px;">
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
                        <!-- <div class="col-md-3">
                        <a href="products?id=<?php echo $row_c->autoid; ?>&target=<?php echo 'realestate'; ?>">
                        <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                        <div class="badge"> <span>Apply</span> </div>
                        </div>
                        <div class="mt-5">
                        <h4 class="heading"><?php echo $row_c->item; ?> </h4>
                        </div>
                        </div></a>
                        </div> -->
                            <?php }while($row_c=$result_c->fetchObject());
                            } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER --> 
<div class="section background_bg" data-img-src="tryus.jpg">
	<div class="container">
    	<div class="row">
            <div class="col-lg-7 col-md-8 col-sm-9">
            	<div class="furniture_banner">
                    <h3 class="single_bn_title">Showcase Your Product/Services with</h3>
                    <h4 class="single_bn_title1 text_default">A TRIAL ACCOUNT !</h4>
                    <div class="countdown_time countdown_style3 mb-4" data-time="2024/12/12 12:30:15"></div>
                    <a href="/getstarted" class="btn btn-lg btn-primary animated_btn">Get Started</a>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- START SECTION BANNER -->
<div class="section pb_0">
	<div class="container">
        <h3><center><small>HOW IT WORKS<hr style="color:whitesomke"></small></center></h3>
    	<div class="row">
          <div class="col-lg-4">
          <div class="container text-center">
        <img src="dashboard/pages/uploads/How it works icons-get account.jpg" 
            class="img-flui circle" alt="GFG" style="border-radius:50%; width:160px;height:160px;">
            <h5 class="text-success"><small>Get a Twewole Account for Free</small>
        </h5>
    </div>
          </div>
          <div class="col-lg-4">
          <div class="container text-center">
        <img src="dashboard/pages/uploads/How it works icons-engage with financiers.jpg" 
            class="img-flui circle" alt="GFG" style="border-radius:50%; width:160px;height:160px;">
            <h5 class="text-success"> <small>Login and Engage with Financiers</small>
        </h5>
        <a href="/getstarted" class="btn btn-white staggered-animation"><b>GET STARTED NOW</b></a>
    </div>
          </div>
          <div class="col-lg-4">
          <div class="container text-center">
        <img src="dashboard/pages/uploads/How it works icons-seal deal .jpg" 
            class="img-flui circle" alt="GFG" style="border-radius:50%; width:160px;height:160px;">
        
            <h5 class="text-success"><small>Seal Deal & Get Financing</small>
        </h5>
    </div>
    
          </div>

           
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->





<!-- START SECTION SINGLE BANNER --> 
       <?php 
        $result_advert=$dbh->query("select * from adverts where position='bottom' and status=1 order by autoid desc Limit 1");
        $count_advert=$result_advert->rowCount();
        $row_advert=$result_advert->fetchObject();
        if($count_advert>0){
       ?>
<div class="section bg_light_blue2 pb-0 pt-md-0">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-start">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading"><?php echo $row_advert->subheading; ?></span>
                        <h2><?php echo $row_advert->heading; ?> </h2>
                    </div>
                    <h5 class="mb-4"><?php echo $row_advert->description; ?></h5>
                    <a href="<?php echo $row_advert->link; ?>" class="btn btn-fill-out rounded-0">Get Started</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="assets//images/tranding_img.png" alt="tranding_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- START SOCIAL MEDIA FLOATING BAR -->
<div class="social-media-bar">
    <ul>
        <li><a href="https://www.facebook.com/share/1BReAiyHT3"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://twitter.com/twewoleug"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://wa.me/256726093614"><i class="fab fa-whatsapp"></i></a></li>
        <li><a href="http://www.youtube.com/@twewoleug"><i class="fab fa-youtube"></i></a></li>
        <li><a href="www.linkedin.com/company/twewoleug"><i class="fab fa-linkedin-in"></i></a></li>
    </ul>
</div>
<!-- END SOCIAL MEDIA FLOATING BAR -->

<!-- START CALL TO ACTION -->

<!-- <div class="section  pt-4 pb-4" style="background-color:#b02494; display:none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="card border-0 rounded-0 text-center p-4 shadow-lg">
                    <h3 class="text-black mb-3">Get Your Twewole Account Today!</h3>
                    <p class="text-black mb-4">Join now to explore opportunities and display your services with Twewole .</p>
                    <a href="login" class="btn btn-lg btn-primary animated_btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div> -->



<!-- START SECTION TESTIMONIAL -->
<div class="section bg_redon" >
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h3> <small>WHAT PEOPLE SAY !</small></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
            	<div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                	
                <?php
                $result_test=$dbh->query("select * from testmonials ORDER BY autoid desc");
                $count_test=$result_test->rowCount();
                $row_test=$result_test->fetchObject();
                if($count_test>0){
                    do{
                ?>
                <div class="testimonial_box">
                    	<div class="testimonial_desc">
                            <p><?php echo $row_test->testmonial; ?></p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="dashboard/pages/<?php echo $row_test->pic; ?>" alt="user_img1" />
                            </div>
                            <div class="author_name">
                                <h6><?php echo $row_test->fullnames; ?></h6>
                                <span><?php echo $row_test->title; ?></span>
                            </div>
                        </div>
                    </div>
                    
                
               <?php 
                    }while($row_test=$result_test->fetchObject()); } ?>
</div></div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->




<!-- START SECTION SHOP INFO -->
<div class="section pb_70" style="background-image:('')">
    	<div class="container">
            <div class="row g-0">
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style3">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Competent, Hardworking & Reliable.</h5>
                            <p> We are committed to addressing Client issues and being transparent with our intentions. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style3">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Trustworthy, Positive & Honest</h5>
                            <p>We focus on delivering high-quality products and services, which help build trust with our clients. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style3">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>Always available to work on you </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->


<!-- START SECTION CLIENT LOGO -->
<div class="section small_pt">
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
            	<div class="heading_tab_header">
                    <div class="heading_s2">
                        <h3><small>FINANCIERS</small></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                	
                <?php 
                $result_scrap=$dbh->query("SELECT * FROM users WHERE role !='sp' AND role!='CL'");
                $count_scrap=$result_scrap->rowCount();
                $row_scrap=$result_scrap->fetchObject();
                if($count_scrap>0){
                    do{
                ?>
                <div class="item">
                    	<div class="cl_logo">
                        	<img src="<?php echo $row_scrap->logo; ?>" alt="cl_logo"/>
                        </div>
                    </div>
                

                <?php }while($row_scrap=$result_scrap->fetchObject()); }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->
<?php include 'include/footer.php'; ?>

</body>
</html>