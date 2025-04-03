<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 

{

	// ----------------index---------

	function index()
	{
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
			
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$recaptcha = $_POST['g-recaptcha-response'];
        	$secret_key = g_captcha_secret_key;
        	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        		. $secret_key . '&response=' . $recaptcha;
        	$response = file_get_contents($url);
        	$response = json_decode($response);
        	if ($response->success != true) {
        	    redirect(base_url('admin'));
        		die;
        	}
        	
			$row= $this->admins->adminLogin($username, $password);
			if(count($row)==1)
			{
				foreach($row as $val)
					{
						$data= array('adminid' =>$val->id,
								'username' => $val->username,
								'password' => $val->password,
								'logged_in' => true,
								'id' => $val->id,
								);
							$this->session->set_userdata($data);
							$insertdata = array(
								"user_id"=>$val->id,
								"username"=>$val->username,
								"password"=>$val->password,
								"device_id"=>uniqid().$_SERVER['REMOTE_ADDR'],
								"ip_address"=>$_SERVER['REMOTE_ADDR'],
								"login_date"=>date("Y-m-d"),
								"login_time"=>date("H:i:s"),
							);
							$this->db->insert('login_details',$insertdata);
					}
				redirect('admin/dashboard');
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Invalid Username and Password...</div></div>');
			}
		}
		$this->load->view('admin/index');
	}


	//---lock screen

	function lockscreen()
	{
		chech_admin_login();
		if(isset($_POST['submit']))
		{
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$row= $this->admins->adminLogin($username, $password);
			if(count($row)==1)
			{
				foreach($row as $val)
					{

						$data= array('adminid' =>$val->id,
								'username' => $val->username,
								'logged_in' => true,
								'id' => $val->id,
								);
							$this->session->set_userdata($data);
					}
				redirect('admin/dashboard');
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="alert alert-danger">Invalid Password.</div>');
			}
		}
		$this->load->view('admin/lockscreen');
	}


// ----------forget password---------

	function forget_password()
	{
		chech_admin_login();
		if(isset($_POST['submit']))
		{
			$username = $this->input->post('username');
			$check_user = $this->crud->selectDataByMultipleWhere('tbl_admin',array('username'=>$username,));
			if(!empty($check_user))
			{
				$check_user = $check_user[0];
				$user_id = $check_user->id;
				$string = time().$user_id.$username;
				$hash_string = hash('sha256', $string);
				$currentdata = date('Y-m-d H:i');
				$hash_expiry = date('Y-m-d H:i',strtotime($currentdata.'1 days'));
				$data = array(
					"hash_key"=>$hash_string,
					"hash_expiry"=>$hash_expiry,
				);
				$resetlink = base_url().'admin/create_password?hash_key='.$hash_string;
				$message = '<p>Your Reset Link</p>'.$resetlink;
				$subject = "Password Reset Link";
				$sendmail = $this->forget_password_mail->sendmail($username,$subject,$message);
				if($sendmail==true)
				{
					$this->db->update('tbl_admin',$data,array('username'=>$username));
			  		$this->session->set_flashdata('message','<div class="alert alert-success">Reset Password Link Sent Successfully</div>');
			  		redirect(base_url('forget-password'));
				}
				else
				{
			  		$this->session->set_flashdata('message','<div class="alert alert-danger">Email Sending Error</div>');
				}
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="alert alert-danger">Username Not Found.</div>');
			}
		}

		$this->load->view('admin/forget-password');
	}




	function create_password()
	{
		if($this->input->get('hash_key'))
		{
			$hash_key = $this->input->get('hash_key');
			$data['hash_key'] = $hash_key;
			$tbladmin = $this->crud->selectDataByMultipleWhere('tbl_admin',array('hash_key'=>$hash_key,));
			if(!empty($tbladmin))
			{
				$tbladmin = $tbladmin[0];
				$hash_expiry = $tbladmin->hash_expiry;
				$currentdate = date('Y-m-d H:i');
				if($currentdate < $hash_expiry)
				{
					if(isset($_POST['submit']))
					{
						$password = $this->input->post('password');
						if(!empty($password))
						{
							$data = array(
								"password"=>$password,
								"hash_key"=>null,
								"hash_expiry"=>null,
							);

							$this->db->update('tbl_admin',$data,array('hash_key'=>$hash_key));
			  				$this->session->set_flashdata('message','<div class="alert alert-success">Password Update successfully....</div>');
			  				redirect(base_url('Admin/index'));

						}
						else
						{
			  				$this->session->set_flashdata('message','<div class="alert alert-danger">Link is Expirey..</div>');
						}
					}
					else
					{
						$this->load->view('admin/create-password',$data);
					}
				}
				else
				{
			  		$this->session->set_flashdata('message','<div class="alert alert-danger">Link is Expirey..</div>');
			  		redirect(base_url('forget-password'));	

				}
			}
			else
			{
			  $this->session->set_flashdata('message','<div class="alert alert-danger">Invalid Link</div>');	
			  exit;
			}
		}
		$this->load->view('admin/create-password');
	}

	function dashboard()
	{
		chech_admin_login();
		$this->load->view('admin/dashboard');
	}

//---------------logout---

	function logout()
	{
		$get_user_id = $this->session->userdata('id');
		$this->db->update('login_details',array('logout_date'=>date("Y-m-d"),'logout_time'=>date("H:i:s"),'login_status'=>1,),array('user_id'=>$get_user_id,'login_status'=>0));
		$this->session->sess_destroy();
		$this->session->set_flashdata('message','<div class="alert alert-success">You have been successsully logout.</div>');
		redirect('admin/index');
	}



// -------------chech_admin_login-----------


	// function chech_admin_login()
	// {
	// 	$ci = & get_instance();
	// 	$USERID      = $ci->session->userdata('USERID');	
	// 	$USERNAME      = $ci->session->userdata('USERNAME');	
	// 	$logged_in      = $ci->session->userdata('logged_in');	
	// 	if($USERID=="" && $USERNAME=="")
	// 	{
	// 		redirect('admin/index');
	// 	}
	// }



// ---------------------Isadmin_login-------

	// function Isadmin_login()
	// {
	// 	$ci = & get_instance();
	// 	$USERID      = $ci->session->userdata('USERID');	
	// 	$USERNAME      = $ci->session->userdata('USERNAME');	
	// 	$logged_in      = $ci->session->userdata('logged_in');	
	// 	if($USERID!="" && $USERNAME!="")
	// 	{
	// 		redirect('admin/dashboard');
	// 	}
	// }




}