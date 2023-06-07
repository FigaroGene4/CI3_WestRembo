<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="post" enctype="multipart/form-data" action = "homepage.php?order">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Orders</h4>
        </div>
        <div class="modal-body">
          <table id = "orderFormID">
            <tr>
              <th>Order ID</th>
              <th>Products</th>
              <th>Total Amount</th>
              <th>Address</th>
              <th>Address(Optional)</th>
              <th>City</th>
              <th>Province</th>
              <th>Zip Code</th>  
              <th>Ordered at:</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php
              include('connect.php');

              $userid = $_SESSION['email'];
              $sql = "SELECT * FROM orderform WHERE email = '$email'";
              $query = $conn->query($sql);
              while ($row = $query->fetch_assoc()){
            ?>
            <tr>
                <form method = "post">
                <td><?php echo $row['orderid'];?></td>
                <td><?php echo $row['products'];?></td>
                <td><?php echo $row['totalPrice'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['addressOptional'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['province'];?></td>
                <td><?php echo $row['zipcode'];?></td>
                <td><?php echo $row['orderDateTime'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><button type= "button" class = "btn btn-danger btn-sm" name = "btnCancel" onclick="cancelOrder('<?php echo $row['orderid'];?>')">Cancel</button></td>
                </form>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include("cancelOrderModal.php");?>
<script>
  function cancelOrder(orderid){
    $("#cancelOrderModal").modal("show");
    $('#orderID').val(orderid);
  }
</script>

<style>
  #orderFormID {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size:13px;
  }

  #orderFormID td, #orderFormID th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #orderFormID tr:nth-child(even){background-color: #f2f2f2;}

  #orderFormID tr:hover {background-color: #ddd;}

  #orderFormID th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #532e1c;
    color: white;
  }
</style>


<script>
  function removeFromCart(id){
    $("#removeFromCartModal").modal("show");
    $('#cartID').val(id);
  }
</script>

