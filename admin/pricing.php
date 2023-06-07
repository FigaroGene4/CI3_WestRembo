<?php
session_start();
if(isset($_POST['apply'])){
    include("db_conn.php");
}
if (isset($_SESSION['done'])) {
    echo
    "
<div class='alert alert-success text-center'>
  <button class='close'>&times;</button>
  " . $_SESSION['done'] . " </div>";

  header('pricing.php');
}


if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include("db_conn.php");

?>
 <?php include 'includes2/header-admin.php';?>
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
    <style>
     
    </style>

    <body>
        <br><br><br><br><br>
        <div class="main">



<?php
if(isset($_POST['apply'])){
    include("db_conn.php");
    $_SESSION['done'] = 'Pricing changed successfully';

    $bid = $_POST['bid'];
    $bc = $_POST['bc'];
    $bsp = $_POST['bsp'];
    $bp = $_POST['bp'];
    

    



    $sql1 = "UPDATE table_pricing SET  baranggayId = '$bid', baranggayClearance = '$bc', businessPermit = '$bsp', buildingPermit = '$bp' where id = '1'";

    $conn->query($sql1);
    
   

}


?>




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


   
<br>

  <button type="submit" class="btn btn-primary" name="apply">Apply Changes</button>
</form>
';
}

?>

           

        </div>





    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>