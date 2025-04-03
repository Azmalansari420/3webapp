<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
class Distributor extends CI_Controller 
{


    
	function show_city()
	{
		$result = array();
		$html = '';
		$id = $this->input->post('id');
		$city = $this->crud->selectDataByMultipleWhere('city',array('state_id'=>$id));
		if(!empty($city))
		{
			foreach($city as $value)
			{
				$html .= "<option value='".$value->id."'>".$value->name."</option>";
			}

            $result['message']    = "Success";
			$result['status']  = "200";
            $result['data']    = $html;
		}
		else
		{
			$result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $html;
		}
		echo json_encode($result);
	}

	function kyc_details()
	{
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			if($_FILES['gst_certificate']['name']!='')
			{
				$gst_certificate = uniqid().'.'.explode(".", $_FILES['gst_certificate']['name'])[1];
				$path = 'media/uploads/distributor/'.$gst_certificate;
				move_uploaded_file($_FILES['gst_certificate']['tmp_name'],$path);
			}
			else
			{
				$gst_certificate = "";
			}

			if($_FILES['pan_card']['name']!='')
			{
				$pan_card = uniqid().'.'.explode(".", $_FILES['pan_card']['name'])[1];
				$path = 'media/uploads/distributor/'.$pan_card;
				move_uploaded_file($_FILES['pan_card']['tmp_name'],$path);
			}
			else
			{
				$pan_card = "";
			}
			if($_FILES['adharcard']['name']!='')
			{
				$adharcard = uniqid().'.'.explode(".", $_FILES['adharcard']['name'])[1];
				$path = 'media/uploads/distributor/'.$adharcard;
				move_uploaded_file($_FILES['adharcard']['tmp_name'],$path);
			}
			else
			{
				$adharcard = "";
			}
			if($_FILES['electric_bill']['name']!='')
			{
				$electric_bill = uniqid().'.'.explode(".", $_FILES['electric_bill']['name'])[1];
				$path = 'media/uploads/distributor/'.$electric_bill;
				move_uploaded_file($_FILES['electric_bill']['tmp_name'],$path);
			}
			else
			{
				$electric_bill = "";
			}
			if($_FILES['udhyam_certificate']['name']!='')
			{
				$udhyam_certificate = uniqid().'.'.explode(".", $_FILES['udhyam_certificate']['name'])[1];
				$path = 'media/uploads/distributor/'.$udhyam_certificate;
				move_uploaded_file($_FILES['udhyam_certificate']['tmp_name'],$path);
			}
			else
			{
				$udhyam_certificate = "";
			}
			if($_FILES['fssai_licence_cert']['name']!='')
			{
				$fssai_licence_cert = uniqid().'.'.explode(".", $_FILES['fssai_licence_cert']['name'])[1];
				$path = 'media/uploads/distributor/'.$fssai_licence_cert;
				move_uploaded_file($_FILES['fssai_licence_cert']['tmp_name'],$path);
			}
			else
			{
				$fssai_licence_cert = "";
			}
			if($_FILES['godown_image1']['name']!='')
			{
				$godown_image1 = uniqid().'.'.explode(".", $_FILES['godown_image1']['name'])[1];
				$path = 'media/uploads/distributor/'.$godown_image1;
				move_uploaded_file($_FILES['godown_image1']['tmp_name'],$path);
			}
			else
			{
				$godown_image1 = "";
			}
			if($_FILES['godown_image2']['name']!='')
			{
				$godown_image2 = uniqid().'.'.explode(".", $_FILES['godown_image2']['name'])[1];
				$path = 'media/uploads/distributor/'.$godown_image2;
				move_uploaded_file($_FILES['godown_image2']['tmp_name'],$path);
			}
			else
			{
				$godown_image2 = "";
			}
			if($_FILES['vechicle_image']['name']!='')
			{
				$vechicle_image = uniqid().'.'.explode(".", $_FILES['vechicle_image']['name'])[1];
				$path = 'media/uploads/distributor/'.$vechicle_image;
				move_uploaded_file($_FILES['vechicle_image']['tmp_name'],$path);
			}
			else
			{
				$vechicle_image = "";
			}
			if($_FILES['team_image']['name']!='')
			{
				$team_image = uniqid().'.'.explode(".", $_FILES['team_image']['name'])[1];
				$path = 'media/uploads/distributor/'.$team_image;
				move_uploaded_file($_FILES['team_image']['tmp_name'],$path);
			}
			else
			{
				$team_image = "";
			}
			if($_FILES['self_image']['name']!='')
			{
				$self_image = uniqid().'.'.explode(".", $_FILES['self_image']['name'])[1];
				$path = 'media/uploads/distributor/'.$self_image;
				move_uploaded_file($_FILES['self_image']['tmp_name'],$path);
			}
			else
			{
				$self_image = "";
			}
			if($_FILES['cancel_chequed']['name']!='')
			{
				$cancel_chequed = uniqid().'.'.explode(".", $_FILES['cancel_chequed']['name'])[1];
				$path = 'media/uploads/distributor/'.$cancel_chequed;
				move_uploaded_file($_FILES['cancel_chequed']['tmp_name'],$path);
			}
			else
			{
				$cancel_chequed = "";
			}

			/**/
			$rsm_id = $this->input->post('rsm_id');	
			$asm_id = $this->input->post('asm_id');	
			$sales_office_id = $this->input->post('sales_office_id');	
			$user_id = $this->input->post('user_id');	
					
			$firm_name = $this->input->post('firm_name');			
			$name = $this->input->post('name');			
			$mobile = $this->input->post('mobile');			
			$address = $this->input->post('address');			
			$state = $this->input->post('state');			
			$city = $this->input->post('city');			
			$pincode = $this->input->post('pincode');			
			$gst_no = $this->input->post('gst_no');			
			$gps_location_link = $this->input->post('gps_location_link');			
			$bank_ac_no = $this->input->post('bank_ac_no');			
			$bank_name = $this->input->post('bank_name');			
			$bank_branch = $this->input->post('bank_branch');			
			$bank_ifcscode = $this->input->post('bank_ifcscode');			
			$email = $this->input->post('email');	
			$status = 2;	
			$addeddate = date('Y-m-d H:i:s');		

			$firebase_token = $this->input->post('firebase_token');	
			$device_id = $this->input->post('device_id');	

			$insertdata = array(
				"rsm_id"=>$rsm_id,
				"asm_id"=>$asm_id,
				"sales_office_id"=>$sales_office_id,
				"user_id"=>$user_id,
				"firm_name"=>$firm_name,
				"name"=>$name,
				"mobile"=>$mobile,
				"address"=>$address,
				"state"=>$state,
				"city"=>$city,
				"pincode"=>$pincode,
				"gst_no"=>$gst_no,
				"gst_certificate"=>$gst_certificate,
				"pan_card"=>$pan_card,
				"adharcard"=>$adharcard,
				"electric_bill"=>$electric_bill,
				"udhyam_certificate"=>$udhyam_certificate,
				"fssai_licence_cert"=>$fssai_licence_cert,
				"godown_image1"=>$godown_image1,
				"godown_image2"=>$godown_image2,
				"vechicle_image"=>$vechicle_image,
				"team_image"=>$team_image,
				"self_image"=>$self_image,
				"gps_location_link"=>$gps_location_link,
				"bank_ac_no"=>$bank_ac_no,
				"bank_name"=>$bank_name,
				"bank_branch"=>$bank_branch,
				"bank_ifcscode"=>$bank_ifcscode,
				"cancel_chequed"=>$cancel_chequed,
				"email"=>$email,
				"status"=>$status,
				"addeddate"=>$addeddate,
			);


			$this->crud->insert('kyc_records',$insertdata);			
			$updatedata = array('kyc_status'=>$status);
			$this->db->update('users',$updatedata,array('id'=>$user_id));
			redirect(base_url('app/distributor/verification-under?device_id='.$device_id.'&firebase_token='.$firebase_token));	
		}
	}



	public function status_change()
	{		
		$result = array();

		$id = $this->input->post('id');						
		$data['status'] = $status = $this->input->post('status');	
		$user_id = $this->input->post('user_id');	
		if(!empty($id))
		{
			$this->db->update('kyc_records',$data,array("id"=>$id));
			$this->db->update('users',array('kyc_status'=>$status),array("id"=>$user_id));
			$result['message']    = "KYC Status Update";
			$result['status']  = "200";
            $result['data']    = $status;

		}	
		else
		{
			$result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $status;
		}
		echo json_encode($result);
	}






