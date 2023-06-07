<?php
session_start();
include_once('connection.php');



$transactionNumber = $_GET['transactionNumber'];

$true = 'true';
$date = date('Y-m-d');

$_POST['startdate'] = date('Y-m-d');
    $_POST['numberofdays'] = 2;

    $d = new DateTime( $_POST['startdate'] );
    $t = $d->getTimestamp();

    // loop for X days
    for($i=0; $i<$_POST['numberofdays']; $i++){

        // add 1 day to timestamp
        $addDay = 86400;

        // get what day it is next day
        $nextDay = date('w', ($t+$addDay));

        // if it's Saturday or Sunday get $i-1
        if($nextDay == 0 || $nextDay == 6) {
            $i--;
        }

        // modify timestamp, add 1 day
        $t = $t+$addDay;
    }

    $d->setTimestamp($t);

    $dateSched =  $d->format( 'Y-m-d' ). "\n";

$sql1 = "UPDATE table_documentrequest SET status= 'Payment Approved', datePaymentAccepted = '$date', dateOfSched ='$dateSched' where transactionNumber = '$transactionNumber'";

if ($conn->query($sql1)) {
	$_SESSION['success'] = 'Client payment accepted successfully';
} else {
	$_SESSION['error'] = 'Something went wrong in updating member';
}


header('location: payment.php');
