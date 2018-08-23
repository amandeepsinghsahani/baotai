<?php
    include "includes/init.php";
    $data_message = array();
    $db->where ('id', $_POST["id"]);
    $user = $db->getOne ("customs");
    $level = '潛在會員';
    if($user['level'] == 'order'){
        $level = '已訂客';
    }else if($user['level'] == 'buy'){
        $level = '已購客';
    }else  if($user['level'] == 'refund'){
        $level = '退戶';
    }
    $user['level'] = $level;
    echo json_encode($user);
?>