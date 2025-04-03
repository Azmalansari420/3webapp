<?php

class About_us extends CI_Controller
{
	///------author for login--


	protected $arr_values = array(
						   	'page_title'=>'About US',
						   	'table_name'=>'about_us',
						   	'upload_path'=>'media/uploads/about_us/',
						   	'load_path'=>'admin/about_us/',
						   ); 




	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(8);
    }


	//---edit function in left menu

	function edit()
	{
		 check_controller_inner_access(8,3);
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			
			$data['content'] = $this->input->post('content');
			$data['mission'] = $this->input->post('mission');
			$data['vision'] = $this->input->post('vision');
			
			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><div class="bg-blue rounded w-25px h-25px d-flex align-items-center justify-content-center text-white"><i class="fa fa-bell"></i></div><strong class="me-auto ms-2">Message</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body" style="color:black;">Record has been successfully Updated..</div></div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


}