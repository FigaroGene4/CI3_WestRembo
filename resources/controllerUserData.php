<?php
session_start();
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


//if user signup button
if (isset($_POST['signup'])) {
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactNumber = mysqli_real_escape_string($con, $_POST['contactNumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $houseNumber = mysqli_real_escape_string($con, $_POST['houseNumber']);
    $streetNumber = mysqli_real_escape_string($con, $_POST['streetNumber']);
    $sitio = mysqli_real_escape_string($con, $_POST['sitio']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $dateRegistered = date("Y-m-d");

   //contactNumber validation structure

   if(preg_match("/^[0-9]{11}$/", $contactNumber)) {
    // $phone is valid
  }

  else{
    $errors['contactwrong'] = 'Contact number is invalid';

  }

  //validate email
  // Include library file



  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("$email is a valid email address");
  } else {
    $errors['emailinvalid'] = 'Email is invalid';;
  }


    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number  || strlen($cpassword) < 8) {
        $errors['passwordnotstrong'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number';
    }
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    
  




    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM table_residents WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered already exist!";
    }


   

    $number_check = "SELECT * FROM table_residents WHERE contactNumber = '$contactNumber'";
    $res1 = mysqli_query($con, $number_check);
    if (mysqli_num_rows($res1) > 0) {
        $errors['number'] = "Contact Number that you have entered already exist!";
    }
    if (count($errors) === 0) {


        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions) === true) {
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if (in_array($img_type, $types) === true) {
                $time = time();
                $new_img_name = $time . $img_name;
                date_default_timezone_set('Asia/Taipei');

                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $code = rand(999999, 111111);
                $status = "notverified";
                $dateJoined = date('Y-m-d');
                $validation = 'pending';
                $insert_data = "INSERT INTO table_residents (firstName, lastName, email, birthdate, gender, password, houseNumber, streetNumber, sitio, contactNumber, status, code, dateRegistered, image, validationT)
                values('$firstName','$lastName', '$email', '$birthdate', '$gender', '$encpass', '$houseNumber', '$streetNumber','$sitio', '$contactNumber', '$status', '$code', '$dateRegistered', '{$new_img_name}', '$validation')";



                $ran_id = rand(time(), 100000000);
                $status1 = "Active now";
                $hostname1 = "localhost";
                $username1 = "root";
                $password1 = "";
                $dbname1 = "db_westrembo";


                if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                    $ran_id = rand(time(), 100000000);
                    $status1 = "Active now";
                    $hostname1 = "localhost";
                    $username1 = "root";
                    $password1 = "";
                    $dbname1 = "db_westrembo";

                   

               

                $data_check = mysqli_query($con, $insert_data);

                if ($data_check) {
                    $subject = "Email Verification Code";
                    $message = "Your verification code is $code";
                    $sender = "From: westrembo.ph@gmail.com";
                    if (mail($email, $subject, $message, $sender)) {
                        $info = "We've sent a verification code to your email - $email";
                        $_SESSION['info'] = $info;
                        $_SESSION['email'] = $email;
                       
                        $_SESSION['password'] = $password;
                        header('location: user-otp.php');
                        exit();
                    } else {
                        $errors['otp-error'] = "Failed while sending code!";
                    }
                } else {
                    $errors['db-error'] = "Failed while inserting data into database!";
                }
            }
        }
            }
        }
    }
    

//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM table_residents WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $validation = $fetch['validationT'];
        $code = 0;
        
        $status = 'verified';
        $update_otp = "UPDATE table_residents SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['firstName'] = $firstname;
            $_SESSION['email'] = $email;
            
           
            header('location: ../Client/verify.php');
            exit();
            if ($update_res) {
                $_SESSION['firstName'] = $firstname;
                $_SESSION['email'] = $email;
                $validation == 'pending';
               
                header('location: ../Client/verify.php');
                
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
                header('location: ../Client/index.php');
            }

                if ($status == 'verified' && $validation !='verified') {
                    $_SESSION['email'] = $email;
                   
                    $_SESSION['password'] = $password;
                    header('location: ../Client/verify.php');
                }
    
                if ($status == 'verified' && $validation =='pendingz') {
                    $_SESSION['email'] = $email;
                   
                    $_SESSION['password'] = $password;
                    header('location: ../Client/verify.php');
                }
    
                
    
            
            if ($status == 'verified' && $validation =='Pending Verify') {
                $_SESSION['email'] = $email;
            
                $_SESSION['password'] = $password;
                header('location: ../artist/pendingverify.php');
            }
    
            if ($status == 'verified' && $validation =='Declined') {
                $_SESSION['email'] = $email;
                
                $_SESSION['password'] = $password;
               # header('location: ../artist/declinedartist.php');
            }
            
            if($status != 'verified') {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;

                header('location: user-otp.php');
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
    $check_email = "SELECT * FROM table_residents WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE table_residents SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: spa2go.ph@gmail.com";
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
    $check_code = "SELECT * FROM table_residents WHERE code = $otp_code";
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
        $update_pass = "UPDATE table_residents SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: login-user.php');
}


// if resident submits a request 


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
    $_SESSION['transactionNumber'] =$transactionNumber;

    
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

$sql = "INSERT INTO table_documentrequest(transactionNumber, firstName, lastName,
email, date, time, reason, price, category, status, birthplace,period,voter,owner,relation)
    VALUES ('$transactionNumber', '$firstName', '$lastName', '$email', '$dates', '$time', '$reason', '$price', '$category', '$status','$birthplace','$period','$voter','$owner','$relation')";


    $conn->query($sql);
    header("Location: requestapproval.php");
    
}


}