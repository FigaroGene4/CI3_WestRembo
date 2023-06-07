<?php
	include_once ("connect.php");
	if ($conn ->connect_errno) {
		echo "Failed to connect to MySQL: " . $conn->connect_error;
			exit();
	} else {
		$sql = "SELECT * FROM product_info";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				$sessionProdID = $_SESSION['pnumber'];
				$sessionProdName = $_SESSION['pname'];
				$sessionProdPrice = $_SESSION['pprice'];
				$sessionProdStock = $_SESSION['pstock'];
				$sessionProdCategory = $_SESSION['category'];
				$sessionProdDescription = $_SESSION['description'];
				$sessionProdImage = $_SESSION['image'];
			}
		}
	}
	if ($conn ->connect_errno) {
		echo "Failed to connect to MySQL: " . $conn->connect_error;
			exit();
	} else {
		$sql = "SELECT * FROM info";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				$sessionCustomerID = $_SESSION['id'];
				$sessionCustomerName = $_SESSION['name'];
			}
		}
	}    
?>