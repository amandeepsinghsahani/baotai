<?php
    include "includes/init.php";
    $data_message = array();

    $data = array (
        "s_id" => $_REQUEST['sid'],
        "content" => $_REQUEST['content']
    );
    $db->startTransaction();
    $m_id = $db->insert ('service_status', $data);
    if ($m_id) {
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>