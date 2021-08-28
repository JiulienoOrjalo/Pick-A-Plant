<?php
	$connection=mysqli_connect("localhost","root","","pick_a_plant");

	if (!$connection) {
		die("Failed connecting to MySQL: " .mysqli_connect_error());
		# code...
	}
	
	if (isset($_POST['add_plants'])) {

		$storedFile="images/".basename($_FILES['file']["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);


		$scientific_name=$_POST['scientific_name'];
		$common_name=$_POST['common_name'];

		$plant_type=$_POST['plant_type'];
		$family=$_POST['family'];

		$region=$_POST['region'];
	

		$description=$_POST['description'];
		$trivia=$_POST['trivia'];

$query = "INSERT INTO dictionary (photo, scientific_name, common_name, plant_type, family, region, description, trivia) 
			VALUES ('$storedFile', '$scientific_name', '$common_name', '$plant_type', '$family', '$region', '$description', '$trivia')";
				mysqli_query($connection, $query);

				
	header('location: sa_dictionary.php');

	}


$result = mysqli_query($connection, "SELECT * FROM dictionary");


		
	if (isset($_GET['del'])) {
			 	$id = $_GET['del'];
			 	mysqli_query($connection,"DELETE FROM tbl_product WHERE id=$id");
				header('location: sa_product.php');
			 }


	if (isset($_GET['remove'])) {
			 	$id = $_GET['remove'];
			 	mysqli_query($connection,"DELETE FROM tbl_register WHERE id=$id");
				header('location: sa_accounts.php');
			 }

	if (isset($_GET['delete'])) {
			 	$id = $_GET['delete'];
			 	mysqli_query($connection,"DELETE FROM tbl_superadmin WHERE id=$id");
				header('location: sa_accounts.php');
			 }
	if (isset($_GET['delete1'])) {
			 	$id = $_GET['delete1'];
			 	mysqli_query($connection,"DELETE FROM tbl_contact WHERE id=$id");
				header('location: sa_message.php');
			 } 
	if (isset($_GET['deletereport'])) {
				$id = $_GET['deletereport'];
			 	mysqli_query($connection,"DELETE FROM tbl_report WHERE id=$id");
				header('location: sa_report.php');
			 } 

	//Delete for Dictionary	 
	if (isset($_GET['remdic'])) {
			 	$id = $_GET['remdic'];
			 	mysqli_query($connection,"DELETE FROM dictionary WHERE id=$id");
				header('location: sa_dictionary.php');
			 }


	//UPDATE DICTIONARY
	if (isset($_POST['update_plants'])) {
	$id = $_POST['id'];
	$imageCH ="images/".basename($_FILES['imageCH']['name']);
	$oldimage=$_POST['oldimage'];

		$scientific_name=$_POST['scientific_name'];
		$common_name=$_POST['common_name'];

		$plant_type=$_POST['plant_type'];
		$family=$_POST['family'];

		$region=$_POST['region'];
		$origin=$_POST['origin'];

		$description=$_POST['description'];
		$trivia=$_POST['trivia'];



  if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
    $newimage ="images/".basename($_FILES['imageCH']['name']);
    unlink($oldimage);
    move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
  }
  else{
    $newimage=$oldimage;
  }


$query ="UPDATE dictionary SET photo='$newimage', scientific_name='$scientific_name', common_name='$common_name', plant_type='$plant_type', 
family='$family', region='$region', description='$description', trivia='$trivia' WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	 header('location: sa_dictionary.php');


}		 





if (isset($_GET['userIDD'])) {

	$id=$_GET['userIDD'];
	$sql="UPDATE tbl_register SET status='0' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		header('location: sa_accounts.php');
	}
}

//SA_CONCER BAN.PHP

if (isset($_GET['activate'])) {

	$id=$_GET['activate'];
	$sql="UPDATE tbl_register SET status='0' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		header('location: sa_concern.php');
	}
}

//REPORT SECTION TBL REPORT
if (isset($_GET['useracc'])) {

	$id=$_GET['useracc'];
	$sql="UPDATE tbl_report SET status='1' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		
		header('location: sa_concern.php');
	}
}

if (isset($_GET['useraccc'])) {

	$id=$_GET['useraccc'];
	$sql="UPDATE tbl_report SET status='0' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		header('location: sa_concern.php');
	}
}
//REPORT SECTION TBL REGISTER PART
if (isset($_GET['userdeac'])) {

	$id=$_GET['userdeac'];
	$sql="UPDATE tbl_register SET status='1' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		

		echo "<script>alert('The account is successfully Deactivated');document.location='sa_concern_report.php?reportview=$id'</script>";
	}
}

if (isset($_GET['useract'])) {

	$id=$_GET['useract'];
	$sql="UPDATE tbl_register SET status='0' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {

		echo "<script>alert('The account is successfully Activated');document.location='sa_concern_report.php?reportview=$id'</script>";
	}
}


//WARNING PART
if (isset($_GET['warning'])) {

	$id=$_GET['warning'];
	$sql="UPDATE tbl_register SET status3='1' WHERE id='$id';";

	if (mysqli_query($connection,$sql)) {
		
		header('location: sa_concern.php');
	}

}

if (isset($_GET['removewarning'])) {

	$id=$_GET['removewarning'];
	$sql="UPDATE tbl_register SET status3='0' WHERE id='$id';";

	if (mysqli_query($connection,$sql)) {
		
		header('location: sa_concern.php');
	}

}

