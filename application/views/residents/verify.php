<?php require_once "controllerUserData.php"; 

if (isset($_POST['verify'])) {
  //header("Location:pendingverify.php");
  


}

 

?>
<?php 




$email = $_SESSION['email'];




$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
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
            redirect(base_url('otp'));
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

  <title> West Rembo App</title>
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
    <div class="container container-xl d-flex align-items-center justify-content-between">

      <a href="../Client/verify.php" class="logo d-flex align-items-center">
        <img src="assets/img/spa.png" alt="">
        <span>West Rembo</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          
          
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
          
          <li class="dropdown scrollto" style="color: pink;"><a href="#"><span>Hello, <?php echo $fetch_info['firstName'] ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
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
  .jbt{
    background-image: url(img/jbl.jpg);
  background-repeat: no-repeat;
  background-size: cover;

  
  }

  .buttonHolder{ text-align: center; }







.containerz{
   max-width:180px;
   
   background:#6666ff;
   margin:30px auto;
   padding:50px 0px 20px 0px;
   float: left;
   margin-top: 100px;

   border-radius:10px;
   box-shadow:0px 4px 5px rgba(0, 0, 0, 0.75);
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


.containerx{
   max-width:900px;
   background:    #0086FF;
   margin:40px auto;
   padding:30px 20px 30px 50px;
   border-radius:10px;
   box-shadow:0px 4px 5px rgba(0, 0, 0, 0.75);
   color: white;
}






.containerz{
   max-width:200px;
   background:#6666ff;
   margin:40px auto;
   padding:10px 0px 20px 0px;
   float: left;
   margin-top: 100px
   ;

   border-radius:10px;
   box-shadow:0px 4px 5px rgba(0, 0, 0, 0.75);
   color: white;

   
}

.tubol {
      float: right;
      width: 250px;
      height: 250px;
      border: px solid #ddd;
      border-radius: 4px;

      object-fit:cover;


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

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
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

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

</style>

<div class="container text-center">

<h1>Resident Verification</h1>
</div>


<div class="container text-justify-left " style="padding:90px">

<br><br>

    <h5>Please upload a PNG or JPEG file of your valid ID for verification:<h5>
    <br><br>
    <ul>
  <li> School ID </li>
  <li>Last Baranggay Clearance</li>
  <li>Birth Certificate</li>
  <li>Voter's Certificate/ ID </li>
  <li>Philhealth</li>
  <li>Birth Certificate</li>
  
  <li>TIN ID </li>
  <li>NBI Clearance</li>
  
</ul>

</div>


 


    
    
</label>

</div>





  <div class="row">
    
    
<?php 

  
$conn = mysqli_connect('localhost', 'root', '', 'db_westrembo');

    


    


    
   
  echo '<div class="container">';
  echo '<div class="containerx">';
   
  echo '  <div class="row py-4">
  <div class="col-lg-6 mx-auto">

      <!-- Upload image input-->
      <form action="#" method="POST" enctype="multipart/form-data">
      <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
          <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0" required>
          
          <div class="input-group-append">
              <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
          </div>
      </div>

      
</div>';


echo '<br><br><div class="buttonHolder"><input class="btn btn-success  " type="submit" name="verify" value="Verify"></div>';


  echo '  </form>';
  if (isset($_SESSION['done'])) {
    echo
    '<br><br><br><div class="container"><div class="alert alert-secondary alert-dismissible text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong></strong></strong> ' . $_SESSION['done'] . '
  </div></div> ';
    unset($_SESSION['done']);
  }
  
echo'  </div></div>';

 






?>


<script> function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}</script>


  </div>

  
  <?php
  if(isset($_POST['verify'])){

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

            move_uploaded_file($tmp_name, "imagesOfValidation/" . $new_img_name);

            
         


          
        }
  }

    $conn1 = mysqli_connect('localhost', 'root', '', 'db_westrembo');
 
    $valid = 'For Approval';
    $sql = "UPDATE table_residents SET validationT = '$valid', imageValidaton = '{$new_img_name}' WHERE email = '$email'";
 
   $conn1->query($sql);

   redirect(base_url('pendingverify'));
   




  }

  ?>

   

  


 







 






    <script src="js1/jquery.min.js"></script>
    <script src="js1/popper.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/main.js"></script>













<br><br><br><br><br><br><br>
<?php //include '../includes/footer.php';?>
     
    



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

</body>

</html>


