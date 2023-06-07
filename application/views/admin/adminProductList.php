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
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Product List</title>
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
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Product List </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <?php include ("includes/admin_includes/showProductList.php");?>
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
</body>
 
</html>


<style>
    .ribbons{
    -webkit-clip-path: polygon(10% 25%, 10% 0, 35% 0%, 65% 0%, 90% 0, 90% 25%, 90% 50%, 91% 100%, 50% 73%, 10% 100%, 10% 50%);
    clip-path: polygon(10% 25%, 10% 0, 35% 0%, 65% 0%, 90% 0, 90% 25%, 90% 50%, 91% 100%, 50% 73%, 10% 100%, 10% 50%);

    position: absolute;
    top: 0px;
    background-color: #59b3ff;
    padding: 60px 15px;
    text-align: center;
    left: 10px;  font-family: 'Circular Std Medium'; color: #fff;}

   .ribbons-text{transform: rotate(90deg);
    position: absolute;
    top: 35px;
    left: -12px;
    color: #fff;}
.bg-brand {
    background-color: #ffc750 !important;
    
}

.bg-danger {
    background-color: #ef172c !important;
}
</style>