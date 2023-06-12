<?php require_once "controllerUserData.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Sign Up</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>




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
@import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
@font-face{
    src: url(css/fonts/WorkSans-Regular.ttf);
}

.text-center{
  font-weight: bolder;
  font-family: 'Work Sans', sans-serif;
  color:  #001D3D;
}


  body{
    background: linear-gradient(45deg, #7F99B2, #FFE799);

  }
  .form-group {
    margin-bottom: 20px;
  }
  .col-md-12.form{
    border-radius: 20px;
    margin-top: 30px;
    height: auto;
  }

  .padding{
    padding-left: 200px;
    padding-right: 200px;
  }

  
</style>

<body>

<div class="container padding">
  <div class="row">
    <div class="col-md-12 form">
      <form action="<?php echo base_url('signup'); ?>" method="POST" autocomplete="" enctype="multipart/form-data">
      <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <a href="../index.php"><img src="../wrp-assets/logo-removebg-preview.png" style="width: 214px; height: 85px;"></a>
            </div>
        </div>
        <p class="text-center">Enter your credentials</p>
        <?php
        if (count($errors) == 1) {
        ?>
          <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $showerror) {
              echo $showerror;
            }
            ?>
          </div>
        <?php
        } elseif (count($errors) > 1) {
        ?>
          <div class="alert alert-danger">
            <?php
            foreach ($errors as $showerror) {
            ?>
              <li><?php echo $showerror; ?></li>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="firstName" style="font-weight: bold; color: #001D3D;">First Name</label>
              <input class="form-control" type="text" name="firstName" placeholder="First Name" required value="<?php echo $firstName ?>">
            </div>
            <div class="form-group">
              <label for="contactNumber" style="font-weight: bold; color: #001D3D;">Contact Number</label>
              <input class="form-control" type="number" name="contactNumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" placeholder="Contact Number" required value="<?php echo $contactNumber ?>">
            </div>
            
            <div class="form-group">
              <label for="email" style="font-weight: bold; color: #001D3D;">Email Address</label>
              <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
            </div>
          </div>
          <div class="col-md-4">
          

            <div class="form-group">
              <label for="lastName" style="font-weight: bold; color: #001D3D;">Last Name</label>
              <input class="form-control" type="text" name="lastName" placeholder="Last Name" required value="<?php echo $lastName ?>">
            </div>
            <div class="form-group">
              <label for="birthdate" style="font-weight: bold; color: #001D3D;">Birthdate</label>
              <input class="form-control" type="date" name="birthdate" placeholder="Birthdate" required value="<?php echo $birthdate ?>">
            </div>
            <div class="form-group">
              <label for="gender" style="font-weight: bold; color: #001D3D;">Gender</label>
              <select class="custom-select" name="gender" required value="<?php echo $gender ?>">
                <option selected>
                  <?php 
                  if(isset($city)){
                    echo $city;
                   } 
                    if($city ==''){
                      echo 'Please Select a Gender';
                     } 
                  ?>
                </option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="houseNumber" style="font-weight: bold; color: #001D3D;">House Number</label>
              <input class="form-control" type="text" name="houseNumber" placeholder="House Number" required value="<?php echo $houseNumber ?>">
            </div>
            <div class="form-group">
              <label for="streetNumber" style="font-weight: bold; color: #001D3D;">Street Name</label>
              <input class="form-control" type="text" name="streetNumber" placeholder="Street Name" required value="<?php echo $streetNumber ?>">
            </div>
            <div class="form-group">
              <label for="sitio" style="font-weight: bold; color: #001D3D;">Sitio</label>
              <input class="form-control" type="number" name="sitio" placeholder="Sitio" required value="<?php echo $sitio ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password" style="font-weight: bold; color: #001D3D;">Password</label>
              <input class="form-control" type="password" name="password" placeholder="Password" required>
               <label for="" style="font-size:13px">&nbsp;Password must be 8 characters minimum with an uppercase and a number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="cpassword" style="font-weight: bold; color: #001D3D;">Confirm Password</label>
              <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="field image">
              <label for="image" style="font-weight: bold; color: #001D3D;">Upload Profile Picture</label>
              <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="tacbox">
            <input id="checkbox" type="checkbox" required />
            <label for="checkbox"> I agree to these <a href="#" data-toggle="modal" data-target="#exampleModalLong" style="color: #FFC300; font-weight: bolder;">Terms and Conditions</a>.</label>
          </div>
          </div>
        </div>
       
        <div class="row">
          
        </div>
      
        <br>
        <div class="form-group d-flex justify-content-center">
          <input class="form-control button" type="submit" name="signup" value="Signup" style="width: 250px; background-color: #001D3D; font-weight: bolder;">
        </div>
        <div class="link login-link text-center">Already a member? <a style="color: #FFC300;" href="login-user.php">Login here</a></div>

      </form>
    </div>
  </div>
</div>







  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>