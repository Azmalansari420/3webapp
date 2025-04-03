<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Accountteam extends CI_Controller 
{



 public function add_upadate_ledger()
{
    $result = array();

    $user_id = $this->session->userdata("user")['id'];
    $device_id = $this->session->userdata("device_id");  
    $firebase_token = $this->session->userdata("firebase_token"); 

    $table_id = $this->input->post("table_id");

    function sanitize_input($value) {
        return (!isset($value) || trim($value) === "" || $value === "undefined") ? NULL : $value;
    }

    $state_id = sanitize_input($this->input->post("state_id"));
    $city_id = sanitize_input($this->input->post("city_id"));
    $distric_id = sanitize_input($this->input->post("distric_id"));
    $distributer_id = sanitize_input($this->input->post("distributer_id"));
    $select_date = sanitize_input($this->input->post("select_date"));
    $document_type = sanitize_input($this->input->post("document_type"));
    $document_no = sanitize_input($this->input->post("document_no"));
    $quantity = sanitize_input($this->input->post("quantity"));
    $imp_no = sanitize_input($this->input->post("imp_no"));
    $amount = sanitize_input($this->input->post("amount"));
    $message = sanitize_input($this->input->post("message"));
    $status = 1;
    $addeddate = date('Y-m-d H:i:s');

    $updatedata = array(                
        "user_id" => $user_id,
        "state_id" => $state_id,
        "city_id" => $city_id,
        "distric_id" => $distric_id,
        "distributer_id" => $distributer_id,
        "select_date" => $select_date,
        "document_type" => $document_type,
        "document_no" => $document_no,
        "quantity" => $quantity,
        "imp_no" => $imp_no,
        "amount" => $amount,
        "message" => $message,
        "status" => $status,
        "addeddate" => $addeddate,
    );

    if(!empty($updatedata))
    {   
        if(!empty($table_id))
        {
            $request_id = time();
            $user_id = $distributer_id;                            
            $type = 'credit';
            $type2 = 1;
            $amount = $amount;
            $message = 'Add Money';
            $join_id = $insert_id;

            $datas = $this->crud->wallet_credit_debit($user_id,$type,$amount,$message,$join_id,$request_id,$type2);

            $wallet_amount = $this->crud->wallet($user_id);

            // print_r($user_id);
            // die;


            $this->db->where('id',$table_id);
            $this->db->update('ledger_creation', $updatedata);
            $result['message'] = "Update Successfully.";
        }
        else
        {
            $this->db->insert('ledger_creation', $updatedata);
            $result['message'] = "Insert Successfully.";
        }

        $url = base_url('app/acountteam/ledger-creation-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
        $result['status']  = "200";            
        $result['data']  = $updatedata;
        $result['url']  = $url;
    }
    else
    {
        $result['message'] = "ERROR";
        $result['status']  = "400";
        $result['data']    = array();
    }
    echo json_encode($result);
}











    
 public function add_upadate_distributerwallet()
{
    $result = array();

    $user_id = $this->session->userdata("user")['id'];
    $device_id = $this->session->userdata("device_id");  
    $firebase_token = $this->session->userdata("firebase_token"); 

    $table_id = $this->input->post("table_id");

    function sanitize_input($value) 
    {
        return (!isset($value) || trim($value) === "" || $value === "undefined") ? NULL : $value;
    }

    $state_id = sanitize_input($this->input->post("state_id"));
    $city_id = sanitize_input($this->input->post("city_id"));
    $distric_id = sanitize_input($this->input->post("distric_id"));
    $distributer_id = sanitize_input($this->input->post("distributer_id"));
    $select_date = sanitize_input($this->input->post("select_date"));
    $document_type = sanitize_input($this->input->post("document_type"));
    $document_no = sanitize_input($this->input->post("document_no"));
    $quantity = sanitize_input($this->input->post("quantity"));
    $amount = sanitize_input($this->input->post("amount"));
    $imp_no = sanitize_input($this->input->post("imp_no"));
    $message = sanitize_input($this->input->post("message"));
    $status = 1;
    $addeddate = date('Y-m-d H:i:s');

    $updatedata = array(                
        "user_id" => $user_id,
        "state_id" => $state_id,
        "city_id" => $city_id,
        "distric_id" => $distric_id,
        "distributer_id" => $distributer_id,
        "select_date" => $select_date,
        "document_type" => $document_type,
        "document_no" => $document_no,
        "quantity" => $quantity,
        "amount" => $amount,
        "imp_no" => $imp_no,
        "message" => $message,
        "status" => $status,
        "addeddate" => $addeddate,
    );

    if(!empty($updatedata))
    {   
        if(!empty($table_id))
        {
            $request_id = time();
            $user_id = $distributer_id;                            
            $type = 'credit';
            $type2 = 1;
            $amount = $amount;
            $message = 'Add Money';
            $join_id = $insert_id;

            $datas = $this->crud->wallet_credit_debit($user_id,$type,$amount,$message,$join_id,$request_id,$type2);

            $wallet_amount = $this->crud->wallet($user_id);

            // print_r($user_id);
            // die;


            $this->db->where('id',$table_id);
            $this->db->update('ledger_creation', $updatedata);
            $result['message'] = "Update Successfully.";
        }
        else
        {
            $this->db->insert('ledger_creation', $updatedata);
            $result['message'] = "Insert Successfully.";
        }

        $url = base_url('app/acountteam/ledger-creation-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
        $result['status']  = "200";            
        $result['data']  = $updatedata;
        $result['url']  = $url;
    }
    else
    {
        $result['message'] = "ERROR";
        $result['status']  = "400";
        $result['data']    = array();
    }
    echo json_encode($result);
}


























}