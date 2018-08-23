<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
        "name" => $_REQUEST['name'],
        "tel" => $_REQUEST['tel'],
        "mobile" => $_REQUEST['mobile'],
        "level" => $_REQUEST['level'],
        "address" => $_REQUEST['address'],
        "memo" => $_REQUEST['memo']
    );
    $db->startTransaction();
    $db->where ('id', $_REQUEST['id']);
    if ($db->update ('customs', $data)) {
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>