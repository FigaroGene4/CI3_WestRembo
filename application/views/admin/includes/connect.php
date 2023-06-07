<?php
$hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kendriks_db";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	echo "";
?>