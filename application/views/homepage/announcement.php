<?php //include 'includes/header.php';?>
<style>
    @font-face{
    src: url(css/fonts/WorkSans-Regular.ttf);
}
h1{

color: #000814;
font-family: 'Work Sans', sans-serif;
font-style: normal;
font-weight: 700;
}
.card-text{
    font-family: 'Work Sans', sans-serif;
    font-style: normal;
    font-weight: 400;
}
h3{
    font-family: 'Work Sans', sans-serif;
    font-style: normal;
    font-weight: 700;
}
p{
    font-weight: 500;
}
</style>

<!--<div class="container" style="background-image: url('wrp-assets/footer-bg.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 120px;">-->
   <div class="container" style="
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 120px;">
    
    
<div class="row">
  <div class="col-sm-6 d-flex align-items-center">
  <h1> News & Announcements</h1>
    <div class="card-transparent border-0" style="padding-left: 100px; float:left">
      <div class="card-body">
  
      </div>
    </div>
  </div>

  <section id="features" class="features">

<div class="container" data-aos="fade-up">

  <header class="section-header">
   
   
  </header>


</div>

<div class="container">


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

    </div>
</div>



</div>





