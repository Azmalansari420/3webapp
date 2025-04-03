<?php

class Win_amount extends CI_Controller
{
	///------author for login--


	protected $arr_values = array(
	   	'page_title'=>'Amount',
	   	'table_name'=>'win_amount',
	   	'upload_path'=>'media/uploads/win_amount/',
	   	'load_path'=>'admin/win_amount/',
	   ); 




	 public function __construct()
    {
        parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(2);
    }


	//---edit function in left menu

	function edit()
	{
		check_controller_inner_access(2,3);
		$args=func_get_args();

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			
			$data['jodi_amt'] = $this->input->post('jodi_amt');
			$data['haruf_ander_amt'] = $this->input->post('haruf_ander_amt');
			$data['haruf_ander_amt'] = $this->input->post('haruf_ander_amt');
			
			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$this->session->set_flashdata('message','Successfully Updated.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}


}