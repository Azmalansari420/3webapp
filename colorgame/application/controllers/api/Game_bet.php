<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_bet extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
        $this->user_id = '37';
    }

    public function place_bet()
{
    $request_id = time();
    $user_id = $this->user_id;        
    $bet_id = $this->input->post('bet_id');
    $bet_type = $this->input->post('bet_type');
    $bet_amount = $this->input->post('bet_amount');
    $session_id = $this->input->post('session_id'); // Get session ID from the POST request

    // Check if user exists
    $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
    if (empty($user)) {
        $result = [
            "status" => 400,
            "message" => "Account Closed By Admin.",
            "data" => [],
        ];
        echo json_encode($result);
        return;
    }

    // Get the user's wallet balance
    $wallet_amount = $this->crud->wallet($user_id);
    if ($bet_amount > $wallet_amount) {
        $result = [
            "status" => 400,
            "message" => "Insufficient balance.",
            "data" => [],
        ];
        echo json_encode($result);
        return;
    }

    // Prepare the bet data to insert
    $bet_data = [
        'request_id' => $request_id, 
        'user_id' => $user_id, 
        'bet_id' => $bet_id,
        'bet_type' => $bet_type,
        'bet_amount' => $bet_amount,
        'session_id' => $session_id, // Store session ID
        'addeddate' => date('Y-m-d H:i:s'),
    ];

    if (!empty($user_id)) {
        // Debit the user's wallet
        $type = "debit";
        $amount = $bet_amount;
        $message = "Play Game";
        $this->crud->wallet_credit_debit($user_id, $type, $amount, $message, $request_id);

        // Insert the bet data into the database
        $this->db->insert('game_bet', $bet_data);

        $result = [
            "status" => 200,
            "message" => "Bet placed successfully.",
            "data" => [
                "bet_details" => $bet_data,
            ],
        ];
    }
    echo json_encode($result);
}



















}