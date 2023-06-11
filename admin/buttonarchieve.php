<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "UPDATE table_sentimentanalysis SET flag = 1 WHERE id = '".$_GET["id"]."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Feedback archieved successfully';
	}
		////////////////

		//use for MySQLi Procedural
		//if(mysqli_query($conn, $sql)){
			//$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in acrchieving feedback';
		}
	}
	else{
		$_SESSION['error'] = 'Select feedback to achieve to  first';
	}

	header('location: feedback.php');
?>