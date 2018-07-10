<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
        "from_custom" => $_REQUEST['from_custom'],
        "content" => $_REQUEST['content'],
        "stype" => $_REQUEST['stype'],
        "sitem" => $_REQUEST['sitem'],
    );
    $db->startTransaction();
    $m_id = $db->insert ('service', $data);
    if ($m_id) {
        $db->commit();
        $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>