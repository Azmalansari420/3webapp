<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->otp = rand(999,9999);
        $this->otp = 1234;
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
        return $access_token;
    }

    /*login*/
    public function login()
    { 
        $result = array();
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        
        $user = $this->db->get_where("users",array('email'=>$email))->result_array();

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
                        $url = base_url('app/user/home?id='.$device_id.'&token='.$firebase_token);
                        // $this->session->set_userdata('device_id',$device_id);
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
            $result['message'] = "Wrong Email.";
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

        $role = 1;
        $user_id  = generate_user_id();
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        $profile_image = 'user-profile.jpg';
        $status = 1;
        $date_time = date("Y-m-d H:i:s");
        
        $user = $this->db->get_where("users",array('email'=>$email))->result_array();
        $insertdata = array(
                "role"=>$role,
                "user_id"=>$user_id,
                "name"=>$name,
                "email"=>$email,
                "mobile"=>$mobile,
                "password"=>$password,
                "profile_image"=>$profile_image,
                "status"=>$status,
                "date_time"=>$date_time,
            );
        $url = base_url('app/user/login.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

        if(empty($user))
        {

            $this->db->insert('users',$insertdata);
            $result['message'] = "Register Successfully";
            $result['status']  = "200";
            $result['data']    = $insertdata;
            $result['url']    = $url;
        
        }
        else
        {
            $result['message'] = "Email Already Registerd.";
            $result['status']  = "400";
            $result['data']    = $insertdata;
            $result['url']    = "";
        }
        echo json_encode($result);
    }


    /*forget password*/
    public function forget_password() 
    {
        $result = array();
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        $email = $this->input->post('email');
        $user = $this->db->get_where("users",array('email'=>$email))->result_array();

        $message = "";

        if(!empty($user)) 
        {
            $user = $user[0];
            $name = $user['name'];
            $password = $user['password'];
            $subject = "Forget Password";
            $message = 'Hey '.$name.' Your Old Password Is '.$password.'. Login & Update Your Password. Thanks you using Our App. Team ' . website_name; // Concatenated website_name

            $this->email->sendmail_bygmail($email,$subject,$message);
            
            $result['message'] = "Check Your Email";
            $result['status'] = "200";
            $result['data'] = $message;
        } 
        else 
        {
            $result['message'] = "Wrong Email.";
            $result['status'] = "400";
            $result['data'] = "";
        }
        echo json_encode($result);
    }

    
    


    
    








    




    public function logout()
    {
        $device_id = $this->input->get('id');
        $firebase_token = $this->input->get('token');
        $check_login = $this->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
        if(!empty($check_login) && !empty($device_id))
        {
            $check_login = $check_login[0];
            $id = $check_login->id;
            $this->db->update("login_history",array("status"=>0,),array("id"=>$id,"status"=>1,));
            redirect(base_url(user_app.'login?id='.$device_id.'&firebase_token='.$firebase_token));
        }
        else
        {
            redirect(base_url(user_app.'login?id='.$device_id.'&firebase_token='.$firebase_token));
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