<?php
	include("connect_db/connect.php");

	$result = mysqli_query($conn,'SELECT COUNT(orderid) AS value_sum FROM orderform');
	$row = mysqli_fetch_assoc($result);
	$sum = $row['value_sum'];
	echo $sum;
?>