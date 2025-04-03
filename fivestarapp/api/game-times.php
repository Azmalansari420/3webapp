<?php 
// error_reporting(0);

include_once '../lib/all_files.php';





$response_data[] = array(
	"id"=>"",
	"time"=>"",
	"result"=>"",
);

$date111 = $date;
$date = date("Y-m-d",strtotime($date));
$year = date("Y",strtotime($date));

if(!empty($game_id) && !empty($date))
{
	$fetch_game = $con->all_fetch("game_times", array('status' => "Yes","game_id"=>$game_id,), "order by time2 asc");

	// print_r($fetch_game);

	if(is_array($fetch_game) || is_object($fetch_game) || 1==1)
	{
		// $date2 = date("2022-11-20");
		$date2 = date("Y-m-d");
		$time =  date("H:i:s");
		$ctime = strtotime("$date2 $time");
		$response_data = array();
		if($game_id==61 || $game_id==62 || $game_id==63  || $game_id==64  || $game_id==65  || $game_id==66)
		{
			$month = date("F",strtotime($date111));
			$game_result = $con->all_fetch("number",array("game_id"=>$game_id,"month"=>$month,"year"=>$year,)," and time_string<='$ctime' order by time_string asc");


			


			foreach ($game_result as $key => $row)
			{
				$game_result = $row->number;
				$game_time_id = fs("game_times",array("game_id"=>$game_id,))->game_time_id;
				$am_pm = "PM";
				if($game_id==61)
				{
					if($key % 2 == 0){
				        $am_pm = "AM"; 
				    }
				}
				$time_print = "$row->create_on ".date("h:i",strtotime($value->time))." ".$am_pm;
				if($game_id==63  || $game_id==64  || $game_id==65  || $game_id==66)
				{
					$time_print = "$row->create_on";
				}
				

				$value = fs("all_times",array("id"=>$game_time_id,));
				$response_data[] = array(
					"id"=>"$row->id",
					"time"=>$time_print,
					"result"=>"$game_result",
				);
			}
		}
		else
		{
			foreach ($fetch_game as $row)
			{
				$value = fs("all_times",array("id"=>$row->game_time_id,));
				$game_result = $con->all_fetch("number",array("game_id"=>$game_id,"create_on"=>$date,"game_time_id"=>$row->id,"year"=>$year,)," and time_string<='$ctime' order by number_time asc limit 1")[0];
				if(!empty($game_result))
				{
					$game_result = $game_result->number;
				}
				else
				{
					$game_result = "NA";
				}
				if($game_result!='NA')
				{
					$response_data[] = array(
						"id"=>"$row->id",
						"time"=>date("h:i a",strtotime($value->time)),
						"result"=>"$game_result",
					);
				}
			}
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
}
else
{
	$data['status'] = "400";
	$data['message'] = "Enter game id and date";
	$data['data'] = $response_data;
}
echo json_encode($data);
 ?>