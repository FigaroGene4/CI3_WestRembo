<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kendrik's Forget Password</title>
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="login/css/style.css">
    <script src="login/sweetalert2.all.min.js"></script>
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>

</head>

<body>
    <section class="signup">
        <div class="container" style="margin-top: 18px;border-style: solid;border-width: 5px; border-color: black;">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 style="letter-spacing: 7px; text-align: center;" class="form-title">Forget Pass</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="New Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="login/images/bottles.png" alt="sing up image" height="300px" width="300px"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>



<?php

if (isset($_POST['signup'])) 
{
    include("connect_db/connect.php");
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['re_pass'];

    $querya = "SELECT * FROM info WHERE email = '$email'";
    $res_a = mysqli_query($conn, $querya);

    if (mysqli_connect_error()) 
    {
        die("Connector") . mysqli_connect_errno();
    }
    if (empty($name) || empty($email) || empty($pass)) 
    {
        ?>
        <script>
        swal.fire({
        title: "Email or Password is empty!",
        text: "",
        icon: "question",
        button: "ok",
            });
        </script>
        <?php
    }
    if ($cpass == $pass) 
    {
        if (mysqli_num_rows($res_a) > 0) 
        {
        ?>
            <script>
                swal.fire({
                    title: "Password Updated Successfully!",
                    text: "Plase Login",
                    icon: "success"
                }).then(function() {
                    window.location = "login.php";
                });
            </script>
        <?php
        $sql = "UPDATE info SET password = '$pass' WHERE email = '$email'";
        mysqli_query($conn, $sql);
        } 
        else 
        {
            ?>
            <script>
            swal.fire({
            title: "Email Cannot Found",
            text: "",
            icon: "error",
            button: "ok",
            });
            </script>
            <?php
        }
    } 
    else 
    {
        ?>
        <script>
        swal.fire({
        title: "Password does not Match!",
        text: "",
        icon: "error",
        button: "ok",
        });
        </script>
<?php
    }
}

?>