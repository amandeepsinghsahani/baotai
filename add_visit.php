<?php
    include "includes/init.php";
    $data_message = array();
    $data = array (
                    "c_id" => $_REQUEST['cid'],
                    "project" => 1,
                    "date" => date("Y-m-d"),
                    "manager" => $_REQUEST['sel_mg']
    );
    $db->startTransaction();
    $m_id = $db->insert ('visit', $data);
    if ($m_id) {
         $db->commit();
            $data_message['message']  = "success";
    }else{
        $db->rollback();
        $data_message['message']  = "failure";
    }
    echo json_encode($data_message);
?>