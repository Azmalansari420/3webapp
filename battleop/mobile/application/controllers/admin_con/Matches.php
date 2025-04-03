<?php

class Matches extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Matches',
						   	'table_name'=>'matches',
						   	'upload_path'=>'media/uploads/matches/',
						   	'load_path'=>'admin/matches/',
						   	'redirect_path'=>'admin_con/matches/',
						   	'back_url'=>'matches',
						   	'add_url'=>'matches',
						   	'edit_url'=>'matches',
						   	'delete_url'=>'matches',
						   	'view_url'=>'matches',
						   	'status_value'=>'matches',
						   	'multiple_delete'=>'admin_con/matches/delete_all',
						   	'pagination_url'=>'admin_con/matches/listing',
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        $this->load->model('firebase_model','firebase_model');
        $this->load->model('Custom_model','custom');
        chech_admin_login(); 
    }



	//insert

	function add()
	{
		 
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$data['game_id'] = $this->input->post('game_id');	
			$data['match_title'] = $this->input->post('match_title');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['match_title']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;
			$data['pool_prize_type'] = $this->input->post('pool_prize_type');	
			$data['admin_share'] = $this->input->post('admin_share');	
			$data['prize_pool_description'] = $this->input->post('prize_pool_description');	
			$data['match_date_time'] = $this->input->post('match_date_time');	
			$data['match_type'] = $match_type = $this->input->post('match_type');	
			$data['version'] = $this->input->post('version');	
			$data['plateform'] = $this->input->post('plateform');	
			$data['entry_type'] = $this->input->post('entry_type');	
			$data['entry_fee'] = $this->input->post('entry_fee');	
			$data['point_per_kill'] = $this->input->post('point_per_kill');	
			$data['total_prize_pool'] = $this->input->post('total_prize_pool');	
			$data['map'] = $this->input->post('map');	
			$data['sponseby'] = $this->input->post('sponseby');	
			$data['specter_url'] = $this->input->post('specter_url');	
			$data['match_rule'] = $this->input->post('match_rule');	
			$data['private_match'] = $this->input->post('private_match');	
			$data['room_id'] = $this->input->post('room_id');	
			$data['room_password'] = $this->input->post('room_password');	
			$data['room_size'] = $room_size = $this->input->post('room_size');	

			$data['status'] = $this->input->post('status');			
			$data['addeddate'] = date('Y-m-d H:i:s');

			$count = 0;
			if($match_type=='Solo')$count=1;
      if($match_type=='Duo')$count=2;
      if($match_type=='Squad')$count=4;

			$data['join_count_available'] = $room_size;


			$this->crud->insert($this->arr_values['table_name'],$data);
			$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been Successfully Saved..</div></div>');			
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{
		$search = $this->input->post("search");
		
		$this->load->library("pagination");			
		$config = array();  
    $config["base_url"] = base_url($this->arr_values['redirect_path'].'listing');
    $config["total_rows"]  = $totalrow = count($this->crud->get_data($this->arr_values['table_name']));
		$config["per_page"] = $pageper = pagination_limit; 
    $config["uri_segment"] = 4; 
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i> Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page <i class="fa fa-long-arrow-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';		
		$this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data["links"] = $this->pagination->create_links();
    $data['totalrow'] = $totalrow;
    $data['pageper'] = $pageper;

    if(!empty($search))
    {
    	$this->db->where(" concat(match_title) like '%$search%' ");
	    $this->db->order_by('id desc');        
			$data['ALLDATA']= $this->crud->get_data($this->arr_values['table_name']); 
    }
    else
    {
    	$this->db->order_by('id desc');        
			$data['ALLDATA']= $this->crud->selectdatainlimit($pageper, $page,$this->arr_values['table_name']); 
    }
    
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['pagination_url'] = $this->arr_values['pagination_url'];
    $data['search'] = $search;
    $data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}

	// function listing()
	// {
		 
	// 	$this->db->order_by("id desc");
	// 	$data['ALLDATA'] = $this->crud->get_data($this->arr_values['table_name']);

	// 	$data['page_title'] = $this->arr_values['page_title'];
	// 	$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
	// 	$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
	// 	$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
	// 	$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
	// 	$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
	// 	$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
	// 	$data['upload_path'] = $this->arr_values['upload_path'];
	// 	$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		
	// 	$this->load->view($this->arr_values['load_path'].'list',$data);
	// }


	//------------delete 

	public function delete($id)
	  {
	    $delete=$this->crud->delete($this->arr_values['table_name'],$id);
	    if($delete)
        {
          echo "Success";
        }
        else
        {
          echo "Error";
        }
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			$ids = $this->input->post('id');
		    if (!empty($ids)) {
		        $this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		    }
		}


	//----------------edit

	function edit()
	{
		 
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$data['game_id'] = $this->input->post('game_id');	
			$data['match_title'] = $match_title = $this->input->post('match_title');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['match_title']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;
			$data['pool_prize_type'] = $this->input->post('pool_prize_type');	
			$data['admin_share'] = $this->input->post('admin_share');	
			$data['prize_pool_description'] = $this->input->post('prize_pool_description');	
			$data['match_date_time'] = $this->input->post('match_date_time');	
			$data['match_type'] = $match_type = $this->input->post('match_type');	
			$data['version'] = $this->input->post('version');	
			$data['plateform'] = $this->input->post('plateform');	
			$data['entry_type'] = $this->input->post('entry_type');	
			$data['entry_fee'] = $this->input->post('entry_fee');	
			$data['point_per_kill'] = $this->input->post('point_per_kill');	
			$data['total_prize_pool'] = $this->input->post('total_prize_pool');	
			$data['map'] = $this->input->post('map');	
			$data['sponseby'] = $this->input->post('sponseby');	
			$data['specter_url'] = $this->input->post('specter_url');	
			$data['match_rule'] = $this->input->post('match_rule');	
			$data['private_match'] = $this->input->post('private_match');	
			$data['room_id'] = $room_id = $this->input->post('room_id');	
			$data['room_password'] = $room_password = $this->input->post('room_password');	
			$data['room_size'] = $room_size = $this->input->post('room_size');
			
			$data['status'] = $this->input->post('status');						
			$data['modifieddate'] = date('Y-m-d H:i:s');

			$count = 0;
			if($match_type=='Solo')$count=1;
      if($match_type=='Duo')$count=2;
      if($match_type=='Squad')$count=4;

			$data['join_count_available'] = $room_size;

			$joinlist = $this->db->get_where('join_match',array('match_id'=>$args[0]))->result_object();
			if(!empty($joinlist))
			{
				if(!empty($room_id))
				{
					$title = $match_title;
					$message = 'Room ID: '.$room_id .' '.' Room Password: '.$room_password;
					
					$join_user_ids = [];
					$join_users_data = $this->db->select('user_id')->get_where("join_match_participates",array("match_id"=>$args[0],))->result_object();
					foreach($join_users_data as $key => $value)
					    $join_user_ids[] = $value->user_id;
					if(!empty($join_user_ids))
					{
					    $login_data = $this->db->select("firebase_token")->where_in("user_id",$join_user_ids)->where(" firebase_token!='' and firebase_token!='NULL' ")->get_where("login_history",array("status"=>1,))->result_object();
					    foreach($login_data as $key => $value)
					        	$this->firebase_model->push_notification_single($value->firebase_token,$message,$title);
					}

					
					
					
					
					// $this->firebase_model->push_notification($message,$title,'result');
				}
			}



			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been successfully Updated..</div></div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}





	//----------------view

	function view()
	{
		$args=func_get_args();
		 
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');
			
			$data['declare_result'] = $this->input->post('declare_result');	
			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been successfully Updated..</div></div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		$username = $this->input->get('username');

		if(empty($username))
		{ 
			$participate = $this->crud->selectDataByMultipleWhere('join_match_participates',array('match_id'=>$args[0]));
		}
		else
		{
			$this->db->from('join_match_participates');
			$this->db->like('username', $username);
			$this->db->where('match_id',$args[0]);
			$query = $this->db->get()->result_object();
			$participate = $query;
		}




		$data['participate'] = $participate;
		$data['username'] = $username;
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


// public function serch()
// 	{
// 		$search = $this->input->get("search");
// 		$this->db->from('join_match_participates');
// 		$this->db->like('username', $search);
// 		$this->db->where('status',1);
// 		$query = $this->db->get()->result_object();
// 		$data['participate'] = $query;
// 		$this->load->view('jobs',$data);

// 	}




















	function participantes()
	{
		 
		$args=func_get_args();

		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'participantes',$data);
	}


//---------------------status

	public function status_change()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $status = $this->input->post('status');	
			 $type = 'credit';
        $message = 'Cancel Match Refund';
			if($status==4)
			{
				$user_history = $this->db->get_where("user_history",array("type2"=>2,"join_id"=>$id,))->result_object();
				// print_r($user_history);
				foreach ($user_history as $key => $value)
				{
						$this->custom->wallet_credit_debit($value->user_id,$type,$value->amount,$message,$id,4);  
				}
			}	

			$this->db->update('join_match',array('status'=>$status),array('match_id'=>$id));
			$this->db->update($this->arr_values['table_name'],$data,array("id"=>$id));


			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}

	}



	public function new_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->db->update($this->arr_values['table_name'],array('status'=>$status),array('id'=>$id));
		$status_html = match_live_type($status);
		$data['data'] = array("status"=>$status_html,);
		echo json_encode($data);
	}


	public function declere_result()
	{
		$idall = $this->input->post('id');
		$total_kill_1 = $this->input->post('total_kill');
		$pool_prize_2 = $this->input->post('pool_prize');
		$position_3 = $this->input->post('position');
		$winning_amt_4 = $this->input->post('winning_amt');
		$match_id = $this->input->post('match_id');


		foreach ($idall as $key => $value) 
		{

			$user_idget = $this->db->get_where('join_match_participates',array('id'=>$value))->result_object();


				
				$user_history = $this->db->get_where('user_history',array("type2"=>3,"join_id"=>$match_id,"user_id"=>$user_idget[0]->user_id,))->result_object();
				foreach ($user_history as $key2 => $value2)
				{

						$get_user_wallet = $this->db->get_where('users',array('id'=>$user_idget[0]->user_id))->result_object();
						$user_wallet = $get_user_wallet[0]->winning_amt;


						$new_amount = $user_wallet-$value2->amount;					
		    		$this->db->update("users",array("winning_amt"=>$new_amount,),array("id"=>$user_idget[0]->user_id,));      
		    		$this->db->where(array("id"=>$value2->id,))->delete("user_history");
				}
		}

		

		foreach ($idall as $key => $value) 
		{
			$id = $value;
			$total_kill = $total_kill_1[$key];
			$pool_prize = $pool_prize_2[$key];
			$position = $position_3[$key];
			$winning_amt = $winning_amt_4[$key];


			$pool_size = 0;
			if(empty($pool_prize_2[$key]))$pool_size = 0;
			else $pool_size = $pool_prize_2[$key];

			$this->db->group_by('user_id');
			$user_idget = $this->db->get_where('join_match_participates',array('id'=>$id))->result_object();
			// print_r($user_id[0]->user_id);
			// die;
			// $winning_amt = $total_kill_1[$key]+$pool_size;

			// print_r($winning_amt);
			// die;


			$this->db->update('join_match_participates',array('total_kill'=>$total_kill,'pool_prize'=>$pool_prize,'position'=>$position,'winning_amt'=>$winning_amt),array('id'=>$id));

			$get_user_wallet = $this->db->get_where('users',array('id'=>$user_idget[0]->user_id))->result_object();
			$user_wallet = $get_user_wallet[0]->winning_amt;
			
			$user_id = $user_idget[0]->user_id;
			$match_id = $user_idget[0]->match_id;
			$type = 'credit';
			$message = "Winning Match Amount";
			$amount = $winning_amt;
			$join_id = 0;




			



			// die;




			$new_amount = $user_wallet+$amount;
	    $this->db->update("users",array("winning_amt"=>$new_amount,),array("id"=>$user_id,));      
	      
	      $history_data = array(
	        "user_id"=>$user_id,
	        "join_id"=>$match_id,
	        "amount"=>$amount,
	        "balance"=>$new_amount,
	        "type"=>$type,
	        "message"=>$message,
	        "date_time"=>date("Y-m-d H:i:s"),
	        "add_date_time"=>date("Y-m-d H:i:s"),
	        "update_date_time"=>date("Y-m-d H:i:s"),
	        "status"=>1,	        
	        "type2"=>3,	        
	        "is_delete"=>0,
	      );
	      $this->db->insert("user_history",$history_data);
	      $lastid = $this->db->insert_id();

	      // $this->db->delete('user_history')

	      $user_history = $this->db->get_where("user_history",array("type2"=>2,"join_id"=>$id,))->result_object();
				// print_r($user_history);
				foreach ($user_history as $key => $value)
				{
						$this->custom->wallet_credit_debit($value->user_id,$type,$value->amount,$message,$id,4);  
				}


		}
		$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		redirect($this->arr_values['redirect_path'].'listing');	


	}


	function add_notes()
	{
		if(isset($_POST['submit']))
		{
			$match_id = $this->input->post('match_id');
			$message = $this->input->post('message');
			$data = array(
				"match_id"=>$match_id,
				"messge"=>$message,
			);

			$this->db->delete("match_result_content",array("match_id"=>$match_id,));
			$this->db->insert('match_result_content',$data);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	// function match_cancel()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		$match_id = $this->input->post('match_id');
			

	// 		$this->db->insert('match_result_content',$data);
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	}
	// }




	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}