
<?php
	session_start();
	$firstname = "";
	$lastname = "";
	$username = "";
	$email = "";
	$u_type = "";
	$password = "";
	$cpassword = "";
	

	//connect to database
	$db = mysqli_connect('localhost','root',"",'pick_a_plant');

	//if the registration button is clicked
	if (isset($_POST['register'])) {
		$name = ($_POST['name']);
		$username = ($_POST['username']);
		$u_type = ($_POST['u_type']);
		$password = ($_POST['password']);
		$cpassword=($_POST['cpassword']);


		$hashpassword= password_hash($_POST['password'], PASSWORD_DEFAULT);
		//insert into DB


		if ($password == $cpassword) {
					$query= "INSERT INTO tbl_superadmin (name,username,u_type,password) 
					VALUES('$name','$username','$u_type','$hashpassword')";
					mysqli_query($db, $query);
					echo "<script>alert('Your are now Registered! ');document.location='index.php'</script>";
		}
		else{
			  echo "<script>alert('password didn't match Try again!');document.location='sa_register.php'</script>";
		}
}


if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($db,$_POST['username']);
    $hashpassword = mysqli_real_escape_string($db,$_POST['password']);


        $sql_query = "SELECT * FROM tbl_superadmin WHERE username = '$username'";
        $result = mysqli_query($db,$sql_query);

   $row=mysqli_fetch_array($result);

                $passwordhashed = password_verify($hashpassword, $row['password']);
        if($passwordhashed){
                $_SESSION['username'] = $row['username'];
                $_SESSION['u_type'] = $row['u_type'];
                if($_SESSION['u_type'] == 'Super Admin'){
                 echo "<script>alert('Successfully logged in !');document.location='index.php'</script>";
                }
                else{
                    echo "<script>alert('Incorrect username and password!');document.location='sa_login.php'</script>";
                }
        }
        else{
            echo "<script>alert('Incorrect credentials!');document.location='sa_login.php'</script>";
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