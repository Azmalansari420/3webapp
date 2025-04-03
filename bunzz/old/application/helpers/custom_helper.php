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


 
function asmstatus($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Active
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>De-Active
               </p>';
  }

  return $string;
} 



 
function websitebanner($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Yes
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>No
               </p>';
  }

  return $string;
} 



function videotype($value)
{
  if($value==1)
  {
    $string = '<button class="btn btn-sm btn-dark">Video</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-dark">Influencers Reels</button>';
  }
  return $string;
} 

















function salesofficerstatus($value)
{
  if($value==1)
  {
    $string = '<a class="mb-0 text-success">
                  Active
               </a>';
  }

  else if($value==0)
  {
    $string = '<a class="mb-0 text-danger">
                  In-Active
               </a>';
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
    $password = $ci->session->userdata('password');  
    $logged_in = $ci->session->userdata('logged_in'); 

    $checkuser = $ci->db->get_where('tbl_admin',array('id'=>$adminid,'password'=>$password))->result_object();
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



/*---------crete use session--------*/


function temp_session_id($user_id='')
  {
    $ci =& get_instance();
    if(empty($user_id))
    {
      if(empty($ci->session->userdata("user")))
      {
        if(empty($ci->session->userdata("temp_session_id")))
        {
          $temp_session_id = session_id();
        }
        else
        {
          $temp_session_id = $ci->session->userdata("temp_session_id");
        }
      }
      else
      {
        $temp_session_id = $ci->session->userdata("user")['id'];
      }
    }
    else
    {
      $temp_session_id = $user_id;
    }
    return $temp_session_id;
  }




/*---------------users------------*/
function chech_users_login()
{
  $ci =& get_instance();
  $login_data = $ci->session->userdata('users');
  if(!empty($login_data)) 
  {
    $role = $login_data['role'];
    $id = $login_data['user_id'];
    $password = $login_data['password'];
    $user = $ci->db->get_where("registration",array("id"=>$id,"password"=>$password,"status"=>1,))->result_object();
    if(empty($user))
    {
      $ci->session->unset_userdata('users');
      redirect(base_url('login'));
    }
  }
  else
  {
    $ci->session->unset_userdata('users');
    redirect(base_url('login'));
  }
}

function users_data()
{
  $ci =& get_instance();
  $login_data = $ci->session->userdata('users');
  $id = $login_data['user_id'];
  $user = $ci->db->get_where("registration",array("id"=>$id,))->result_object();
  return $user[0];
}


 
function user_status($value)
{
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">        
                      <circle cx="12" cy="12" r="8" fill="#3cb72c"></circle>
                    </svg>
                  </small>Active
               </p>';
  }

  else if($value==0)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">
                  <small>
                     <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="8" fill="#F42B3D"></circle>
                     </svg>
                  </small>Deactive
               </p>';
  }

  return $string;
}


/*sizename*/

/*color name*/
function colorname($id)
{
  $ci = & get_instance();
  $color = $ci->crud->selectDataByMultipleWhere('color',array('id'=>$id,));
  return $color[0]->name;
}
/*discount percentage */
function discount($original_price,$cut_price){
  $diff = ($original_price-$cut_price);
  $divid = ($diff*100);
  $pers = ($divid/$original_price);
  return substr($pers,0,2);
 }
