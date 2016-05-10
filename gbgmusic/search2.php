<?php

//if($_POST)
//{
//$svalue=$_POST['sfield'];
//echo $svalue;
//}

//date_default_timezone_set("Europe/Stockholm");
$json = file_get_contents('events.json.php');
$json = strtolower($json);
global $data;
$data = json_decode($json, true);


$searchterm = '';
$searchterm = isset($_POST['sfield']) ? $_POST['sfield'] : '';
$searchterm = strtolower($searchterm);
$sresultband = '';
$sresultband = array_filter($data['result'], function($data) use ($searchterm) {
  return $data['bandname'] == $searchterm;
});

foreach($sresultband as $r) {
      $timestart = "@".substr($r['start'], 0, -3);
      $startdate = new Datetime($timestart);
      $startdate->setTimeZone(new DateTimeZone('Europe/Stockholm'));
      $genre = substr($r['class'], 6);
      echo "<b>Bandname:</b> ".$r['bandname']."&nbsp;&nbsp; <b>Genre:</b> ".$genre."<br> <b>Location:</b> ".$r['location']."&nbsp;&nbsp; <b>Price:</b> ".$r['price']."<br> <b>Tid:</b> ".$startdate->format('Y-m-d H:i').$r['price']."<br> <b>Description:</b>.".$r['description']."<br><hr>";
   
}




?>