<?php include 'header-client.php';?>
<?php require_once "controllerUserData.php";



  error_reporting(0);


?>
<?php
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$_SESSION['email'] = $email;

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
<!DOCTYPE html>
<html lang="en">

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

  <title> Brgy. West Rembo App</title>
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

<body>

 

  <script type="text/javascript">
    function loadDoc() {


      setInterval(function() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noti_number").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "data.php", true);
        xhttp.send();

      }, 1000);


    }
    loadDoc();
  </script>
  <br><br><br><br><br>
  <style>
    .jbt {
      background-color: green;


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
      max-width: 220px;

      background: #6666ff;
      margin: 20px auto;
      padding: 20px 20px 20px 20px;
      float: left;


      border-radius: 10px;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.75);
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


    @media screen and (max-width: 799px) {
      .sidebar {
        display: block;

      }
    }

    .sidebar a.active {

      color: yellow;
      font-weight: bold;
    }

    .item {
      height: 500px;
    }

    .item img {
      width: 100%;
      height: 100% !important;
      object-fit: cover;
    }

    .fifty-chars {
      width: 50ch;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }

    
    .btn-submit {
    background-color: #001D3D; /* Replace with your desired color */
    color: #FFFFFF; /* Replace with the desired text color */
  }

  .btn-submit:hover {
    background-color: #001D3D; /* Replace with your desired color */
    color: #FFFFFF; /* Replace with the desired text color */
  }

  </style>





<br><br><br>
  <div class="container">


    <div class="col-md-12 ">

   

    
            <h2 class="display-6" style="color: #001D3D; font-weight: bold;">Select Certificate you would like to request</h2>
            <form action="#" method="post">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='type'>
 
  <option value="Yellow Card and Philhealth Application">Yellow Card and Philhealth Application</option>
  <option value="Senior Citizens Card (White, Blue, Yellow and Philhealth)">Senior Citizen's Card (White, Blue, Yellow & Philhealth)</option>
  <option value="PWD's Benefit Cards (Philhealth, Yellow)">PWD's Benefit Cards (Philhealth, Yellow)</option>
  <option value="PVAO Application">PVAO Application</option>
  <option value="Bonafide Residency">Bonafide Residency</option>
  <option value="Good Moral Character">Good Moral Character</option>
  <option value="Marriage License">Marriage License</option>
  <option value="No Derogatory Record">No Derogatory Record</option>
  <option value="Indigency">Indigency</option>
  <option value="Live-in/Solo Parent">Live-in/Solo Parent</option>
  <option value="Scholarship/ UMAK Consortia">Scholarship/ UMAK Consortia</option>
  <option value="Green Card">Green Card</option>
</select>
            
           <h3 class="display-8" style="color: #001D3D;">You must provide a reason for requesting barangay ID</h3>
           
            <div class="container center">

            
        <div class="form-group mt-3">
          <label for="comment">Reason for Request:</label>
          <textarea class="form-control" rows="5" id="comment" name="reason" required></textarea>
        </div>
      
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Place of birth:</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter birth place" name="birthplace">
            </div>
      
            <div class="form-group">
              <label for="exampleInputEmail1">Period of Residency in Barangay West Rembo:</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter residency period" name="period">
            </div>
      
            <div class="form-group">
              <label for="exampleFormControlSelect1">Registered Makati City Voter?</label>
              <select class="form-control" id="exampleFormControlSelect1" name="voter">
                <option>Yes</option>
                <option>No</option>
              </select>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">House Owner:</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name of house owner" name="houseOwner">
            </div>
      
            <div class="form-group">
              <label for="exampleInputEmail1">Relation to house owner:</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter relationship with owner" name="relation">
            </div>
          </div>
        </div>
      
        <div class="d-flex justify-content-end mt-3">
          <button name="requestOther" type="submit" class="btn btn-submit btn-lg">Submit</button>
        </div>
      </form>
      
      <br><br>
      


        <?php
        if (count($errors) > 0) {
        ?>
          <div class="alert alert-danger text-center">
          <?php
          foreach ($errors as $showerror) {
            echo $showerror;
          }
        }
          ?>




          </div>

      </div>

    </div>



    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



















    <br><br><br><br><br><br><br>
    <?php include 'includes/footer.php'; ?>






  <!-- Vendor JS Files -->
  
</body>

</html>