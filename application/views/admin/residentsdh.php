<?php
session_start();



?>
 <?php include 'includes2/header-admin.php';
 include_once('db_conn.php');
 ?>
 
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

  th {
    background-color: #001D3D; 
}


  </style>

</head>

<body>

  <div class="main"><br><br><br>
    <div class="container">

      
      <?php
      
        include_once('db_conn.php');
        $email = $_GET['email'];
        
        $sql = "SELECT * FROM table_documentrequest WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);



        echo '<table class="table table-striped">
      <thead>
        <tr>
          
          <th scope="col">Transaction Number</th>
          <th scope="col">Type</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead><tbody>';

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {


            echo '
              <tr>
                
                <td>' . $row['transactionNumber'] . '</td>
                <td>' . $row['category'] . '</td>
                <td>' . $row['status'] . '</td>';

            if ($row['status'] == 'Payment Approved') {
              echo '<td><a class="btn btn-primary" href="printdocument.php?transactionNumber=' . $row['transactionNumber'] .'&category='.$row['category'].  '" role="button">Print</a>
                
                </td>
                </tr>
                
                ';
            } else {
              echo '<td><button type="button" class="btn btn-primary" disabled>Print</button>
                
              </td>
              </tr>

              ';
            }
          }
        } else {
          echo "0 results";
        }

        mysqli_close($conn);


      ?>








      </tbody>
      </table>
    </div>


  </div>



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