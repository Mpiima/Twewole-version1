<?php session_start(); include 'include/header.php';
if($_SESSION['rolenumber'] == ""){
  //redirect to login 
  ?>
  <script>
          var allowed=function(){window.location='login';}
          setTimeout(allowed,1000);
          </script>
  <?php
}
?>

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
.dashboard_menu .nav-tabs li.nav-item a.active {
    background-color: transparent;
    color: #E0AA3E !important;
}
.search{
  height:34px;
  font-size:13px;
}
.nav-tabs li.nav-item a {
    background-color: transparent;
    border: 0;
    font-weight: 500;
    font-size: 12px !important;
}
.h6, h6 {
    font-size: 0.8rem !important;
}
.btn-group-sm>.btn, .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: .775rem !important;
    border-radius: 0.2rem;
}
  .btn-light{
    background-color: #0000003B !important;
    color:white !important;
  }
  .badge span{
      color:purple !important;
  }
  .social-media-bar{
    display: none !important;
  }
</style>

<body>
<?php 
$result_users=$dbh->query("SELECT * FROM users where rolenumber='".$_SESSION['rolenumber']."'");
$count_users=$result_users->rowCount();
$row_users=$result_users->fetchObject();

?>
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
                      <li class="nav-item" >
                        <a style="background-color:#b02494 !important; color:white !important;" class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fa fa-book"></i>Loans</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#tradecredit" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-handshake"></i>Trade Credit</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#assets" role="tab" aria-controls="orders" aria-selected="false"><i class="fa fa-car"></i>Asset Leasing</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#grants" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-briefcase"></i>Grants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#insurance" role="tab" aria-controls="orders" aria-selected="false"><i class="fa fa-ambulance"></i>Insurance</a>
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
                      <li class="nav-item" style="background-color:#b02494; color:white;">
                        <a style="color:white;" class="nav-link" id="" data-bs-toggle="tab" href="#" role="tab" aria-controls="address" aria-selected="true"><i class="ti-settings"></i>Info</a>
                      </li>
                    

                      <!-- <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Credible Match</a>
                      </li> -->
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Credit  Score</a>
                      </li> -->
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#calendar" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-calendar"></i>Events/Acitivities</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#experts" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-users"></i>Professional Experts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#noticeofsale" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-book"></i>Notice of Sale</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#faq" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-question"></i>FAQ</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#privacy" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Privacy & Cookies</a>
                      </li>
                      <li class="nav-item" style="display:none;">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#preference" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Consent Preferences</a>
                      </li>
                      <li class="nav-item" style="">
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
            <img src="<?php echo $row_users->logo; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $_SESSION['username']; ?></h5>
            <p class="text-muted mb-1">client</p>
            <p class="text-muted mb-4">Kampala Uganda</p>
            <?php 
                         error_reporting(1);
                         if(isset($_POST['updatelogo'])){
                        //get the logo========
                        // $logo=$_POST['logo'];
                        $target_dir = "dashboard/pages/uploads/logos/";
                        $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["logo"]["tmp_name"]);
                        if($check !== false) {
                        "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                        } else {
                        "File is not an image.";
                        $uploadOk = 0;
                        }
                        // Check if file already exists
                        if (file_exists($target_file)) {
                        "Sorry, file already exists.";
                        $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["logo"]["size"] > 500000) {
                        "Sorry, your file is too large.";
                        $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                        "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
                        $update_logo=$dbh->query("UPDATE users set logo='$target_file' WHERE rolenumber='".$_SESSION['rolenumber']."'");
                      //  refresh meta================================================
                      ?>
                      <script>
                      var allowed=function(){window.location='my-account';}
                      setTimeout(allowed,500);
                      </script>
                      <?php 
                      } else {
                        echo "Sorry, there was an error uploading your file.";
                        }
                        }
                      }
                         ?>
                <form  enctype="multipart/form-data" method="POST">
                  <div class="form-group mb-3">
                    <div class="row">
                      <div class="col-lg-12">
                      <input type="file" class="form-control" name="logo" id="logo" placeholder="logo">
                      </div>                        
                    </div>
                  </div>   
                <div class="d-flex justify-content-center mb-2">
                <button style="border:0px;background-color:white;" type="submit" name="updatelogo">
                <i class="fa fa-edit" style="color:blue">Updatepic</i></button>
                <!-- &nbsp;&nbsp;&nbsp; <i class="fa fa-trash" style="color:red">Delete</i> -->
                </div> 
                </form>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0" style="display:non;">
          <div class="card-body p-0">
          <script src="https://cdn.logwork.com/widget/currency_converter.js"></script>
