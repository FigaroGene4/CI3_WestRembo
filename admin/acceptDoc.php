<?php

	session_start();
	include_once('connection.php');
	
	if(isset($_POST['approvedoc'])){
		$datepick = $_POST['datepick'];
		$newDate = date('Y-m-d', strtotime($datepick));
		
        
        $valid = 'verified';
		
        $sql = "UPDATE table_documentrequest SET status = 'For Payment', dateOfSched = '$newDate'  WHERE id = '".$_GET["id"]."'";
		

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Document Accepted successfully';

			$sql = "SELECT * FROM table_documentrequest WHERE id = '".$_GET["id"]."'";


                      //use for MySQLi-OOP
                      $query = $conn->query($sql);
                      while ($row = $query->fetch_assoc()) {

						$name = $row['firstName'] . ' '.  $row['lastName'];
					$email = $row['email'];
					$subject = "Document Request Accepted";
                    $message = "Hello, " .$name .". Your request of ".$row['category']. "has been accepted. Please proceed with the steps on the app.";
                    $sender = "From: westrembo.ph@gmail.com";
                    
					mail($email, $subject, $message, $sender); 

					  }
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

	header('location: docrequest.php');
?>