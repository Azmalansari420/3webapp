<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }
   

/*update passweoerf*/
    public function password_update()
    {
        
        $user_id = $this->input->post("user_id");
        $oldpassword = $this->input->post("oldpassword");
        $npassword = $this->input->post("npassword");
        $cpassword = $this->input->post("cpassword");

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

    /*----click to update profule image--*/
    public function update_image()
    {
        $result = array();
        $user_data = array();        
      
        $user_id = $this->input->post('user_id');
        $image = $this->input->post('image');
       
        if(!empty($user_id))
        {
            if ($image)
            {
                $image_content = base64_decode(explode(",", $image)[1]);
                $image_time = time().$user_id.'user_profile.png';
                $image_path = 'media/uploads/distributor/'.$image_time;

                if(file_put_contents($image_path, $image_content)) 
                {
                    $user_data = array(
                        "profile_image"=>$image_time,
                    );
                    if($this->db->update("users",$user_data,array('id' => $user_id, )))
                    {
                        $result['message'] = "Update successfully.";
                        $result['status']  = "200";
                    }
                    else
                    {
                        $result['message'] = "Update not successfully.";
                        $result['status']  = "400";
                    }                   
                }
            }
            else
            {
                $result['message'] = "Upload Image first.";
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

    /*-----click to update profile data----------*/
    public function update_profile()
    {
        $result = array();

        $user_id = $this->input->post("user_id");
        $name = $this->input->post("name");
        $mobile = $this->input->post("mobile");
        $address = $this->input->post("address");
        $state = $this->input->post("state");
        $city = $this->input->post("city");

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();
        if(!empty($user))
        {
            $data = array(                
                "name"=>$name,
                "mobile"=>$mobile,
                "address"=>$address,
                "state"=>$state,
                "city"=>$city,
            );
            $this->db->update("users",$data,array("id"=>$user_id,));

            $result['status']  = "200";
            $result['message'] = "Update Successfully.";
            $result['data']  = $data;
        }
        else
        {
            $result['message'] = "User not found";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }







    

 

  











































  /*---stilll not used---*/

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
        $setting = $this->db->select("upi_3,upi_2,upi")->get_where("setting")->result_object()[0];
            
        
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;
        $device_id = $token_data->device_id;
        $amount = $this->input->post("amount");
        $type = $this->input->post("type");
        
        $upi_id = '';
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

   
    
}
