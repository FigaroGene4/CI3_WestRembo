<?php
session_start();
include_once('connection.php');

if (isset($_POST['submitbtn'])) {
    $id_client = $_POST['id'];
    $firstNameClient = $_POST['firstname'];
    $lastNameClient = $_POST['lastname'];
    $contactNumber = $_POST['contactnumber'];
  

	
    $stmt = $conn->prepare("UPDATE table_residents SET firstName = ?, lastName = ?, contactNumber = ? WHERE id = ?");


    $stmt->bind_param("ssss", $firstNameClient, $lastNameClient,$contactNumber, $id_client);

   
    $result = $stmt->execute();

	if (!$stmt->execute()) {
		$_SESSION['error'] = 'Error updating profile: ' . $stmt->error;
	} else {
		$_SESSION['success'] = 'Profile updated successfully';
	}
	

    $stmt->close();
} 

header('location: profile.php');
?>