/*coupon type*/
function coupontype($value)
{
  if($value==2)
  {
    $string = '<button class="btn btn-sm btn-dark">Amount</button>';
  }
  else if($value==1)
  {
    $string = '<button class="btn btn-sm btn-dark">Percentage</button>';
  }
  return $string;
} 
/*payment type*/
function paymenttype($value)
{
  $string = '';
  if($value==1)
  {
    $string = '<span class="btn btn-primary btn-sm"> Wallet</span>';
  }
  else if($value==2)
  {
    $string = '<span class="btn btn-dark btn-sm"> Online</span>';
  }
  return $string;
}
/*coupon type*/
function coupon_type_cart($value)
{
  $string = '';
  if($value==1)
  {
    $string = '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">Cart Amount</p>';
  }
  else if($value==2)
  {
    $string = '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">Product Wise</p>';
  }
  return $string;
}
/*apply coupon code*/
function applied_coupon($coupon,$order_id='')
{
  $ci = & get_instance();
  $user_id = $ci->session->userdata("user")['id'];  
  $coupon = 0;
  $coupen_type = 0;
  $sub_total = 0; 
  $product_total = 0;
  $after_discount_final_price = 0;
  $discount = 0;
  $discount_amount = 0;
  $type = 0;
  $finalprice = 0;
  $shipping_charge = 0;

  $coupon_apply = $ci->db->get_where('order_coupon',array('user_id'=>$user_id))->result_object();
  if(!empty($coupon_apply[0]->coupon)) 
  {
      $coupon = $coupon_apply[0]->coupon;
      $coupen_type = $coupon_apply[0]->coupen_type;
  }    

  $cartpro = $ci->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>$user_id));
  foreach ($cartpro as $key => $value) 
  {
      $p_id = $value->p_id;
      $allimages = $ci->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id,));     
      $product_total = $allimages[0]->sale_price*$value->quantity;

      $sub_total += $product_total;
      // product wise checked amount
      if($coupen_type==2)
      {
        $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>$user_id,))->result_object();
        if(!empty($order_coupon))
        {
          $order_coupon = $order_coupon[0];
          $coupen_product_wise = $ci->db->get_where('coupen_product_wise',array("coupon_id"=>$order_coupon->coupon_id,"p_id"=>$p_id,))->result_object();
          if(!empty($coupen_product_wise))
          {
            $coupen_product_wise = $coupen_product_wise[0];
            $type = $coupen_product_wise->type;
            $amount = $coupen_product_wise->amount;
            if($type==1)
            {
              // percent
              $discount = $amount;
              $discount_amount = $product_total*$amount/100;
            }
            else
            {
              // flat
              $discount = $amount;
              $discount_amount = $amount;
            }
          }          
        }
      }
  }
  $after_discount_final_price = $finalprice = $sub_total+$shipping_charge-$discount_amount;

  /*checkout cart amount*/
  if($coupen_type==1)
  {
    $order_coupon = $ci->db->get_where('order_coupon',array('coupon'=>$coupon,"status"=>0,'user_id'=>$user_id,))->result_object();
    if(!empty($order_coupon))
    {
      $order_coupon = $order_coupon[0];
      $type = $order_coupon->type;
      $amount = $order_coupon->discount;
      if($type==1)
      {
        // percent
        $discount = $amount;
        $discount_amount = $finalprice*$amount/100;
        $after_discount_final_price = $finalprice-$discount_amount;
      }
      else
      {
        // flat
        $discount_amount = $amount;
        $discount = $amount;
        $after_discount_final_price = $finalprice-$discount;
      }
    }
  }

  return $return_array = array(
    "type"=>$type,
    "sub_total"=>$sub_total,
    "discount"=>$discount,
    "discount_amount"=>$discount_amount,
    "shipping_charge"=>$shipping_charge,
    "finalprice"=>$finalprice,
    "after_discount_final_price"=>$after_discount_final_price,
  );
  
}

/*order status*/
function distributer_order_status($value)
{
  $string = '';
  if($value==0)
  {
    $string = '<p style="background:yellow;color:black;padding: 1px 6px;border-radius: 6px;">Pending Order</p>';
  }
  else if($value==1)
  {
    $string = '<p style="background:green;color:white;padding: 1px 6px;border-radius: 6px;">Confirm Order</p>';
  }
  else if($value==2)
  {
    $string = '<p style="background:green;color:white;padding: 1px 6px;border-radius: 6px;">Warehouse</p>';
  }
  else if($value==3)
  {
    $string = '<p style="background:blue;color:white;padding: 1px 6px;border-radius: 6px;">Shipped Order Order</p>';
  }
  else if($value==4)
  {
    $string = '<p style="background:black;color:white;padding: 1px 6px;border-radius: 6px;">Complete Order</p>';
  }
  else if($value==5)
  {
    $string = '<p style="background:red;color:white;padding: 1px 6px;border-radius: 6px;">Cancel Order</p>';
  }

  return $string;
} 

/*price formet*/
function currency_simble($value)
{
  return '₹ '.number_format($value,2);
}


