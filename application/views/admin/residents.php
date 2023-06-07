<?php
session_start();



?>
 <?php include 'includes2/header-admin.php';?>
<!DOCTYPE html>
<html>

<head>
  <title>Residents Information</title>



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
 .main{
    margin-left: 250px;
    transition: all 0.3s ease;
    background-color: #f0f0f0;
  }

    
.custom-heading {
  font-size: 30px;
  color: #001D3D;
  padding-top: 50px;
  
}

  .nav-item {
  background-color: #ffff;


}


.custom-tab{
  font-size: 15px;
  color: #001D3D;
}

.nav-link.active{
  font-weight: bold;
  background-color: #001D3D;


  /* Add any other custom styles for the active tab link */
}


.rs-btn {
  background-color: #001D3D;
  width: 100%;
  
  /* Additional custom styles */
}


  
  </style>

</head>

<body>

<div class="main">
    <div class="container">
      <br><br><br>
      <div class="row">
        <div class="col-md-6">
            <div class="column">
                <div class="head">
                    <h1 class="page-header text-left custom-heading">Residents' Information</h1>
                </div>
            </div>
    </div>
    <div class="col-md-6">
        <div class="add-residents" style="margin-top: 50px;">
        <a href="#addnew" data-toggle="modal" class="btn btn-add add-new" style="width: 130px; background-color: #001D3D; color: #ffff;">Add residents</a>

               
            </a>
          
        </div>
    </div>



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
          </div>
 

          <div class="container ">
                  <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="residents.php">Verified Residents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link custom-tab" href="forApproval.php">For Approval</a>
          </li>
        </ul>
          <div class="row">
              
                  <table id="myTable" class="table text-center table-bordered table-striped table-responsive">
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
                      <th style="background-color: #001D3D; color: #ffff; padding-bottom: 20px;">Action</th>

                    </thead>
                    <tbody>
                      <?php


                      include_once('db_conn.php');


                      $sql = "SELECT * FROM table_residents";


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
                                  
                                  <td>" . $newDate . "</td>
               
                
                                  <td>
                                  <a href='#edit_" . $row['id'] . "' class='btn btn-sm buttonz rs-btn' style='background-color: #FFC300; color: #001D3D; margin-bottom: 10px;' data-toggle='modal'>
                                      <span class='glyphicon glyphicon-edit'></span> View
                                  </a>
                                  <a href='residentsdh.php?email=" . $row['email'] . "' class='btn btn-sm buttonz rs-btn' style='background-color: #001D3D; color: #ffff; margin-bottom: 10px;'>
                                      <span class='glyphicon glyphicon-eye-open'></span> History
                                  </a>
                                  <a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm buttonz rs-btn' style='margin-bottom: 10px;' data-toggle='modal'>
                                      <span class='glyphicon glyphicon-trash'></span> Delete
                                  </a>
                              </td>
                              
                              </tr>";
                        include('edit_delete_modal.php');

                        
                      }

                    

                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <br>
          
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