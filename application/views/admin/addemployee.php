<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['adds'])){
		
		$firstNameEmployee = $_POST['firstNameEmployee'];
		$lastNameEmployee = $_POST['lastNameEmployee'];
		$usernameEmployee = $_POST['usernameEmployee'];
		$contactNumberEmployee = $_POST['contactNumberEmployee'];
		$emailEmployee = $_POST['emailEmployee'];
		$passwordEmployee = $_POST['passwordEmployee'];
		$addressEmployee = $_POST['addressEmployee'];
		$birthdateEmployee = $_POST['birthdateEmployee'];
		$genderEmployee = $_POST['genderEmployee'];
		$joinDateEmployee = $_POST['joinDateEmployee'];
        $serviceOffered = $_POST['serviceOffered'];

		$sql = "INSERT INTO table_employee (firstNameEmployee, lastNameEmployee, usernameEmployee,
		 contactNumberEmployee, emailEmployee, passwordEmployee, addressEmployee, birthdateEmployee, genderEmployee, joinDateEmployee, serviceOffered)
		 VALUES ('$firstNameEmployee', '$lastNameEmployee', '$usernameEmployee', '$contactNumberEmployee',
		'$emailEmployee','$passwordEmployee','$addressEmployee', '$birthdateEmployee', '$genderEmployee', '$joinDateEmployee' , '$serviceOffered')";

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

	header('location: artist.php');
?>