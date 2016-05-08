<?php

$evid = isset($_POST['delbut']) ? $_POST['delbut'] : '';
$json = file_get_contents('events.json.php');
global $data;
$data = json_decode($json, true);
$arrkey = array_search($evid, array_column($data['result'], 'id'));
unset($data['result'][$arrkey]);
$data['result'] = array_values($data['result']);
//var_dump($data);
file_put_contents('events.json.php', json_encode($data, JSON_PRETTY_PRINT)); 

header("Location: index.html",TRUE,302);   
?>
