<?php require_once "../temp/controllerUserData.php"; ?>

<?php $email = $_GET["email"]; ?>
<?php

if (isset($_POST['tubol'])) {


  $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');
  $datez = $_POST['datepicker'];
  $oras = $_POST['oras'];
  $instruction1 = $_POST['instruction1'];


  $date1 = date('G:i', strtotime('+1 hour +30 minutes', strtotime($oras)));
  $date2 = date('G:i', strtotime('-2 hour -00 minutes', strtotime($oras)));




  $email_check = "SELECT * FROM table_book WHERE artistEmail = '$email' AND status = 'Accepted'
  AND datebooking = '$datez' AND timebooking BETWEEN '$date2' and '$date1'";
  echo $date1, $date2, $oras;
  $res = mysqli_query($conn, $email_check);
    
  if (mysqli_num_rows($res) > 0) {

    $_SESSION['bookingtime'] = "Seleceted Date and Time already been booked";
  } else {
    

    $_SESSION['date'] = $datez;
    $_SESSION['oras'] = $oras;
    $_SESSION['instruction'] = $instruction1;

    header("location:checkout.php");
  }
  
}

?>



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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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

    .containerx {
      max-width: 900px;
      background: #6666ff;
      margin: 40px auto;
      padding: 30px 20px 30px 20px;

      margin-top: 100px;

      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;
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

    .tubol {
      float: right;
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 4px;
      object-fit: cover;


    }
  </style>
  <div class="container">
    <div class="containerx">
      <?php $email = $_GET["email"];

      $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

      $sql = "SELECT firstname, lastname, username, serviceOffered, datejoined, img from table_artist where email = '$email' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
          $username = $row['username'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $serviceOffered = $row['serviceOffered'];
          $joinDateEmployee = $row['datejoined'];
          $img = $row['img'];

          function getGUIDnoHash()
          {
            mt_srand((float)microtime() * 10000);
            $charid = md5(uniqid(rand(), true));
            $c = unpack("C*", $charid);
            $c = implode("", $c);

            return substr("SPA" . $c, 0, 11);
          }



          $_SESSION['transaction'] = getGUIDnoHash();
          $_SESSION['username'] = $username;


          echo '<img class="tubol" src="../ArtistLogin/images/' . $img . '" width="250px">';
          echo "<h1>  " . $firstname . " " . $lastname  . "</h1>";

          echo "<i>  " . $serviceOffered . "</i>" .
            "<br><br>";

          echo "<br><br>";
        }
      }

      ?>
      <form action="#" method="post">

        <h5>Select Date:</h5>

        <input id="datepicker" width="250" name="datepicker" required placeholder="Select your preffered date" />
        <script>
          $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: new Date(),


          });
        </script>
        <br>
        <h5>Time available from 7am to 5pm only.</h5>

        <input type="time" id="appt" name="oras" required width="250">

        <script>
          $('#appt').appt({


            minTime: '7:00',
            maxTime: '4:00',


          });
        </script>



        <h5>Write your instruction:</h5>
        <input type="text" class="form-control" id="escapeHtml" name="instruction1" placeholder="Enter your instructions">

        <script>
          function escapeHtml(text) {
            return text
              .replace(/&/g, "&amp;")
              .replace(/</g, "&lt;")
              .replace(/>/g, "&gt;")
              .replace(/"/g, "&quot;")
              .replace(/'/g, "&#039;");
          }
        </script>

        <br><br>
        <input style="text-align: center;" class="btn btn-success " type="submit" value="Proceed to checkout" name="tubol">


      </form>

      <?php

      if (isset($_SESSION['bookingtime'])) {
        echo
        '<br><div class="container"><div class="alert alert-danger alert-dismissible text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong></strong> ' . $_SESSION['bookingtime'] . '
</div></div> ';
        unset($_SESSION['bookingtime']);
      }

      ?>
    </div>
  </div>









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