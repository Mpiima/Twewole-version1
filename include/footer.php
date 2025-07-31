<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<?php 
   error_reporting(0);
   if(isset($_POST['subscribe'])){
   $email=$_POST['EMAIL'];
   $result_em =$dbh->query("SELECT * FROM emailsub where email='$email'");
   $count_email=$result_em->rowCount();
   if($count_email>0){
       ?>
<script>
   window.alert("Email Already Exists");
</script>
<?php
   }else{
       $insert_sub=$dbh->query("INSERT INTO emailsub (email)values('$email')");
       if($insert_sub){
       ?>
<script>
   window.alert("Subscribed Successfully");
</script>
<?php
   }else { ?>
<script>
   window.alert("Failed");
</script>
<?php
   }
   }
   
   }
   ?>
<style>
   .bgg {
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   position: relative;
   min-height: 100%;
   background: url(dashboard/pages/uploads/sliders/slider1.jpg) rgba(255, 0, 0, 0);
   background-size: cover;
   background-blend-mode: multiply;
   }

   .social-media-bar {
    position: fixed;
    left: 20px; /* Adjust this value to control the distance from the left edge */
    top: 60%; /* Adjust this value to control the vertical positioning */
    transform: translateY(-50%);
    z-index: 1000; /* Ensure it appears above other content */
}

.social-media-bar ul {
    list-style: none;
    padding: 0;
}

.social-media-bar ul li {
    margin-bottom: 10px;
}

.social-media-bar ul li a {
    display: block;
    text-align: center;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    font-size: 18px;
    transition: all 0.3s ease;
}

/* Facebook */
.social-media-bar ul li:nth-child(1) a {
    background-color: #3b5998;
    color: #fff;
}

/* Twitter */
.social-media-bar ul li:nth-child(2) a {
    background-color: #55acee;
    color: #fff;
}

/* WhatsApp */
.social-media-bar ul li:nth-child(3) a {
    background-color: #25d366;
    color: #fff;
}

/* YouTube */
.social-media-bar ul li:nth-child(4) a {
    background-color: #ff0000; /* YouTube's primary red color */
    color: #fff;
}

/* LinkedIn */
.social-media-bar ul li:nth-child(5) a {
    background-color: #0077b5; /* LinkedIn's primary blue color */
    color: #fff;
}

.social-media-bar ul li a:hover {
    transform: scale(1.1); /* Example hover effect */
}


</style>
<!-- START SOCIAL MEDIA FLOATING BAR -->
<div class="social-media-bar">
    <ul>
        <li><a href="https://www.facebook.com/share/1BReAiyHT3"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://twitter.com/twewoleug"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://wa.me/256726093614"><i class="fab fa-whatsapp"></i></a></li>
        <li><a href="http://www.youtube.com/@twewoleug"><i class="fab fa-youtube"></i></a></li>
        <li><a href="http://www.linkedin.com/company/twewoleug"><i class="fab fa-linkedin-in"></i></a></li>
    </ul>
</div>
<!-- END SOCIAL MEDIA FLOATING BAR -->

<div class="section bg_default small_pt small_pb " style="background-color: #b02494 !important;">
   
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="heading_s1 mb-md-0 heading_light">
               <h3>Subscribe To Our Newsletter</h3>
            </div>
         </div>
         <div class="col-md-6">
            <div class="newsletter_form">
         
             
            <div id="mc_embed_shell">
      
            <div id="mc_embed_shell">
      <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
  <style type="text/css">
        #mc_embed_signup{background:#fff; false;clear:left; font:14px Helvetica,Arial,sans-serif; width: 600px;}
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="https://twewole.us22.list-manage.com/subscribe/post?u=fc886a4404c34b3434c07d218&amp;id=641b5db84a&amp;f_id=00ddd2e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
        <div id="mc_embed_signup_scroll">
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div><div class="mc-field-group input-group"><strong>Please select the account you have. </strong><ul><li><input type="radio" name="group[142]" id="mce-group[142]-142-0" value="1"><label for="mce-group[142]-142-0">Twewole account (Individuals and Small businesses)</label></li><li><input type="radio" name="group[142]" id="mce-group[142]-142-1" value="2"><label for="mce-group[142]-142-1">Twewole business (Financial providers)</label></li></ul></div>
<div hidden=""><input type="hidden" name="tags" value="9696"></div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
        </div><div aria-hidden="true" style="position: absolute; left: -5000px;"><input type="text" name="b_fc886a4404c34b3434c07d218_641b5db84a" tabindex="-1" value=""></div><div class="clear"><input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe"></div>
    </div>
</form>
</div>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
  
               
            </div>
         </div>
      </div>
   </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->
