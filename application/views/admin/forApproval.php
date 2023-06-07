<?php
session_start();



?>
 <?php include 'includes2/header-admin.php';?>
<!DOCTYPE html>
<html>

<head>
  <title>Residents</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logo.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    .height10 {
      height: 10px;
    }

    .mtop10 {
      margin-top: 10px;
    }

    .modal-label {
      position: relative;
      top: 7px
    }
    .sidebar {
    width: 250px; 
    padding: 20px; 
  }

  .sidebar a {
    display: block;
    margin-bottom: 10px; 
    text-decoration: none;
    color: #000;
    font-size: 16px;
    line-height: 1.5;
  }
  </style>

</head>

<body>



  <div class="main">

    <div class="container">
      <br><br><br>
      <h1 class="page-header text-center">Residents' Information</h1>

      <header style="text-align: center;"> </header>

      <br><br>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-2">
          <div class="row">
            <?php
            if (isset($_SESSION['error'])) {
              echo
              "
                  <div class='alert alert-danger text-center'>
                      <button class='close'>&times;</button>
                      " . $_SESSION['error'] . "
                  </div>
                  ";
              unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
              echo
              "
                  <div class='alert alert-success text-center'>
                      <button class='close'>&times;</button>
                      " . $_SESSION['success'] . "
                  </div>
                  ";
              unset($_SESSION['success']);
            }
            ?>
          </div><style>
            .buttonz {
    width:60px;
    height:30px;
    vertical-align: top;
}
          </style>

<div class="container ">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="residents.php">Verified Residents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="paymentAccepted.php">For Approval</a>
                    </li>
                   
                </ul>
                <div class="row">
                    <div class="col-12">  

          <div class="height10">
          </div>
          <div class="row" ;>
            <table id="myTable" class="table text-center table-bordered table-striped ">
              <thead>

                
              <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">First name</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Last name</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Email</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Contact Number</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">House Number</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Street</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Sitio</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Status</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Date joined</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Validation Requirement</th>
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Action</th>

             
              </thead>
              <tbody>
                <?php


                include_once('db_conn.php');
                $sql = "SELECT * FROM table_residents WHERE validationT = 'For Approval'";


                //use for MySQLi-OOP
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                  $ddate = $row['dateRegistered'];
                  $newDate = date("F d, Y", strtotime($ddate));
                  echo
                  "<tr>
                                  
                                  <td>" . $row['firstName'] . "</td>
                                  <td>" . $row['lastName'] . "</td>
                                  <td>" . $row['email'] . "</td>
                <td>0" . $row['contactNumber'] . "</td>
                <td>" . $row['houseNumber'] . "</td>
                <td>" . $row['streetNumber'] . "</td>
                <td>" . $row['sitio'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>" . $row['code'] . "</td>
                
                <td>" . $newDate . "</td>
                <td> <img src='../Client/imagesOfValidation/".$row['imageValidaton']."'width='500px' >"."</td>
                
                                  <td>
                                      <a href='#accept_" . $row['id'] . "' class='btn btn-info btn-sm buttonz' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Accept</a>
                                      <a href='#decline_" . $row['id'] . "' class='btn btn-danger btn-sm buttonz' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Decline</a>
                                  </td>
                              </tr>";
                  include('edit_delete_modal.php');
                }
                /////////////////

                //use for MySQLi Procedural
                // $query = mysqli_query($conn, $sql);
                // while($row = mysqli_fetch_assoc($query)){
                // 	echo
                // 	"<tr>
                // 		<td>".$row['id']."</td>
                // 		<td>".$row['firstname']."</td>
                // 		<td>".$row['lastname']."</td>
                // 		<td>".$row['address']."</td>
                // 		<td>
                // 			<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                // 			<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                // 		</td>
                // 	</tr>";
                // 	include('edit_delete_modal.php');
                // }
                /////////////////

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div style="text-align:center">
      <a href="#addnew" data-toggle="modal" class="btn btn-primary" style="width: 200px;"><span class="glyphicon glyphicon-plus"></span> Add Residents</a>
      <br><br><br><br>
    </div>
  </div>
  <?php include('add_modal.php') ?>

  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTable.bootstrap.min.js"></script>
  <!-- generate datatable on our table -->
  <script>
    $(document).ready(function() {
      //inialize datatable
      $('#myTable').DataTable();

      //hide alert
      $(document).on('click', '.close', function() {
        $('.alert').hide();
      })
    });
  </script>
</body>













</body>

</html>