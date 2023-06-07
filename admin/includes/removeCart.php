<?php
session_start();
 include ("connect.php");
    $id= $_POST['cartID'];
    $removeFromCart = "DELETE FROM cart WHERE id = '$id'";
    $result=mysqli_query($conn, $removeFromCart);
    if($result){

     $_SESSION['successRemoveCart'] = "<script>
        Swal.fire({
          title: 'Remove from Cart',
          text: 'Item has been successfuly removed from the cart!',
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
      echo "Item has not been removed from the cart ...";
    }
?>