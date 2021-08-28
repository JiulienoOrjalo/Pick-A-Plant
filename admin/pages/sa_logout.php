<?php
	ob_start();
	session_start();
	ob_end_clean();

	if (isset($_SESSION['username'])) {
		$session_user = $_SESSION['username'];
	}else{
		ob_start();
		header('location: sa_login.php');
		ob_clean_end();
	}
	session_destroy();
	header('location: sa_login.php');

?>