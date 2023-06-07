<?php
	include ("connect.php");
	if(isset($_POST['Send']))
	{	
		$b =0;
		$name = $_POST['name2'];
		$email = $_POST['email2'];
		$message = $_POST['message2'];
		$sql = mysqli_query($conn, "SELECT count(*) as total FROM info WHERE email = '" . $email . "'") or die(mysqli_error($conn));
    	$rw = mysqli_fetch_array($sql);

    	if($rw['total'] > 0)
    	{	
    		?>
        	<script>
	        	Swal.fire({
		        	title: "Message Sent Successfully!",
		        	text: "",
		        	icon: "success"
		        	}).then(function(){
	            		window.location = "homepage.php";
	            	});
        	</script>
        	<?php
        	$status = "unread";
    		$sql = "INSERT INTO customerfeedback SET message = '$message', full = '$name',status ='$status',ddate = CURRENT_TIMESTAMP  WHERE email = '$email'";
    		mysqli_query($conn, $sql);
		}
		else
		{
			?>
        	<script>
        		Swal.fire({
		        	title: "Message was not sent !",
		        	text: "Try another email!",
		        	icon: "error"
		        	});
        	</script>
        	<?php
		}
	}
?>