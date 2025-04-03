<?php

class Number extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Number',
						   	'table_name'=>'number',
						   	'upload_path'=>'media/uploads/number/',
						   	'load_path'=>'admin/number/',
						   	'redirect_path'=>'admin_con/number/',
						   	'back_url'=>'number',
						   	'add_url'=>'number',
						   	'edit_url'=>'number',
						   	'delete_url'=>'number',
						   	'view_url'=>'number',
						   	'table_url'=>'admin/number/table',
						   	'status_value'=>'number',
						   	'multiple_delete'=>'admin_con/number/delete_all',
						   	'pagination_url'=>'admin_con/number/get_table_data',
						   	'controller_name'=>'number',
						   	'page_name'=>'number.php',
						   	'pagination_limit'=>'20',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(9);
    }



	//insert

	function add()
	{
		check_controller_inner_access(9,2);
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

									
			$data['name'] = $this->input->post('name');			
			$slug = slug($data['name']);
			$data['slug'] = $slug;

					
			$data['status'] = $this->input->post('status');			
			$data['addeddate'] = date('Y-m-d H:i:s');

			$this->crud->insert($this->arr_values['table_name'],$data);
			
			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(9,1);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['pagination_url'] = $this->arr_values['pagination_url'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	public function get_table_data() 
{
    check_controller_inner_access(9,1);
    $search = $this->input->post('search');
    $limit = $this->arr_values['pagination_limit'];
    $offset = $this->input->post('offset');

    $todaydate = date("Y-m-d");
    $game_id = $this->input->post('game_id');
    $selectdate = $this->input->post('selectdate');

    // Start building query
    $this->db->from($this->arr_values['table_name']);

    if (!empty($search)) {
        $this->db->group_start();  // Start OR condition group
        $this->db->like('month', $search);
        $this->db->or_like('id', $search);
        $this->db->group_end();  // End OR condition group
    }

    if (!empty($game_id)) {
        $this->db->where('game_id', $game_id);
    }

    if (!empty($selectdate)) {
        $this->db->where('create_on', $selectdate);
    } else {
        $this->db->where('create_on', $todaydate);
    }

    // Clone query before executing for pagination
    $clone_query = clone $this->db;

    // Apply order and limits for fetching data
    $this->db->order_by('id', 'DESC');
    $data['ALLDATA'] = $this->db->limit($limit, $offset)->get()->result();

    // Get total rows using the cloned query
    $total_rows = $clone_query->count_all_results();

    // Generate Pagination Links
    $pagination_links = '';
    $total_pages = ceil($total_rows / $limit);
    $current_page = ($offset / $limit) + 1;

    if ($total_rows > $limit) {
        for ($i = 0; $i < $total_pages; $i++) {
            $pagination_links .= '<a href="javascript:void(0);" class="pagination-link btn btn-primary btn-sm ' . 
                ($i == $current_page - 1 ? 'active-page' : '') . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" 
                data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
        }
    }

    $data['pagination_links'] = $pagination_links ?: '';

    // Pass required variables
    $definevariable = array(
        'ALLDATA' => $data['ALLDATA'],
        'upload_path' => $this->arr_values['upload_path'],
        'view_url' => base_url('admin_con/'.$this->arr_values['view_url'].'/view/'),
        'edit_url' => base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/'),
        'delete_url' => base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/'),
        'limit' => $limit,
        'total_rows' => $total_rows,
        'offset' => $offset,
        'total_pages' => $total_pages,
    );

    $html = $this->load->view($this->arr_values['table_url'], $definevariable, true);
    echo json_encode(array('html' => $html, 'pagination_links' => $data['pagination_links'], 'limit' => $limit));
}





	//------------delete 

	public function delete()
	  {
	  	check_controller_inner_access(9,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(9,4);
			$ids = $this->input->post('id');
		    if (!empty($ids)) 
		    {
		    	$this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		        $this->session->set_flashdata('message','Record has been Successfully Delete..');
		    }
		}


	//----------------edit

	function edit()
	{
		check_controller_inner_access(9,3);		 
		$args=func_get_args();
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			$data['name'] = $this->input->post('name');	
			$slug = slug($data['name']);
			$data['slug'] = $slug;

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


			$data['status'] = $this->input->post('status');						
			$data['modifieddate'] = date('Y-m-d H:i:s');

			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			

			$this->session->set_flashdata('message','Record has been successfully Updated.');
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
		check_controller_inner_access(9,5);		 
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



	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }


	public function update_number() 
	{
	    $id = $this->input->post('id');
	    $new_number = $this->input->post('number');

	    if (!empty($id) && !empty($new_number)) {
	        $this->db->where('id', $id);
	        $this->db->update('number', ['number' => $new_number]); // Update number

	        if ($this->db->affected_rows() > 0) {
	            echo "success";
	        } else {
	            echo "error";
	        }
	    } else {
	        echo "error";
	    }
	}




}