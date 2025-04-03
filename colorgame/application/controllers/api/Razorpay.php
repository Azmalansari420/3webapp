<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
class Razorpay extends CI_Controller {
  

  public function pay()
  {
    $device_id = $this->session->userdata("device_id");  
    $firebase_token = $this->session->userdata("firebase_token");
    
    $order_id = $this->input->get('order_id');
    if(!empty($order_id))
    {
      $razordata = $this->db->get_where('finalorder',array('order_id'=>$order_id,'status'=>0,'order_status'=>0))->result_object();
      if(!empty($razordata))
      {
        // $payamount = 1;
        $payamount = $razordata[0]->after_discount_final_price;
        
        $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
        $razorpayOrder = $api->order->create(array(
          'receipt'         => rand(),
          'amount'          => $payamount * 100, // 2000 rupees in paise
          'currency'        => 'INR',
          'payment_capture' => 1 // auto capture
        ));
        $amount = $razorpayOrder['amount'];
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $data = $this->prepareData($amount,$razorpayOrderId);
        $this->load->view('app/user/rezorpay',array('data' => $data,"order_id"=>$order_id,));
      }
      else
      {
        redirect('app/user/failed?device_id='.$device_id.'&firebase_token='.$firebase_token);
      }


    }
    else
    {
      $this->load->view('app/user/404');
    }

  }




  // This function verifies the payment,after successful payment
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
      $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
    try {
        $attributes = array(
          'razorpay_order_id' => $_SESSION['razorpay_order_id'],
          'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
      } 
      catch(SignatureVerificationError $e) 
      {
        $success = false;
        $error = 'Razorpay_Error : ' . $e->getMessage();
        print_r($error);
      }
    }
    if ($success === true) {
      $order_id = $this->input->get('order_id');
      $this->setRegistrationData($order_id);
    }
    else 
    {
      redirect(base_url('app/user/failed?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token));
    }
  }
  /**
   * This function preprares payment parameters
   * @param $amount
   * @param $razorpayOrderId
   * @return array
   */
  public function prepareData($amount,$razorpayOrderId)
  {
    $data = array(
      "key" => RAZOR_KEY,
      "amount" => $amount,
      "name" => RAZOR_Name,
      "description" => RAZOR_description,
      "image" => base_url().RAZOR_image,
      "prefill" => array(
        "name"  => $this->input->post('name'),
        "email"  => $this->input->post('email'),
        "contact" => $this->input->post('contact'),
      ),
      "notes"  => array(
        "address"  => "Hello World",
        "merchant_order_id" => rand(),
      ),
      "theme"  => array(
        "color"  => "#F37254"
      ),
      "order_id" => $razorpayOrderId,
    );
    return $data;
  }
  /**
   * This function saves your form data to session,
   * After successfull payment you can save it to database
   */
  public function setRegistrationData($order_id)
  {
   $device_id = $this->session->userdata("device_id");  
   $firebase_token = $this->session->userdata("firebase_token"); 
   $user_id = $this->session->userdata("user")['id'];

   $order_id = $this->input->get('order_id');
   $payment_id = $_SESSION['razorpay_order_id'];

   $this->db->update('finalorder',array('payment_id'=>$payment_id,'status'=>1,'order_status'=>1),array('order_id'=>$order_id,'user_id'=>$user_id));

   $this->db->delete("add_to_temp_cart",array("user_id"=>$user_id,));
   $this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>$user_id,'status'=>0,));
   redirect(base_url('app/user/success?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token));
        
   // $getdata = $this->db->get_where('finalorder',array('order_id'=>$order_id))->result_object();
    // $message = 'test';
    //  $this->webmail->sendmail($message,$client_email);
    // redirect(base_url('api/Razorpay/success'));
  }


  public function success()
  {
    $this->load->view('app/user/success');
  }
  /**
   * This is a function called when payment failed,
   * and shows the error message
   */
  public function paymentFailed()
  {
    $this->load->view('error');
  }  
}