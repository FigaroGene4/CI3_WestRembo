<?php require 'db_conn.php'; ?>
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
