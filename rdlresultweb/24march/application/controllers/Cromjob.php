<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cromjob extends CI_Controller 
{

    public function process_games() 
    {
        $stop_date = date("Y-m-d H:i:s");
        $stop_date = date('Y-m-d', strtotime($stop_date . ' +1 day'));
        $create_on = $stop_date;
        $status = "1";

        // Fetch all games with status '1'
        $all_games = $this->db->get_where('game', ['status' => '1'])->result();

        if (!empty($all_games)) 
        {
            // Track used numbers for each game_time_id
            $used_numbers = [];

            foreach ($all_games as $game) 
            {
                $game_id = $game->id;

                // Fetch game times for the current game
                $game_times = $this->db->get_where('game_times', ['status' => '1', 'game_id' => $game_id])->result();

                if (!empty($game_times)) 
                {
                    foreach ($game_times as $game_time) 
                    {
                        $game_time_id = $game_time->game_time_id;
                        $declare_time = $game_time->declare_time;

                        // Ensure unique number for each game_time_id
                        do {
                            $number = rand(1, 100);
                            if ($number < 10) {
                                $number = "0" . $number;
                            }
                        } while (isset($used_numbers[$game_time_id]) && in_array($number, $used_numbers[$game_time_id]));

                        // Store number to avoid repetition for this game_time_id
                        $used_numbers[$game_time_id][] = $number;

                        // Prepare data for insertion
                        $col_val = [
                            'game_id'       => $game_id,
                            'game_time_id'  => $game_time_id,
                            'year'          => date("Y", strtotime($create_on)),
                            'month'         => date("F", strtotime($create_on)),
                            'number'        => $number,
                            'status'        => $status,
                            'create_on'     => $create_on,
                            'declare_time'  => $declare_time,
                        ];

                        $this->db->insert('number', $col_val);                        
                    }
                }
            }
        }
    }










    
}



