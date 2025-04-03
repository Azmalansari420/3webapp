<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rsm extends CI_Controller 
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
        $this->db->where('rsm_id', $user_id);

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









}