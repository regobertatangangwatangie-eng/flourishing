<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="login.css"/>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		
		<link rel="stylesheet" href="indexfooter.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>

		<!-- Footer -->
		<footer class="footer-distributed" style="background-color:black" id="aboutUs">
		
 			<?php
		require 'menu4.php';
	?>
		



	<!-- One -->


  <form class="modal-content animate" action="Login/signUp.php" method='POST'>
  
    
    </div>

   


							<h3>SignUp</h3>
							<form method="post" action="Login/signUp.php">
								<center>
								<div >
									<div >
										<input type="text" name="name" id="name" value="" placeholder="Name" required/>
									</div>
									<div >
										<input type="text" name="uname" id="uname" value="" placeholder="UserName" required/>
									</div>
								</div>
								
									<div >
										<input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
									</div>

									<div >
										<input type="email" name="email" id="email" value="" placeholder="Email" required/>
									</div>
								</div>
								<div class="row uniform">
									<div >
			                            <input type="password" name="password" id="password" value="" placeholder="Password" required/>
			                        </div>
			                        <div >
			                            <input type="password" name="pass" id="pass" value="" placeholder="Retype Password" required/>
			                        </div>
								</div>
								
									<div >
										<input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required/>
									</div>
								</div>
								<div class="row uniform">
									<p>
			                            <b>Category : </b>
			                        </p>
			                        <div class="3u 12u$(small)">
			                            <input type="radio" id="farmer" name="category" value="1" checked>
			                            <label for="farmer">Farmer</label>
			                        </div>
			                        <div class="3u 12u$(small)">
			                            <input type="radio" id="buyer" name="category" value="1">
			                            <label for="buyer">Buyer</label>
			                        </div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(small)">
										<input type="submit" value="Submit" name="submit" class="special" /></li>
									</div>
									
								</div>
							</center>
							</form>
						</section>
	</footer>	
    </div>
    </div>
  </form>
</div>
</div>



	</body>
</html>
