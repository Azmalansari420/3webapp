<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller 
{
     
    public function positionlist()
    {
        $result = array();
        $html = '';
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        $user_id = $this->session->userdata("user")['id'];

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $notification = $this->db->get_where('buy_sell_transactions',array('user_id'=>$user_id,'status'=>1,))->result_object();

        $this->db->select_sum('strike_price');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 1);
        $notificationQuery = $this->db->get('buy_sell_transactions');
        $total = ($notificationQuery->row()->strike_price);
        $wallet = $this->crud->wallet($user_id);

        $instrument_keys = [];
        $expiry_dates = [];

        foreach ($notification as $key => $value)
        {
            $instrument_keys[] = $value->instrument_key;
            $expiry_dates[] = date("Y-m-d", strtotime($value->trade_close_datetime));
        }

        
        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/position-list',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $notification;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }

        $result['total'] = $total;
        $result['wallet'] = $wallet;
        $result['instrument_keys'] = $instrument_keys;
        $result['expiry_dates'] = $expiry_dates;

        echo json_encode($result);
    }


    public function target()
    {
        $result = array();
        $user_id = $this->session->userdata("user")['id'];
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $date_time = date("Y-m-d H:i:s");

        if($this->db->update("buy_sell_transactions",["modify_target"=>$value,],["id"=>$id,]))
        {
            $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Modify Target Value $value",]);
        
            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = [];
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Error!';
            $result['data'] = [];
        }
        
        echo json_encode($result);
    }

    public function stoploss()
    {
        $result = array();
        $user_id = $this->session->userdata("user")['id'];
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $date_time = date("Y-m-d H:i:s");

        if($this->db->update("buy_sell_transactions",["modify_stoploss"=>$value,],["id"=>$id,]))
        {
            $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Modify Stoploss Value $value",]);
        
            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = [];
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Error!';
            $result['data'] = [];
        }
        
        echo json_encode($result);
    }


    public function time()
    {
        $result = array();
        $user_id = $this->session->userdata("user")['id'];
        $id = $this->input->post('id');
        $value = $this->input->post('value');

        $date_time = date("Y-m-d H:i:s");

        if($this->db->update("buy_sell_transactions",["trade_close_datetime"=>$value,],["id"=>$id,]))
        {
            $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Modify Extend Time Value $value",]);
        
            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = [];
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Error!';
            $result['data'] = [];
        }
        
        echo json_encode($result);
    }



    public function exit()
    {
        $result = array();
        $user_id = $this->session->userdata("user")['id'];
        $id = $this->input->post('id');
        $exit_price = $this->input->post('exit_price');
        $plpTotal = $this->input->post('plpTotal');

        $date_time = date("Y-m-d H:i:s");

        $wallet = $this->crud->wallet($user_id);

        $buysell = $this->db->get_where('buy_sell_transactions',array('id'=>$id,))->result_object();
        if(empty($buysell))
        {
            $result['status'] = '400';
            $result['message'] = 'Wrong Id!';
            $result['data'] = [];
            echo json_encode($result);
            die;
        }
        $buysell = $buysell[0];
        if($exit_price>$buysell->ltp_price)
        {
            $buyPrice = $buysell->ltp_price*$buysell->quantity;
            $walletPlus = ($buyPrice+$plpTotal);
        }
        else
        {
            $buyPrice = $buysell->ltp_price*$buysell->quantity;
            $walletPlus = ($buyPrice+$plpTotal);
        }
        
            

        if($this->db->update("buy_sell_transactions",["sell_price"=>$exit_price,"type"=>2,],["id"=>$id,]))
        {
            $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Sell $exit_price",]);

            $requestid = time();
            $type = "credit";
            $add_type = 3;
            $message = "Exit Stock";
            $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $walletPlus, $message);
            $update_wallet_amount = $this->crud->wallet($user_id);
        
            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = [];
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Error!';
            $result['data'] = [];
        }
        
        echo json_encode($result);
    }














}