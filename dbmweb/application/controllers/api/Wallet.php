<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }



     public function recharge()
    {
        $result = array();

        $user_id = $this->session->userdata("user")['id'];
        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $request_id = time();
        $pay_type = $this->input->post("pay_type");
        $amount = $this->input->post("amount");
        $addeddate = date('Y-m-d H:i:s');
        $status = 1; 

        $insertdata = array(
            "user_id"=>$user_id,
            "request_id"=>$request_id,
            "pay_type"=>$pay_type,
            "amount"=>$amount,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

        if(!empty($insertdata))
        {
            $this->db->insert("recharge_request",$insertdata);
            // $url = base_url('app/user/qrcodeshow.php?request_id='.$request_id.'&device_id='.$device_id.'&token='.$firebase_token);

            
            $result['status']  = "200";
            $result['message'] = "Request Send Successfully.";
            $result['data']  = $insertdata;
            // $result['url']  = $url;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }



    /*purchase product*/
    public function purchase_product()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $user_id = $this->session->userdata("user")['id'];
        $request_id = time();

        $p_id = $this->input->post("p_id");
        $p_name = $this->input->post("p_name");
        $p_phase = $this->input->post("p_phase");
        $p_price = $this->input->post("p_price");
        $p_cycle = $this->input->post("p_cycle");
        $p_daily_income = $this->input->post("p_daily_income");
        $p_total_income = $this->input->post("p_total_income");
        $purchase_limit = $this->input->post("purchase_limit");
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime($start_date . " +$p_cycle days"));
        $final_amt = $p_total_income;

        $addeddate = date('Y-m-d H:i:s ');
        $status = 1; //1=process,2=pending,3=sucess,3=failed

        $insertdata = array(
            "user_id"=>$user_id,
            "request_id"=>$request_id,
            "p_id"=>$p_id,
            "p_name"=>$p_name,
            "p_phase"=>$p_phase,
            "p_price"=>$p_price,
            "p_cycle"=>$p_cycle,
            "p_daily_income"=>$p_daily_income,
            "p_total_income"=>$p_total_income,
            "purchase_limit"=>$purchase_limit,
            "start_date"=>$start_date,
            "end_date"=>$end_date,
            "final_amt"=>$final_amt,
            "addeddate"=>$addeddate,
            "status"=>$status,
        );


        /*puchase limit check */
        $count_product = $this->db->where(['p_id' => $p_id, 'user_id' => $user_id])
                          ->count_all_results('purchase_product'); 
        if ($count_product >= $purchase_limit) 
        {
            echo json_encode(["status" => 400, "message" => "You have reached the purchase limit.", "data" => []]);
            return;
        }
        /*wallet check*/
        $wallet_amount = $this->crud->wallet($user_id);
        if ($p_price > $wallet_amount) 
        {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }

        if(!empty($insertdata))
        {
            $this->db->insert("purchase_product",$insertdata);
            $url = base_url('app/user/user-product.php?request_id='.$request_id.'&device_id='.$device_id.'&token='.$firebase_token);

            $request_id = $request_id;
            $user_id = $user_id;
            $add_type = 1;
            $type = "debit";
            $amount = $p_price;
            $message = 'Product Purchase';

            $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);

            $update_wallet_amount = $this->crud->wallet($user_id);

            
            $result['status']  = "200";
            $result['message'] = "Purchase Successfully.";
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



    /*daily income money*/

    public function daily_income()
    {
        $result = array();
        $todaydate = date("Y-m-d");

        // Fetch active purchased products where end_date is still valid
        $this->db->where('end_date >=', $todaydate);
        $this->db->where('status', 1);
        $pur_product = $this->db->get('purchase_product')->result();

        if ($pur_product) 
        {
            foreach ($pur_product as $value) 
            {
                // Fetch user's current wallet balance
                $this->db->select('wallet');
                $this->db->where('id', $value->user_id);
                $user = $this->db->get('users')->row();

                if ($user) 
                {
                    $request_id = time();
                    $user_id = $value->user_id;
                    $add_type = 3;
                    $type = "credit";
                    $amount = $value->p_daily_income;
                    $message = 'Daily Income';

                    $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);
                    $update_wallet_amount = $this->crud->wallet($value->user_id);

                    $insertdata = array(
                        "user_id"=>$value->user_id,
                        "request_id"=>$request_id,
                        "p_id"=>$value->p_id,
                        "p_name"=>$value->p_name,
                        "p_daily_income"=>$value->p_daily_income,
                        "wallet_amt"=>$update_wallet_amount,
                        "addeddate"=>$todaydate,
                    );
                    $this->db->insert('daily_income',$insertdata);
                }
            }

            $result['status']  = "200";
            $result['message'] = "Wallet updated successfully.";
            $result['data']    = $pur_product;
        } else {
            $result['status']  = "400";
            $result['message'] = "No active purchases found.";
            $result['data']    = [];
        }

        echo json_encode($result);
    }




    /*withdraw*/

    public function withdraw_request()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");
       
        $user_id = $this->session->userdata("user")['id'];
        $request_id = time();

        $amount = $this->input->post("amount");
        $payment_pass = $this->input->post("payment_pass");

        $addeddate = date('Y-m-d H:i:s ');
        $status = 1;

        /*check wallet*/
        $wallet_amount = $this->crud->wallet($user_id);
        if ($amount > $wallet_amount) 
        {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }
        /*check passsword*/
        $check_password = $this->db->get_where('users', array('id' => $user_id))->row();
        if (!$check_password || $check_password->payment_password != $payment_pass) 
        {
            echo json_encode(["status" => 400, "message" => "Payment Password Wrong.", "data" => []]);
            return;
        }

        
       
        

        $insertdata = array(
            "user_id"=>$user_id,
            "request_id"=>$request_id,
            "amount"=>$amount,
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
            // $url = base_url('app/user/withdraw-sucess.php?request_id='.$request_id.'&device_id='.$device_id.'&token='.$firebase_token);

            $request_id = $request_id;
            $user_id = $user_id;
            $add_type = 4;
            $type = "debit";
            $amount = $amount;
            $message = 'Withdraw Amount';

            $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message, );
            $update_wallet_amount = $this->crud->wallet($user_id);

            
            $result['status']  = "200";
            $result['message'] = "Submit Successfully.";
            $result['data']  = $insertdata;
            // $result['url']  = $url;
            $result['update_wallet_amount']  = currency_simble($update_wallet_amount);
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }






































    

    // public function add_point_request()
    // {
    //     $result = array();

    //     $user_id = $this->session->userdata("user")['id'];
    //     $device_id = $this->session->userdata("device_id");
    //     $firebase_token = $this->session->userdata("firebase_token");
       
    //     $request_id = time();
    //     $pay_type = $this->input->post("pay_type");
    //     $amount = $this->input->post("amount");
    //     $addeddate = date('Y-m-d H:i:s ');
    //     $status = 1; //1=process,2=pending,3=sucess,3=failed

    //     $insertdata = array(
    //         "user_id"=>$user_id,
    //         "request_id"=>$request_id,
    //         "pay_type"=>$pay_type,
    //         "amount"=>$amount,
    //         "status"=>$status,
    //         "addeddate"=>$addeddate,
    //     );

    //     if(!empty($insertdata))
    //     {
    //         $this->db->insert("add_point_request",$insertdata);
    //         $url = base_url('app/user/qrcodeshow.php?request_id='.$request_id.'&device_id='.$device_id.'&token='.$firebase_token);

            
    //         $result['status']  = "200";
    //         $result['message'] = "Submit Successfully.";
    //         $result['data']  = $insertdata;
    //         $result['url']  = $url;
    //     }
    //     else
    //     {
    //         $result['message'] = "User not found";
    //         $result['status']  = "400";
    //         $result['data']    = array();
    //     }
    //     echo json_encode($result);
    // }


    // /*submit UTR*/

    // public function add_utrn_number()
    // {
    //     $result = array();

    //     $user_id = $this->session->userdata("user")['id'];
    //     $device_id = $this->session->userdata("device_id");
    //     $firebase_token = $this->session->userdata("firebase_token");
       
    //     $request_id = $this->input->post("request_id");
    //     $utr_no = $this->input->post("utr_no");
    //     $status = 2; //1=process,2=pending,3=sucess,3=failed

    //     $updatedata = array(
    //         "status"=>$status,
    //         "utr_no"=>$utr_no,
    //     );

    //     if(!empty($request_id))
    //     {
    //         $this->db->where(['user_id'=>$user_id,'request_id'=>$request_id]);
    //         $this->db->update("add_point_request",$updatedata);

    //         $url = base_url('app/user/add-point-success.php?request_id='.$request_id.'&device_id='.$device_id.'&token='.$firebase_token);

            
    //         $result['status']  = "200";
    //         $result['message'] = "Submit Successfully.";
    //         $result['data']  = $updatedata;
    //         $result['url']  = $url;
    //     }
    //     else
    //     {
    //         $result['message'] = "Request ID Not found";
    //         $result['status']  = "400";
    //         $result['data']    = array();
    //     }
    //     echo json_encode($result);
    // }
    // /*add point*/

    // public function add_point_data()
    // {
    //     $result = array();
    //     $html = '';
    //     $user_id = $this->session->userdata("user")['id']; 
    //     $page = $this->input->post("page");
    //     $limit = 10;
    //     $offset = 0;

    //     if($page>0)
    //     {
    //         $offset = $page*$limit;
    //     }
    //     $this->db->limit($limit,$offset);

    //     $today = date('Y-m-d');
    //     $this->db->order_by('id desc');
    //     $this->db->where_in('status',[2,3,4]);
    //     $notification = $this->crud->selectDataByMultipleWhere('add_point_request',array('user_id'=>$user_id,));

    //     if(!empty($notification))
    //     {
    //         $response_data['data'] = $notification;
    //         $html = $this->load->view('app/user/include/add-point',$response_data,true);

    //         $result['status'] = '200';
    //         $result['message'] = 'SUCCESS';
    //         $result['data'] = $html;
    //     }
    //     else
    //     {
    //         $result['status'] = '400';
    //         $result['message'] = 'No More';
    //         $result['data'] = [];
    //     }
    //     echo json_encode($result);
    // }
















    




    //  public function withdraw_req__data()
    // {
    //     $result = array();
    //     $html = '';
    //     $user_id = $this->session->userdata("user")['id']; 
    //     $page = $this->input->post("page");
    //     $limit = 10;
    //     $offset = 0;

    //     if($page>0)
    //     {
    //         $offset = $page*$limit;
    //     }
    //     $this->db->limit($limit,$offset);

    //     $today = date('Y-m-d');
    //     $this->db->order_by('id desc');
    //     $notification = $this->crud->selectDataByMultipleWhere('withdraw_request',array('user_id'=>$user_id));

    //     if(!empty($notification))
    //     {
    //         $response_data['data'] = $notification;
    //         $html = $this->load->view('app/user/include/withdraw-request',$response_data,true);

    //         $result['status'] = '200';
    //         $result['message'] = 'SUCCESS';
    //         $result['data'] = $html;
    //     }
    //     else
    //     {
    //         $result['status'] = '400';
    //         $result['message'] = 'No More';
    //         $result['data'] = [];
    //     }
    //     echo json_encode($result);
    // }






























}