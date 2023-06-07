<?php
	session_start();
	include_once('connection.php');

	
		
		$transactionNumber = $_GET['transactionNumber'];
       
	

		$sql1 = "UPDATE table_book SET status= 'Refunded' where transactionNumber = '$transactionNumber'";

        if($conn->query($sql1)){
			$_SESSION['success'] = 'Client payment declined';
		}

		
	

	header('location: payment.php');

?>