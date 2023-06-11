<?php require_once "controllerUserData.php"; 


 

?>
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

<?php require_once "controllerUserData.php"; ?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'db_westrembo');

$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM table_residents WHERE email = '$email'";
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


     
  <br><br>
  <style>
 


    .user-img {
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 10px;
      object-fit:cover;
    }

    div.b {
      text-align: left;
    }


    .btn-primary {
  background-color: #001D3D;
  color: #ffffff;
  border-radius: 10px;

}

.btn-primary:hover {
 
  background-color: #001D3D;
}

.alert-danger{
  height: 55px;
  font-size: 20px;
}
.alert-success{
  height: 55px;
  font-size: 20px;
}

  </style>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_westrembo');

$sql = "SELECT * from table_residents where email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $firstname = $row['firstName'];
    $lastname = $row['lastName'];
    $contactnumber = $row['contactNumber'];

    $id = $row['id'];
    $img = $row['image'];

    $addressDetails = $row['houseNumber'];
    $baranggay = $row['streetNumber'];
    $postalCode = $row['sitio'];

    $address = $addressDetails . ', ' . $baranggay . ', ' . $city;
    $_SESSION['clientFirstName'] = $firstname;
    $_SESSION['clientLastName'] = $lastname;
    $_SESSION['clientContactNumber'] = $contactnumber;
    $_SESSION['clientAddress'] = $address;
    $_SESSION['clientEmail'] = $email;
    $_SESSION['id'] = $id;
    $_SESSION['addressDetails'] = $addressDetails;
    $_SESSION['baranggay'] = $baranggay;
    $_SESSION['postalCode'] = $postalCode;

    

    
    echo '<div class="text-center">';
    echo '<img class="user-img rounded-circle" src="images/' . $img . '" ><br><br>';
    echo '</div>';

    echo '<div class="row">';
    
  
    if (isset($_SESSION['error'])) {
      echo
      "
          <div class='alert alert-danger text-center'>
              <button class='close'>&times;</button>
              " . $_SESSION['error'] . "
          </div>
          ";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
      echo
      "
          <div class='alert alert-success text-center'>
              <button class='close'>&times;</button>
              " . $_SESSION['success'] . "
          </div>
          ";
      unset($_SESSION['success']);
    }
  

    // Column 1
    echo '<div class="col-md" style="margin-left: 20px;">';
    echo '<form method="POST" action= "">';
    echo '<label for="firstname" class="small" style="font-size: 20px;">First Name:</label>';
    echo '<input type="text" id="firstname" name="firstname" value="' . $firstname . '" class="form-control input-lg" style="background-color: #f2f2f2; width: 70%;">';
    echo '<br>';
    echo '<input type="text" id="id" name="id" style=" display: none" value="' . $id . '" class="form-control input-lg" style="background-color: #f2f2f2; width: 70%;">';
    echo '<label for="contactnumber" class="small" style="font-size: 20px;">Contact Number:</label>';
    echo '<input type="text" id="contactnumber" name="contactnumber" value="' . $contactnumber . '" class="form-control input-lg" style="background-color: #f2f2f2; width: 70%;">';
    echo '</div>';


    // Column 2
    echo '<div class="col-md" style="margin-left: 20px;">';
    echo '<label for="lastname" class="small" style="font-size: 20px;">Last Name:</label>';
    echo '<input type="text" id="lastname" name="lastname" value="' . $lastname . '" class="form-control input-lg" style="background-color: #f2f2f2; width: 70%;">';
    echo '<br>';
    echo '<label for="address" class="small" style="font-size: 20px;">Address:</label>';
    echo '<input type="text" id="address" name="address" value="' . $address . '" class="form-control input-lg" style="background-color: #f2f2f2; width: 70%;">';
    echo '</div>';

    echo '</div>'; // End row
    echo '<div class="d-flex justify-content-end mt-3">';
    echo '<button type="submit" name="submitbtn" class="btn btn-success" style="background-color: #001D3D; border-color: #001D3D;">Update</button>';
    echo '</div>';
    echo '</form>';

    
    
    if (isset($_POST['submitbtn'])) {
      $id_client = $_POST['id'];
      $firstNameClient = $_POST['firstname'];
      $lastNameClient = $_POST['lastname'];
      $contactNumber = $_POST['contactnumber'];
    
  
    
      $stmt = $conn->prepare("UPDATE table_residents SET firstName = ?, lastName = ?, contactNumber = ? WHERE id = ?");
  
  
      $stmt->bind_param("ssss", $firstNameClient, $lastNameClient,$contactNumber, $id_client);
  
     
      $result = $stmt->execute();
  
    if (!$stmt->execute()) {
      $_SESSION['error'] = 'Error updating profile: ' . $stmt->error;
    } else {
      $_SESSION['success'] = 'Profile updated successfully';
    }
    
  
      $stmt->close();

      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;

  } 

  }
}
?>





  <script src="js1/jquery.min.js"></script>
  <script src="js1/popper.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/main.js"></script>






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