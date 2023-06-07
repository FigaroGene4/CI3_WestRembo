<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['booking_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Details</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editbooking.php">
				<input type="hidden" class="form-control" name="booking_id" value="<?php echo $row['booking_id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Client ID</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="client_id" value="<?php echo $row['client_id']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Client Username:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="client_username" value="<?php echo $row['client_username']; ?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Artist ID:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="artist_id" value="<?php echo $row['artist_id']; ?>">
					</div></div>

					<div class="row form-group">
						<div class="col-sm-2">
						<label class="control-label modal-label">Artist Username:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="artist_username" value="<?php echo $row['artist_username']; ?>">
					</div></div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Service Offered:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="service_offered" value="<?php echo $row['service_offered']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Payment Method:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="payment_method" value="<?php echo $row['payment_method']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Client Address:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="client_address" value="<?php echo $row['client_address']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Booking Date:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="booking_date" value="<?php echo $row['booking_date']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Status:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Total Price:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="total_price" value="<?php echo $row['total_price']; ?>">
					</div>

					
					
				</div>

				
					
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
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
				<h2 class="text-center"><?php echo $row['transactionNumber']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deleteBooking.php?id=<?php echo $row['id']; ?> "class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
