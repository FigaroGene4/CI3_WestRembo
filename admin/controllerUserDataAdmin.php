<?php
session_start();

$con = new mysqli('localhost', 'root', '', 'db_westrembo');
	if($con->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
require "connection.php";
$email = "";
$firstName = "";
$lastName = "";
$contactNumber = 0;
$gender = "";
$errors = array();
$city = "";
$birthdate = "";
$sitio = "";
$houseNumber = "";
$streetNumber = "";



//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM table_admin WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $validation = $fetch['validationT'];
        $code = 0;
        
        $status = 'verified';
        $update_otp = "UPDATE table_admin SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['firstName'] = $firstname;
            $_SESSION['email'] = $email;
            
           
            redirect(base_url('verify'));
            exit();
            if ($update_res) {
                $_SESSION['firstName'] = $firstname;
                $_SESSION['email'] = $email;
                $validation == 'pending';
               
                redirect(base_url('verify'));
            }
            if ($update_res) {
                $_SESSION['firstName'] = $firstname;
                $_SESSION['email'] = $email;
                $validation == 'For approval';
               
                header('location: ../Client/pendingverify.php');
                exit();
            }
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    

    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
     $email = validate($_POST['email']);    
     $pass = validate($_POST['password']);

    
   
    $sql = "SELECT * FROM table_admin WHERE email='$email' AND password='$password'";

		$result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            header("Location: ../Admin/home.php");
            
        }
    }
    


    $check_email = "SELECT * FROM table_residents WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);

    
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];

        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            $validation = $fetch['validationT'];

            if ($status == 'verified' && $validation == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                redirect(base_url('welcome'));
            }
            if ($status == 'verified' && $validation =='For Approval') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                redirect(base_url('pendingverify'));
            }

                if ($status == 'verified' && $validationT !='verified') {
                    $_SESSION['email'] = $email;
                   
                    $_SESSION['password'] = $password;
                    redirect(base_url('verify'));
                }
    
               
    
                
            
            if($status != 'verified') {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;

                //header('location: user-otp.php');
                redirect(base_url('otp'));
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM table_admin WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE table_admin SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: westremboph@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM table_admin WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE table_admin SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
            //redirect(base_url('passchanged'));
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: index.php');
    //redirect(base_url('login'));
}


// if resident submits a request 


if(isset($_POST['requestOther'])){

    $category = $_POST['type'];

$_SESSION['category'] = $category;

function getGUIDnoHash()
    {
      mt_srand((float)microtime() * 10000);
      $charid = md5(uniqid(rand(), true));
      $c = unpack("C*", $charid);
      $c = implode("", $c);

      return substr('DOC' . $c, 0, 11);
    }



    $transactionNumber = getGUIDnoHash();
    $_SESSION['transactionNumber'] = $transactionNumber;

    
$reason = $_POST['reason'];
$birthplace = $_POST['birthplace'];
    $period = $_POST['period'];
    $voter = $_POST['voter'];
    $owner = $_POST['houseOwner'];
    $relation = $_POST['relation'];



$email = $_SESSION['email'];

$sel = mysqli_query($con, "SELECT * FROM `table_documentrequest` WHERE email = '$email' AND  category = '$category'");



include_once("db_conn.php");
$sql = "SELECT * FROM table_residents WHERE email = '$email'";


$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


while( $rows = mysqli_fetch_assoc($resultset)){	

    $category = $_SESSION['category'];

    $transactionNumber = $_SESSION['transactionNumber'];

    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $price = '';
    $dates = date("Y-m-d");
    $email =$rows['email'];


   

    $reason = $_POST['reason'];
    $status = "For Approval";

}

$sql3 = "SELECT * FROM `table_pricing` WHERE id = 1";
$resultset3 = mysqli_query($conn, $sql3) or die("database error:". mysqli_error($conn));

while( $rows = mysqli_fetch_assoc($resultset3)){	



    if($category == 'Baranggay ID'){
        $price = $rows['baranggayId'];
    }
    else if($category == 'Baranggay Clearance'){
        $price = $rows['baranggayClearance'];
    }
    else if($category == 'Business Permit'){
        $price = $rows['businessPermit'];
    }
    else if($category == 'Yellow Card and Philhealth Application'){
        $price = $rows['yellow'];
    }
    else if($category == "Senior Citizens Card (White, Blue, Yellow and Philhealth)"){
        $price = $rows['senior'];
    }
    else if($category == "PWD's Benefit Cards (Philhealth, Yellow)"){
        $price = $rows['pwd'];
    }
    else if($category == "PVAO Application"){
        $price = $rows['pvao'];
    }
    else if($category == "Bonafide Residency"){
        $price = $rows['bona'];
    }
    else if($category == "Good Moral Character"){
        $price = $rows['goodmoral'];
    }
    else if($category == "Marriage License"){
        $price = $rows['marriage'];
    }
    else if($category == "No Derogatory Record"){
        $price = $rows['nodero'];
    }
    else if($category == "Scholarship/ UMAK Consortia"){
        $price = $rows['scholarship'];
    }
    else if($category == "Green Card"){
        $price = $rows['greencard'];
    }

    


    $_SESSION['price'] = $price;

   


}

$sql = "INSERT INTO table_documentrequest(transactionNumber, firstName, lastName,
email, date, time, reason, price, category, status, birthplace,period,voter,owner,relation)
    VALUES ('$transactionNumber', '$firstName', '$lastName', '$email', '$dates', '$time', '$reason', '$price', '$category', '$status','$birthplace','$period','$voter','$owner','$relation')";


    $conn->query($sql);
    redirect(base_url('requestSent'));
    




}

