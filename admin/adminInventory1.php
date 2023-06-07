<?php
    include("connect_db/functions.php");
    include("connect_db/connect.php");
    session_start(); 
    $email = $_SESSION['email'];
    if (!isset($_SESSION['email'])){
        session_destroy();
        echo "<script>location.href = 'login.php' </script>";
    }else{
        include("includes/userControl.php");
    }  
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <re
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="login/sweetalert2.all.min.js"></script>


    <title>Inventory List</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include("includes/admin_includes/header.php");?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       <?php include("includes/admin_includes/sidebar.php");?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Inventory</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Inventory List</li>
                                        </ol>
                                    </nav>
                                </div>        
                            </div>
                        </div>
                    </div>
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
                <?php include("includes/admin_includes/footer.php");?>
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


