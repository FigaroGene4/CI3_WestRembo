<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){


		$date = date("Y-m-d");
        
        $valid = 'verified';
        $sql = "UPDATE table_documentrequest SET status = 'For Payment', dateOfSched = '$date'  WHERE id = '".$_GET["id"]."'";
		

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

	header('location: docrequest.php');
?>