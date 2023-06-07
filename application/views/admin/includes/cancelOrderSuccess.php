<?php
session_start();
 include ("connect.php");
    $id= $_POST['orderID'];
    $cancelOrder = "DELETE FROM orderform WHERE orderid = '$id'";
    $result=mysqli_query($conn, $cancelOrder);
    if($result){

     $_SESSION['successCancelOrder'] = "<script>
        Swal.fire({
          title: 'Cancel Order',
          text: 'Your order has been cancelled',
          icon: 'success'
        }).then((e) =>{
            if(e.isConfirmed)
            {
              window.location.reload();
            }
          });
      </script>";
      echo "<script>window.location.href='../homepage.php'</script>";
    } else{
      echo "There seems to be an error cancelling your order ...";
    }
?>