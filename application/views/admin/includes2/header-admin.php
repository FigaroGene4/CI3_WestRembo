
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>West Rembo</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    

    .sidebar a {
      display: block;
      margin-bottom: 10px;
      text-decoration: none;
      color: #000;
      font-size: 16px;
      line-height: 1.5;
    }

   
.custom-heading {
    color: #001D3D;
    font-size: 20px;
    padding: 10px;
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

 
  .navbar-custom{
    background-color: white;
  }
  </style>

    <!---navbar--->
<body>

<nav class="navbar navbar-custom fixed-top">
  


  <div class="logo">
    <img src="../wrp-assets/logo-removebg-preview.png" style="width: 220px; height: 85px; padding-left: 30px;">
  </div>

            <div class="dropdown droptxt" >
            <a class="navbar-brand" style="color: 001D3D;"><strong><?php echo $_SESSION['name']; ?></strong></a>

               <img src="../wrp-assets/user (2).png" alt="Admin Icon" class="btn-settings" data-toggle="dropdown">

  <span class="caret"></span></button>
  <ul class="dropdown-menu droptxt">

  <?php
  
  $email = $_SESSION['email'];
  if($email == 'westremboSU@app.com'){
    echo '<li><a href="createadmin.php">Create Admin Account</a></li>';
  }

  ?>
    
    <li><a href="createadmin.php"> Create admin</a></li>
    <div class="dropdown-divider" ></div>
    <li><a href="changepassword.php" >Reset Password</a></li>
    <div class="dropdown-divider"></div>
    <li><a href="logout.php" >Logout</a></li>
  </div>
  </ul>
</div>
</nav>


<div class="sidebar">
  <br><br><br><br>

  <a href="home.php" class="d-flex align-items-center"><img src="../wrp-assets/list.png" alt="Residents" class="me-2">Dashboard</a>
  <a href="residents.php" class="d-flex align-items-center"><img src="../wrp-assets/group.png" alt="Residents" class="me-2">Residents</a>
  <!--<a href="artist.php" class="d-flex align-items-center"><img src="path_to_your_icon/artist.png" alt="Artist" class="me-2">Artist</a> -->
  <a href="docrequest.php" class="d-flex align-items-center"><img src="../wrp-assets/google-docs.png" alt="Document Requests" class="me-2">Document Requests</a>
  <a href="payment.php" class="d-flex align-items-center"><img src="../wrp-assets/income.png" alt="Payment" class="me-2">Payment</a>
  <a href="Blog.php" class="d-flex align-items-center"><img src="../wrp-assets/megaphone.png" alt="Pricing" class="me-2">News and Announcement</a>
  <a href="report.php" class="d-flex align-items-center"><img src="../wrp-assets/bar-chart.png" alt="Reports" class="me-2">Reports</a>
  <!--<a href="refund.php" class="d-flex align-items-center"><img src="path_to_your_icon/refund.png" alt="Refund" class="me-2">Refund</a>
  <a href="payartist.php" class="d-flex align-items-center"><img src="path_to_your_icon/payartist.png" alt="Pay Artist" class="me-2">Pay Artist</a> -->

</div>


</body>
    <!---navbar--->
    