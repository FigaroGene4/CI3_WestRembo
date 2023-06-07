
<?php
if(isset($_POST['apply'])){
    include("db_conn.php");
    $_SESSION['done'] = 'Pricing changed successfully';

    $bid = $_POST['bid'];
    $bc = $_POST['bc'];
    $bsp = $_POST['bsp'];
    $bp = $_POST['bp'];
    $commission = $_POST['commission'];

    



    $sql1 = "UPDATE table_pricing SET  baranggayId = '$bid', baranggayClearance = '$bc', businessPermit = '$bsp', buildingPermit = '$bp', percentDownpayment = '$commission' where id = '1'";

    $conn->query($sql1);
    
    header("location:pricing.php");




}

?>





<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include("db_conn.php");



?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Home</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" type="image/x-icon" href="logo.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
  


    </head>

    <body>



        <nav class="navbar navbar-light bg-light fixed-top ">
            <style>
                a {
                    color: black;
                }

                a:hover {
                    color: violet;
                }

                .dropdown-menu {
                    padding: 15px;

                }
            </style>

            <a class="navbar-brand" href="home.php" style="padding-left: 10px;"> <img src="logowr.png" width="20px"> </a>
            <a class="navbar-brand">Hello, <?php echo $_SESSION['name']; ?></a>
            <a class="navbar-brand navbar-right .active   " href="createadmin.php"></a>
            <a class="navbar-brand navbar-right  " href="changepassword.php"> </a>
            <a class="navbar-brand navbar-right  " href="logout.php" style="margin-left: auto"></a>
            <div class="dropdown droptxt">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Admin Settings
                    <span class="caret"></span></button>
                <ul class="dropdown-menu droptxt">
                    <li><a href="createadmin.php">Create Admin Account</a></li>
                    <li><a href="changepassword.php">Reset Password</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="logout.php">Logout</a></li>
            </div>
            </ul>
            </div>
        </nav>

        <div class="sidebar">
            <br><br><br><br>

            <a href="residents.php ">Residents</a>
<!--<a href="artist.php">Artist</a> -->
<a href="docrequest.php">Document Requests</a>
<a href="payment.php">Payment</a>
<a href="pricing.php">Pricing</a>
<a href="report.php">Reports</a>
<!--<a href="refund.php">Refund</a>
<a href="payartist.php">Pay Artist</a> -->
<a href="Blog.php">CMS</a>
        </div>
        <br><br><br>

        <div class="main">
            <div class="container-fluid">
                <div class="row">

<?php




$sql = "SELECT * FROM table_pricing";

           
//use for MySQLi-OOP
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){


    echo'<div class="col-12">
  <div class="form-group col-xs-2">
                    
                        <h1>Modify Document Pricing (in Philippine Peso)</h1><br><br><br>

                        <form action="#" method="POST">
    <label for="">Baranggay ID:</label>
    <input type="number" name ="bid" class="form-control" placeholder="" id="email" value='.$row['baranggayId'].'>

    <label for="">Baranggay Clearance:</label>
    <input type="number" name="bc" class="form-control" placeholder="" id="email" value='.$row['baranggayClearance'].'>
 
    <label for="">Business Permit:</label>
    <input type="number" name="bsp" class="form-control" placeholder="" id="email" value='.$row['businessPermit'].'>
 
    <label for="">Building Permit:</label>
    <input type="number" name="bp" class="form-control" placeholder="" id="email" value='.$row['buildingPermit'].'>

   <br<br><br><hr><br><br>


   <label for="">Downpayment Percentage:</label>
    <input type="number" name="commission" class="form-control" placeholder="" id="email" value='.$row['percentDownpayment'].'>
 
<br>

  <button type="submit" class="btn btn-primary" name="apply">Apply Changes</button>
</form>
';
}
if(isset($_POST['apply'])){
    include("db_conn.php");
    $_SESSION['done'] = 'Pricing changed successfully';}
if (isset($_SESSION['done'])) {
    echo
    "
<div class='alert alert-success text-center'>
  <button class='close'>&times;</button>
  " . $_SESSION['done'] . " </div>";
}
?>


                    </div>
                    </div>
                </div>
            </div>






        </div>








<?php if (isset($_SESSION['done'])) {
                  echo
                  "
            <div class='alert alert-success text-center'>
                <button class='close'>&times;</button>
                " . $_SESSION['done'] . " </div>";
                  unset($_SESSION['done']);

                  
                }
                
                if (isset($_SESSION['apply'])) {
                  echo
                  "
            <div class='alert alert-success text-center'>
                <button class='close'>&times;</button>
                " . $_SESSION['photo'] . " </div>";
                  unset($_SESSION['photo']);

                  echo '<h6><a href="profile.php" class="link-primary">Return to Profile</a></h6>';
                }?>










    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>