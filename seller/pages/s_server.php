<?php
	$connection=mysqli_connect("localhost","root","","pick_a_plant");

$result = mysqli_query($connection, "SELECT * FROM tbl_product");

if (isset($_GET['profilebuyer'])) {
    $id = $_GET['profilebuyer'];
    $query = "SELECT * FROM tbl_register WHERE  id='$id'";
    $query_run = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM tbl_ratebuyer WHERE  buyer_id='$id'";
    $query_run2 = mysqli_query($connection, $query2);
}
//RATINGS FOR BUYER
if (isset($_POST['rate'])) {


    $buyerid=$_POST['buyerid'];
    $buyername=$_POST['buyername'];
    $ratings=$_POST['rating'];
    $value=1;

     if ($ratings == 1) {
    $sql="INSERT INTO tbl_ratebuyer(buyer_id,buyer_name, ratings,one) 
                VALUES ('$buyerid','$buyername','$ratings','$value')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Rate Successful ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }
    elseif ($ratings == 2) {
    $sql="INSERT INTO tbl_ratebuyer(buyer_id,buyer_name, ratings,two) 
                VALUES ('$buyerid','$buyername','$ratings','$value')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Rate Successful ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }
    elseif ($ratings == 3) {
    $sql="INSERT INTO tbl_ratebuyer(buyer_id,buyer_name, ratings,three) 
                VALUES ('$buyerid','$buyername','$ratings','$value')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Rate Successful ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }
    elseif ($ratings == 4) {
    $sql="INSERT INTO tbl_ratebuyer(buyer_id,buyer_name, ratings,four) 
                VALUES ('$buyerid','$buyername','$ratings','$value')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Rate Successful ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }
    elseif ($ratings == 5) {
    $sql="INSERT INTO tbl_ratebuyer(buyer_id,buyer_name, ratings,five) 
                VALUES ('$buyerid','$buyername','$ratings','$value')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Rate Successful ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }




}

if (isset($_POST['add_plants'])) {
		//get the inputs
		// $drama_id=$_POST['drama_id'];

		$product_number = $_POST['product_number'];

		if ($product_number == $product_number) {
			$prodid = $product_number;
		}



		$storedFile="images/".basename($_FILES['file']["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"],$storedFile);


		$name=$_POST['name_of_plants'];
		$description=$_POST['description'];
		$location=$_POST['location'];
		$category=$_POST['category'];
		// $family=$_POST['family'];
		// $origin=$_POST['origin'];
		$sale=$_POST['sale'];
		$price=$_POST['price'];
		$stocks=$_POST['stocks'];
		$selname=$_POST['selname'];
		$seller_id = $_POST['seller_id'];


		$discount = ($price-($price*$sale/100));

	
		//insert into DB
$query = "INSERT INTO tbl_product (seller_id,product_number,category,photo, name, description, location, sale, price, new_price ,stocks, seller_name) 
			VALUES ('$seller_id','$prodid','$category','$storedFile', '$name','$description', '$location','$sale','$price','$discount','$stocks', '$selname')";
				mysqli_query($connection, $query);	
				
	header('location: s_products.php');

	}

$result = mysqli_query($connection, "SELECT * FROM tbl_product");



if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($connection,"DELETE FROM tbl_product WHERE id=$id");
	header('location: s_index.php');
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$imageCH ="images/".basename($_FILES['imageCH']['name']);
	$oldimage=$_POST['oldimage'];

	$name = $_POST['name'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$family = $_POST['family'];
	$origin = $_POST['origin'];
	$sale =$_POST['sale'];
	$price = $_POST['price'];
	$stocks = $_POST['stocks'];
	$category=$_POST['category'];


$discount = ($price-($price*$sale/100));
	


  if (isset($_FILES['imageCH']['name'])&&($_FILES['imageCH']['name']!="")){
    $newimage ="images/".basename($_FILES['imageCH']['name']);
    unlink($oldimage);
    move_uploaded_file($_FILES['imageCH']['tmp_name'], $newimage);
  }
  else{
    $newimage=$oldimage;
  }


$query ="UPDATE tbl_product SET photo='$newimage', name='$name', description='$description', location='$location', family='$family',
origin='$origin', price='$price', stocks='$stocks', sale='$sale' , new_price='$discount', category='$category' WHERE id='$id'";
$query_run = mysqli_query($connection, $query);

	 header('location: s_products.php');

}


