<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_session extends CI_Controller 
{
     
    

   public function start_session()
{
    $todaydate = date('Y-m-d H:i:s');
    $date_part = date('Ym');
    $games = $this->crud->selectDataByMultipleWhere('game', array('status' => 1));
    if (empty($games)) {
        echo json_encode(['status' => 400, 'message' => 'No active games found.']);
        return;
    }

    foreach ($games as $game) 
    {
        $game_id = $game->id;
        $game_name = $game->name;
        $duration_minutes = $game->duration_minutes;

        $last_session = $this->db->select('session_id')
                                 ->from('game_sessions')
                                 ->where('session_id LIKE', $date_part . '%')
                                 ->order_by('session_id', 'DESC')
                                 ->limit(1)
                                 ->get()
                                 ->row();

        // Increment the last session ID to generate the new session ID
        if ($last_session) {
            $last_number = (int) substr($last_session->session_id, -3);
        } else 
        {
            $last_number = 0; 
        }

        // Calculate the start time (current time)
        $start_time = date('Y-m-d H:i:s');
        
        // Loop to create a session for every minute for the next 24 hours (1440 minutes)
        for ($i = 0; $i < 1440; $i++) 
        { 
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);  
            $session_id = $date_part . $new_number;

            // Current session start time
            $current_start_time = date('Y-m-d H:i:s', strtotime("+$i minutes", strtotime($start_time)));

            // Calculate session stop time (before 10 seconds of duration)
            $current_stop_time = date('Y-m-d H:i:s', strtotime("-10 seconds", strtotime("+$duration_minutes minutes", strtotime($current_start_time))));

            // Bet start time (same as session start time)
            $bet_start_time = $current_start_time;

            // Bet stop time (10 seconds before session stop time)
            $bet_stop_time = date('Y-m-d H:i:s', strtotime("-10 seconds", strtotime($current_stop_time)));

            // Session result declare time (5 seconds before next session start time)
            $next_session_start_time = date('Y-m-d H:i:s', strtotime("+1 minutes", strtotime($current_start_time)));
            $session_result_declare_time = date('Y-m-d H:i:s', strtotime("-5 seconds", strtotime($next_session_start_time)));

            // Prepare session data
            $data = [
                'session_id' => $session_id,
                'game_id' => $game_id,
                'game_name' => $game_name,  
                'session_start_date_time' => $current_start_time,
                'session_stop_date_time' => $current_stop_time,
                'bet_start_date_time' => $bet_start_time,
                'bet_stop_date_time' => $bet_stop_time,
                'session_result_declare_date_time' => $session_result_declare_time,
                'status' => 1,
                'created_at' => $todaydate,
            ];

            $this->db->insert('game_sessions', $data);
            $last_number++;
        }
    }

    echo json_encode([
        'status' => 200,
        'message' => 'Sessions created successfully for all active games for the next 24 hours.',
    ]);
}




    public function get_active_sessions()
    {
        // Get the current time
        $current_time = date('Y-m-d H:i:s');
        $sessions = $this->db->select('game_id, session_id, session_start_date_time, session_stop_date_time, bet_stop_date_time, bet_start_date_time, session_result_declare_date_time')
                             ->from('game_sessions')
                             ->where('status', 1) // Only active sessions
                             ->where('session_stop_date_time >', $current_time) // Sessions not yet ended
                             ->get()
                             ->result();

        // If no active sessions are found
        if (empty($sessions)) {
            $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode([
                     'status' => 200,
                     'message' => 'No active sessions found.',
                     'data' => []
                 ]));
            return;
        }

        // Return the active sessions
        $this->output
             ->set_content_type('application/json')
             ->set_status_header(200)
             ->set_output(json_encode([
                 'status' => 200,
                 'message' => 'Active sessions found.',
                 'data' => $sessions
             ]));
    }

 


    public function expire_sessions()
    {
        // Get the current time
        $current_time = date('Y-m-d H:i:s');

        // Update the status of sessions where session_stop_date_time <= current time and status is active (1)
        $this->db->where('session_stop_date_time <=', $current_time)
                 ->where('status', 1)
                 ->update('game_sessions', ['status' => 'expired']);

        // Check if any rows were affected
        if ($this->db->affected_rows() > 0) {
            $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode([
                     'status' => 200,
                     'message' => 'Expired sessions have been updated successfully.'
                 ]));
        } else {
            $this->output
                 ->set_content_type('application/json')
                 ->set_status_header(200)
                 ->set_output(json_encode([
                     'status' => 200,
                     'message' => 'No sessions to expire at this time.'
                 ]));
        }
    }

    




    // public function get_active_sessions()
    // {
    //     $current_time = date('Y-m-d H:i:s');

    //     $sessions = $this->db->query("SELECT game_id, start_time, end_time 
    //         FROM game_sessions 
    //         WHERE status = 1 
    //         AND end_time > ?", [$current_time])->result();

    //     echo json_encode([
    //         'status' => 200,
    //         'data' => $sessions
    //     ]);
    // }



















}