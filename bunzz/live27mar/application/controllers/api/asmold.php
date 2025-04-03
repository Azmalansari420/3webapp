<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Asm extends CI_Controller 
{


	/*update distributer*/

	function update_salesofficer()
	{
		$result = array();

		$firebase_token = $this->input->post('firebase_token');	
		$device_id = $this->input->post('device_id');
		
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$password = $this->input->post('password');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$status = $this->input->post('status');

		$user_id = $this->input->post('user_id');
		
		if(!empty($user_id))
		{
			$insertdata = array(
				"name"=>$name,
				"email"=>$email,
				"mobile"=>$mobile,
				"address"=>$address,
				"password"=>$password,
				"state"=>$state,
				"city"=>$city,
				"status"=>$status,
			);
			$this->db->where('id',$user_id);
			$this->db->update('users',$insertdata);

			$url = base_url('app/asm/sales-officer?device_id='.$device_id.'&firebase_token='.$firebase_token);

			$result['message']    = "Update Successfully.";
			$result['status']  = "200";
            $result['data']    = $insertdata;
            $result['url']    = $url;
		}
		else
		{
			$result['message'] = "ERROR.";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = '';
		}
		echo json_encode($result);

	}

	/*feedback*/

    public function commentfeedback()
    {
        $result = array();

        $user_id = $this->input->post("user_id");

        $name = $this->input->post("name");
        $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");
        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        $addeddate = date('Y-m-d H:i:s');

        if(!empty($user_id))
        {
            $data = array(                
                "user_id"=>$user_id,
                "name"=>$name,
                "mobile"=>$mobile,
                "email"=>$email,
                "subject"=>$subject,
                "message"=>$message,
            );
            $this->db->insert("contact",$data);

            $result['status']  = "200";
            $result['message'] = "Submit Successfully.";
            $result['data']  = $data;
        }
        else
        {
            $result['message'] = "User";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }



	    /*-----assign task---------*/
    public function assign_task()
    {
        $result = array();

        $user_id = $this->input->post("user_id");

        $device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");

        $sales_office_id = $this->input->post("sales_office_id");
        $task = $this->input->post("task");
        $addeddate = date('Y-m-d H:i:s');
        $status = 1;


        if(!empty($user_id))
        {
            $data = array(                
                "asm_id"=>$user_id,
                "sales_office_id"=>$sales_office_id,
                "task"=>$task,
                "addeddate"=>$addeddate,
                "status"=>$status,
            );
            $this->db->insert("monthlytarget",$data);

            $url = base_url('app/asm/monthly-target?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Task Assign Successfully.";
            $result['data']  = $data;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "User";
            $result['status']  = "400";
            $result['data']    = array();
            $result['url']    = array();
        }
        echo json_encode($result);
    }



	    /*-----update assign task---------*/
    public function update_assign_task()
    {
        $result = array();

        $user_id = $this->input->post("user_id");
        $get_id = $this->input->post("get_id");

        $device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");

        $sales_office_id = $this->input->post("sales_office_id");
        $task = $this->input->post("task");
        $modifieddate = date('Y-m-d H:i:s');
        $status = $this->input->post("status");


        if(!empty($user_id))
        {
            $data = array(                
                "asm_id"=>$user_id,
                "sales_office_id"=>$sales_office_id,
                "task"=>$task,
                "modifieddate"=>$modifieddate,
                "status"=>$status,
            );
            $this->db->update("monthlytarget",$data,array('id'=>$get_id));

            $url = base_url('app/asm/monthly-target?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Task Update Successfully.";
            $result['data']  = $data;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "User";
            $result['status']  = "400";
            $result['data']    = array();
            $result['url']    = array();
        }
        echo json_encode($result);
    }



    public function leadgerdata()
    {
        $user_id = $this->session->userdata("user")['id'];  

        // Retrieve form inputs
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $asm_id = $this->input->post('asm_id');
        $sales_officer_id = $this->input->post('sales_officer_id');
        $distributer_id = $this->input->post('distributer_id');

        // Prepare the query
        $this->db->select('
            id,
            asm_id,
            sales_office_id,
            state,
            city,
            user_id,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_1_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_2_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_3_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE) THEN after_discount_final_price ELSE 0 END) AS month_4_spent,
            SUM(after_discount_final_price) as total_spent
        ');
        $this->db->from('finalorder');
        $this->db->where('asm_id', $user_id);

        // Add date filters if provided
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
            $this->db->where("DATE(addeddate) <=", $to_date);
        }
        if (!empty($sales_officer_id)) {
            $this->db->where('sales_office_id', $sales_officer_id);
        }
        if (!empty($distributer_id)) {
            $this->db->where('user_id', $distributer_id);
        }
        // Add date filters if provided
        if (!empty($from_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where("DATE(addeddate) <=", $to_date);
        }

        // // Additional filters if they are set
        // if (!empty($asm_id)) {
        //     $this->db->where('asm_id', $asm_id);
        // }

        $this->db->group_by('user_id');
        $this->db->order_by('total_spent', 'DESC');
        
        $userorder = $this->db->get()->result();

        $dataPoints = [];
        foreach ($userorder as $order) 
        {
            $dataPoints[] = '<tr>
                              <td>'.empcode($order->sales_office_id).'</td>
                              <td>'.usersdetails($order->sales_office_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.empcode($order->user_id).'</td>
                              <td>'.distributerfirm($order->user_id).'</td>
                              <td>'.usersdetails($order->user_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.statename($order->state).'</td>
                              <td>'.cityname($order->city).'</td>
                              <td>'.$order->month_1_spent.'</td>
                              <td>'.$order->month_2_spent.'</td>
                              <td>'.$order->month_3_spent.'</td>
                              <td>'.$order->month_4_spent.'</td>
                              <td>'.$order->total_spent.'</td>
                            </tr>';
        }

        // Formulate response
        if (!empty($userorder)) {
            $result['status'] = "200";
            $result['message'] = "Data retrieved successfully.";
            $result['data'] = $dataPoints;
        } else {
            $result['message'] = "No data found.";
            $result['status'] = "400";
            $result['data'] = [];
        }

        echo json_encode($result);
    }







    public function salesdata()
    {
        $user_id = $this->session->userdata("user")['id'];  

        // Retrieve form inputs
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $asm_id = $this->input->post('asm_id');
        $sales_officer_id = $this->input->post('sales_officer_id');

        // Prepare the query
        $this->db->select('
            id,
            asm_id,
            sales_office_id,
            state,
            city,
            user_id,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_1_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_2_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_3_spent,
            SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE) THEN after_discount_final_price ELSE 0 END) AS month_4_spent,
            SUM(after_discount_final_price) as total_spent
        ');
        $this->db->from('finalorder');
        $this->db->where('asm_id', $user_id);

        // Add date filters if provided
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
            $this->db->where("DATE(addeddate) <=", $to_date);
        }
        // Add date filters if provided
        if (!empty($from_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
        }

        if (!empty($sales_officer_id)) {
            $this->db->where('sales_office_id', $sales_officer_id);
        }

        if (!empty($to_date)) {
            $this->db->where("DATE(addeddate) <=", $to_date);
        }

        // Additional filters if they are set
        if (!empty($asm_id)) {
            $this->db->where('asm_id', $asm_id);
        }

        $this->db->group_by('user_id');
        $this->db->order_by('total_spent', 'DESC');
        
        $userorder = $this->db->get()->result();

        $dataPoints = [];
        foreach ($userorder as $order) 
        {
            $dataPoints[] = '<tr>
                              <td>'.empcode($order->sales_office_id).'</td>
                              <td>'.usersdetails($order->sales_office_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.empcode($order->user_id).'</td>
                              <td>'.distributerfirm($order->user_id).'</td>
                              <td>'.usersdetails($order->user_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.statename($order->state).'</td>
                              <td>'.cityname($order->city).'</td>
                              <td>'.$order->month_1_spent.'</td>
                              <td>'.$order->month_2_spent.'</td>
                              <td>'.$order->month_3_spent.'</td>
                              <td>'.$order->month_4_spent.'</td>
                              <td>'.$order->total_spent.'</td>
                            </tr>';
        }

        // Formulate response
        if (!empty($userorder)) {
            $result['status'] = "200";
            $result['message'] = "Data retrieved successfully.";
            $result['data'] = $dataPoints;
        } else {
            $result['message'] = "No data found.";
            $result['status'] = "400";
            $result['data'] = [];
        }

        echo json_encode($result);
    }



    // public function leadgerdata()
    // {
    //     $user_id = $this->session->userdata("user")['id'];  

    //     // Retrieve form inputs
    //     $sales_officer_id = $this->input->post('sales_officer_id');
    //     $from_date = $this->input->post('from_date');
    //     $to_date = $this->input->post('to_date');

    //     // Prepare the query
    //     $this->db->select('user_id, SUM(after_discount_final_price) as total_spent');
    //     $this->db->from('finalorder');
    //     $this->db->where('asm_id', $user_id);

    //     if (!empty($sales_officer_id)) {
    //         $this->db->where('sales_office_id', $sales_officer_id);
    //     }

    //        // Add date filters if provided
    //     if (!empty($from_date) && !empty($to_date)) {
    //         $this->db->where("DATE(addeddate) >=", $from_date);
    //         $this->db->where("DATE(addeddate) <=", $to_date);
    //     }

    //     // Group by user ID
    //     $this->db->order_by('total_spent', 'DESC');
    //     $this->db->limit(5);
    //     $this->db->group_by('user_id');
    //     $userorder = $this->db->get()->result();

    //     // Prepare data points for response
    //     $dataPoints = [];
    //     foreach ($userorder as $order) {
    //         $dataPoints[] = [
    //             'user_id' => usersdetails($order->user_id),
    //             'total_spent' => floatval($order->total_spent) // Ensuring it's a float
    //         ];
    //     }

    //     // Formulate response
    //     if (!empty($userorder)) {
    //         $result['status'] = "200";
    //         $result['message'] = "Data retrieved successfully.";
    //         $result['data'] = $dataPoints;
    //     } else {
    //         $result['message'] = "No data found.";
    //         $result['status'] = "400";
    //         $result['data'] = [];
    //     }

    //     echo json_encode($result);
    // }




















}