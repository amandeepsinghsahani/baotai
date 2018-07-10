<?php
    include "includes/init.php";
    $data_message = array();
    $sql = "SELECT id
    FROM customs
    WHERE mobile = ? OR tel = ? 
    ORDER BY id DESC";
    //echo  $sql;
    $lists = $db->rawQuery($sql,array($_REQUEST['tel'],$_REQUEST['mobile']));
    //echo count($lists);
    if(count($lists) > 0){
        $data_message['message']  = "repeat";
    }else{
        $data = array (
                    "name" => $_REQUEST['name'],
                    "tel" => $_REQUEST['tel'],
                    "mobile" => $_REQUEST['mobile'],
                    "address" => $_REQUEST['address'],
                    "title"=> $_REQUEST['title'],
        );
        $db->startTransaction();
        $m_id = $db->insert ('customs', $data);
        if ($m_id) {
            $data1 = array (
                        "c_id" => $m_id,
                        "project" => 1,
                        "date" => date("Y-m-d"),
                        "manager" => $_REQUEST['sel_mg']
            );
            $i_id = $db->insert ('visit', $data1);
            if($m_id){
                $db->commit();
                $data_message['message']  = "success";
            }else{
                $db->rollback();
                $data_message['message']  = "failure";
            }
        }else{
            $db->rollback();
            $data_message['message']  = "failure";
        }
    }
    echo json_encode($data_message);
?>