
<?php require_once "controllerUserData.php"; 

?>

<?php 
#$id = $_SESSION['id'];
$email = $_SESSION['email'];
$_SESSION['email'] = $email;

$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM table_residents WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../temp/reset-code.php');
            }
        }else{
            header('Location: ../temp/user-otp.php');
        }
    }
}else{
    header('Location: ../temp/login-user.php');
}


  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>West Rembo</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <style>
  body::before {
  display: block;
  content: '';
  height: 60px;
}

.navbar {
  background-color: #001D3D;
}

.navbar-dark .navbar-nav .nav-link {
  color: white;
}







</style>
    <!---navbar--->
<body>

<nav class="navbar navbar-expand-lg py-3 fixed-top">
      <div class="container">
      <a href="<?php echo base_url('welcome'); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <img src="../wrp-assets/logo-white1.png" style="width: 150px; height: 50px;">
      </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
          
            <i class="bi bi-file-earmark-text "  style="color: #ffff;"></i><a id='noti_number'class="nav-link scrollto active"  style="color: #ffff;" href="<?php echo base_url('documents'); ?>">My Request</a>

            <i class=" "  style="color: #ffff;"></i><a id='noti_number'class="nav-link scrollto active"  style="color: #ffff;" href="<?php echo base_url('announce'); ?>">Announcements</a>



           <li class="dropdown scrollto"><a href="#"  style="color: white;"><span>Hello, <?php echo $fetch_info['firstName'] ?></span> <i class="bi bi-chevron-down"></i></a>

           <ul>
              <li><a href="<?php echo base_url('profile'); ?>">Edit Profile</a></li>
           
              <li><a href="requestsandappointment.php">Change Password</a></li>
           
              <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
            </ul>
            
          </li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
          </ul>
        </div>
      </div>
    </nav>
    <script>var links = document.getElementsByClassName('link')
for(var i = 0; i <= links.length; i++)
   addClass(i)


function addClass(id){
   setTimeout(function(){
      if(id > 0) links[id-1].classList.remove('hover')
      links[id].classList.add('hover')
   }, id*750) 
}</script>
</body>
    <!---navbar--->
    