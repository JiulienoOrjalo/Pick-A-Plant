<?php
	$id = "";
	$output = '';
	$connection=mysqli_connect("localhost","root","","pick_a_plant");

$result = mysqli_query($connection, "SELECT * FROM dictionary");


	if (isset($_GET['buy'])) {
	$id = $_GET['buy'];
	$rec = mysqli_query($connection,"SELECT * FROM tbl_product WHERE id=$id");
	$rec2 = mysqli_query($connection,"SELECT * FROM tbl_comment WHERE product_id=$id");
	$rec3 = mysqli_query($connection,"SELECT * FROM tbl_stars WHERE product_id=$id");
	// $rec = mysqli_query($connection,"SELECT * FROM tbl_product INNER JOIN tbl_comment ON tbl_product.id=tbl_comment.product_id WHERE id=$id");
	$rec4 = mysqli_query($connection,"SELECT * FROM tbl_comment WHERE product_id=$id");
 }
if (isset($_GET['ratings'])) {
    $id = $_GET['ratings'];
    $rec = mysqli_query($connection,"SELECT * FROM tbl_product WHERE id=$id");
    // $rec = mysqli_query($connection,"SELECT * FROM tbl_product INNER JOIN tbl_comment ON tbl_product.id=tbl_comment.product_id WHERE id=$id");
}
if (isset($_POST['check'])) {


		$order_id = $_POST['order_id'];

		if ($order_id == $order_id) {
			$ordeID = $order_id;
		}


	$address = ($_POST['address']);
	$buyer_id = ($_POST['buyer_id']);
	$buyer_name = ($_POST['buyer_name']);
	$phone_number = ($_POST['phone_number']);
	$deliv_address = ($_POST['deliv_address']);


	$id = ($_POST['id']);
	$product_number =($_POST['product_number']);
	$seller_id = ($_POST['seller_id']);
	// $storedFile="images/".basename($_FILES['photo']["name"]);
	// move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);
	$photo=($_POST['photo']);
	$name = ($_POST['name']);
	$description=($_POST['description']);
	$seller_name=($_POST['seller_name']);
	$location=($_POST['location']);
	$quantity =($_POST['quantity']);
	$price =($_POST['price']);
	$stocks = ($_POST['stocks']);
	$category = ($_POST['category']);
	$totalprice=($quantity * $price);
	$totalstocks =($stocks-$quantity);
	

	if ($deliv_address == null) {
		echo "<script>alert('Please complete your information! ');document.location='b_profile2.php'</script>";
	}
	elseif ($quantity >= 1) {
		$query= "INSERT INTO tbl_check(product_id,buyer_id,seller_id,product_number,order_id,category,photo,name,description,location,quantity,stocks,price,total_price,seller_name,phone_number,deliv_address,address,buyer_name) 
			VALUES('$id','$buyer_id','$seller_id','$product_number','$ordeID','$category','$photo','$name','$description','$location','$quantity','$stocks','$price','$totalprice','$seller_name','$phone_number','$deliv_address','$address','$buyer_name')";
					mysqli_query($connection, $query);

					header('location: b_checkout.php');
					
	}

	
}


	
	// if ($quantity >= 1) {
	// 	$id = $_POST['id'];
	// 	mysqli_query($connection, "UPDATE tbl_product
 //    	SET stocks='$totalstocks' WHERE id=$id");
	// }


//UPDATE QUANTITY
if (isset($_POST['updatequantity'])) {
		
		$id=$_POST['id'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];

		$total=($quantity*$price);

	mysqli_query($connection,"UPDATE tbl_check SET quantity = '$quantity', total_price = '$total' WHERE id = '$id'")or die(mysqli_error());
	header('location: b_shop.php');
	}	


//SELECT ITEMS BEFORE BUYING PRODUCTS
if (isset($_POST['proceed']))
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item First! ');document.location='b_checkout.php'</script>";
		}	
	else {
		echo "<script>alert('Thank you Item First! ');document.location='b_checkout.php'</script>";
		}
}



//DELETION OF PRODUCT

if (isset($_POST['delete']))
	
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item to delete First! ');document.location='b_checkout.php'</script>";
		}	
	else {
		$chkarr = $_POST['choose'];
		foreach ($chkarr as $id) {
		mysqli_query($connection,"DELETE FROM tbl_check WHERE id=$id");

	}
		header("location: b_checkout.php");
		}
}