////////////////////////////////////////////////////////////////////

//EDIT PLANTS
 $imageCH ="";


if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$imageCH ="images/".basename($_FILES['imageCH']['name']);
	$oldimage=$_POST['oldimage'];

	$name = $_POST['name'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$family = $_POST['family'];
	$origin = $_POST['origin'];
	$price = $_POST['price'];
	$stocks = $_POST['stocks'];


  if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
    $newimage ="images/".basename($_FILES['imageCH']['name']);
    unlink($oldimage);
    move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
  }
  else{
    $newimage=$oldimage;
  }


$query ="UPDATE tbl_product SET photo='$newimage', name='$name', description='$description', location='$location', family='$family', origin='$origin', price='$price', stocks='$stocks' WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);
	 header('location: sa_shop.php');
}


//EDIT DICTIONARY






//EDIT PROFILE
if (isset($_POST['updateinfo'])) {
	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$opwd = $_POST['opwd'];
	$npwd = $_POST['npwd'];
	$cpwd = $_POST['cpwd'];

	$hashpassword= password_hash($_POST['opwd'], PASSWORD_DEFAULT);
	$hashpassword2= password_hash($_POST['npwd'], PASSWORD_DEFAULT);
	$hashpassword3= password_hash($_POST['cpwd'], PASSWORD_DEFAULT);



        $sql_query = "SELECT * FROM tbl_superadmin WHERE username = '$username'";
        $result = mysqli_query($connection,$sql_query);
   		$row=mysqli_fetch_array($result);

         $passwordhashed = password_verify($hashpassword, $row['password']);


         $query = mysqli_query ($connection, "SELECT username,password FROM tbl_superadmin WHERE username = '$username' AND password = '$passwordhashed'");
         $num = mysqli_fetch_array($query);


         if ($num > 0) {
         	$con = mysqli_query ($connection, "UPDATE tbl_superadmin SET password = '$hashpassword2', username = '$username'  WHERE username = '$username'");
         	echo "<script>alert('Password change! ');document.location='sa_profile.php'</script>";
         }
         else{
         	echo "<script>alert('Password does not match! ');document.location='sa_profile.php'</script>";
         }


}
//DELETE MESSAGE FOR SA_CONCERNS

if (isset($_POST['deleteconcern']))
	
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item to delete First! ');document.location='sa_concern.php'</script>";
		}	
	else {
		$chkarr = $_POST['choose'];
		foreach ($chkarr as $id) {
		mysqli_query($connection,"DELETE FROM tbl_contact WHERE id=$id");

	}
		header("location: sa_concern.php");
		}
}

//DELETE MESSAGE FOR REPORTS

if (isset($_POST['deletereport']))
	
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item to delete First! ');document.location='sa_concern.php'</script>";
		}	
	else {
		$chkarr = $_POST['choose'];
		foreach ($chkarr as $id) {
		mysqli_query($connection,"DELETE FROM tbl_report WHERE id=$id");

	}
		header("location: sa_concern.php");
		}
}



//DELETE MESSAGE FOR REPORTS
if (isset($_POST['deletereportseller']))

{
    if (!isset($_POST['choose'])) 
        {
        $id=$_POST['id'];
        echo "<script>alert('Select Item to delete First! ');document.location='sa_concern_sellerview.php?concernview=$id'</script>";
        }
    else {
        $chkarr = $_POST['choose'];
        foreach ($chkarr as $id) {
        mysqli_query($connection,"DELETE FROM tbl_reportbuyer WHERE id=$id");

    }
        header("location: sa_concern_seller.php");
        }
}


//WARNING SELLER PART
if (isset($_GET['warningseller'])) {

    $id=$_GET['warningseller'];
    $sql="UPDATE tbl_register SET status3='1' WHERE id='$id';";

    if (mysqli_query($connection,$sql)) {

        header('location: sa_concern_seller.php');
    }

}

if (isset($_GET['removewarningseller'])) {

    $id=$_GET['removewarningseller'];
    $sql="UPDATE tbl_register SET status3='0' WHERE id='$id';";

    if (mysqli_query($connection,$sql)) {

        header('location: sa_concern_seller.php');
    }

}



//DEACTIVATE AND ACTIVATE PART IN SELLER
if (isset($_GET['userdeacseller'])) {

    $id=$_GET['userdeacseller'];
    $sql="UPDATE tbl_register SET status='1' WHERE id='$id'";

    if (mysqli_query($connection,$sql)) {


        echo "<script>alert('The account is successfully Deactivated');document.location='sa_concern_seller.php'</script>";
    }
}


if (isset($_GET['useractseller'])) {

    $id=$_GET['useractseller'];
    $sql="UPDATE tbl_register SET status='0' WHERE id='$id'";

    if (mysqli_query($connection,$sql)) {

        echo "<script>alert('The account is successfully Activated');document.location='sa_concern_seller.php'</script>";
    }
}

if (isset($_GET['removedeactiveseller'])) {

    $id=$_GET['removedeactiveseller'];
    $sql="UPDATE tbl_register SET status='0' WHERE id='$id';";

    if (mysqli_query($connection,$sql)) {

        header('location: sa_concern_seller.php');
    }

}

?>


