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
          
             <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 250px; border-radius: 20px;">
             <h2 class="dslabel2">Today's payment</h2>
                <?php


                include_once('db_conn.php');
                date_default_timezone_set('Asia/Taipei');
                $dateNow = date('Y-m-d');
                $date = date('F d, Y | g:iA');
                $sql = "SELECT *  FROM table_documentrequest where datePaymentAccepted = '$date' AND status = 'Payment Approved'";

                echo $date;
                echo '<br>';


                echo '<br><img src="philippine-peso.png" alt="Avatar" width="20px">';


                $sql = "SELECT sum(price) as amount FROM table_documentrequest WHERE status ='Printed' AND dateOfSched = '$dateNow'";


                $result = $conn->query($sql);

                while ($row = mysqli_fetch_assoc($result)) {

                  $price = $row['amount'];


                  


                  echo "Today's system earnings:<strong> ₱" . $price . "</strong>";
                }
                ?>
                <table style="width:80%">
                  <tr>
                    <th>New Residents:</th>
                    
                    <td><?php
                        $dateNow = date('Y-m-d');
                        $q = "SELECT * FROM table_residents WHERE dateRegistered='$dateNow' ";
                        $res = mysqli_query($conn, $q);
                        echo mysqli_num_rows($res);
                        if (mysqli_num_rows($res) == 1){
                          echo " New Resident";
                        }
                        else{
                          echo " New Residents";
                        }
                        

                        ?> </td>

                        
                  </tr>
                  
                  <tr>
                    <th>Transactions:</th>
                    
                    <td><?php
                        $dateNow = date('Y-m-d');
                        $q = "SELECT * FROM table_documentrequest WHERE dateOfSched ='$dateNow' ";
                        $res = mysqli_query($conn, $q);
                        echo mysqli_num_rows($res);
                        

                        
                        if (mysqli_num_rows($res) == 1){
                          echo " Transaction";
                        }
                        else{
                          echo " Transactions";
                        }
                        

                        ?> </td>

                        
                  </tr> 
                </table>
          

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 250px; border-radius: 20px;">
                <h2 class="dslabel2">Monthly reports</h2>

                    <?php
                    include_once('db_conn.php');
                    date_default_timezone_set('Asia/Taipei');
                    $dateNow = date('Y-m-d');
                    $date = date('F');
                    $dateM = date('n');
                    

                    echo 'Month of ' . $date;
                    echo '<br>';

                    echo '<br><img src="philippine-peso.png" alt="Avatar" width="20px">';
                 

                    $sql = "SELECT sum(price) as amount FROM table_documentrequest WHERE status ='Printed' AND MONTH(dateOfSched) = '$dateM'";

                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "Month's system earnings:<strong> ₱" . $row['amount'] . "</strong>";
                      
                    }
                    ?>
                    <table style="width:50%">
                      <tr>
                        <th>New Residents:</th>
                        <td><?php
                            $dateNow = date('Y-m-d');
                            $month = date('m');
                            $q = "SELECT * FROM table_residents WHERE MONTH(dateRegistered)='$dateM' ";
                            $res = mysqli_query($conn, $q);
                            echo mysqli_num_rows($res);
                            echo " New Residents";
                            ?> </td>
                      </tr>
            </table>
       </div>






       <div class="col-lg-3 col-md-6 col-sm-10 mt-3 ml-3 border border-white bg-white" style="height: 250px; border-radius: 20px;">
          <h2 class="dslabel2">Search for specific date</h2>
          <form action="" method="POST">
            
            <input id="datepicker" width="250" name="datepicker" required placeholder="Select your preffered date" />
            <script>
              $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',



              });
            </script>
<br><br>



















        
            <input class="btn btn-primary" type="submit" name="report" value="Search Report"  data-toggle="modal" data-target="#exampleModal">
            </form>

            <?php 
          if(isset($_POST['report'])){

            $getDate = $_POST['datepicker'];
            $newDate = date('Y-m-d', strtotime($getDate));
            $Fdate = date('F d, Y', strtotime($getDate));

            $sql = "SELECT *  FROM table_documentrequest where datePaymentAccepted = '$date' AND status = 'Payment Approved'";

                
               


              

                $sql = "SELECT sum(price) as amount FROM table_documentrequest WHERE status ='Printed' AND dateOfSched = '$newDate'";


                $result = $conn->query($sql);

                while ($row = mysqli_fetch_assoc($result)) {

                  $price = $row['amount'];


                  


                  echo $Fdate ;
                  if ($price == 0 ){
                    echo ' | No earnings';
                  }
                  else{
                    echo ' | <img src="philippine-peso.png" alt="Avatar" width="20px">';

                    echo "  <strong> ₱" . $price . "</strong>";
                  }
                }
                ?>
                <table style="width:100%">
                  <tr>
                    <th>New Residents:</th>
                    
                    <td><?php
                        $dateNow = date('Y-m-d');
                        $q = "SELECT * FROM table_residents WHERE dateRegistered='$newDate' ";
                        $res = mysqli_query($conn, $q);
                        echo mysqli_num_rows($res);
                        if (mysqli_num_rows($res) == 1){
                          echo " New Resident";
                        }
                        else{
                          echo " New Residents";
                        }
                        

                        ?> </td>

                        
                  </tr>
                  
                  <tr>
                    <th>Transactions:</th>
                    
                    <td><?php
                        
                        $q = "SELECT * FROM table_documentrequest WHERE dateOfSched ='$newDate' ";
                        $res = mysqli_query($conn, $q);
                        echo mysqli_num_rows($res);
                        

                        
                        if (mysqli_num_rows($res) == 1){
                          echo " Transaction";
                        }
                        else{
                          echo " Transactions";
                        }
                        
                      }
                        ?> </td>

                        
                  </tr> 
                </table>
          

          
         
          
       </div>
               
          
          <div class="col-lg-4 col-md-6 col-sm-12 border border-white m-3 bg-white" style="height: 200px; border-radius: 20px;"><br>
                <h2 class="dslabel2">Back up Records</h2>
                <div class="container">
              <h6>Download all records from the system</h6>

             
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

<script>
  $('#myForm').on('submit', function(e){
  $('#exampleModal').modal('show');
  e.preventDefault();
});
</script>
