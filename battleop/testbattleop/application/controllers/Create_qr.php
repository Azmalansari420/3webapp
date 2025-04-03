<?php
// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_qr extends CI_Controller {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Custom_model','custom');
        

    }
    public function index()
    {
        echo "string";
    }

    public function recharge_request()
    {
        $this->token_data = token_auth();
        $result = array();
        
        $token_data = $this->token_data;
        $user_id = $token_data->user_id;

        $user_details = $this->db->get_where('users',array('id'=>$user_id))->result_object();
        if(!empty($user_details))
        {
            $fname = $user_details[0]->fname;
            $email = $user_details[0]->email;
            $mobile = $user_details[0]->mobile;
        }

        $amount = $this->input->post('amount');
        $device_id = $token_data->device_id;
        $request_id = time().$user_id;

        $redirecturl = base_url('Create_qr/payment_verify/'.$request_id);

        $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.ekqr.in/api/create_order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "key": "63ca3415-40b0-4f13-82c5-445bd174a1f8",
          "client_txn_id": "'.$request_id.'",
          "amount": "'.$amount.'",
          "p_info": "Add Name",
          "customer_name": "'.$fname.'",
          "customer_email": "'.$email.'",
          "customer_mobile": "'.$mobile.'",
          "redirect_url": "'.$redirecturl.'",
          "udf1": "user defined field 1",
          "udf2": "user defined field 2",
          "udf3": "user defined field 3"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status==true)
        {

            $data = array(
                "user_id"=>$user_id,
                "device_id"=>$device_id,
                "type"=>1,
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

            $url = $response->data->payment_url;
            echo json_encode(array("url"=>$url,));

        }
        else
        {
            echo json_encode(array("url"=>"",));
        }

    }


    function payment_verify($request_id)
    {
        
           if(!empty($request_id))
           {
                $data = $this->db->get_where("recharge_request",array("request_id"=>$request_id,"status"=>0,))->result_object();
                print_r($data);
                if(!empty($data))
                {
                // https://www.google.com/?client_txn_id=1234fa56789&txn_id=80260148

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api.ekqr.in/api/check_order_status',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>'{
                      "key": "63ca3415-40b0-4f13-82c5-445bd174a1f8",
                      "client_txn_id": "'.$request_id.'",
                      "txn_date": "'.date("d-m-Y").'"
                    }',
                      CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                      ),
                    ));

                    $response = curl_exec($curl);
                    curl_close($curl);
                    $response = json_decode($response);
                    if($response->status==true)
                    {


                        $data = $data[0];
                        $user_id = $data->user_id;
                            
                            $amount = $data->amount;
                            $type = 'credit';
                            $message = 'Add Money';
                            $join_id = '0';
                            $this->custom->wallet_credit_debit($user_id,$type,$amount,$message,$join_id);
                            $this->db->update("recharge_request",array("status"=>1,),array("id"=>$data->id,));
                            $result['status'] = '200';
                            $result['message'] = 'Successfully';
                            echo "string";
                        
                    }
                    else
                    {
                        $result['status'] = '400';
                        $result['message'] = 'Failed';
                    }
                }
                else
                {
                    $result['status'] = '400';
                    $result['message'] = 'Failed';
                }
           }
           else
           {
                $result['status'] = '400';
                $result['message'] = 'Failed';
           }
           if($result['status']==200)
           {
            redirect(base_url('app/user/user-wallet'));
           }
           else
           {
            redirect(base_url('app/user/payment-failed'));
           }

    }















}