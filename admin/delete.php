<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM table_residents WHERE id ='$id'";


                      //use for MySQLi-OOP
                      $query = $conn->query($sql);
                      while ($row = $query->fetch_assoc()) {
					$email = $row['email'];
					$subject = "Your registration has been declined";
                    $message = "In order for us to verify your account you must upload correct data and valid ID or certificate that will verify your information. You can try to register again using the same email.";
                    $sender = "From: westrembo.ph@gmail.com";
                    
					mail($email, $subject, $message, $sender); 

					  }


		$sql = "DELETE FROM table_residents WHERE id = '".$_GET["id"]."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
	}
		////////////////

		//use for MySQLi Procedural
		//if(mysqli_query($conn, $sql)){
			//$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: residents.php');
?>