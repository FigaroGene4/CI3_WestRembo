<!-- Responsiveness ng Cart -->

<header class="header fixed clearfix navbar navbar-fixed-top">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="header-left clearfix">
					<div class="logo smooth-scroll">
						<a href="#banner"><img id="logo" src="assets/images/kendrikslogo.png" alt="Kendriks" height="65px" width="65px"></a>
					</div>
					<div class="site-name-and-slogan smooth-scroll">
						<div class="site-name"><a href="#banner">Kendrik's</a></div>
						<div class="site-slogan">Snack Delights </div>
					</div>
				</div>
				<!-- header-left end -->
			</div>
			<div class="col-md-8">
			<!-- header-right start -->
			<!-- ================ -->
				<div class="header-right clearfix">
				<!-- main-navigation start -->
				<!-- ================ -->
					<div class="main-navigation animated">
						<!-- navbar start -->
						<!-- ================ -->
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
							<!-- Toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1" >
									<ul class="nav navbar-nav navbar-right">									
										<li><button type = "button" data-toggle="modal" data-target="#cartModal" class="fa fa-shopping-cart" id = "cart" 
										style = "	background: rgba(0, 0, 0, 0.00005); 
													border: none;
													color: white;
													padding: 25px 40px;
													display: inline-block;
													font-size: 30px;
													"> </button> </li>
										<li><a href="#about">About</a></li>
										<li><a href="#product">Products</a></li>
										<li><a href="#customer">Customer Feedback</a></li>
										<li><a href="#contact">Contacts</a></li>
										<li> 
											<div class="dropdown">
												<button class="dropbtn 	fa fa-angle-double-down"></button>
												<div class="dropdown-content">
													<a class = "dropdown-item">
														<button type = "button" data-toggle="modal" data-target="#orderModal" id = "order" style = "background: rgba(0, 0, 0, 0.00005); 
																	border: none;
																	color: black;"> 
														<i class = "fas fa-table" style = "margin-right:15px;"> </i>Your Orders</button></a>
					                                <a class="dropdown-item">
					                                	<button type = "button" data-toggle="modal" data-target="#accountSettingsModal" id = "accountSettings" style = "background: rgba(0, 0, 0, 0.00005); 
																	border: none;
																	color: black;"> 
					                                	<i class="fas fa-cog mr-2" style = "margin-right:15px;"></i>Settings</button></a>
					                                <a class="dropdown-item" href="index.php"><i class="fas fa-power-off mr-2" style = "margin-right:16.5px; margin-left:5px;"></i>Logout</a>
												</div>
											</div>
				                          
				                        </li>
									</ul>
								</div>
							</div>
						</nav>
						<!-- navbar end -->
					</div>
					<!-- main-navigation end -->
				</div>
				<!-- header-right end <li><a href= "index.php">Log-out</a></li> -->
			</div>
		</div>
	</div>
</header>
<?php include ("orderModal.php");?>
<?php include ("accountSettingsModal.php");?>
<?php include ("cart.php");?>
<style>
.dropbtn {
  background: rgba(0, 0, 0, 0.00005);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
  top:15px;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

