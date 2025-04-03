<?php
// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Custom_model','custom');
        $this->token_data = token_auth();

    }
    public function index()
    {
        echo "string";
    }


    public function set_lat_long()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $latitude = $this->input->post("lat");
        $longitude = $this->input->post("long");
        $user = $this->db->get_where("users",array("id"=>$user_id,))->result_object();          
        if(!empty($user))
        {
            $user = $user[0];

            $this->db->update("users",array("latitude"=>$latitude,"longitude"=>$longitude,),array("id"=>$user_id,));

            $result['status'] = "200";
            $result['message'] = "Set successfully...";
            $result['data'] = [];
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Invailid user...";
            $result['data'] = [];
        }
        echo json_encode($result);
    }
    public function update_image()
    {
        $result = array();
        $user_data = array();        
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $image = $this->input->post('image');
       
        if(!empty($user_id))
        {
            if ($image)
            {
                $image_content = base64_decode(explode(",", $image)[1]);
                $image_time = time().$user_id.'user_profile.png';
                if(file_put_contents(FCPATH.'media/uploads/'.$image_time,$image_content))
                {
                    $user_data = array(
                        "image"=>$image_time,
                    );
                    if($this->db->update("users",$user_data,array('id' => $user_id, )))
                    {
                        $result['message'] = "Update successfully";
                        $result['status']  = "200";
                    }
                    else
                    {
                        $result['message'] = "Update not successfully";
                        $result['status']  = "400";
                    }                   
                }
            }
            else
            {
                $result['message'] = "Upload Image first...";
                $result['status']  = "400";
            }            
        }
        else
        {
            $result['message'] = "Please Enter Crrect User ID.";
            $result['status']  = "400";
        }
        echo json_encode($result);      
    }
    public function update_profile()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $fname = $this->input->post("fname");
        $lname = $this->input->post("lname");
        $dob = $this->input->post("dob");
        $gender = $this->input->post("gender");

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $user = $user[0];
            $data = array(
                "fname"=>$fname,
                "lname"=>$lname,
                "dob"=>$dob,
                "gender"=>$gender,
            );
            $this->db->update("users",$data,array("id"=>$user_id,));


            $result['status']  = "200";
            $result['message'] = "Update successfully...";
            $result['action']  = "userupdate";
            $result['modaltype']  = "hide";
            $result['modalid']  = "offcanvasBottom2";
            $result['data']    = $this->user_detail_item($user_id);
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['balance']  = "0";
            $result['data']    = array();
        }
        echo json_encode($result);
    }
    public function user_detail_item($user_id)
    {
        $data = array();
        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $user = $user[0];
            $document_status = 0;
            $data = array(
                "name"=>$user->fname.' '.$user->lname,
                "email"=>$user->email,
                "mobile"=>$user->mobile,
                "address"=>$user->address,
                "image"=>base_url('upload/'.$user->profile_image),
            );
        }
        return $data;
    }
    public function password_update()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $oldpassword = $this->input->post("oldpassword");
        $npassword = $this->input->post("npassword");
        $cpassword = $this->input->post("cpassword");
        $address = '';

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $user = $user[0];
            if($user->password!=$oldpassword)
            {
                $result['status']  = "400";
                $result['message'] = "Old password not match...";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            if($npassword!=$cpassword)
            {
                $result['status']  = "400";
                $result['message'] = "Confirm password not match...";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }


            $data = array(
                "password"=>$npassword,
            );
            $this->db->update("users",$data,array("id"=>$user_id,));
            $result['status']  = "200";
            $result['message'] = "Update successfully...";
            $result['action']  = "add";            
            $result['data']    = array();
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['balance']  = "0";
            $result['data']    = array();
        }
        echo json_encode($result);
    }
    
    

    public function history()
    {
         $html = '';
         $token_data = $this->token_data;
         $user_id = $token_data->user_id;
         $page = $this->input->post("page");
         $use_type = $this->input->post("use_type");
         $category_id = $this->input->post("category_id");
         $limit = 12;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }
        

        
        $this->db->limit($limit,$offset);
        $this->db->order_by("user_history.id desc");
        $data = $this->db
             ->select("user_history.*")
             ->where(array('user_history.user_id'=>$user_id,))
             ->from('user_history as user_history')->get()->result_object();

         if(!empty($data))
         {
            if($use_type==0)
            {
                $response_data['data'] = $data;
                $html = $this->load->view("app/user/cards/wallet",$response_data,true);
            }
            else
            {
                $html = $data;
            }

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }

    public function withdraw_history()
    {
         $html = '';
         $token_data = $this->token_data;
         $user_id = $token_data->user_id;
         $page = $this->input->post("page");
         $use_type = $this->input->post("use_type");
         $category_id = $this->input->post("category_id");
         $limit = 12;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }
        

        
        $this->db->limit($limit,$offset);
        $this->db->order_by("withdraw_request.id desc");
        $data = $this->db
             ->select("withdraw_request.*")
             ->where(array('withdraw_request.user_id'=>$user_id,))
             ->from('withdraw_request as withdraw_request')->get()->result_object();

         if(!empty($data))
         {
            if($use_type==0)
            {
                $response_data['data'] = $data;
                $html = $this->load->view("app/user/cards/withdraw_history",$response_data,true);
            }
            else
            {
                $html = $data;
            }

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }
    public function withdraw_request()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $request_id = time().$user_id;
        $pay_type = $this->input->post("type");
        $amount = $this->input->post("amount");
        $paytm_number = $this->input->post("paytm_number");
        $phonepe_number = $this->input->post("phonepe_number");
        $account_number = $this->input->post("account_number");
        $ifsc = $this->input->post("ifsc");
        $holder_name = $this->input->post("holder_name");
        $date_time = date("Y-m-d H:i:s");   
        $order_id = rand().$user_id;
        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $user = $user[0];
            $wallet_amount = $user->wallet;

            $setting = $this->db->select("min_withdraw,withdrawOpenTime,withdrawCloseTime")->get_where("setting")->result_object()[0];
            $min_withdraw = $setting->min_withdraw;

            $withdrawOpenTime = $setting->withdrawOpenTime.':00';
            $withdrawCloseTime = $setting->withdrawCloseTime.':00';

            // echo $withdrawCloseTime;

            if($withdrawOpenTime>date("H:i:s"))
            {
                $result['message'] = "Withdraw time not open now";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }

            if(date("Y-m-d").' '.$withdrawCloseTime<date("Y-m-d H:i:s"))
            {
                $result['message'] = "Withdraw time is closed";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }


            if($amount<$min_withdraw)
            {
                $result['message'] = "Min Withdraw amount ".$min_withdraw;
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }

            if($wallet_amount<$amount)
            {
                $result['status']  = "400";
                $result['message'] = "You have only ".price_formate($wallet_amount)." ";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            $data = array(
                "user_id"=>$user_id,
                "pay_type"=>$pay_type,
                "amount"=>$amount,
                "paytm_number"=>$paytm_number,
                "phonepe_number"=>$phonepe_number,
                "account_number"=>$account_number,
                "ifsc"=>$ifsc,
                "holder_name"=>$holder_name,
                "request_id"=>$request_id,
                "status"=>0,
                "is_delete"=>0,
                "date"=>date("Y-m-d"),
                "time"=>date("H:i:s"),
                "date_time"=>date("Y-m-d H:i:s"),
            );
            $this->db->insert("withdraw_request",$data);
            $insert_id = $this->db->insert_id(); 

            if(!empty($insert_id))
            {
               $type = 'debit';
               $message = "Withdraw";
               $insert_id = $this->custom->wallet_credit_debit($user_id,$type,$amount,$message,$insert_id);
            }



            $result['message'] = "Withdraw request successfully...";
            $result['status']  = "200";
            $result['action']  = "add";
            $result['data']    = array("request_id"=>$request_id,);
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
        }
        echo json_encode($result);
    }
    public function document_update()
    {

        $token_data = $this->token_data;
        $user_id = $token_data->user_id;

        $result = array();

        $account_no = $this->input->post('account_no');
        $ifsc_code = $this->input->post('ifsc_code');
        $holder_name = $this->input->post('holder_name');
        $upi_id = $this->input->post('upi_id');
        
        $today = strtotime(date("Y-m-d"));
        $user_detail2 = array();
        $user_data = array(
            "account_no"=>$account_no,
            "ifsc_code"=>$ifsc_code,
            "holder_name"=>$holder_name,
            "upi_id"=>$upi_id,
            "kyc_step"=>1,
        );
        $row = $this->db->update("users",$user_data,array("id"=>$user_id,));
        if($row)
        {
            $result['message'] = "Update Successfully...";
            $result['status']  = "200";
            $result['action']  = "edit";
            $result['data']  = $user_detail2;
        }
        else
        {
            $result['message'] = "Update Not Successfully...";
            $result['status']  = "400";
            $result['data']    = $user_detail2;
        }               
        echo json_encode($result);
    }

    public function notification_status_change()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $result = array();        
        $user_detail2 = array();

        $user = $this->db->select('notification_status')->get_where("users",array("id"=>$user_id,))->result_object();
        if(empty($user))
        {
            $result['message'] = "User Not Found";
            $result['status']  = "400";
            $result['data']    = [];
            echo json_encode($result);
            die;
        }
        $user = $user[0];
        $status = $user->notification_status;
        if($status==0) $status = 1;
        else $status = 0;
        $user_data = array(
            "notification_status"=>$status,
        );
        
        if($this->db->update("users",$user_data,array("id"=>$user_id,)))
        {
            if($status==1)
                $result['message'] = "Notification ON";
            else
                $result['message'] = "Notification OFF";
            $result['status']  = "200";
            $result['action']  = "edit";
            $result['data']  = [];
        }
        else
        {
            $result['message'] = "Update Not Successfully...";
            $result['status']  = "400";
            $result['data']    = [];
        }               
        echo json_encode($result);
    }

    public function add_point_request()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $request_id = time().$user_id;
        $type = $this->input->post("type");
        $amount = $this->input->post("amount");
        $date_time = date("Y-m-d H:i:s");   
        $order_id = rand().$user_id;
        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();

        $setting = $this->db->select("min_deposit")->get_where("setting")->result_object()[0];
        $min_deposit = $setting->min_deposit;

        if($amount<$min_deposit)
        {
            $result['message'] = "Min Diposit amount ".$min_deposit;
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
            echo json_encode($result);
            die;
        }

        if(!empty($user))
        {
            $user = $user[0];
            $data = array(
                "user_id"=>$user_id,
                "type"=>$type,
                "amount"=>$amount,
                "request_id"=>$request_id,
                "status"=>0,
                "is_delete"=>0,
                "date"=>date("Y-m-d"),
                "time"=>date("H:i:s"),
                "date_time"=>date("Y-m-d H:i:s"),
                "add_date_time"=>date("Y-m-d H:i:s"),
                "update_date_time"=>date("Y-m-d H:i:s"),
            );
            $this->db->insert("recharge_request",$data);
            $insert_id = $this->db->insert_id();



            $result['message'] = "Recharge request successfully...";
            $result['status']  = "200";
            $result['action']  = "add";
            $result['data']    = array("request_id"=>$request_id,);
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    public function recharge_history()
    {
         $html = '';
         $token_data = $this->token_data;
         $user_id = $token_data->user_id;
         $page = $this->input->post("page");
         $limit = 12;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }
        

        
        $this->db->limit($limit,$offset);
        $this->db->order_by("recharge_request.id desc");
        $data = $this->db
             ->select("recharge_request.*")
             ->where(array('recharge_request.user_id'=>$user_id,))
             ->from('recharge_request as recharge_request')->get()->result_object();

         if(!empty($data))
         {
            $response_data['data'] = $data;
            $html = $this->load->view("app/user/cards/recharge_history",$response_data,true);            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }

    public function point_transfer()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $request_id = time().$user_id;
        $type = $this->input->post("type");
        $amount = $this->input->post("amount");
        $mobile = $this->input->post("mobile");
        $date_time = date("Y-m-d H:i:s");   
        $order_id = rand().$user_id;
        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        
        
        



        if(!empty($user))
        {
            $user = $user[0];
            $user2 = $this->db->get_where("users",array('mobile'=>$mobile,))->result_object();
            if(empty($user2))
            {
                $result['message'] = "Wrong Mobile";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            $user2 = $user2[0];

            if($user->wallet<$amount)
            {
                $result['message'] = "You have only ".price_formate($user->wallet);
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            $message = 'Point transfer to '.$user2->mobile;
            $type = 'debit';
            $join_id = '0';
            $this->custom->wallet_credit_debit($user_id,$type,$amount,$message,$join_id);

            $message = 'Point recieve by '.$user->mobile;
            $type = 'credit';
            $join_id = '0';
            $this->custom->wallet_credit_debit($user2->id,$type,$amount,$message,$join_id);


            $result['message'] = "Point transfer successfully...";
            $result['status']  = "200";
            $result['action']  = "add";
            $result['data']    = array();
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    public function game_bet()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $request_id = time().$user_id;
        $bid_data = $this->input->post("data");
        $user = $this->db->get_where("users",array("id"=>$user_id,))->result_object();
        if(empty($user))
        {
            $result['message'] = "Wrong user ID.";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
            echo json_encode($result);
            die;
        }
        $user = $user[0];
        if(json_decode($bid_data))
        {
            $bid_data = json_decode($bid_data);
            if(empty($bid_data->game_id))
            {
                $result['message'] = "Select game...";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            else if(empty($bid_data->time_id))
            {
                $result['message'] = "Select game time...";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            else if(empty($bid_data->card_id))
            {
                $result['message'] = "Select game card...";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            else if(empty($bid_data->bid_data))
            {
                $result['message'] = "Select bid data...";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            $game_id = $bid_data->game_id;
            $time_id = $bid_data->time_id;
            $card_id = $bid_data->card_id;
            $bid_row = $bid_data->bid_data;


            $game_time = $this->db->get_where("game_times",array("id"=>$time_id,"is_delete"=>0,"status"=>1,))->result_object()[0];

            $date_time = date("Y-m-d H:i:s");
            $open_date_time = date("Y-m-d ").$game_time->open_time;
            $open_date_time = date("Y-m-d ").'12:00:00';
            $close_date_time = date("Y-m-d ").$game_time->close_time;
            $open_btn_status = 1;
            $close_btn_status = 1;
            if($open_date_time<$date_time)
                $open_btn_status = 0;
            if($close_date_time<$date_time)
                $close_btn_status = 0;


            // if($close_btn_status==0)
            // {
            //     $result['message'] = "Time over...";
            //     $result['status']  = "400";
            //     $result['action']  = "add";
            //     $result['data']    = array();
            //     echo json_encode($result);
            //     die;
            // }
            // else if($open_btn_status==0)
            // {
            //     $result['message'] = "Open time over...";
            //     $result['status']  = "400";
            //     $result['action']  = "add";
            //     $result['data']    = array();
            //     echo json_encode($result);
            //     die;
            // }
            


            $total_amount = 0;
            foreach ($bid_row as $key => $value)
                $total_amount += (float) $value->bid_amount;
            if($total_amount>$user->wallet)
            {
                $result['message'] = "Low balance data...";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
                echo json_encode($result);
                die;
            }
            foreach ($bid_row as $key => $value)
            {
                $insert_data = array(
                    "user_id"=>$user_id,
                    "game_id"=>$game_id,
                    "time_id"=>$time_id,
                    "card_id"=>$card_id,
                    "add_date_time"=>date("Y-m-d H:i:s"),
                    "update_date_time"=>date("Y-m-d H:i:s"),
                    "is_delete"=>0,
                    "status"=>1,
                );
                if(!empty($value->bid))
                    $insert_data["bid"] = $value->bid;
                else
                    $insert_data["bid"] = 0;

                if(!empty($value->bid_amount))
                    $insert_data["amount"] = $value->bid_amount;
                

                if(!empty($value->ank))
                    $insert_data["bid"] = $value->ank;
                if(!empty($value->patti))
                    $insert_data["bid2"] = $value->patti;
                if(!empty($value->open_patti))
                    $insert_data["bid"] = $value->open_patti;
                if(!empty($value->close_patti))
                    $insert_data["bid2"] = $value->close_patti;

                // if(!empty($value->open_close))
                //     $insert_data["open_close"] = $value->open_close;
                // if(!empty($value->odd_even))
                //     $insert_data["odd_even"] = $value->odd_even;
                // if(!empty($value->sp_dp_tp))
                //     $insert_data["sp_dp_tp"] = $value->sp_dp_tp;
                // if(!empty($value->red_bracket))
                //     $insert_data["red_bracket"] = $value->red_bracket;
                
                $session_id = 1;
                if(!empty($value->type)) 
                {
                    $insert_data["type"] = $value->type;
                    if($value->type==2 || $value->type==5 || $value->type==6 || $value->type==12 || $value->type==13 || $value->type==14 || $value->type==15 || $value->type==16 || $value->type==17)
                        $session_id = 2;

                    if($value->type==16)
                    {
                        $insert_data["bid"] = $value->patti;
                        $insert_data["bid2"] = $value->ank;
                    }

                }


                $insert_data["session_id"] = $session_id;
                $this->db->insert("game_bet",$insert_data);
            }

            $message = 'Play the game';
            $type = 'debit';
            $this->custom->wallet_credit_debit($user_id,$type,$total_amount,$message,0);


            $result['message'] = "Bid successfully...";
            $result['status']  = "200";
            $result['action']  = "add";
            $result['data']    = array("wallet"=>$this->custom->wallet($user_id),);
        }
        else
        {
            $result['message'] = "Invailid data...";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
        }


        
        echo json_encode($result);


    }  



    public function game_history()
    {
        $html = '';
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $page = $this->input->post("page");
        $game_id = $this->input->post("game_id");
        $limit = 12;
        $offset = 0;
        if($page>0)
        {
            $offset = $page*$limit;
        }
        
        $this->db->limit($limit,$offset);
        $this->db->order_by("game_bet.id desc");
        $data = $this->db

            ->select("game_times.name as game_name")
            ->select("game_times.open_time as open_time")
            ->select("game_times.close_time as close_time")
            ->select("card.name as game_type")
            ->select("card.win_price as win_price")

            ->select("game_bet.id as id")
            ->select("game_bet.amount as amount")
            ->select("game.name as game_name2")
            ->select("game_bet.bid as bid")
            ->select("game_bet.bid2 as bid2")
            ->select("game_bet.type as type")
            ->select("game_bet.session_id as session_id")
            ->select("game_bet.card_id as card_id")
            ->select("game_bet.add_date_time as add_date_time")

            ->join("game as game","game_bet.game_id=game.id","LEFT")
            ->join("game_times as game_times","game_bet.time_id=game_times.id","LEFT")
            ->join("card as card","game_bet.card_id=card.id","LEFT")



            ->select("game_bet.*")
            ->where(array('game_bet.user_id'=>$user_id,"game_bet.game_id"=>$game_id,))
            ->from('game_bet as game_bet')->get()->result_object();

        if(!empty($data))
        {
            $response_data['data'] = $data;
            $html = $this->load->view("app/user/cards/game_history",$response_data,true);            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
        }
        else
        {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }
    public function chart_history()
    {
        $html = '';
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $page = $this->input->post("page");
        $game_id = $this->input->post("game_id");
        $time_id = $this->input->post("time_id");
        $limit = 12;
        $offset = 0;
        if($page>0)
        {
            $offset = $page*$limit;
        }
        
        $this->db->limit($limit,$offset);
        $this->db->order_by("game_result.id desc");
        $data = $this->db
            ->where(array('game_result.game_id'=>$game_id,'game_result.time_id'=>$time_id,))
            ->from('game_result as game_result')->get()->result_object();

        if(!empty($data))
        {
            $response_data['data'] = $data;
            $html = $this->load->view("app/user/cards/main_chart",$response_data,true);            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
        }
        else
        {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }

    public function chart_gali_history()
    {
        $html = '';
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $page = $this->input->post("page");
        $game_id = $this->input->post("game_id");
        $time_id = $this->input->post("time_id");
        $limit = 12;
        $offset = 0;
        if($page>0)
        {
            $offset = $page*$limit;
        }
        
        $this->db->limit($limit,$offset);
        $this->db->order_by("game_result.id desc");
        $data = $this->db
            ->where(array('game_result.game_id'=>$game_id,'game_result.time_id'=>$time_id,))
            ->from('game_result as game_result')->get()->result_object();

        if(!empty($data))
        {
            $response_data['data'] = $data;
            $html = $this->load->view("app/user/cards/gali_chart",$response_data,true);            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
        }
        else
        {
            $result['message'] = "Not found..";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }

    public function make_call()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $mobile = $this->input->post("mobile");
        $time_string = time();
        $this->load->model('Firebase_model');
        $id = $device_id;        
        $data = array($id=>array($time_string=>array("mobile"=>$mobile,)));
        $this->Firebase_model->call_status($data);
    }
    public function make_whatsapp()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $mobile = $this->input->post("mobile");
        $time_string = time();
        $this->load->model('Firebase_model');
        $id = $device_id;        
        $data = array($id=>array($time_string=>array("mobile"=>$mobile,)));
        $this->Firebase_model->whatsapp_status($data);
    }
    public function make_chrome()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $url = $this->input->post("url");
        $time_string = time();
        $this->load->model('Firebase_model');
        $id = $device_id;        
        $data = array($id=>array($time_string=>array("url"=>$url,)));
        $this->Firebase_model->chrome_status($data);
    }
    public function delete_firbase()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $mobile = $this->input->post("mobile");
        $time_string = time();
        $this->load->model('Firebase_model');
        $id = $device_id;        
        $this->Firebase_model->delete_whatsapp($id);
    }
    public function make_upi()
    {
        $setting = $this->db->select("upi_3,upi_2,upi")->get_where("site_setting")->result_object()[0];            
        
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $amount = $this->input->post("amount");
        $type = $this->input->post("type");
        
        if($type==1) $upi_id = $setting->upi_3;
        if($type==2) $upi_id = $setting->upi_2;
        if($type==3) $upi_id = $setting->upi;
                
        if($type==1) $type = 'gpay';
        if($type==2) $type = 'phonepe';
        if($type==3) $type = 'paytm';

        
        
        $time_string = time();
        $this->load->model('Firebase_model');
        $id = $device_id;        
        $data = array($id=>array($time_string=>array("amount"=>$amount,"type"=>$type,"upi_id"=>$upi_id,)));
        $this->Firebase_model->upi_status($data);
    }
    public function delete_account()
    {
        $u = $this->session->userdata('user');
        if(!empty($u))
        {
            $id = $this->session->userdata['user']['id'];
            $this->db->update("users",array("is_delete"=>1,),array("id"=>$id,));
            $this->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('role');
            redirect(base_url(user_app.'login?device_id='.$this->session->userdata("device_id")));
        }
        else
        {
            redirect(base_url(user_app.'login?device_id='.$this->session->userdata("device_id")));            
        }
    }

    public function profile_detail()
    {

    }  


    
/*--wallet recharge*/

    public function user_wallet_recharge()
    {
        $result = array();

        $amount = $this->input->post('amount');
        
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $request_id = time().$user_id;
        
        $this->db->where(array("device_id"=>$device_id,"status"=>0,))->delete("recharge_request");
        
        
        // $user_id = $this->session->userdata['user']['id'];
        $type = 'credit';
        $message = 'Add Money';
        $join_id = '0';

        if(!empty($amount))
        {
            $data = array(
                "user_id"=>$user_id,
                "device_id"=>$device_id,
                "type"=>$type,
                "amount"=>$amount,
                "request_id"=>$request_id,
                "status"=>0,
                "is_delete"=>0,
                "date"=>date("Y-m-d"),
                "time"=>date("H:i:s"),
                "date_time"=>date("Y-m-d H:i:s"),
                "add_date_time"=>date("Y-m-d H:i:s"),
                "update_date_time"=>date("Y-m-d H:i:s"),
            );
            $this->db->insert("recharge_request",$data);
            $insert_id = $this->db->insert_id();
            
            $result['status'] = '200';
            $result['message'] = 'Recharge Successfully Done';
            $result['data'] = $amount;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Somthing Wrong';
            $result['data'] = [];
        }
        echo json_encode($result);

    }


/*--wallet Withdraw*/

    public function user_wallet_withdraw()
    {
        $result = array();

        $amount = $this->input->post('amount');

        $token_data = $this->token_data;

        $user_id = $token_data->user_id;
        $type = 'debit';
        $message = 'Money Withdraw';
        $join_id = '0';

        if(!empty($amount))
        {
            $this->custom->wallet_credit_debit($user_id,$type,$amount,$message,$join_id);
            $result['status'] = '200';
            $result['message'] = 'Withdraw Successfully Done';
            $result['data'] = $amount;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Somthing Wrong';
            $result['data'] = [];
        }
        echo json_encode($result);

    }

    public function updateusername()
    {
        $result = array();

        $match_id = $this->input->post('match_id');
        $username = $this->input->post('username');
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $type = 'debit';
        $message = 'Money Withdraw';
        $join_id = '0';

        $matches = $this->db->get_where("matches",array("id"=>$match_id,))->result_object()[0];
        $date_time = date("Y-m-d H:i:s");
        $date_time = date("Y-m-d H:i:s",strtotime($date_time.'+30 minute'));
        $match_date_time = $matches->match_date_time;

        if($date_time>=$match_date_time)
        {
            $result['status'] = '400';
            $result['message'] = 'Update time over!';
            $result['data'] = [];
            echo json_encode($result);
            die;
        }


        if(!empty($username))
        {
            $username = explode(",",$username);
            foreach ($username as $key => $value)
            {
                $data = array("username"=>$value,);
                $this->db->update("join_match_participates",$data,array("match_id"=>$match_id,"user_id"=>$user_id,));
            }
            $result['status'] = '200';
            $result['message'] = 'Update Successfully Done';
            $result['data'] = [];
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'Somthing Wrong';
            $result['data'] = [];
        }
        echo json_encode($result);

    }



/*---------user  match join--*/

    public function user_join_match()
    {
        $result = array();
        $addeddate = date("Y-m-d H:i:s"); 
        $status = 0;

        $type = 'debit';
        $message = 'Participate In Game';
        $join_id = '0';
        $username = explode(",", $this->input->post('username'));
        $game_uid = explode(",", $this->input->post('game_uid'));

        $set_user = 0;
        foreach($username as $key => $value2)
        {
            if(!empty($value2))
            {
                $set_user++;
            }
        }
        $set_game_uid = 0;
        foreach($game_uid as $key => $value2)
        {
            if(!empty($value2))
            {
                $set_game_uid++;
            }
        }

        $amount = $this->input->post('amount')*$set_user;

        $token_data = $this->token_data;
        $user_id = $token_data->user_id;

        $match_id = $this->input->post('match_id');
        $match_type = $this->input->post('match_type');
        $get_user_wallet = 0;
        $getwallet = $this->db->get_where('users',array('id'=>$user_id))->result_object();


        

        $get_user_wallet = $getwallet[0]->wallet;
        $get_user_winning_amt = $getwallet[0]->winning_amt;


        $wallet_amount_deduct = 0;
        $win_amount_deduct = 0;
        $check_total_amount = 0;
        if($get_user_wallet>=$amount)
        {
            /*wallet section*/
            $check_total_amount = $wallet_amount_deduct = $amount;
        }
        else
        {
            /*win amount section*/
            if($get_user_wallet>0)
            {
                $wallet_amount_deduct = $get_user_wallet;
                if($get_user_winning_amt>0)
                {
                    if(($amount-$wallet_amount_deduct)>$get_user_winning_amt)
                        $win_amount_deduct = $get_user_winning_amt;
                    else
                        $win_amount_deduct = $amount-$wallet_amount_deduct;
                }
            }
            else
            {
                if(($amount-$wallet_amount_deduct)>$get_user_winning_amt)
                    $win_amount_deduct = $get_user_winning_amt;
                else
                    $win_amount_deduct = $amount-$wallet_amount_deduct;
            }
        }
        $check_total_amount = $wallet_amount_deduct+$win_amount_deduct;
        // echo "string";
        // echo $check_total_amount;
        // echo $wallet_amount_deduct;
        // echo $win_amount_deduct;

        // $get_user_bonus_amt = $getwallet[0]->bonus_amt;

        if($check_total_amount<$amount)
        {
            $result['status'] = '400';
            $result['message'] = 'Wallet Recharge First...';
            $result['data'] = [];
            echo json_encode($result);
            die;
        }

        // die;


        $finalamount = $get_user_wallet+$get_user_winning_amt;

        // if($get_user_wallet>$amount)
        // {

            if(!empty($username))
            {
                $allnames = array(
                    "user_id"=>$user_id,
                    "match_id"=>$match_id,
                    "match_type"=>$match_type,
                    "username"=>$username,
                    "game_uid"=>$game_uid,
                    "amount"=>$amount,
                    "addeddate"=>$addeddate,
                );

                $get_users = json_encode($allnames);
                $all_users = $get_users;

                

                $matches = $this->db->get_where("matches",array("id"=>$match_id,))->result_object()[0];
                $join_count_available = $matches->join_count_available;
                $join_count_total = $matches->join_count_total;
                $room_size = $matches->room_size;
                $match_type = $matches->match_type;
                $per_id_user_join = 0;
                $game_ids = $matches->game_id;

                if($match_type=='Solo')$per_id_user_join=1;
                if($match_type=='Duo')$per_id_user_join=2;
                if($match_type=='Squad')$per_id_user_join=4;


                $insert_data = array(
                    "match_id"=>$match_id,
                    "match_type"=>$match_type,
                    "user_id"=>$user_id,
                    "amount"=>$amount,
                    "all_users"=>$all_users,
                    "addeddate"=>$addeddate,
                    "game_id"=>$game_ids,
                );


                
                $query = $this->db->where(array('match_id'=>$match_id,"user_id"=>$user_id,))->get('join_match_participates');
                $count = $query->num_rows();
                if($count>=$per_id_user_join)
                {
                    $result['status'] = '400';
                    $result['message'] = 'All User Joined...';
                    $result['data'] = [];
                    echo json_encode($result);
                    die;
                }

                if($join_count_available<=$join_count_total)
                {
                    $result['status'] = '400';
                    $result['message'] = 'Room Full...';
                    $result['data'] = [];
                    echo json_encode($result);
                    die;
                }


                // $check = $this->db->get_where("join_match",array("user_id"=>$user_id,"match_id"=>$match_id,))->result_object();
                // if(!empty($check))
                // {
                //     $result['status'] = '400';
                //     $result['message'] = 'You allready joined...';
                //     $result['data'] = [];
                //     echo json_encode($result);
                //     die;
                // }


                $check1 = $this->db->where_in("username",$username)->get_where("join_match_participates",array("match_id"=>$match_id,))->result_object();
                if(!empty($check1))
                {
                    $result['status'] = '400';
                    $result['message'] = 'This User Already Added...';
                    $result['data'] = [];
                    echo json_encode($result);
                    die;
                }


                if(!empty($insert_data))
                {
                    $this->db->insert('join_match',$insert_data);
                    $insert_id = $this->db->insert_id();

                    if(!empty($username))
                    {
                        foreach($username as $key => $value2)
                        {
                            if(!empty($value2))
                            {

                                $check1 = $this->db->get_where("join_match_participates",array("table_id"=>$insert_id,"match_id"=>$match_id,"username"=>$value2,))->result_object();

                                if(empty($check1))
                                {
                                    $all_name = array(
                                        "table_id"=>$insert_id,
                                        "status"=>$status,
                                        "match_id"=>$match_id,
                                        "match_type"=>$match_type,
                                        "user_id"=>$user_id,
                                        "username"=>$value2,
                                        "game_uid"=>$game_uid[$key],
                                    );
                                    $this->db->insert('join_match_participates',$all_name);
                                    $this->custom->wallet_credit_debit($user_id,$type,$wallet_amount_deduct,$message,$match_id,2);
                                    if($win_amount_deduct>0)
                                        $this->custom->win_credit_debit($user_id,"debit",$win_amount_deduct,"join match",$match_id,2);
                                    // $this->custom->bou_credit_debit($user_id,$type,$amount,$message,$match_id,2);



                                    $join_count_total = $matches->join_count_total+1;
                                    $this->db->update("matches",array("join_count_total"=>$join_count_total,),array("id"=>$match_id,));
                                }
                            }
                        }
                    }
                    


                    $result['status'] = '200';
                    $result['message'] = 'Match Join Successfully';
                    $result['data'] = $insert_data;
                }
            }
            else
            {
                $result['status'] = '400';
                $result['message'] = 'Please Enter Your Username';
                $result['data'] = [];
            }
        // }
        // else
        // {
        //     $result['status'] = '400';
        //     $result['message'] = 'Not Enough Coins.';
        //     $result['data'] = [];
        // }
        echo json_encode($result);
    }


    /*withdraw request*/
    public function new_withdraw_request()
    {
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $request_id = time().$user_id;

        $this->db->order_by('id desc');
        $check_last = $this->db->get_where('withdraw_request',array('status'=>0,'user_id'=>$user_id))->result_object();
        if(empty($check_last))
        {
            // $pay_type = $this->input->post("type");
            $amount = $this->input->post("amount");
            $upi_no = $this->input->post("upi_no");
            $account_holder_id = $this->input->post("account_holder_id");
            
            $date_time = date("Y-m-d H:i:s");   
            $order_id = rand().$user_id;
            $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
            if(!empty($user))
            {
                $user = $user[0];
                $wallet_amount = $user->winning_amt;
                // $wallet_amount = $user->wallet;

                if($wallet_amount<$amount)
                {
                    $result['status']  = "400";
                    $result['message'] = "You have only ".($wallet_amount)." ";
                    $result['data']    = array();
                    echo json_encode($result);
                    die;
                }
                $data = array(
                    "user_id"=>$user_id,
                    "amount"=>$amount,
                    "upi_no"=>$upi_no,
                    "holder_name"=>$account_holder_id,
                    "request_id"=>$request_id,
                    "status"=>0,
                    "is_delete"=>0,
                    "date"=>date("Y-m-d"),
                    "time"=>date("H:i:s"),
                    "date_time"=>date("Y-m-d H:i:s"),
                );
                $this->db->insert("withdraw_request",$data);
                $insert_id = $this->db->insert_id(); 

                if(!empty($insert_id))
                {
                   $new_amount = $wallet_amount-$amount;
                   $this->db->update("users",array("winning_amt"=>$new_amount,),array("id"=>$user_id,));  
                   $type = 'debit';
                   $message = "Withdraw";

                   $history_data = array(
                        "user_id"=>$user_id,
                        "join_id"=>$insert_id,
                        "amount"=>$amount,
                        "balance"=>$new_amount,
                        "type"=>$type,
                        "message"=>$message,
                        "date_time"=>date("Y-m-d H:i:s"),
                        "add_date_time"=>date("Y-m-d H:i:s"),
                        "update_date_time"=>date("Y-m-d H:i:s"),
                        "status"=>0,                  
                        "is_delete"=>0,
                      );
                      $this->db->insert("user_history",$history_data);
                }



                $result['message'] = "Withdrawal Credit your account within 1,2 hour.";
                $result['status']  = "200";
                $result['action']  = "add";
                $result['data']    = array("request_id"=>$request_id,);
            }
            else
            {
                $result['message'] = "User not found";
                $result['status']  = "400";
                $result['action']  = "add";
                $result['data']    = array();
            }
        }
        else
        {
            $result['message'] = "Last Withdraw Not Clear Please wait.";
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
        }
    

        
        echo json_encode($result);
    }



    /*----payment success---*/

    public function payment_sucess()
    {
        $result = array();
        
       $device_id = $this->input->post('device_id');
       if(!empty($device_id))
       {
        $result['status'] = '200';
        $result['message'] = 'Successfully';
        $result['status'] = $device_id;
       }
       else
       {
        $result['status'] = '400';
        $result['message'] = 'Failed';
        $result['status'] = [];
       }
       echo json_encode($result);
    }














}
