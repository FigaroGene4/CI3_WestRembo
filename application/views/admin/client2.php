<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Client</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/x-icon" href="logo.png">   
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


 
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
        
            <a class="navbar-brand" href="home.php" style="padding-left: 10px;"> <img src="logowr.png" width="20px"> </a>
            <a class="navbar-brand">Hello, <?php echo $_SESSION['name']; ?></a>
          
            <a class="navbar-brand navbar-right  " href="logout.php" style= "margin-left: auto">Logout</a>
</nav>

<div class="sidenav">



<a href="client.php ">Client</a>
<a href="artist.php">Artist</a>
<a href="product.php">Product</a>
<a href="service.php">Services</a>
<a href="report.php">Report</a>
</div>
</div>

<div class="main"  >


<div class="container">

  <br><br><br>
	<h1 class="page-header text-center">Client Information</h1>

  <br><br>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			
			<div class="height10">
			</div>
			<div class="row"  style="padding-left: 100px;">
				<table id="myTable" class="table text-center table-bordered table-striped " >
					<thead>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
            <th>Username</th>
						<th>Contact Number</th>
						<th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Joined Date</th>
            <th>Action</th>
           
					</thead>
					<tbody>
						<?php

            
							include_once('db_conn.php');
							$sql = "SELECT * FROM table_client";

             
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['id_client']."</td>
									<td>".$row['firstNameClient']."</td>
									<td>".$row['lastNameClient']."</td>
									<td>".$row['userNameClient']."</td>
                  <td>".$row['contactNumberClient']."</td>
                  <td>".$row['emailClient']."</td>
                  <td>".$row['passwordClient']."</td>
                  <td>".$row['addressClient']."</td>
                  <td>".$row['genderClient']."</td>
                  <td>".$row['joinDateClient']."</td>
									<td>
										<a href='#edit_".$row['id_client']."' class='btn btn-info btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['id_client']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
							/////////////////

							//use for MySQLi Procedural
							// $query = mysqli_query($conn, $sql);
							// while($row = mysqli_fetch_assoc($query)){
							// 	echo
							// 	"<tr>
							// 		<td>".$row['id']."</td>
							// 		<td>".$row['firstname']."</td>
							// 		<td>".$row['lastname']."</td>
							// 		<td>".$row['address']."</td>
							// 		<td>
							// 			<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
							// 			<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
							// 		</td>
							// 	</tr>";
							// 	include('edit_delete_modal.php');
							// }
							/////////////////

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div style="text-align:center">
				<a href="#addnew" data-toggle="modal" class="btn btn-secondary" style="width: 200px;"><span class="glyphicon glyphicon-plus"></span> New</a>
				
			</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>

<style>
.PP{
	text-align: center;
}
  
</style>
  
</div>


            
          
    
     


     
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>