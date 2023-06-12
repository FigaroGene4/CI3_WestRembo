<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM table_residents WHERE id ='$id'";


                      //use for MySQLi-OOP
                      $query = $conn->query($sql);
                      while ($row = $query->fetch_assoc()) {

						$name = $row['firstName'] . ' '.  $row['lastName'];
					$email = $row['email'];
					$subject = "Successfuly registered";
                    $message = "Hello, " .$name .". You have successfuly registered to the West Rembo App.";
                    $sender = "From: westrembo.ph@gmail.com";
                    
					mail($email, $subject, $message, $sender); 

					  }

        
        $valid = 'verified';
        $sql = "UPDATE table_residents SET validationT = '$valid' WHERE id = '".$_GET["id"]."'";
		

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Resident Accepted successfully';
	}
		////////////////

		//use for MySQLi Procedural
		//if(mysqli_query($conn, $sql)){
			//$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong ';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to accept first';
	}

	header('location: residents.php');
?>