//DELETE RECORD IN CART PAGE

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($connection,"DELETE FROM tbl_check WHERE id=$id");
	header('location: b_checkout.php');
}


if (isset($_POST['sen_reports'])) {
	$name=($_POST['name']);
	$message =($_POST['message']);
	$reported_time =($_POST['reported_time']);

	$query= "INSERT INTO tbl_report(name,reason,reported_time) 
					VALUES('$name','$message','$reported_time')";
					mysqli_query($connection, $query);
					header('location: b_index.php');

}

if (isset($_POST['report_seller'])) {
	$Buyer=($_POST['utype']); //value is Buyer
	$name=($_POST['name']);
	$name_of_seller=($_POST['name_of_seller']);
	$message =($_POST['message']);
	$reported_time =($_POST['reported_time']);

}


if (isset($_POST['send_message'])) {
	$name=($_POST['name']);
	$subject=($_POST['subject']);
	$message =($_POST['message']);
	$reported_time =($_POST['reported_time']);


	$query= "INSERT INTO tbl_contact(name,subject,message,reported_time) 
					VALUES('$name','$subject','$message','$reported_time')";
					mysqli_query($connection, $query);
					header('location: b_index.php');

}

//RATINGS PART
// $one=1;
// $two=2;
// $three=3;
// $four=4;
// $five=5;
// $value = 1;

// if (isset($_POST['send_rate']))
// {
//     $id = ($_POST['id']);
//     $user=($_POST['user']);
//     $plant=($_POST['plant']);
//     $rating = $_POST["rating"];
//     $exp = $_POST['exp'];
//     $com_time = $_POST['com_time'];



//     // if ($rating == 1) {
//     //   $sql = "INSERT INTO ratee (rate,exp,com_time,one) VALUES ('$rating','$exp','$com_time','$one')";
//     // mysqli_query($conn, $sql);
//     // header("location: modal.php");
//     // }

//      $sql = "INSERT INTO tbl_comment(name,product_id,plant,ratings,comment,comment_time) VALUES ('$user','$id','$plant','$rating','$exp','$com_time')";
//     mysqli_query($connection, $sql);
//     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";

// }
// //end
$value=1;


if (isset($_POST['back'])) {
	$id = ($_POST['id']);
	echo "<script>document.location='b_buy.php?buy=$id'</script>";	
}
elseif (isset($_POST['postcomment'])) {

	$id = ($_POST['id']);
    $user=($_POST['user']);
    $plant=($_POST['plant']);
    $rating = $_POST["rating"];
    $exp = $_POST['exp'];
    $com_time = $_POST['com_time'];
    $profile = $_POST['profile'];




     if ($rating  >= 0 && $rating <= 1.4) {
     $sql = "INSERT INTO tbl_comment(name,product_id,profile,plant,ratings,comment,comment_time,one) 
      VALUES ('$user','$id','$profile','$plant','$rating','$exp','$com_time','$value')";
    mysqli_query($connection, $sql);
     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 1.5 && $rating <= 2.4) {
    	$sql = "INSERT INTO tbl_comment(name,product_id,profile,plant,ratings,comment,comment_time,two) 
      VALUES ('$user','$id','$profile','$plant','$rating','$exp','$com_time','$value')";
    mysqli_query($connection, $sql);
     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 2.5  && $rating <= 3.4) {
    	$sql = "INSERT INTO tbl_comment(name,product_id,profile,plant,ratings,comment,comment_time,three) 
      VALUES ('$user','$id','$profile','$plant','$rating','$exp','$com_time','$value')";
    mysqli_query($connection, $sql);
     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 3.5  && $rating <= 4.4) {
    	$sql = "INSERT INTO tbl_comment(name,product_id,profile,plant,ratings,comment,comment_time,four) 
      VALUES ('$user','$id','$profile','$plant','$rating','$exp','$com_time','$value')";
    mysqli_query($connection, $sql);
     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";
    }
    else{
    	$sql = "INSERT INTO tbl_comment(name,product_id,profile,plant,ratings,comment,comment_time,five) 
      VALUES ('$user','$id','$profile','$plant','$rating','$exp','$com_time','$value')";
    mysqli_query($connection, $sql);
     echo "<script>alert('Thank you for your Feedback! ');document.location='b_buy.php?buy=$id'</script>";
    }





}

