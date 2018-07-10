<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
        "name" => $_REQUEST['name']
    );
    $db->startTransaction();
    $db->where ('id', $_REQUEST['id']);
    if ($db->update ('manager', $data)) {
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    return $data_message;
?>