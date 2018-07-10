<?
    include "includes/init.php";
    $data_message = array();
    $db->where ('id', $_POST["id"]);
    $user = $db->getOne ("customs");
    echo json_encode($user);
?>