<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('index');
	}


	public function project_details($id)
	{
		$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('tblname',array('slug'=>$id,));
		if(!empty($slugdata))
		{
			$this->load->view('project-details',$data);
		}
		else
		{
			$this->load->view('error');
		}
	}











	/*---------for all pages-----*/
	public function all($page)
	{
		$data = array();		
		$check_page = FCPATH.'application/views/'.$page.'.php';
		if(file_exists($check_page))
		{
			$this->load->view($page,$data);
		}
		else
		{
			$this->load->view('error');
		}		
	}



	

	/*----contact form--------*/
	public function enquiry_form()
	{
		if(isset($_POST['submit']))
		{
			$data2['name'] = $this->input->post('name');
			$data2['email'] = $this->input->post('email');
			$data2['mobile'] = $this->input->post('mobile');
			$data2['subject'] = $this->input->post('subject');
			$data2['message'] = $this->input->post('message');

			$this->crud->insert('contact',$data2);
			redirect('thankyou');
			$this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');
		}
	}





    public function upcomming_list()
    {
         $html = '';
         $page = $this->input->post("page");
         $id = $this->input->post("id");
         $limit = 500;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }

        $full_detail = [];

        $datetime = date('Y-m-d H:i:s');
        $this->db->limit($limit,$offset);
        $this->db->order_by('match_date_time asc');
        $data = $this->db->get_where('matches',array('game_id'=>$id,'status'=>0,))->result_object();


         if(!empty($data))
         {
            $response_data['data1'] = $data;
            $response_data['full_detail'] = $full_detail;
            $html = $this->load->view("app/user/include/e-card",$response_data,true);
            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }


	
    public function ongoing_list()
    {
         $html = '';
         $page = $this->input->post("page");
         $id = $this->input->post("id");
         $limit = 15;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }

        $full_detail = [];

        $datetime = date('Y-m-d H:i:s');
        $this->db->limit($limit,$offset);
        $this->db->order_by('match_date_time asc');
        $data = $this->db->get_where('matches',array('game_id'=>$id,'status'=>1,))->result_object();


         if(!empty($data))
         {
            $response_data['data1'] = $data;
            $response_data['full_detail'] = $full_detail;
            $html = $this->load->view("app/user/include/e-card-ongoing",$response_data,true);
            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }
	


	
    public function result_list()
    {
         $html = '';
         $page = $this->input->post("page");
         $id = $this->input->post("id");
         $limit = 10;
         $offset = 0;
         if($page>0)
         {
            $offset = $page*$limit;
         }

         $full_detail = [];

        $datetime = date('Y-m-d H:i:s');
        $this->db->limit($limit,$offset);
        $this->db->order_by('id desc');
        $data = $this->db->get_where('matches',array('game_id'=>$id,'status'=>2,))->result_object();


         if(!empty($data))
         {
            $response_data['data1'] = $data;
            $response_data['full_detail'] = $full_detail;
            $html = $this->load->view("app/user/include/e-card-result",$response_data,true);
            

            $result['message'] = "Successfully...";
            $result['status']  = "200";
            $result['data']    = $html;
         }
         else
         {
            $result['message'] = "";
            $result['status']  = "400";
            $result['data']    = [];
         }
         echo json_encode($result);
    }
	






	// public function contact()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		$data2['name'] = $this->input->post('name');
	// 		$data2['email'] = $this->input->post('email');
	// 		$data2['mobile'] = $this->input->post('mobile');
	// 		$data2['subject'] = $this->input->post('subject');
	// 		$data2['regarding'] = $this->input->post('regarding');
	// 		$data2['message'] = $this->input->post('message');

	// 		$this->crud->insert('contact',$data2);

	// 		// $message = '
    //     <h3 align="center"> Form Details</h3>
    //     <table border="1" width="100%" cellpadding="5" cellspacing="5">
    //       <tr>
    //         <td width="30%"> Name</td>
    //         <td width="70%">'.$_POST["name"].'</td>
    //       </tr>
    //       <tr>
    //         <td width="30%">Phone</td>
    //         <td width="70%">'.$_POST["phone"].'</td>
    //       </tr>
    //       <tr>
    //         <td width="30%">Email</td>
    //         <td width="70%">'.$_POST["email"].'</td>
    //       </tr>
    //        <tr>
    //         <td width="30%">Subject</td>
    //         <td width="70%">'.$_POST["subject"].'</td>
    //       </tr>
    //        <tr>
    //         <td width="30%">Message</td>
    //         <td width="70%">'.$_POST["message"].'</td>
    //       </tr>
          
    //     </table>
    //   ';

	// 	  $this->webmail->sendmail($message);

	// 	  $this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');

	// 	}
	// 	$this->load->view('contact');
	// }




	// public function career_form()
	// {
	// 	if(isset($_POST['submit']))
	// 	{
	// 		if($_FILES['image']['name']!='')
	// 		{
	// 			$bimage = $_FILES['image']['name'];
	// 			$path = 'media/uploads/career/'.$bimage;
	// 			move_uploaded_file($_FILES['image']['tmp_name'],$path);
	// 		}
	// 		else
	// 		{
	// 			$bimage = "";
	// 		}
	// 		$data['image'] = $bimage;
	// 		$data['name'] = $this->input->post('name');			
	// 		$data['email'] = $this->input->post('email');			
	// 		$data['mobile'] = $this->input->post('mobile');			
	// 		$data['job_profile'] = $this->input->post('job_profile');			
	// 		$data['message'] = $this->input->post('message');

	// 		$this->crud->insert('career',$data);
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	}

	// }











}
