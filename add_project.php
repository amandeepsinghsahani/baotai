<?php
    include "includes/init.php";
    $data_message = array();
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
    return $data_message;
?>