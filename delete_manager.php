<?php
    include "includes/init.php";
    $data_message = array();
    $db->startTransaction();
    $db->where ('id', $_POST["id"]);
    if ($db->delete ("manager")){
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>