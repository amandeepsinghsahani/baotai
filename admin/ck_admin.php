<?php
	if($_SESSION['user_type'] !== 'admin'){
		echo"<script>alert('無權限');history.go(-1);</script>"; 
	}
?>	