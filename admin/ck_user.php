<?php
	session_start();
	if(!(isset($_SESSION['user_account']))){
		header("Location: login.php");
	}else{
		if(!($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] =='finance' || $_SESSION['user_type'] =='construction')){
			header("Location: login.php");
		}
	}
?>	