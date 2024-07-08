<!-- START HEADER -->
<?php 
session_start();
if(!isset($_SESSION['username']) ){
  ?>
  <script>
  var allowed=function(){
    // window.location='login';
}
  setTimeout(allowed,1000);
  </script>
  <?php
}
?>
<style>
    .search{
        width:300px;
        border-color: silver;
    }
    .fa, .fab, .fal, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 0;
}

@media only screen and (max-width: 600px) {
.form-inline{display: none !important;
}
.header_wrap{
    margin-bottom: 20px;
}
}
</style>



<!-- <header class="header_wrap fixed-top dd_dark_skin transparent_header"> -->
<header class="header_wrap header_with_topbar" style="height:80px !important; ">

   <div class="top-header fixed-top  main_menu_uppercase" style="background-color:white !important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown me-2">
                     
                            <img src="lg.png" style="width:60px; height:60px;position:relative: top:0px:left:10px;">
                        </div>
                        <ul class="contact_detail text-center text-lg-start">
                            <li><span><a style="font-size:20px;font-weight:500" href="">USER DASHBOARD</a></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <form>
                      <input  type="search"  class=" form-control search"  placeholder="Search here .." name="" >
                   </form> -->
                   <form class="form-inline" method="GET" action="searchResults" >
				<div class="input-group col-md-12">
					<input type="text" class="search" placeholder="Search here..." name="keyword" required="required"/>
					<span class="input-group-btn">
						<button style="border-color:silver; width:50px;height:10px;padding:15px " class="bn btn-primar" name="search"><i class="fa fa-search" style="padding:0px;"></i></button>
					</span>
				</div>
			</form>

                </div>
                <div class="col-md-4">
                <?php 
                if(!isset($_SESSION['username']) && $_SESSION['role'] != "CL" ){ ?>
                
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            
                            <li><a href="my-account"><i class="ti-profile"></i><span>My Account</span></a></li>
                            <li><a href="getstarted"><i class="ti-users"></i><span>Get Account</span></a></li>
                            <li><a href="login"><i class="ti-user"></i><span>Login</span></a></li>
                        </ul>
                    </div>
               
                <?php }else{ ?>
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            <li><a href="index"><span class="link" style="color:blue;"><i class="fa fa-globe"></i>&nbsp;visit site </i></span></a></li>
                            <?php  if($_SESSION['role'] == "CL"){}else{; ?>
                            <li><a href="main/pages/dashboard"><i class="ti-profile"></i><span>Dashboard</span></a></li><?php } ?>
                            <li><a href="#"><i class="ti-users"></i><span><b>Hi,</b> <?php echo $_SESSION['username']; ?></span></a></li>
                            <li><a href="logout"><i class="ti-user"></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
                <?php
                } ?>
                 </div>
            </div>
        </div>
    </div>

</header>
<!-- END HEADER -->