if (isset($_POST['send_stars']))
{
    $id = ($_POST['id']);
    $plant=($_POST['plant']);
    $rating = $_POST["rating"];


    if ($rating  >= 1 && $rating <= 1.4) {
     $sql = "INSERT INTO tbl_stars(product_id,plant,stars,one) VALUES ('$id','$plant','$rating','$value')";
    mysqli_query($connection, $sql);
    echo "<script>alert('Thank you for your Ratings! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 1.5 && $rating <= 2.4) {
    	 $sql = "INSERT INTO tbl_stars(product_id,plant,stars,two) VALUES ('$id','$plant','$rating','$value')";
    mysqli_query($connection, $sql);
    echo "<script>alert('Thank you for your Ratings! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 2.5  && $rating <= 3.4) {
    	 $sql = "INSERT INTO tbl_stars(product_id,plant,stars,three) VALUES ('$id','$plant','$rating','$value')";
    mysqli_query($connection, $sql);
    echo "<script>alert('Thank you for your Ratings! ');document.location='b_buy.php?buy=$id'</script>";
    }
    elseif ($rating  >= 3.5  && $rating <= 4.4) {
    	$sql = "INSERT INTO tbl_stars(product_id,plant,stars,four) VALUES ('$id','$plant','$rating','$value')";
    mysqli_query($connection, $sql);
    echo "<script>alert('Thank you for your Ratings! ');document.location='b_buy.php?buy=$id'</script>";
    }
    else{
    	$sql = "INSERT INTO tbl_stars(product_id,plant,stars,five) VALUES ('$id','$plant','$rating','$value')";
    mysqli_query($connection, $sql);
    echo "<script>alert('Thank you for your Ratings! ');document.location='b_buy.php?buy=$id'</script>";
    }

   

}

//============================================================

// if (isset($_POST['btncheck'])) {
// 	$id = ($_POST['id']);
// 	$storedFile="images/".basename($_FILES['photo']["name"]);
// 	move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);
// 	$photo=($_POST['photo']);
// 	$name = ($_POST['name']);
// 	$description=($_POST['description']);
// 	$location=($_POST['location']);

// 	$price =($_POST['price']);
// 	$quantity =($_POST['quantity']);
// 	$total_price =($_POST['total_price']);
// 	$seller_name =($_POST['seller_name']);

// 	$subtotal =($_POST['subtotal']);
// 	$deliveradd =($_POST['deliveradd']);
// 	$phonenumber =($_POST['phonenumber']);
// 	$order_time =($_POST['order_time']);
// 	$category = ($_POST['category']);

// 	$numbers = ($_POST['numbers']);

// 	for ($i=0; $i<$numbers ; $i++) { 
// 		$sql = "INSERT INTO tbl_buy (category,photo,name,description,location,price,quantity,total_price,seller_name,subtotal,deliver_address,phone_number,order_time) VALUES 
// 		('$category[$i]','$photo[$i]','$name[$i]','$description[$i]','$location[$i]','$price[$i]','$quantity[$i]','$total_price[$i]','$seller_name[$i]','$subtotal[$i]',
// 		'$deliveradd[$i]','$phonenumber[$i]','$order_time[$i]');";
// 		$connection -> query($sql);
// 		header('location: b_checkout.php');
// 	}


// }