<!-- START FOOTER -->
<footer class="footer_dark">
   <div class="footer_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="widget">
                  <div class="footer_logo">
                     <img src="logo.png" width="50%">
                  </div>
                  <!-- <p>
                     Welcome to <span style="color:purple; font-weight:bold;">TWEWOLE</span>, Our network is designed to connect Individuals and Small businesses  to  Loans, Trade credit, Asset leasing, and Grants. We also  provide access to professional experts, insurance, 
                      business partners, and tools that guide them towards financial success.  </p> -->
               </div>
               <div class="widget">
                  <ul class="social_icons social_white">
                     <li><a href="https://www.facebook.com/share/1BReAiyHT3" target="_blank"><i class="ion-social-facebook"></i></a></li>
                     <li><a href="https://twitter.com/twewoleug" target="_blank"><i class="ion-social-twitter"></i></a></li>
                     <li><a href="https://wa.me/256726093614" target="_blank"> <i class="ion-social-whatsapp-outline"></i></a></li>
                     <li> <a href="https://www.linkedin.com/company/twewoleug" target="_blank"> <i class="ion-social-linkedin-outline"></i></a></li>
                     <li> <a href="https://www.youtube.com/@twewoleug" target="_blank">
                        <i class="ion-social-youtube-outline"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
               <div class="widget">
                  <h6 class="widget_title">Useful Links</h6>
                  <ul class="widget_links">
                     <li><a href="aboutus">About Us</a></li>
                     <li><a href="faq">FAQ</a></li>
                     <li><a href="contactus">Location</a></li>
                     <li><a href="toc">Terms And Conditions</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
               <div class="widget">
                  <h6 class="widget_title">Services</h6>
                  <ul class="widget_links">
                     <li><a href="services?target=loans">Loans</a></li>
                     <li><a href="services?target=tradeunit">Trade Credit</a></li>
                     <li><a href="services?target=lease">Asset Leasing</a></li>
                     <li><a href="services?target=grants">Grants</a></li>
                     <li><a href="services?target=insurance">Insurance</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
               <div class="widget">
                  <h6 class="widget_title">More Links</h6>
                  <ul class="widget_links">
                     <li><a href="contactus">Contact us</a></li>
                     <li><a href="share">Tell A friend</a></li>
                     <li><a href="login">My Account</a></li>
                     <li><a href="contactus">Help</a></li>
                     <li><a href="blog">Blog</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
               <div class="widget">
                  <h6 class="widget_title">Contact Info</h6>
                  <ul class="contact_info contact_info_light">
                     <li>
                        <i class="ti-location-pin"></i>
                        <p> Plot 2340, Bombo Rd., Kawempe Kampala</p>
                     </li>
                     <li>
                        <i class="ti-email"></i>
                        <a href="mailto:info@moneycreditug.com"> credit@twewole.com</a>
                     </li>
                     <li>
                        <i class="ti-mobile"></i>
                        <p><a href="tel:+256743070700"> +256-743070700 (Airtel) +256-764045146 (MTN)</a></p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bottom_footer border-top-tran">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <p class="mb-md-0 text-center text-md-center">© 2024 All Rights Reserved by Supreme Investment Partners
               <hr>
               <span style="font-size:13px;"> Welcome to TWEWOLE, Our network is designed to connect Individuals and Small businesses  to  Loans, Trade credit, Asset leasing, and Grants. We also  provide access to professional experts, insurance,  business partners, money markets and tools that guide them towards financial success. 
               It's important to note that we are not registered as a broker or dealer and do not provide Investment or Insurance advice. We do not provide funding nor make any recommendations or suggestions to a Financier to participate in any transaction or deal. Our platform does not involve the purchase, sale, negotiation, execution, possession, or compensation of securities in any way. Our Focus is solely on helping you connect and coordinate money, credit and finance Information and Activities in a safe and fair manner.  </span>
               </p>
            </div>
            <div class="col-md-6"  style="display:none;">
               <ul class="footer_payment text-center text-lg-end">
                  <li><a href="#"><img src="assets/images/visa.png" alt="visa"></a></li>
                  <li><a href="#"><img src="assets/images/discover.png" alt="discover"></a></li>
                  <li><a href="#"><img src="assets/images/master_card.png" alt="master_card"></a></li>
                  <li><a href="#"><img src="assets/images/paypal.png" alt="paypal"></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- END FOOTER -->
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
<!-- Latest jQuery --> 
<script src="assets/js/jquery-3.6.0.min.js"></script> 
<!-- popper min js -->
<script src="assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="assets/js/scripts.js"></script>
<!-- <script type="text/javascript">
   var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   (function(){
   var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   s1.async=true;
   s1.src='https://embed.tawk.to/63170df637898912e967715b/1gc90t3sg';
   s1.charset='UTF-8';
   s1.setAttribute('crossorigin','*');
   s0.parentNode.insertBefore(s1,s0);
   })();
   </script> -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
   var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   (function(){
   var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   s1.async=true;
   s1.src='https://embed.tawk.to/656f068cff45ca7d4786fe80/1hgsr36d8';
   s1.charset='UTF-8';
   s1.setAttribute('crossorigin','*');
   s0.parentNode.insertBefore(s1,s0);
   })();
</script>
<!--End of Tawk.to Script-->