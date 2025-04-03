<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonepay extends CI_Controller 
{
   


	public function payment()
	{
		$device_id = $this->session->userdata("device_id");  
   		$firebase_token = $this->session->userdata("firebase_token");

		$user_id = $this->session->userdata("user")['id'];
		$order_id = $this->input->get('order_id');

		$orderdata = $this->db->get_where('finalorder',array('order_id'=>$order_id,'status'=>0,'order_status'=>0))->result_object();		
		
		if(isset($orderdata))
		{
			$phone_pay_merchant_id = phone_pay_merchant_id;
			$phone_pay_secret_key = phone_pay_secret_key;
			$keyIndex = keyIndex;
			$base_url = base_url();
			$success_url = $base_url.'api/Phonepay/success?order_id='.$order_id;
			$error_url = $base_url.'api/Phonepay/failed?order_id='.$order_id;

			$orderdata = $orderdata[0];
			$amount = $orderdata->after_discount_final_price;
			// $amount = '1';

			$transaction_id = 'MT'.rand ( 10000 , 99999 ).rand ( 10000 , 99999 ).rand ( 1000 , 9999 ).rand ( 10 , 99 );
			$currency = 'INR';
			$data = array (
              'merchantId' => $phone_pay_merchant_id,
              'merchantTransactionId' => $transaction_id,
              'order_id' => $order_id,
              'merchantUserId' => "MUID123",
              'amount' => $amount*100,
              'redirectUrl' => $success_url,
              'redirectMode' => 'POST',
              'callbackUrl' => $error_url,
              'mobileNumber' => '',
              'paymentInstrument' => 
              array (
                'type' => 'PAY_PAGE',
              ),
            );

            $encode = base64_encode(json_encode($data));
            $saltKey = $phone_pay_secret_key;
            $saltIndex = $keyIndex;
            $string = $encode.'/pg/v1/pay'.$saltKey;
            $sha256 = hash('sha256',$string);
            $finalXHeader = $sha256.'###'.$saltIndex;

		    $curl = curl_init();
		    curl_setopt_array($curl, array(
		      CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',
		      CURLOPT_RETURNTRANSFER => true,
		      CURLOPT_ENCODING => '',
		      CURLOPT_MAXREDIRS => 10,
		      CURLOPT_TIMEOUT => 0,
		      CURLOPT_FOLLOWLOCATION => true,
		      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		      CURLOPT_CUSTOMREQUEST => 'POST',
		      CURLOPT_POSTFIELDS =>json_encode(['request' => $encode]),
		      CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		        'X-VERIFY: '.$finalXHeader
		      ),
		    ));
		    $response = curl_exec($curl);
		    curl_close($curl);
			
		    $response = json_decode($response);
		  
		    if($response->success==true)
		    {
		    	$this->db->delete("add_to_temp_cart",array("temp_user_id"=>$temp_session_id,));
		    	$this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>$temp_session_id,'status'=>0,));

	     		$this->db->update("finalorder",array("status"=>1,),array("status"=>0,"id"=>$order_table_id,));
	     		$this->db->update("orders",array("status"=>1,),array("status"=>0,"order_id"=>$order_id,));

		        $url = $response->data->instrumentResponse->redirectInfo->url;
		        redirect($url);
		    }
		    else
		    {
		        redirect('app/user/404.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
		    }	   		
	   		
		}
		else
		{
			redirect('app/user/404.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
		}

	}


	public function success()
	{
		$device_id = $this->session->userdata("device_id");  
   		$firebase_token = $this->session->userdata("firebase_token");
		$order_id = $this->input->get('order_id');
		redirect(base_url('app/user/success.php?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token));
	}

	public function failed()
	{
		$device_id = $this->session->userdata("device_id");  
   		$firebase_token = $this->session->userdata("firebase_token");
		$order_id = $this->input->get('order_id');
		redirect(base_url('app/user/success.php?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token));
	}














}