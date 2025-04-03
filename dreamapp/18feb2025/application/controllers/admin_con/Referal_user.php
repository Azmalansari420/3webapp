<?php

class Referal_user extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Referal Users',
						   	'table_name'=>'users',
						   	'upload_path'=>'media/uploads/users/',
						   	'load_path'=>'admin/referal_user/',
						   	'redirect_path'=>'admin_con/referal_user/',
						   	'back_url'=>'referal_user',
						   	'add_url'=>'referal_user',
						   	'edit_url'=>'referal_user',
						   	'delete_url'=>'referal_user',
						   	'view_url'=>'referal_user',
						   	'table_url'=>'admin/referal_user/table',
						   	'status_value'=>'referal_user',
						   	'multiple_delete'=>'admin_con/referal_user/delete_all',
						   	'pagination_url'=>'admin_con/referal_user/get_table_data',
						   	'controller_name'=>'referal_user',
						   	'page_name'=>'referal_user.php',
						   	'pagination_limit'=>'10',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(13);
    }






	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(13,1);
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
	  check_controller_inner_access(13,1);
	  $search = $this->input->post('search');
	  $limit = $this->arr_values['pagination_limit'];
	  $offset = $this->input->post('offset');

	  $this->db->where('referal_status', 1); // Apply WHERE condition first

	$this->db->group_start(); // Start grouping the LIKE conditions
	$this->db->like('name', $search);
	$this->db->or_like('email', $search);
	$this->db->or_like('mobile', $search);
	$this->db->group_end(); // End grouping
	  $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();

	  $this->db->where('referal_status',1);
	  $total_rows = $this->db->count_all_results($this->arr_values['table_name']);
	  $pagination_links = '';
	  $current_page = ($offset / $limit) + 1;

	  if ($total_rows > $limit) {
	    for ($i = 0; $i < ceil($total_rows / $limit); $i++) 
	    {
			  $pagination_links .= '<a href="#" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page - 1 ? 'active-page' : '') . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
			}
	  }

	  if (!empty($pagination_links)) {
	    $data['pagination_links'] = $pagination_links;
	  } else {
	    $data['pagination_links'] = '';
	  }


	  $total_pages = ceil($total_rows / $limit);

	  $data['upload_path'] = $this->arr_values['upload_path'];
	  $data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
	  $data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
	  $data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');

	  $definevariable = array(
	  	'ALLDATA' => $data['ALLDATA'],
	  	'upload_path'=>$data['upload_path'],
	  	'view_url'=>$data['view_url'],
	  	'edit_url'=>$data['edit_url'],
	  	'delete_url'=>$data['delete_url'],
	  	'limit'=>$limit,
	  	'total_rows'=>$total_rows,
	  	'offset'=>$offset,
	  	'total_pages'=>$total_pages,
	  );

	  $html = $this->load->view($this->arr_values['table_url'], $definevariable, true);
	  echo json_encode(array('html' => $html, 'pagination_links' => $data['pagination_links'],'limit'=>$limit));
}




	//------------delete 

	public function delete()
	  {
	  	check_controller_inner_access(13,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(13,4);
			$ids = $this->input->post('id');
		    if (!empty($ids)) 
		    {
		    	$this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		        $this->session->set_flashdata('message','Record has been Successfully Delete..');
		    }
		}


	//----------------edit

	





	//----------------view

	function view()
	{
		check_controller_inner_access(13,5);		 
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



	public function updatestatus()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$referral_by = $this->input->post('referral_by');
			$data['referal_status'] = $referal_status = $this->input->post('referal_status');	


			if($referal_status==2)
			{
				$getuserid = $this->db->get_where('users',array('user_id'=>$referral_by))->result_object();

				$request_id = time();
				$user_id = $getuserid[0]->id;
		        $add_type = 6;
		        $type = "credit";
		        $amount = 20;
		        $message = 'Refreal Amount';

		        $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message);
			}

			$this->db->update($this->arr_values['table_name'],$data,array("id"=>$id));


			$this->session->set_flashdata('message','Updated Successfully.');
		    redirect($this->arr_values['redirect_path'].'listing');	
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