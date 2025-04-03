<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller 
{
    public function loadChatHistory()
    {
        $user_id = $this->input->get('user_id');  // Receiver ID
        $current_user_id = $this->session->userdata('user_id');  // Logged-in user ID

        if (empty($user_id) || empty($current_user_id)) {
            echo json_encode([]);  // Return empty response if user IDs are missing
            return;
        }

        $this->db->where("(sender_id = $current_user_id AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = $current_user_id)");
        $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get('messages');

        echo json_encode($query->result_array());
    }








}