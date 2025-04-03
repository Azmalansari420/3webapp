<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
     

//------Registration



    public function token_session($user)
    {        
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        $password = $this->input->post('password');
        $date_time = date("Y-m-d H:i:s");
        $token_data = array("user_id"=>$user->id,"password"=>$user->password,"hours"=>token_hours,"date_time"=>$date_time,"role"=>$user->role,"device_id"=>$device_id,);
        $access_token = encode_token($token_data);
        $password = $user->password;

        $login_detail = array(
            "user_id"=>$user->id,
            "role"=>$user->role,
            "ip_address"=>$_SERVER['REMOTE_ADDR'],
            "date"=>date("Y-m-d"),
            "time"=>date("H:i:s"),
            "status"=>1,
            "device_id"=>$device_id,
            "password"=>$password,
            "firebase_token"=>$firebase_token,
            "access_token"=>$access_token,
        );
        $this->db->insert("login_history",$login_detail);
        $data = array(
            "user"=>array("id"=>$user->id,"role"=>$user->role,"password"=>$user->password,),
        );
        $this->session->set_userdata($data);
        $this->session->set_userdata(array("access_token"=>$access_token,));
        return $access_token;
    }







function registration()
{
    $result = array();
    // $image = 'user.png';

    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $qualification = $this->input->post('qualification');
    $adhar = $this->input->post('adhar');
    $dob = $this->input->post('dob');
    $mobile = $this->input->post('mobile');
    $alt_mobile = $this->input->post('alt_mobile');
    $password = $this->input->post('password');
    $status = 1;
    $role = 1;
    $addeddate = date('Y-m-d H:i:s');

    if (isset($_FILES['image'])) {
            $images_name = $_FILES['image']['name'];
            $images_temp = $_FILES['image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['image']['tmp_name'],$path);
            $image = $images_name;
            // ...
        } else {
            $image = "";
        }
    
    $user_data = array(
        "image" => $image,
        "name" => $name,
        "email" => $email,
        "qualification" => $qualification,
        "adhar" => $adhar,
        "dob" => $dob,
        "mobile" => $mobile,
        "alt_mobile" => $alt_mobile,
        "password" => $password,
        "role" => $role,
        "status" => $status,
    );
    $registerdata = $this->db->get_where('registration',array('mobile'=>$mobile,))->result_object();
    if(empty($registerdata))
    {
        if($this->db->insert('registration',$user_data))
        {
            $result['message'] = "Registration Successfully Done...";
            $result['status'] = "200";
            $result['data'] = $user_data;
        }
        else
        {
            $result['message'] = "Something Wrong..";
            $result['status']  = "400";
            $result['data']    = $user_data;
        }
    }
    else
    {
        $result['message'] = "Already Mobile Registerd.";
        $result['status']  = "400";
        $result['data']    = array();
    }

    echo json_encode($result);
}

/*user login*/

    function user_login()
    {
        $result = array();
        $access_token = '';
        $url = '';
        $device_id = $this->input->post('device_id');
        $firebase_token = $this->input->post('firebase_token');
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        
        $user_data = array(
            "firebase_token" => $firebase_token,  
            "device_id" => $device_id,  
            "mobile" => $mobile,
            "password" => $password,
        );

        $registerdata = $this->db->get_where('registration',array('mobile'=>$mobile,'password'=>$password,'status'=>1,))->result_object();

        if(!empty($registerdata))
        {   
            $registerdata = $registerdata[0];
            $access_token = $this->token_session($registerdata);

            if($registerdata->role==1)
            {
                if($registerdata->plant_info==1)
                {
                    $url = base_url(user_app.'home.php?device_id='.$this->session->userdata('device_id').'&firebase_token='.$firebase_token);
                }
                else
                {
                    $url = base_url(user_app.'plant-information.php?device_id='.$this->session->userdata('device_id').'&firebase_token='.$firebase_token);
                }
            }
            else
            {
                $url = base_url(user_app.'home?device_id='.$this->session->userdata('device_id').'&firebase_token='.$firebase_token);
            }

            $result['message'] = "Login Successfully Done...";
            $result['status'] = "200";
            $result['data'] = $user_data;   
            $result['access_token'] = $access_token;   
            $result['url'] = $url;   
        }
        else
        {
            $result['message'] = "Wrong Mobile No or Password..";
            $result['status']  = "400";
            $result['data']    = $user_data;
            $result['url']    = $url;
        }
        echo json_encode($result);
    }



    function user_profile_update()
    {
        $updatedata = array();
        $result = array();

        $user = getuserdata();
        $user_id = $user[0]->id;

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $qualification = $this->input->post('qualification');
        $adhar = $this->input->post('adhar');
        $dob = $this->input->post('dob');
        $mobile = $this->input->post('mobile');
        $gender = $this->input->post('gender');
        $password = $this->input->post('password');

        $updatedata = array(
            "name"=>$name,
            "email"=>$email,
            "qualification"=>$qualification,
            "adhar"=>$adhar,
            "dob"=>$dob,
            "mobile"=>$mobile,
            "gender"=>$gender,
            "password"=>$password,
        );

        if(!empty($updatedata))
        {
            $this->db->where('id',$user_id);
            $this->db->update('registration',$updatedata);
            $result['message'] = "Update Successfully...";
            $result['status'] = "200";
            $result['data'] = $updatedata; 
        }
        else
        {
            $result['message'] = "ERROR";
            $result['status']  = "400";
            $result['data']    = $updatedata;
        }
        echo json_encode($result);
    }




    /*water shooter a[[*/


        /*STP*/
    public function stp_form()
    {
        $result = array();
        date_default_timezone_set('Asia/Kolkata');
        $user = getuserdata();
        $user_id = $user[0]->id;
        
        $type = $this->input->post('type');
        $date = $this->input->post('date');
        $flow_meter_inlet = $this->input->post('flow_meter_inlet');
        $flow_meter_outlet =  $this->input->post('flow_meter_outlet');
        $intel_para_ph = $this->input->post('intel_para_ph');
        $intel_para_temprature = $this->input->post('intel_para_temprature');
        $intel_para_tds = $this->input->post('intel_para_tds');
        $intel_para_dewatering = $this->input->post('intel_para_dewatering');

        $equipment_srp_sewage_working = $this->input->post('equipment_srp_sewage_working');
        $equipment_srp_sewage_standby = $this->input->post('equipment_srp_sewage_standby');
        $equipment_stp_air_working = $this->input->post('equipment_stp_air_working');
        $equipment_stp_air_standby = $this->input->post('equipment_stp_air_standby');
        $equipment_recirculation_working = $this->input->post('equipment_recirculation_working');
        $equipment_recirculation_standby = $this->input->post('equipment_recirculation_standby');
        $equipment_filterfeed_working = $this->input->post('equipment_filterfeed_working');
        $equipment_filterfeed_standby = $this->input->post('equipment_filterfeed_standby');

        $chemical_sludge_sodium = $this->input->post('chemical_sludge_sodium');
        $chemical_sludge_polymer = $this->input->post('chemical_sludge_polymer');
        $chemical_sludge_mlss = $this->input->post('chemical_sludge_mlss');
        $chemical_sludge_other = $this->input->post('chemical_sludge_other');

        $other_diffuser = $this->input->post('other_diffuser');
        $other_panel = $this->input->post('other_panel');
        $other_pipe_leakage = $this->input->post('other_pipe_leakage');

        if (isset($_FILES['inlet_image'])) {
            $images_name = $_FILES['inlet_image']['name'];
            $images_temp = $_FILES['inlet_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['inlet_image']['tmp_name'],$path);
            $inlet_image = $images_name;
            // ...
        } else {
            $inlet_image = "";
        }
        /*--------------------*/
        if (isset($_FILES['outlet_image'])) {
            $images_name = $_FILES['outlet_image']['name'];
            $images_temp = $_FILES['outlet_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['outlet_image']['tmp_name'],$path);
            $outlet_image = $images_name;
            // ...
        } else {
            $outlet_image = "";
        }
        /*--------------------*/
        if (isset($_FILES['mlss_image'])) {
            $images_name = $_FILES['mlss_image']['name'];
            $images_temp = $_FILES['mlss_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['mlss_image']['tmp_name'],$path);
            $mlss_image = $images_name;
            // ...
        } else {
            $mlss_image = "";
        }
        /*-------------------------*/
        if (isset($_FILES['other_image'])) {
            $images_name = $_FILES['other_image']['name'];
            $images_temp = $_FILES['other_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['other_image']['tmp_name'],$path);
            $other_image = $images_name;
            // ...
        } else {
            $other_image = "";
        }
        /*------------------------*/
        $remark = $this->input->post('remark');
        $status = 1;
        $addeddate = date("Y-m-d");

        $data = array(
            "user_id"=>$user_id,
            "type"=>$type,
            "date"=>$date,
            "flow_meter_inlet"=>$flow_meter_inlet,
            "flow_meter_outlet"=>$flow_meter_outlet,
            "intel_para_ph"=>$intel_para_ph,
            "intel_para_temprature"=>$intel_para_temprature,
            "intel_para_tds"=>$intel_para_tds,
            "intel_para_dewatering"=>$intel_para_dewatering,

            "equipment_srp_sewage_working"=>$equipment_srp_sewage_working,
            "equipment_srp_sewage_standby"=>$equipment_srp_sewage_standby,
            "equipment_stp_air_working"=>$equipment_stp_air_working,
            "equipment_stp_air_standby"=>$equipment_stp_air_standby,
            "equipment_recirculation_working"=>$equipment_recirculation_working,
            "equipment_recirculation_standby"=>$equipment_recirculation_standby,
            "equipment_filterfeed_working"=>$equipment_filterfeed_working,
            "equipment_filterfeed_standby"=>$equipment_filterfeed_standby,

            "chemical_sludge_sodium"=>$chemical_sludge_sodium,
            "chemical_sludge_polymer"=>$chemical_sludge_polymer,
            "chemical_sludge_mlss"=>$chemical_sludge_mlss,
            "chemical_sludge_other"=>$chemical_sludge_other,
            
            "other_diffuser"=>$other_diffuser,
            "other_panel"=>$other_panel,
            "other_pipe_leakage"=>$other_pipe_leakage,

            "inlet_image"=>$inlet_image,
            "outlet_image"=>$outlet_image,
            "mlss_image"=>$mlss_image,
            "other_image"=>$other_image,

            "remark"=>$remark,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

        if($this->db->insert('water_form',$data))
        {
            $result['status'] = "200";
            $result['message'] = "Enquiry Send Successfully..";
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Somthing Wrong";
            $result['data'] = [];
        }
        echo json_encode($result);

    }

    /*rtp*/
     public function etp_form()
    {
        $result = array();
        date_default_timezone_set('Asia/Kolkata');
        $user = getuserdata();
        $user_id = $user[0]->id;
        
        $type = $this->input->post('type');
        $date = $this->input->post('date');
        $flow_meter_inlet = $this->input->post('flow_meter_inlet');
        $flow_meter_outlet =  $this->input->post('flow_meter_outlet');
        $intel_para_ph = $this->input->post('intel_para_ph');
        $intel_para_temprature = $this->input->post('intel_para_temprature');
        $intel_para_tds = $this->input->post('intel_para_tds');
        $intel_para_dewatering = $this->input->post('intel_para_dewatering');

        $equipment_srp_sewage_working = $this->input->post('equipment_srp_sewage_working');
        $equipment_srp_sewage_standby = $this->input->post('equipment_srp_sewage_standby');
        $equipment_stp_air_working = $this->input->post('equipment_stp_air_working');
        $equipment_stp_air_standby = $this->input->post('equipment_stp_air_standby');
        $equipment_recirculation_working = $this->input->post('equipment_recirculation_working');
        $equipment_recirculation_standby = $this->input->post('equipment_recirculation_standby');
        $equipment_filterfeed_working = $this->input->post('equipment_filterfeed_working');
        $equipment_filterfeed_standby = $this->input->post('equipment_filterfeed_standby');

        $chemical_sludge_sodium = $this->input->post('chemical_sludge_sodium');
        $chemical_sludge_polymer = $this->input->post('chemical_sludge_polymer');
        $chemical_sludge_mlss = $this->input->post('chemical_sludge_mlss');
        $chemical_sludge_other = $this->input->post('chemical_sludge_other');

        $other_diffuser = $this->input->post('other_diffuser');
        $other_panel = $this->input->post('other_panel');
        $other_pipe_leakage = $this->input->post('other_pipe_leakage');
        $other_agitator = $this->input->post('other_agitator');

        if (isset($_FILES['inlet_image'])) {
            $images_name = $_FILES['inlet_image']['name'];
            $images_temp = $_FILES['inlet_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['inlet_image']['tmp_name'],$path);
            $inlet_image = $images_name;
            // ...
        } else {
            $inlet_image = "";
        }
        /*--------------------*/
        if (isset($_FILES['outlet_image'])) {
            $images_name = $_FILES['outlet_image']['name'];
            $images_temp = $_FILES['outlet_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['outlet_image']['tmp_name'],$path);
            $outlet_image = $images_name;
            // ...
        } else {
            $outlet_image = "";
        }
        /*--------------------*/
        if (isset($_FILES['mlss_image'])) {
            $images_name = $_FILES['mlss_image']['name'];
            $images_temp = $_FILES['mlss_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['mlss_image']['tmp_name'],$path);
            $mlss_image = $images_name;
            // ...
        } else {
            $mlss_image = "";
        }
        /*-------------------------*/
        if (isset($_FILES['other_image'])) {
            $images_name = $_FILES['other_image']['name'];
            $images_temp = $_FILES['other_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['other_image']['tmp_name'],$path);
            $other_image = $images_name;
            // ...
        } else {
            $other_image = "";
        }
        /*------------------------*/
        $remark = $this->input->post('remark');
        $status = 1;
        $addeddate = date("Y-m-d");

        $data = array(
            "user_id"=>$user_id,
            "type"=>$type,
            "date"=>$date,
            "flow_meter_inlet"=>$flow_meter_inlet,
            "flow_meter_outlet"=>$flow_meter_outlet,
            "intel_para_ph"=>$intel_para_ph,
            "intel_para_temprature"=>$intel_para_temprature,
            "intel_para_tds"=>$intel_para_tds,
            "intel_para_dewatering"=>$intel_para_dewatering,

            "equipment_srp_sewage_working"=>$equipment_srp_sewage_working,
            "equipment_srp_sewage_standby"=>$equipment_srp_sewage_standby,
            "equipment_stp_air_working"=>$equipment_stp_air_working,
            "equipment_stp_air_standby"=>$equipment_stp_air_standby,
            "equipment_recirculation_working"=>$equipment_recirculation_working,
            "equipment_recirculation_standby"=>$equipment_recirculation_standby,
            "equipment_filterfeed_working"=>$equipment_filterfeed_working,
            "equipment_filterfeed_standby"=>$equipment_filterfeed_standby,

            "chemical_sludge_sodium"=>$chemical_sludge_sodium,
            "chemical_sludge_polymer"=>$chemical_sludge_polymer,
            "chemical_sludge_mlss"=>$chemical_sludge_mlss,
            "chemical_sludge_other"=>$chemical_sludge_other,
            
            "other_diffuser"=>$other_diffuser,
            "other_panel"=>$other_panel,
            "other_pipe_leakage"=>$other_pipe_leakage,
            "other_agitator"=>$other_agitator,

            "inlet_image"=>$inlet_image,
            "outlet_image"=>$outlet_image,
            "mlss_image"=>$mlss_image,
            "other_image"=>$other_image,
            
            "remark"=>$remark,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

        if($this->db->insert('water_form',$data))
        {
            $result['status'] = "200";
            $result['message'] = "Enquiry Send Successfully..";
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Somthing Wrong";
            $result['data'] = [];
        }
        echo json_encode($result);

    }




    /*rtp*/
     public function wtp_form()
    {
        $result = array();
        date_default_timezone_set('Asia/Kolkata');
        $user = getuserdata();
        $user_id = $user[0]->id;
        
        $type = $this->input->post('type');
        $date = $this->input->post('date');
        $flow_meter_inlet = $this->input->post('flow_meter_inlet');
        $flow_meter_outlet =  $this->input->post('flow_meter_outlet');
        $intel_para_ph = $this->input->post('intel_para_ph');
        $intel_para_temprature = $this->input->post('intel_para_temprature');
        $intel_para_tds = $this->input->post('intel_para_tds');
        $intel_para_dewatering = $this->input->post('intel_para_dewatering');
        $dosing_pump = $this->input->post('dosing_pump');

        $equipment_srp_sewage_working = $this->input->post('equipment_srp_sewage_working');
        $equipment_srp_sewage_standby = $this->input->post('equipment_srp_sewage_standby');
        $equipment_stp_air_working = $this->input->post('equipment_stp_air_working');
        $equipment_stp_air_standby = $this->input->post('equipment_stp_air_standby');
        $equipment_recirculation_working = $this->input->post('equipment_recirculation_working');
        $equipment_recirculation_standby = $this->input->post('equipment_recirculation_standby');
        $equipment_filterfeed_working = $this->input->post('equipment_filterfeed_working');
        $equipment_filterfeed_standby = $this->input->post('equipment_filterfeed_standby');
        $water_equipment_hpn_working = $this->input->post('water_equipment_hpn_working');
        $water_equipment_hpn_standby = $this->input->post('water_equipment_hpn_standby');

        $chemical_sludge_sodium = $this->input->post('chemical_sludge_sodium');
        $chemical_sludge_polymer = $this->input->post('chemical_sludge_polymer');
        $chemical_sludge_mlss = $this->input->post('chemical_sludge_mlss');
        $chemical_sludge_other = $this->input->post('chemical_sludge_other');

        $other_diffuser = $this->input->post('other_diffuser');
        $other_panel = $this->input->post('other_panel');
        $other_pipe_leakage = $this->input->post('other_pipe_leakage');
        $other_agitator = $this->input->post('other_agitator');
        $other_acf = $this->input->post('other_acf');
        $other_sofner = $this->input->post('other_sofner');
        $other_uf = $this->input->post('other_uf');
        $other_ro = $this->input->post('other_ro');
        $other_mgf = $this->input->post('other_mgf');

        if (isset($_FILES['inlet_image'])) {
            $images_name = $_FILES['inlet_image']['name'];
            $images_temp = $_FILES['inlet_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['inlet_image']['tmp_name'],$path);
            $inlet_image = $images_name;
            // ...
        } else {
            $inlet_image = "";
        }
        
        /*-------------------------*/
        if (isset($_FILES['other_image'])) {
            $images_name = $_FILES['other_image']['name'];
            $images_temp = $_FILES['other_image']['tmp_name'];
            $path = 'media/uploads/'.$images_name;
            move_uploaded_file($_FILES['other_image']['tmp_name'],$path);
            $other_image = $images_name;
            // ...
        } else {
            $other_image = "";
        }
        /*------------------------*/
        $remark = $this->input->post('remark');
        $status = 1;
        $addeddate = date("Y-m-d");

        $data = array(
            "user_id"=>$user_id,
            "type"=>$type,
            "date"=>$date,
            "flow_meter_inlet"=>$flow_meter_inlet,
            "flow_meter_outlet"=>$flow_meter_outlet,
            "intel_para_ph"=>$intel_para_ph,
            "intel_para_temprature"=>$intel_para_temprature,
            "intel_para_tds"=>$intel_para_tds,
            "intel_para_dewatering"=>$intel_para_dewatering,
            "dosing_pump"=>$dosing_pump,

            "equipment_srp_sewage_working"=>$equipment_srp_sewage_working,
            "equipment_srp_sewage_standby"=>$equipment_srp_sewage_standby,
            "equipment_stp_air_working"=>$equipment_stp_air_working,
            "equipment_stp_air_standby"=>$equipment_stp_air_standby,
            "equipment_recirculation_working"=>$equipment_recirculation_working,
            "equipment_recirculation_standby"=>$equipment_recirculation_standby,
            "equipment_filterfeed_working"=>$equipment_filterfeed_working,
            "equipment_filterfeed_standby"=>$equipment_filterfeed_standby,
            "water_equipment_hpn_working"=>$water_equipment_hpn_working,
            "water_equipment_hpn_standby"=>$water_equipment_hpn_standby,

            "chemical_sludge_sodium"=>$chemical_sludge_sodium,
            "chemical_sludge_polymer"=>$chemical_sludge_polymer,
            "chemical_sludge_mlss"=>$chemical_sludge_mlss,
            "chemical_sludge_other"=>$chemical_sludge_other,
            
            "other_diffuser"=>$other_diffuser,
            "other_panel"=>$other_panel,
            "other_pipe_leakage"=>$other_pipe_leakage,
            "other_agitator"=>$other_agitator,
            "other_acf"=>$other_acf,
            "other_sofner"=>$other_sofner,
            "other_uf"=>$other_uf,
            "other_ro"=>$other_ro,
            "other_mgf"=>$other_mgf,

            "other_image"=>$other_image,
            
            "remark"=>$remark,
            "status"=>$status,
            "addeddate"=>$addeddate,
        );

        if($this->db->insert('water_form',$data))
        {
            $result['status'] = "200";
            $result['message'] = "Enquiry Send Successfully..";
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Somthing Wrong";
            $result['data'] = [];
        }
        echo json_encode($result);

    }













































    // public function water_enquiry_form()
    // {
    //     $result = array();
    //     date_default_timezone_set('Asia/Kolkata');
    //     $user = getuserdata();
    //     $user_id = $user[0]->id;

    //     $water_intel_para_softenerplant = $this->input->post('water_intel_para_softenerplant');
    //     $water_intel_para_equipmentcon = $this->input->post('water_intel_para_equipmentcon');
    //     $water_intel_para_transfer_pump = $this->input->post('water_intel_para_transfer_pump');
    //     $water_intel_para_filterfeed = $this->input->post('water_intel_para_filterfeed');
    //     $water_intel_para_filter = $this->input->post('water_intel_para_filter');
    //     $water_intel_para_softener_vessel = $this->input->post('water_intel_para_softener_vessel');
    //     $water_intel_para_chemical = $this->input->post('water_intel_para_chemical');
    //     $water_intel_para_salt = $this->input->post('water_intel_para_salt');
    //     $water_equipment_rofeedpump = $this->input->post('water_equipment_rofeedpump');
    //     $water_equipment_rohighpressure = $this->input->post('water_equipment_rohighpressure');
    //     $water_equipment_mcp = $this->input->post('water_equipment_mcp');
    //     $water_equipment_dosingpump = $this->input->post('water_equipment_dosingpump');
    //     $water_chemical_sludge_acid = $this->input->post('water_chemical_sludge_acid');
    //     $water_chemical_sludge_alkali = $this->input->post('water_chemical_sludge_alkali');
    //     $water_chemical_sludge_hypo = $this->input->post('water_chemical_sludge_hypo');
    //     $water_chemical_sludge_caustic = $this->input->post('water_chemical_sludge_caustic');


        
    //     $type = $this->input->post('type');
    //     $date = $this->input->post('date');
    //     $flow_meter_inlet = $this->input->post('flow_meter_inlet');
    //     $flow_meter_outlet =  $this->input->post('flow_meter_outlet');
    //     $intel_para_ph = $this->input->post('intel_para_ph');
    //     $intel_para_temprature = $this->input->post('intel_para_temprature');
    //     $intel_para_tds = $this->input->post('intel_para_tds');
    //     $equipment_srp_sewage = $this->input->post('equipment_srp_sewage');
    //     $equipment_stp_air = $this->input->post('equipment_stp_air');
    //     $equipment_recirculation = $this->input->post('equipment_recirculation');
    //     $equipment_filterfeed = $this->input->post('equipment_filterfeed');
    //     $equipment_ok = $this->input->post('equipment_ok');
    //     $equipment_notok = $this->input->post('equipment_notok');
    //     $chemical_sludge_sodium = $this->input->post('chemical_sludge_sodium');
    //     $chemical_sludge_polymer = $this->input->post('chemical_sludge_polymer');
    //     $chemical_sludge_other = $this->input->post('chemical_sludge_other');
    //     $chemical_sludge_date = $this->input->post('chemical_sludge_date');
    //     $status = 1;
    //     $addeddate = date("Y-m-d");

    //     $data = array(
    //         "user_id"=>$user_id,
    //         "type"=>$type,
    //         "date"=>$date,
    //         "flow_meter_inlet"=>$flow_meter_inlet,
    //         "flow_meter_outlet"=>$flow_meter_outlet,
    //         "intel_para_ph"=>$intel_para_ph,
    //         "intel_para_temprature"=>$intel_para_temprature,
    //         "intel_para_tds"=>$intel_para_tds,
    //         "equipment_srp_sewage"=>$equipment_srp_sewage,
    //         "equipment_stp_air"=>$equipment_stp_air,
    //         "equipment_recirculation"=>$equipment_recirculation,
    //         "equipment_filterfeed"=>$equipment_filterfeed,
    //         "equipment_ok"=>$equipment_ok,
    //         "equipment_notok"=>$equipment_notok,
    //         "chemical_sludge_sodium"=>$chemical_sludge_sodium,
    //         "chemical_sludge_polymer"=>$chemical_sludge_polymer,
    //         "chemical_sludge_other"=>$chemical_sludge_other,
    //         "chemical_sludge_date"=>$chemical_sludge_date,
    //         "status"=>$status,
    //         "addeddate"=>$addeddate,
    //         "water_intel_para_softenerplant"=>$water_intel_para_softenerplant,
    //         "water_intel_para_equipmentcon"=>$water_intel_para_equipmentcon,
    //         "water_intel_para_transfer_pump"=>$water_intel_para_transfer_pump,
    //         "water_intel_para_filterfeed"=>$water_intel_para_filterfeed,
    //         "water_intel_para_filter"=>$water_intel_para_filter,
    //         "water_intel_para_softener_vessel"=>$water_intel_para_softener_vessel,
    //         "water_intel_para_chemical"=>$water_intel_para_chemical,
    //         "water_intel_para_salt"=>$water_intel_para_salt,
    //         "water_equipment_rofeedpump"=>$water_equipment_rofeedpump,
    //         "water_equipment_rohighpressure"=>$water_equipment_rohighpressure,
    //         "water_equipment_mcp"=>$water_equipment_mcp,
    //         "water_equipment_dosingpump"=>$water_equipment_dosingpump,
    //         "water_chemical_sludge_acid"=>$water_chemical_sludge_acid,
    //         "water_chemical_sludge_alkali"=>$water_chemical_sludge_alkali,
    //         "water_chemical_sludge_hypo"=>$water_chemical_sludge_hypo,
    //         "water_chemical_sludge_caustic"=>$water_chemical_sludge_caustic,
    //     );

    //     if($this->db->insert('water_form',$data))
    //     {
    //         $result['status'] = "200";
    //         $result['message'] = "Enquiry Send Successfully..";
    //         $result['data'] = $data;
    //     }
    //     else
    //     {
    //         $result['status'] = "400";
    //         $result['message'] = "Somthing Wrong";
    //         $result['data'] = [];
    //     }
    //     echo json_encode($result);

    // }





    function forget_password()
    {
        $result = array();
        $access_token = '';
        $url = '';

        $device_id = $this->input->post('device_id');

        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        
        $user_data = array(
            "device_id" => $device_id,  
            "mobile" => $mobile,
            "password" => $password,
        );

        $registerdata = $this->db->get_where('registration',array('mobile'=>$mobile,))->result_object();

        if(!empty($registerdata))
        {   
            $result['message'] = "Enter New Password...";
            $result['status'] = "200";
            $result['data'] = $user_data;   
            $result['access_token'] = $access_token;   
            $result['url'] = $url;  

            if(!empty($password))
            {
                $this->db->where('mobile',$mobile);
                $this->db->update('registration',array('password'=>$password));

                $url = base_url(user_app.'login?device_id='.$this->session->userdata('device_id'));

                $result['message'] = "Password Update Successfully...";
                $result['status'] = "200";
                $result['data'] = $password;     
                $result['url'] = $url;  
            } 
        }
        else
        {
            $result['message'] = "Wrong Mobile No..";
            $result['status']  = "400";
            $result['data']    = $user_data;
            $result['url']    = $url;
        }
        echo json_encode($result);
    }



    public function leave_form()
    {
        $result = array();

         date_default_timezone_set('Asia/Kolkata');

        $user = getuserdata();
        $user_id = $user[0]->id;

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $from_date =  $this->input->post('from_date');
        $to_date =  $this->input->post('to_date');
        $message = $this->input->post('message');
        $addeddate = date("Y-m-d");

        $data = array(
            "user_id"=>$user_id,
            "name"=>$name,
            "email"=>$email,
            "mobile"=>$mobile,
            "from_date"=>$from_date,
            "to_date"=>$to_date,
            "message"=>$message,
            "addeddate"=>$addeddate,
        );

        if($this->db->insert('leave_form',$data))
        {
            $result['status'] = "200";
            $result['message'] = "Enquiry Send Successfully..";
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Somthing Wrong";
            $result['data'] = [];
        }
        echo json_encode($result);

    }




    public function user_enquiry_form()
    {
        $result = array();

         date_default_timezone_set('Asia/Kolkata');

        $user = getuserdata();
        $user_id = $user[0]->id;

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $subject =  $this->input->post('subject');
        $message = $this->input->post('message');
        $addeddate = date("Y-m-d h:i s");

        $data = array(
            "user_id"=>$user_id,
            "name"=>$name,
            "email"=>$email,
            "mobile"=>$mobile,
            "subject"=>$subject,
            "message"=>$message,
            "addeddate"=>$addeddate,
        );

        if($this->db->insert('contact',$data))
        {
            $result['status'] = "200";
            $result['message'] = "Enquiry Send Successfully..";
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = "400";
            $result['message'] = "Somthing Wrong";
            $result['data'] = [];
        }
        echo json_encode($result);

    }




    function plant_info()
    {
        $result = array();
        $url = '';
        $user = getuserdata();
        $user_id = $user[0]->id;

        $client_name = $this->input->post('client_name');
        $location = $this->input->post('location');
        $plant_capacity = $this->input->post('plant_capacity');
        $opratername = $this->input->post('opratername');
        
        $updatedata = array(
            "client_name" => $client_name,  
            "location" => $location,  
            "plant_capacity" => $plant_capacity,
            "opratername" => $opratername,
            "plant_info" => 1,
        );

        $registerdata = $this->db->update('registration',$updatedata,array('id'=>$user_id));

        if(!empty($registerdata))
        {
            $url = base_url(user_app.'home.php?device_id='.$this->session->userdata('device_id'));
            
            $result['message'] = "Submit Successfully...";
            $result['status'] = "200";
            $result['data'] = $updatedata;      
            $result['url'] = $url;   
        }
        else
        {
            $result['message'] = "Wrong User..";
            $result['status']  = "400";
            $result['data']    = $updatedata;
            $result['url']    = $url;
        }
        echo json_encode($result);
    }




    public function update_image()
    {
        $result = array();
        $user_data = array();        
      
        $user = getuserdata();
        $user_id = $user[0]->id;
        $image = $this->input->post('image');
       
        if(!empty($user_id))
        {
            if ($image)
            {
                $image_content = base64_decode(explode(",", $image)[1]);
                $image_time = time().$user_id.'user_profile.png';
                $image_path = 'media/uploads/'.$image_time;

                if(file_put_contents($image_path, $image_content)) 
                {
                    $user_data = array(
                        "image"=>$image_time,
                    );
                    if($this->db->update("registration",$user_data,array('id' => $user_id, )))
                    {
                        $result['message'] = "Update successfully";
                        $result['status']  = "200";
                    }
                    else
                    {
                        $result['message'] = "Update not successfully";
                        $result['status']  = "400";
                    }                   
                }
            }
            else
            {
                $result['message'] = "Upload Image first...";
                $result['status']  = "400";
            }            
        }
        else
        {
            $result['message'] = "Please Enter Crrect User ID.";
            $result['status']  = "400";
        }
        echo json_encode($result);      
    }






































    function user_account_delete()
    {
        $result = array();
        $id = $this->session->userdata('user_id');
        $this->db->update('registration',array('status'=>0),array('id'=>$id));
        $this->session->sess_destroy();
        redirect('app/user/login.php?device_id='.$this->session->userdata('device_id'));
    }

    function user_logout()
    {
        $this->session->sess_destroy();
        redirect('app/user/login.php?device_id='.$this->session->userdata('device_id'));
    }








}