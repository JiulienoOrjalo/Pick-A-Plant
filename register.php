<?php include ('login_server.php');?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pick-A-Plant Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="login assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">


		<!-- STYLE CSS -->
		<link rel="stylesheet" href="login assets/css/style2.css">
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
				<form action="login_server.php" method="POST">
					<h3>Registration Form</h3>

					<input type="hidden" name="id">

					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="firstname" required="">
						<input type="text" placeholder="Last Name" class="form-control" name="lastname" required="">
					</div>

					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" required="">
						<input type="text" placeholder="Address" class="form-control" name="address" required="">
					</div>

					<div class="form-group">
            <input type="email" placeholder="Email" class="form-control" name="email" required="">
            <input type="number" pattern="/^-?\d+\.?\d*$/"  onKeyPress="if(this.value.length==11) return false;" placeholder="Phone Number" class="form-control" name="phone_number" required="">
          </div>

<!--           <div class="form-wrapper">
               <input type="text" placeholder="Address Where to Deliver" class="form-control" name="address_deliver" required="">
          </div> -->

					<div class="form-wrapper">
						<select name="u_type" id="" class="form-control" required="">
							<option value="" disabled selected>User type</option>
							<option value="Seller">Seller</option>
							<option value="Buyer">Buyer</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>

					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<i class="zmdi zmdi-lock"></i>

						<div id="message">
  <h5>Password must contain the following:</h5>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
					</div>

					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required="">
						<i class="zmdi zmdi-lock"></i>
					</div>


					<div class="form-wrapper">
						<input type="checkbox" id="chkddl" onclick="Enableddl(this)"> Accept Terms and Conditions
						<a href="#" data-modal-target="#modal">learn more</a>

						 <div class="modal" id="modal">
    						<div class="modal-header">
      						<div class="title">Accept Terms and Conditions</div>
      						
    						</div>


    				<div class="modal-body">
      					Last updated: 01/09/2021
<br>
<br>
Please read this Terms of Condition carefully before using this site operated by Block 2-Group 2 (“us”,”we”,or “our”). Your access to use and of the website is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all users and others who access or use this website. By accessing or using the website you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the website. Termination We may terminate or suspend access to our site immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. All provisions of the Terms which by their nature should survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
<br><br>
<hr>
His/Her Account will be terminated once he/she <strong>violates or receive 20 above consecutive reports</strong> to his/her buyer.
    					</div>
  					</div>
  
  					<div id="overlay"></div>




					</div>
					<br>
					<center><input type="submit" name="register" class="btn btn-success" value="Register" id="regbtn" disabled="disabled"></center>
					<br>

					<center><p style="color: #888;">Registered already? <a href="login.php" style="color: #64ca87">
					 Log in here</a></p></center>

				</form>
			</div>
		</div>
		
	</body>
	<script type="text/javascript">
		function Enableddl (chkddl){
			var ddl=document.getElementById("regbtn");
			ddl.disabled=chkddl.checked ? false : true;

			if (!ddl.disabled) {
				ddl.focus();
			}


		}
	</script>
</html>