function count_cart()
{
  $ci = & get_instance();
  $device_id = $ci->session->userdata("device_id");
  $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
  $user_id = $check_login[0]->user_id;

  $add_cart = $ci->db->get_where('add_to_temp_cart',array('user_id'=>temp_session_id(),))->result_object();
  $count = count($add_cart);
  return $count;
}

function cart_products()
{
  $ci = & get_instance();
  $device_id = $ci->session->userdata("device_id");
  $check_login = $ci->db->order_by('id desc')->limit(1)->get_where("login_history",array('device_id'=>$device_id,"status"=>1,))->result_object();
  $user_id = $check_login[0]->user_id;

  $ci->db->order_by('id desc');
  $add_to_cart = $ci->crud->selectDataByMultipleWhere('add_to_temp_cart',array('user_id'=>$user_id));
  return $add_to_cart;
}

function wishlist_cart()
{
  $ci = & get_instance();
  $add_cart = $ci->db->get_where('add_to_temp_wishlist',array('user_id'=>temp_session_id(),))->result_object();
  $count = count($add_cart);
  return $count;
}



/*--access array*/
function access_array()
{
  $access_array = array(
    "1"=>"List",
    "2"=>"Add",
    "3"=>"Edit",
    "4"=>"Delete",
  );
  return $access_array;
}
/*--side menu--*/
function menuname()
{
  $access_array = array(
    "0"=>"Assign Role",
    "1"=>"Add Users",
    "2"=>"Contact Us",
    "3"=>"Categories",
    "4"=>"Product",
    "5"=>"Employees",
    "6"=>"Distribiter KYC",
    "7"=>"Site Setting",
    "8"=>"About Us",
    "9"=>"Slider",
    "10"=>"Gallery",
    "11"=>"Videos",
    "12"=>"Youtube",
    "13"=>"Team",
    "14"=>"Testimonials",
    "15"=>"Website Enquiry",
    "16"=>"All Orders",
    "17"=>"Sub Categories",
    "18"=>"NSM",
    "19"=>"RSM",
    "20"=>"ASM",
    "21"=>"Sales Officer",
    "22"=>"Distributor",
    "23"=>"Distributor  KYC",
    "24"=>"Performance Notices",
  );
  return $access_array;
}

/*-get user data--*/
function get_user()
{
  $ci =& get_instance();
  $id = 0;
  $usersession = $ci->session->userdata("adminid");
  $table_name = "tbl_admin";
  if(!empty($usersession))
  {
    $id = $usersession;
    $where = array("id"=>$id,);    
    $user = $ci->db->get_where($table_name,$where)->result_object();
    if(!empty($user))
    {
      $user = $user[0];
      $data['full_detail'] = $user;
      return $data;
    }
    else
      return FALSE;
  }
  else
  {
    redirect('admin/dashboard');
  }
}

/*--------check controller access----*/
function check_controller_access($controller_id)
{
  $ci =& get_instance();
  $user = get_user()['full_detail'];
  $role = $user->role;
  $type = $user->type;
  $check_main_access = true;
  if($type!=1)
  {

      $role_data = $ci->db->get_where("role",array("id"=>$role,))->result_object();
      $check_main_access = false;
      if(!empty($role_data))
      {
        $access = $role_data[0]->role_access;
        $access = json_decode($access);
        $main_access = $access->main_access;          
        // print_r($main_access);
        if(in_array($controller_id,$main_access))
          $check_main_access = true;        
      }      
      if($check_main_access==false)
        redirect(base_url('admin/access_denied'));    
  }
  return $check_main_access;
}


/*---check page access*/
function check_controller_inner_access($controller_id,$inner_id)
{
  $ci =& get_instance();
  $user = get_user()['full_detail'];
  $role = $user->role;
  $type = $user->type;
  $check_main_access = true;
  if($type!=1)
  {

      $role_data = $ci->db->get_where("role",array("id"=>$role,))->result_object();
      $check_main_access = false;
      if(!empty($role_data))
      {
        $access = $role_data[0]->role_access;
        $access = json_decode($access);
        $main_access = $access->main_access;          
        if(!empty($access->inner_access[$controller_id]))
        {
          $inner_access = $access->inner_access[$controller_id];
          // print_r($inner_access);
          if(in_array($inner_id,$inner_access))
            $check_main_access = true;                  
        }
      }
      if($check_main_access==false)
        redirect(base_url('admin/access_denied'));   
  }
  return $check_main_access;
}



