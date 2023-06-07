<?php
    $userControl = $_SESSION['userType'];
    if (!isset($_SESSION['email'])){
        session_destroy();
        echo "<script>location.href = 'login.php' </script>";
    }else{
        if($userControl == 0){
            echo "<script>location.href = 'homepage.php' </script>";
        }
    }
?>