if(isset($_POST['request'])){

    $category = $_SESSION['categ'];

$_SESSION['category'] = $category;

function getGUIDnoHash()
    {
      mt_srand((float)microtime() * 10000);
      $charid = md5(uniqid(rand(), true));
      $c = unpack("C*", $charid);
      $c = implode("", $c);

      return substr('DOC' . $c, 0, 11);
    }



    $transactionNumber = getGUIDnoHash();
    $_SESSION['transactionNumber'] = $transactionNumber;

    
$reason = $_POST['reason'];
$birthplace = $_POST['birthplace'];
    $period = $_POST['period'];
    $voter = $_POST['voter'];
    $owner = $_POST['houseOwner'];
    $relation = $_POST['relation'];



$email = $_SESSION['email'];

$sel = mysqli_query($con, "SELECT * FROM `table_documentrequest` WHERE email = '$email' AND  category = '$category'");

if (mysqli_num_rows($sel) > 0) {
  $errors['reqerror'] ="You already submitted a same request!";

}else{

include_once("db_conn.php");
$sql = "SELECT * FROM table_residents WHERE email = '$email'";


$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


while( $rows = mysqli_fetch_assoc($resultset)){	

    $category = $_SESSION['category'];

    $transactionNumber = $_SESSION['transactionNumber'];

    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $price = '';
    $dates = date("Y-m-d");
    $email =$rows['email'];


   

    $reason = $_POST['reason'];
    $status = "For Approval";

}

$sql3 = "SELECT * FROM `table_pricing` WHERE id = 1";
$resultset3 = mysqli_query($conn, $sql3) or die("database error:". mysqli_error($conn));

while( $rows = mysqli_fetch_assoc($resultset3)){	



    if($category == 'Baranggay ID'){
        $price = $rows['baranggayId'];
    }
    else if($category == 'Baranggay Clearance'){
        $price = $rows['baranggayClearance'];
    }
    else if($category == 'Business Permit'){
        $price = $rows['businessPermit'];
    }
    else{
        $price = $rows['buildingPermit'];
    }


    $_SESSION['price'] = $price;

   


}

$sql = "INSERT INTO table_documentrequest(transactionNumber, firstName, lastName,
email, date, time, reason, price, category, status, birthplace,period,voter,owner,relation)
    VALUES ('$transactionNumber', '$firstName', '$lastName', '$email', '$dates', '$time', '$reason', '$price', '$category', '$status','$birthplace','$period','$voter','$owner','$relation')";


    $conn->query($sql);
    redirect(base_url('requestSent'));
    
}



}







