<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


<?php
ob_start();

use setasign\Fpdi\Fpdi;

session_start();

require('pdfmaker/fpdf.php');
require('fpdi/src/autoload.php"');
$transactionNumber = $_GET['transactionNumber'];
$category = $_GET['category'];

include_once('db_conn.php');

if ($category =='Baranggay Clearance' || $category =='Business Permit') {

    $sql = "SELECT * FROM table_documentrequest WHERE transactionNumber = '$transactionNumber'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $birthplace = $row['birthplace'];
            $period = $row['period'];
            $voter = $row['voter'];
            $owner = $row['owner'];
            $relation = $row['relation'];
        }
    }

    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            $houseNumber = $row['houseNumber'];
            $streetNumber = $row['streetNumber'];
            $sitio = $row['sitio'];
            $birthdate = $row['birthdate'];
            $bday =   date("M jS, Y", strtotime($birthdate));
        }
    }

    $dateToday = date("M jS, Y");

    $pdf = new Fpdi();
    // add a page
    $pdf->AddPage();
    // set the source file
    $pdf->setSourceFile("Barangay-Clearance.pdf");
    // import page 1
    $tplId = $pdf->importPage(1);
    // use the imported page and place it at point 10,10 with a width of 100 mm
    $pdf->useTemplate($tplId);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(155, 81);
    $pdf->Write(0, $dateToday); // For writing text

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(104, 149.7);
    $pdf->Write(0, $firstName . ' ' . $lastName); // For writing text

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(107, 154.8);
    $pdf->Write(0, $houseNumber . ' ' . $streetNumber . ',' . ' Sitio ' . $sitio . ', West Rembo, Makati City'); // For writing text


    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(115, 165.8);
    $pdf->Write(0, $bday); // For writing text



    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(115, 170.0);
    $pdf->Write(0, $birthplace); // For writing text

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(166, 176.0);
    $pdf->Write(0, $period); // For writing text

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(145, 181.0);
    $pdf->Write(0, $voter); // For writing text

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(116, 186.0);
    $pdf->Write(0, $owner); // For writing text


    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(135, 191.0);
    $pdf->Write(0, $relation); // For writing text



    $pdf->Output('I', $transactionNumber . '.pdf');

    $sql = "UPDATE table_documentrequest SET status = 'Printed' WHERE transactionNumber = '$transactionNumber'";
	$conn->query($sql);


} 

if($category == 'Baranggay ID') {

    $sql = "SELECT * FROM table_documentrequest WHERE transactionNumber = '$transactionNumber'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $birthplace = $row['birthplace'];
            $period = $row['period'];
            $voter = $row['voter'];
            $owner = $row['owner'];
            $relation = $row['relation'];
        }
    }

    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            $houseNumber = $row['houseNumber'];
            $streetNumber = $row['streetNumber'];
            $sitio = $row['sitio'];
            $birthdate = $row['birthdate'];
            $bday =   date("M jS, Y", strtotime($birthdate));
            $image = $row['image'];

            
        }
    }

    $dateToday = date("M jS, Y");

    $pdf = new FPDI('L','mm', array(86,60.6));
    // add a page
    $pdf->AddPage();
    // set the source file
    $pdf->setSourceFile("brgyID.pdf");
    // import page 1
    $tplId = $pdf->importPage(1);
    // use the imported page and place it at point 10,10 with a width of 100 mm
    $pdf->useTemplate($tplId);


    $pdf->Image('../images/' . $image , 5.5, 17.5, -980 , );

   

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(30, 26);
    $pdf->Write(0, $firstName . ' ' . $lastName); // For writing text

    $pdf->SetFont('Arial', 'B', 4);
    $pdf->SetXY(30, 31);
    $pdf->Write(0, $houseNumber . ' ' . $streetNumber . ',' . ' Sitio ' . $sitio . ', West Rembo, Makati City'); // For writing text


    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(30,36.6);
    $pdf->Write(0, $bday); // For writing text

    
    $pdf->AddPage(); 
$tplIdx2 = $pdf->importPage(2);
$pdf->useTemplate($tplIdx2); 
$pdf->SetAutoPageBreak(true, 5); # optional line




$sql = "UPDATE table_documentrequest SET status = 'Printed' WHERE transactionNumber = '$transactionNumber'";
$conn->query($sql);
    $pdf->Output('I', $transactionNumber . '.pdf');

    echo $category;
}


else{
    $sql = "SELECT * FROM table_documentrequest WHERE transactionNumber = '$transactionNumber'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['firstName'] . ' '. $row['lastName'];
            $category = $row['category'];
            $referenceNumber = $row['transactionNumber'];
            $email = $row['email'];

            $birthplace = $row['birthplace'];
            $period = $row['period'];
            $voter = $row['voter'];
            $owner = $row['owner'];
            $relation = $row['relation'];

            
            

        }
    }

    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $dob = $row['birthdate'];
            $address = $row['houseNumber'] . ' '. $row['streetNumber'] .' ' .$row['sitio'] ;
         

        }
    }
       
       






    
    $sql = "UPDATE table_documentrequest SET status = 'Printed' WHERE transactionNumber = '$transactionNumber'";
$conn->query($sql);

echo '<div class="container">
<h1>Request Information</h1>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Document Transaction Number: '.$transactionNumber.'</h5><hr>

    <h4><i class="card-text">Personal Info:</i></h4><br>
    <p class="card-text"><b>Name:</b> ' .$name.' </p>
    <p class="card-text"><b>Date of birth:</b>  '.$dob.' </p>
    <p class="card-text"><b>Address:</b>  '.$address.'</p><hr>
    <h4><i class="card-text">Requested Document:</i> '.$category.'</h4><br>

    <p class="card-text"><b>Birthplace:</b> ' .$birthplace.' </p>
    <p class="card-text"><b>Time of residency:</b>  '.$period.' </p>
    <p class="card-text"><b>Makati City Voter?:</b>  '.$voter.'</p>
    <p class="card-text"><b>Name of House Owner:</b>  '.$owner.'</p>
    <p class="card-text"><b>Relation to House Owner:</b>  '.$relation.'</p>

 
  </div>
</div><br>
<a href="residentsdh.php?email='.$email.'" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Return</a>
</div>

'

;


}