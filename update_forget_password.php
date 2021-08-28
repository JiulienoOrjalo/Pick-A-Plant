<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "pick_a_plant";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{




$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password =$_POST['new_password'];
$cpassword=$_POST['confirm_password'];
$hashpassword= password_hash($_POST['new_password'], PASSWORD_DEFAULT);

if ($password==$cpassword) {
$query = mysqli_query($conn,"SELECT * FROM tbl_register WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
	if($row){
	mysqli_query($conn,"UPDATE tbl_register SET  password= '$hashpassword', reset_link_token='' ,exp_date='' WHERE email='" . $emailId . "'");
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password successfully updated');
    window.location.href='index.php';
    </script>");
}
}
else
{
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('something went wrong try again');
    window.location.href='reset_password.php?key=".$emailId."&token=".$token."';
    </script>");
}
}

?>