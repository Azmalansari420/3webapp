<?php 
include_once '../lib/all_files.php';
$stop_date = date("Y-m-d H:i:s");
$stop_date = date('Y-m-d', strtotime($stop_date . ' +1 day'));
$create_on = $stop_date;
$status = "Yes";
$all_games = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");

	if(is_array($all_games) || is_object($all_games))
	{
		foreach ($all_games as $value)
		{
			$game_id = $value->id;
			$game_times = $con->all_fetch("game_times", array('status' => "Yes","game_id"=>$game_id,), "order by time2 asc");
			if(is_array($game_times) || is_object($game_times))
			{
				foreach ($game_times as $value2)
				{
					$game_time_id = $value2->id;
					$number = rand(1,100);
					if($number<10)
						$number = "0".$number;
					$nextxxx = fs("all_times",array("id"=>$value2->game_time_id,));
					$time_string =strtotime($create_on." ".$nextxxx->time);
					$next_time = $nextxxx->time;
						$col_val = array(						
							'game_id' 		  => $game_id,
							'month'   => date_format(date_create("$create_on"),"F"),
							'year'   => date_format(date_create("$create_on"),"Y"),
							'number'	  => $number,
							'status'  => $status,
							"game_time_id"=>$game_time_id,
							'number_time'  => $next_time,
							'create_on'  => $create_on,	
							'home_page'  => $home_page,	
							"time_string"=>$time_string,
							// "number_time"=>date("H:i:s"),						
						);
						$row = $con->insert('number',$col_val);
				}
			}
		}
	}







































// $all_games = $con->all_fetch("game", array('status' => "Yes"), "order by id asc");

// 	if(is_array($all_games) || is_object($all_games))
// 	{
// 		foreach ($all_games as $value)
// 		{
// 			$all_game_times = $con->all_fetch("game_times",array("game_id"=>$value->id,),"order by time asc");
// 			if(is_array($all_game_times) || is_object($all_game_times))
// 			{
// 				foreach ($all_game_times as $value2)
// 				{

// 					$game_id = $value->id;
// 					$number = 100;
// 					$status = 'Yes';
// 					$game_time_id = $value2->id;



// 					$all_game_times_all_times = $con->all_fetch("all_times",array("id"=>$game_time_id,),"order by time asc");
// 					if(is_array($all_game_times_all_times) || is_object($all_game_times_all_times))
// 					{
// 						foreach ($all_game_times_all_times as $value3)
// 						{

// 							$time_string =strtotime($create_on." ".$value3->time);
// 							$next_time = $value3->time;
// 							$col_val = array(						
// 								'game_id' 		  => $game_id,
// 								'month'   => date_format(date_create("$create_on"),"F"),
// 								'year'   => date_format(date_create("$create_on"),"Y"),
// 								'number'	  => $number,
// 								'status'  => $status,
// 								"game_time_id"=>$game_time_id,
// 								'number_time'  => $number_time,
// 								'create_on'  => $create_on,	
// 								'home_page'  => $home_page,	
// 								"time_string"=>$time_string,
// 								"number_time"=>date("H:i:s"),						
// 							);

// 						}
// 					}
// 				}
// 			}	

// 		}
// 	}


?>