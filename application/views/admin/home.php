<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
 include ("db_conn.php"); 

 ?>
 <?php include 'includes2/header-admin.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logowr.png">   
  <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1"> 


  
</head>
<style>
    
    a{
      color: black;
    }

    a:hover{
      color: violet;
    }

    .dropdown-menu{
      padding: 15px;
      
    }


.custom-heading {
    color: #001D3D;
    font-size: 20px;
 
    font-weight:  bolder;
    
  }

  .navbar{
    background-color: white;
  }

  .stlabel{
    padding-top: 30px;
    padding-bottom: 30px;
    font-weight: bold;
    color: #001D3D;
  }

  .dslabel2{
    color: #001D3D;
    font-size: 20px;
 
    font-weight:  bolder;
  }
  
  </style>
<body>

<div class="main">
  <h2 class="dblabel">Dashboard</h2>
  <div class="container" style="text-align: center">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
        <img src="../wrp-assets/community.png" class="avatar" style="position: absolute; top: 10px; left: 10px; margin-right: 10px; margin-bottom: 10px;">
        <div class="col-md-12 custom-heading text-center ml-4 mt-4">
          <h2 class="dslabel2">Total Residents</h2>
        </div>
        <h2>
          <?php
          $sql = "SELECT COUNT(email) FROM table_residents group by email";
          $query = $conn->query($sql);
          $rows = mysqli_num_rows($query);
          echo $rows;
          ?>
        </h2>
        <br><br>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
        <div class="col-md-12 custom-heading text-center ml-4 mt-4">
          <h2 class="dslabel2">Total Admin</h2>
        </div>
        <img src="../wrp-assets/admin1.png" class="avatar" style="position: absolute; top: 10px; left: 10px; margin-right: 10px; margin-bottom: 10px;">
        <h2>
          <?php
          $sql = "SELECT COUNT(email) FROM table_admin group by email";
          $query = $conn->query($sql);
          $rows = mysqli_num_rows($query);
          echo $rows;
          ?>
        </h2>
        <br><br>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-10 mt-3 ml-3 border border-white bg-white" style="height: 200px; border-radius: 20px;">
        <div class="col-md-12 custom-heading text-center ml-4 mt-4">
          <h2 class="dslabel2">Today's payment</h2>
        </div>
        <img src="../wrp-assets/wallet.png" style="position: absolute; top: 10px; left: 10px; margin-right: 10px; margin-bottom: 10px; width: 95px; height: 95px;">
        <h2>
          <?php
          $sql = "SELECT sum(price) as amount FROM table_documentrequest WHERE status ='Payment Approved' OR status ='Paid'";
          $result = $conn->query($sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '₱' . $row['amount'];
          }
          ?>
        </h2>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
        <div class="col-md-12 custom-heading text-center ml-4 mt-4">
          <h2 class="dslabel2">Month's payment</h2>
        </div>
        <img src="../wrp-assets/profit.png" style="position: absolute; top: 10px; left: 10px; margin-right: 10px; margin-bottom: 10px; width: 95px; height: 95px;">
        <h2>
          <?php
          $sql = "SELECT sum(price) as amount FROM table_documentrequest WHERE status = 'Payment Approved' OR status ='Paid'";
          $result = $conn->query($sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '₱' . $row['amount'];
          }
          ?>
        </h2>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
        <div class="col">
          <div class="col-md-12 custom-heading text-center ml-4 mt-4">
            <h2 class="dslabel2">Total Transaction</h2>
          </div>
          <img src="../wrp-assets/transaction.png" style="position: absolute; top: 10px; left: 10px; margin-right: 10px; margin-bottom: 10px; width: 95px; height: 95px;">
          <h2>
            <?php
            $q = "SELECT * FROM table_documentrequest WHERE status='Payment Approved'";
            $res = mysqli_query($conn, $q);
            echo mysqli_num_rows($res);
            ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <h2></h2>
      <h2 class="stlabel" style="text-align: left;">Service Tendered Percentage</h2>
      <div id="piechart" style="width: 100%; height: 400px;"></div>
      <?php
      $query = "SELECT category, count(*) as number FROM table_documentrequest WHERE status ='Payment Approved' GROUP BY category";
      $result = mysqli_query($conn, $query);
      ?>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            <?php
            while ($row = mysqli_fetch_array($result)) {
              echo "['" . $row["category"] . "', " . $row["number"] . "],";
            }
            ?>
          ]);
          var options = {
            // is3D: true,
            pieHole: 0.2
          };
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }
      </script>
    </div>
  </div>
</div>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
} 
 ?>