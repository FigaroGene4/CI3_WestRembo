<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <form method="post" enctype="multipart/form-data" action = "homepage.php?checkout">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cart</h4>
        </div>
        <div class="modal-body">
          <table id = "productsAdded">
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Qty.</th>
              <th>Action</th>
            </tr>
            <?php
              include('connect.php');

              $userid = $_SESSION['email'];
              $sql = "SELECT * FROM cart WHERE userid ='$userid'";
              $query = $conn->query($sql);
              while ($row = $query->fetch_assoc()){
            ?>
            <tr>
                <form method = "post">
                <td><?php echo $row['pnumber'];?></td>
                <td><?php echo $row['pname'];?></td>
                <td><?php echo $row['pprice'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><button type= "button" class = "btn btn-danger btn-sm" name = "btnRemove" onclick="removeFromCart('<?php echo $row['id'];?>')">Remove from Cart</button></td>
              
                </form>
            </tr>
          <?php } ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" name = "btnCheckout" class="btn btn-primary" data-toggle="modal" data-target="#checkoutModal">Proceed to Checkout</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include ("includes/removeFromCart.php");?>
<?php include ("checkout.php");?>

<style>
  #productsAdded {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size:13px;
  }

  #productsAdded td, #productsAdded th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #productsAdded tr:nth-child(even){background-color: #f2f2f2;}

  #productsAdded tr:hover {background-color: #ddd;}

  #productsAdded th {
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

