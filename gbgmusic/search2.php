<?php

//if($_POST)
//{
//$svalue=$_POST['sfield'];
//echo $svalue;
//}

date_default_timezone_set("Europe/Stockholm");
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
//&nbsp;&nbsp;
if ( empty($sresultband)) {
	echo "No bands listed with that name";
} else {
foreach($sresultband as $r) {
      $timestart = "@".substr($r['start'], 0, -3);
      $startdate = new Datetime($timestart);
      $startdate->setTimeZone(new DateTimeZone('Europe/Stockholm'));
      $genre = substr($r['class'], 6);
      $genre = ucwords($genre);
      echo '<div class="well well-sm clearfix">';
      echo "<b>Bandname:</b> ".$r['bandname']."<br>";
      echo "<b>Genre:</b> ".$genre."<br> <b>Location:</b> ".$r['location']."<br> <b>Price:</b> ".$r['price']." SEK<br> <b>Tid:</b> ".$startdate->format('Y-m-d H:i')."<br> <b>Description: </b>".$r['description']."<br>";
      echo '<br><form action="deleteevent.php" method="post">';
      echo '<input type="hidden" value="'.$r['id'].'" name="delbut">';
      echo '<input type="submit" class="pull-left" value="Delete Event"></form>';
      echo '<Button class="pull-left">Update Event</button>';
   	  echo "</div>";

}


}

?>