<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
     
    public function list()
    {
        $result = array();
        $html = '';
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        $user_id = $this->session->userdata("user")['id'];



        $this->db->order_by('buy_sell_transactions.id', 'desc');
        $this->db->where_in("type",[1,3]);
        $buysell = $this->db->from('buy_sell_transactions')
            ->join('instruments as instruments', 'instruments.instrument_key = buy_sell_transactions.instrument_key', 'left')
            ->select("buy_sell_transactions.*, instruments.expiry_date")
            ->where(array('buy_sell_transactions.user_id' => $user_id, 'buy_sell_transactions.status' => 1))
            ->get()
            ->result_object();
        // foreach ($buysell as $key => $data) 
        // {

        //   $difference = $data->sell_strike_price - $data->ltp_price;
        //   $percentage_difference = ($difference / $data->ltp_price) * 100;

        //   $class = ($difference >= 0) ? "success-color" : "danger-color";
        //   $difference_text = ($difference >= 0) ? "+$difference" : "$difference";
        //   $percentage_text = ($percentage_difference >= 0) ? "+".round($percentage_difference, 2) : round($percentage_difference, 2);

        // }





            $update_wallet_amount = $this->crud->wallet($user_id);
        
        // if(!empty($buysell))
        // {
            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $buysell;
            $result['wallet_amount'] = $update_wallet_amount;
        // }
        // else
        // {
        //     $result['status'] = '400';
        //     $result['message'] = 'No More';
        //     $result['data'] = [];
        //     $result['wallet_amount'] = $update_wallet_amount;
        // }
        echo json_encode($result);
    }





    public function performance()
    {
        $result = array();
        $html = '';
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        $user_id = $this->session->userdata("user")['id'];



        $this->db->order_by('buy_sell_transactions.id', 'desc');
        $buysell = $this->db->get_where('buy_sell_transactions',array('user_id'=>$user_id,'status'=>1,"type"=>2,))->result_object();
        





        $update_wallet_amount = $this->crud->wallet($user_id);        
        $result['status'] = '200';
        $result['message'] = 'SUCCESS';
        $result['data'] = $buysell;
        $result['wallet_amount'] = $update_wallet_amount;
        
        echo json_encode($result);
    }













































}