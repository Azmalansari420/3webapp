<?php



function encode_token($data)
{
  $data = json_encode($data);
  return base64_encode(base64_encode(base64_encode($data)));
}
function decode_token($data)
{
  $data = base64_decode(base64_decode(base64_decode($data)));
  return $data = json_decode($data);
}

function token_auth()
{
    $ci =& get_instance();
    $result = [];
    $headers = getallheaders();

    $access_token = $ci->session->userdata('access_token');
    
    if(isset($headers['token']) || !empty($access_token))
    {
      if(empty($access_token))
        $token_string = $headers['token'];
      else
        $token_string = $access_token;
        
      $token_array = decode_token($token_string);
      if(!empty($token_array->user_id)) $user_id = $token_array->user_id; else $user_id = 0;
      if(!empty($token_array->password)) $password = $token_array->password;else $password = '';
      if(!empty($token_array->hours)) $hours = $token_array->hours;else $hours = 0;
      if(!empty($token_array->date_time)) $date_time = $token_array->date_time;else $date_time = '';



      $datetime_1 = $date_time; 
      $datetime_2 = date("Y-m-d H:i:s"); 
      $start_datetime = new DateTime($datetime_1); 
      $diff = $start_datetime->diff(new DateTime($datetime_2)); 
      // echo $diff->days.' Days total<br>'; 
      // echo $diff->y.' Years<br>'; 
      // echo $diff->m.' Months<br>'; 
      // echo $diff->d.' Days<br>'; 
      // echo $diff->h.' Hours<br>'; 
      // echo $diff->i.' Minutes<br>'; 
      // echo $diff->s.' Seconds<br>';
      $total_minutes = ($diff->days * 24 * 60); 
      $total_minutes += ($diff->h * 60); 
      $total_minutes += $diff->i; 
      $total_hours = $total_minutes/60;
      if($total_hours<=$hours || 1==1)
      {
          $user = $ci->db->get_where("users",array("id"=>$user_id,))->result_object();          
          if(!empty($user))
          {
              $user = $user[0];
              if($user->password!=$password)
              {
                  $result['status'] = "401";
                  $result['message'] = "Invailid user...";
                  $result['data'] = [];
                  echo json_encode($result);
                  die;
              }
              else
              {
                return $token_array;
              }
          }
          else
          {
              $result['status'] = "401";
              $result['message'] = "Invailid user...";
              $result['data'] = [];
              echo json_encode($result);
              die;
          }
      }
      else
      {
          $result['status'] = "401";
          $result['message'] = "Token Expired...";
          $result['data'] = [];
          echo json_encode($result);
          die;
      }
    }
    else
    {
        $result['status'] = "401";
        $result['message'] = "Token Required...";
        $result['data'] = [];
        echo json_encode($result);
        die;
    }    
    


}
function token_auth_web($access_token)
{
    $ci =& get_instance();
    $result = [];
    $headers = getallheaders();

    
    if(isset($access_token))
    {
      $token_string = $access_token;
      $token_array = decode_token($token_string);
      if(!empty($token_array->user_id)) $user_id = $token_array->user_id; else $user_id = 0;
      if(!empty($token_array->password)) $password = $token_array->password;else $password = '';
      if(!empty($token_array->hours)) $hours = $token_array->hours;else $hours = 0;
      if(!empty($token_array->date_time)) $date_time = $token_array->date_time;else $date_time = '';



      $datetime_1 = $date_time; 
      $datetime_2 = date("Y-m-d H:i:s"); 
      $start_datetime = new DateTime($datetime_1); 
      $diff = $start_datetime->diff(new DateTime($datetime_2)); 
      // echo $diff->days.' Days total<br>'; 
      // echo $diff->y.' Years<br>'; 
      // echo $diff->m.' Months<br>'; 
      // echo $diff->d.' Days<br>'; 
      // echo $diff->h.' Hours<br>'; 
      // echo $diff->i.' Minutes<br>'; 
      // echo $diff->s.' Seconds<br>';
      $total_minutes = ($diff->days * 24 * 60); 
      $total_minutes += ($diff->h * 60); 
      $total_minutes += $diff->i; 
      $total_hours = $total_minutes/60;
      if($total_hours<=$hours)
      {
          $user = $ci->db->get_where("users",array("id"=>$user_id,))->result_object();          
          if(!empty($user))
          {
              $user = $user[0];
              if($user->password!=$password)
              {
                  $result['status'] = "401";
                  $result['message'] = "Invailid user...";
                  $result['data'] = [];
              }
              else
              {
                return $token_array;
              }
          }
          else
          {
              $result['status'] = "401";
              $result['message'] = "Invailid user...";
              $result['data'] = [];
          }
      }
      else
      {
          $result['status'] = "401";
          $result['message'] = "Token Expired...";
          $result['data'] = [];
      }
    }
    else
    {
        $result['status'] = "401";
        $result['message'] = "Token Required...";
        $result['data'] = [];
    }    
}



 function slug($string) 
 { 
  $string = trim($string);$string=strtolower($string);
  $string =preg_replace("/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u", "", $string);
  $string = preg_replace("/[\s-]+/", " ", $string);
  $string = preg_replace("/[\s]/", '-', $string);
  return $string ;
 }

 
function status($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Show
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Hide
               </p>';
  }

  return $string;
}


