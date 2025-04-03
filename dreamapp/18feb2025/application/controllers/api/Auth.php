<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->otp = rand(999,9999);
        // $this->otp = 1234;
    }
    public function index()
    {
        echo "string";
    }

    public function token_session($user)
    {
        $device_id = $this->input->post('device_id');
        $password = $this->input->post('password');
        $firebase_token = $this->input->post('firebase_token');
        $date_time = date("Y-m-d H:i:s");
        $token_data = array("user_id"=>$user['id'],"password"=>$user['password'],"hours"=>token_hours,"date_time"=>$date_time,"role"=>$user['role'],"device_id"=>$device_id,);
        $access_token = encode_token($token_data);
        $password = $user['password'];

        $login_detail = array(
            "user_id"=>$user['id'],
            "role"=>$user['role'],
            "ip_address"=>$_SERVER['REMOTE_ADDR'],
            "date"=>date("Y-m-d"),
            "time"=>date("H:i:s"),
            "status"=>1,
            "device_id"=>$device_id,
            "password"=>$password,
            "firebase_token"=>$firebase_token,
            "access_token"=>$access_token,
        );
        $this->db->insert("login_history",$login_detail);
        $data = array(
            "user"=>array("id"=>$user['id'],"role"=>$user['role'],"password"=>$user['password'],),
        );
        $this->session->set_userdata($data);
        $this->session->set_userdata(array("access_token"=>$access_token,));
        return $access_token;
    }

    /*login*/
    public function login()
    { 
        $result = array();
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();

        $today = strtotime(date("Y-m-d"));
        $access_token = '';
        $user_detail2 = array(
                    "token"=>"",
                );
        if(!empty($user))
        {
            $user = $user[0];
            
            if($user['status']==1)
            {
                if($user['password']==$password)
                {
                    $access_token = $this->token_session($user);
                    $user_id = $user['id'];
                    $user_detail2['token'] = $access_token;

                    $url = '';
                    if($user['role']==1)
                    {                           
                        $url = base_url('app/user/home.php?device_id='.$device_id.'&token='.$firebase_token);
                    }
                    
                    $result['message'] = "login successfully";
                    $result['status']  = "200";
                    $result['action']    = "login";
                    $result['url']    = $url;
                    $result['data']    = $user_detail2;

                }
                else
                {
                    $result['message'] = "Wrong Password... ";
                    $result['status']  = "400";
                    $result['data']    = $user_detail2;
                }
            }
            else
            {
                $result['message'] = "Your Account Is Blocked...";
                $result['status']  = "400";
                $result['data']    = $user_detail2;
            }
        
        }
        else
        {
            $result['message'] = "Wrong Mobile No.";
            $result['status']  = "400";
            $result['data']    = $user_detail2;
        }
        echo json_encode($result);
    }



    /*register*/
    public function registration()
    { 
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');

        $otp = $this->otp;

        $referral_by = NULL;
        $referal_status = 2;
        $role = 1;
        $user_id  = generate_user_id();
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $state_id = $this->input->post('state_id');
        $profile_image = 'user-profile.png';
        $status = 1;
        $date_time = date("Y-m-d H:i:s");

        $referal_code = $this->input->post('referal_code');
        $numeric_user_id = preg_replace("/[^0-9]/", "", $referal_code);
        $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->result_object();

        if (!empty($referal_code)) 
        {
            $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->row();
            
            if (!$check_user_referal) {
                echo json_encode(["status" => 400, "message" => "Wrong Referral ID.", "data" => []]);
                return;
            } else {
                $referral_by = $referal_code;
                $referal_status = 1;
            }
        }
        
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();

        $insertdata = array(
                "role"=>$role,
                "otp"=>$otp,
                "user_id"=>$user_id,
                "name"=>$name,
                "email"=>$email,
                "mobile"=>$mobile,
                "password"=>$password,
                "state_id"=>$state_id,
                "profile_image"=>$profile_image,
                "status"=>$status,
                "date_time"=>$date_time,
                "referral_by"=>$referral_by,
                "referal_status"=>$referal_status,
            );

        if(empty($user))
        {
            if(empty($this->db->get_where("user_temp_register",array('mobile'=>$mobile,))->result_array()))
            {
                $row = $this->db->insert("user_temp_register",$insertdata);
            }
            else
            {
                $row = $this->db->update("user_temp_register",$insertdata,array("mobile"=>$phone,));
            }
            if($row)
            {
                $this->sms->sendsms($otp,$mobile);
                $url = base_url('app/user/otp.php?device_id='.$device_id.'&token='.$firebase_token.'&mobile='.$mobile);

                $result['message'] = "Otp send successfully.";
                $result['status']  = "200";
                $result['data']    = $insertdata;
                $result['url']    = $url;

            }
            else
            {
                $result['message'] = "Otp not send.";
                $result['status']  = "400";
                $result['data']    = $insertdata;
            }        
        }
        else
        {
            $result['message'] = "Mobile No Already Registerd.";
            $result['status']  = "400";
            $result['data']    = $insertdata;
        }
        echo json_encode($result);
    }


    public function registration_otp_verify()
    { 
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');

        $access_token = '';
        $user_detail2 = array(
                    "token"=>"",
                );

        $otp = $this->input->post('otp');
        $mobile = $this->input->post('mobile');
       
        $user = $this->db->get_where("user_temp_register",array('mobile'=>$mobile,'otp'=>$otp))->result_array();        

        if(!empty($user))
        {
            $user = $user[0];

            $insertdata = array(
                "role" => $user['role'], 
                "otp" => $user['otp'],
                "user_id" => $user['user_id'],
                "name" => $user['name'],
                "email" => $user['email'],
                "mobile" => $user['mobile'],
                "password" => $user['password'],
                "state_id" => $user['state_id'],
                "profile_image" => $user['profile_image'],
                "status" => $user['status'],
                "date_time" => $user['date_time'],
                "referral_by" => $user['referral_by'],
                "referal_status" => $user['referal_status'],
            );

            $referal_code = $user['referral_by'];
            $numeric_user_id = preg_replace("/[^0-9]/", "", $referal_code);
            $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->result_object();

            if (!empty($referal_code)) 
            {
                $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->row();
                
                if (!$check_user_referal) 
                {
                    echo json_encode(["status" => 400, "message" => "Wrong Referral ID.", "data" => []]);
                    return;
                } 
                else 
                {
                    $referral_by = $referal_code;
                    $referal_status = 1;
                    /*jiska refere use kra he usko */
                    $getuserid = $this->db->get_where('users',array('user_id'=>$referral_by))->result_object();
                    $request_id = time();
                    $user_id = $check_user_referal->id;
                    $add_type = 6;
                    $type = "credit";
                    $amount = 20;
                    $message = 'Refreal Amount';
                    $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);

                    /*jisney refer use kra he*/




                }
            }

            
            $this->db->insert('users',$insertdata);
            $insert_id = $this->db->insert_id();

            $request_id = time();
            $user_id = $insert_id;
            $add_type = 6;
            $type = "credit";
            $amount = 20;
            $message = 'Refreal Amount';
            $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);


            $this->db->delete('user_temp_register',array('mobile'=>$mobile));

            if($user['status']==1)
            {
                $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array()[0];
                
                $access_token = $this->token_session($user);
                $user_id = $user['id'];
                $user_detail2['token'] = $access_token;

                $url = '';
                if($user['role']==1)
                {                           
                    $url = base_url('app/user/home.php?device_id='.$device_id.'&token='.$firebase_token);
                }
            }
            

            $result['message'] = "Registration Successfully.";
            $result['status']  = "200";
            $result['data']    = $user_detail2;
            $result['url']    = $url;

                   
        }
        else
        {
            $result['message'] = "Wrong OTP.";
            $result['status']  = "400";
            $result['data']    = $user_detail2;
        }
        echo json_encode($result);
    }



    /*foegrte*/

    public function forget_password() 
    {
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        $otp = $this->otp;

        $mobile = $this->input->post('mobile');
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();

        if(!empty($user)) 
        {
            $this->sms->sendsms($otp,$mobile);

            $this->db->where('mobile',$mobile);
            $this->db->update("users",array('otp'=>$otp));

            $url = base_url('app/user/forget-otp.php?device_id='.$device_id.'&token='.$firebase_token.'&mobile='.$mobile);
            // print_r($url);
            // die;
            
            $result['message'] = "Check Your Mobile";
            $result['status'] = "200";
            $result['url'] = $url;
            // $result['data'] = $url;
        } 
        else 
        {
            $result['message'] = "Wrong Mobile.";
            $result['status'] = "400";
            $result['data'] = "";
        }
        echo json_encode($result);
    }


    /*--upload status--*/

    public function forget_otp_verify()
    { 
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');        

        $otp = $this->input->post('otp');
        $mobile = $this->input->post('mobile');
       
        $user = $this->db->get_where("users",array('mobile'=>$mobile,'otp'=>$otp))->result_array();        

        if(!empty($user))
        {
                     
            $url = base_url('app/user/forget-change-password.php?device_id='.$device_id.'&token='.$firebase_token.'&mobile='.$mobile);   

            $result['message'] = "Verify Successfully.";
            $result['status']  = "200";
            $result['data']    = $mobile;
            $result['url']    = $url;

                   
        }
        else
        {
            $result['message'] = "Wrong OTP.";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }

    /*nbew pass*/
    public function forget_changepassword()
    { 
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');        

        $password = $this->input->post('password');
        $mobile = $this->input->post('mobile');
       
        $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();        

        if(!empty($user))
        {

            $this->db->where('mobile',$mobile);
            $this->db->update("users",array('password'=>$password));
                     
            $url = base_url('app/user/login.php?device_id='.$device_id.'&token='.$firebase_token);   

            $result['message'] = "Upadate Successfully.";
            $result['status']  = "200";
            $result['data']    = $mobile;
            $result['url']    = $url;

                   
        }
        else
        {
            $result['message'] = "ERROR.";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }











    // public function registration()
    // { 
    //     $result = array();
    //     $device_id = $this->input->post('device_id');
    //     $firebase_token = $this->input->post('firebase_token');

    //     $referral_by = NULL;
    //     $referal_status = 2;
    //     $role = 1;
    //     $user_id  = generate_user_id();
    //     $name = $this->input->post('name');
    //     $email = $this->input->post('email');
    //     $mobile = $this->input->post('mobile');
    //     $password = $this->input->post('password');
    //     $state_id = $this->input->post('state_id');
    //     $profile_image = 'user-profile.png';
    //     $status = 1;
    //     $date_time = date("Y-m-d H:i:s");

    //     $referal_code = $this->input->post('referal_code');
    //     $numeric_user_id = preg_replace("/[^0-9]/", "", $referal_code);
    //     $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->result_object();

    //     if (!empty($referal_code)) 
    //     {

    //         $check_user_referal = $this->db->get_where("users", array("user_id" => $numeric_user_id, 'status' => 1))->row();
            
    //         if (!$check_user_referal) {
    //             echo json_encode(["status" => 400, "message" => "Wrong Referral ID.", "data" => []]);
    //             return;
    //         } else {
    //             $referral_by = $referal_code;
    //             $referal_status = 1;
    //         }
    //     }
        
    //     $user = $this->db->get_where("users",array('mobile'=>$mobile))->result_array();
    //     $insertdata = array(
    //             "role"=>$role,
    //             "user_id"=>$user_id,
    //             "name"=>$name,
    //             "email"=>$email,
    //             "mobile"=>$mobile,
    //             "password"=>$password,
    //             "state_id"=>$state_id,
    //             "profile_image"=>$profile_image,
    //             "status"=>$status,
    //             "date_time"=>$date_time,
    //             "referral_by"=>$referral_by,
    //             "referal_status"=>$referal_status,
    //         );
    //     $url = base_url('app/user/login.php?device_id='.$device_id.'&token='.$firebase_token);

    //     if(empty($user))
    //     {

    //         $this->db->insert('users',$insertdata);
    //         $result['message'] = "Register Successfully";
    //         $result['status']  = "200";
    //         $result['data']    = $insertdata;
    //         $result['url']    = $url;
        
    //     }
    //     else
    //     {
    //         $result['message'] = "Mobile No Already Registerd.";
    //         $result['status']  = "400";
    //         $result['data']    = $insertdata;
    //         $result['url']    = "";
    //     }
    //     echo json_encode($result);
    // }































    /*forget password*/
    // public function forget_password() 
    // {
    //     $result = array();
    //     $device_id = $this->input->post('device_id');
    //     $firebase_token = $this->input->post('firebase_token');
    //     $email = $this->input->post('email');
    //     $user = $this->db->get_where("users",array('email'=>$email))->result_array();

    //     $message = "";

    //     if(!empty($user)) 
    //     {
    //         $user = $user[0]; // Corrected $user_detail2 to $user
    //         $name = $user['name']; // Accessing array elements using $
    //         $password = $user['password']; // Accessing array elements using $
    //         $subject = "Forget Password"; // Added semicolon here
    //         $message = 'Hey '.$name.' Your Old Password Is '.$password.'. Login & Update Your Password. Thanks you using Our App. Team ' . website_name; // Concatenated website_name

    //         $this->email->sendmail_bygmail($email,$subject,$message);
            
    //         $result['message'] = "Check Your Email";
    //         $result['status'] = "200";
    //         $result['data'] = $message;
    //     } 
    //     else 
    //     {
    //         $result['message'] = "Wrong Email.";
    //         $result['status'] = "400";
    //         $result['data'] = "";
    //     }
    //     echo json_encode($result);
    // }

    
    









    




    public function logout()
    {
        $u = $this->session->userdata('user');
        if(!empty($u))
        {
            $id = $this->session->userdata['user']['id'];
            $this->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));

            
            $this->session->unset_userdata('user');
            $this->session->unset_userdata('role');
            redirect(base_url(user_app.'login.php?device_id='.$this->session->userdata("device_id").'&firebase_token='.$this->session->userdata("firebase_token")));
        }
        else
        {
            redirect(base_url(user_app.'login.php?device_id='.$this->session->userdata("device_id").'&firebase_token='.$this->session->userdata("firebase_token")));
        }
    }
    
    public function device_logout()
    {
        $u = $this->session->userdata('user');
        $device_id = $this->input->post('device_id');
        
        // $id = $this->session->userdata['user']['id'];
        $this->db->update("login_history",array("status"=>0,),array("device_id"=>$device_id,"status"=>1,));
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role'); 

        $result['message'] = "successfully...";
        $result['status']  = "200";
        $result['data']    = [];  
        echo json_encode($result);     
    }



}