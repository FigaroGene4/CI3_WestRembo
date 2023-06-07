<?php 

    include("connect_db/functions.php");
    include("connect_db/connect.php");
session_start();



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logo.png">   
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
</head>
<body>


 
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
        
            <a class="navbar-brand" href="home.php" style="padding-left: 10px;"> <img src="logowr.png" width="20px"> </a>
            <a class="navbar-brand">Hello, <?php echo $_SESSION['name']; ?></a>
          
            <a class="navbar-brand navbar-right  " href="logout.php" style= "margin-left: auto">Logout</a>
</nav>

<div class="sidenav">



<a href="client.php ">Client</a>
<a href="artist.php">Artist</a>
<a href="product.php">Product</a>
<a href="service.php">Services</a>
<a href="report.php">Report</a>
</div>
</div>

<div class="main">
  

                    <div class = "row">
                    <form method="POST" role="form" id="footer-form" enctype="multipart/form-data">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h2 class="card-header">Products</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                                <tr class="border-5">
                                                    <th class="border-5">Product ID</th>
                                                    <th class="border-5">Image</th>
                                                    <th class="border-5">Product Name</th>
                                                    <th class="border-5">Price</th>
                                                    <th class="border-5">Stock</th>
                                                    <th class="border-5">Category</th>
                                                    <th class="border-5 col-12">Description</th>
                                                    <th class ="border-5"><button type = "button" class="btn btn-success" role="button" data-toggle="modal" data-target="#addModal" style="width: 100%;">Add a Product</button> 
                                                        <?php include("includes/admin_includes/addModal.php");?></th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                <?php include ("includes/admin_includes/adminShowInventory.php");?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div> 

                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="assets/libs/js/main-js.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/jquery-1.12.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.yu2fvl.js"></script>
        <script src="assets/js/main.js"></script>

</body>
 
</html>

<script>
    function editProduct(id,pname,pprice,pstock,category,description,image){
        $("#editModal").modal("show");

        $('#txtProdID').val(id);
        $('#txtProductName').val(pname);
        $('#txtPrice').val(pprice);
        $('#txtStocks').val(pstock);
        $('#txtCategory').val(category);
        $('#txtDescription').val(description);
        $("#fileUploaded").attr('src',image);
    }
    function deleteProduct(id){
        $("#deleteModal").modal("show");
        $('#txtPID').val(id);
    }
</script>


</div>
            
          
    
     


     
     
</body>
</html>

