<?php

class Finalorder extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Orders',
						   	'table_name'=>'finalorder',
						   	'upload_path'=>'media/uploads/finalorder/',
						   	'load_path'=>'admin/finalorder/',
						   	'redirect_path'=>'admin_con/finalorder/',
						   	'back_url'=>'finalorder',
						   	'add_url'=>'finalorder',
						   	'edit_url'=>'finalorder',
						   	'delete_url'=>'finalorder',
						   	'view_url'=>'finalorder',
						   	'table_url'=>'admin/finalorder/table',
						   	'status_value'=>'finalorder',
						   	'multiple_delete'=>'admin_con/finalorder/delete_all',
						   	'pagination_url'=>'admin_con/finalorder/get_table_data',
						   	'controller_name'=>'finalorder',
						   	'invoice_url'=>'finalorder',
						   	'page_name'=>'finalorder.php',
						   	'pagination_limit'=>'10',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(4);
    }






	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(4,1);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['invoice_url'] = base_url('admin_con/'.$this->arr_values['invoice_url'].'/invoice');
		
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['pagination_url'] = $this->arr_values['pagination_url'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	public function get_table_data() 
	{
	  check_controller_inner_access(4,1);
	  $todaydate = date('Y-m-d');

	  $search = $this->input->post('search');
	  $limit = $this->arr_values['pagination_limit'];
	  $offset = $this->input->post('offset');

	  $this->db->where("(
		    order_id LIKE '%$search%' OR 
		    name LIKE '%$search%' OR 
		    orderdate LIKE '%$search%' OR 
		    email LIKE '%$search%' OR 
		    mobile LIKE '%$search%' OR 
		    address LIKE '%$search%' OR 
		    locality LIKE '%$search%' OR 
		    pincode LIKE '%$search%' OR 
		    after_discount_final_price LIKE '%$search%'
		)");
	  $this->db->order_by('id', 'DESC');
	  $this->db->where(['orderdate' => $todaydate, 'order_status' => 1]);
	  $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();
	  $this->db->where(['orderdate' => $todaydate, 'order_status' => 1]);
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
	  $data['invoice_url'] = base_url('admin_con/'.$this->arr_values['invoice_url'].'/invoice/');

	  $definevariable = array(
	  	'ALLDATA' => $data['ALLDATA'],
	  	'upload_path'=>$data['upload_path'],
	  	'view_url'=>$data['view_url'],
	  	'edit_url'=>$data['edit_url'],
	  	'invoice_url'=>$data['invoice_url'],
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
	  	check_controller_inner_access(4,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(4,4);
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
		check_controller_inner_access(4,3);		 
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
		check_controller_inner_access(4,5);		 
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


	//----------------view

	function Invoice()
	{
		check_controller_inner_access(4,5);		 
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'invoice',$data);
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


	public function updateordderstatus()
	{
		$result = array();

		$id = $this->input->post('id');
		$order_status = $this->input->post('order_status');
		$update_date = date('Y-m-d H:i s');

		$updatedata = array(
			"order_status"=>$order_status,
			"order_status_updatedate"=>$update_date,
		);

		if(!empty($id))
		{
			$this->db->update($this->arr_values['table_name'],array('order_status'=>$order_status),array('id'=>$id));
			$result['message']    = "Status Updated";
			$result['status']  = "200";
            $result['data']    = $updatedata;
		}
		else
		{
			$result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $updatedata;
		}
		echo json_encode($result);
	}



	// public function statusupdate()
	// {	
	// 	//echo "string";
	// 	$data['status'] = $_GET['l_status'];
	// 	$this->crud->update($this->arr_values['table_name'],$_GET['ld'],$data);
	// 	redirect($this->arr_values['redirect_path'].'listing');	
	// }



}