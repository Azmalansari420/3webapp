<?php

class Complete_matches extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Complete Matches',
						   	'table_name'=>'games',
						   	'upload_path'=>'media/uploads/games/',
						   	'load_path'=>'admin/complete_matches/',
						   	'redirect_path'=>'admin_con/complete_matches/',
						   	'back_url'=>'complete_matches',
						   	'add_url'=>'complete_matches',
						   	'edit_url'=>'complete_matches',
						   	'delete_url'=>'complete_matches',
						   	'view_url'=>'complete_matches',
						   	'status_value'=>'complete_matches',
						   	'multiple_delete'=>'admin_con/complete_matches/delete_all',
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
    }



	//insert

	// function add()
	// {
		 
	// 	if(isset($_POST['submit']))
	// 	{
	// 		date_default_timezone_set('Asia/Kolkata');

	// 		if($_FILES['image']['name']!='')
	// 		{
	// 			// $bimage = time().$_FILES['image']['name'];
	// 			$bimage = time().'.'.explode(".", $_FILES['image']['name'])[1];
	// 			$path = $this->arr_values['upload_path'].$bimage;
	// 			move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		}
	// 		else
	// 		{
	// 			$bimage = "";
	// 		}
	// 		$data['image'] = $bimage;
			
	// 		// 
	// 		$data['url'] = $this->input->post('url');			
	// 		$data['status'] = $this->input->post('status');			
	// 		$data['addeddate'] = date('Y-m-d H:i:s');

	// 		$this->crud->insert($this->arr_values['table_name'],$data);
	// 		$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been Successfully Saved..</div></div>');			
	// 		redirect($this->arr_values['redirect_path'].'listing');	
	// 	}
	// 	$data['page_title'] = $this->arr_values['page_title'];
	// 	$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
	// 	$this->load->view($this->arr_values['load_path'].'add',$data);
	// }


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

	// function edit()
	// {
		 
	// 	$args=func_get_args();

	// 	if(isset($_POST['submit']))
	// 	{
	// 		date_default_timezone_set('Asia/Kolkata');

	// 		if($_FILES['image']['name']!='')
	// 		{
	// 			$image = time().'.'.explode(".", $_FILES['image']['name'])[1];
	// 			$path = $this->arr_values['upload_path'].$image;
	// 			move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		}
	// 		else
	// 		{
	// 			$image = $_POST['oldimage'];
	// 		}
	// 		$data['image'] = $image;
	// 		$data['url'] = $this->input->post('url');			
				
	// 		$data['status'] = $this->input->post('status');						
	// 		$data['modifieddate'] = date('Y-m-d H:i:s');

	// 		$this->crud->update($this->arr_values['table_name'],$args[0],$data);
	// 		$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been successfully Updated..</div></div>');
	// 	    redirect($this->arr_values['redirect_path'].'listing');	
	// 	}
	// 	$data['page_title'] = $this->arr_values['page_title'];
	// 	$data['upload_path'] = $this->arr_values['upload_path'];
	// 	$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
	// 	$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
	// 	$this->load->view($this->arr_values['load_path'].'edit',$data);
	// }





	//----------------view

	function view()
	{
		 
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


	function view_participate()
	{
		$this->load->view($this->arr_values['load_path'].'view-participate');
	}


//---------------------status

	public function status_change()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $this->input->post('status');		
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
		$status_html = status($status);
		$data['data'] = array("status"=>$status_html,);
		echo json_encode($data);
	}



	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}