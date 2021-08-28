<?php
include ("login_server.php");


$quantity=$_POST['quantity'];
$stocks=$_POST['stocks'];
$product_number=$_POST['product_number'];


$updated_stocks=$stocks-$quantity;
$sql = "UPDATE tbl_product SET stocks='$updated_stocks' WHERE product_number = '$product_number'";
mysqli_query($db,$sql);


?>