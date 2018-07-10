<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
        "name" => $_REQUEST['name'],
        "team" => $_REQUEST['team']
    );
    $db->startTransaction();
    $db->where ('id', $_REQUEST['id']);
    if ($db->update ('project', $data)) {
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>