<?php
session_start();
include_once('connection.php');

if (isset($_GET['id'])) {
    $id_client = $_POST['id'];
    $firstNameClient = $_POST['firstName'];
    $lastNameClient = $_POST['lastName'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $birthdate = $_POST['birthdate'];
	$sitio = $_POST['sitio'];
	$street = $_POST['street'];
	$houseNumber =$_POST['houseNumber'];
	
    $stmt = $conn->prepare("UPDATE table_residents SET firstName = ?, lastName = ?, email = ?, contactNumber = ?, birthdate = ?, sitio =?, streetNumber = ?, houseNumber =? WHERE id = ?");


    $stmt->bind_param("sssssssss", $firstNameClient, $lastNameClient, $email, $contactNumber, $birthdate,$sitio,$street,$houseNumber,$id_client);

   
    $result = $stmt->execute();

	if (!$stmt->execute()) {
		$_SESSION['error'] = 'Error updating member: ' . $stmt->error;
	} else {
		$_SESSION['success'] = 'Member updated successfully';
	}
	

    $stmt->close();
} else {
    $_SESSION['error'] = 'Select member to edit first';
}

header('location: residents.php');
?>