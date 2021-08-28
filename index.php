<?php 	include('login_server.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pick-A-Plant Log in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="login assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="login assets/css/style2.css">
		    <link rel="shortcut icon" href="assets/ico/icon.png">
		
	<style type="text/css">
		#regbtn{
			background-color: #64ca87; /* Green */
  			border: none;
  			color: white;
  			padding: 10px 32px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			cursor: pointer;
		}

	</style>

	</head>

	<body>

		<div class="wrapper" style="background-image: url('login assets/images/img2.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="login assets/images/img3.jpg" alt="">
				</div>
				<form action="" method="POST">
					<h3>Log in</h3>
					<input type="hidden" name="id">
					<input type="hidden" name="status" value="1">

					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="username" required="">
						<i class="zmdi zmdi-account"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" id="pass" name="password" required="">
						<i class="zmdi zmdi-lock"></i>

					</div>
					<a href="send_email.php" style="color: #64ca87;text-decoration: none;">Forgot Password?</a>
						<center><input type="submit" name="login" class="btn btn-success" value="Log in" id="regbtn" style="margin-top: 30px;"></center>
					<br>


					<center><p style="color: #888;">Not registered?<a href="register.php" style="color: #64ca87;text-decoration: none;">  Create an account</a></p></center><hr>
					<center><p style="color: #888;"><a href="contact_dev" style="color: #64ca87;text-decoration: none;">Contact Developer</a></p></center>
				</form>
			</div>
		</div>
		
		
	</body>


</html>