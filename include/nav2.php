<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
   <div class="top-header  main_menu_uppercase">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown me-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="assets/images/eng.png" data-title="English">English</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-start">
                           <li><i class="ti-mobile"></i><span><a href="tel:+256743070700">+256-743070700 (Airtel) +256-764045147 (MTN)</a></span></li>
                        </ul>
                    </div>
                </div>
                <?php 
                if(!isset($_SESSION['username'])&& $_SESSION['role'] != "CL"  ){ ?>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            <!-- <li><a href="my-account"><i class="ti-profile"></i><span>My Account</span></a></li> -->
                            <li><a href="getstarted"><i class="ti-users"></i><span>Get Account</span></a></li>
                            <li><a href="login"><i class="ti-user"></i><span>Login</span></a></li>
                        </ul>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            <li><a href="my-account"><i class="ti-home"></i><span>Dashboard</span></a></li>
                            <li><a href="my-account"><i class="ti-profile"></i><span><b>Hi,</b> <?php echo $_SESSION['username']; ?></span></a></li>
                            <li><a href="logout"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div></div>
                <?php
                } ?>
            </div>
        </div>
    </div>
   <div class="bottom_header dark_skin main_menu_uppercase" style="">
        <div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="index" style="width:35%;">
                    <img class="logo_light" style="width:35%" src="main/pages/logo.png" alt="Comp" />
                    <img class="logo_dark" style="width:35%" src="main/pages/logo.png" alt="Companygo " />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li>
                            <a  class="nav-link active" href="index">Home</a>   
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
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 8");
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
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 8 offset 8");
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
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 8 offset 16");
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
                                            $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='tradeunit' ORDER BY autoid asc Limit 8 offset 24");
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
                         

                        <li class="dropdown">
                        
                                <a href="" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Asset Leasing</a>
                             <div class="dropdown-menu">
                                <?php
                                $result_scrap=$dbh->query("SELECT * FROM scrap WHERE item2='lease' ORDER BY autoid asc");
                                $count_scrap=$result_scrap->rowCount();
                                $row_scrap=$result_scrap->fetchObject();
                                if($count_scrap>0){
                                do{
                                ?>
                              <ul>
                                <li><a class="dropdown-item menu-link"
                                 href="products?id=<?php echo $row_scrap->autoid; ?>&target=<?php echo 'lease'; ?>"><?php echo $row_scrap->item; ?></a></li>
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
                <li><a class="nav-link nav_item" href="contactus">Help ?</a></li>      
                         
                    </ul>
                </div>
                <!-- <ul class="navbar-nav attr-nav align-items-center">
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
<!-- END HEADER -->