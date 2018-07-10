<?php
    include "includes/init.php";
    $data = array();
    $params = array ($_REQUEST['name'],$_REQUEST['tel'],$_REQUEST['mobile']);
	$sql = "SELECT * FROM customs WHERE name = ? OR mobile = ? OR tel = ?";
	$customs = $db->rawQuery ($sql, $params);
    $ii=0;
    $data['custom'] = $customs ;
    if(count($customs) > 0 ){
         $params1 = array ($customs[0]['id']);
        $sql1 = "SELECT visit.*, manager.name as mname , project.name as pname 
        FROM visit,manager,project 
        WHERE visit.c_id = ? AND visit.manager = manager.id AND  project.id = visit.project";
        $visits = $db->rawQuery ($sql1, $params1);
        $data['visit'] = $visits ;
    }
	echo json_encode($data);
?>