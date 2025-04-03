<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Nsm extends CI_Controller 
{


	public function add_asm()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");

        // $user_id = generate_user_id();  

        $rsm_id = $this->input->post("rsm_id");
        $join_id = $rsm_id;
        $name = $this->input->post("name");
        $mobile = $this->input->post("mobile");
        $address = $this->input->post("address");
        $state = $this->input->post("state");
        $city = $this->input->post("city");
        $password = $this->input->post("password");
        $date_time = date('Y-m-d H:i:s');
        $role = 3;
        $status = 1;
        $user_id = generate_user_id();

        $email = $this->input->post("email");

        $user_email = $this->crud->selectDataByMultipleWhere('users',array('email'=>$email));
        if(empty($user_email))
        {
            $data = array(                
                "user_id"=>$user_id,
                "rsm_id"=>$rsm_id,
                "join_id"=>$join_id,
                "name"=>$name,
                "mobile"=>$mobile,
                "address"=>$address,
                "state"=>$state,
                "city"=>$city,
                "password"=>$password,
                "date_time"=>$date_time,
                "role"=>$role,
                "status"=>$status,
                "email"=>$email,
            );
            $this->db->insert("users",$data);
            $url = base_url('app/rsm/asm-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Add Successfully.";
            $result['data']  = $data;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "Email Already Registerd";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    /*update */
	public function update_asm()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");

		$id = $this->input->post('id');

        $rsm_id = $this->input->post("rsm_id");
        $name = $this->input->post("name");
        $mobile = $this->input->post("mobile");
        $address = $this->input->post("address");
        $state = $this->input->post("state");
        $city = $this->input->post("city");
        $password = $this->input->post("password");
        $date_time = date('Y-m-d H:i:s');
        $role = 3;
        $email = $this->input->post("email");
        $status = $this->input->post("status");


        if(!empty($id))
        {
            $data = array(                
                "rsm_id"=>$rsm_id,
                "name"=>$name,
                "mobile"=>$mobile,
                "address"=>$address,
                "state"=>$state,
                "city"=>$city,
                "password"=>$password,
                "date_time"=>$date_time,
                "role"=>$role,
                "status"=>$status,
                "email"=>$email,
            );
            $this->db->update("users",$data,array('id'=>$id));
            $url = base_url('app/rsm/asm-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Update Successfully.";
            $result['data']  = $data;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }


    /*show sales officer list*/

    public function saleofficerlist()
    {
    	$result = array();
    	$html = '';
    	$asm_id = $this->input->post('asm_id');

    	if (empty($asm_id)) {
	        $result['status'] = '400';
	        $result['message'] = 'ASM is required';
	        echo json_encode($result);
	        exit;
	    }

    
	    $this->db->order_by('id desc');
    	$user_history = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$asm_id,'role'=>4));

    	if(!empty($user_history))
    	{
    		$response_data['data'] = $user_history;
    		$html = $this->load->view('app/rsm/sale-offcer-card',$response_data,true);

    		$result['status'] = '200';
    		$result['message'] = 'SUCESS';
    		$result['data'] = $html;
    	}
    	else
    	{
    		$result['status'] = '400';
    		$result['message'] = 'Data Not Found';
    		$result['data'] = [];
    	}
    	echo json_encode($result);
    }


    /*update sale officer*/
    public function update_saleofficer()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
		$firebase_token = $this->session->userdata("firebase_token");

		$id = $this->input->post('id');

        $rsm_id = $this->input->post("rsm_id");
        $name = $this->input->post("name");
        $mobile = $this->input->post("mobile");
        $address = $this->input->post("address");
        $state = $this->input->post("state");
        $city = $this->input->post("city");
        $password = $this->input->post("password");
        $date_time = date('Y-m-d H:i:s');
        $email = $this->input->post("email");
        $status = $this->input->post("status");


        if(!empty($id))
        {
            $data = array(                
                "rsm_id"=>$rsm_id,
                "name"=>$name,
                "mobile"=>$mobile,
                "address"=>$address,
                "state"=>$state,
                "city"=>$city,
                "password"=>$password,
                "date_time"=>$date_time,
                "status"=>$status,
                "email"=>$email,
            );
            $this->db->update("users",$data,array('id'=>$id));
            $url = base_url('app/rsm/sale-officer.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Update Successfully.";
            $result['data']  = $data;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
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

        // print_r($distributer_id);
        // die;

        // Prepare the query
        $this->db->select('
            id,
            rsm_id,
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
        $this->db->where('nsm_id', $user_id);

        // Add date filters if provided
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
            $this->db->where("DATE(addeddate) <=", $to_date);
        }
        // Additional filters if they are set
        if (!empty($rsm_id)) {
            $this->db->where('rsm_id', $rsm_id);
        }
        // Additional filters if they are set
        if (!empty($asm_id)) {
            $this->db->where('asm_id', $asm_id);
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

      

        $this->db->group_by('user_id');
        $this->db->order_by('total_spent', 'DESC');
        
        $userorder = $this->db->get()->result();

        if (empty($userorder)) {
            echo json_encode(['status' => 400, 'message' => 'No data found']);
            return;
        }


        // Create Excel File
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'RSM EMP')
          ->setCellValue('B1', 'RSM Name')
          ->setCellValue('C1', 'RSM Contact')
          ->setCellValue('D1', 'ASM EMP')
          ->setCellValue('E1', 'ASM Name')
          ->setCellValue('F1', 'ASM Contact')
          ->setCellValue('G1', 'SO EMP')
          ->setCellValue('H1', 'SO Name')
          ->setCellValue('I1', 'SO Contact')
          ->setCellValue('J1', 'DS Code')
          ->setCellValue('K1', 'DS Componey Name')
          ->setCellValue('L1', 'DS Name')
          ->setCellValue('M1', 'DS Contact')
          ->setCellValue('N1', 'State')
          ->setCellValue('O1', 'Distric')
          ->setCellValue('P1', 'Month 1')
          ->setCellValue('Q1', 'Month 2')
          ->setCellValue('R1', 'Month 3')
          ->setCellValue('S1', 'Month 4')
          ->setCellValue('T1', 'Total Sale');

        $row = 2;
        foreach ($userorder as $order) {
            $sheet->setCellValue('A' . $row, empcode($order->rsm_id))
                  ->setCellValue('B' . $row, usersdetails($order->rsm_id))
                  ->setCellValue('C' . $row, usermobile($order->rsm_id))
                  ->setCellValue('D' . $row, empcode($order->asm_id))
                  ->setCellValue('E' . $row, usersdetails($order->asm_id))
                  ->setCellValue('F' . $row, usermobile($order->asm_id))
                  ->setCellValue('G' . $row, empcode($order->sales_office_id))
                  ->setCellValue('H' . $row, usersdetails($order->sales_office_id))
                  ->setCellValue('I' . $row, usermobile($order->sales_office_id))
                  ->setCellValue('J' . $row, empcode($order->user_id))
                  ->setCellValue('K' . $row, distributerfirm($order->user_id))
                  ->setCellValue('L' . $row, usersdetails($order->user_id))
                  ->setCellValue('M' . $row, usermobile($order->sales_office_id))
                  ->setCellValue('N' . $row, statename($order->state))
                  ->setCellValue('O' . $row, cityname($order->city))
                  ->setCellValue('P' . $row, $order->month_1_spent)
                  ->setCellValue('Q' . $row, $order->month_2_spent)
                  ->setCellValue('R' . $row, $order->month_3_spent)
                  ->setCellValue('S' . $row, $order->month_4_spent)
                  ->setCellValue('T' . $row, $order->total_spent);
            $row++;
        }

        $fileName = 'LedgerData_' . date('YmdHis') . '.xlsx';
        $filePath = FCPATH . 'media/uploads/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        echo json_encode(['status' => 200, 'file_url' => base_url('media/uploads/' . $fileName)]);

    }




   // public function leadgerdata()
   //  {
   //      $user_id = $this->session->userdata("user")['id'];  

   //      // Retrieve form inputs
   //      $from_date = $this->input->post('from_date');
   //      $to_date = $this->input->post('to_date');
   //      $asm_id = $this->input->post('asm_id');
   //      $sales_officer_id = $this->input->post('sales_officer_id');
   //      $distributer_id = $this->input->post('distributer_id');

   //      // Prepare the query
   //      $this->db->select('
   //          id,
   //          asm_id,
   //          sales_office_id,
   //          state,
   //          city,
   //          user_id,
   //          SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_1_spent,
   //          SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_2_spent,
   //          SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_3_spent,
   //          SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE) THEN after_discount_final_price ELSE 0 END) AS month_4_spent,
   //          SUM(after_discount_final_price) as total_spent
   //      ');
   //      $this->db->from('finalorder');
   //      $this->db->where('rsm_id', $user_id);

   //      // Add date filters if provided
   //      if (!empty($from_date) && !empty($to_date)) {
   //          $this->db->where("DATE(addeddate) >=", $from_date);
   //          $this->db->where("DATE(addeddate) <=", $to_date);
   //      }
   //      if (!empty($sales_officer_id)) {
   //          $this->db->where('sales_office_id', $sales_officer_id);
   //      }
   //      if (!empty($distributer_id)) {
   //          $this->db->where('user_id', $distributer_id);
   //      }
   //      // Add date filters if provided
   //      if (!empty($from_date)) {
   //          $this->db->where("DATE(addeddate) >=", $from_date);
   //      }

   //      if (!empty($to_date)) {
   //          $this->db->where("DATE(addeddate) <=", $to_date);
   //      }

   //      // Additional filters if they are set
   //      if (!empty($asm_id)) {
   //          $this->db->where('asm_id', $asm_id);
   //      }

   //      $this->db->group_by('user_id');
   //      $this->db->order_by('total_spent', 'DESC');
        
   //      $userorder = $this->db->get()->result();

   //      $dataPoints = [];
   //      foreach ($userorder as $order) 
   //      {
   //          $dataPoints[] = '<tr>
   //                            <td>'.empcode($order->asm_id).'</td>
   //                            <td>'.usersdetails($order->asm_id).'</td>
   //                            <td>'.usermobile($order->asm_id).'</td>
   //                            <td>'.empcode($order->sales_office_id).'</td>
   //                            <td>'.usersdetails($order->sales_office_id).'</td>
   //                            <td>'.usermobile($order->sales_office_id).'</td>
   //                            <td>'.empcode($order->user_id).'</td>
   //                            <td>'.distributerfirm($order->user_id).'</td>
   //                            <td>'.usersdetails($order->user_id).'</td>
   //                            <td>'.usermobile($order->sales_office_id).'</td>
   //                            <td>'.statename($order->state).'</td>
   //                            <td>'.cityname($order->city).'</td>
   //                            <td>'.$order->month_1_spent.'</td>
   //                            <td>'.$order->month_2_spent.'</td>
   //                            <td>'.$order->month_3_spent.'</td>
   //                            <td>'.$order->month_4_spent.'</td>
   //                            <td>'.$order->total_spent.'</td>
   //                          </tr>';
   //      }

   //      // Formulate response
   //      if (!empty($userorder)) {
   //          $result['status'] = "200";
   //          $result['message'] = "Data retrieved successfully.";
   //          $result['data'] = $dataPoints;
   //      } else {
   //          $result['message'] = "No data found.";
   //          $result['status'] = "400";
   //          $result['data'] = [];
   //      }

   //      echo json_encode($result);
   //  }




   









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
        $this->db->where('rsm_id', $user_id);

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
                              <td>'.empcode($order->asm_id).'</td>
                              <td>'.usersdetails($order->asm_id).'</td>
                              <td>'.usermobile($order->asm_id).'</td>
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






    /*skudata*/

   public function skudata()
    {
        $user_id = $this->session->userdata("user")['id'];  

        // Retrieve form inputs
        $category = $this->input->post('category');
        $sku_code = $this->input->post('sku_code');
        $asm_id = $this->input->post('asm_id');
        $sales_officer_id = $this->input->post('sales_officer_id');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        // Prepare the query
        $this->db->select('
            sku_code,
            name,
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
        $this->db->from('orders');
        $this->db->where('rsm_id', $user_id);

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
        // Additional filters if they are set
        if (!empty($category)) {
            echo "string";
            $this->db->where('name', $category);
        }

        // Additional filters if they are set
        if (!empty($sku_code)) {
            $this->db->where('sku_code', $sku_code);
        }

        // $this->db->group_by('user_id');
        // $this->db->order_by('total_spent', 'DESC');
        
        $userorder = $this->db->get()->result();

        $dataPoints = [];
        foreach ($userorder as $order) 
        {
            $dataPoints[] = '<tr>
                              <td>'.empcode($order->asm_id).'</td>
                              <td>'.usersdetails($order->asm_id).'</td>
                              <td>'.usermobile($order->asm_id).'</td>
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




    public function distributerwallet()
    {
        $user_id = $this->session->userdata("user")['id'];  

        $asm_id = $this->input->post('asm_id');
        $sales_officer_id = $this->input->post('sales_officer_id');
        // $distributer_id = $this->input->post('distributer_id');

        // Prepare the query
        $this->db->select('
            id,
            asm_id,
            sales_office_id,
            state,
            city,
            user_id,
             SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE) AND YEAR(addeddate) = YEAR(CURRENT_DATE) THEN after_discount_final_price ELSE 0 END) AS month_spent,
        ');
        $this->db->from('finalorder');
        $this->db->where('nsm_id', $user_id);

        // // Add date filters if provided
        // if (!empty($from_date) && !empty($to_date)) {
        //     $this->db->where("DATE(addeddate) >=", $from_date);
        //     $this->db->where("DATE(addeddate) <=", $to_date);
        // }
        if (!empty($sales_officer_id)) {
            $this->db->where('sales_office_id', $sales_officer_id);
        }
        // if (!empty($distributer_id)) {
        //     $this->db->where('user_id', $distributer_id);
        // }
        // Add date filters if provided
        // if (!empty($from_date)) {
        //     $this->db->where("DATE(addeddate) >=", $from_date);
        // }

        // if (!empty($to_date)) {
        //     $this->db->where("DATE(addeddate) <=", $to_date);
        // }

        // Additional filters if they are set
        if (!empty($asm_id)) {
            $this->db->where('asm_id', $asm_id);
        }
        $this->db->group_by('user_id');

        
        $userorder = $this->db->get()->result();

        $dataPoints = [];
        foreach ($userorder as $order) 
        {
            $dataPoints[] = '<tr>
                              <td>'.empcode($order->asm_id).'</td>
                              <td>'.usersdetails($order->asm_id).'</td>
                              <td>'.usermobile($order->asm_id).'</td>
                              <td>'.empcode($order->sales_office_id).'</td>
                              <td>'.usersdetails($order->sales_office_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.empcode($order->user_id).'</td>
                              <td>'.distributerfirm($order->user_id).'</td>
                              <td>'.usersdetails($order->user_id).'</td>
                              <td>'.usermobile($order->sales_office_id).'</td>
                              <td>'.statename($order->state).'</td>
                              <td>'.cityname($order->city).'</td>
                              <td>'.currency_simble($order->month_spent).'</td>
                              <td>'.walletamt($order->user_id).'</td>
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




























 public function statewisedata()
    {
        $user_id = $this->session->userdata("user")['id'];  

        // Retrieve form inputs
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $state = $this->input->post('state');
        
        // Prepare the query
        $this->db->select('city,state,user_id, SUM(after_discount_final_price) as total_spent');
        $this->db->from('finalorder');
        $this->db->where('rsm_id', $user_id);

        // Add date filters if provided
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
            $this->db->where("DATE(addeddate) <=", $to_date);
        }

        // Add additional filters if they are set
        if (!empty($state)) {
            $this->db->where('state', $state);
        }
        // Add additional filters if they are set
        if (!empty($from_date)) {
            $this->db->where("DATE(addeddate) >=", $from_date);
        }
        // Add additional filters if they are set
        if (!empty($to_date)) {
            $this->db->where("DATE(addeddate) <=", $to_date);
        }

       

        // Group by user ID
        $this->db->group_by('user_id');
        $this->db->order_by('total_spent', 'DESC');
        $this->db->limit(5);
        $userorder = $this->db->get()->result();
        
        $dataPoints = [];
        $i=0;
        foreach ($userorder as $order) {
            // print_r($order);
            $i++;
            $dataPoints[] = "<tr>
                        <td>".userdetails($order->user_id)."</td>
                        <td>".cityname($order->city)."</td>
                        <td>".$i."</td>
                        <td>".$order->total_spent."</td>
                    </tr>";
        }

      
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




/*--show sales officer list--*/
    function showsalesofficer_list()
    {
        $result = array();
        $html = '<option Selected value="">--Select--</option>';
        $id = $this->input->post('id');
        $city = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$id,'role'=>4));
        if(!empty($city))
        {
            foreach($city as $value)
            {
                $html .= "<option value='".$value->id."'>".$value->name."</option>";
            }

        $result['message']    = "Success";
                $result['status']  = "200";
        $result['data']    = $html;
        }
        else
        {
            $result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $html;
        }
        echo json_encode($result);
    }


/*--show sales officer list--*/
    function showdistributer_list()
    {
        $result = array();
        $html = '<option Selected value="">--Select--</option>';
        $id = $this->input->post('id');
        $city = $this->crud->selectDataByMultipleWhere('users',array('sales_office_id'=>$id,'role'=>5));
        if(!empty($city))
        {
            foreach($city as $value)
            {
                $html .= "<option value='".$value->id."'>".$value->name."</option>";
            }

        $result['message']    = "Success";
                $result['status']  = "200";
        $result['data']    = $html;
        }
        else
        {
            $result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $html;
        }
        echo json_encode($result);
    }


   public function distributerleadgerdata()
    {
        $user_id = $this->session->userdata("user")['id'];  
       

        $user_id = $this->input->get('user_id');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');

        $device_id = $this->input->get('device_id');
        $firebase_token = $this->input->get('firebase_token');

        $this->db->where("DATE(add_date_time)>='$from_date'");
        $this->db->where("DATE(add_date_time)<='$to_date'");
        $data['userorder'] = $this->crud->selectDataByMultipleWhere('user_history',array('user_id'=>$user_id));
        // redirect(base_url('app/distributor/ledger'));
        $this->load->view('app/distributor/ledger',$data);
        
    }






    /*Add Target*/

    public function add_target()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $nsm_id = $this->input->post("nsm_id");

        $target_type = $this->input->post("target_type");
        $sku_code = $this->input->post("sku_code");
        $rsm_id = $this->input->post("rsm_id");
        $title = $this->input->post("title");
        $type = $this->input->post("type");
        $amount = $this->input->post("amount");
        $message_to_rsm = $this->input->post("message_to_rsm");
        $status = 1;
        $addeddate = date('Y-m-d H:i:s');
        
        $insertdata = array(                
                        "nsm_id"=>$nsm_id,
                        "target_type"=>$target_type,
                        "sku_code"=>$sku_code,
                        "rsm_id"=>$rsm_id,
                        "title"=>$title,
                        "type"=>$type,
                        "amount"=>$amount,
                        "message_to_rsm"=>$message_to_rsm,
                        "status"=>$status,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($insertdata))
        {
            $this->db->insert('target',$insertdata);
            $url = base_url('app/rsm/target-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Add Successfully.";
            $result['data']  = $insertdata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

    public function upadate_target()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");
        $target_type = $this->input->post("target_type");
        $sku_code = $this->input->post("sku_code");
        $nsm_id = $this->input->post("nsm_id");
        $rsm_id = $this->input->post("rsm_id");
        $title = $this->input->post("title");
        $type = $this->input->post("type");
        $amount = $this->input->post("amount");
        $message_to_rsm = $this->input->post("message_to_rsm");
        // $status = 1;
        $modifieddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "nsm_id"=>$nsm_id,
                        "target_type"=>$target_type,
                        "sku_code"=>$sku_code,
                        "rsm_id"=>$rsm_id,
                        "title"=>$title,
                        "type"=>$type,
                        "amount"=>$amount,
                        "message_to_rsm"=>$message_to_rsm,
                        // "status"=>$status,
                        "modifieddate"=>$modifieddate,
                    );
        
        if(!empty($updatedata))
        {   
            $this->db->where('id',$id);
            $this->db->update('target',$updatedata);
            $url = base_url('app/rsm/target-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Upadate Successfully.";
            $result['data']  = $updatedata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }


    public function delete_target()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");
        // print_r($id);
                
        if(!empty($id))
        {   
            $this->db->delete('target',array('id'=>$id));
            // die;
            $url = base_url('app/nsm/target-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Delete Successfully.";
            $result['data']  = $id;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }







    /*schema*/
    public function add_schema()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $nsm_id = $this->input->post("nsm_id");
        $name = $this->input->post("name");
        $status = $this->input->post("status");
        $addeddate = date('Y-m-d H:i:s');

        if (isset($_FILES['pdf'])) 
        {
            $images_name = $_FILES['pdf']['name'];
            $images_temp = $_FILES['pdf']['tmp_name'];
            $path = 'media/uploads/scheme/'.$images_name;
            move_uploaded_file($_FILES['pdf']['tmp_name'],$path);
            $pdf = time().$images_name;
            // ...
        } else {
            $pdf = "";
        }
        
        $insertdata = array(                
                        "nsm_id"=>$nsm_id,
                        "name"=>$name,
                        "pdf"=>$pdf,
                        "status"=>$status,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($insertdata))
        {
            $this->db->insert('scheme',$insertdata);
            $url = base_url('app/nsm/scheme-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Add Successfully.";
            $result['data']  = $insertdata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

     public function update_schema()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");
        $nsm_id = $this->input->post("nsm_id");
        $name = $this->input->post("name");
        $status = $this->input->post("status");
        $modifieddate = date('Y-m-d H:i:s');

        $oldpdf = $this->input->post('oldpdf');
        if (isset($_FILES['pdf'])) 
        {
            $images_name = $_FILES['pdf']['name'];
            $images_temp = $_FILES['pdf']['tmp_name'];
            $path = 'media/uploads/scheme/'.$images_name;
            move_uploaded_file($_FILES['pdf']['tmp_name'],$path);
            $pdf = time().$images_name;
            // ...
        } else {
            $pdf = $oldpdf;
        }
        
        $insertdata = array(                
                        "nsm_id"=>$nsm_id,
                        "name"=>$name,
                        "pdf"=>$pdf,
                        "status"=>$status,
                        "modifieddate"=>$modifieddate,
                    );
        
        if(!empty($insertdata))
        {   
            $this->db->where('id',$id);
            $this->db->update('scheme',$insertdata);
            $url = base_url('app/nsm/scheme-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Update Successfully.";
            $result['data']  = $insertdata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }


    public function delete_schema()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");
        // print_r($id);
                
        if(!empty($id))
        {   
            $this->db->delete('scheme',array('id'=>$id));
            $url = base_url('app/nsm/scheme-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['status']  = "200";
            $result['message'] = "Delete Successfully.";
            $result['data']  = $id;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }






    /*add update notice*/

    public function upadate_notice()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");

        $nsm_id = $this->input->post("nsm_id");
        $rsm_id = $this->input->post("rsm_id");
        $message = $this->input->post("message");
        $modifieddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "nsm_id"=>$nsm_id,
                        "asm_id"=>$rsm_id,
                        "message"=>$message,
                        "modifieddate"=>$modifieddate,
                    );
        
        if(!empty($updatedata))
        {   
            if(!empty($id))
            {
                $this->db->where('id',$id);
                $this->db->update('warning_asm',$updatedata);
                $result['message'] = "Upadate Successfully.";
            }
            else
            {
                $this->db->insert('warning_asm',$updatedata);
                $result['message'] = "Insert Successfully.";
            }

            $url = base_url('app/nsm/notice-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
            $result['status']  = "200";            
            $result['data']  = $updatedata;
            $result['url']  = $url;
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = array();
        }
        echo json_encode($result);
    }

























}