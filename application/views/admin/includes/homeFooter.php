<footer id="footer">
<div class="footer section">
	<div data-aos="flip-right" class="container">
		<h1 data-aos="fade-down" data-aos-duration="1000"  style="letter-spacing: 10px;" class="title text-center" id="contact">Contact Us</h1>
		<div class="space"></div>
		<div class="row">
			<div class="col-sm-6">
				<div class="footer-content">
					<p data-aos="fade-left" data-aos-duration="1000" class="large">If you have any comments or suggestions about our products you may contact us below or just leave us a message. <br><br> May you have a wonderful day! - Team Cute</p>
					<ul class="list-icons">
						<li data-aos="fade-left" data-aos-duration="1000"><i class="fa fa-map-marker pr-10"></i> Amorseco Street, 1218 Makati, Philippines</li>
						<li data-aos="fade-left" data-aos-duration="1000"><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
						<li data-aos="fade-left" data-aos-duration="1000"><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>
						<li data-aos="fade-left" data-aos-duration="1000"><i class="fa fa-envelope-o pr-10"></i> kendriks_snack@email.com</li>
					</ul>
					<ul data-aos="fade-left" data-aos-duration="1000" class="social-links">	
						<li class="facebook"><a class="fa fa-facebook" href = "https://www.facebook.com/kendrikssnackdelight"></a></li>			
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="footer-content">
					<?php 
						include_once ("connect.php");
						if ($conn ->connect_errno) {
					  		echo "Failed to connect to MySQL: " . $conn->connect_error;
					 		 exit();
						} else {
							$sql = "SELECT * FROM info WHERE email = '$email'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if ($resultCheck > 0){
								while($row = mysqli_fetch_assoc($result)){        
					?>

									<form method="post" id="footer-form" action = "">
										<div data-aos="fade-left" data-aos-duration="1000" class="form-group has-feedback">
											<label class="sr-only" for="name2">Name</label>
											<input type="text" class="form-control" id="name2" placeholder="Name" name="name2" required value="<?php echo $row['name'];;?>" readonly>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
										<div data-aos="fade-left" data-aos-duration="1000" class="form-group has-feedback">
											<label class="sr-only" for="email2">Email address</label>
											<input type="email" class="form-control" id="email2" placeholder="Enter email" name="email2" required value="<?php echo $row['email'];;?>" readonly>
											<i class="fa fa-envelope form-control-feedback"></i>
					<?php
								}
							}
						}
					
					?>
										</div>
										<div data-aos="fade-left" data-aos-duration="1000" class="form-group has-feedback">
											<label class="sr-only" for="message2">Message</label>
											<textarea class="form-control" rows="8" id="message2" placeholder="Message" name="message2" required></textarea>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
										<input data-aos="fade-left" data-aos-duration="1000" type="submit" name="btnSend" value="Send Feedback" class="btn btn-default">
									</form>	
				</div>
			</div>
		</div>
	</div>
</div>
</footer>
<div class="subfooter">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="text-center">Copyright © 2020 Kendrik's by <a href="">TEAM CUTE</a>.</p>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['btnSend']))
	{	
		include_once ("connect.php");
		if ($conn ->connect_errno) {
	  		echo "Failed to connect to MySQL: " . $conn->connect_error;
	 		 exit();
		} else {
			$name = $_POST['name2'];
			$message = $_POST['message2'];
			$status = "unread";
			$sql = mysqli_query($conn, "SELECT count(*) as total FROM info WHERE email = '" . $email . "'") or die(mysqli_error($conn));
    		$result = mysqli_fetch_array($sql); 
			if($result['total'] > 0){
				$exec ="INSERT INTO customerfeedback(fullname, message, ddate, status) VALUES ('$name', '$message', CURRENT_TIMESTAMP, '$status')";
				mysqli_query($conn,$exec);
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
			}
			else
			{
?>
		    	<script>
		    		Swal.fire({
			        	title: "Message was not sent !",
			        	text: "Try another email!",
			        	icon: "error"
			        	});.then(function(){
			            	window.location = "homepage.php";
			            });
		    	</script>
<?php
		    }
    	}
	}
?>