<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{

		set_user_session();
		$device_id = $this->session->userdata('device_id');

		$data = array();
		$meta_data = $this->Custom_model->get_meta_tags();
		$data['meta_data'] = $meta_data;
		$data['contact_details'] = contact_details();
		$this->template->load('template2', 'web/index',$data);
	}
	
	public function all($page='',$app_page='')
	{
		set_user_session();
		$device_id = $this->session->userdata('device_id');
		$data = array();
		if(empty($page)) $page = 'dashboard.php';
		$count = explode(".", $page);
		if(count($count)==1)
			$page = $count[0].'.php';
		else
			$page = $count[0].'.'.$count[1];
		if(in_array($page, front_user_pages()))
		{
			is_user_logged_in();
		}
		else
		{
			// is_user_logged_in($page);
		}		
		$full_detail = [];
		$get_user = get_user();
		if(!empty($get_user))
		{
		    $full_detail = $get_user['full_detail'];			    
		}
		$data['get_user'] = $get_user;
		$data['full_detail'] = $full_detail;
		$meta_data = $this->Custom_model->get_meta_tags();
		$data['meta_data'] = $meta_data;
		$data['contact_details'] = contact_details();

		if(file_exists(APPPATH.'views/web/'.$page))
			$this->template->load('template2', 'web/'.$page,$data);
		else
		{
			$this->load->view('web/headers/header',$data);
			$this->template->load('template2', 'web/404',$data);
			$this->load->view('web/headers/footer',$data);
		}
	}


	public function user_app_index($page='')
	{
		set_user_session();
		$data = array();
		$this->load->view('app/user/index',$data);
	}

	public function user_app($page='')
	{		
		set_user_session();
		$device_id = $this->input->get('device_id');
		$firebase_token = $this->input->get('firebase_token');
		$data = array();
		if(empty($page)) $page = 'login.php';
		$count = explode(".", $page);
		if(count($count)==1)
			$page = $count[0].'.php';
		else
			$page = $count[0].'.'.$count[1];

		if(count($count)>0) $page_check = $count[0];
	    else $page_check = $count[0].'.'.$count[1];

	    $login_required_pages = array("home","profile","wallet","edit-profile",'change-password','game-bet','add-point','bank-detail','chart','game-history','game-rate','select-game','time-list','withdraw');
	    $login_not_required_pages = array("login","reset-pass","newpass","signup");

		$login_status = user_app_logged_in($page_check,$login_required_pages,$login_not_required_pages);
		if($login_status==6)
			redirect(base_url(user_app.'login?device_id='.$device_id.'&firebase_token='.$firebase_token));
		if($login_status==7)
			redirect(base_url(user_app.'home?device_id='.$device_id.'&firebase_token='.$firebase_token));

		$full_detail = [];
		$get_user = get_user_app();
		if(!empty($get_user))
		{
		    $full_detail = $get_user['full_detail'];
		}

		$data['get_user'] = $get_user;
		$data['full_detail'] = $full_detail;
		
		// $data['setting'] = $this->db->get_where("setting")->result_object()[0];

		if(file_exists(APPPATH.'views/app/user/'.$page))
			$this->load->view('app/user/'.$page,$data);
		else
		{
			$this->load->view('app/user/404',$data);
		}
	}


	public function user_app_ajax($page='')
	{		
		set_user_session();
		$device_id = $this->input->get('device_id');
		$firebase_token = $this->input->get('firebase_token');
		$data = array();
		if(empty($page)) $page = 'login.php';
		$count = explode(".", $page);
		if(count($count)==1)
			$page = $count[0].'.php';
		else
			$page = $count[0].'.'.$count[1];

		if(count($count)>0) $page_check = $count[0];
	    else $page_check = $count[0].'.'.$count[1];

	    $login_required_pages = array("home","profile","wallet","edit-profile",'change-password');
	    $login_not_required_pages = array("login","reset-pass","newpass");

		$login_status = user_app_logged_in($page_check,$login_required_pages,$login_not_required_pages);
		if($login_status==6)
			redirect(base_url(user_app.'login?device_id='.$device_id.'&firebase_token='.$firebase_token));
		if($login_status==7)
			redirect(base_url(user_app.'home?device_id='.$device_id.'&firebase_token='.$firebase_token));

		$full_detail = [];
		$get_user = get_user_app();
		if(!empty($get_user))
		{
		    $full_detail = $get_user['full_detail'];
		}

		$data['get_user'] = $get_user;
		$data['full_detail'] = $full_detail;
		$meta_data = $this->Custom_model->get_meta_tags();
		$data['meta_data'] = $meta_data;
		$data['contact_details'] = contact_details();
		$data['setting'] = $this->db->get_where("setting")->result_object()[0];

		if(file_exists(APPPATH.'views/app/user/'.$page))
			$this->load->view('app/user/'.$page,$data);
		else
		{
			$this->load->view('app/user/404',$data);
		}
	}

	public function homelist($value='')
	{
		$html = $this->load->view("app/user/cards/homelist","",true);
		$result['html'] = $html;
		echo json_encode($result);
	}



	
	public function test()
	{


		$i=1;
		while ($i<=99)
		{
			$data = array(
				"number"=>$i,
				"add_date_time"=>date("Y-m-d H:i:s"),
				"update_date_time"=>date("Y-m-d H:i:s"),
				"is_delete"=>0,
				"status"=>1,
			);
			// $this->db->insert("jodi_digit",$data);
			$i++;
		}


		// $this->db->select("(SELECT id,password FROM admin ) AS amount_paid", FALSE);
		// 	$recieved_amount = $this->db->get('admin')->result_object();
		// 	print_r($recieved_amount);
	}
	
}
