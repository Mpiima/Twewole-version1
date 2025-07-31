<?php
session_start();
error_reporting(E_ALL);
include('dashboard/pages/connect.php'); ?>
<header class="header_wrap fixed-to dd_dark_skin transparent_header">
    <!-- header_wrap fixed-top dd_dark_skin transparent_header -->
	<div class="top-header light_skin main_menu_uppercase">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown me-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="assets/images/eng.png" data-title="English">English</option>
                            </select>
                        </div>
                        <!-- <div class="me-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div> -->
                        <ul class="contact_detail text-center text-lg-start">
                            <li><i class="ti-mobile"></i><span><a href="tel:+256743070700">+256-743070700 (Airtel) +256-764045147 (MTN)</a></span></li>
                        </ul>
                    </div>
                </div>
                <?php 
                if(!isset($_SESSION['username']) && $_SESSION['role'] != "CL" ){ ?>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            <!-- <li><a href="my-account"><i class="ti-profile"></i><span>My Account</span></a></li> -->
                            <li><a href="getstarted "><i class="ti-users"></i><span>Get Account</span></a></li>
                            <li><a href="login "><i class="ti-user"></i><span>Login</span></a></li>
                        </ul>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                        <?php  if($_SESSION['role'] == "BN1" || $_SESSION['role'] == "BN2" || $_SESSION['role'] == "BN3" || $_SESSION['role'] == "BN4" || $_SESSION['role'] == "BN5" || $_SESSION['role'] == "BN6") {  
                               echo '<li><a href="dashboard/pages/dashboard"><i class="ti-home"></i><span>Dashboard</span></a></li>';
                              } else{ ?>
                            <li><a href="my-account "><i class="ti-home"></i><span>Dashboard</span></a></li>
                               <?php } ?>
                            <li><a href="#"><i class="ti-profile"></i><span><b>Hi,</b> <?php echo $_SESSION['username']; ?></span></a></li>
                            <li><a href="logout "><i class="fa fa-power-off"></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div></div>
                <?php
                } ?>
            </div>
        </div>
    </div>
    <div class="bottom_header light_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="index " style="width:35%;">
                    <img class="logo_light" style="width:35%" src="dashboard/pages/logo.png" alt="Twewole Ltd" />
                    <img class="logo_dark" style="width:35%" src="dashboard/pages/logo.png" alt="Twewole Ltd" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li>
                            <a  class="nav-link active" href="index ">Home</a>   
                        </li>
                        <li class="dropdown">
                        
                                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Loans</a>
                             <div class="dropdown-menu">
                                <?php
                                $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='loans' ORDER BY autoid asc");
                                $count_scrap=$result_scrap->rowCount();
                                $row_scrap=$result_scrap->fetchObject();
                                if($count_scrap>0){
                                do{
                                ?>
                              <ul>
                                <li><a class="dropdown-item menu-link"
                                 href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'loan'; ?>"><?php echo $row_scrap->item; ?></a></li>
                                <?php }while($row_scrap=$result_scrap->fetchObject());
                                               
                                } ?>
                            </ul>
                                </div>
                           
                        </li>

                         <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">TRADE CREDIT</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            <!-- <li class="dropdown-header"></li> -->
                                            <?php
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 10");
                                            $count_scrap=$result_scrap->rowCount();
                                            $row_scrap=$result_scrap->fetchObject();
                                            if($count_scrap>0){
                                            do{
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item"
                                             href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'tradeunit'; ?>"><?php echo $row_scrap->item; ?></a></li>

                                            <?php }while($row_scrap=$result_scrap->fetchObject());
                                                           
                                            } ?>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <!-- <li class="dropdown-header">Leasing</li> -->
                                            <?php
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 10 offset 10");
                                            $count_scrap=$result_scrap->rowCount();
                                            $row_scrap=$result_scrap->fetchObject();
                                            if($count_scrap>0){
                                            do{
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item"
                                             href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'tradeunit'; ?>"><?php echo $row_scrap->item; ?></a></li>

                                            <?php }while($row_scrap=$result_scrap->fetchObject());
                                                           
                                            } ?>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <!-- <li class="dropdown-header">Grants</li> -->
                                            <?php
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 10 offset 20");
                                            $count_scrap=$result_scrap->rowCount();
                                            $row_scrap=$result_scrap->fetchObject();
                                            if($count_scrap>0){
                                            do{
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item"
                                             href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'tradeunit'; ?>"><?php echo $row_scrap->item; ?></a></li>

                                            <?php }while($row_scrap=$result_scrap->fetchObject());
                                                           
                                            } ?>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-3">
                                        <ul>
                                            <!-- <li class="dropdown-header">Trade Credit</li> -->
                                            <?php
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 10 offset 30");
                                            $count_scrap=$result_scrap->rowCount();
                                            $row_scrap=$result_scrap->fetchObject();
                                            if($count_scrap>0){
                                            do{
                                            ?>
                                            <li><a class="dropdown-item nav-link nav_item"
                                             href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'tradeunit'; ?>"><?php echo $row_scrap->item; ?></a></li>

                                            <?php }while($row_scrap=$result_scrap->fetchObject());
                                                           
                                            } ?>
                                        </ul>
                                    </li>
                                </ul>
                              
                            </div>
                        </li>
                         
                        <li class="dropdown dropdown-mega-menu">
    <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Operating Lease</a>
    <div class="dropdown-menu">
        <ul class="mega-menu d-lg-flex">
            <!-- First Column -->
            <li class="mega-menu-col col-lg-6">
                <ul> 
                    <!-- <li class="dropdown-header">Header</li> -->
                    <?php
                    $result_scrap = $dbh->query("SELECT * FROM scrap WHERE item2='lease' ORDER BY autoid ASC LIMIT 8");
                    $count_scrap = $result_scrap->rowCount();
                    $row_scrap = $result_scrap->fetchObject();
                    if ($count_scrap > 0) {
                        do {
                    ?>
                    <li><a class="dropdown-item nav-link nav_item" href="products?id=<?php echo $row_scrap->autoid; ?>&target=lease"><?php echo $row_scrap->item; ?></a></li>
                    <?php 
                        } while ($row_scrap = $result_scrap->fetchObject());
                    } 
                    ?>
                </ul>
            </li>
            
            <!-- Second Column -->
            <li class="mega-menu-col col-lg-6">
                <ul>
                    <!-- <li class="dropdown-header">Header</li> -->
                    <?php
                    $result_scrap = $dbh->query("SELECT * FROM scrap WHERE item2='lease' ORDER BY autoid ASC LIMIT 8 OFFSET 8");
                    $count_scrap = $result_scrap->rowCount();
                    $row_scrap = $result_scrap->fetchObject();
                    if ($count_scrap > 0) {
                        do {
                    ?>
                    <li><a class="dropdown-item nav-link nav_item" href="products?id=<?php echo $row_scrap->autoid; ?>&target=lease"><?php echo $row_scrap->item; ?></a></li>
                    <?php 
                        } while ($row_scrap = $result_scrap->fetchObject());
                    } 
                    ?>
                </ul>
            </li>
            
 
        </ul>
    </div>
