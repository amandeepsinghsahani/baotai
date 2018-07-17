<?php
    include "includes/init.php";
    $data_message = array();
    $db->where ('s_id', $_POST["sid"]);
    $db->orderBy ("date","desc");
    $res = $db->get ("service_status");
    echo json_encode($res);
?>