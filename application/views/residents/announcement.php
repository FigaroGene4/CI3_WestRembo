<?php include 'header-client.php';?>
<?php require_once "controllerUserData.php"; 


 

?>
<?php 
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$_SESSION['email'] = $email;

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

  <title> Welcome to West Rembo</title>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 


 
 
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  body::before {
  display: block;
  content: '';
  height: 60px;
}

.navbar {
  background-color: #001D3D;
}

.navbar-dark .navbar-nav .nav-link {
  color: white;
}

#learn{
  
  border-radius: 20px;
  background-color: #FFC300;
}

#map {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}

@media (min-width: 768px) {
  .news-input {
    width: 50%;
  }
}

.smaller-image {
  max-width: 60%;
  padding: 0 auto; 
}

.no-margin {
  margin: 0;
}

@media (min-width: 1200px) {
  #learn.custom-margin {
    margin: 50px;
  }
}

.btn-primary {
  background-color: #001D3D;
  color: #ffffff;
  border-radius: 10px;

}

.btn-primary:hover {

  background-color: #001D3D;
}

.mt-2{
  color: #001D3D;
  font-weight: bold;
}


</style>

<body>


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
<br><br><br><br><br><br>

<?php 
include_once("db_conn.php");
$sql = "SELECT * FROM table_blog ORDER BY id DESC";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while ($rows = mysqli_fetch_assoc($resultset)) {
    echo "<div class='container'>";
    echo "<div class='row'>";
    
    // Display image in column 1
    echo "<div class='col-md-6'>";
    echo "<div class='announcement-image'>";
    echo "<a href='blogpost.php?id=".$rows['id']."'><img src='admin/blogimage/".$rows['img']."' alt='1.jpg' class='img-responsive' style='width: 600px; height: 400px; border-radius: 20px;'></a>";
    echo "</div>";
    echo "</div>";
    
    // Display title, content, and date in column 2
    echo "<div class='col-md-6'>";
    echo "<div class='announcement-details'>";
    echo "<h1 class='custom-title'>".$rows['title']."</h1>";
     // Display date posted
    $dateOrig = $rows['date'];
    $cDate = date("F j, Y", strtotime($dateOrig));
    echo "<p style='color:#001D3D; font-weight: bolder;'>Date Posted: <span class='custom-date'>".$cDate."</span></p>";
    echo "<p>".$rows['content']."</p>";
    
   

    
    echo "</div>";
    echo "</div>";
    
    echo "</div>"; // Close the row
    
    echo "</div>"; // Close the container
    
    // Add spacing between announcements
    echo "<div class='row mt-4'></div>";
}
?>



   
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

