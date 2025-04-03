<?php

class User_history extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Transtion Details',
						   	'table_name'=>'user_history',
						   	'upload_path'=>'media/uploads/user_history/',
						   	'load_path'=>'admin/user_history/',
						   	'redirect_path'=>'admin_con/user_history/',
						   	'back_url'=>'user_history',
						   	'edit_url'=>'user_history',
						   	'add_url'=>'user_history',
						   	'delete_url'=>'user_history',
						   	'view_url'=>'user_history',
						   	'status_value'=>'user_history',
						   	'multiple_delete'=>'admin_con/user_history/delete_all',
						   	'pagination_url'=>'admin_con/user_history/listing',
						   );
	

	///------author for login--
	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
    }

	
	//----listing list dekhney ke lia 

	function listing()
	{
		$search = $this->input->post("search");
			$message = "Add Money";
		$this->load->library("pagination");			
		$config = array();  
    $config["base_url"] = base_url($this->arr_values['redirect_path'].'listing');
    $config["total_rows"]  = $totalrow = count($this->crud->selectDataByMultipleWhere($this->arr_values['table_name'],array('message'=>$message)));
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
    	$this->db->where(" concat(amount,message,type) like '%$search%' ");
	    $this->db->order_by('id desc');        
			$data['ALLDATA']= $this->crud->get_data($this->arr_values['table_name']); 
    }
    else
    {
    	// $this->db->where([array('message'=>"Add Money")]);
    	// $this->db->where('message', "Cancel Match Refund");
    	$this->db->where('message', "Add Money");
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


	//--delete ke lia

	public function delete($id)//for deleting the user
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


	function view()
	{
		 
		$args=func_get_args();
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}




}