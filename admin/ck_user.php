<?php
	session_start();
	if(!(isset($_SESSION['user_account']))){
		header("Location: login.php");
	}
?>	