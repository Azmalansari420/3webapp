<?php 
// error_reporting(0);

include_once '../lib/all_files.php';

$fetch_game = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");
$response_data[] = array(
	"id"=>"",
	"name"=>"",
	"result_time"=>"",
	"next_result"=>"",
	"result"=>"",
	"image"=>"",
	"current_date"=>"",
);

if(is_array($fetch_game) || is_object($fetch_game))
{
	$response_data = array();
	foreach ($fetch_game as $row) {


		$date = date("Y-m-d");
		$value = $con->all_fetch("number",array("game_id"=>$row->id,"create_on"=>$date,),"order by id desc limit 1");
		$time_dd = "NA";
		$next_time_dd = 'Last result';
		if(!empty($value))
		{
			$value = $value[0];
			$result = $value->number;
			$next_time = $con->all_fetch("game_times",array("game_id"=>$row->game_id,)," and game_time_id>$value->game_time_id  order by id desc limit 1");





			$ctime = strtotime(date("h:i a"));
			$ntime = $next_time->time_string;
			$time_detail = $con->all_fetch("all_times",array("id"=>$value->game_time_id,)," and time_string>='$ctime' and time_string<='' order by id desc limit 1");


			if(!empty($time_detail))
			{
				$time_detail = $time_detail[0];
				$time_dd = $time_detail->time;
			}
			if($next_time!=0)
			{
				$next_time = $next_time[0];
				$next_time_dd = fs("all_times",array("id"=>$next_time->game_time_id,))->time;
			}

		}
		else
		{
			$result = "NA";
		}


		$response_data[] = array(
			"id"=>"$row->id",
			"name"=>"$row->name",
			"result_time"=>"$time_dd",
			"next_result_time"=>"$next_time_dd",
			"result"=>"$result",
			"image"=>BASE_URL.'upload/'.$row->image,
			"current_date"=>date("Y-m-d"),
		);
	}

	$data['status'] = "200";
	$data['message'] = "Fetch successfully";
	$data['data'] = $response_data;
}
else
{
	$data['status'] = "400";
	$data['message'] = "Fetch not successfully";
	$data['data'] = $response_data;
}
echo json_encode($data);
 ?>