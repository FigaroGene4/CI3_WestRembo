<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id_client= $_POST['id'];
		$firstNameClient = $_POST['firstname'];
		$lastNameClient = $_POST['lastname'];
		$email = $_POST['email'];
		$contactNumber = $_POST['contactNumber'];
		$city = $_POST['city'];
		$addressDetails = $_POST['addressDetails'];
		$baranggay = $_POST['baranggay'];
		$postalCode = $_POST['postalCode'];
		$confirmationCode = $_POST['confirmationCode'];
			

		$sql = "UPDATE table_customer SET firstname = '$firstNameClient', lastname = '$lastNameClient',   email = '$email', contactnumber = '$contactNumber',
		city = '$city', addressDetails = '$addressDetails', baranggay = '$baranggay',
		postalCode = '$postalCode', code = '$confirmationCode'

		 WHERE id = '$id_client'";

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

	header('location: client.php');

?>