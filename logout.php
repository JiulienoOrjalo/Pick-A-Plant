<?php
include('login_server.php');
	ob_start();
	session_start();
	ob_end_clean();

if (isset($_SESSION['username'])) {
	$session_user = $_SESSION['username'];
		$status="Offline Now";
		$sql = mysqli_query($db, "UPDATE tbl_register SET status2 = '{$status}' WHERE username='$session_user'");
		session_destroy();
		header("location:index.php");
}
		

?>