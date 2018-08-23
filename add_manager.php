<?php
    include "includes/init.php";
    $data_message = array();
    $sql = "SELECT id
    FROM manager
    WHERE account = ? ";
    //echo  $sql;
    $lists = $db->rawQuery($sql,array($_REQUEST['account']));
    if(count($lists) > 0){
        $data_message['message']  = "repeat";
    }else{
        $data = array (
            "name" => $_REQUEST['name'],
            "account" => $_REQUEST['account'],
            "password" => $_REQUEST['password'],
            "type" => $_REQUEST['type']
        );
        $db->startTransaction();
        $m_id = $db->insert ('manager', $data);
        if ($m_id) {
            $db->commit();
            $data_message['message']  = "success";
        }else{
            $db->rollback();
            $data_message['message']  = "failure";
        }
    }
    echo json_encode($data_message);
?>