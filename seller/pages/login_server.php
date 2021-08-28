<?php
	session_start();
	$firstname = "";
	$lastname = "";
	$username = "";
	$email = "";
	$u_type = "";
	$password = "";
	$cpassword = "";
	$status = "";
	

	//connect to database
	$db = mysqli_connect('localhost','root',"",'pick_a_plant');

	//if the registration button is clicked
	if (isset($_POST['register'])) {
		$id =($_POST['id']);
		$firstname = ($_POST['firstname']);
		$lastname = ($_POST['lastname']);
		$username = ($_POST['username']);
		$address = ($_POST['address']);
		$email = ($_POST['email']);
		$u_type = ($_POST['u_type']);
		$password = ($_POST['password']);
		$cpassword=($_POST['cpassword']);


		$hashpassword= password_hash($_POST['password'], PASSWORD_DEFAULT);
		//insert into DB

		$check = "SELECT username FROM tbl_register WHERE username = '$username'";
		$result101 = mysqli_query($db, $check);
		$count = mysqli_num_rows($result101);


	if (($count > 0)) {
		echo "<script>alert('Username Already Exist! ');document.location='register.php'</script>";
	}

	elseif($password == $cpassword) {
					$query= "INSERT INTO tbl_register(firstname,lastname,username,address,email,u_type,password) 
					VALUES('$firstname','$lastname','$username','$address','$email','$u_type','$hashpassword')";
					mysqli_query($db, $query);
					echo "<script>alert('Your are now Registered! ');document.location='login.php'</script>";
	}
	elseif($password != $cpassword) {
			echo "<script>alert('Password Dont match ');document.location='register.php'</script>";
	}
	else{
		echo "<script>alert('Password Dont match ');document.location='register.php'</script>";
	}










}


if(isset($_POST['login'])){

	$status = ($_POST['status']);
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $hashpassword = mysqli_real_escape_string($db,$_POST['password']);


        $sql_query = "SELECT * FROM tbl_register WHERE username = '$username'";
        $result = mysqli_query($db,$sql_query);

   $row=mysqli_fetch_array($result);

                $passwordhashed = password_verify($hashpassword, $row['password']);

        if ($row['status'] == 1 ) {
        	echo "<script>alert('Your account has been Banned! ');document.location='index.php'</script>";
        }

        elseif($passwordhashed){
                $_SESSION['username'] = $row['username'];
                $_SESSION['u_type'] = $row['u_type'];
                if($_SESSION['u_type'] == 'Super Admin'){
                 echo "<script>alert('Successfully logged in !');document.location='sa_dictionary.php'</script>";
                }
                if($_SESSION['u_type'] == 'Seller'){
                    echo "<script>alert('Successfully logged in!');document.location='seller'</script>";
                }if($_SESSION['u_type'] == 'Buyer'){
                    echo "<script>alert('Successfully logged in!');document.location='b_index.php'</script>";
                }
                else{
                    echo "<script>alert('Incorrect username and password!');document.location='index.php'</script>";
                }
        }
        
            
        else{
            echo "<script>alert('Incorrect credentials!');document.location='index.php'</script>";
        }

                $_SESSION['id'] = $row['id'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['u_type'] = $row['u_type'];

}





	


?>