<?php
$id = "";
	$output = '';
	$connection=mysqli_connect("localhost","root","","pick_a_plant");

//update profile
if (isset($_POST['update_profile'])) {
	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$delivaddress=$_POST['delivaddress'];

	$storedFile=basename($_FILES["file"]["name"]);
	$storedFiled='profile/'.basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES['file']['tmp_name'], $storedFiled);
    $imageFileType = strtolower(pathinfo($storedFile,PATHINFO_EXTENSION));
    if ($storedFile =="") {
     mysqli_query($connection,"UPDATE tbl_register SET firstname = '$firstname', lastname = '$lastname', address = '$address',
	 email='$email',phoneno='$contact',delivaddress='$delivaddress' WHERE username = '$username'")or die(mysqli_error());
	header('location: b_profile2.php');
  	


    }
    else
    {
    	// Check file size
		if ($_FILES["file"]["size"] > 2000000) {
		  echo '<script>alert("Sorry, your file is too large.")</script>';
		  $uploadOk = 0;
		}

	// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png") {
		  echo '<script> alert("Sorry, Profile Picture is required with file extension that is either JPG, JPEG or PNG.")</script>';
		  $uploadOk = 0;

		}
		mysqli_query($connection,"UPDATE tbl_register SET firstname = '$firstname', lastname = '$lastname', address = '$address', 
	profile = '$storedFile',email='$email',phoneno='$contact',delivaddress='$delivaddress' WHERE username = '$username'")or die(mysqli_error());
	header('location: user_profile.php');
    	
    }
}
//PASSWORD CHANGE
if (isset($_POST['submit_password'])) {
	$current_password=$_POST['current_password'];
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];
	$hidden_current_password=$_POST['hidden_current_password'];
	$user_unique_id=$_POST['user_unique_id'];

	 $sql_query = "SELECT * FROM tbl_register WHERE password = '$hidden_current_password'";
        $result = mysqli_query($connection,$sql_query);
     $row=mysqli_fetch_array($result);
    $hashedpassword=password_verify($current_password,$row['password']);



	if ($hashedpassword and $new_password!='' and $confirm_password!='' and $new_password===$confirm_password) {
		$new_hashedpassword= password_hash($_POST['new_password'], PASSWORD_DEFAULT);
		mysqli_query($connection, "UPDATE tbl_register SET password='$new_hashedpassword' WHERE unique_id='$user_unique_id'");
		 echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password change successful');
    window.location.href='user_profile.php';
    </script>");
	}
	else
{
		 echo ("<script>
    window.alert('Please make sure you type the correct password');
    window.location.href='user_profile.php';
       </script>");
	}

}


?>