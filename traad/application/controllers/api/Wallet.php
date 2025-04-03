<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }


    public function add_amount_from_coupon()
    {
        $result = array();
        $requestid = time();
        $user_id = $this->session->userdata("user")['id'];
        $today_date = date("Y-m-d");
        $name = $this->input->post("name");

        // Check if the coupon exists and is active
        $this->db->where('expire_date >=', $today_date);
        $this->db->where('start_date <=', $today_date); 
        $this->db->where('status', 1);
        $this->db->where('name', $name);
        $checkcoupon = $this->db->get('coupons')->row();

        if (!$checkcoupon) {
            echo json_encode([
                "status"  => "400",
                "message" => "Invalid or expired coupon.",
                "data"    => []
            ]);
            return;
        }

        // Check if the user has already used this coupon
        $this->db->where(['user_id' => $user_id, 'name' => $name]);
        $used_coupon = $this->db->get('coupon_uses')->num_rows();
        if ($used_coupon > 0) {
            echo json_encode([
                "status"  => "400",
                "message" => "You have already used this coupon.",
                "data"    => []
            ]);
            return;
        }

        // Proceed with crediting the wallet
        $coupon_amount = $checkcoupon->amount;
        $type = "credit";
        $add_type = 2;
        $message = "Added Amount from Coupon";

        $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $coupon_amount, $message);
        $update_wallet_amount = $this->crud->wallet($user_id);

        // Insert into coupon_uses table
        $insertdata = [
            "user_id" => $user_id,
            "name" => $name,
            "amount" => $coupon_amount,
            "addeddate" => date("Y-m-d"),
        ];
        $this->db->insert('coupon_uses', $insertdata);



        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('coupon_uses',array('user_id'=>$user_id,));
        $response_data['data'] = $notification;
        $html = $this->load->view('app/user/include/add-amount-history',$response_data,true);

        // Return success response
        echo json_encode([
            "status"  => "200",
            "message" => "Wallet updated successfully.",
            "data" => $coupon_amount,
            "html" => $html,
            "update_wallet_amount" => currency_simble($update_wallet_amount)
        ]);
    }

    public function add_amount_from_coupon_data()
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
        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('coupon_uses',array('user_id'=>$user_id,));

        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/add-amount-history',$response_data,true);

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






    /*buy sell*/

    public function buy_sell()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");
        $firebase_token = $this->session->userdata("firebase_token");

        $user_id = $this->session->userdata("user")['id']; 

        $instrument_key = $this->input->post("instrument_key");
        $ltp_price = $this->input->post("ltp_price");
        $strike_price = $this->input->post("strike_price");
        $target_price = $this->input->post("target_price");
        $stoploss_price = $this->input->post("stoploss_price");
        $type = $this->input->post("type");
        $quantity = $this->input->post("quantity");
        $price_optional = $this->input->post("price_optional");
        $time_frame = $this->input->post("time_frame");
        $callputtype = $this->input->post("callputtype");
        $clickable_instumentkey = $this->input->post("clickable_instumentkey");
        $expiry = $this->input->post("expiry");
        $addeddate = date('Y-m-d H:i:s');



        if ($type==2) {
            echo json_encode([
                "status"  => "400",
                "message" => "Restricted!",
                "data"    => []
            ]);
            return;
        }



        $trade_close_datetime = "";
        if($time_frame==1)
        {
            $today = date('Y-m-d');
            $trade_close_datetime = $today . ' 15:20:00';
        }
        else if($time_frame==2)
        {
            $tomorrow = date('Y-m-d', strtotime('+1 day'));
            $trade_close_datetime = $tomorrow . ' 15:20:00';
        }
        else if($time_frame==3)
        {
            $trade_close_datetime = $expiry . ' 15:20:00';
        }

        $end_date_time = date("Y-m-d 15:20:00");
        if (date("Y-m-d H:i:s") > $end_date_time) 
        {
            echo json_encode([
                "status"  => "400",
                "message" => "Market Closed!.",
                "data"    => []
            ]);
            return;
        }

        
        // print_r($trade_close_datetime);
        // die;

        $trade_name = '';
        $instruments = $this->db->get_where("instruments",["instrument_key"=>$instrument_key,])->result_object();
        if(!empty($instruments))
        {
            $trade_name = $instruments[0]->name.' '.$strike_price;
            if($callputtype==1) $trade_name .=" CE";
            if($callputtype==2) $trade_name .=" PE";
        }


        // Get user's wallet balance
        $wallet = $this->db->get_where('users', ['id' => $user_id])->row();

        if (!$wallet) 
        {
            echo json_encode([
                "status"  => "400",
                "message" => "User not found.",
                "data"    => []
            ]);
            return;
        }

        $wallet_amount = $wallet->wallet;

        $amount = $ltp_price*$quantity;
        if ($wallet_amount < $amount) {
            echo json_encode([
                "status"  => "400",
                "message" => "Low Balance.",
                "data"    => []
            ]);
            return;
        }

        
        if(!empty($price_optional))
        {
            $type = 3;
        }
        else
        {
            $price_optional = 0;
        }




        if (!empty($user_id)) 
        {
            $insertdata = [
                "user_id"         => $user_id,
                "instrument_key"  => $instrument_key,
                "trade_name"  => $trade_name,
                "ltp_price"    => $ltp_price,
                "strike_price"    => $strike_price,
                "modify_target"    => $target_price,
                "modify_stoploss"    => $stoploss_price,
                "type"            => $type,
                "quantity"        => $quantity,
                "price_optional"  => $price_optional,
                "time_frame"      => $time_frame,
                "callputtype"     => $callputtype,
                "expiry_date"     => $expiry,
                "clickable_instumentkey"     => $clickable_instumentkey,
                "trade_close_datetime"     => $trade_close_datetime,
                "addeddate"       => $addeddate,
                "status"          => 1,
            ];
            $this->db->insert("buy_sell_transactions", $insertdata); 
            $id = $this->db->insert_id();
            $date_time = date("Y-m-d H:i:s");

            if($type==1)
            {
                $this->db->insert("modify_log",["user_id"=>$user_id,"buy_sell_id"=>$id,"date_time"=>$date_time,"detail"=>"Buy $ltp_price",]);

                $requestid = time();
                $type = "debit";
                $add_type = 3;
                $message = "Purchase Stock";

                $this->crud->wallet_credit_debit($requestid, $user_id, $type, $add_type, $amount, $message);
                $update_wallet_amount = $this->crud->wallet($user_id);
            }

            $url = base_url('app/user/home.php?requestid='.$requestid.'&device_id='.$device_id.'&token='.$firebase_token);

            echo json_encode([
                "status"  => "200",
                "message" => "Purchase Successful.",
                "data"    => $insertdata,
                "update_wallet_amount"    => $update_wallet_amount,
                "url"    => $url,
            ]);
        } 
        else 
        {
            echo json_encode([
                "status"  => "400",
                "message" => "ERROR",
                "data"    => []
            ]);
        }
    }























































    /*withdraw*/

    // public function withdraw_request()
    // {
    //     $result = array();

    //     $device_id = $this->session->userdata("device_id");
    //     $firebase_token = $this->session->userdata("firebase_token");
       
    //     $user_id = $this->session->userdata("user")['id'];
    //     $requestid = time();
    //     $amount = $this->input->post("amount");
    //     $upi_no = $this->input->post("upi_no");
    //     $bank_name = $this->input->post("bank_name");
    //     $ac_name = $this->input->post("ac_name");
    //     $ac_no = $this->input->post("ac_no");
    //     $ifsc_code = $this->input->post("ifsc_code");
    //     $addeddate = date('Y-m-d H:i:s ');
    //     $status = 2; //1=process,2=pending,3=sucess,3=failed

    //     $insertdata = array(
    //         "user_id"=>$user_id,
    //         "requestid"=>$requestid,
    //         "amount"=>$amount,
    //         "upi_no"=>$upi_no,
    //         "bank_name"=>$bank_name,
    //         "ac_name"=>$ac_name,
    //         "ac_no"=>$ac_no,
    //         "ifsc_code"=>$ifsc_code,
    //         "addeddate"=>$addeddate,
    //         "status"=>$status,
    //     );

    //     $wallet_amount = $this->crud->wallet($user_id);
    //     if ($amount > $wallet_amount) 
    //     {
    //         echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
    //         return;
    //     }

    //     if(!empty($insertdata))
    //     {
    //         $this->db->insert("withdraw_request",$insertdata);
    //         $url = base_url('app/user/withdraw-sucess.php?requestid='.$requestid.'&device_id='.$device_id.'&token='.$firebase_token);

    //         $request_id = $requestid;
    //         $user_id = $user_id;
    //         $add_type = 4;
    //         $type = "debit";
    //         $amount = $amount;
    //         $message = 'Withdraw Amount';

    //         $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message, );
    //         $update_wallet_amount = $this->crud->wallet($user_id);

            
    //         $result['status']  = "200";
    //         $result['message'] = "Submit Successfully.";
    //         $result['data']  = $insertdata;
    //         $result['url']  = $url;
    //         $result['update_wallet_amount']  = $update_wallet_amount;
    //     }
    //     else
    //     {
    //         $result['message'] = "User not found";
    //         $result['status']  = "400";
    //         $result['data']    = array();
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