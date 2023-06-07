<?php
session_start();
 include('../connect.php');
    $pnumber= $_POST['hidden_id'];
    $pprice = $_POST['hidden_price'];
    $qty = $_POST['txtQuantity'];
    $userid = $_SESSION['email'];
    $pname = $_POST['pna'];
    $sql = "INSERT INTO cart (pnumber,userid,pname,pprice,quantity) VALUES ('$pnumber','$userid','$pname','$pprice', '$qty')";
    $query = $conn->query($sql);

    if($query){
      $_SESSION['success']= " <script>
            Swal.fire({
                title: 'Add to Cart',
                text: 'Successfully Added to Cart!',
                icon: 'success'
            });
        </script>";
        echo "<script>location.href ='../../homepage.php' </script>";

    } 
  else
  {
    echo $conn->error;
  }