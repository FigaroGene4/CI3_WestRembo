<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form action="" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="addModalLabel">Add</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <center>
          Product ID: <br>
          <input id ="txtPID" readonly type = "number" name = "txtPID">
          <br>Product Name: <br>
          <input id ="txtPName" required type = "text" name = "txtPName">
          <br>Price: <br>
          <input id ="txtPPrice" required type = "number" name = "txtPPrice" >
          <br>Stock: <br>
          <input id ="txtPStocks" required type = "number" name = "txtPStocks" >
          <br>Description: <br>
          <textarea id ="txtPDescription" required style="resize: none;" name = "txtPDescription" rows="5" cols="40"></textarea>
          <br>
          Product Image: <br>
          <b>Max File: Size 5mb | JPG/ JPEG/ PNG only </b>
          <input type="file" required name="fileToUpload" id="fileToUpload">
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="submit" name="btnAdd">Add</button>
      </div>
    </div>
    </form>
  </div>
</div>

<?php
	if(isset($_POST['btnAdd'])){
		$productName = $_POST['txtPName'];
		$productPrice = $_POST['txtPPrice'];
		$productStock = $_POST['txtPStocks'];
		$productDescription = $_POST['txtPDescription'];
		$productCategory = $_POST['txtPCategory'];

		$target_dir = "assets/images/products/";
		$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
		$connect = mysqli_connect("localhost","root","","kendriks_db");
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$productImage = $_FILES['fileToUpload']['name'];

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
		if($check !== false) {
		    $uploadOk = 1;
		    // Check if file already exists
			if (file_exists($target_file)) {
			  $uploadOk = 0;
			}else{
				$uploadOk = 1;
			}
			// Check file size
			if ($_FILES['fileToUpload']['size'] > 50000000) {
			  $uploadOk = 0;
			}else{
				$uploadOk = 1;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				$uploadOk = 0;
			}
		} else {
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
?>
		    <script>
		      	Swal.fire({
		        	icon: 'error',
		        	title: 'Oops...',
		        	text: 'There seems to be an error uploading the photo!',
		    	})
		    </script>
<?php
		// if everything is ok, try to upload file
		} else if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
			$newImageName = $productImage . "." . uniqid("",false) . ".jpg";
			$add = "INSERT INTO product_info (pname,pprice,pstock,description,category, image) VALUES ('$productName','$productPrice','$productStock','$productDescription','$productCategory','$productImage')";
    		$result=mysqli_query($connect, $add);
    		if($result){
?>	
				<script>
				    Swal.fire({
				        title: "Add",
				        text: "Record Succesfully Added!",
				        icon: "success"
				    }).then((result)=>{
				        if(result.isConfirmed){
				            window.location = "product.php"
				        }
				    });
				</script>
<?php
			} else{
		    	echo $conn->error;
			}
		}
	}
	
?>
