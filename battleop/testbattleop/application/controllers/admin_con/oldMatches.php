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
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        $this->load->model('firebase_model','firebase_model');
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
		 
		$this->db->order_by("id desc");
		$data['ALLDATA'] = $this->crud->get_data($this->arr_values['table_name']);

		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


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
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}

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

			// $winning_amt = $total_kill_1[$key]+$pool_size;

			// print_r($winning_amt);
			// die;

			$this->db->update('join_match_participates',array('total_kill'=>$total_kill,'pool_prize'=>$pool_prize,'position'=>$position,'winning_amt'=>$winning_amt),array('id'=>$id));

			// $amount = $winning_amt;
			// $this->custom->wallet_credit_debit($user_id,$type,$amount,$message,$join_id); 

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




	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}