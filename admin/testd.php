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



  <h2 class="dblabel">&nbsp Dashboard</h2>
  <div class="container" style="text-align: center">

  <form action="createadmin.php" method="post">

    
        <h1>Sign Up New Admin Account</h1>

        <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">Use a unique email</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Department:</label>
    <select class="form-control form-control-lg" name="dpt">
      
  <option>Finance</option>
  <option>Residential Department</option>
  <option>News And Announcement</option>
  <option>All</option>

</select>
  </div>
 

  <div class="form-group">
    <label for="exampleInputEmail1">Password:</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Enter again the password:</label>
    <input type="password" name="password2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password again" required>
    
  </div>

  <button name="signup" type="submit" class="btn btn-primary">Create Admin Account</button>

  <br><br>


        <?php
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
            if(isset($_SESSION['username_check'])){
                echo
                "
                <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    ".$_SESSION['username_check']."
                </div>
                ";
                unset($_SESSION['username_check']);
            }

        if(isset($_SESSION['error'])){
                  echo
                  "
                  <div class='alert alert-danger text-center'>
                      <button class='close'>&times;</button>
                      ".$_SESSION['error']."
                  </div>
                  ";
                  unset($_SESSION['error']);
              }
              if(isset($_SESSION['error'])){
                  echo
                  "
                  <div class='alert alert-danger text-center'>
                      <button class='close'>&times;</button>
                      ".$_SESSION['error']."
                  </div>
                  ";
                  unset($_SESSION['error']);
              }
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

              
             

              
          ?>

        <?php
        $succes ='';
        echo $succes;
        ?>

        
       
    </form><form action="createadmin.php" method="post">

    
        <h1>Sign Up New Admin Account</h1>

        <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">Use a unique email</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Department:</label>
    <select class="form-control form-control-lg" name="dpt">
      
  <option>Finance</option>
  <option>Residential Department</option>
  <option>News And Announcement</option>
  <option>All</option>

</select>
  </div>
 

  <div class="form-group">
    <label for="exampleInputEmail1">Password:</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Enter again the password:</label>
    <input type="password" name="password2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password again" required>
    
  </div>

  <button name="signup" type="submit" class="btn btn-primary">Create Admin Account</button>

  <br><br>


        <?php
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
            if(isset($_SESSION['username_check'])){
                echo
                "
                <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    ".$_SESSION['username_check']."
                </div>
                ";
                unset($_SESSION['username_check']);
            }

        if(isset($_SESSION['error'])){
                  echo
                  "
                  <div class='alert alert-danger text-center'>
                      <button class='close'>&times;</button>
                      ".$_SESSION['error']."
                  </div>
                  ";
                  unset($_SESSION['error']);
              }
              if(isset($_SESSION['error'])){
                  echo
                  "
                  <div class='alert alert-danger text-center'>
                      <button class='close'>&times;</button>
                      ".$_SESSION['error']."
                  </div>
                  ";
                  unset($_SESSION['error']);
              }
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

              
             

              
          ?>

        <?php
        $succes ='';
        echo $succes;
        ?>

        
       
    </form>

 


    
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