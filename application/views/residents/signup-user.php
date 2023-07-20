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

  

  @media (max-width: 3000px) {

    .padding{
    padding-left: 200px;
    padding-right: 200px;
  }
}

@media (max-width: 500px) {

  .padding{
    padding-left: 20px;
    padding-right: 20px;
  }
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
            <label for="checkbox"> I agree to these <a href="#" data-toggle="modal" data-target="#exampleModalLong" style="color: #FFC300; font-weight: bolder;"  data-toggle="modal" data-target="#exampleModalLong">Terms and Conditions</a></label>
          </div>
          </div>
        </div>
       
        <div class="row">
          
        </div>
      
        <br>
        <div class="form-group d-flex justify-content-center">
          <input class="form-control button" type="submit" name="signup" value="Signup" style="width: 250px; background-color: #001D3D; font-weight: bolder;">
        </div>
        <div class="link login-link text-center">Already a member? <a style="color: #FFC300;" href="<?php echo base_url('login'); ?>">Login here</a></div>

      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <h1 class="mt-4">Terms and Conditions for Barangay System with Data Privacy Act (Republic Act No. 10173)</h1>
    <p>Please read these Terms and Conditions ("Terms") carefully before accessing or using the Barangay System. These Terms apply to all users and visitors of the system. By accessing or using the system, you agree to be bound by these Terms. If you do not agree with any part of these Terms, please do not use the system.</p>

    <h2 class="mt-4">1. Definitions</h2>
    <ul>
      <li><strong>"Barangay System"</strong> refers to the online platform or software developed and operated by the barangay, facilitating various services and activities related to the barangay administration, community engagement, and public services.</li>
      <li><strong>"User"</strong> refers to any individual or entity accessing or using the Barangay System.</li>
    </ul>

    <h2 class="mt-4">2. Privacy and Data Protection</h2>
    <ul>
      <li>The Barangay System complies with the provisions of the Data Privacy Act of 2012 (Republic Act No. 10173) and other relevant laws and regulations pertaining to data privacy and protection.</li>
      <li>The barangay is committed to safeguarding the privacy and security of user data collected through the Barangay System.</li>
      <li>Users' personal information collected by the Barangay System shall be handled in accordance with the Privacy Policy, which is incorporated into these Terms by reference.</li>
    </ul>

    <h2 class="mt-4">3. User Responsibilities</h2>
    <ul>
      <li>Users must provide accurate, complete, and up-to-date information when using the Barangay System.</li>
      <li>Users are responsible for maintaining the confidentiality of their account credentials and ensuring their accounts are not used by unauthorized individuals.</li>
      <li>Users shall not engage in any unlawful, abusive, or unauthorized activities when using the Barangay System.</li>
      <li>Users shall not attempt to gain unauthorized access to any part of the Barangay System or interfere with its functioning.</li>
      <li>Users shall not use the Barangay System to distribute or transmit any harmful or malicious content, including but not limited to viruses, malware, or any form of unsolicited or unauthorized advertising.</li>
    </ul>

    <h2 class="mt-4">4. Intellectual Property</h2>
    <ul>
      <li>The Barangay System and its associated content, including but not limited to text, graphics, images, logos, and software, are protected by intellectual property laws and are the property of the barangay or its licensors.</li>
      <li>Users may not reproduce, modify, distribute, or create derivative works of the Barangay System or its content without explicit written permission from the barangay.</li>
    </ul>

    <h2 class="mt-4">5. Limitation of Liability</h2>
    <ul>
      <li>The Barangay System is provided on an "as is" basis, and the barangay makes no warranties or representations regarding its availability, accuracy, completeness, or reliability.</li>
      <li>The barangay shall not be liable for any direct, indirect, incidental, consequential, or exemplary damages arising from the use or inability to use the Barangay System.</li>
      <li>The barangay shall not be responsible for any losses, damages, or liabilities resulting from unauthorized access or use of user data.</li>
    </ul>

    <h2 class="mt-4">6. Modification and Termination</h2>
    <ul>
      <li>The barangay reserves the right to modify or terminate the Barangay System or these Terms at any time, without prior notice.</li>
      <li>The barangay may suspend or terminate user access to the Barangay System for any reason, including but not limited to violation of these Terms.</li>
    </ul>

    <h2 class="mt-4">7. Governing Law and Jurisdiction</h2>
    <ul>
      <li>These Terms shall be governed by and construed in accordance with the laws of the Philippines.</li>
      <li>Any disputes arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts located in the barangay's locality.</li>
    </ul>

    <p>By accessing or using the Barangay System, you acknowledge that you have read, understood, and agreed to these Terms and Conditions.</p>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
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