if (isset($_POST['deleteconcern']))
	
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item to delete First! ');document.location='s_products.php'</script>";
		}	
	else {
		$chkarr = $_POST['choose'];
		foreach ($chkarr as $id) {
		mysqli_query($connection,"DELETE FROM tbl_product WHERE id=$id");

	}
		header("location: s_products.php");
		}
}

//DELETE ORDERS

if (isset($_POST['deleteorders']))
	
{
	if (!isset($_POST['choose'])) 
		{
		echo "<script>alert('Select Item to delete First! ');document.location='s_order.php'</script>";
		}	
	else {
		$chkarr = $_POST['choose'];
		foreach ($chkarr as $id) {
		mysqli_query($connection,"DELETE FROM tbl_buy WHERE id=$id");

	}
		header("location: s_order.php");
		}
}


//Adding Categories
if (isset($_POST['add_category'])) {

		$category=$_POST['category'];
		

$query = "SELECT * FROM tbl_category ORDER BY id DESC";
$resultcategory = mysqli_query($connection, $query);
$count = mysqli_num_rows($resultcategory);


if (($count > 0)) {
		echo "<script>alert('Category Already Exist! ');document.location='s_add_category.php'</script>";
}

else{

$query = "INSERT INTO tbl_category(category)VALUES ('$category')";
		mysqli_query($connection, $query);	
				
	header('location: s_categories.php');

}

}

//Delete Categories
	if (isset($_GET['remdcategory'])) {
			 	$id = $_GET['remdcategory'];
			 	mysqli_query($connection,"DELETE FROM tbl_category WHERE id=$id");
				header('location: s_categories.php');
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
	$stocks=$_POST['stocks'];
	$quantity=$_POST['quantity'];
	$totals=((int)$stocks-(int)$quantity);

	$sql="UPDATE tbl_buy SET status='1', stocks='$totals' WHERE id='$id'";

	

	if (mysqli_query($connection,$sql)) {
		header('location: s_order_confirm.php');
	}
}

if (isset($_GET['userreceive'])) {

	$id=$_GET['userreceive'];

	$sql="UPDATE tbl_buy SET status='3' WHERE id='$id'";

	if (mysqli_query($connection,$sql)) {
		header('location: s_order_confirm.php');
	}
}



//Rate the Buyer
if(isset($_POST['report']))

{
    if (!isset($_POST['prodid'])) 
    {
        $buyerid=$_POST['buyerid'];
        echo "<script>alert('Select reason to Report! ');document.location='s_buyer_report.php?profilebuyerreport=$buyerid'</script>";
    }

else{
    $checked_array=$_POST['prodid'];
    foreach ($_POST['reason'] as $key => $value) 
{

if(in_array($_POST['reason'][$key], $checked_array))
    {
        $buyerid=$_POST['buyerid'];
        $buyer_id=$_POST['buyer_id'][$key];
        $sellername=$_POST['sellername'][$key];
        $buyername=$_POST['buyername'][$key];
        $reason=$_POST['reason'][$key];



    $sql="INSERT INTO tbl_reportbuyer(buyer_id,name, buyer_name,reason) 
                VALUES ('$buyer_id','$sellername','$buyername','$reason')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Report Successful! ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";
    }


}


}

}

if (isset($_POST['reportothers']))
{
        $buyerid=$_POST['buyerid'];
        $buyer_id=$_POST['buyer_id'];
        $sellername=$_POST['sellername'];
        $buyername=$_POST['buyername'];
        $others=$_POST['others'];

        $sql="INSERT INTO tbl_reportbuyer(buyer_id,name, buyer_name,reason) 
                VALUES ('$buyer_id','$sellername','$buyername','$others')";
      mysqli_query($connection, $sql);
    echo "<script>alert('Report Successful! ');document.location='s_buyer_profile.php?profilebuyer=$buyerid'</script>";


}


?>

