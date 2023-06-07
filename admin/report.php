<?php
session_start();



?>
 <?php include 'includes2/header-admin.php';?>

<!DOCTYPE html>
<html>

<head>
  <title>Client</title>


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

 

  .dslabel2{
    color: #001D3D;
    font-size: 20px;
    padding: 10px;
    font-weight:  bolder;
  }

  </style>

</head>

<body>


  <br><br>
  <div class="main">
  <br><br><br>
  <div class="container" style="text-align: center">
      <div class="row">
      
        <br><br><br>

        <div class="row">
          
             <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
             <h2 class="dslabel2">Today's payment</h2>
                <?php


                include_once('db_conn.php');
                date_default_timezone_set('Asia/Taipei');
                $dateNow = date('m/d/Y');
                $date = date('F d, Y | g:iA');
                $sql = "SELECT *  FROM table_documentrequest where datePaymentAccepted = '$date' AND status = 'Payment Approved'";

                echo $date;
                echo '<br>';


                echo '<br><img src="philippine-peso.png" alt="Avatar" width="20px">';


                $sql = "SELECT sum(price) as price FROM table_documentrequest WHERE status ='Payment Approved' AND datePaymentAccepted = '$dateNow'";

                $result = $conn->query($sql);

                while ($row = mysqli_fetch_assoc($result)) {





                  echo "Today's system earnings:<strong> ₱" . $row['price'] . "</strong>";
                }
                ?>
                <table style="width:50%">
                  <tr>
                    <th>New Clients:</th>
                    <td><?php
                        $dateNow = date('Y-m-d');
                        $q = "SELECT * FROM table_residents WHERE dateRegistered='$dateNow' ";
                        $res = mysqli_query($conn, $q);
                        echo mysqli_num_rows($res);
                        echo " New Clients";

                        ?> </td>
                  </tr>
                  
                </table>
          

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
                <h2 class="dslabel2">Monthly reports</h2>

                    <?php
                    include_once('db_conn.php');
                    date_default_timezone_set('Asia/Taipei');
                    $dateNow = date('m/d/Y');
                    $date = date('M');
                    $sql = "SELECT *  FROM table_documentRequest where datePaymentAccepted = '$date' AND status = 'Payment Approved'";

                    echo 'Month of ' . $date;
                    echo '<br>';

                    echo '<br><img src="philippine-peso.png" alt="Avatar" width="20px">';


                    $sql = "SELECT sum(price) as price FROM table_documentrequest WHERE status ='Payment Approved' AND datePaymentAccepted = '$dateNow'";

                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "Month's system earnings:<strong> ₱" . $row['price'] . "</strong>";
                    }
                    ?>
                    <table style="width:50%">
                      <tr>
                        <th>New Clients:</th>
                        <td><?php
                            $dateNow = date('Y-m-d');
                            $month = date('m');
                            $q = "SELECT * FROM table_residents WHERE dateRegistered='$dateNow' ";
                            $res = mysqli_query($conn, $q);
                            echo mysqli_num_rows($res);
                            echo " New Clients";
                            ?> </td>
                      </tr>
            </table>
       </div>

       <div class="col-lg-3 col-md-6 col-sm-10 mt-3 ml-3 border border-white bg-white" style="height: 200px; border-radius: 20px;">
          <h2 class="dslabel2">Search for specific date</h2>
          <form action="#" method="POST">
            <input id="datepicker" width="250" name="datepicker" required placeholder="Select your preffered date" />
            <script>
              $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',



              });
            </script>
            <br><br>
            <input class="btn btn-primary" type="submit" name="report" value="Search Report">



          </form>
                <?php

                if (isset($_POST['report'])) {

                  $date = $_POST['datepicker'];
                  echo '<div class="container">
                  <div class="row">';
                  echo '<div class="col-md-12">';
                  include_once('db_conn.php');
                  date_default_timezone_set('Asia/Taipei');
                  $newDate = date("F d, Y", strtotime($date));

                  $sql = "SELECT *  FROM table_documentrequest where datePaymentAccepted= '$date' AND status = 'Payment Approved'";
                  echo '<br><br>Date: ' . $newDate;
                  echo '<br>';

                  echo '<br><img src="philippine-peso.png" alt="Avatar" width="20px">';


                  $sql = "SELECT sum(price) as price FROM table_documentrequest WHERE status ='Payment Approved' AND datePaymentAccepted = '$date'";

                  $result = $conn->query($sql);

                  while ($row = mysqli_fetch_assoc($result)) {



                    if ($row['price'] > 0) {
                      echo "System  earnings:<strong> ₱" . $row['price'] . "</strong>";
                    } else {
                      echo 'No System Earnings!';
                    }



                    echo ' <table style="width:20%">
                    <tr>
                      <th>New Clients:</th>
                      <td>';

                    $newDatez = date("Y-m-d", strtotime($date));
                    $q = "SELECT * FROM table_residents WHERE dateRegistered='$newDatez' ";

                    $res = mysqli_query($conn, $q);
                    echo mysqli_num_rows($res);
                    echo " New Clients";

                    echo '</td>
                      </tr>
                      <tr>
                        <th>Pamper Artist:</th>
                        <td>';

                    $newDatez = date("Y-m-d", strtotime($date));
                    $q = "SELECT * FROM table_artist WHERE datejoined='$newDatez' ";
                    $res = mysqli_query($conn, $q);
                    echo mysqli_num_rows($res);
                    echo " New Pamper Artists";

                    echo '</td>
                    </tr>
                    <tr>
                      <th>Transactions:</th>
                      <td>';


                      $newDatez = date("m/d/Y", strtotime($date));
                    $q = "SELECT * from table_book where status='Service Complete' AND datebooking ='$newDatez'";
                    $res = mysqli_query($conn, $q);
                    echo mysqli_num_rows($res);
                    echo ' New transactions';
                  }

                  echo '</table></div></div></div>';





                include_once('db_conn.php');
                        $sql = "SELECT firstName, lastName FROM table_residents";
                        $result = mysqli_query($conn, $sql);
                        $data_array = array();
                        $firstname = 'firstname';
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                          $data_array[$row['firstName']] = $row['lastName'];
                          
                        }

                        print_r( $data_array);
                }
           ?>
          </div>

          
          <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;">
                <h2 class="dslabel2">Back up Records</h2>
                <div class="container">
              <h6>Residents Records</h6>

             
              <a href="export.php"><button class="btn btn-sm buttonz rs-btn" name="button" style="background-color: #001D3D; color: #ffff;">

    Export To Excel
  </button>
</a>
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

              </div?>
    



          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

          <br><br>
        </div>
      </div>
     
    </div>

  </div>

</body>

</html>