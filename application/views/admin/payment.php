<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include("db_conn.php");

?>
 <?php include 'includes2/header-admin.php';?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Home</title>

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



    </head>
    <style>
     
    </style>

    <body>
        <br><br><br><br><br>
        <div class="main">


            <div class="container ">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="payment.php">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paymentAccepted.php">Accepted</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paymentAccepted.php">Declined</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-12">




                    </div>


                    <div class="col-10">
                        <div class="height10">


                            <table id="myTable" class="table text-center table-striped">
                                <thead class="thead-dark">

                                    <th>Client Name</th>
                                    <th>Document ID</th>
                                    <th>Document Type </th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    
                                    
                                    <th>Action</th>


                                </thead>
                                <tbody>



                                    <?php


                                    include_once('db_conn.php');


                                    $sql = "SELECT * FROM table_documentrequest  WHERE status ='For Payment Approval'";


                                    //use for MySQLi-OOP
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        if ($row == false) {

                                            echo "<h1>" . 'No pending payments yet' . "</h1>";
                                        }
                                        
                                        else{


                                        $ddate = $row['date'];
                                        $newDate = date("F d, Y", strtotime($ddate));
                                            echo
                                                "<tr>
                        
                            <td>" . $row['firstName'] . ' ' . $row['lastName'] . "</td>
                            
                            <td>" . $row['transactionNumber'] . "  </td>
                            <td>" . $row['category'] . "</td>
                            <td>₱" . $row['price'] . "</td>
                            <td>" . $newDate . "</td>";
                            
                            
                                        $status = $row['status'];
                                        $_SESSION_['id'] = $row['id'];
                                        
                                        if ($status == 'For Payment Approval' ) {
                                            echo "   <td>
                                <a href='#edit_" . $row['id'] . "' class='btn btn-info btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Accept</a>
                                <a href='#delete_".$row['id']."' class='btn btn-danger btn-sm buttonz' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span>Return</a>
                            </td>
    </tr>";
                                        } else {
                                            echo "   <td>
                        <a href='#edit_" . $row['id'] . "' class='btn btn-info btn-sm  disabled' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Accept</a>
                        <a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm  disabled' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Return</a>
                    </td>
</tr>";
                                        }
                                        include('paymentModal.php');
                                    }}
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


                                    </tr>


                                </tbody>
                            </table>
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo
                                "
                  <div class='alert alert-danger text-center'>
                      
                      " . $_SESSION['error'] . "
                  </div>
                  ";
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) {
                                echo
                                "
                  <div class='alert alert-success text-center'>
                      
                      " . $_SESSION['success'] . "
                  </div>
                  ";
                                unset($_SESSION['success']);
                            }
                            ?>
                        </div>

                    </div>
                </div>




            </div>
        </div>
        </div>



        </div>




        </div>





    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>