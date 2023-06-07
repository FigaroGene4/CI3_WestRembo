<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
	#	$id_client= $_POST['id_client'];
	#	$firstNameClient = $_POST['firstNameClient'];
	#	$lastNameClient = $_POST['lastNameClient'];
	#	$userNameClient = $_POST['userNameClient'];
	#	$contactNumberClient = $_POST['contactNumberClient'];
	#	$emailClient = $_POST['emailClient'];
	#	$passwordClient = $_POST['passwordClient'];
	#	$addressClient = $_POST['addressClient'];
	#	$birthdateClient = $_POST['birthdateClient'];
	#	$genderClient = $_POST['genderClient'];
	#	$joinDateClient = $_POST['joinDateClient'];

                $booking_id= $_POST['booking_id'];
                $client_id=$_POST['client_id'];
                $client_username=$_POST['client_username'];
                $artist_id=$_POST['artist_id'];
							$artist_username =$_POST['artist_username'];
								$service_offered =$_POST['service_offered'];
								$payment_method = $_POST['payment_method'];
								$client_address = $_POST['client_address'];
									$booking_date = $_POST['booking_date'];
									$status = $_POST['status'];
									$total_price = $_POST['total_price'];
		

		$sql = "UPDATE table_booking SET client_id = '$client_id', client_username = '$client_username', 
		artist_id = '$artist_id', artist_username ='$artist_username', service_offered = '$service_offered', payment_method = '$payment_method',
		client_address='$client_address', booking_date = '$booking_date', status = '$status', 
		total_price='$total_price'  WHERE booking_id = '$booking_id'";

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

	header('location: booking.php');

?>