<?php
    include "includes/init.php";
    $data_message = array();

    $sql = "SELECT id
    FROM project
    WHERE name = ? ";
    //echo  $sql;
    $lists = $db->rawQuery($sql,array($_REQUEST['name']));
    if(count($lists) > 0){
        $data_message['message']  = "repeat";
    }else{
        $data = array (
            "name" => $_REQUEST['name'],
            "team" => $_REQUEST['team']
        );
        $db->startTransaction();
        $m_id = $db->insert ('project', $data);
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