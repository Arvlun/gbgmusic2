<?php

date_default_timezone_set("Europe/Stockholm");
$json = file_get_contents('events.json.php');
global $data;
$data = json_decode($json, true);
$starttime = strtotime($_POST['start'])."000";
//$endtime = strtotime($_POST['end'])."000";
$titleadd = $_POST['bandname']." @ ".$_POST['location'];
$id = '1';
$tested = array_filter($data['result'], function($data) use ($id) {
  		return $data['id'] == $id;
	});
while (!empty($tested)) {
	//echo $id." tested - finns redan";
	$id++;
	$tested = array_filter($data['result'], function($data) use ($id) {
  		return $data['id'] == $id;
	});
}
$idadd = "".$id;

$description = "No description";
if (isset($_POST['descri'])) { 
  $description = $_POST['descri'];
} 

array_push($data['result'], array(
      'id'=> $idadd,
      'title'=> $titleadd,
      'url'=> $_POST['url'],
      'class'=> $_POST['class'],
      'location'=> $_POST['location'],
      'bandname'=> $_POST['bandname'],
      'price'=> $_POST['price'],
      'description'=> $description,
      'start'=> $starttime,
      'end'=> $starttime));

file_put_contents('events.json.php', json_encode($data, JSON_PRETTY_PRINT));  

header("Location: index.html",TRUE,302);      
?>