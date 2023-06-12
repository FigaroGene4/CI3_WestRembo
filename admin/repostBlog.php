<?php


	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "UPDATE table_blog SET status = 'active' WHERE id = '".$_GET["id"]."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Blog Reposted successfully';
	}
		////////////////

		//use for MySQLi Procedural
		//if(mysqli_query($conn, $sql)){
			//$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting blog';
		}
	}
	else{
		$_SESSION['error'] = 'Select blog to delete first';
	}

	header('location: blog.php');
?>


