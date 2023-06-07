<div class="section translucent-bg bg-image-2 pb-clear">
	<div data-aos="flip-left" class="container object-non-visible" data-animation-effect="fadeIn">
		<h1 data-aos="fade-down" data-aos-duration="1000" style="letter-spacing: 10px;" id="customer" class="title text-center">Customer's Feedback</h1>
		<div class="space"></div>
		<div class="row">
			<?php 
				include_once ("connect.php");
				if ($conn ->connect_errno) {
			  		echo "Failed to connect to MySQL: " . $conn->connect_error;
			 		 exit();
				} else {
					$sql = "SELECT * FROM customerfeedback ORDER BY 'ddate' DESC LIMIT 9";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck > 0){
						while($row = mysqli_fetch_assoc($result)){        
				?>
							<div data-aos="fade-right" data-aos-duration="1000" class="col-md-4">
								<div class="media testimonial">
									<div class="media-left">
										<img src="assets/images/testimonial-1.png" alt="">
									</div>
									<div class="media-body">
										<h3 class="media-heading"><?php echo $row['fullname'];?></h3>
											<blockquote>
												<p style="text-align: justify;"><?php echo $row['message'];?></p>
												<footer><cite title="Source Title"><?php echo $row['ddate'];?></cite></footer>
											</blockquote>
									</div>
								</div>
							</div>	
			<?php
						}
					}
				}
			
			?>
		</div>			
		<br><br>
	</div>
</div>
