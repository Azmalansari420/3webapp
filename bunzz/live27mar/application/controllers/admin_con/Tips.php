<?php

class Tips extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Tips',
						   	'table_name'=>'tips',
						   	'upload_path'=>'media/uploads/tips/',
						   	'load_path'=>'admin/tips/',
						   	'redirect_path'=>'admin_con/tips/',
						   	'back_url'=>'tips',
						   	'add_url'=>'tips',
						   	'edit_url'=>'tips',
						   	'delete_url'=>'tips',
						   	'view_url'=>'tips',
						   	'status_value'=>'tips',
						   	'multiple_delete'=>'admin_con/tips/delete_all',
						   ); 


   //--check user login or not
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
    }



	//insert

	function add()
	{
		 
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			if($_FILES['image']['name']!='')
			{
				$bimage = time().'.'.explode(".", $_FILES['image']['name'])[1];
				$path = $this->arr_values['upload_path'].$bimage;
				move_uploaded_file($_FILES['image']['tmp_name'],$path);
			}
			else
			{
				$bimage = "";
			}
			$data['image'] = $bimage;

			if($_FILES['banner']['name']!='')
			{
				$bbanner = rand().'.'.explode(".", $_FILES['banner']['name'])[1];
				$path = $this->arr_values['upload_path'].$bbanner;
				move_uploaded_file($_FILES['banner']['tmp_name'],$path);
			}
			else
			{
				$bbanner = "";
			}
			$data['banner'] = $bbanner;
			
			$data['name'] = $this->input->post('name');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['name']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;
			$data['small_info'] = $this->input->post('small_info');	

			$title = $this->input->post('title');	
			$content = $this->input->post('content');	

			if(!empty($content))
			{
				foreach($content as $key => $value)
				{
					$all_card[] = array(
						"title"=>$title[$key],
						"content"=>$content[$key],
					);
				}
			}
			$all_card_get = json_encode($all_card);
			$data['all_content'] = $all_card_get;

			$data['status'] = $this->input->post('status');			
			$data['addeddate'] = date('Y-m-d H:i:s');

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

			if($_FILES['image']['name']!='')
			{
				$image = time().'.'.explode(".", $_FILES['image']['name'])[1];
				$path = $this->arr_values['upload_path'].$image;
				move_uploaded_file($_FILES['image']['tmp_name'],$path);
			}
			else
			{
				$image = $_POST['oldimage'];
			}
			$data['image'] = $image;
			
			if($_FILES['banner']['name']!='')
			{
				$banner = time().'.'.explode(".", $_FILES['banner']['name'])[1];
				$path = $this->arr_values['upload_path'].$banner;
				move_uploaded_file($_FILES['banner']['tmp_name'],$path);
			}
			else
			{
				$banner = $_POST['oldbanner'];
			}
			$data['banner'] = $banner;
			
			$data['name'] = $this->input->post('name');	
			$data['slug'] = $this->input->post('slug');
			if(empty($data['slug']))
			{
				$slug = slug($data['name']);
			}			
			else
			{
				$slug = slug($data['slug']);
			}
			$data['slug'] = $slug;
			$data['small_info'] = $this->input->post('small_info');	

			$title = $this->input->post('title');	
			$content = $this->input->post('content');	

			if(!empty($content))
			{
				foreach($content as $key => $value)
				{
					$all_card[] = array(
						"title"=>$title[$key],
						"content"=>$content[$key],
					);
				}
			}
			$all_card_get = json_encode($all_card);
			$data['all_content'] = $all_card_get;

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


	public function addmore_image()
	{
		$data = array();
		$data['i'] = $this->input->post("i");
		$this->load->view($this->arr_values['load_path'].'add-image',$data);
	}

	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}