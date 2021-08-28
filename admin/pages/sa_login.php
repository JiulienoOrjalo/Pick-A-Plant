<?php 	include('sa_login_server.php') ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pick-A-Plant Log in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="login assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="login assets/css/style.css">
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
					<h3>Log in Super Admin</h3>

					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="username">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password">
						<i class="zmdi zmdi-lock"></i>
					</div>
								<center><input type="submit" name="login" class="btn btn-success" value="Log in" id="regbtn"></center>
					<br>

					<center><p style="color: #888;">Not registered?<a href="sa_register.php" style="color: #64ca87">  Create an account</a></p></center>
					<hr style="width: 150px;">
				</form>
			</div>
		</div>

		
		
	</body>
</html>