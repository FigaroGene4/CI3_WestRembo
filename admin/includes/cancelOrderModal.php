 <?php

    if(isset($_SESSION['successCancelOrder']) && $_SESSION['successCancelOrder'] != "")
    {
      echo $_SESSION['successCancelOrder'];
      
      unset($_SESSION['successCancelOrder']);
    }
 ?>

  <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="cancelOrderModalLabel">Cancel Order</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/cancelOrderSuccess.php" method="POST">
      <div class="modal-body">
          <center>
          <input type = "hidden" id ="orderID" readonly name = "orderID" >
          <h2>Are you sure you want to cancel your order?</h2>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="submit"  name="btnCancelOrder" id = "btnCancelOrder">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>


