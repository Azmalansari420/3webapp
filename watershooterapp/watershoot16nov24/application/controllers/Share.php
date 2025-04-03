<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {




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













}