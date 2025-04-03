<?php


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

// get user data

function getuserdata()
{
  $ci = & get_instance();
  $usersess = $ci->session->userdata("user");
  $user_id = $usersess['id'];
  if(!empty($user_id))
  {
    $user = $ci->crud->selectDataByMultipleWhere('registration',array('id'=>$user_id));
    return $user;
  }
  else
  {
    $ci->session->sess_destroy();
    redirect('app/user/login');
  }
}


 
function ok_notok($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Ok
               </p>';
  }

  else if($value==2)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Not Ok
               </p>';
  }

  return $string;
}



 
function opratername($value)
{
  if($value==1)
  {
    $string = 'Shift A';
  }

  else if($value==2)
  {
    $string = 'Shift B';
  }
  else if($value==3)
  {
    $string = 'Shift C';
  }

  return $string;
}








// function user_app_logged_in($page='',$login_required_pages='',$login_not_required_pages='')
// {

//   $count = explode(".", $page);
//   if(count($count)>0) $page = $count[0];
//   else $page = $count[0].'.'.$count[1];

//     $ci =& get_instance();
//     $id = 0;
//     $status = 0;
//     $role = 0;
//     $device_id = $ci->session->userdata("device_id");
//     if(!empty($device_id))
//     {
//       $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
//       if(!empty($check_login))
//       {
//         $check_login = $check_login[0];
//         $user_id = $check_login->user_id;
//         $role = $check_login->role;
//         $password = $check_login->password;
//         $access_token = $check_login->access_token;
//         $firebase_token = $check_login->firebase_token;

//         $user = $ci->db->get_where("users",array('id'=>$user_id,"role"=>$role,))->result_object();
//         if(!empty($user))
//         {
//           $user = $user[0];
//           if($user->password==$check_login->password)
//           {
//             $data = array(
//               "user"=>array("id"=>$user_id,"role"=>$role,"password"=>$password,'access_token'=>$access_token,"device_id"=>$device_id,),
//             );
//             $ci->session->set_userdata($data);
//             $ci->session->set_userdata(array("access_token"=>$access_token,));
//             $ci->session->set_userdata(array("device_id"=>$device_id,));
//             $ci->session->set_userdata(array("firebase_token"=>$firebase_token,));
//             $status = 1;
//           }
//           else
//             $status = 5; // password not match            
//         }
//         else
//         {
//           $status = 4; // account not found
//         }          
//       }
//       else $status = 3; // not loged in
//     }
//     else
//     {
//       $status = 2; // session not set
//     }

//     if(in_array($page, $login_required_pages) && $status!=1)
//     {
//       $status = 6; // send on login page
//     }
//     if(in_array($page, $login_not_required_pages) && $status==1)
//     {
//       $status = 7; // send on home page
//     }
//     return $status;
// }


// function is_user_logged_in($page='')
// {
//     $ci =& get_instance();
//     $role = $ci->session->userdata('role');

//     if($role==1)
//     {
//       $ci->session->unset_userdata('username');
//       $ci->session->unset_userdata('type');
//       $ci->session->unset_userdata('id');
//       $ci->session->unset_userdata('role');
//     }
    
//     $device_id = $ci->session->userdata("device_id");
//     $id = 0;
//     if(!empty($device_id) && $role!=1)
//     {
//       $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_array();
//       if(!empty($check_login))
//       {
//         $check_login = $check_login[0];

//         $access_token = $check_login['access_token'];
//         $access_token = $ci->session->set_userdata(array('access_token'=>$access_token));
        

//         $id = $check_login['user_id'];
//         $ci->session->set_userdata(array("user"=>array("role"=>2,"id"=>$id,),));
//         $user = $ci->db->get_where("users",array('id'=>$id,))->result_array();

//         if(!empty($user))
//         {
//           if($user[0]['password']!=$check_login['password'])
//           {
//               $ci->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));
//               $ci->session->unset_userdata('user');
//               if($page!='login.php' && $page!='signup.php')
//                 redirect(base_url('app/login?device_id='.$ci->session->userdata("device_id")));
//           }
//           else
//           {
//             if($page=='login.php' || $page=="signup.php" || $page=="forgot-password.php" || $page=="create-new-password.php")
//             {
//               redirect(base_url('app/dashboard'));
//             }
//           }
//         }
//         else
//         {
//           $ci->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));
//           $ci->session->unset_userdata('user');
//           if($page!='login.php' && $page!='signup.php' && $page!='forgot-password.php' && $page!='create-new-password.php')
//             redirect(base_url('app/login?device_id='.$ci->session->userdata("device_id")));
//         }
//       }   
//       else
//       {
//         $ci->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));
//         $ci->session->unset_userdata('user');
//         if($page!='login.php' && $page!='signup.php' && $page!='forgot-password.php' && $page!='create-new-password.php')
//           redirect(base_url('app/login?device_id='.$ci->session->userdata("device_id")));
//       }   
//     }
//     else
//     {
//       $ci->db->update("login_history",array("status"=>0,),array("user_id"=>$id,"status"=>1,));
//       $ci->session->unset_userdata('user');
//       if($page!='login' && $page!='signup')
//         redirect(base_url('app/login?device_id='.$ci->session->userdata("device_id")));
//     }
// }
?>