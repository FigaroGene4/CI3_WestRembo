<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logo.png">   
  <link rel="stylesheet" type="text/css" href="style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8"><meta charset="utf-8">

	<style> 
	
	.textarea {
    width: 200px;
	}

	.form {
    display: inline-block;
	}
</style>
</head>
<body>

<!--
	<br><br><br>

	<div class="container shadow text-center">

	<h2>SPA2GO ADMIN PAGE</h2>
	 <img src="logo.png" width="200px">

	 

	 <form class="form-horizontal form" action="login.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="uname">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control textarea " id="text"  name="uname" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control textarea" id="pwd" name="password" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
	
	 </div>

	 -->






	 
	 <div class="center">
      <h1> SPA2GO ADMIN</h1>
      <form method="post" action="login.php">
        <div class="txt_field">

          <input type="text" name="uname" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?></div>
        <input type="submit" value="Login">
        <div class="signup_link">
      
        </div>
      </form>
    </div>
	 
</body>
</html>