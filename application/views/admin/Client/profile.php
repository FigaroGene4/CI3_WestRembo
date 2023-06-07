
 <?php if (isset($_SESSION['emailerror'])) {
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

<?php require_once "../temp/controllerUserData.php"; ?>
<?php


$email = $_SESSION['email'];
$password = $_SESSION['password'];
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
          <li><a id='noti_number'class="nav-link scrollto active" href="requestsandappointment.php">Notification</a></li>
          
          <li class="dropdown scrollto" style="color: pink;"><a  href="#"><span>Hello, <?php echo $fetch_info['firstname'] ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="profile.php">Profile</a></li>
           
              <li><a href="requestsandappointment.php">Requests and Appointments</a></li>
           
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

    .tubol {
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 10px;
      object-fit:cover;



    }

    .profile {
      max-width: 500px;
      text-align: center;
      background: gray;
      margin: 40px auto;
      padding: 30px 20px 30px 20px;

      margin-top: 100px;

      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;

    }

    div.b {
      text-align: left;
    }

    .wew {
      padding-left: 100px;
    }
  </style>
  <h1 style="text-align: center;"> My Profile</h1>
  <div class="container profile">



    <br><br>
    <?php




    $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

    $sql = "SELECT id, firstname, lastname, email, contactnumber, city,addressDetails, baranggay, postalCode, img from table_customer where  email = '$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $contactnumber = $row['contactnumber'];
      
        $id = $row['id'];
        $img = $row['img'];
        $city = $row['city'];
        $addressDetails = $row['addressDetails'];
        $baranggay = $row['baranggay'];
        $postalCode = $row['postalCode'];

        $address = $addressDetails . ', ' . $baranggay . ', ' . $city;
        $_SESSION['clientFirstName'] = $firstname;
        $_SESSION['clientLastName'] = $lastname;
        $_SESSION['clientContactNumber'] = $contactnumber;
        $_SESSION['clientAddress'] = $address;
        $_SESSION['clientEmail'] = $email;
        $_SESSION['id'] = $id;
        $_SESSION['addressDetails'] = $addressDetails;
        $_SESSION['baranggay'] = $baranggay;
        $_SESSION['city'] = $city;
        $_SESSION['postalCode'] = $postalCode;


        echo '<img class="tubol" src="../temp/images/' . $img . '" ><br><br>';
        echo '<div class="wew" style= "text-align:left" >';


        echo "Name: " . $firstname . " " . $lastname;
        echo "<br>" . "Email: " . $email;
        echo "<br>" . "Contact Number: " . $contactnumber;
        echo "<br>" . "Address: " . $address;

        echo '</div>';
      }
    }


    ?>
     
    
    <br><br><br>
    <a class="btn btn-primary" href="editprofile.php" role="button">Edit Profile</a>
   

    




  </div>



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