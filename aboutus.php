<!DOCTYPE html>
<html lang="en">
<?php  session_start(); include 'include/header.php'; ?>
<head>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
</head>
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
<?php include 'include/nav2.php'; ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>About Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- STAT SECTION ABOUT --> 
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-lg-6">
            	<div class="about_img scene mb-4 mb-lg-0">
                    <img src="dashboard/pages/uploads/About us.jpg" alt="about_img"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Who We are</h2>
                </div>
                <p>Twewole is a digital financial network that connects Individuals and Small businesses to Loans, Trade credit, Asset leasing, Grants, Valuers, Professional experts, Insurance, Business partners, Money markets and Tools that guide them towards Financial success. </p>
                <p>The network facilitates and coordinates money, credit, and finance Information and Activities and empowers our clients with the knowledge and resources they need to make informed Decisions and take advantage of exciting Opportunities. Through our convenient digital platforms, we foster a culture of Awareness and Confidence, by providing the latest Tips, and Deals on the market.</p>
           <p>Our users can easily download, sign up and set up their accounts. We offer two types of accounts to cater to the varying needs of our users. The Twewole account is perfect for individuals and small businesses seeking to access the opportunities and services available on our platform while the Twewole business account is designed for supervised financial institutions, government entities, funding organizations, other accredited credit providers, professional experts, valuers and auctioneers who wish to upload their products and services to our platforms, as well as take advantage of the available services. Follow our social media platforms for insightful money, credit and finance content to help you Succeed.</p>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT --> 

<!-- START SECTION WHY CHOOSE --> 
<div class="section bg_light_blue2 pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Our Services</h2>
                </div>
                <p class="text-center leads">Our services include</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Enjoying Credit</h5>
                        <p> Access Loans, Trade credit, Asset leasing, and Grants to support your financial needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Ask an Expert</h5>
                        <p>Connect with Professional experts to improve your chances of attracting financing</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Insurance</h5>
                        <p>Connect with insurance companies or brokers to protect your wealth.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Locator</h5>
                        <p>Easily find the closest financier in your area.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Info</h5>
                        <p>Stay up-to-date with money, credit and finance news, and tips through our social media, news aggregator and blog</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Money Markets</h5>
                        <p>Keep track on Stocks, Commodities, Forex and Interest rates as well as Financial Instruments prices.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>5Cs</h5>
                        <p>Upgrade your user experience with Credible Match, Credit Score, Calculator, Calendar, and Cash book features.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Business Partners Centre</h5>
                        <p> Get strategic partnerships.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Notice of Sale</h5>
                        <p>Stay alert and keep track of when your security was advertised to plan your next move</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

<!-- START SECTION TEAM -->
<div class="section pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6">
            	<div class="heading_s1 text-center">
                	
                </div>
                <p class="text-left leads">Our Customer Service team and Digital assistant, "Ask Mperese," are always available to help you navigate our platform</p>
            <a href="" class="btn btn-success">GET STARTED</a>
            </div>
        </div>
     
    </div>
</div>


</div>
<!-- END MAIN CONTENT -->
<?php include 'include/footer.php'; ?>


</body>
</html>