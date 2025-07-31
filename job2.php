<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
<?php include 'dashboard/pages/connect.php'; ?>


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
                <div class="page-title">
            		<h1>Jobs - Part Time</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-12">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
               

<?php 

$result_cat=$dbh->query("SELECT * FROM cat");
$count_cat=$result_cat->rowCount();
$row_cat=$result_cat->fetchObject();


if($count_cat>0){
    do{
        
$result_jobs=$dbh->query("select * from jobs where category_id='".$row_cat->auto_id."' ");
$count_jobs=$result_jobs->rowCount();
$row_jobs=$result_jobs->fetchObject();
  ?>
<div class="card" style="width: 100%;">
  <div class="card-header">
    <?php echo $row_cat->category; ?>
  </div>
  <div class="card-body">
  <div class="container mt-5 mb-3">
    <div class="row">
        <?php
        if($count_jobs>0){
            do{
                $result_streets=$dbh->query("SELECT * FROM street where auto_id='".$row_jobs->address_id."'");
                $count_s=$result_streets->rowCount();
                $row_s=$result_streets->fetchObject();

                $result_emp=$dbh->query("SELECT * FROM employer where autoid='".$row_jobs->employer_id."'");
                $count_emp=$result_emp->rowCount();
                $row_emp=$result_emp->fetchObject();

                $result_c=$dbh->query("SELECT * FROM jobcat where auto_id='".$row_jobs->nature_id."'");
                $count_c=$result_c->rowCount();
                $row_c=$result_c->fetchObject();
                 ?>
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-dribbble"></i> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0"><?php echo $row_emp->employer; ?></h6> <span>4 days ago</span>
                        </div>
                    </div>
                    <div class="badge"> <span>Ask Expert</span> </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading"><?php echo $row_jobs->title; ?> - <?php echo $row_s->street; ?></h3>
                    <div class="mt-5">
                        <div class="row">
                           <div class="col-lg-6">750K - 850K</div><div class="col-lg-6">
                                <button class="btn btn-outline-warning"> Apply</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } while($row_jobs=$result_jobs->fetchObject());
}else{
    echo "<div><p style='text-align:center;>There is no job found......</p></div>";
} ?>
       
    </div>
</div>
<?php if(!$count_jobs>0){
}else{
 ?>
<div class="row"><div class="col-lg-9"></div>
<div class="col-lg-3"><a href="#" class="btn btn-outline">view all</a></div>
</div> <?php } ?>
  </div>
</div>
<div class="row"><div class="col-lg-12"><br></div></div>

<?php     
} while($row_cat=$result_cat->fetchObject());
}
?>
</div>


        	
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->




<?php include 'include/footer.php'; ?>
</body>
</html>

