<div class="modal fade" id="accountSettingsModal" tabindex="-1" role="dialog" aria-labelledby="accountSettingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 style="text-transform: uppercase;text-align: left;  letter-spacing: 10px;" class="modal-title" style="text-align: left;" id="accountSettingsModalLabel">Account Settings</h4>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        
          <?php 
            include ("connect.php");
            $sql = "SELECT * FROM info WHERE email = '$email'";
            $query = $conn->query($sql);
            while ($row = $query->fetch_assoc()){
          ?>
              <div class = "form-group">
                <label>Full Name:</label>
                <input id ="txtFullName" required type = "text" name = "txtFullName"value="<?php echo $row['name'];?>" class="form-control"><br>
                <label>Email:</label> 
                <input id ="txtEmail" required type = "email" name = "txtEmail" value ="<?php echo $row['email'];?>"  class="form-control"><br>
                <label>Enter password for verification:</label>
                <input type="password" required id="password" required name="txtPassword" class="form-control">
                <button type = "button" style = "background-color: white; border:none;" class = "signup-image-link" data-toggle="modal" data-target = "#changePasswordModal"><u>Change your password</u></button>
                <label style = "font-size:12px">Note: You must log-in again after changing your Account Information!</label>
              </div>
              <!--
              <b>Max File: Size 5mb | JPG/ JPEG/ PNG only </b>
              <input type="file" name="fileToUpload" id = "fileToUpload">
              <div class="m-r-10">
                <img id = "fileUploaded" src="assets/images/products/<?//php echo $row['image'];?>">
                <br>Current Password: <br>
                <input id ="txtCurrentPassword" type = "password" name = "txtCurrentPassword" >
                <br>New Password: <br>
                <input id ="txtNewPassword" type = "password" name = "txtNewPassword" >
              </div> -->
      </div>
      <div class="modal-footer">
        <center>
        <button class="btn btn-primary" type="submit" name="btnSaveChanges">Save Changes</button>
        </center>
      </div>
      </form>
    </div>
  </div>
</div>
  <?php
    }
    if (isset($_POST['btnSaveChanges'])){
        include ("connect.php");
        $newName = $_POST['txtFullName'];
        $newEmail = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];
        $sql = "SELECT * FROM info where email = '$email'";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $sql1 = "UPDATE info SET name = '$newName', email = '$newEmail' WHERE password = '$password'";
            mysqli_query($conn,$sql1);
        ?>
            <script>
                Swal.fire({
                    title: "Account Update",
                    text: "You have successfully updated your information!",
                    icon: "success"
                }).then((result)=>{
                    if(result.isConfirmed){
                        session_destroy();
                        window.location = "login.php";
                    }
                });
            </script>
        <?php
        }else{
            ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There seems to be an error in updating your user information'
                })
                </script>
            <?php
        }
        
    }
?>


<?php include ("changePasswordModal.php");?>
