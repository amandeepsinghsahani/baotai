<?php 
	session_start(); 
	header("Content-Type:text/html; charset=utf-8");
	//將session清空
	unset($_SESSION['user_account']);
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_type']);
	echo '登出中......';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
?>