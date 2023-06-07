 <?php

    if(isset($_SESSION['successRemoveCart']) && $_SESSION['successRemoveCart'] != "")
    {
      echo $_SESSION['successRemoveCart'];
      
      unset($_SESSION['successRemoveCart']);
    }
 ?>

  <div class="modal fade" id="removeFromCartModal" tabindex="-1" role="dialog" aria-labelledby="removeFromCartModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="removeFromCartModalLabel">Remove from Cart</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/removeCart.php" method="POST">
      <div class="modal-body">
          <center>
          <input type = "hidden" id ="cartID" readonly name = "cartID" >
          <h2>Are you sure you want to remove this item from the cart?</h2>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="submit"  name="btnRemove" id = "btnRemove">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>


