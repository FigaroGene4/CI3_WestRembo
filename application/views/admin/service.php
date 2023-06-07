<?php 
session_start();



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Client</title>
 
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logo.png">   
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
	</style>

</head>
<body>


 
<nav class="navbar navbar-light bg-light fixed-top ">
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
  </style>
        
            <a class="navbar-brand" href="home.php" style="padding-left: 10px;"> <img src="logowr.png" width="20px"> </a>
            <a class="navbar-brand">Hello, <?php echo $_SESSION['name']; ?></a>
            <a class="navbar-brand navbar-right .active   " href="createadmin.php" ></a>
            <a class="navbar-brand navbar-right  " href="changepassword.php" > </a>
            <a class="navbar-brand navbar-right  " href="logout.php" style= "margin-left: auto"></a>
            <div class="dropdown droptxt">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Admin Settings
  <span class="caret"></span></button>
  <ul class="dropdown-menu droptxt">
    <li><a href="createadmin.php">Create Admin Account</a></li>
    <li><a href="changepassword.php" >Reset Password</a></li>
    <div class="dropdown-divider"></div>
    <li><a href="logout.php" >Logout</a></li>
  </div>
  </ul>
</div>
</nav>

<div class="sidebar">
<br><br><br><br>

<a href="client.php ">Client</a>
<a href="artist.php">Artist</a>
<a href="booking.php">Booking</a>
<a href="payment.php">Payment</a>
<a href="service.php">Services</a>
<a href="report.php">Report</a>
<a href="Blog.php">Blog</a>
</div>
</div>

<br><br><br>

<div class="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

      <h1> Service Prices:</h1>


      





      </div>



    </div>

  </div>
 
</div>


<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
  //inialize datatable
  $('#myTable').DataTable();

  //hide alert
  $(document).on('click', '.close', function(){
      $('.alert').hide();
  })
});
</script>





          
        
  
   


   
   
</body>
</html>


