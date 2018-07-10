<?php
    include "includes/init.php";
    $data_message = "success";
    $db->startTransaction();
    $db->where ('id', $_POST["id"]);
    if ($db->delete ("project")){
        $db->commit();
    }else{
        $db->rollback();
        $data_message  = "failure";
    }
    return $data_message;
?>