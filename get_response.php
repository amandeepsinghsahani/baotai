<?php
    include "includes/init.php";
    $data_message = array();
    $sql = "SELECT service_status.* , manager.name as mname, manager.account as maccount
        FROM service_status ,  manager
        WHERE service_status.s_id = ? 
        AND service_status.from_construction = manager.id
        ORDER BY service_status.date DESC";
    $res = $db->rawQuery($sql,array($_POST['sid']));
    echo json_encode($res);
?>