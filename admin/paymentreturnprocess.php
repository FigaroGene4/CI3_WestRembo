<?php
	session_start();
	include_once('connection.php');

	
		
		$transactionNumber = $_GET['transactionNumber'];
       
		$true = 'true';


		$sql1 = "UPDATE table_payment SET status = 'Refunded' where trackingNumber = '$transactionNumber'";

        if($conn->query($sql1)){
			$_SESSION['success'] = 'Client payment accepted successfully';
		}

		$sql = "UPDATE table_book SET newStatus = 'Refunded', status ='Refunded', refundComplaint ='Wrong amount'  where transactionNumber = '$transactionNumber'";
		//use for MySQLi OOP
		if($conn->query($sql)){
				$_SESSION['success'] = 'Client payments accepted successfully for transaction number:' . $transactionNumber  ;
		}
	
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	

	header('location: payment.php');

?>