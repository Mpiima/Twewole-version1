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
<div class="breadcrumb_section bg_gray page-title-mini" style="background-color:whitesmoke !important">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Frequently asked question</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Faq</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- STAT SECTION FAQ --> 
<div class="section">
	<div class="container">
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
<!-- END SECTION FAQ --> 




<?php include 'include/footer.php'; ?>


</body>
</html>