//==============
if (isset($_POST['btncheck'])) {

	$order_id = ($_POST['order_id']);

	$is_checked = ($_POST['is_checked']);

	$id = ($_POST['id']);
	$address = ($_POST['address']);
	$seller_id = ($_POST['seller_id']);
	$buyer_name = ($_POST['buyer_name']);
	$buyer_id = ($_POST['buyer_id']);

	$product_id = ($_POST['product_id']);

	$phone_number = ($_POST['phone_number']);
	$deliv_address = ($_POST['deliv_address']);
	$stocks = ($_POST['stocks']);

	$product_number = ($_POST['product_number']);

	$storedFile="images/".basename($_FILES['photo']["name"]);
	move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);
	$photo=($_POST['photo']);
	$name = ($_POST['name']);
	$description=($_POST['description']);
	$location=($_POST['location']);

	$price =($_POST['price']);
	$quantity =($_POST['quantity']);
	$total_price =($_POST['total_price']);
	$seller_name =($_POST['seller_name']);

	$subtotal =($_POST['subtotal']);
	$deliveradd =($_POST['deliveradd']);
	
	$order_time =($_POST['order_time']);
	$category = ($_POST['category']);

	$numbers = ($_POST['numbers']);

	$order_time = ($_POST['order_time']);
	
	for ($i=0; $i<$numbers ; $i++) {
		// echo "<script>console.log(" . $is_checked[$i] . ")</script>"; 
		// echo "<script>alert(" . $is_checked[$i] . ")</script>";
		$position = $i+1;
		if (in_array($position, $is_checked)) {
			$sql = "INSERT INTO tbl_buy (seller_id,buyer_id,product_id,product_number,order_id,category,photo,name,description,location,price,quantity,stocks,total_price,seller_name,buyer_name,order_time,address_deliver,address,phone_number) VALUES 
		('$seller_id[$i]','$buyer_id[$i]','$product_id[$i]','$product_number[$i]','$order_id[$i]','$category[$i]','$photo[$i]','$name[$i]','$description[$i]','$location[$i]','$price[$i]','$quantity[$i]','$stocks[$i]','$total_price[$i]','$seller_name[$i]','$buyer_name[$i]','$order_time[$i]','$deliv_address[$i]','$address[$i]','$phone_number[$i]');";


		$connection -> query($sql);
		header('location: b_profile.php');

		}
		
	}



}
if (isset($_POST['btncheck'])) {
	mysqli_query($connection,"DELETE * FROM tbl_check");
	header('location: b_profile.php');
}

//Status PART
	if (isset($_GET['userID'])) {

	$id=$_GET['userID'];
	$sql="UPDATE tbl_buy SET status='2' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		
		header('location: s_order.php');
	}
}
if (isset($_GET['userIDD'])) {

	$id=$_GET['userIDD'];
	$sql="UPDATE tbl_buy SET status='1' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		header('location: s_order.php');
	}
}

// ============= REPORT FUNCTION=======
// if (isset($_POST['report'])) {
// 	$seller_id =$_POST['seller_id'];
// 	$name=$_POST['name'];
// 	$seller_name=$_POST['seller_name'];
// 	$reason=$_POST['reason'];
// 	$reported_time =($_POST['reported_time']);

// 	$sql = "INSERT INTO tbl_report(seller_id,name,seller_name,reason,reported_time) VALUES 
// 	('$seller_id','$name','$seller_name','$reason','$reported_time')";
//     mysqli_query($connection, $sql);
//     echo "<script>alert('Report Successful! ');document.location='b_shop.php'</script>";

// }

// ============= REPORT FUNCTION=======

if(isset($_POST['report']))
	
{
	if (!isset($_POST['prodid'])) 
	{
		$product_id=$_POST['product_id'];
		echo "<script>alert('Select reason to Report! ');document.location='b_buy.php?buy=$product_id'</script>";
	}

else{
	$checked_array=$_POST['prodid'];
	foreach ($_POST['reason'] as $key => $value) 
{

if(in_array($_POST['reason'][$key], $checked_array))
	{
	$product_id=$_POST['product_id'];[$key];	
	$reason=$_POST['reason'][$key];
	$seller_id=$_POST['seller_id'][$key];
	$sellername=$_POST['sellername'][$key];
	$buyername=$_POST['buyername'][$key];
	$reported_time=$_POST['reported_time'][$key];


	$sql="INSERT INTO `tbl_report`(`seller_id`,`name`, `seller_name`,`reason`,`reported_time`) 
				VALUES ('$seller_id','$buyername','$sellername','$reason','$reported_time')";
	  mysqli_query($connection, $sql);
    echo "<script>alert('Report Successful! ');document.location='b_buy.php?buy=$product_id'</script>";
	}
	
	
}


}

}



//update profile
if (isset($_POST['update_profile'])) {
	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$delivaddress=$_POST['delivaddress'];

	$storedFile="profile/".basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES['file']['tmp_name'], $storedFile);
    $imageFileType = strtolower(pathinfo($storedFile,PATHINFO_EXTENSION));

  
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
	header('location: b_profile2.php');
}

?>

