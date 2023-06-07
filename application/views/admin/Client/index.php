<?php require_once "../temp/controllerUserData.php"; 


 

?>
<?php 
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$_SESSION['email'] = $email;
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

  <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
<br><br><br><br><br>
<style>
  .jbt{
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







.containerz{
   max-width:220px;
   
   background:#6666ff;
   margin:20px auto;
   padding:20px 20px 20px 20px;
   float: left;
  

   border-radius:10px;
   box-shadow:0px 2px 2px rgba(0, 0, 0, 0.75);
   color: white;
}
.link{
   font-size:16px;
   font-weight:300;
   text-align:center;
   position:relative;
   height:40px;
   line-height:40px;
   margin-top:10px;
   overflow:hidden;
   width:90%;
   margin-left:5%;
   cursor:pointer;
}
.link:after{
   content: '';
   position:absolute;
   width:80%;
   border-bottom:1px solid rgba(255, 255, 255, 0.5);
   bottom:50%;
   left:-100%;
   transition-delay: all 0.5s;
   transition: all 0.5s;
}
.link:hover:after,
.link.hover:after{
   left:100%;
}
.link .text{
   text-shadow:0px -40px 0px rgba(255, 255, 255, 1);
   transition:all 0.75s;
   transform:translateY(100%) translateZ(0);
   transition-delay:all 0.25s;
}
.link:hover .text,
.link.hover .text{
   text-shadow:0px -40px 0px rgba(255, 255, 255, 0);
   transform:translateY(0%) translateZ(0) scale(1.1);
   font-weight:600;
}

a{
  color: white;
}
  

@media screen and (max-width: 799px) {
   .sidebar {
       display:block;
       
   }
}

.sidebar a.active{
 
  color: yellow;
  font-weight: bold;
}



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
<?php

if (isset($_POST["submit"])) {
  $comment = mysqli_real_escape_string($con, $_POST['comment']);
  $rating = $_POST['rating'];
  $reviewTitle = $_POST['reviewTitle'];
  $transactionNumber = $_SESSION['transactionNumber'];
  $status = 'Service Complete';
  $artistIncome = $_SESSION['artistIncome'];
  $artistEmail = $_SESSION['artistEmail'];


  $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

  $sql = "UPDATE table_book SET status='$status', rating = '$rating', reviewTitle ='$reviewTitle', review = '$comment' WHERE transactionNumber = '$transactionNumber'";
  $conn->query($sql);


  $_SESSION['success'] = 'Review complete! Thanks you for using SPA2GO';


  $sql = "SELECT totalProfit from table_artist where email = '$artistEmail'";
  $result1 = $conn->query($sql);

  if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      $totalProfitTemp = $row['totalProfit'];

      $totalProfit = $totalProfitTemp + $artistIncome;

      $sql = "UPDATE table_artist SET totalProfit='$totalProfit' WHERE email = '$artistEmail'";
      $conn->query($sql);
    



      
    }
  }




 
}

?>



<div class="container">
<?php
                            if (isset($_SESSION['error'])) {
                                echo
                                "
                  <div class='alert alert-danger text-center'>
                      
                      " . $_SESSION['error'] . "
                  </div>
                  ";
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) {
                                echo
                                ' <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Review Complete!</strong> '. $_SESSION['success'].'
                              </div>';
                                unset($_SESSION['success']);
                            }
                            ?>
<div class="p-4 shadow-4 rounded-3 jbt"    >
  <h2  style="color: white;">Self care is not selfish</h2>
  <p class="white" style="font-style:italic">
    Wellness is key to a happy life
  </p>

 

 
  <a type="button" href="blog.php"class="btn btn-light">
    Click for <span style="color:#6666ff">FREE</span> health tips
</a>
</div>
<br>
<br>
<br>
<div class="col-md-12 text-center">
<h2 class="heading-section mb-5 
            pb-md-4" >Select a Pamper Artist</h2><h6>Sorted by nearest</h6>
					</div>

<div class="containerz sidebar" >

  <div style="text-align: center;"><label >Select a Service</label></div>
  <div class="link text active"> <a class="active" href="index.php">Haircut</a>
    </div>
  <div class="link text" ><a href="massage.php">Massage</a></div>
  <div class="link text"><a href="nailcare.php">Nail Care</a></div>
  
  <div class="link text" ><a href="makeup.php">Make Up</a></div>
    
  
</div>


<div class="container">
				<div class="row">
       
						
          <div class="col-md-12">
						<div class="featured-carousel owl-carousel">
<?php 
      $conn = mysqli_connect('localhost', 'root', '', 'db_spa2go');

       $sql = "SELECT *
       from table_customer WHERE email = '$emailClient'";
    
      $result = $conn-> query($sql);

      if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){

          $location = $row['city'];

          

      $sql = "SELECT *
       from table_artist where serviceOffered = 'Barber'
        AND status ='verified' AND availability = 'true' AND skillStatus ='verified' 
        ORDER BY CASE WHEN city = '$location' THEN 1 ELSE 2 END, city";
      $result = $conn-> query($sql);

      if($result-> num_rows > 0){

        while($row = $result -> fetch_assoc()){
          $email = $row['email'];
          $img = $row['img'];
          echo  ##"<h1>". $row['firstname']  ."</h1>";

          '<div class="item">
          <div class="work">
            <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(../ArtistLogin/images/'.$img.');">
              <a href="details.php?email='.$row['email'].'" class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-search"></span>
              </a>
            </div>
            <div class="text pt-3 w-100 text-center">
              <h3><a href="details.php?username='.$email.'">'. 
              
              $row['firstname'] .' </a></h3>
              
              <span>Barber</span>
            </div>
          </div>
        </div>';
        }
      }

      else{
        echo '<div class="containerx"> <h1> No barbers yet</h1></div>';
      }

        }
      }

   
      
      
?>

</section>
        </div>
</div>
        </div></div>

        






    <script src="js1/jquery.min.js"></script>
    <script src="js1/popper.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/main.js"></script>













<br><br><br><br><br><br><br>
<?php include '../includes/footer.php';?>
     
    



  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script>var links = document.getElementsByClassName('link')
for(var i = 0; i <= links.length; i++)
   addClass(i)


function addClass(id){
   setTimeout(function(){
      if(id > 0) links[id-1].classList.remove('hover')
      links[id].classList.add('hover')
   }, id*750) 
}</script>
  <!-- Template Main JS File -->
  <script src="assets1/js/main.js"></script>

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


