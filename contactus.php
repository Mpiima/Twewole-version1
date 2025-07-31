<!DOCTYPE html>
<html lang="en">


<?php  session_start(); include 'include/header.php';
error_reporting(0);
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
<div class="breadcrumb_section bg_gray page-title-mini" style="background-image: url('dashboard/pages/uploads/Contact us 2.jpg'); background-color:#FF01F31A !important; height: 300px !important; background-repeat: no-repeat, repeat; background-size: cover;">
    <div class="container" style="margin-top:30px; background-color: #0000008F;max-width: 60%; padding: 20px;" ><!-- STRART CONTAINER -->
        <div class="row align-items-center">

            <div class="col-md-12" >
                <div class="page-title">
                    <h1 style="padding-top: 10px;padding-bottom: 10px;color: whitesmoke;
                    font-weight: bold; text-align: center;">Contact us </h1>
                </div>
            </div>
          

        </div>
    </div><!-- END CONTAINER-->
</div>

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70">
    <div class="container">
   
        <div class="row">
            <div class="col-xl-4 col-md-6" >
                <div class="contact_wrap contact_style3" style="height:250px;">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>Plot 2340, Bombo Rd., Kawempe Kampala</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" >
                <div class="contact_wrap contact_style3" style="height:250px;">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:info@twewole.com">credit@twewole.com</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3" style="height:250px;">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p>+256-743070700 (Airtel) <br>+256-764045147 (MTN)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Get In touch</h2>
                    <?php 
                    if(isset($_POST['sendmessage'])){
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $number=$_POST['phone'];
                    $sub=$_POST['subject'];
                    $msg=$_POST['message'];
                    $insert_mes=$dbh->query("INSERT INTO mes(fname,email,phone,subjec,messag)values('$name','$email','$number','$sub','$msg')");
                    if($insert_mes){
                        echo '<div class="alert alert-success">Message Sent successfully</div>';
                        ?>
                        <script>
                           
                            window.alert("Message Sent succesfully, we shall give you feedback as soon as possible");
                        </script>
                        <?php 
                    }else{
                        echo '<div class="alert alert-danger"s>Message faileds</div>';
                    }
                }
                    ?>
                </div>
                
                <p class="leads">Feel free to contact us incase of any question or feedback and we shall be available to give you response as soon as possible.</p>
                <div class="field_form">
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Name *" id="first-name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input placeholder="Enter Subject" id="subject" class="form-control" name="subject">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <textarea required placeholder="Message *" id="description" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" 
                               name="sendmessage" value="Submit">Send Message</button>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>     
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31917.83017668671!2d32.5510976!3d0.38387554999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db005db85beeb%3A0x518bbf7afd955a8b!2sKawempe%2C%20Kampala!5e0!3m2!1sen!2sug!4v1693966857764!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <div id="map" class="contact_map2" data-zoom="12" data-latitude="0.368800" data-longitude="32.562721" data-icon="assets/images/marker.png"></div> -->
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

</div>
<!-- END MAIN CONTENT -->


<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
<!-- scripts js --> 
<script src="assets/js/scripts.js"></script>
<?php include 'include/footer.php'; ?>

</body>
</html>