/*category*/

function categoryname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('categories',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}
function subcategoryname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function statename($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('state',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}
function cityname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('city',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function userdetails($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}


function distributer_status($value)
{
  if($value==0)
  {
    $string = '<button class="btn btn-sm btn-primary">New</button>';
  }
  else if($value==1)
  {
    $string = '<button class="btn btn-sm btn-primary">Approved</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-primary">Under Review</button>';
  }
  else if($value==3)
  {
    $string = '<button class="btn btn-sm btn-primary">Reject</button>';
  }

  return $string;
} 


function distributer_app_status($value)
{
  if($value==0)
  {
    $string = '<span style="font-size: 12px !important;background: blue;color: white;padding:3px 5px;border-radius: 7px;">New</span>';
  }
  else if($value==1)
  {
    $string = '<span style="font-size: 12px !important;background: green;color: white;padding:3px 5px;border-radius: 7px;">Approved</span>';
  }
  else if($value==2)
  {
    $string = '<span style="font-size: 12px !important;background: black;color: white;padding:3px 5px;border-radius: 7px;">Under Review</span>';
  }
  else if($value==3)
  {
    $string = '<span style="font-size: 12px !important;background: red;color: white;padding:3px 5px;border-radius: 7px;">Reject</span>';
  }

  return $string;
} 






function kyc_details($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('kyc_records',array('user_id'=>$id,));  
  return $size;
}

function usersdetails($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));  
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "";
  }
  return $name;
}


/*--create user id*/

function generate_user_id() 
{
  $ci = & get_instance();
  $ci->db->select_max('user_id');
  $query = $ci->db->get('users');
  $last_user_id = $query->row()->user_id;
  
  if ($last_user_id == NULL || $last_user_id == 0) 
  {
    $next_user_id = 100;
  } 
  else 
  {
    $next_user_id = $last_user_id + 1;
  } 
  return $next_user_id;
}




function empcode($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->user_id;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}



