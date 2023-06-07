<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){

        
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