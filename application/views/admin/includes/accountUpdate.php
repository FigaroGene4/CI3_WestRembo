<div class="modal fade" id="accountUpdateModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Verification</h4>
            </div>
            <form action = "" method = "post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-row">
                    <label>Enter your password</label>
                    <input type="password" id="password" required name="txtPassword" class="form-control">
                    <?php 
                        include ("connect.php");
                        $sql = "SELECT * FROM info WHERE email = '$email'";
                        $query = $conn->query($sql);
                        if ($row = $query->fetch_assoc()){
                    ?>
                        <input type = "hidden" name = "txtName" id = "txtName" value = "<?php $_POST['txtFullName'];?>">
                        <input type = "hidden" name = "txtEmail" id = "txtEmail" value = "<?php $_POST['txtEmail'];?>">
                        <?php
                        }
                        ?>
                </div>
            </div>
            <div class="modal-footer">
                <center>
                    <button class="btn btn-danger" type="submit" id="btnEnter" name = "btnEnter">Enter</button>
                </center>
            </div>
            </form>
        </div>
    </div>
</div>

<?php 
    if (isset($_POST['btnEnter'])){
        include ("connect.php");
        $newName = $_POST['txtName'];
        $newEmail = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];
        echo '<script> alert("'.$newName . $newEmail . $password. '") </script>';
        /*$sql = "UPDATE info SET name = '$newName', email = '$newEmail' WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        if ($result){
        ?>
            <script>
                Swal.fire({
                    title: "Account Update",
                    text: "You have successfully updated your information!",
                    icon: "success"
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location = "homepage.php"
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
        }*/
        
    }
?>



