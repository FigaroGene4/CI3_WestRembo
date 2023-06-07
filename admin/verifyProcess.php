<?php
	session_start();
	include_once('connection.php');

	
		
		$id = $_GET['id'];
       
		$true = 'true';


		$sql1 = "UPDATE table_artist SET  skillStatus ='verified' where id = '$id'";

        if($conn->query($sql1)){
			$_SESSION['success'] = 'Artist Verified accepted successfully';
		}

		
		
	

	header('location: artistVerification.php');

?>