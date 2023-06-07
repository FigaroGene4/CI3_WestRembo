<?php



?>

<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Pay Artist</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="paymentProcess.php">

            <h1>Are you sure to Pay: </h1><br><br>
			<h2 class="text-center"> <?php echo  $row['transactionNumber'] .'<br>₱'. $row['artistIncome']?> </h2>	
            <h3 class="text-center"> <?php echo '0'. $row['clientContactNumber'] ?> </h3>	
            <h3 class="text-center"> <?php echo  $row['artistFirstName'] .' ' . $row['artistLastName']  ?> </h3>	
            <div class="modal-footer"> </h3>	
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="payArtistProcess.php?transactionNumber=<?php echo$row['transactionNumber']; ?>". type="button" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Accept</a> </button>
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
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['firstname'].' '.$row['lastname']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deleteemployee.php?id=<?php echo $row['id']; ?> "class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
