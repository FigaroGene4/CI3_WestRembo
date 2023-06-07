<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Accept Payment</h4></center>
            </div>
         
			<form method="POST" action="paymentProcess.php">
            <h3>Are you sure to accept  </h3>
            <div class="modal-body">
          
			<h2 class="text-center"> <?php echo $row['firstName']?> </h2>	
            <h3 class="text-center"> <?php echo 'Reference No.'. $row['referenceNumber']    ?> </h3>
            <h3 class="text-center"> <?php echo 'Amount: ₱'. $row['price'] ?> </h3>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>


                <a href="paymentProcess.php?transactionNumber=<?php echo $row['transactionNumber']; ?>" type="button" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Accept</a></button>
			</form>
            
            
		
            
            
            </div>
    </div>
    </div>
</div>  



<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Decline Payment</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Decline Payment</p>
                <h3 class="text-center"> <?php echo 'Reference No.'. $row['referenceNumber'] . '?'?> </h3>	
	
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="paymentreturnprocess.php?transactionNumber=<?php echo$row['transactionNumber']; ?> "class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>

