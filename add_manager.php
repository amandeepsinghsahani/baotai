<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
                    "name" => $_REQUEST['name']
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
    return $data_message;
?>