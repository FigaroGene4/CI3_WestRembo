<?php require_once "controllerUserData.php"; ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Welcome to West Rembo!</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

 
 
  

  <!-- Template Main CSS File 
  <link href="assets/css/style.css" rel="stylesheet">-->

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap');

body{
  font-family: 'Work Sans', sans-serif;
    background: #ececec;
}

/*------------ Login container ------------*/

.box-area{
    width: 1000px;
    height: 90vh;
}

/*------------ Right box ------------*/

.right-box{
    padding: 40px 30px 40px 40px;
}

/*------------ Custom Placeholder ------------*/

::placeholder{
    font-size: 16px;
}

.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}


/*------------ For small screens------------*/

@media only screen and (max-width: 768px){

     .box-area{
        margin: 0 10px;

     }
     .left-box{
        height: 100px;
        overflow: hidden;
     }
     .right-box{
        padding: 20px;
     }

}
</style>
<body>

    
   <!----------------------- Main Container -------------------------->
   <div class="container d-flex justify-content-center align-items-center min-vh-90">
    <!----------------------- Login Container -------------------------->
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
        
    <!--------------------------- Left Box ----------------------------->
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #001D3D;">
       
           <div class="featured-image mb-3">
            <img src="assets/img/hero-img.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-weight: 600;">Welcome Back</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;">Stay connected with us</small>
       </div> 
    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2 style="font-weight: 600; color:black">Login</h2>
                     <p>Sign in your account.</p>

                     <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <form action="<?php echo base_url('login'); ?>" method="POST" autocomplete="">
                <small class="text-black text-wrap text-center" style="width: 17rem; font-weight: 600; color:black">Email address</small>
                  <div class="input-group mb-3">
                      
                      <input class="form-control" type="email" name="email" placeholder="Enter email address" style="background-color:white; border-color:grey" required value="<?php echo $email ?>">
                  </div>
                  <small class="text-black text-wrap text-center" style="width: 17rem; font-weight: 600; color:black">Password</small>
                  <div class="input-group mb-1">
                      <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                  </div>
                  <div class="input-group mb-5 d-flex justify-content-between">
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="formCheck">
                          <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                      </div>
                      <div class="forgot">
                          <small><a style="font-weight: 600; color:black" href="<?php echo base_url('forgot'); ?>">Forgot Password?</a></small>
                      </div>
                  </div>
                  <div class="form-group">
                  <input class="form-control button" type="submit" name="login" Style="background: #001D3D; border-color:#001D3D; color:white;" value="Login">
                  </div>
                 <!-- <div class="input-group mb-3">
                    
                  </div> -->
                  <div class="row">
                      <small>Don't have account? <a href="<?php echo base_url('signup'); ?>" style="width: 17rem; font-weight: 600; color:black">Sign Up</a></small>
                  </div>
                  </form>
          </div>
       </div> 
      </div>
    </div>


</body>

</html>
