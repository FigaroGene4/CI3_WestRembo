<?php
	session_start();
	include_once('connection.php');

	
		
		$transactionNumber = $_GET['transactionNumber'];
       
		$true = 'true';


		$sql1 = "UPDATE table_book SET  status ='Refunded', newStatus= 'Refunded' where transactionNumber = '$transactionNumber'";

        if($conn->query($sql1)){
			$_SESSION['success'] = 'Client payment accepted successfully';
		}

		$sql = "UPDATE table_book SET paid = '$true' where transactionNumber = '$transactionNumber'";
		//use for MySQLi OOP
		if($conn->query($sql)){
				$_SESSION['success'] = 'Client payments accepted successfully for transaction number:' . $transactionNumber  ;
		}
	
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	

	header('location: refund.php');

?>