<div class="modal fade" id="changePasswordModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <form action = "" method = "post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-row">
                    <label>Current Password</label>
                    <?php 
                        include ("includes/connect.php");
                        $userid = $_SESSION['email'];
                        $sql = "SELECT * FROM info WHERE email = '$email'";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()){
                    ?>
                        <input type = "hidden" name = "txtCurrentPasswordVerification" value = "<?php echo $row['password'];?>">
                    <?php
                        }   
                    ?>
                    <input type="password" required name="txtCurrentPassword" class="form-control">
                </div>
                <div class="form-row">
                    <label>New Password</label>
                    <input type="password" id="newPass" required name="txtNewPassword" class="form-control">
                    <span class = "passLength"> </span>
                </div>
                <div class="form-row">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPass" required name="txtNewPasswordVerification" class="form-control">
                    <span class = "passErr"> </span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="submit" id="savePass" name = "btnSavePassword">Change Password</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php 
    if (isset($_POST['btnSavePassword'])){
        $currentPassword = $_POST['txtCurrentPassword'];
        $currentPasswordVerification = $_POST['txtCurrentPasswordVerification'];
        $newPassword = $_POST['txtNewPassword'];
        $newPasswordVerification = $_POST['txtNewPasswordVerification'];

        if ($currentPassword == $currentPasswordVerification){ //If current password is correct
            if ($newPassword == $newPasswordVerification){ //If new password is verified
                $sql = "UPDATE info  SET password = '$newPassword' WHERE email = '$email'";
                mysqli_query($conn,$sql);
                ?>
                <script>
                Swal.fire({
                    title: "Change Password Success",
                    text: "Your password has been changed successfully!",
                    icon: "success"
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location = "homepage.php"
                    }
                });
                </script>
                <?php
            } else if ($currentPassword == ($newPassword || $newPasswordVerification)){ //If current password = new password
                ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There seems to be an error in changing your password'
                })
                </script>
            <?php
            }
        } else { //If current password is wrong
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There seems to be an error in changing your password'
                })
            </script>
            <?php
        }

    }
?>


<script>
    $(function(){
        $("#confirmPass").on('input', function(){
            var newPassword = $("#newPass").val();
            var currentPassword = $("#confirmPass").val();

            if(newPassword == currentPassword)
            {
                $(".passErr").removeClass('text-danger').addClass('text-success').text("The passwords matched.");
            }
            else
            {
                $(".passErr").removeClass('text-success').addClass('text-danger').text("The passwords did not match.");
            }
        });
    });
    $("#newPass").on('input', function(){
        var newPassword = $("#newPass").val();

        if(newPassword.length >= 6 && newPassword.length < 8)
        {
            $(".passLength").removeClass('text-danger text-success').addClass('text-warning').text("Your new password is weak!");
        }
        else if(newPassword.length >= 8){
            $(".passLength").removeClass('text-danger text-warning').addClass('text-success').text("Your new password is strong!");
        }
        else
        {
            $(".passLength").removeClass('text-success text-warning').addClass('text-danger').text("Your new password is too short");
        }
    });
</script>