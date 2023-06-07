<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="editModalLabel">Edit </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <center>
          Product ID: <br>
          <input id ="txtProdID" readonly type = "number" name = "txtProdID">
          <br>Product Name: <br>
          <input id ="txtProductName" type = "text" name = "txtProductName">
          <br>Price: <br>
          <input id ="txtPrice" type = "number" name = "txtPrice" >
          <br>Stock: <br>
          <input id ="txtStocks" type = "number" name = "txtStocks" >
          <br>Category: <br>
          <input id ="txtCategory" readonly type = "text" name = "txtCategory" >
          <br>Description: <br>
          <textarea id ="txtDescription" required style="resize: none;" rows="5" cols="40" name = "txtDescription" rows="10" cols="40"></textarea>
          <br>Product Image: <br>
          <b>Max File: Size 5mb | JPG/ JPEG/ PNG only </b>
          <input type="file" name="fileToUpload" id = "fileToUpload">
          <div class="m-r-10">
            <img id = "fileUploaded" src="">
          </div>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit"  name="btnEdit">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  if (isset($_POST['btnEdit'])){
    $id= $_POST['txtProdID'];
    $ProductName = $_POST['txtProductName'];
    $Price = $_POST['txtPrice'];
    $Stocks = $_POST['txtStocks'];
    $Category = $_POST['txtCategory'];
    $Description = addslashes($_POST['txtDescription']);
    $connect = mysqli_connect("localhost","root","","kendriks_db");
    $productImage = $_FILES['fileToUpload']['name'];

    if (empty($_FILES['filesToUpload']['name'])){
      $update = "UPDATE product_info SET pname = '$ProductName', pprice = '$Price', pstock = '$Stocks', category = '$Category', description ='$Description' WHERE pnumber = '$id'"; 
      $result=mysqli_query($connect, $update);
      if($result){
        ?>  
          <script>
              Swal.fire({
                  title: "Update",
                  text: "Record Succesfully Updated!",
                  icon: "success"
              }).then((result)=>{
                  if(result.isConfirmed){
                      window.location = "adminInventory.php"
                  }
              });
          </script>
        <?php
      }

    } else {
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
        // Check file size
        if ($_FILES['fileToUpload']['size'] > 5000000) {
          $uploadOk = 0;
        }else{
          $uploadOk = 1;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
        }
      } else {
          $uploadOk = 0;
      }

      if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        $update = "UPDATE product_info SET pname = '$ProductName', pprice = '$Price', pstock = '$Stocks', category = '$Category', description ='$Description', image = '$productImage' WHERE pnumber = '$id'"; 
          $result=mysqli_query($connect, $update);
          if($result){
  ?>  
          <script>
              Swal.fire({
                  title: "Update",
                  text: "Record Succesfully Updated!",
                  icon: "success"
              }).then((result)=>{
                  if(result.isConfirmed){
                      window.location = "adminInventory.php"
                  }
              });
          </script>
  <?php
        } else{
            echo $conn->error;
        }
      }
    }
  }
?>