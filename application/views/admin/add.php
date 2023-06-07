<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$contactNumber = $_POST['contactNumber'];
		
		$password = $_POST['password'];
		$houseNumber = $_POST['houseNumber'];
		$streetNumber = $_POST['streetNumber'];
		$sitio = $_POST['sitio'];
		$dateRegistered = date('Y-m-d H:i:s');
		$status = 'verified';
		$code = null;
		$image = 'image';

		$sql = "INSERT INTO table_residents (firstName, lastName, email, password, houseNumber, streetNumber, sitio, contactNumber, status, code, dateRegistered)
		 VALUES ('$firstName', '$lastName', '$email', '$password','$houseNumber','$streetNumber', '$sitio', '$contactNumber', '$status', '$code',  '$dateRegistered')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }		
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: residents.php');
?>