<?php require_once "../temp/controllerUserData.php";




?>

<?php

if (isset($_POST['complaint'])) {
    $_SESSION['done'] = 'Complaint Submitted';
    header("Location:requestsandappointment.php");

}

?>


<?php 
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$emailClient = $email;
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM table_customer WHERE email = '$email'";
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
  <link rel="stylesheet" href="css1/owl.carousel.min.css">
  <link rel="stylesheet" href="css1/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css1/style.css">


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
              <li><a href="profile.php">Profile</a></li>

              <li><a href="requestsandappointment.php">Requests and Appointments</a></li>
             
              <li><a href="../temp/logout-user.php">Logout</a></li>
            </ul>

          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><br><br>
  <style>
    .jbt {
      background-image: url(img/jbl.jpg);
      background-repeat: no-repeat;
      background-size: cover;


    }







    .containerz {
      max-width: 180px;

      background: #6666ff;
      margin: 30px auto;
      padding: 50px 0px 20px 0px;
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
      color: gray;
    }

    .containerx {
      max-width: 900px;
      background: #0086FF;
      margin: 40px auto;
      padding: 30px 20px 30px 50px;
      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;
    }

    .containery {
      max-width: 900px;
      background: red;
      margin: 40px auto;
      padding: 30px 20px 30px 50px;
      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;
    }

    .containerc {
      max-width: 900px;
      background: green;
      margin: 40px auto;
      padding: 30px 20px 30px 50px;
      border-radius: 10px;
      box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
      color: white;
    }

    .tubol {
      float: right;
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 4px;
      object-fit: cover;


    }
    .tubols {
      
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 4px;
      object-fit: cover;


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

    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: whitesmoke;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active {
      background-color: #2a77db;
      color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .x {
        margin-left: 0;
      }


      .sidebar a {
        float: left;
      }

      div.content {
        margin-left: 0;
      }
    }

    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;



      }

      .x {
        margin-left: 10px;
      }

      .y {
        margin-left: 10px;
      }
    }

    .x {
      margin-left: 200px;

    }

    .y {
      margin-left: 200px;

    }

    @media screen and (max-width: 700px) {
      .y {
        margin-left: 0;


      }
    }

    @media screen and (max-width: 700px) {
      .x {
        margin-left: auto;
      }
    }

    
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: #2196F3;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .btn-grey {
      background-color: #D8D8D8;
      color: #FFF;
    }

    .rating-block {
      background-color: #FAFAFA;
      border: 1px solid #EFEFEF;
      padding: 15px 15px 20px 15px;
      border-radius: 3px;
    }

    .bold {
      font-weight: 700;
    }

    .padding-bottom-7 {
      padding-bottom: 7px;
    }

    .review-block {
      background-color: #FAFAFA;
      border: 1px solid #EFEFEF;
      padding: 15px;
      border-radius: 3px;
      margin-bottom: 15px;
    }

    .review-block-name {
      font-size: 12px;
      margin: 10px 0;
    }

    .review-block-date {
      font-size: 12px;
    }

    .review-block-rate {
      font-size: 13px;
      margin-bottom: 15px;
    }

    .review-block-title {
      font-size: 15px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .review-block-description {
      font-size: 13px;
    }

    .stylez {
      width: 90px;
    }

    .tubolz {
      float: left;
      width: 100px;
      height: 100px;
      border: px solid #ddd;
      border-radius: 4px;
      object-fit:cover;
      padding-right: 10px;


    }
  </style>

  <br>
  <!-- The sidebar -->
  <div class="sidebar">
    <a class="" href="requestsandappointment.php">Bookings</a>
    <a  class=''href="completedservices.php">Completed Services</a>
    <a class='active'href="refundsandcomplaint.php">Complaints and Refund</a>
  
  </div>

  

    
  <br>




  <div class="container-fluid">
      
  <div class="row x">
      <ul class="nav nav-pills">
 <!-- <li class="nav-item">
    <a class="nav-link active" href="refundsandcomplaint.php">Refunded</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="pendingrefund.php">Pending</a>
  </li>
  
</ul>--><br><br><br>


            <div class="col-12">

            <h1> Succesful Refunds:</h1><br><br>

            <?php
 $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

 $sql = "SELECT transactionNumber, timebooking, datebooking, artistEmail, clientEmail, artistFirstName, artistLastName, clientFirstName, clientLastName, clientContactNumber,clientAddress, artistAddress, instruction, price, status,  comment,rating, reviewTitle, serviceOffered, review, refundComplaint, categoryRefund from table_book where clientEmail = '$email' AND status='Refunded' AND newStatus = 'Refunded' ORDER by datebooking DESC";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {


   while ($row = $result->fetch_assoc()) {
     $rating = $row['rating'];
     $review = $row['review'];
     $clientEmail = $row['clientEmail'];
     $artistEmail = $row['artistEmail'];
     $transactionNumber = $row['transactionNumber'];
     $clientFirstName = $row['clientFirstName'];
     $clientLastName = $row['clientLastName'];
     $artistFirstName = $row['artistFirstName'];
     $artistLastName = $row['artistLastName'];
     $ratingTitle = $row['reviewTitle'];
     $dateBooking = $row['datebooking'];
     $newDate = date("F d, Y", strtotime($dateBooking));
     $time = $row['timebooking'];
     $clientAddress = $row['clientAddress'];
     $instruction = $row['instruction'];
     $serviceOffered = $row['serviceOffered'];
     $price = $row['price'];
     $pricefinal = $price - ($price * 0.12);
     $newDate = date("F d, Y", strtotime($dateBooking));
     $a = new \DateTime($newDate = date("F d, Y", strtotime($dateBooking)));
     $b = new \DateTime;
     $refundComplaint = $row['refundComplaint'];
     $categoryRefund = $row['categoryRefund'];


    
     echo '<b>Transaction Number</b>:'. $transactionNumber;
     echo '&nbsp&nbsp&nbsp&nbsp<b>Date to be serviced</b>:' . $newDate;

     echo '<br><br>';
     echo '<b>Name of Artist</b>: ' . $artistFirstName . ' '. $artistLastName;
     
     $sql1 = "SELECT img from table_artist where email ='$artistEmail'";

     $result1 = $conn->query($sql1);

     if ($result1->num_rows > 0) {

       while ($row = $result1->fetch_assoc()) {

         $img = $row['img'];
       }
      }
    echo ' <img class="tubolz" src="../ArtistLogin/images/' . $img . '" class="">';
    echo '<br><b>Amount Refunded</b>: ₱' . $price;
    echo '<br><b>Type of Service</b>:' . $serviceOffered;
    echo '<br><b>Reason for refund</b>:<i>' . $categoryRefund . '.</i> '.$refundComplaint .'';
     echo '<br><br><hr>';

     
    

     
   }}


?>
 



           
                          
            

            </div>
          </div></div>

          














      <script src="js1/jquery.min.js"></script>
      <script src="js1/popper.js"></script>
      <script src="js1/bootstrap.min.js"></script>
      <script src="js1/owl.carousel.min.js"></script>
      <script src="js1/main.js"></script>













      <br><br><br><br><br><br><br>
      <div class="y">
      <?php include '../includes/footer.php';?>
      </div>
      
      






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