</li>


   <li class="dropdown">
                        
                                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Financing Lease</a>
                             <div class="dropdown-menu">
                                <?php
                                $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='financial-lease' ORDER BY autoid asc");
                                $count_scrap=$result_scrap->rowCount();
                                $row_scrap=$result_scrap->fetchObject();
                                if($count_scrap>0){
                                do{
                                ?>
                              <ul>
                                <li><a class="dropdown-item menu-link"
                                 href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'financial-lease'; ?>"><?php echo $row_scrap->item; ?></a></li>
                                <?php }while($row_scrap=$result_scrap->fetchObject());
                                               
                                } ?>
                            </ul>
                                </div>
                           
                        </li>

                        <li class="dropdown">
                        
                                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Grants</a>
                             <div class="dropdown-menu">
                                <?php
                                $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='grants' ORDER BY autoid asc");
                                $count_scrap=$result_scrap->rowCount();
                                $row_scrap=$result_scrap->fetchObject();
                                if($count_scrap>0){
                                do{
                                ?>
                              <ul>
                                <li><a class="dropdown-item menu-link"
                                 href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'grants'; ?>"><?php echo $row_scrap->item; ?></a></li>
                                <?php }while($row_scrap=$result_scrap->fetchObject());
                                               
                                } ?>
                            </ul>
                                </div>
                           
                        </li>

                        <li class="dropdown">
                        
                        <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Insurance</a>
                     <div class="dropdown-menu">
                        <?php
                        $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='insurance' ORDER BY autoid asc");
                        $count_scrap=$result_scrap->rowCount();
                        $row_scrap=$result_scrap->fetchObject();
                        if($count_scrap>0){
                        do{
                        ?>
                      <ul>
                        <li><a class="dropdown-item menu-link"
                         href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'insurance'; ?>"><?php echo $row_scrap->item; ?></a></li>
                        <?php }while($row_scrap=$result_scrap->fetchObject());
                                       
                        } ?>
                    </ul>
                        </div>
                   
                </li>
                
                <li><a class="nav-link nav_item" href="contactus ">CONTACT</a></li>      
                         
                    </ul>
                </div>
                <!-- <ul class="navbar-nav attr-nav align-items-center" >
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                   
                </ul> -->
            </nav>
        </div>
    </div>
</header>

