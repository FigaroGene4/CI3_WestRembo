<?php



?>

<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Accept Booking</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="paymentProcess.php">

            <h1>Are you sure to Refund: </h1><br><br>
			<h2 class="text-center"> <?php echo  $row['transactionNumber'] .'<br>₱'. $row['price']?> </h2>	
            <h3 class="text-center"> <?php echo '0'. $row['clientContactNumber'] ?> </h3>	
            <h3 class="text-center"> <?php echo  $row['clientFirstName'] .' ' . $row['clientLastName']  ?> </h3>	
            <div class="modal-footer"> </h3>	
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="refundProcess.php?transactionNumber=<?php echo$row['transactionNumber']; ?>". type="button" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Accept</a> </button>
			</form>
            
            </div>
    </div>
    </div>
</div>  


