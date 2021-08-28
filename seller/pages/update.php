<?php
include ("login_server.php");

$id = $_POST['id'];
$status=0;

$sql = "UPDATE messages SET status='$status' WHERE incoming_msg_id = '$id'";
mysqli_query($db,$sql);


?>