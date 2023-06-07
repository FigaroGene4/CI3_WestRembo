<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
 include ("db_conn.php"); 

 ?>


 
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
  <link rel="icon" type="image/x-icon" href="logo.png">   
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

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

<div class="sidenav">

  <a href="client.php ">Client</a>
  <a href="artist.php">Artist</a>
  <a href="booking.php">Booking</a>
  <a href="service.php">Services</a>
  <a href="report.php">Report</a>
</div>

<div class="main">

<div class="container">
<br><br><br><br><br>

    <?php

include_once('connection.php');


if(isset($_POST['reset'])){
   
    
    $passwordreset = $_POST['passwordreset'];
    $passwordreset2 = $_POST['passwordreset2'];
    $email = $_SESSION['email'];
 
    if($passwordreset == $passwordreset2){
        $sql = "UPDATE table_admin SET password = '$passwordreset' WHERE email = '$email'";
        $conn->query($sql);

        $_SESSION['success'] = 'Password updated successfully';
       
        
        
    }
    
    if($passwordreset !== $passwordreset2){
    $_SESSION['passworderror'] = "Confirm password not matched!";
    }
    		

    
    
    
    
    else{
        $_SESSION['error'] = 'Something went wrong in updating member';
    }
}
else{
    $_SESSION['error'] = 'Select member to edit first';
}

    ?>
<div class="container main">

<div class="form-group">
<h1>Change password for <?php echo $_SESSION['email'];?></h1>
       

    <form action="changepassword.php" method="post">

    <div class="form-group">
    <label for="exampleInputEmail1">New password:</label>
    <input type="password" name="passwordreset" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name" required>
    
  </div>

  <form action="changepassword.php" method="post">

    <div class="form-group">
    <label for="exampleInputEmail1">Enter again:</label>
    <input type="password" name="passwordreset2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name" required>
    
  </div>

  <button  name='reset' type="submit" class="btn btn-primary">Reset Password</button>

  
  </form>
    
</div>
</div>

           
        

        <?php
         if(isset($_SESSION['passworderror'])){
            echo
            "
            <div class='alert alert-danger text-center'>
                <button class='close'>&times;</button>
                ".$_SESSION['passworderror']."
            </div>
            ";
            unset($_SESSION['passworderror']);
        }
            if(isset($_SESSION['success'])){
                echo
                "
                <div class='alert alert-success text-center'>
                    <button class='close'>&times;</button>
                    ".$_SESSION['success']."
                </div>
                ";
                unset($_SESSION['success']);
            }
            ?>

   
  


</div>


            
          
    
     


     
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
} 
 ?>