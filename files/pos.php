<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS | UIPS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>

    .dataTables_filter{
      display:none;
    }
    .dataTables_info{
      display:none;
    }
    div.dataTables_wrapper div.dataTables_paginate {
    margin: 0;
    white-space: nowrap;
    text-align: right;
    display: none;
}
  </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-lg-5">
        <div class="card card-row card-primary">
          <div class="card-heade">
             <!-- Navbar -->
  <nav class="main-headr navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href='index.php' class='brand-link'>
<img  src='../logins/images/king.jpg' alt='Zini Tech' class='brand-image img-square elevation-3' 
style='opacity: .8;'>
</a></li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"   href="#" role="button">
          <i class="fas fa-globe"></i>
        </a>
      </li>
      <li class="nav-item">
      <a href='index.php' class='brand-link'>
<img  src='../logins/images/king.jpg' alt='Zini Tech' class='brand-image img-circle elevation-3' 
style='opacity: .8;margin-left:100px;'>
</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->
          </div>
          <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      wak-in-customer
                    </span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text">
                    <a class="" data-toggle="modal" data-target="#modal-lg" 
                    ><i class="fas fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>

                <div class="input-group" style="margin-top:20px;margin-bottom:15px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      Kampala ware house
                    </span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text"><i class="fas fa-plus"></i></div>
                  </div>
                </div>


                <div class="card-body">
                <table id="example1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                  <thead>
                  <tr style="font-size: 13px;">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>

              <div class="row" style="margin-top:100px;">
             <div class="col-lg-12">
              <button class="btn btn-outline-danger form-control">Grand Total : shs. 0.00</button>
             </div>
             </div>


             <div class="row" style="margin-top:40px;">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tax</label>
                        <input type="text" class="form-control" placeholder="0">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Discount</label>
                        <input type="text" class="form-control" placeholder="0">
                      </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label>Shipping</label>
                        <input type="text" class="form-control" placeholder="0">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                  <button style="border-radius:20px;" type="submit" class="btn btn-danger form-control"><i class ="fa fa-power-off"></i>&nbsp;Reset</button>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <button style="border-radius:20px;" type="submit" class="btn btn-warning form-control"><i class ="fa fa-shopping-cart"></i>&nbsp;Submit</button>
                      </div>
                    </div>
                  </div>




          </div>
        </div></div>

      <div class="col-lg-7">
        <div class="card card-row card-default">
          <div class="card-header bg-in">
          <div class="row">
             <div class="col-lg-6">
              <button class="btn btn-outline-info form-control">List of Category</button>
             </div>
             <div class="col-lg-6">
             <button class="btn btn-outline-info form-control">Brand List</button>
             </div>
          </div>
          </div>
          <div class="card-body">
          <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Product</label>
                        
                        <div class="form-group" style="border-radius:10px;">
                            <div class="input-group input-group-lg">
                            <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <input  style="border-left:red;font-size:15px;" type="search" class="form-control form-control-lg" placeholder="Scan/Search Product by Code Name">    
                            </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- jQuery -->


<!-- modals======================================== -->


<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form>
            <div class="modal-body">
            <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control txtform">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control txtform">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control txtform" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control txtform">
                      </div>
                    </div>
                  </div>

                  
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary">submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
              
            </div>
          </div>
  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
           
          </div>
        </div>
    </div>
      </div>
</div>
    </section>


</body>
</html>
