
<?php
session_start();

$email = $_SESSION['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_spa2go";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM table_book WHERE clientEmail ='$email' AND status= 'Accepted' OR status='Declined'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Notification: Booking " . $row["status"]. '!';
    }
} else {
 
    echo "Notification";
}

$conn->close();
?>