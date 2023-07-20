<?php include 'header-client.php';?>
<?php require_once "controllerUserData.php"; 


 

?>
<?php 
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$_SESSION['email'] = $email;

$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../temp/reset-code.php');
            }
        }else{
            header('Location: ../temp/user-otp.php');
        }
    }
}else{
    header('Location: ../temp/login-user.php');
}




  
?>
<!DOCTYPE html>
<html lang="en">



<head>



  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Welcome to West Rembo</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
   <!-- Vendor CSS Files -->
   <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  body::before {
  display: block;
  content: '';
  height: 60px;
}

.navbar {
 
}

.navbar-dark .navbar-nav .nav-link {
  color: white;
}

#learn{
  
  border-radius: 20px;
  background-color: #FFC300;
}

#map {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}

@media (min-width: 768px) {
  .news-input {
    width: 50%;
  }
}

.smaller-image {
  max-width: 60%;
  padding: 0 auto; 
}

.no-margin {
  margin: 0;
}

@media (min-width: 1200px) {
  #learn.custom-margin {
    margin: 50px;
  }
}

.btn-primary {
  background-color: #001D3D;
  color: #ffffff;
  border-radius: 10px;

}

.btn-primary:hover {

  background-color: #001D3D;
}

.mt-2{
  color: #001D3D;
  font-weight: bold;
}


</style>

<body>



   
    <!-- Showcase -->
<section id="learn" class="custom-margin text-dark">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-md p-5">
        <h2 style="color: #001D3D;">Welcome, <span style="font-weight: bold;"><?php echo $fetch_info['firstName'] ?></span></h2>
        <h2 class="lead" style="color: #001D3D;">
          Here's your timeline
        </p>
        <br>
        <!-- Document Request Info -->
        
        <?php
  include_once('db_conn.php');
  $sql = "SELECT * FROM table_documentrequest WHERE email = '$email' ORDER BY id DESC LIMIT 1";
  $query = $conn->query($sql);
  if ($row = $query->fetch_assoc()) {
    $id = $row['id'];
    echo "<p><strong><i class='bi bi-file-earmark-fill' style='color: #001D3D'></i> Transaction Number:</strong> " . $row['transactionNumber'] . "</p>";


    echo "<p><strong><i class='bi bi-file-earmark-text-fill ' style='color: #001D3D'></i> Category:</strong> " . $row['category'] . "</p>";
    echo "<p><strong><i class='bi bi-calendar-fill' style='color: #001D3D'></i> Date Submitted:</strong> " . $row['date'] . "</p>";
    echo "<p><strong><i class='bi bi-check-circle-fill' style='color: #001D3D'></i> Status:</strong> " . $row['status'] . "</p>";
  } else {
    echo "<p>No Document Request Found</p>";
  }
?>

        <!-- End of Document Request Info -->

      </div>
      <div class="col-md no-margin">
        <div class="big-image">
          <img src="../wrp-assets/imgwelcome.png" class="img-fluid" alt="" style="width: 300%; object-fit: cover;" />
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Contact & Map -->
    <section class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
              <h2 class="text-left mb-4" style="color: #001D3D; font-weight: bold;">Document Request</h2>
              <p class="text-left mb-2">Select type of document you want to request</p>

              <img src="../wrp-assets/doc-req.png" class="img-fluid" alt="" />
          </div>


          <div class="col-md">
            <img src="../wrp-assets/steps1.png" class="img-fluid" alt="" />
          </div>
        </div>
        <div class="row">
      <div class="col-md">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Request now</button>
      </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <div class="row">
                          <div class="col-md">
                             <h5 class="modal-title">Document Request</h5>
                             <h6 class="modal-sub-title">Select type of document you want to request</h6>
                          </div>
                      </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                <a href="<?php echo base_url('request?category=bid')?>">
                                  <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 150px; background-color: #7F99B2;">
                                          <img src="../wrp-assets/card.png" alt="Image" style="max-width: 100%; max-height: 50%;">
                                          <div class="mt-2">Barangay ID</div>
                                        
                                      </div>
                                </a>
                                </div>
                                <div class="col-md-6 mb-3">
                                <a href="<?php echo base_url('request?category=bc')?>" >
                                  <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 150px; background-color: #FFE799;">
                                        <img src="../wrp-assets/documentation.png" alt="Image" style="max-width: 100%; max-height: 50%;">
                                        <div class="mt-2">Clearance</div>
                                    </div>
                                </a>
                                </div></div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                <a href="<?php echo base_url('request?category=bp')?>">
                                  <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 150px; background-color: #FFE799;">
                                              <img src="../wrp-assets/business.png" alt="Image" style="max-width: 100%; max-height: 50%;">
                                              <div class="mt-2">Business permit</div>
                                      </div>
                                </a>
                                </div>
                                    <div class="col-md-6 mb-3">
                                    <a href="<?php echo base_url('requestOther')?>">
                                      <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 150px; background-color: #7F99B2;">
                                              <img src="../wrp-assets/building.png" alt="Image" style="max-width: 100%; max-height: 50%;">
                                              <div class="mt-2">Other Barangay Certificates </div>
                                          </div>
                                      </a>
                                    </div>
                                </div>
                        </form>
                    </div>

                    </div>
            
                </div>
            </div>
        </div>
    </div>



   
</body>

</html>

 