<!-- Delete -->
<div class="modal fade" id="arch_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h6 class="modal-title" id="myModalLabel">Archieve Feedback</h6></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            
				<h5 class="text-center"><?php echo 'Are you sure you wanted to archieved feedback with ID '.' '.$row['id']. '?'; ?></h5>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="buttonarchieve.php?id=<?php echo $row['id']; ?> "class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>