/*add distributer*/

	function add_distributor()
	{
		$result = array();

		$kyc_status = 0;		
		$role = 5;
		$status = 1;

		$user_id = generate_user_id();	

		$firebase_token = $this->input->post('firebase_token');	
		$device_id = $this->input->post('device_id');
		
		$nsm_id = $this->input->post('nsm_id');			
		$rsm_id = $this->input->post('rsm_id');			
		$asm_id = $this->input->post('asm_id');			
		$sales_office_id = $this->input->post('sales_office_id');
		$join_id = $this->input->post('sales_office_id');

		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$firm_name = $this->input->post('firm_name');
		$gst_no = $this->input->post('gst_no');
		$address = $this->input->post('address');

		$password = time();	
		$date_time = date('Y-m-d H:i:s');
		$email = $this->input->post('email');

		$usercheck = $this->crud->selectDataByMultipleWhere('users',array('email'=>$email));
		if(empty($usercheck))
		{
			$insertdata = array(
				"user_id"=>$user_id,
				"kyc_status"=>$kyc_status,
				"role"=>$role,
				"status"=>$status,
				"nsm_id"=>$nsm_id,
				"rsm_id"=>$rsm_id,
				"asm_id"=>$asm_id,
				"sales_office_id"=>$sales_office_id,
				"join_id"=>$join_id,
				"name"=>$name,
				"email"=>$email,
				"mobile"=>$mobile,
				"firm_name"=>$firm_name,
				"gst_no"=>$gst_no,
				"address"=>$address,
				"password"=>$password,
				"date_time"=>$date_time,
			);
			$this->db->insert('users',$insertdata);

			$url = base_url('app/sales_officer/distributor-list?device_id='.$device_id.'&firebase_token='.$firebase_token);

			$result['message']    = "Distributor Add Successfully.";
			$result['status']  = "200";
            $result['data']    = $insertdata;
            $result['url']    = $url;
		}
		else
		{
			$result['message'] = "Email Already Registerd.";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = '';
		}
		echo json_encode($result);

	}

	/*update distributer*/

	function update_distributor()
	{
		$result = array();

		$firebase_token = $this->input->post('firebase_token');	
		$device_id = $this->input->post('device_id');
		
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$firm_name = $this->input->post('firm_name');
		$gst_no = $this->input->post('gst_no');
		$address = $this->input->post('address');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		$user_id = $this->input->post('user_id');
		
		if(!empty($user_id))
		{
			$insertdata = array(
				"name"=>$name,
				"email"=>$email,
				"mobile"=>$mobile,
				"firm_name"=>$firm_name,
				"gst_no"=>$gst_no,
				"address"=>$address,
				"password"=>$password,
			);
			$this->db->where('id',$user_id);
			$this->db->update('users',$insertdata);

			$url = base_url('app/sales_officer/distributor-list?device_id='.$device_id.'&firebase_token='.$firebase_token);

			$result['message']    = "Distributor Update Successfully.";
			$result['status']  = "200";
            $result['data']    = $insertdata;
            $result['url']    = $url;
		}
		else
		{
			$result['message'] = "Email Already Registerd.";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = '';
		}
		echo json_encode($result);

	}





	/*wallet*/

	 public function add_money()
    {
        $user_id = $this->input->post("user_id");
        $amount = $this->input->post("amount");

        $request_id = time().$user_id;
        $date_time = date("Y-m-d H:i:s");   
        $order_id = rand().$user_id;

        $user = $this->db->get_where("users",array('id'=>$user_id,))->result_object();

        $setting = $this->db->select("min_deposit")->get_where("site_setting")->result_object()[0];
        $min_deposit = $setting->min_deposit;

        if($amount<$min_deposit)
        {
            $result['message'] = "Min Add Amount ".$min_deposit;
            $result['status']  = "400";
            $result['action']  = "add";
            $result['data']    = array();
            echo json_encode($result);
            die;
        }

        if(!empty($user))
        {
            $data = array(
                "user_id"=>$user_id,
                "type"=>0,
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

           
           


            /*on payment gatway*/
            $user_id = $user_id;                            
            $type = 'credit';
            $type2 = 1;
            $amount = $amount;
            $message = 'Add Money';
            $join_id = $insert_id;

            $this->crud->wallet_credit_debit($user_id,$type,$amount,$message,$join_id,$request_id,$type2);
            $this->db->update("recharge_request",array("status"=>1,),array("id"=>$insert_id,));
            $wallet_amount = $this->crud->wallet($user_id);


 	        $result['message'] = "Recharge Successfully...";
            $result['status']  = "200";
            $result['action']  = "add";
            $result['data']    = array("request_id"=>$request_id,'wallet_amount'=>'₹ '.number_format($wallet_amount,2));
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




    /*use hoistory*/

    public function wallet_history()
    {
    	$result = array();
    	$html = '';
    	$user_id = $this->input->post('user_id');

    	$page = $this->input->post("page");
    	$limit = 5;
        $offset = 0;

        if($page>0)
    	{
	    	$offset = $page*$limit;
	    }
	    $this->db->limit($limit,$offset);
	    $this->db->order_by('id desc');
    	$user_history = $this->crud->selectDataByMultipleWhere('user_history',array('user_id'=>$user_id));

    	if(!empty($user_history))
    	{
    		$response_data['data'] = $user_history;
    		$html = $this->load->view('app/distributor/wallet-list',$response_data,true);

    		$result['status'] = '200';
    		$result['message'] = 'SUCESS';
    		$result['data'] = $html;
    	}
    	else
    	{
    		$result['status'] = '400';
    		$result['message'] = 'Data Not Found';
    		$result['data'] = [];
    	}
    	echo json_encode($result);
    }



    /*add to cart*/


    public function add_to_cart()
    {
    	$result = array();

    	$user_id = $this->input->post('user_id');
    	$p_id = $this->input->post('p_id');
    	$price = $this->input->post('price');
    	$quantity = $this->input->post('quantity');
    	$addeddate = date('Y-m-d H:i:s');

    	$insertdata = array(
	    		"user_id"=>$user_id,
	    		"p_id"=>$p_id,
	    		"price"=>$price,
	    		"quantity"=>$quantity,
	    		"addeddate"=>$addeddate,
	    	);

    	$check_cart = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>$user_id,'p_id'=>$p_id));
    	if(empty($check_cart))
    	{
	    	$this->db->insert('add_to_temp_cart',$insertdata);
	    	$cartcount = count_cart();

	    	$result['status'] = '200';
    		$result['message'] = 'Add To Cart Successfully.';
    		$result['data'] = $insertdata;
    		$result['cartcount'] = $cartcount;
    	}
    	else
    	{
    		$this->db->update('add_to_temp_cart',array('quantity'=>$quantity,'addeddate'=>$addeddate),array('user_id'=>$user_id,'p_id'=>$p_id));
    		$cartcount = count_cart();
    		$result['status'] = '400';
    		$result['message'] = 'Item Upadte Successfully.';
    		$result['data'] = $insertdata;
    		$result['cartcount'] = $cartcount;
    	}
    	echo json_encode($result);
    }

    /*delete cart*/

    function delete_cart_item()
    {
    	$result = array();

    	$id = $this->input->post('id');
    	$user_id = $this->session->userdata("user")['id'];    	

    	$user_data= array(                
                "id"=>$id,
                "user_id"=>$user_id,
            );
    	if(!empty($id))
    	{
    		$this->db->delete("add_to_temp_cart",$user_data,array('id'=>$id,'user_id'=>$user_id,));
	        $result['message'] = "Item Remove successfully";
	        $result['status']  = "200";
	        $result['data']    = $user_data;
            $result['cart_page_data']    = $this->load->view('app/distributor/cart-list','',true);
    	}
    	else
        {
            $result['message'] = "Wrong Product ID";
            $result['status']  = "400";
            $result['data']    = $user_data;
            $result['cart_page_data']    = $this->load->view('app/distributor/cart-list','',true);
        }
        echo json_encode($result);
    }


    /*apply coupon*/
    public function apply_couponcode()
	{
		$result = array();

		$coupon = $this->input->post('coupon');
		$user_id = $this->session->userdata("user")['id'];  
		
        $coupon_data = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$coupon));
        if(!empty($coupon_data))
        { 
	        if($coupon_data[0]->name===$coupon)
	        {
		        if(!empty($coupon_data))
		        $coupen_date = $coupon_data[0]->expirey_date;
		        $todaydate = date('Y-m-d');

		        if($todaydate<=$coupen_date)
		        {
			        if(!empty($coupon_data))
			        {
			        	$coupon_data = $coupon_data[0];
			        	$query = $this->crud->selectDataByMultipleWhere('order_coupon',array('coupon'=>$coupon,"user_id"=>$user_id,"status"=>0,'coupen_type'=>$coupon_data->coupen_type,"coupon_id"=>$coupon_data->id,));
			        	
			        	if(empty($query))
			        		$this->db->insert("order_coupon",array("coupon"=>$coupon_data->name,"discount"=>$coupon_data->amount,"type"=>$coupon_data->type,'user_id'=>$user_id,"coupon_id"=>$coupon_data->id,'coupen_type'=>$coupon_data->coupen_type,));


			        	$applied_coupon = applied_coupon($coupon,'');
			        	if($applied_coupon['discount_amount']>0)
			        	{
			        		$result['message'] = "Coupon Applied Successfully.....";
				            $result['status']  = "200";
				            $result['data']    = $coupon_data; 
				            $result['checkout_card']    = $this->load->view('app/distributor/checkout-list','',true);     		
			        	}
			        	else
			        	{
			        		$this->db->delete('order_coupon',array("coupon"=>$coupon_data->name,"discount"=>$coupon_data->amount,"type"=>$coupon_data->type,'user_id'=>$user_id,"coupon_id"=>$coupon_data->id,'coupen_type'=>$coupon_data->coupen_type,));
			        		$result['message'] = "Wrong Coupon Code.....";
				            $result['status']  = "400";
				            $result['data']    = [];

			        	}
			        }
			        else
			        {
			        	$result['message'] = "Wrong Coupon Code.....";
			            $result['status']  = "400";
			            $result['data']    = [];
			        }
		        }
		        else
		        {
		        	$result['message'] = "Coupon Expire.....";
		            $result['status']  = "400";
		            $result['data']    = [];
		        }
		    }
		    else
		    {
		    	$result['message'] = "Wrong Coupon Code";
	            $result['status']  = "400";
	            $result['data']    = [];
		    }
		}
		else
	    {
	    	$result['message'] = "Wrong Coupon Code";
            $result['status']  = "400";
            $result['data']    = [];
	    }
        echo json_encode($result);
	}

	/*---delete coupon--*/
	function delete_coupon()
	{
		$result = array();
		$user_id = $this->session->userdata("user")['id'];  
		if(!empty($user_id))
		{
			$this->db->delete('order_coupon',array('user_id'=>$user_id,'status'=>0,));
			$result['message'] = "Coupon Delete Successfully.....";
            $result['status']  = "200";
            $result['data']    = $user_id; 
            $result['checkout_card']    = $this->load->view('app/distributor/checkout-list','',true); 
		}
		else
	    {
	    	$result['message'] = "Wrong Code";
            $result['status']  = "400";
            $result['data']    = [];
            $result['checkout_card']    = $this->load->view('app/distributor/checkout-list','',true); 
	    }
        echo json_encode($result);
	}

	/*checkout*/

	public function final_order()
	{
		$result = array();

		$url = "";
		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
		$order_id = $today . $rand;

		$user_id = $this->session->userdata("user")['id'];
		$device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");  

		$sales_office_id = $this->input->post('sales_office_id');
		$nsm_id = $this->input->post('nsm_id');
		$asm_id = $this->input->post('asm_id');
		$rsm_id = $this->input->post('rsm_id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');			
		$mobile = $this->input->post('mobile');			
		$address = $this->input->post('address');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$order_note = $this->input->post('order_note');			
		$payment_type = 1;
		$order_status = 0;
	    $addeddate = date('Y-m-d H:i:s');

		$order_amount = applied_coupon('','');	
		$shipping_charge = $order_amount['shipping_charge'];
		$sub_total = $order_amount['sub_total'];
		$finalprice = $order_amount['finalprice'];
		$discount = $order_amount['discount'];
		$discount_amount = $order_amount['discount_amount'];
		$after_discount_final_price = $order_amount['after_discount_final_price'];

	
		$data = array(
			"order_id"=>$order_id,
			"user_id"=>$user_id,
			"sales_office_id"=>$sales_office_id,
			"nsm_id"=>$nsm_id,
			"asm_id"=>$asm_id,
			"rsm_id"=>$rsm_id,
			"name"=>$name,
			"email"=>$email,
			"mobile"=>$mobile,
			"address"=>$address,
			"state"=>$state,
			"city"=>$city,
			"order_note"=>$order_note,
			"payment_type"=>$payment_type,
			"addeddate"=>$addeddate,
			"shipping_charge"=>$shipping_charge,
			"sub_total"=>$sub_total,
			"finalprice"=>$finalprice,
			"after_discount_final_price"=>$after_discount_final_price,
			"discount"=>$discount,
			"discount_amount"=>$discount_amount,
			"order_status"=>$order_status,
		);

		$setting = $this->db->select("id,wallet")->get_where("users",array('id'=>$user_id))->result_object()[0];
        $walletamount = $setting->wallet;

        if($after_discount_final_price>$walletamount)
        {
        	$url = base_url('app/distributor/wallet.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['message'] = "You Have Only ". currency_simble($walletamount) ." Add Money.";
            $result['status']  = "400";
            $result['data']    = array();
            $result['url'] = $url;
            echo json_encode($result);
            die;
        }
							
		$cartmodel = cart_products();
        foreach($cartmodel as $key => $value)
        {   
        	$product = $this->db->get_where('product',array('id'=>$value->p_id))->result_object()[0];

        	$order_data = array(
        		"sales_office_id"=>$sales_office_id,
				"nsm_id"=>$nsm_id,
				"asm_id"=>$asm_id,
				"rsm_id"=>$rsm_id,
        		"user_id"=>$user_id,
        		"order_id"=>$order_id,
        		"addeddate"=>$addeddate,
        		"p_id"=>$value->p_id,
        		"quantity"=>$value->quantity,
        		"sale_price"=>$product->sale_price,
        		"image"=>$product->thumb_img,
        		"cat_id"=>$product->cat_id,
        		"name"=>$product->name,
        		"sku_code"=>$product->sku_code,
        		"after_discount_final_price"=>$after_discount_final_price,
        	);
        	$this->crud->insert('orders',$order_data);
        }
        
        if(!empty($user_id))
        {
        	$this->crud->insert('finalorder',$data);
        	$insert_id = $this->db->insert_id();

        	$this->db->delete("add_to_temp_cart",array("user_id"=>$user_id,));
        	$this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>$user_id,'status'=>0,));
        	
        	$url = base_url('app/distributor/order-success.php?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);

        	$user_id = $user_id;                            
            $type = 'debit';
            $type2 = 2;
            $amount = $after_discount_final_price;
            $message = 'Order';
            $join_id = $insert_id;

            $this->crud->wallet_credit_debit($user_id,$type,$amount,$message,$join_id,$order_id,$type2);


        	$result['message'] = "Order Placed Successfully Done.";
	        $result['status']  = "200";
	        $result['data']    = $data;
	        $result['url']    = $url;
        }
        else
        {
        	$result['message'] = "Already Exits";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = [];
        }
        echo json_encode($result);	
	}


	/*get invoice*/

	public function get_invoice()
	{
		$result = array();

    	$user_id = $this->input->post('user_id');
    	$order_id = $this->input->post('order_id');

    	$device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");
    	
    	$insertdata = array(
	    		"user_id"=>$user_id,
	    		"order_id"=>$order_id,
	    	);

    	$check_cart = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$user_id,'order_id'=>$order_id));
    	if(!empty($check_cart))
    	{
    		$url = base_url('app/distributor/invoice.php?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);
	    	
	    	$result['status'] = '200';
    		$result['message'] = 'SUCESS';
    		$result['data'] = $insertdata;
    		$result['url'] = $url;
    	}
    	else
    	{
    		$result['status'] = '400';
    		$result['message'] = 'Wrong Order ID';
    		$result['data'] = [];
    	}
    	echo json_encode($result);
	}





	public function leadgerdata()
	{
	    // Retrieve user session data
	    $user_id = $this->session->userdata("user")['id'];
	    $role = $this->session->userdata("user")['role'];

	    // Get query parameters
	    $from_date = $this->input->get('from_date');
	    $to_date = $this->input->get('to_date');
	    $device_id = $this->input->get('device_id');
	    $firebase_token = $this->input->get('firebase_token');

	    // Validate input dates
	    if (empty($from_date) || empty($to_date)) {
	        echo json_encode([
	            "success" => false,
	            "message" => "Please provide Both Date."
	        ]);
	        return;
	    }

	    // Query the database
	    $this->db->where("DATE(add_date_time) >= ", $from_date);
	    $this->db->where("DATE(add_date_time) <= ", $to_date);
	    $userorder = $this->crud->selectDataByMultipleWhere('user_history', ['user_id' => $user_id]);

	    // Generate view for the PDF
	    $ledger_pdf_view = $this->load->view('app/distributor/ledger-pdf', ['userorder' => $userorder], true);

	    // Check if data exists
	    if (empty($userorder)) {
	        echo json_encode([
	            "success" => false,
	            "message" => "No data found for the given dates."
	        ]);
	        return;
	    }

	    // Prepare data for the chart and total calculation
	    $totalAmount = 0;
	    $dataPoints = [];

	    foreach ($userorder as $order) {
	        $totalAmount += $order->amount;
	        $dataPoints[] = [
	            "label" => $order->add_date_time,
	            "y" => $order->amount
	        ];
	    }

	    // URL for downloading the PDF
	    $downloadUrl = base_url('api/distributor/download_ledger_pdf?from_date=' . $from_date . '&to_date=' . $to_date);

	    // Send JSON response
	    echo json_encode([
	        "success" => true,
	        "totalAmount" => $totalAmount,
	        "dataPoints" => $dataPoints,
	        "downloadUrl" => $downloadUrl
	    ]);
	}



	public function download_ledger_pdf()
    {
        // Get query parameters
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $user_id = $this->session->userdata("user")['id'];

        // Validate input dates
        if (empty($from_date) || empty($to_date)) {
            show_error("Please provide both dates.");
        }

        $this->db->where("DATE(add_date_time) >= ", $from_date);
        $this->db->where("DATE(add_date_time) <= ", $to_date);
        $userorder = $this->crud->selectDataByMultipleWhere('user_history', ['user_id' => $user_id]);
        // $userorder = $this->crud->selectDataByMultipleWhere('user_history', ['type2' => 2, 'user_id' => $user_id]);

        if (empty($userorder)) {
            show_error("No data found for the given dates.");
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);

        $html = $this->load->view('app/distributor/ledger-pdf', ['userorder' => $userorder], true);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream("Ledger_Report.pdf", array("Attachment" => 1)); // 1 for download
    }




    /*iiiiiiii*/

    public function add_upadate_raise()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");

        $so_id = $this->input->post("so_id");
        $distributer_id = $this->input->post("distributer_id");
        $issue_type = $this->input->post("issue_type");
        $message = $this->input->post("message");
        $addeddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "so_id"=>$so_id,
                        "distributer_id"=>$distributer_id,
                        "issue_type"=>$issue_type,
                        "message"=>$message,
                        "status"=>1,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($updatedata))
        {   
            if(!empty($id))
            {
                $this->db->where('id',$id);
                $this->db->update('raise_distributer_to_so',$updatedata);
                $result['message'] = "Upadate Successfully.";
            }
            else
            {
                $this->db->insert('raise_distributer_to_so',$updatedata);
                $result['message'] = "Insert Successfully.";
            }

            $url = base_url('app/distributor/raise-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
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







    public function raiseexceldata()
    {
        $user_id = $this->session->userdata("user")['id'];  

        $this->db->from('raise_distributer_to_so');
        $this->db->where('distributer_id', $user_id);        
        $userorder = $this->db->get()->result();

        if (empty($userorder)) {
            echo json_encode(['status' => 400, 'message' => 'No data found']);
            return;
        }


        // Create Excel File
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Distributor  Code ')
          ->setCellValue('B1', 'Distributor  Name ')
          ->setCellValue('C1', 'Distributor  Number ')
          ->setCellValue('D1', 'Distributor Address')
          ->setCellValue('E1', 'Query(Issue) type')
          ->setCellValue('F1', 'Message')
          ->setCellValue('G1', 'Reply Message')
          ->setCellValue('H1', 'Status')
          ->setCellValue('I1', 'Date');

        $row = 2;
        foreach ($userorder as $order) {
            $sheet->setCellValue('A' . $row, empcode($order->distributer_id))
                  ->setCellValue('B' . $row, usersdetails($order->distributer_id))
                  ->setCellValue('C' . $row, usermobile($order->distributer_id))
                  ->setCellValue('D' . $row, useraddress($order->distributer_id))
                  ->setCellValue('E' . $row, raiseissue($order->issue_type))
                  ->setCellValue('F' . $row, $order->message)
                  ->setCellValue('G' . $row, $order->reply_message)
                  ->setCellValue('H' . $row, raiseexcel($order->status))
                  ->setCellValue('I' . $row, $order->addeddate);
            $row++;
        }

        $fileName = 'RaiseData_' . date('YmdHis') . '.xlsx';
        $filePath = FCPATH . 'media/uploads/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        echo json_encode(['status' => 200, 'file_url' => base_url('media/uploads/' . $fileName)]);

    }













// 	public function leadgerdata()
// {
//     // Retrieve user session data
//     $user_id = $this->session->userdata("user")['id'];  
//     $role = $this->session->userdata("user")['role'];  

//     // Get query parameters
//     $from_date = $this->input->get('from_date');
//     $to_date = $this->input->get('to_date');
//     $device_id = $this->input->get('device_id');
//     $firebase_token = $this->input->get('firebase_token');

//     // Validate input dates
//     if (empty($from_date) || empty($to_date)) {
//         echo json_encode([
//             "success" => false,
//             "message" => "Please provide Both Date."
//         ]);
//         return;
//     }

//     // Query the database
//     $this->db->where("DATE(add_date_time) >= ", $from_date);
//     $this->db->where("DATE(add_date_time) <= ", $to_date);
//     $userorder = $this->crud->selectDataByMultipleWhere('user_history', ['type2' => 2, 'user_id' => $user_id]);

//     $ledger_pdf_view = $this->load->view('app/user/distributor/ledger-pdf', $userorder, true);



//     // Check if data exists
//     if (empty($userorder)) {
//         echo json_encode([
//             "success" => false,
//             "message" => "No data found for the given dates."
//         ]);
//         return;
//     }

//     // Prepare data for the chart and total calculation
//     $totalAmount = 0;
//     $dataPoints = [];

//     foreach ($userorder as $order) {
//         $totalAmount += $order->amount;
//         $dataPoints[] = [
//             "label" => $order->add_date_time,
//             "y" => $order->amount
//         ];
//     }

//     // Send JSON response
//     echo json_encode([
//         "success" => true,
//         "totalAmount" => $totalAmount,
//         "dataPoints" => $dataPoints,
//         "ledger_pdf_view" => $ledger_pdf_view,
//     ]);
// }

















	// public function leadgerdata()
	// {
	// 	$user_id = $this->session->userdata("user")['id'];  
	// 	$role = $this->session->userdata("user")['role'];  

	// 	$from_date = $this->input->get('from_date');
	// 	$to_date = $this->input->get('to_date');
	// 	$device_id = $this->input->get('device_id');
	// 	$firebase_token = $this->input->get('firebase_token');

	// 	$this->db->where("DATE(add_date_time)>='$from_date'");
    // 	$this->db->where("DATE(add_date_time)<='$to_date'");
	// 	$data['userorder'] = $this->crud->selectDataByMultipleWhere('user_history',array('type2'=>2,'user_id'=>$user_id));
	// 	// redirect(base_url('app/distributor/ledger'));
	// 	$this->load->view('app/distributor/ledger',$data);
		
	// }














}