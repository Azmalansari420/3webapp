<?php 
// error_reporting(0);

include_once '../lib/all_files.php';


// echo strtotime(date("18:30"));


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


		$date = "2022-07-28";
		// $date = date("Y-m-d");
		$time =  date("H:i:s");
		// $time =  date("22:00:00");
		$ctime = strtotime("$date $time");
		$today = date("Y-m-d");
		if($row->id==59 || $row->id==60 || 1==1)
		{
			if($row->id==62)
				$next_result_data = $con->all_fetch("game_times",array("status"=>"Yes","game_id"=>$row->id,)," order by time2 asc limit 1");
			else
				$next_result_data = $con->all_fetch("game_times",array("status"=>"Yes","game_id"=>$row->id,)," and time2>='$time' order by time2 asc limit 1");

			$crrent_time_result = $con->all_fetch("game_times",array("status"=>"Yes","game_id"=>$row->id,)," and time2<='$time' order by time2 desc limit 1");

			
			if($crrent_time_result==0)
			{
				$get_number = $con->all_fetch("number",array("status"=>"Yes","game_time_id"=>0,"game_id"=>$row->id,),"order by id desc");
				if($get_number)
				{
					$result = $get_number[0]->number;
				}
				else
				{
					$result = "NA";
				}
				$time_dd = "";
				$next_time_dd = "";
			}
			else
			{
				if(is_array($crrent_time_result) || is_object($crrent_time_result))
				{
					$get_number = $con->all_fetch("number",array("status"=>"Yes","game_time_id"=>$crrent_time_result[0]->id,"game_id"=>$crrent_time_result[0]->game_id,"create_on"=>$today,));
					
					if($get_number)
					{
						$result = $get_number[0]->number;
					}
					else
					{
						$result = "NA";
					}
					$time_dd = date("h:i a",$crrent_time_result[0]->time);
					$next_time_dd = date("h:i a",$next_result_data[0]->time);
				}
				else
				{
					$time_dd = "NA";
					$next_time_dd = "NA";	
					$result = "NA";
					$value = $con->all_fetch("all_times",array("status"=>"Yes",)," and time_string>='$ctime' order by id asc limit 1");
				}
			}
	    }
		else
		{
			$time_dd = "NA";
			$next_time_dd = "NA";	
			$result = "NA";
			$value = $con->all_fetch("all_times",array("status"=>"Yes",)," and time_string>='$ctime' order by id asc limit 1");
		}
		


		
		


		$response_data[] = array(
			"id"=>"$row->id",
			"name"=>"$row->name",
			"result_time"=>"$time_dd",
			"next_result_time"=>"$next_time_dd",
			"result"=>"$result",
			"image"=>base_url.'upload/'.$row->image,
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