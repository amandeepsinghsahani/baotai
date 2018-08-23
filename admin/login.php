<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
	if($_POST['account'] != null || $_POST['password'] != null){
		$db->where ('account', $_POST['account']);
		$db->where ('password', $_POST['password']);
		$pro = $db->getOne ('manager');
		if($pro){
			//print_r($pro);
			session_start();
			$_SESSION['user_account'] = $pro["account"];
			$_SESSION['user_id'] = $pro["id"];
			$_SESSION['user_name'] = $pro['name'];
			header("Location: project.php");
		}else
			userMessage("帳號或密碼錯誤","login.html");
	}else
		header("Location: login.html");
?>