function usermobile($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->mobile;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function useraddress($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->address;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function distributerfirm($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('kyc_records',array('user_id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->firm_name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function distributerfirmstate($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('kyc_records',array('user_id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->state;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}

function distributerfirmcity($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('kyc_records',array('user_id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->city;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}


function walletamt($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = currency_simble($size[0]->wallet);
  }
  else
  {
    $name = "00";
  }
  return $name;
}


function getasmlist_count($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users', array('asm_id' => $id,'role'=>4));
  
  // Count the number of rows where rsm_id matches
  return count($size);
}


function getrsmlist_count($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users', array('rsm_id' => $id,'role'=>4));
  
  // Count the number of rows where rsm_id matches
  return count($size);
}




function getdistributerlist_count($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users', array('sales_office_id' => $id,'role'=>5));
  
  // Count the number of rows where rsm_id matches
  return count($size);
}



function user_statename($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->state;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}



function user_city($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->city;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}


function user_image($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('users',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->city;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}



/*target status*/
function target_status($value)
{
  if($value==1)
  {
    $string = '<button class="btn btn-sm btn-primary" style="width: max-content;    padding: 1px 5px;height: max-content;">Submit</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-success" style="width: max-content;    padding: 1px 5px;height: max-content;">Accept</button>';
  }
  else if($value==3)
  {
    $string = '<button class="btn btn-sm btn-danger" style="width: max-content;    padding: 1px 5px;height: max-content;">Reject</button>';
  }
 
  return $string;
} 


function rsm_target_status($value)
{
  if($value==1)
  {
    $string = '<button class="btn btn-sm btn-primary" style="width: max-content;    padding: 1px 5px;height: max-content;">New</button>';
  }
  else if($value==2)
  {
    $string = '<button class="btn btn-sm btn-success" style="width: max-content;    padding: 1px 5px;height: max-content;">Accept</button>';
  }
  else if($value==3)
  {
    $string = '<button class="btn btn-sm btn-danger" style="width: max-content;    padding: 1px 5px;height: max-content;">Reject</button>';
  }
 
  return $string;
}


function skuname($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('product',array('id'=>$id,));
  if(!empty($size))
  {
    $name = ($size[0]->name);
  }
  else
  {
    $name = "00";
  }
  return $name;
}


function target_type_status($value)
{
  if($value==1)
  {
    $string = 'SKU';
  }
  else if($value==2)
  {
    $string = 'Value Wise';
  }
 
  return $string;
} 

function countrsm_target($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('target', array('rsm_id' => $id,'status'=>1));
  
  // Count the number of rows where rsm_id matches
  return count($size);
}

  function schema_status($value)
{
  if($value==0)
  {
    $string = '<span style="font-size: 12px !important;background: red;color: white;padding:3px 5px;border-radius: 7px;">DeActive</span>';
  }
  else if($value==1)
  {
    $string = '<span style="font-size: 12px !important;background: green;color: white;padding:3px 5px;border-radius: 7px;">Active</span>';
  }
  return $string;
}





function raiseissue($id)
{
  $ci = & get_instance();
  $size = $ci->crud->selectDataByMultipleWhere('raise_issue',array('id'=>$id,));
  if(!empty($size))
  {
    $name = $size[0]->name;
  }
  else
  {
    $name = "Not Found..";
  }
  return $name;
}



function raiseexcel($value)
{
  if($value==1)
  {
    $string = 'New';
  }
  else if($value==2)
  {
    $string = 'Pending';
  }
  else if($value==3)
  {
    $string = 'Closed';
  }
 
  return $string;
}














/*------------------user app=--------------*/



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
    $device_id = uniqid();
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
        $data['image'] = base_url('upload/').$user->profile_image;
      }
      else
      {
        $data['image'] = base_url('upload/').$user->profile_image;
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












// function token_auth()
// {
//     $ci =& get_instance();
//     $result = [];
//     $headers = getallheaders();

//     $access_token = $ci->session->userdata('access_token');
    
//     if(isset($headers['token']) || !empty($access_token))
//     {
//       if(empty($access_token))
//         $token_string = $headers['token'];
//       else
//         $token_string = $access_token;
        
//       $token_array = decode_token($token_string);
//       if(!empty($token_array->user_id)) $user_id = $token_array->user_id; else $user_id = 0;
//       if(!empty($token_array->password)) $password = $token_array->password;else $password = '';
//       if(!empty($token_array->hours)) $hours = $token_array->hours;else $hours = 0;
//       if(!empty($token_array->date_time)) $date_time = $token_array->date_time;else $date_time = '';

//       $datetime_1 = $date_time; 
//       $datetime_2 = date("Y-m-d H:i:s"); 
//       $start_datetime = new DateTime($datetime_1); 
//       $diff = $start_datetime->diff(new DateTime($datetime_2)); 
//       $total_minutes = ($diff->days * 24 * 60); 
//       $total_minutes += ($diff->h * 60); 
//       $total_minutes += $diff->i; 
//       $total_hours = $total_minutes/60;
//       if($total_hours<=$hours || 1==1)
//       {
//           $user = $ci->db->get_where("users",array("id"=>$user_id,))->result_object();          
//           if(!empty($user))
//           {
//               $user = $user[0];
//               if($user->password!=$password)
//               {
//                   $result['status'] = "401";
//                   $result['message'] = "Invailid user...";
//                   $result['data'] = [];
//                   echo json_encode($result);
//                   die;
//               }
//               else
//               {
//                 return $token_array;
//               }
//           }
//           else
//           {
//               $result['status'] = "401";
//               $result['message'] = "Invailid user...";
//               $result['data'] = [];
//               echo json_encode($result);
//               die;
//           }
//       }
//       else
//       {
//           $result['status'] = "401";
//           $result['message'] = "Token Expired...";
//           $result['data'] = [];
//           echo json_encode($result);
//           die;
//       }
//     }
//     else
//     {
//         $result['status'] = "401";
//         $result['message'] = "Token Required...";
//         $result['data'] = [];
//         echo json_encode($result);
//         die;
//     } 
// }