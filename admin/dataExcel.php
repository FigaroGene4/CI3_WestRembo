<?php require 'db_conn.php'; ?>


<h1>Resident Information</h1>
<table border = 1>

  <tr>
    <td>#</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>Birthdate</td>
    <td> Gender</td>
    <td>House Number</td>
    <td>Street Number</td>
    <td>Sitio</td>
    <td>Contact Number</td>
    <td>Status</td>
    
    
  </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM table_residents");
  foreach($rows as $row) :
  ?>
  <tr>
    <td> <?php echo $i++; ?> </td>
    <td> <?php echo $row["firstName"]; ?> </td>
    <td> <?php echo $row["lastName"]; ?> </td>
    <td> <?php echo $row["email"]; ?> </td>
    <td> <?php echo $row["birthdate"]; ?> </td>
    <td> <?php echo $row["gender"]; ?> </td>
    <td> <?php echo $row["houseNumber"]; ?> </td>
    <td> <?php echo $row["streetNumber"]; ?> </td>
    <td> <?php echo $row["sitio"]; ?> </td>
    <td> <?php echo $row["contactNumber"]; ?> </td>
    <td> <?php echo $row["status"]; ?> </td>
    
  </tr>
  <?php endforeach; ?>
</table>
<br><br>






<h1>Document Requests</h1>

<table border = 1>
  <tr>
    <td>#</td>
    <td>Transaction Number</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>Reason</td>
    <td>Price</td>
    <td>Category</td>
    <td>Status</td>
    <td>Birthplace</td>
    <td>Period</td>
    <td>Voter</td>
    <td>House Owner</td>
    <td>Relation</td>
    <td>Date of Schedule</td>
    <td>Rating</td>
    <td>Review</td>
    <td>Sentiment</td>
    

    
    
  </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM table_documentrequest");
  foreach($rows as $row) :
  ?>
  <tr>
    <td> <?php echo $i++; ?> </td>
    
    <td> <?php echo $row["transactionNumber"]; ?> </td>
    <td> <?php echo $row["firstName"]; ?> </td>
    <td> <?php echo $row["lastName"]; ?> </td>
    <td> <?php echo $row["email"]; ?> </td>
    <td> <?php echo $row["reason"]; ?> </td>
    <td> <?php echo $row["price"]; ?> </td>
    <td> <?php echo $row["category"]; ?> </td>
    <td> <?php echo $row["status"]; ?> </td>
    <td> <?php echo $row["birthplace"]; ?> </td>
    <td> <?php echo $row["period"]; ?> </td>
    <td> <?php echo $row["voter"]; ?> </td>
    <td> <?php echo $row["owner"]; ?> </td>
    <td> <?php echo $row["relation"]; ?> </td>
    <td> <?php echo $row["dateOfSched"]; ?> </td>
    <td> <?php echo $row["rate"]; ?> </td>
    <td> <?php echo $row["review"]; ?> </td>
    <td> <?php echo $row["sentiment"]; ?> </td>

  </tr>
  <?php endforeach; ?>
</table>








<h1>Resident Feedback</h1>
<table border = 1>
  <tr>
    <td>#</td>
    <td>Transaction Number</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>Rating</td>
    <td>Review</td>
    <td>Sentiment</td>
    

    
    
  </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM table_documentrequest");
  foreach($rows as $row) :
  ?>
  <tr>
    <td> <?php echo $i++; ?> </td>
    
    <td> <?php echo $row["transactionNumber"]; ?> </td>
    <td> <?php echo $row["firstName"]; ?> </td>
    <td> <?php echo $row["lastName"]; ?> </td>
    <td> <?php echo $row["email"]; ?> </td>
    <td> <?php echo $row["rate"]; ?> </td>
    <td> <?php echo $row["review"]; ?> </td>
    <td> <?php echo $row["sentiment"]; ?> </td>

  </tr>
  <?php endforeach; ?>
</table>
