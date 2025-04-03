<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sales_officer extends CI_Controller 
{





	public function filter_kyc_data()
	{
		$sales_office_id = $this->session->userdata("user")['id'];  
		$device_id = $this->input->get('device_id');
		$firebase_token = $this->input->get('firebase_token');
  

		$state = $this->input->get('state');
		$city = $this->input->get('city');
		$status = $this->input->get('status');

		if(!empty($state) && !empty($city) && !empty($status))
		{
			$data['userorder'] = $this->crud->selectDataByMultipleWhere('kyc_records',array('sales_office_id'=>$sales_office_id,'state'=>$state,'city'=>$city,'status'=>$status));
		}
		else if(!empty($state) && !empty($city))
		{
			$data['userorder'] = $this->crud->selectDataByMultipleWhere('kyc_records',array('sales_office_id'=>$sales_office_id,'state'=>$state,'city'=>$city));
		}
		else if(!empty($status))
		{
			$data['userorder'] = $this->crud->selectDataByMultipleWhere('kyc_records',array('sales_office_id'=>$sales_office_id,'status'=>$status,));
		}
		else
		{
			$data['userorder'] = $this->crud->selectDataByMultipleWhere('kyc_records',array('sales_office_id'=>$sales_office_id,));
		}
		$this->load->view('app/sales_officer/search-filter',$data);
		
	}




    public function leadgerdata()
{
    $user_id = $this->session->userdata("user")['id'];  
    $from_date = $this->input->post('from_date');
    $to_date = $this->input->post('to_date');
    $distributer_id = $this->input->post('distributer_id');

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
    $this->db->where('sales_office_id', $user_id);

    if (!empty($from_date) && !empty($to_date)) {
        $this->db->where("DATE(addeddate) >=", $from_date);
        $this->db->where("DATE(addeddate) <=", $to_date);
    }

    if (!empty($distributer_id)) {
        $this->db->where('user_id', $distributer_id);
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

    // Set Header
    $sheet->setCellValue('A1', 'DS Code')
          ->setCellValue('B1', 'DS Company Name')
          ->setCellValue('C1', 'DS Name')
          ->setCellValue('D1', 'DS Contact')
          ->setCellValue('E1', 'State')
          ->setCellValue('F1', 'District')
          ->setCellValue('G1', 'Month 1')
          ->setCellValue('H1', 'Month 2')
          ->setCellValue('I1', 'Month 3')
          ->setCellValue('J1', 'Month 4')
          ->setCellValue('K1', 'Total Sale');

    // Fill Data
    $row = 2;
    foreach ($userorder as $order) {
        $sheet->setCellValue('A' . $row, empcode($order->user_id))
              ->setCellValue('B' . $row, distributerfirm($order->user_id))
              ->setCellValue('C' . $row, usersdetails($order->user_id))
              ->setCellValue('D' . $row, usermobile($order->sales_office_id))
              ->setCellValue('E' . $row, statename($order->state))
              ->setCellValue('F' . $row, cityname($order->city))
              ->setCellValue('G' . $row, $order->month_1_spent)
              ->setCellValue('H' . $row, $order->month_2_spent)
              ->setCellValue('I' . $row, $order->month_3_spent)
              ->setCellValue('J' . $row, $order->month_4_spent)
              ->setCellValue('K' . $row, $order->total_spent);
        $row++;
    }

    // Save Excel File
    $fileName = 'LedgerData_' . date('YmdHis') . '.xlsx';
    $filePath = FCPATH . 'media/uploads/' . $fileName;

    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);

    echo json_encode(['status' => 200, 'file_url' => base_url('media/uploads/' . $fileName)]);
}









    
    public function add_upadate_raise()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");

        $distributer_id = $this->input->post("distributer_id");
        $issue_type = $this->input->post("issue_type");
        $message = $this->input->post("message");
        $status = $this->input->post("status");
        $reply_message = $this->input->post("reply_message");
        $addeddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "distributer_id"=>$distributer_id,
                        "issue_type"=>$issue_type,
                        "message"=>$message,
                        "status"=>$status,
                        "reply_message"=>$reply_message,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($updatedata))
        {   
            if(!empty($id))
            {
                $this->db->where('id',$id);
                $this->db->update('raise_distributer_to_so',$updatedata);
                $result['message'] = "Upadate Successfully.";
            }
            else
            {
                $this->db->insert('raise_distributer_to_so',$updatedata);
                $result['message'] = "Insert Successfully.";
            }

            $url = base_url('app/distributor/raise-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
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





    
    public function esclatethis()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $asm_id = $this->input->post("asm_id");
        $so_id = $this->input->post("so_id");
        $issue_type = $this->input->post("issue_type");
        $message = $this->input->post("message");
        $status = $this->input->post("status");
        $addeddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "asm_id"=>$asm_id,
                        "so_id"=>$so_id,
                        "issue_type"=>$issue_type,
                        "message"=>$message,
                        "status"=>$status,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($updatedata))
        {   
            if(!empty($id))
            {
                $this->db->where('id',$id);
                $this->db->update('raise_so_to_asm',$updatedata);
                $result['message'] = "Upadate Successfully.";
            }
            else
            {
                $this->db->insert('raise_so_to_asm',$updatedata);
                $result['message'] = "Send Successfully.";
            }

            $url = base_url('app/distributor/raise-my-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
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








    public function my_add_upadate_raise()
    {
        $result = array();

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 

        $id = $this->input->post("id");

        $so_id = $this->input->post("so_id");
        $asm_id = $this->input->post("asm_id");
        $issue_type = $this->input->post("issue_type");
        $message = $this->input->post("message");
        $addeddate = date('Y-m-d H:i:s');
        
        $updatedata = array(                
                        "so_id"=>$so_id,
                        "asm_id"=>$asm_id,
                        "issue_type"=>$issue_type,
                        "message"=>$message,
                        "status"=>1,
                        "addeddate"=>$addeddate,
                    );
        
        if(!empty($updatedata))
        {   
            if(!empty($id))
            {
                $this->db->where('id',$id);
                $this->db->update('raise_so_to_asm',$updatedata);
                $result['message'] = "Upadate Successfully.";
            }
            else
            {
                $this->db->insert('raise_so_to_asm',$updatedata);
                $result['message'] = "Insert Successfully.";
            }

            $url = base_url('app/distributor/raise-my-list.php?device_id='.$device_id.'&firebase_token='.$firebase_token);
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























// $user_id = $this->session->userdata("user")['id'];  

        // // Retrieve form inputs
        // $from_date = $this->input->post('from_date');
        // $to_date = $this->input->post('to_date');
        // // $asm_id = $this->input->post('asm_id');
        // // $sales_officer_id = $this->input->post('sales_officer_id');
        // $distributer_id = $this->input->post('distributer_id');

        // // Prepare the query
        // $this->db->select('
        //     id,
        //     asm_id,
        //     sales_office_id,
        //     state,
        //     city,
        //     user_id,
        //     SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_1_spent,
        //     SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_2_spent,
        //     SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) THEN after_discount_final_price ELSE 0 END) AS month_3_spent,
        //     SUM(CASE WHEN MONTH(addeddate) = MONTH(CURRENT_DATE) THEN after_discount_final_price ELSE 0 END) AS month_4_spent,
        //     SUM(after_discount_final_price) as total_spent
        // ');
        // $this->db->from('finalorder');
        // $this->db->where('sales_office_id', $user_id);

        // // Add date filters if provided
        // if (!empty($from_date) && !empty($to_date)) {
        //     $this->db->where("DATE(addeddate) >=", $from_date);
        //     $this->db->where("DATE(addeddate) <=", $to_date);
        // }
        // // if (!empty($sales_officer_id)) {
        // //     $this->db->where('sales_office_id', $sales_officer_id);
        // // }
        // if (!empty($distributer_id)) {
        //     $this->db->where('user_id', $distributer_id);
        // }
        // // Add date filters if provided
        // if (!empty($from_date)) {
        //     $this->db->where("DATE(addeddate) >=", $from_date);
        // }

        // if (!empty($to_date)) {
        //     $this->db->where("DATE(addeddate) <=", $to_date);
        // }

        // // // Additional filters if they are set
        // // if (!empty($asm_id)) {
        // //     $this->db->where('asm_id', $asm_id);
        // // }

        // $this->db->group_by('user_id');
        // $this->db->order_by('total_spent', 'DESC');
        
        // $userorder = $this->db->get()->result();

        // $dataPoints = [];
        // foreach ($userorder as $order) 
        // {
        //     $dataPoints[] = '<tr>
        //                       <td>'.empcode($order->user_id).'</td>
        //                       <td>'.distributerfirm($order->user_id).'</td>
        //                       <td>'.usersdetails($order->user_id).'</td>
        //                       <td>'.usermobile($order->sales_office_id).'</td>
        //                       <td>'.statename($order->state).'</td>
        //                       <td>'.cityname($order->city).'</td>
        //                       <td>'.$order->month_1_spent.'</td>
        //                       <td>'.$order->month_2_spent.'</td>
        //                       <td>'.$order->month_3_spent.'</td>
        //                       <td>'.$order->month_4_spent.'</td>
        //                       <td>'.$order->total_spent.'</td>
        //                     </tr>';
        // }

        // // Formulate response
        // if (!empty($userorder)) {
        //     $result['status'] = "200";
        //     $result['message'] = "Data retrieved successfully.";
        //     $result['data'] = $dataPoints;
        // } else {
        //     $result['message'] = "No data found.";
        //     $result['status'] = "400";
        //     $result['data'] = [];
        // }

        // echo json_encode($result);

	// public function leadgerdata()
    // {
    //     $user_id = $this->session->userdata("user")['id'];  

    //     // Retrieve form inputs
    //     $distributer_id = $this->input->post('distributer_id');
    //     $from_date = $this->input->post('from_date');
    //     $to_date = $this->input->post('to_date');

    //     // Prepare the query
    //     $this->db->select('user_id, SUM(after_discount_final_price) as total_spent');
    //     $this->db->from('finalorder');
    //     $this->db->where('sales_office_id', $user_id);

    //     if (!empty($distributer_id)) {
    //         $this->db->where('user_id', $distributer_id);
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