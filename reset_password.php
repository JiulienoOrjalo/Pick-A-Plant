<?php
if($_GET['key'] && $_GET['token'])
{
$servername='localhost';
$username='root';
$password='';
$dbname = "pick_a_plant";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($conn,
"SELECT * FROM `tbl_register` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
);
$curDate = date("Y-m-d H:i:s");
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['exp_date'] >= $curDate){ ?>


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
				<form action="update_forget_password.php" method="POST">
					<h3>Create a password</h3>

					<input type="hidden" name="id">
          <input type="hidden" name="email" value="<?php echo $email;?>">
          <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">

			
		

					

					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" name="new_password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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
						<input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password" required="">
						<i class="zmdi zmdi-lock"></i>
					</div>


					

  
  					<div id="overlay"></div>




					
					<br>
					<center><input type="submit" name="password" class="btn btn-success" value="Change Password" id="regbtn" ></center>
					<br>

					<center><p style="color: #888;">Registered already? <a href="index.php" style="color: #64ca87">
					 Log in here</a></p></center>

				</form>
        <?php } } else{
echo'alert("This forget password link has been expired");';
}
}
?>
			</div>
		</div>
		
	</body>

</html>