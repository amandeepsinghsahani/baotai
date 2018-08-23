<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
	if($_POST['account'] != null || $_POST['password'] != null){
		$db->where ('account', $_POST['account']);
		$db->where ('password', $_POST['password']);
		$pro = $db->getOne ('manager');
		if($pro){
			//print_r($pro);
			if($pro['type'] === 'admin' || $pro['type'] ==='finance' || $pro['type'] ==='construction'){
				session_start();
				$_SESSION['user_account'] = $pro["account"];
				$_SESSION['user_id'] = $pro["id"];
				$_SESSION['user_name'] = $pro['name'];
				$_SESSION['user_type'] = $pro['type'];
				if($_SESSION['user_type'] === 'admin'){
					header("Location: project.php");
				}else{
					header("Location: service.php");
				}
			}else{
				userMessage("此帳號無登入的權限","login.html");
			}
		}else
			userMessage("帳號或密碼錯誤","login.html");
	}else
		header("Location: login.html");
?>