function admin_logedin_detail()
{
    $ci =& get_instance();
    $id = $ci->session->userdata("id");
    return $ci->db->get_where("tbl_admin",array("id"=>$id,))->result_object()[0];
}

 /*----is admin login ceck -----------*/
  function isadmin_login()
  {
    $ci = & get_instance();
    $adminid = $ci->session->userdata('adminid');   
    if($adminid!=="")
    {
      redirect('admin/dashboard');
    }
  }

// -------------chech_admin_login-----------
  function chech_admin_login()
  {
    $ci = & get_instance();
    $adminid = $ci->session->userdata('adminid');  
    $username = $ci->session->userdata('username');  
    $logged_in = $ci->session->userdata('logged_in'); 

    $checkuser = $ci->db->get_where('tbl_admin',array('id'=>$adminid))->result_object();
    if(empty($checkuser))
    {
      $ci->session->sess_destroy();
      redirect('admin/index');
    }

    if($adminid=="" && $username=="")
    {
      redirect('admin/index');
    }
  }


  /*--open private--*/


function private_type($value)
{
  if($value==1)
  {
    $string = '<strong class="btn btn-sm btn-dark">Yes</strong>';
  }

  else if($value==0)
  {
    $string = '<strong class="btn btn-sm btn-primary">No</strong>';
  }

  return $string;
}


/*---match comming type--*/

function match_live_type($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>OnGoing
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Upcoming
               </p>';
  }
  else if($value==2)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Finished
               </p>';
  }

  return $string;
}


function set_user_session()
{
  $ci =& get_instance();
  $device_id = $ci->input->get("device_id");
  $firebase_token = $ci->input->get("firebase_token");
  if(!empty($device_id))
  {
    $ci->session->set_userdata(array("device_id"=>$device_id,));
    $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
  }
  else
  {
    $device_id = uniqid().$_SERVER['REMOTE_ADDR'];
    if(empty($ci->session->userdata('device_id')))
    {
      $ci->session->set_userdata(array("device_id"=>$device_id,));
      $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
    }
  }
}
function user_app_logged_in($page='',$login_required_pages='',$login_not_required_pages='')
{

  $count = explode(".", $page);
  if(count($count)>0) $page = $count[0];
  else $page = $count[0].'.'.$count[1];

    $ci =& get_instance();
    $id = 0;
    $status = 0;
    $role = 0;
    $device_id = $ci->session->userdata("device_id");
    if(!empty($device_id))
    {
      $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
      if(!empty($check_login))
      {
        $check_login = $check_login[0];
        $user_id = $check_login->user_id;
        $role = $check_login->role;
        $password = $check_login->password;
        $access_token = $check_login->access_token;
        $firebase_token = $check_login->firebase_token;

        $user = $ci->db->get_where("users",array('id'=>$user_id,"role"=>$role,))->result_object();
        if(!empty($user))
        {
          $user = $user[0];
          if($user->password==$check_login->password)
          {
            $data = array(
              "user"=>array("id"=>$user_id,"role"=>$role,"password"=>$password,'access_token'=>$access_token,"device_id"=>$device_id,),
            );
            $ci->session->set_userdata($data);
            $ci->session->set_userdata(array("access_token"=>$access_token,));
            $ci->session->set_userdata(array("device_id"=>$device_id,));
            $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
            $status = 1;
          }
          else
            $status = 5; // password not match            
        }
        else
        {
          $status = 4; // account not found
        }          
      }
      else $status = 3; // not loged in
    }
    else
    {
      $status = 2; // session not set
    }

    if(in_array($page, $login_required_pages) && $status!=1)
    {
      $status = 6; // send on login page
    }
    if(in_array($page, $login_not_required_pages) && $status==1)
    {
      $status = 7; // send on home page
    }
    return $status;
}
function get_user_app()
{
  $ci =& get_instance();
  $table_name = 'users';
  $user_session = $ci->session->userdata("user");
  if(!empty($user_session))
  {
    $id = $user_session['id'];
    $role = $user_session['role'];
    $where = array("id"=>$id,);
    $user = $ci->db->get_where($table_name,$where)->result_object();
    if(!empty($user))
    {
      $user = $user[0];
      if($role==1)
      {
        $data['image'] = base_url('media/uploads/').$user->files;
      }
      else
      {
        $data['image'] = base_url('media/uploads/').$user->profile_image;
      }
      $data['full_detail'] = $user;
      return $data;
    }
    else
      return FALSE;
  }
  else
    return FALSE;
}
function currency_simble()
{
  // return '₹';
  // return ;
}
function price_formate($price)
{
  return '<span><img src="'.base_url().'assets/coin.png" style="height: 10px;" alt="img"></span> &nbsp;&nbsp;'.number_format($price,2);
}
function rating_amount($rating)
{ 
  return $rating;
}
function rating_amount_total($rating)
{ 
  return $rating;
}
function rating_count($user_id)
{ 
  return 5;
}





function withdraw_status($value)
{
  $string = '';
  if($value==0)
  {
    $string = '<span style="color:#3b0ee5!important;margin-bottom: 0;">Pending</span>';
  }
  else if($value==1)
  {
    $string = '<span style="color:green!important;margin-bottom: 0;">Approved</span>';
  }
  else if($value==2)
  {
    $string = '<span style="color:red!important;margin-bottom: 0;">Reject</span>';
  }
  return $string;
}