<a href="https://logwork.com/free-currency-converter-calculator" class="currency_convertor" data-currencies="USD,EUR,JPY,GBP,CNY,INR">Currency Convertor</a>
          </div>
        </div>
      </div>
     
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


                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>FAQ</h6>
                              <div class="row">
                               
                             </div>
                          </div>
                          <div class="card-body"  >
                          <div class="tab-pane fade show active" id="loans" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <div class="col-md-12">
            	
      <!--      	<div id="accordion" class="accordion accordion_style1">-->
      <!--              <div class="card">-->
      <!--                  <div class="card-header" id="headingOne">-->
      <!--                      <h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How can i get a Quick loan ?</a> </h6>-->
      <!--                    </div>-->
      <!--                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">-->
      <!--                      <div class="card-body">-->
      <!--                      	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--              </div>-->
      <!--              <div class="card">-->
						<!--<div class="card-header" id="headingTwo">-->
      <!--                  	<h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How do I Benefit as an Expert ?</a> </h6>-->
						<!--</div>-->
						<!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">-->
      <!--                  	<div class="card-body"> -->
      <!--                  		<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>-->
      <!--                  		<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--              </div>-->
      <!--              <div class="card">-->
						<!--<div class="card-header" id="headingThree">-->
      <!--                  	<h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Where are you located ?</a> </h6>-->
						<!--</div>-->
						<!--<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">-->
						<!--	<div class="card-body"> -->
      <!--                      	<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. </p><p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>-->
						<!--		<ul class="list_style_3">-->
      <!--                              <li>The standard chunk of Lorem Ipsum below for those interested</li>-->
      <!--                              <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>-->
      <!--                              <li>Et harum quidem rerum facilis est et expedita distinctio</li>-->
      <!--                              <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>-->
      <!--                              <li>when our power of choice is untrammelled and when nothing prevents</li>-->
      <!--                      	</ul>-->
      <!--                  	</div>-->
      <!--                	</div>-->
      <!--              </div>-->
      <!--              <div class="card">-->
						<!--<div class="card-header" id="headingFour">-->
      <!--                  	<h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What is an insurance ?</a> </h6>-->
      <!--                	</div>-->
      <!--                	<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">-->
						<!--	<div class="card-body"> -->
      <!--                      	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>-->
      <!--                  		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>-->
      <!--                  		<ul class="list_style1">-->
      <!--                              <li>The standard chunk of Lorem Ipsum below for those interested</li>-->
      <!--                              <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugi</li>-->
      <!--                              <li>Et harum quidem rerum facilis est et expedita distinctio</li>-->
      <!--                              <li>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores</li>-->
      <!--                              <li>when our power of choice is untrammelled and when nothing prevents</li>-->
      <!--                      	</ul>-->
      <!--                  	</div>-->
      <!--                	</div>-->
      <!--              </div>-->
      <!--              <div class="card">-->
						<!--<div class="card-header" id="headingFive">-->
      <!--                  	<h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What are the requirements for applying for a grant?</a> </h6>-->
      <!--                	</div>-->
      <!--                	<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">-->
      <!--                  	<div class="card-body"> -->
      <!--                      	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>-->
      <!--                  		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>-->
      <!--                  		<p> Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>-->
      <!--                  	</div>-->
      <!--                	</div>-->
      <!--              </div>-->
      <!--        	</div>-->
              	
              	
              	
              	
              	
              		<div class="row justify-content-center">
			
        	<div class="col-md-12">
            	<div id="accordion" class="accordion accordion_style1">
                
					<?php
			$result_faq=$dbh->query("SELECT * FROM faq");
			$count_faq=$result_faq->rowCount();
			$row_faq=$result_faq->fetchObject();
			if($count_faq>0){
				do{
				?>
                    <div class="card">
						<div class="card-header" id="headingTwo">
                        	<h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseTwo<?php echo $row_faq->auto_id;  ?>" aria-expanded="false" aria-controls="collapseTwo"><?php echo $row_faq->question; ?></a> </h6>
						</div>
						<div id="collapseTwo<?php echo $row_faq->auto_id;  ?>" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                        	<div class="card-body"> 
                        		<p><?php echo $row_faq->answer ?></p>
                            </div>
                        </div>
                    </div>
					<?php }while($row_faq=$result_faq->fetchObject()); } ?>
              	</div>
            </div>

           
        </div>
            </div>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>


                    <div class="tab-pane fade" id="privacy" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              <h6>Privacy & Policies</h6>
                              <div class="row">
                               
                             </div>
                          </div>
                          <div class="card-body"  >
                          <div class="tab-pane fade show active" id="loans" role="tabpanel" aria-labelledby="featured-tab">
                      <div class="row shop_container">
                      <div class="col-md-12">
            	
            	<div id="accordion" class="accordion accordion_style1">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0"> <a class="collapsed" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Privacy Policy</a> </h6>
                          </div>
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="card-body">
                            	<p> 
                              Welcome to TWEWOLE, Our network is designed to connect Individuals and Small businesses to Loans, Trade credit, Asset leasing, and Grants. We also provide access to professional experts, insurance, business partners, money markets and tools that guide them towards financial success. It's important to note that we are not registered as a broker or dealer and do not provide Investment or Insurance advice. We do not provide funding nor make any recommendations or suggestions to a Financier to participate in any transaction or deal. Our platform does not involve the purchase, sale, negotiation, execution, possession, or compensation of securities in any way. Our Focus is solely on helping you connect and coordinate money, credit and finance Information and Activities in a safe and fair manner.
                              </p>
                            </div>
                        </div>
                    </div>
                   
                   
                
              	</div>
            </div>
                      </div>
                      </div>
                          </div>
                      </div>
                    </div>



                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                      <div class="card">
                        <div class="card-header">
                              
                      <div class="row">
                        <div class="col-lg-8">
                        <h6>LOANS CATEGORY</h6>
                        </div>
                       

                    </div>
                       

                          </div>
                          <div class="card-body"  >
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
                             
                              <div class="col-lg-4 box" style="margin-bottom:20px;">
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
                              
                              <div class="row">
                        <div class="col-lg-8">
                        <h6>TRADE CREDIT CATEGORY</h6>
                        </div>
                        <div class="col-lg-4">
                    
                        </div>

                    </div>
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
                              
                        <div class="row">
                        <div class="col-lg-8">
                        <h6><small>ASSETS LEASING CATEGORY</small></h6>
                        </div>
                        <div class="col-lg-4">
                      
                        </div>
                      </div>
                          </div>
                          <div class="card-body"  >
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
                             
                              <div class="row">
                        <div class="col-lg-8">
                        <h6>GRANTS CATEGORY</h6>
                        </div>
                        <div class="col-lg-4">
                    
                        </div>
                          </div></div>
                          <div class="card-body"  >
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
                              
                              <div class="row">
                        <div class="col-lg-8">
                        <h6>INSURANCE CATEGORY</h6>
                        </div>
                        <div class="col-lg-4">
                    
                        </div>
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
                    </div></div>
            

                    <div class="tab-pane fade " id="calendar" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h6>Events/Activities<form style="float:right">
                              </h6> 
                              <div class="row">
                                <div class="col-lg-12">
                            
                              </div>
                             </div>
                            </div>
                            <div class="card-body">
                            
                            <div class="container">

                            <div class="row">
                        <?php
                        //order starting with those that are about to happen and dont show those that ended
                       $dat = date('y-m-d');
                        $result_a=$dbh->query("SELECT * FROM activities where status=1 and scheduledon >= '$dat' order by scheduledon asc");
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
                                  <a href="#" class="btn btn-light btn-sm">
                                  Date: <?php
                                  //  echo $row_a->scheduledon; 
                                   $orgDate = $row_a->scheduledon;   
                                   $date = str_replace('-"', '/', $orgDate);  
                                   $newDate = date("d/m/Y", strtotime($date));  
                                   echo $newDate;  
                                  
                                  ?><br>
                                  Time:  <?php 
                                  // echo $row_a->timeed; 
                                  // $dateTime = DateTime::createFromFormat('H:i', $row_a->timeed);
                                  // echo $time12 = $dateTime->format('h:i A');

                                  $time24 = $row_a->timeed; 

                                  $dateTime = DateTime::createFromFormat('H:i:s', $time24);
                                  $time12 = $dateTime->format('h:i:s A');

                                  echo $time12; // Output: 08:34:00 PM
                                  ?></a>
                                </div>
                                <div class="card-body">
                                <a href="#"><h4 class="card-title"><?php echo $row_a->title; ?></h4></a>
                                  <small class="text-muted cat">
                                    <i class="fa fa-location-arrow text-info"></i> <?php echo $row_a->locations; ?>
                                  </small>
                                  <p class="card-text"><?php echo mb_strimwidth($row_a->details, 0, 100, "...");  ?></p>
                                  <!-- <a href="activity-details?id=<?php echo $row_a->autoid; ?>" class="btn btn-sm btn-info">Read More</a> -->
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
                                <h6>Notice Of Sale</h6>
                            </div>
                            <div class="card-body" >
                          
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
                                <h6>Experts</h6>
                                <div class="row">
                                <div class="col-lg-12">
                             
                              </div>
                             </div>
                            </div>
                            <div class="card-body" >
                            <div class="row">
                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="loan experts final.png" alt="Bologna">
                                <div class="card-img-overlay">
                                  <a  data-bs-toggle="modal" data-bs-target="#loan" class="btn btn-light btn-sm">Loan Experts</a>
                                </div>                                                       
                              </div>
                         
                              </div>

                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="Trade credit experts final.png" alt="Bologna">
                                <div class="card-img-overlay">
                                  <a data-bs-toggle="modal" data-bs-target="#trade"class="btn btn-light btn-sm">Trade Credit Experts</a>
                                </div>                                                         
                              </div>
                              </div>

                              <div class="col-lg-4">
                              <div class="card">
                                <img class="card-img" src="asset leasing experts.final.png" alt="Bologna">
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
                            <img class="card-img" src="Grants experts final.png" alt="Bologna">
                            <div class="card-img-overlay">
                            <a data-bs-toggle="modal" data-bs-target="#grantts" class="btn btn-light btn-sm">Grants Experts</a>
                            </div>                                                         
                            </div>
                            </div>

                            <div class="col-lg-4">
                            <div class="card">
                            <img class="card-img" src="Insurance experts final.png" alt="Bologna">
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
  $result_users=$dbh->query("SELECT * FROM users where role ='BN5' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();

  if($count_users>0){
    do{
      $result_exp1=$dbh->query("select * from expertis where categoryid='loans' and rolenumber='$row_users->rolenumber' ");
      $count_expt1=$result_exp1->rowCount();
      $row_expt1=$result_exp1->fetchObject();
      if($count_expt1>0){
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
    <?php
    }while($row_expt1=$result_exp1->fetchObject());
  }
  }while($row_users=$result_users->fetchObject()); } 
   ?>
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
  $result_users=$dbh->query("SELECT * FROM users where role ='BN5' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();

  if($count_users>0){
    do{
      $result_exp1=$dbh->query("select * from expertis where categoryid='grants' and rolenumber='$row_users->rolenumber' ");
      $count_expt1=$result_exp1->rowCount();
      $row_expt1=$result_exp1->fetchObject();
      if($count_expt1>0){
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
    <?php
    }while($row_expt1=$result_exp1->fetchObject());
  }
  }while($row_users=$result_users->fetchObject()); } 
   ?>
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
  $result_users=$dbh->query("SELECT * FROM users where role ='BN5' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();

  if($count_users>0){
    do{
      $result_exp1=$dbh->query("select * from expertis where categoryid='tradeunit' and rolenumber='$row_users->rolenumber' ");
      $count_expt1=$result_exp1->rowCount();
      $row_expt1=$result_exp1->fetchObject();
      if($count_expt1>0){
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
    <?php
    }while($row_expt1=$result_exp1->fetchObject());
  }
  }while($row_users=$result_users->fetchObject()); } 
   ?>
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
  $result_users=$dbh->query("SELECT * FROM users where role ='BN5' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();

  if($count_users>0){
    do{
      $result_exp1=$dbh->query("select * from expertis where categoryid='lease' and rolenumber='$row_users->rolenumber' ");
      $count_expt1=$result_exp1->rowCount();
      $row_expt1=$result_exp1->fetchObject();
      if($count_expt1>0){
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
    <?php
    }while($row_expt1=$result_exp1->fetchObject());
  }
  }while($row_users=$result_users->fetchObject()); } 
   ?>
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
  $result_users=$dbh->query("SELECT * FROM users where role ='BN5' ");
  $count_users=$result_users->rowCount();
  $row_users=$result_users->fetchObject();

  if($count_users>0){
    do{
      $result_exp1=$dbh->query("select * from expertis where categoryid='insurance' and rolenumber='$row_users->rolenumber' ");
      $count_expt1=$result_exp1->rowCount();
      $row_expt1=$result_exp1->fetchObject();
      if($count_expt1>0){
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
    <?php
    }while($row_expt1=$result_exp1->fetchObject());
  }
  }while($row_users=$result_users->fetchObject()); } 
   ?>
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