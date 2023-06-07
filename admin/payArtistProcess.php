<?php
	session_start();
	include_once('connection.php');

	
		
		$transactionNumber = $_GET['transactionNumber'];
       
		$true = 'true';


		$sql1 = "UPDATE table_book SET  artistPaid ='Paid' where transactionNumber = '$transactionNumber'";

        if($conn->query($sql1)){
			$_SESSION['success'] = 'Client payment accepted successfully';
		}

		

	header('location: payartist.php');

?>