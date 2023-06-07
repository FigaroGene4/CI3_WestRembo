<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
			<div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">First Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstName" required >
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Last Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lastName"required >
					</div>
				</div>

				

					<div class="row form-group">
						<div class="col-sm-2">
						<label class="control-label modal-label">Contact:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="contactNumber" required>
					</div></div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Password:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="password" required >
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">House Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="houseNumber" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Street:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="streetNumber" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Sitio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="sitio" required>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Birthdate:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="birthdateClient" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Gender:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="gender" required>
					</div>
				</div>
				
				

			<div class="row form-group">
					<div class="col-sm-2">
					<label class="form-label" for="customFile">Upload Image</label>
					</div>
					<div class="col-sm-10">
					<input type="file" class="form-control" id="customFile" />
					</div>
				</div>
            



            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>