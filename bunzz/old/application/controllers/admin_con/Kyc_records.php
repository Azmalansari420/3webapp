<?php

class Kyc_records extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'KYC',
						   	'table_name'=>'kyc_records',
						   	'upload_path'=>'media/uploads/distributor/',
						   	'load_path'=>'admin/kyc_records/',
						   	'redirect_path'=>'admin_con/kyc_records/',
						   	'back_url'=>'kyc_records',
						   	'add_url'=>'kyc_records',
						   	'edit_url'=>'kyc_records',
						   	'delete_url'=>'kyc_records',
						   	'view_url'=>'kyc_records',
						   	'status_value'=>'kyc_records',
						   	'multiple_delete'=>'admin_con/kyc_records/delete_all',
						   	'pagination_url'=>'admin_con/kyc_records/listing',
						   	'controller_name'=>'kyc_records',
						   	'page_name'=>'kyc_records.php',
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(6);
    }



	//insert

	// function add()
	// {
	// 	check_controller_inner_access(6,2);
	// 	if(isset($_POST['submit']))
	// 	{
	// 		date_default_timezone_set('Asia/Kolkata');

	// 		// if($_FILES['image']['name']!='')
	// 		// {
	// 		// 	// $bimage = time().$_FILES['image']['name'];
	// 		// 	$bimage = time().'.'.explode(".", $_FILES['image']['name'])[1];
	// 		// 	$path = $this->arr_values['upload_path'].$bimage;
	// 		// 	move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		// }
	// 		// else
	// 		// {
	// 		// 	$bimage = "";
	// 		// }
	// 		// $data['image'] = $bimage;
			
	// 		$data['type'] = 2;		
	// 		$data['role'] = $role = $this->input->post('role');

	// 		$getrole_access = $this->crud->selectDataByMultipleWhere('role',array('id'=>$role));
	// 		$data['access'] = $getrole_access[0]->role_access;

	// 		$data['first_name'] = $this->input->post('first_name');			
	// 		$data['mobile'] = $this->input->post('mobile');			
	// 		$data['email'] = $this->input->post('email');			
	// 		$data['username'] = $this->input->post('username');			
	// 		$data['password'] = $this->input->post('password');		

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
		check_controller_inner_access(6,1);	
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
    	$this->db->where(" concat(name,firm_name,address) like '%$search%' ");
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
		$data['pagination_url'] = $this->arr_values['pagination_url'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
    $data['search'] = $search;
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
			check_controller_inner_access(6,4);	
			$ids = $this->input->post('id');
		    if (!empty($ids)) {
		        $this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		    }
		}


	//----------------edit

	function edit()
	{
		check_controller_inner_access(6,3);		 
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			// if($_FILES['image']['name']!='')
			// {
			// 	$image = time().'.'.explode(".", $_FILES['image']['name'])[1];
			// 	$path = $this->arr_values['upload_path'].$image;
			// 	move_uploaded_file($_FILES['image']['tmp_name'],$path);
			// }
			// else
			// {
			// 	$image = $_POST['oldimage'];
			// }
			// $data['image'] = $image;
			
			$data['type'] = 2;		
			$data['role'] = $role = $this->input->post('role');

			$getrole_access = $this->crud->selectDataByMultipleWhere('role',array('id'=>$role));
			$data['access'] = $getrole_access[0]->role_access;
			$data['first_name'] = $this->input->post('first_name');			
			$data['mobile'] = $this->input->post('mobile');			
			$data['email'] = $this->input->post('email');	
			$data['username'] = $this->input->post('username');			
			$data['password'] = $this->input->post('password');

			$data['status'] = $this->input->post('status');						
			$data['modifieddate'] = date('Y-m-d H:i:s');

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
		 check_controller_inner_access(6,5);
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


//---------------------status

	public function status_change()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $status = $this->input->post('status');	

			$user_id = $this->input->post('user_id');		
			$this->db->update($this->arr_values['table_name'],$data,array("id"=>$id));

			$this->db->update('users',array('kyc_status'=>$status),array("id"=>$user_id));


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