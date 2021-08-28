


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
		<script defer src="script.js"></script>
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
		*, *::after, *::before {
  box-sizing: border-box;
}

.modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: 200ms ease-in-out;
  border: 1px solid black;
  border-radius: 10px;
  z-index: 10;
  background-color: white;
  width: 500px;
  max-width: 80%;
}

.modal.active {
  transform: translate(-50%, -50%) scale(1);
}

.modal-header {
  padding: 10px 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid black;
}

.modal-header .title {
  font-size: 1.25rem;
  font-weight: bold;
}

.modal-header .close-button {
  cursor: pointer;
  border: none;
  outline: none;
  background: none;
  font-size: 1.25rem;
  font-weight: bold;
}

.modal-body {
  padding: 10px 15px;
}

#overlay {
  position: fixed;
  opacity: 0;
  transition: 200ms ease-in-out;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, .5);
  pointer-events: none;
}

#overlay.active {
  opacity: 1;
  pointer-events: all;
}
/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 5px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 5px;
  margin-top: 5px;
}

#message p {
  padding: 10px 35px;
  font-size: 15px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

	</style>


	<body>

		<div class="wrapper" style="background-image: url('login assets/images/img2.jpg');">
			<div class="inner" style="border-radius: 10px">
				<div class="image-holder">
					<img src="login assets/images/img1.jpg" alt="" height="auto">
				</div>
				<form action="password_reset_token.php" method="POST">
					<h3>Forgot Password</h3>

					<input type="hidden" name="id">

					

					<div class="form-wrapper">
						<input type="email" placeholder="Email" class="form-control" name="email" required="" id="email">
						<i class="zmdi zmdi-email"></i>
					</div>


					<div class="form-wrapper">
					


    				
  					
  
  					<div id="overlay"></div>




					</div>
					<br>
					<center><input type="submit" name="password_reset_token" class="btn btn-success" value="Send Email" id="regbtn" ></center>
					<br>

					<center><p style="color: #888;">Registered already? <a href="index.php" style="color: #64ca87">
					 Log in here</a></p></center>

				</form>
			</div>
		</div>
		
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
    $('#regbtn').attr('disabled',true);
    $('#email').keyup(function(){
        if($(this).val().length !=0)
            $('.regbtn').attr('disabled', false);            
        else
            $('.regbtn').attr('disabled',true);
    })
});
	</script>
</html>