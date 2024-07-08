<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

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
<?php include 'include/nav.php'; ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                Job Title  <div class="page-title">
            		<h1><?php 
                    if(isset($_GET['id'])){ 
                        $id=$_GET['id'];
                    $result_jobs=$dbh->query("select * from jobs where autoid='".$id."' ");
                    $count_jobs=$result_jobs->rowCount();
                    $row_jobs=$result_jobs->fetchObject();
                    echo $row_jobs->title;
                        
                    } ?> </h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9">
            	<div class="single_post">
                    <div class="blog_content">
                        <div class="blog_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada malesuada metus ut placerat. Cras a porttitor quam, eget ornare sapien. In sit amet vulputate metus. Nullam eget rutrum nisl. Sed tincidunt lorem sed maximus interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean scelerisque efficitur mauris nec tincidunt. Ut cursus leo mi, eu ultricies magna faucibus id.</p>
                            <blockquote class="blockquote_style3">
                            	<p>Integer is metus site turpis facilisis customers. elementum an mauris in venenatis consectetur east. Praesent condimentum bibendum Morbi sit amet commodo pellentesque at fringilla tincidunt risus.</p>
                            </blockquote>
                           
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id dolor dui, dapibus gravida elit. Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. Morbi rhoncus laoreet tincidunt. Mauris interdum convallis metus. Suspendisse vel lacus est, sit amet tincidunt erat. Etiam purus sem, euismod eu vulputate eget, porta quis sapien. Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.</p>
                            <p>Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. Vestibulum eleifend nisl sed massa sagittis vestibulum. Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. Phasellus tristique cursus erat, a placerat tellus laoreet eget. Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis est rhoncus interdum a vitae velit.</p>
                        	<div class="blog_post_footer">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-8 mb-3 mb-md-0">
                                        <div class="tags">
                                            <a href="#">General</a>
                                            <a href="#">Design</a>
                                            <a href="#">jQuery</a>
                                            <a href="#">Branding</a>
                                            <a href="#">Modern</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="social_icons  text-md-end">
                                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post_navigation bg_gray">
                    <div class="row align-items-center justify-content-between p-4">
                        <div class="col-5">
                            <a href="#">
                                <div class="post_nav post_nav_prev">
                                    <i class="ti-arrow-left"></i>
                                    <span>back</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="#" class="post_nav_home">
                                <i class="ti-layout-grid2"></i>
                            </a>
                        </div>
                        <div class="col-5">
                            <a href="#">
                                <div class="post_nav post_nav_next">
                                    <i class="ti-arrow-right"></i>
                                    <span>Apply</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
				
            </div>
        	<div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
            	<div class="sidebar">
                	<div class="widget">
                        <div class="search_form">
                            <form> 
                                <input required="" class="form-control" placeholder="Search..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                	<div class="widget">
                    	<h5 class="widget_title">Related Jobs</h5>
                        <ul class="widget_recent_post">
                            <li>
                                <div class="post_footer">
                                    <?php 
                                    $result_jobs=$dbh->query("select * from jobs");
                                    $count_jobs=$result_jobs->rowCount();
                                    $row_jobs=$result_jobs->fetchObject();
                                    if($count_jobs>0){
                                        do{

                                echo '<div class="post_content">
                                    <h6><a href="#">'.$row_jobs->title.'</a></h6>                        
                                </div>';
                                        }while($row_jobs=$result_jobs->fetchObject());
                                    }
                                    ?>
                                    

                                    
                                </div>
                            </li>
                         
                    	</ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Other Categories</h5>
                        <ul class="widget_archive">
                        <?php 
                                    $result_cat=$dbh->query("SELECT * FROM cat");
                                    $count_cat=$result_cat->rowCount();
                                    $row_cat=$result_cat->fetchObject();
                                    if($count_cat>0){
                                        do{

        echo '<li><a href="#"><span class="archive_year">'.$row_cat->category.'</span><span class="archive_num">(10)</span></a></li>
                                ';
                                        }while($row_cat=$result_cat->fetchObject());
                                    }
                                    ?>
                        </ul>
                    </div>
                    <div class="widget">
                    	<div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
                	<div class="widget">
                    	<h5 class="widget_title">Also Interested in..</h5>
                        <div class="tags">
                        	<a href="#">News</a>
                            <a href="#">Ask An Expert</a>
                            <a href="#">Loans</a>
                            <a href="#">Grants</a>
                            <a href="#">Leasing</a>
                            <a href="#">Blog</a>
                            <a href="#">Real Estate</a>
                            <a href="#">Advertisement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

</div>
<!-- END MAIN CONTENT -->


<?php include 'include/footer.php'; ?>
</body>
</html>