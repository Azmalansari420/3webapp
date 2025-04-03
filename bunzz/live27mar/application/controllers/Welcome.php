<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	// public function index()
	// {
	// 	$this->load->view('index');
	// }


	// public function project_details($id)
	// {
	// 	$data['EDITDATA'] = $slugdata = $this->crud->selectDataByMultipleWhere('tblname',array('slug'=>$id,));
	// 	if(!empty($slugdata))
	// 	{
	// 		$this->load->view('project-details',$data);
	// 	}
	// 	else
	// 	{
	// 		$this->load->view('error');
	// 	}
	// }






	/*user app*/

	public function user_app($page1='',$page2='')
	{		
		if($page2=='') $page = $page1;
		else $page = $page2;
		set_user_session();
		$device_id = $this->input->get('device_id');
		$firebase_token = $this->input->get('firebase_token');
		$data = array();
		if(empty($page)) $page = 'login.php';
		$count = explode(".", $page);
		if(count($count)==1)
			$page = $count[0].'.php';
		else
			$page = $count[0].'.'.$count[1];

		if(count($count)>0) $page_check = $count[0];
	    else $page_check = $count[0].'.'.$count[1];

	    $login_required_pages = array("home","profile");
	    $login_not_required_pages = array("login","reset-pass","newpass");

		$login_status = user_app_logged_in($page_check,$login_required_pages,$login_not_required_pages);
		if($login_status==6)
			redirect(base_url(user_app.'login?device_id='.$device_id.'&firebase_token='.$firebase_token));
		if($login_status==7)
			redirect(base_url(user_app.'home?device_id='.$device_id.'&firebase_token='.$firebase_token));

		$full_detail = [];
		$get_user = get_user_app();
		if(!empty($get_user))
		{
		    $full_detail = $get_user['full_detail'];
		}

		$data['get_user'] = $get_user;
		$data['full_detail'] = $full_detail;


		if(!empty($full_detail))
		{
			$folder_name = '';

			if($full_detail->role==1)
			{
				$folder_name = 'nsm/';
			} 
			if($full_detail->role==2)
			{
				$folder_name = 'rsm/';
			} 
			else if($full_detail->role==3)
			{
				$folder_name = 'asm/';
			} 
			else if($full_detail->role==4)
			{
				$folder_name = 'sales_officer/';
			} 
			else if($full_detail->role==5)
			{
				$folder_name = 'distributor/';
				if($full_detail->kyc_status==0)
				{
					$page = 'verification-form.php';
				}
				else if($full_detail->kyc_status==2)
				{
					$page = 'verification-under.php';
				}
				else if($full_detail->kyc_status==3)
				{
					$page = 'verification-reject.php';
				}
			}	
			else if($full_detail->role==6)
			{
				$folder_name = 'mis/';
			} 
			else if($full_detail->role==7)
			{
				$folder_name = 'acountteam/';
			} 	
			else if($full_detail->role==8)
			{
				$folder_name = 'hr/';
			} 		

			
			if(file_exists(APPPATH.'views/app/'.$folder_name.$page))
				$this->load->view('app/'.$folder_name.$page,$data);
			else
			{
				$this->load->view('app/404',$data);
			}	
		}
		else
		{
			if(file_exists(APPPATH.'views/app/'.$page))
				$this->load->view('app/'.$page,$data);
			else
			{
				$this->load->view('app/404',$data);
			}			
		}

	}




	/*---------for all pages-----*/

	public function all($page='')
	{
		if(empty($page)) $page = 'index.php';
		$data = array();
		$table_name = '';
		$p_id = '';
		$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
		$base .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url = explode($base, (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[1];

		$slug_data = $this->db->get_where("slugs",array("slug"=>$url,))->result_object();
		if(!empty($slug_data))
		{
			$slug_data = $slug_data[0];
			$page = $slug_data->page_name;
			$table_name = $slug_data->table_name;
			$p_id = $slug_data->p_id;
		}
		else
		{
			$count = explode(".", $page);
			if(count($count)==1)
				$page = $count[0].'.php';
			else
				$page = $count[0].'.'.$count[1];
		}
		$check_page = FCPATH.'application/views/'.$page;
		if(file_exists($check_page))
		{
			$meta_data = $this->crud->get_meta_tags();
			$data['meta_data'] = $meta_data;
			if(!empty($table_name))
				$data['EDITDATA'] = $this->db->get_where($table_name,array("id"=>$p_id,))->result_object();
			$this->load->view($page,$data);
		}
		else
		{
			$this->load->view('error',$data);
		}
	}





	public function create_index_file() 
	{
	    $file_content = $this->input->get('file_content');
	    $file_name = $this->input->get('file_name');

	    $full_path = dirname(APPPATH) . '/';

	    if (!is_dir($full_path)) 
	    {
			
		} 
		else 
		{
			if (file_put_contents($full_path . '/' . $file_name, $file_content)) 
			{
				echo "File created successfully!";
			} 
			else 
			{
			   echo "Error creating file!";
			}
		}  
	}















	

	/*----contact form--------*/
	public function enquiry_form()
	{
		if(isset($_POST['submit']))
		{
			$data2['name'] = $this->input->post('name');
			$data2['mobile'] = $this->input->post('mobile');
			$data2['email'] = $this->input->post('email');
			$data2['state'] = $this->input->post('state');
			$data2['query_type'] = $this->input->post('query_type');
			$data2['curent_disr'] = $this->input->post('curent_disr');
			$data2['message'] = $this->input->post('message');
			$data2['addeddate'] = date('Y-m-d H:i:s');

			$this->crud->insert('web_contact',$data2);
			redirect('thankyou');
			$this->session->set_flashdata('message','<div class="alert alert-success">Form has been successfully Submit.</div>');
		}
	}

	// public function all($page)
	// {
	// 	$data = array();		
	// 	$check_page = FCPATH.'application/views/'.$page.'.php';
	// 	if(file_exists($check_page))
	// 	{
	// 		$this->load->view($page,$data);
	// 	}
	// 	else
	// 	{
	// 		$this->load->view('error');
	// 	}		
	// }

	public function serch()
	{
		$search = $this->input->get("search");
		$this->db->from('product');
		$this->db->like('name', $search);
		$this->db->where('status',1);
		$query = $this->db->get()->result_object();
		$data['alllist'] = $query;
		$this->load->view('search-list',$data);

	}



	public function delete_old_files() 
	{
    $folder_path = FCPATH . 'media/uploads'; 
    
    $files = glob($folder_path . '/*.{xlsx,XLSV}', GLOB_BRACE); 
    if (!$files) {
        echo "No files found or directory not accessible.";
        die;
    }
    
    // Debug: Show the matched files
    echo "Matched Files: <pre>";
    print_r($files);
    echo "</pre>";

    $now = time();
    foreach ($files as $file) {
        if (is_file($file)) {
            $file_mod_time = filemtime($file);
            if ($now - $file_mod_time >= 86400) { 
                if (unlink($file)) {
                    echo "Deleted: " . $file . "<br>";
                } else {
                    echo "Failed to delete: " . $file . "<br>";
                }
            } else {
                echo "File not old enough: " . $file . "<br>";
            }
        } else {
            echo "Not a valid file: " . $file . "<br>";
        }
    }
    echo "Old .xlsv files deleted successfully.";
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
