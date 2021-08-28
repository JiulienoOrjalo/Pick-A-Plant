<?php include ('sa_login_server.php');?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pick-A-Plant Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="login assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="login assets/css/style.css">
		<link rel="shortcut icon" href="assets/ico/icon.png">
	</head>

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


	<body>

		<div class="wrapper" style="background-image: url('login assets/images/img2.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="login assets/images/img1.jpg" alt="">
				</div>
				<form action="sa_login_server.php" method="POST">
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Name" class="form-control" name="name" required="">
					</div>

					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control" name="username" required="">
						<i class="zmdi zmdi-account"></i>
					</div>

					<div class="form-wrapper" >
						<select name="u_type" id="" class="form-control" required="">
							<option value="Super Admin" >Super Admin</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password" required="">
						<i class="zmdi zmdi-lock"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required="">
						<i class="zmdi zmdi-lock"></i>
					</div>


					<!-- <div class="form-wrapper">
						<input type="checkbox"> Accept Terms and Conditions
					</div> -->
					<br>

					
					<center><input type="submit" name="register" class="btn btn-success" value="Register" id="regbtn"></center>
					

					<br>

					<center><p style="color: #888;">Registered already? <a href="sa_login.php" style="color: #64ca87">
					 Log in here</a></p></center>

				</form>
			</div>
		</div>
		
	</body>
</html>