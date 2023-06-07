<?php






if (isset($_POST['book'])) {

  $referenceNumber = $_POST['referenceNumber'];



  if (strlen($referenceNumber) < 13) {
    $_SESSION['passwordnotstrong'] = 'Gcash reference number should be 13 numbers long!';
  }
  if (strlen($referenceNumber) == 13) {

    $referenceNumber = $_POST['referenceNumber'];

    $_SESSION['referenceNumber'] = $referenceNumber;

    header('location:success.php');
  }
}

?>

<?php require_once "../temp/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$emailClient = $email;
$password = $_SESSION['password'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM table_customer WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css1/owl.carousel.min.css">
  <link rel="stylesheet" href="css1/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css1/style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


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




  <?php
  $username = $_SESSION["username"];
  $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');
  $sql = "SELECT firstname, lastname, email, username,houseNumber, baranggay, city, serviceOffered, datejoined from table_artist where username = '$username' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $username = $row['username'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $artistEmail = $row['email'];
      $serviceOffered = $row['serviceOffered'];
      $joinDateEmployee = $row['datejoined'];
      $houseNumber = $row['houseNumber'];
      $baranggay = $row['baranggay'];
      $city = $row['city'];

      $artistAddress = $houseNumber . ', ' . $baranggay . ', ' . $city;

      $_SESSION['artistAddress'] = $artistAddress;
    }
  }
  ?>
  <div class="container center">
    <h1 style="text-align: center;">Checkout</h1>
    <h1 style="text-align: center;"></h1>
    <div class="containerx">
      <?php $username = $_SESSION["username"];


      $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');


      $sql = "SELECT firstname, lastname, username, serviceOffered, datejoined, img from table_artist where username = '$username' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
          $username = $row['username'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $serviceOffered = $row['serviceOffered'];
          $joinDateEmployee = $row['datejoined'];
          $newDate = date("F d, Y", strtotime($joinDateEmployee));

          $img = $row['img'];

          echo '<img class="tubol" src="../ArtistLogin/images/' . $img . '" width="250px">';
          echo "<h1>  " . $firstname . " " . $lastname . "</h1>";

          echo "<i>  " . $serviceOffered . "</i>" .

            "<br><br>";

          echo "<h5>Date Joined: " . $newDate . " </h5>";



          echo "<br><br>";
      ?>

          <!-- CLIENT DATABASE QUERY -->


          <?php

          ?>

          <!-- query end -->


          <form action="#" method="post" enctype="multipart/form-data">

        <?php

          $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');
          $sql = "SELECT * from table_artist where username = '$username' ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
              $username = $row['username'];
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
              $email = $row['email'];
              $artistEmail = $row['email'];
              $serviceOffered = $row['serviceOffered'];
              $joinDateEmployee = $row['datejoined'];
              $houseNumber = $row['houseNumber'];
              $baranggay = $row['baranggay'];
              $city = $row['city'];
              $artistContactNumber = $row['contactNumber'];
              $artistAddress = $houseNumber . ', ' . $baranggay . ', ' . $city;

              $_SESSION['artistAddress'] = $artistAddress;

              $_SESSION['artistContactNumber'] = $artistContactNumber;
            }
          }
          if (isset($_POST['tubol'])) {

            $date = $_POST['datepicker'];
            $oras = $_POST['oras'];
            $instruction1 = $_POST['instruction1'];
            $_SESSION['date'] = $date;
            $_SESSION['oras'] = $oras;
            $_SESSION['instruction'] = $instruction1;
          }


          $price;
          $date = $_SESSION['date'];
          $ddate = $date;
          $newDate = date("F d, Y", strtotime($ddate));
          $time = $_SESSION['oras'];
          $newTime = date("g:i a", strtotime($time));
          $instruction = $_SESSION['instruction'];
          $id;
          $transaction = $_SESSION['transaction'];
          $_SESSION['transactionNumber'] = $transaction;
          $_SESSION['datebooking'] = $date;
          $_SESSION['timebooking'] = $time;
          $_SESSION['artistEmail'] = $email;
          $_SESSION['artistFirstName'] = $firstname;
          $_SESSION['artistLastName'] = $lastname;
          $_SESSION['artistContactNumber'] = $artistContactNumber;

          echo "<h4><i>Booking Details:</i> </h4>";

          $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

          $sql = "SELECT firstname, lastname, email, contactnumber, city,addressDetails, baranggay, postalCode from table_customer where email = '$emailClient'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

              $city = $row['city'];
              $addressDetails = $row['addressDetails'];
              $baranggay = $row['baranggay'];
              $postalCode = $row['postalCode'];

              $addressClient = $addressDetails . ', ' . $baranggay . ', ' . $city;
            }
          }

          echo "<br> Date: " . $newDate;
          echo "<br> Time: " . $newTime;
          echo "<br> Address: " . $addressClient;
          echo "<br> Instruction: " . $instruction;


          echo "<br>";
          echo "<br>";
          echo "<hr>";
          echo '<b>Instruction</b>: Scan with Pay QR using the GCash App. If using mobile, click the photo to download and upload the QR through the app';
          echo '<div class="text-center"><a href="qr.jpg" download>
         <br> <img src="qr.jpg" alt="W3Schools" width="300" height="  ">
        </a></div><br><br><br>';
          $sql = "SELECT * FROM table_pricing where id = 1";


          //use for MySQLi-OOP
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {

            echo '<h5> Service Charge: ₱140 </h5>';
            echo '<h5> Transporattion Fee: ₱60 </h5>';
            echo '<h5> 12% VAT: ₱30 </h5>';
            echo '<h5> System Commission: ₱20 </h5><hr>';
          



            switch ($serviceOffered) {

              case 'Barber':
                echo "<B><h3>Please pay exactly ₱" . $row['haircut'] . ".</h3></B>";
                $price = $row['haircut'];

                break;
              case 'Nail Care':
                echo "<h2>Please pay exactly ₱" . $row['nailcare'] . ".</h2>";
                $price = $row['nailcare'];


                break;
                break;
              case 'Massage':
                echo "<h2>Please pay exactly ₱" . $row['massage'] . ". </h2>";
                $price = $row['massage'];

                break;
              case 'Make up':
                echo "<h2>Please pay exactly₱" . $row['makeup'] . " </h2>";
                $price = $row['makeup'];

                break;

              default:
            }
          }

          echo '<i>Wrong amount of money sent will not be refunded</i>';

          echo "<br>";
          echo "<br>";
        }
      }

        ?>


        <div class="form-group">
          <label for="exampleFormControlInput1">GCASH Reference Number:</label>
          <input type="number" name="referenceNumber" required class="form-control" id="exampleFormControlInput1" placeholder="Enter your gcash reference no. here" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13">
        </div>

        <div class="field image">
          <label>Upload GCASH Receipt</label><br>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div><br>


        <input style="text-align: center;" class="btn btn-success name=" time" type="submit" name="book" value="Pay and Place Booking"><br>
          </form>
          <?php






          if (isset($_POST['book'])) {

            $referenceNumber = $_POST['referenceNumber'];



            if (strlen($referenceNumber) < 13) {
              $_SESSION['passwordnotstrong'] = 'Gcash reference number should be 13 numbers long!';
            }
            if (strlen($referenceNumber) == 13) {

              $referenceNumber = $_POST['referenceNumber'];

              $_SESSION['referenceNumber'] = $referenceNumber;

              header('location:success.php');
            }
          }

          if (isset($_SESSION['passwordnotstrong'])) {
            echo
            '<br><div class="container"><div class="alert alert-danger alert-dismissible text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong></strong> ' . $_SESSION['passwordnotstrong'] . '
</div></div> ';
            unset($_SESSION['passwordnotstrong']);
          }

          ?>

    </div>
  </div>

  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

  $sql = "SELECT firstname, lastname, email, contactnumber, city,addressDetails, baranggay, postalCode from table_customer where email = '$emailClient'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $firstNameClient = $row['firstname'];
      $lastNameClient = $row['lastname'];
      $emailClient = $row['email'];
      $contactNumberClient = $row['contactnumber'];
      $city = $row['city'];
      $addressDetails = $row['addressDetails'];
      $baranggay = $row['baranggay'];
      $postalCode = $row['postalCode'];

      $addressClient = $addressDetails . ', ' . $baranggay . ', ' . $city;


      $_SESSION['clientFirstName'] = $firstNameClient;
      $_SESSION['clientLastName'] = $lastNameClient;
      $_SESSION['clientContactNumber'] = $contactNumberClient;
      $_SESSION['clientAddress'] = $addressClient;

      $_SESSION['instruction'] = $instruction;
      $_SESSION['price'] = $price;

      $sql = "SELECT * FROM table_pricing where id = 1";


      //use for MySQLi-OOP
      $query = $con->query($sql);
      while ($row = $query->fetch_assoc()) {
        $comish = $row['commission'];
        $perecentrage = $comish / 100;
        $_SESSION['profit'] = $price * $perecentrage;
      }
      $_SESSION['serviceOffered'] = $serviceOffered;




      if (isset($_POST['book'])) {

        $referenceNumber = $_POST['referenceNumber'];
        $_SESSION['referenceNumber'] = $referenceNumber;
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions) === true) {
          $types = ["image/jpeg", "image/jpg", "image/png"];
          if (in_array($img_type, $types) === true) {
            $time = time();
            $new_img_name = $time . $img_name;

            move_uploaded_file($tmp_name, "images/" . $new_img_name);

            $_SESSION['imgGcash'] = $new_img_name;
          }
        }
      }
    }
  }

  ?>












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