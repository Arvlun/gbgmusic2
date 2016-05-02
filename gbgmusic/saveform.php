<?php

//$start=$_POST['start'];
//echo strtotime($start), "000\n";
date_default_timezone_set("Europe/Stockholm");
$json = file_get_contents('events.json.php');
$data = json_decode($json, true);
$starttime = strtotime($_POST['start'])."000";
$endtime = strtotime($_POST['end'])."000";
array_push($data['result'], array(
      'id'=> $_POST['id'],
      'title'=> $_POST['title'],
      'url'=> $_POST['url'],
      'class'=> $_POST['class'],
      'location'=> $_POST['location'],
      'bandname'=> $_POST['bandname'],
      'price'=> $_POST['price'],
      'start'=> $starttime,
      'end'=> $endtime));
file_put_contents('events.json.php', json_encode($data, JSON_PRETTY_PRINT));	

header("Location: index.html",TRUE,302);	
?>