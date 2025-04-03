<?php 
// error_reporting(0);
include_once '../lib/all_files.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fetch_game = $con->all_fetch("all_times", array('status' => "Yes",), "order by id asc");

foreach ($fetch_game as $row)
{
	$time = $row->time;
	$con->update("game_times",array("time2"=>$time,),array("game_time_id"=>$row->id,));
	// $value = fs("all_times",array("id"=>$row->game_time_id,));


}


?>