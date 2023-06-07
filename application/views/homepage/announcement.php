
<style>
@import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
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

.custom-heading {
  color: #001D3D;
  font-weight: bolder;
}

.custom-paragraph {
  color: #001D3D;
}
.custom-title {
  color:  #001D3D;
  font-weight: bolder;
}

.custom-date {
  color:  #001D3D;
  font-weight: bold;
}


</style>
<!--body-->

<div class="container">
  <div class="p-4 shadow-4 jbt">
    <h2 class="htxt custom-heading">News and Announcements</h2>
    <p class="custom-paragraph" style="font-style: italic;">
      Daily updates from our community
    </p>
  </div>
</div>


<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
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


<?php 
include_once("db_conn.php");
$sql = "SELECT * FROM table_blog ORDER BY id DESC LIMIT 3";
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
    echo "<p>".$rows['content']."</p>";
    
    // Display date posted
    $dateOrig = $rows['date'];
    $cDate = date("F j, Y", strtotime($dateOrig));
    echo "<p style='color:#001D3D; font-weight: bolder;'>Date Posted: <span class='custom-date'>".$cDate."</span></p>";

    
    echo "</div>";
    echo "</div>";
    
    echo "</div>"; // Close the row
    
    echo "</div>"; // Close the container
    
    // Add spacing between announcements
    echo "<div class='row mt-4'></div>";
}
?>



<html>
    