<?php 
    if (isset($_POST['btnSavePassword'])){
        $currentPassword = $_POST['txtCurrentPassword'];
        $currentPasswordVerification = $_POST['txtCurrentPasswordVerification'];
        $newPassword = $_POST['txtNewPassword'];
        $newPasswordVerification = $_POST['txtNewPasswordVerification'];

        if ($currentPassowrd == $currentPasswordVerification){ //If current password is correct
            if ($newPassword == $newPasswordVerification){ //If new password is verified
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