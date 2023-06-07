<?php

if (isset($_POST['updateprofile'])) {
  $_SESSION['updated'] = 'Profile Picture updated successfully'; 
  header("Location:profile.php");
  $_SESSION['updated'] = 'Profile Picture updated successfully';

}

if (isset($_POST['updatepic'])) {
  if (isset($_FILES['image'])) {
    $_SESSION['photo'] = 'Profile Picture updated successfully';
    header("Location:profile.php");
    $_SESSION['photo'] = 'Profile Picture updated successfully';

  }
}
?>


<?php require_once "../temp/controllerUserData.php"; ?>
<?php
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

$errors = array();

$clientFirstName =   $_SESSION['clientFirstName'];
$clientLastName = $_SESSION['clientLastName'];
$clientContactNumber = $_SESSION['clientContactNumber'];
$clientAddress = $_SESSION['clientAddress'];
$clientEmail = $_SESSION['clientEmail'];
$addressDetails = $_SESSION['addressDetails'];
$city = $_SESSION['city'];
$baranggay = $_SESSION['baranggay'];
$postalCode = $_SESSION['postalCode'];


if ($email != false && $password != false) {
  $sql = "SELECT * FROM table_customer WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    if ($status == "verified") {
      if ($code != 0) {
        header('Location: ../temp/reset-code.php');
      }
    } else {
      header('Location: ../temp/user-otp.php');
    }
  }
} else {
  header('Location: ../temp/login-user.php');
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css1/owl.carousel.min.css">
  <link rel="stylesheet" href="css1/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css1/style.css">


  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Welcome to SPA2GO!</title>
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





  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../SPA2GO Landing/index.php" class="logo d-flex align-items-center">
        <img src="assets/img/spa.png" alt="">
        <span>SPA2GO</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../SPA2GO Landing/index.php">Home</a></li>

          <!--  <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->

          <li class="dropdown scrollto" style="color: pink;"><a href="#"><span>Hello, <?php echo $fetch_info['firstname'] ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Profile</a></li>

              <li><a href="#">Display</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="../temp/logout-user.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br><br><br><br><br>
  <style>
    .jbt {
      background-image: url(img/jbl.jpg);
      background-repeat: no-repeat;
      background-size: cover;


    }







    .containerz {
      max-width: 200px;
      background: #6666ff;
      margin: 40px auto;
      padding: 10px 0px 20px 0px;
      float: left;
      margin-top: 100px;

      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;
    }

    .link {
      font-size: 16px;
      font-weight: 300;
      text-align: center;
      position: relative;
      height: 40px;
      line-height: 40px;
      margin-top: 10px;
      overflow: hidden;
      width: 90%;
      margin-left: 5%;
      cursor: pointer;
    }

    .link:after {
      content: '';
      position: absolute;
      width: 80%;
      border-bottom: 1px solid rgba(255, 255, 255, 0.5);
      bottom: 50%;
      left: -100%;
      transition-delay: all 0.5s;
      transition: all 0.5s;
    }

    .link:hover:after,
    .link.hover:after {
      left: 100%;
    }

    .link .text {
      text-shadow: 0px -40px 0px rgba(255, 255, 255, 1);
      transition: all 0.75s;
      transform: translateY(100%) translateZ(0);
      transition-delay: all 0.25s;
    }

    .link:hover .text,
    .link.hover .text {
      text-shadow: 0px -40px 0px rgba(255, 255, 255, 0);
      transform: translateY(0%) translateZ(0) scale(1.1);
      font-weight: 600;
    }

    a {
      color: white;
    }
  </style>

  <div class="container">


    <h1> Your Information</h1>
    <br><br>
    <?php

    ?>
    <form action="#" method="post" enctype="multipart/form-data">




      <div class="form-group">
        <label for="exampleInputEmail1">First Name:</label>
        <input type="text" name="firstNameClient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $clientFirstName; ?>">

      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Last Name:</label>
        <input type="text" name="lastNameClient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $clientLastName; ?>" </div>
        <!--
<div class="form-group">
<label for="exampleInputEmail1">Email:</label>
<input type="email" name="clientEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required placeholder="<?php echo $clientEmail; ?>">
<small id="emailHelp" class="form-text text-muted">Email must not been used by others</small>
</div> -->

        <div class="form-group">
          <label for="exampleInputEmail1">Contact Number:</label>
          <input type="number" name="contactNumberClient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $clientContactNumber; ?>">

        </div>

        <div class="form-group">
          <label for="inputAddress2">Your Address:</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="addressDetails" value="<?php echo $addressDetails; ?>">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Baranggay</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Enter your baranggay" name="baranggay" value="<?php echo $baranggay; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">City</label>
            <select id="inputState" class="form-control" placeholder="Select a City" name="city" value="<?php echo $city; ?>">
              
              <option selected>Makati City</option>
              <option selected>Taguig City</option>
              <option selected>Pasig City</option>
              
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Postal Code</label>
            <input type="number" class="form-control" id="inputZip" name="postalCode" placeholder="Enter Postal Code" value="<?php echo $postalCode; ?>">
          </div>
        </div>



        <div class="field image">
          <label>Upload Profile Picture</label><br>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <br>
        <br>

        <br><br><br>

        <button name="updateprofile" type="submit" style="text-align: center" class="btn btn-primary">Update Profile Information</button>
        <button name="updatepic" type="submit" style="text-align: center" class="btn btn-secondary">Change Profile Picture</button>





        <?php

        include_once('../admin/connection.php');

        $status = $statusMsg = '';
        if (isset($_POST['updateprofile'])) {
          $firstNameClient1 = $_POST['firstNameClient'];
          $lastNameClient1 = $_POST['lastNameClient'];
          $contactNumberClient1 = $_POST['contactNumberClient'];
          $addressDetails = $_POST['addressDetails'];
          $baranggay = $_POST['baranggay'];
          $city = $_POST['city'];
          $postalCode = $_POST['postalCode'];
          


          $sql = "UPDATE table_customer SET  firstname = '$firstNameClient1', lastname = '$lastNameClient1', 
           contactnumber = '$contactNumberClient1', addressDetails = '$addressDetails' , baranggay = '$baranggay' , city = '$city' , postalCode = '$postalCode' WHERE id = '$id'";
          $conn->query($sql);

          $sql1 = "UPDATE users SET  fname = '$firstNameClient1', lname = '$lastNameClient1' WHERE email = '$email'";
          $conn->query($sql1);


          $_SESSION['updated'] = 'Profile updated successfully';
        }

        if (isset($_POST['updatepic'])) {
          if (isset($_FILES['image'])) {

            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];

            $types = ["image/jpeg", "image/jpg", "image/png"];

            $time = time();
            $new_img_name = $time . $img_name;
            move_uploaded_file($tmp_name, "../temp/images/" . $new_img_name);

            $sql = "UPDATE table_customer SET img = '{$new_img_name}' WHERE id = '$id'";
            $conn->query($sql);

            $sql1 = "UPDATE users SET img = '{$new_img_name}' WHERE email = '$email'";
            $conn->query($sql1);

            $_SESSION['photo'] = 'Profile Picture updated successfully';
          }
        }


        ## }


        ?>


        <!-- insert to database -->


        <h1> <?php if (isset($_SESSION['emailerror'])) {
                echo
                "
            <div class='alert alert-danger text-center'>
                <button class='close'>&times;</button>
                " . $_SESSION['emailerror'] . "
                
            </div>
            ";
                unset($_SESSION['emailerror']);
              } ?>

          <h1> <?php if (isset($_SESSION['updated'])) {
                  echo
                  "
            <div class='alert alert-success text-center'>
                <button class='close'>&times;</button>
                " . $_SESSION['updated'] . " </div>";
                  unset($_SESSION['updated']);

                  echo '<h6><a href="profile.php" class="link-primary">Return to Profile</a></h6>';
                }

                if (isset($_SESSION['photo'])) {
                  echo
                  "
            <div class='alert alert-success text-center'>
                <button class='close'>&times;</button>
                " . $_SESSION['photo'] . " </div>";
                  unset($_SESSION['photo']);

                  echo '<h6><a href="profile.php" class="link-primary">Return to Profile</a></h6>';
                } ?>

            <!-- end insert -->


      </div>


      <script src="js1/jquery.min.js"></script>
      <script src="js1/popper.js"></script>
      <script src="js1/bootstrap.min.js"></script>
      <script src="js1/owl.carousel.min.js"></script>
      <script src="js1/main.js"></script>



      <br><br><br><br><br><br><br>
      <?php include '../includes/footer.php'; ?>


      <!-- Vendor JS Files -->
      <script src="assets/vendor/purecounter/purecounter.js"></script>
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>

      <script>
        var links = document.getElementsByClassName('link')
        for (var i = 0; i <= links.length; i++)
          addClass(i)


        function addClass(id) {
          setTimeout(function() {
            if (id > 0) links[id - 1].classList.remove('hover')
            links[id].classList.add('hover')
          }, id * 750)
        }
      </script>
      <!-- Template Main JS File -->
      <script src="assets1/js/main.js"></script>

</body>

</html>