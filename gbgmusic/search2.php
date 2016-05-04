<?php

//if($_POST)
//{
//$svalue=$_POST['sfield'];
//echo $svalue;
//}

//date_default_timezone_set("Europe/Stockholm");
$json = file_get_contents('events.json.php');
global $data;
$data = json_decode($json, true);
$searchterm = '';
$searchterm = isset($_POST['sfield']) ? $_POST['sfield'] : '';

$sresultband = '';
$sresultband = array_filter($data['result'], function($data) use ($searchterm) {
  return $data['bandname'] == $searchterm;
});

foreach($sresultband as $r) {
      $timestart = "@".substr($r['start'], 0, -3);
      $startdate = new Datetime($timestart);
      $startdate->setTimeZone(new DateTimeZone('Europe/Stockholm'));
      echo "<b>Bandname:</b> ".$r['bandname']."&nbsp;&nbsp; <b>Location:</b> ".$r['location']."&nbsp;&nbsp; <b>Price:</b> ".$r['price']."&nbsp;&nbsp; <b>Tid:</b> ".$startdate->format('Y-m-d H:i')."<br>";
   
}

?>