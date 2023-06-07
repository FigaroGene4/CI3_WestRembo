<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
 include ("db_conn.php"); 

 ?>

<?php
	
	include_once('connection.php');

	if(isset($_POST['signup'])){
		$sql = "SELECT * FROM table_admin";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
      $dpt = $_POST['dpt'];
        $password2 = $_POST['password2'];

        $con = mysqli_connect('localhost', 'root', '', 'db_westrembo');

        if($password !== $password2){
            $_SESSION['passworderror'] = "Confirm password not matched!";
            
            
        }

      if ($password == $password2) {



        $email_check = "SELECT * FROM table_admin WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if (mysqli_num_rows($res) > 0) {
          $_SESSION['email_check'] = "Email that you have entered is already exist!";
        } else {
          $sql = "INSERT INTO table_admin (email, password, name, dept )
		 VALUES ('$email', '$password', '$name' ,'$dpt')";
          $_SESSION['success'] = 'Admin credentials added successfully';

        }
      }

		if($con->query($sql)){
			
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}

	
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

<div class="sidebar">
            <br><br><br>
            <a href="client.php ">Client</a>
            <a href="artist.php">Artist</a>
            <a href="booking.php">Booking</a>
            <a href="payment.php">Payment</a>
            <a href="service.php">Services</a>
            <a href="report.php">Report</a>
            <a href="Blog.php">Blog</a>
        </div>



<div class="container main">
<br><br><br><br><br>
<div class="form-group">
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