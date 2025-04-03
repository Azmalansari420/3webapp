<?php
if (isset($_POST)) {
	include_once("../lib/all_files.php");
	// $_REQUEST['product_name'];
    $select = $con->all_fetch("game_times",array("game_id"=>$_REQUEST['id'],),"order by time asc");
    // print_r($select);
    echo '<option value="0">-- Select Time --</option>';
    foreach ($select as $key => $row){

    	$fs = fs("all_times",array("id"=>$row->game_time_id,));

    	echo '<option value="'.$row->id.'">'.date("h:i a",strtotime($fs->time)).'</option>';
    }
}
?>