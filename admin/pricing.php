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
    $yellow = $_POST['yellow'];
    $senior = $_POST['senior'];
    $pwd = $_POST['pwd'];
    $pvao = $_POST['pvao']; 
    $bona = $_POST['bona'];
    $goodmoral = $_POST['goodmoral'];
    $marriage = $_POST['marriage'];
    $nodero = $_POST['nodero'];
    $indigency = $_POST['indigency'];
    $livein = $_POST['livein'];
    $scholarship = $_POST['scholarship'];
    $greencard = $_POST['greencard'];
    



    $sql1 = "UPDATE table_pricing SET  baranggayId = '$bid', baranggayClearance = '$bc', businessPermit = '$bsp', yellow = '$yellow', senior = '$senior', pwd = '$pwd', pvao = '$pvao', bona = '$bona', goodmoral = '$goodmoral', marriage = '$marriage', nodero = '$nodero', indigency = '$indigency', livein = '$livein', scholarship = '$scholarship', greencard ='$greencard' where id = '1'";

    $conn->query($sql1);
    
   
    $_SESSION['done'] = 'Pricing changed successfully';
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
 
    <label for="">Yellow Card and Philhealth Application:</label>
    <input type="number" name="yellow" class="form-control" placeholder="" id="email" value='.$row['yellow'].'>

    <label for="">Senior Citizens Card (White, Blue, Yellow & Philhealth):</label>
    <input type="number" name="senior" class="form-control" placeholder="" id="email" value='.$row['senior'].'>
    
    <label for="">PWDs Benefit Cards (Philhealth, Yellow):</label>
    <input type="number" name="pwd" class="form-control" placeholder="" id="email" value='.$row['pwd'].'>

    <label for="">PVAO Application:</label>
    <input type="number" name="pvao" class="form-control" placeholder="" id="email" value='.$row['pvao'].'>

    <label for="">Bonafide Residency:</label>
    <input type="number" name="bona" class="form-control" placeholder="" id="email" value='.$row['bona'].'>

    <label for="">Good Moral Character</label>
    <input type="number" name="goodmoral" class="form-control" placeholder="" id="email" value='.$row['goodmoral'].'>

    <label for="">Marriage License:</label>
    <input type="number" name="marriage" class="form-control" placeholder="" id="email" value='.$row['marriage'].'>

    <label for="">No Derogatory Record:</label>
    <input type="number" name="nodero" class="form-control" placeholder="" id="email" value='.$row['nodero'].'>

    <label for="">Indigency:</label>
    <input type="number" name="indigency" class="form-control" placeholder="" id="email" value='.$row['indigency'].'>

    <label for="">Live-in/Solo Parent:</label>
    <input type="number" name="livein" class="form-control" placeholder="" id="email" value='.$row['livein'].'>

    <label for="">Scholarship/ UMAK Consortia:</label>
    <input type="number" name="scholarship" class="form-control" placeholder="" id="email" value='.$row['scholarship'].'>

    <label for="">Green Card:</label>
    <input type="number" name="greencard" class="form-control" placeholder="" id="email" value='.$row['greencard'].'>

    



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