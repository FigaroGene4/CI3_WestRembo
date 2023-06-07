<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id= $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		#$usernameEmployee = $_POST['usernameEmployee'];
		#$contactNumberEmployee = $_POST['contactNumberEmployee'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		#$addressEmployee = $_POST['addressEmployee'];
		#$birthdateEmployee = $_POST['birthdateEmployee'];
		#$genderEmployee = $_POST['genderEmployee'];
		#$joinDateEmployee = $_POST['joinDateEmployee'];
        #$serviceOffered = $_POST['serviceOffered'];
		

		$sql = "UPDATE table_artist SET firstname = '$firstname', lastname = '$lastname', email = '$email',
		password='$password'  WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: artist.php');

?>