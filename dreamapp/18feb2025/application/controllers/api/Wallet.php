<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }
    

    public function add_point_request()
    {
        $result = array();

        $user_id = $this->session->userdata("user")['id'];
        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $requestid = time();
        $pay_type = $this->input->post("pay_type");
        $amount = $this->input->post("amount");
        $addeddate = date('Y-m-d H:i:s ');
        $status = 2; //1=process,2=pending,3=sucess,3=failed

        $insertdata = array(
            "user_id"=>$user_id,
            "requestid"=>$requestid,
            "pay_type"=>$pay_type,
            "amount"=>$amount,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

        if(!empty($insertdata))
        {
            $this->db->insert("add_point_request",$insertdata);
            $url = base_url('app/user/qrcodeshow.php?requestid='.$requestid.'&device_id='.$device_id.'&token='.$firebase_token);

            
            $result['status']  = "200";
            $result['message'] = "Submit Successfully.";
            $result['data']  = $insertdata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }


    /*submit UTR*/

    public function add_utrn_number()
    {
        $result = array();

        $user_id = $this->session->userdata("user")['id'];
        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $requestid = $this->input->post("requestid");
        $utr_no = $this->input->post("utr_no");
        $status = 2; //1=process,2=pending,3=sucess,3=failed

        $updatedata = array(
            "status"=>$status,
            "utr_no"=>$utr_no,
        );

        if(!empty($requestid))
        {
            $this->db->where(['user_id'=>$user_id,'requestid'=>$requestid]);
            $this->db->update("add_point_request",$updatedata);

            $url = base_url('app/user/add-point-success.php?requestid='.$requestid.'&device_id='.$device_id.'&token='.$firebase_token);

            
            $result['status']  = "200";
            $result['message'] = "Submit Successfully.";
            $result['data']  = $updatedata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "Request ID Not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }
    /*add point*/

    public function add_point_data()
    {
        $result = array();
        $html = '';
        $user_id = $this->session->userdata("user")['id']; 
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $this->db->where_in('status',[2,3,4]);
        $notification = $this->crud->selectDataByMultipleWhere('add_point_request',array('user_id'=>$user_id,));

        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/add-point',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }
















    /*withdraw*/

    public function withdraw_request()
    {
        $result = array();

        // Get the current time in 24-hour format (HH:MM)
        $current_time = date('H:i');

        // Define the allowed time range
        $start_time = '11:00';
        $end_time = '01:00';

        $current_time_dt = DateTime::createFromFormat('H:i', $current_time);
        $start_time_dt = DateTime::createFromFormat('H:i', $start_time);
        $end_time_dt = DateTime::createFromFormat('H:i', $end_time);

        if ($end_time_dt < $start_time_dt) 
        {
            $end_time_dt->modify('+1 day');
        }

        if ($current_time_dt < $start_time_dt || $current_time_dt > $end_time_dt) 
        {
            echo json_encode(["status" => 400, "message" => "Withdrawals are only allowed from 11:00 AM to 01:00 AM.", "data" => []]);
            return;
        }

        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $user_id = $this->session->userdata("user")['id'];
        $requestid = time();
        $amount = $this->input->post("amount");
        $upi_no = $this->input->post("upi_no");
        $bank_name = $this->input->post("bank_name");
        $ac_name = $this->input->post("ac_name");
        $ac_no = $this->input->post("ac_no");
        $ifsc_code = $this->input->post("ifsc_code");
        $addeddate = date('Y-m-d H:i:s ');
        $status = 2; //1=process,2=pending,3=sucess,3=failed

        $insertdata = array(
            "user_id"=>$user_id,
            "requestid"=>$requestid,
            "amount"=>$amount,
            "upi_no"=>$upi_no,
            "bank_name"=>$bank_name,
            "ac_name"=>$ac_name,
            "ac_no"=>$ac_no,
            "ifsc_code"=>$ifsc_code,
            "addeddate"=>$addeddate,
            "status"=>$status,
        );

        $wallet_amount = $this->crud->wallet($user_id);
        if ($amount > $wallet_amount) 
        {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }

        if(!empty($insertdata))
        {
            $this->db->insert("withdraw_request",$insertdata);
            $url = base_url('app/user/withdraw-sucess.php?requestid='.$requestid.'&device_id='.$device_id.'&token='.$firebase_token);

            $request_id = $requestid;
            $user_id = $user_id;
            $add_type = 4;
            $type = "debit";
            $amount = $amount;
            $message = 'Withdraw Amount';

            $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);
            $update_wallet_amount = $this->crud->wallet($user_id);

            
            $result['status']  = "200";
            $result['message'] = "Submit Successfully.";
            $result['data']  = $insertdata;
            $result['url']  = $url;
            $result['update_wallet_amount']  = $update_wallet_amount;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }




     public function withdraw_req__data()
    {
        $result = array();
        $html = '';
        $user_id = $this->session->userdata("user")['id']; 
        $page = $this->input->post("page");
        $limit = 10;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('withdraw_request',array('user_id'=>$user_id));

        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/withdraw-request',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }
















/*point to point*/


    public function point_transfer()
    {
        $result = array();

        $tranfer_user = $this->session->userdata("user")['id'];               
        $amount = $this->input->post("amount");      

        $user_id = $transfewr_id = $this->input->post("user_id");

        $numeric_user_id = preg_replace("/[^0-9]/", "", $user_id);
        $check_user_id = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->row();

        if (!$check_user_id) {
            echo json_encode(["status" => 400, "message" => "Wrong Referral ID.", "data" => []]);
            return;
        }

        $requestid = time();
        $addeddate = date('Y-m-d H:i:s ');
        $status = 1; 

        $insertdata = array(
            "tranfer_user"=>$tranfer_user,
            "user_id"=>$user_id,
            "requestid"=>$requestid,
            "amount"=>$amount,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

       

        if(!empty($insertdata))
        {
            /*point minius */
            $request_id = $requestid;
            $amount = $amount;

            $user_id = $tranfer_user;
            $add_type = 9;
            $type = "debit";
            $message = 'Point Transfer';
            $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);

            /*point plus*/

            $check_user_id = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->row();

            $transferid = $check_user_id->id;

            // $user_id = $transferid;
            $add_type = 10;
            $type = "credit";
            $message = 'Point Recieved';
            $this->crud->wallet_credit_debit($request_id,$transferid, $type, $add_type,$amount, $message);


            $update_wallet_amount = $this->crud->wallet($tranfer_user);
            $this->db->insert("transfer_point",$insertdata);
                        
            $result['status']  = "200";
            $result['message'] = "Transfer Successfully.";
            $result['data']  = $insertdata;
            $result['update_wallet_amount']  = $update_wallet_amount;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    


























}