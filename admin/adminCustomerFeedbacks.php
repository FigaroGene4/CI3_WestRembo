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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="login/sweetalert2.all.min.js"></script>


    <title>Customer's Feedbacks</title>
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
                                <h2 class="pageheader-title">Notifications</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Customer's Feedbacks</li>
                                        </ol>
                                    </nav>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header" style="letter-spacing: 5px;">Customer's Feedbacks</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">User ID</th>
                                                        <th class="border-0">Name</th>
                                                        <th>Feedback</th>
                                                        <th class="border-0">Time and Date Sent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                $query = "SELECT * from `customerfeedback` order by `ddate` DESC";
                                                $result = mysqli_query($conn, $sql);
                                                if(count(fetchAll($query))>0)
                                                {
                                                    $row = mysqli_fetch_assoc($result);
                                                    foreach(fetchAll($query) as $i)
                                                    {   
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i["id"];?></td>
                                                        <td><?php echo $i["fullname"];?></td>
                                                        <td><?php echo $i["message"];?></td>
                                                        <td><?php echo $i["ddate"];?></td>
                                                    </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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


