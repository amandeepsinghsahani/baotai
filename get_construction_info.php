<?php
    include "includes/init.php";
    $data_message = array();
    $db->where ('id', $_POST["id"]);
    $user = $db->getOne ("manager");
    echo json_encode($user);
?>