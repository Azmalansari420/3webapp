<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_filter extends CI_Controller 
{



	function image_by_colorsize()
    {
        $result = array();        

        $p_id = $this->input->post("p_id");
        $size_id = $this->input->post("size_id");
        $color_id = $this->input->post("color_id");

        $rowd = array();
        $price = '';

        if(!empty($p_id) && !empty($color_id))
        {
            $where = array(
                    "p_id"=>$p_id,
                    // "size_id"=>$size_id,
                    "color_id"=>$color_id,
                );
            $this->db->group_by('image');
            $rowd = $this->db->get_where("all_images",$where)->result_object();
        }

        $html = '';        
        $html .= $this->load->view("app/user/product-image",array('rowd'=>$rowd),true);

        $sizehtml = '';      
        $this->db->group_by('size_id');
        $sizelist = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$p_id,'color_id'=>$color_id));  
        if(!empty($sizelist)) {
            foreach ($sizelist as $key => $value) {
                $size_name = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id));
                $sizehtml .= '<span style="margin-right: 2px;" class="badge badge-dark size_value ' . ($key==0 ? 'active-size' : '') . '" data-size_id="' . $size_name[0]->id . '">' . $size_name[0]->name . '</span>';

                $this->db->group_by('size_id');
                $getprice = $this->db->get_where("all_images",array('size_id'=>$size_id,'p_id'=>$p_id,'size_id'=>$value->size_id))->result_object();

                // print_r($getprice);


                $price = array(
                    "mrp_price"=>currency_simble($getprice[0]->mrp_price),
                    "sale_price"=>currency_simble($getprice[0]->sale_price),
                    "discount"=>discount($getprice[0]->mrp_price,$getprice[0]->sale_price),
                ); 
            }
        }           
		
        if(!empty($p_id))
        {
            $result['message'] = "data fetch Successfully.";
            $result['status']  = "200";
            $result['html']    = $html;
            $result['sizelist']    = $sizehtml;
            $result['price']    = $price;
        }
        else
        {
            $result['message'] = "Somthing Wrong..";
            $result['status']  = "400";
            $result['html']    = $html;
            $result['sizelist']    = $sizehtml;
            $result['price']    = $price;
        }

        echo json_encode($result);
    }


   /*=========add to cart single=============*/
    function add_to_cart_single()
    {
        $result = array();
        $sale_price = 0;
        $count = 0;
        $p_image = '';
        $p_name = '';

        $user_id = $this->session->userdata("user")['id'];

        $p_id = $this->input->post('p_id');
        $size_id = $this->input->post('size_id');
        $color_id = $this->input->post('color_id');
        $quantity = $this->input->post('quantity');
        $addeddate = date('Y-m-d H:i:s');

        $allimage = $this->db->group_by('p_id')->select('id,p_id,sale_price,color_id,size_id,image,name')->get_where('all_images',array('p_id'=>$p_id,'size_id'=>$size_id,'color_id'=>$color_id))->result_object();        
        
        $sale_price = $allimage[0]->sale_price;
        $p_image = $allimage[0]->image;
        $p_name = $allimage[0]->name;

        $user_data= array(                
                "p_id"=>$p_id,
                "user_id"=>$user_id,
                "image"=>$p_image,
                "name"=>$p_name,
                "size_id"=>$size_id,
                "color_id"=>$color_id,
                "quantity"=>$quantity,
                "sale_price"=>$sale_price,
                "addeddate"=>$addeddate,
            );

        $get_cart = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array("p_id"=>$p_id,"user_id"=>$user_id,'color_id'=>$color_id,'size_id'=>$size_id,));

        if(empty($get_cart))
        {
            $this->db->insert("add_to_temp_cart",$user_data);
            $count = count(cart_products());
            $result['message'] = "Add to Cart Successfully.";
            $result['status']  = "200";
            $result['count']    = $count;
        }        
        else
        {
            $count = count(cart_products());
            $this->db->update('add_to_temp_cart',$user_data,array("user_id"=>$user_id,"p_id"=>$p_id,'color_id'=>$color_id,'size_id'=>$size_id));
            $result['message'] = "Update Successfully.";
            $result['status']  = "200";
            $result['count']    = $count;
        }
        echo json_encode($result);
    }


    /*delete cart*/

     function delete_cart_item()
    {
        $result = array();
        $finalamt = '';

        $id = $this->input->post('id');
        $user_id = $this->session->userdata("user")['id'];

        $user_data= array(                
                "id"=>$id,
                "user_id"=>$user_id,
            );
        if(!empty($id))
        {
            $this->db->delete("add_to_temp_cart",$user_data,array('id'=>$id,'user_id'=>$user_id,));
            $count = count(cart_products());

            $user_id = $this->session->userdata("user")['id'];  
            $coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
            $coupon = 0;
            if(!empty($coponapply[0]->coupon)) 
            {
                $coupon = $coponapply[0]->coupon;
            }
            $applied_coupon = applied_coupon($coupon,'');
            
            $finalamt = currency_simble($applied_coupon['after_discount_final_price']);

            $result['message'] = "Item Remove Successfully.";
            $result['status']  = "200";
            $result['data']    = $user_data;
            $result['count']    = $count;
            $result['finalamt']    = $finalamt;
            $result['cart_page_data']    = $this->load->view('app/user/include/cart-page','',true);
        }
        else
        {
            $count = count(cart_products());
            $result['message'] = "Wrong Product ID.";
            $result['status']  = "400";
            $result['count']    = $count;
            $result['data']    = $user_data;
            $result['cart_page_data']    = $this->load->view('app/user/include/cart-page','',true);
        }
        echo json_encode($result);
    }

    //-----------------update cart-------------
    function update_cart_item()
    {
        $result = array();
        $finalamt = '';

        $id = $this->input->post('id');
        $user_id = $this->session->userdata("user")['id'];
        $quantity = $this->input->post('quantity');

        $user_data= array(                
            "id"=>$id,
            "user_id"=>$user_id,
            "quantity"=>$quantity,
        );


        if(!empty($id))
        {
            $this->db->update("add_to_temp_cart",array('quantity'=>$quantity),array('id'=>$id,'user_id'=>$user_id,));

            $user_id = $this->session->userdata("user")['id'];  
            $coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
            $coupon = 0;
            if(!empty($coponapply[0]->coupon)) 
            {
                $coupon = $coponapply[0]->coupon;
            }
            $applied_coupon = applied_coupon($coupon,'');
            
            $finalamt = currency_simble($applied_coupon['after_discount_final_price']);

            $result['message'] = "Quantity Update successfully.";
            $result['status']  = "200";
            $result['data']    = $user_data;
            $result['finalamt']    = $finalamt;
            $result['cart_page_data']    = $this->load->view('app/user/include/cart-page','',true);
        }
        else
        {
            $result['message'] = "Wrong Product ID";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    
    }

    




    /*apply coupon*/
    public function apply_couponcode()
    {
        $result = array();

        $coupon = $this->input->post('coupon');
        $user_id = $this->session->userdata("user")['id'];  
        
        $coupon_data = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$coupon));
        if(!empty($coupon_data))
        { 
            if($coupon_data[0]->name===$coupon)
            {
                if(!empty($coupon_data))
                $coupen_date = $coupon_data[0]->expirey_date;
                $todaydate = date('Y-m-d');

                if($todaydate<=$coupen_date)
                {
                    if(!empty($coupon_data))
                    {
                        $coupon_data = $coupon_data[0];
                        $query = $this->crud->selectDataByMultipleWhere('order_coupon',array('coupon'=>$coupon,"user_id"=>$user_id,"status"=>0,'coupen_type'=>$coupon_data->coupen_type,"coupon_id"=>$coupon_data->id,));
                        
                        if(empty($query))
                            $this->db->insert("order_coupon",array("coupon"=>$coupon_data->name,"discount"=>$coupon_data->amount,"type"=>$coupon_data->type,'user_id'=>$user_id,"coupon_id"=>$coupon_data->id,'coupen_type'=>$coupon_data->coupen_type,));


                        $applied_coupon = applied_coupon($coupon,'');
                        if($applied_coupon['discount_amount']>0)
                        {
                            $finalamt = currency_simble($applied_coupon['after_discount_final_price']);

                            $result['message'] = "Coupon Applied Successfully.";
                            $result['status']  = "200";
                            $result['data']    = $coupon_data; 
                             $result['finalamt']    = $finalamt;
                            $result['checkout_card']    = $this->load->view('app/user/include/cart-page','',true);          
                        }
                        else
                        {
                            $this->db->delete('order_coupon',array("coupon"=>$coupon_data->name,"discount"=>$coupon_data->amount,"type"=>$coupon_data->type,'user_id'=>$user_id,"coupon_id"=>$coupon_data->id,'coupen_type'=>$coupon_data->coupen_type,));
                            $result['message'] = "Wrong Coupon Cod11e.";
                            $result['status']  = "400";
                            $result['data']    = [];

                        }
                    }
                    else
                    {
                        $result['message'] = "Check Your Coupon.";
                        $result['status']  = "400";
                        $result['data']    = [];
                    }
                }
                else
                {
                    $result['message'] = "Coupon Expired.";
                    $result['status']  = "400";
                    $result['data']    = [];
                }
            }
            else
            {
                $result['message'] = "Coupon Not Found.";
                $result['status']  = "400";
                $result['data']    = [];
            }
        }
        else
        {
            $result['message'] = "Coupon Not Found.";
            $result['status']  = "400";
            $result['data']    = [];
        }
        echo json_encode($result);
    }

    /*---delete coupon--*/
    function delete_coupon()
    {
        $result = array();
        $user_id = $this->session->userdata("user")['id'];  
        if(!empty($user_id))
        {
            $this->db->delete('order_coupon',array('user_id'=>$user_id,'status'=>0,));

            $user_id = $this->session->userdata("user")['id'];  
            $coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
            $coupon = 0;
            if(!empty($coponapply[0]->coupon)) 
            {
                $coupon = $coponapply[0]->coupon;
            }
            $applied_coupon = applied_coupon($coupon,'');
            
            $finalamt = currency_simble($applied_coupon['after_discount_final_price']);

            $result['message'] = "Coupon Delete Successfully.";
            $result['status']  = "200";
            $result['data']    = $user_id; 
            $result['finalamt']    = $finalamt;
            $result['checkout_card']    = $this->load->view('app/user/include/cart-page','',true);
        }
        else
        {
            $result['message'] = "Wrong Code";
            $result['status']  = "400";
            $result['data']    = [];
            $result['checkout_card']    = $this->load->view('app/user/include/cart-page','',true);
        }
        echo json_encode($result);
    }


    /*final checkout*/

    public function final_order()
    {
        $result = array();

        $url = "";
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $order_id = $today . $rand;

        $user_id = $this->session->userdata("user")['id'];
        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token");  


        $name = $this->input->post('name');
        $email = $this->input->post('email');           
        $mobile = $this->input->post('mobile');         
        $address = $this->input->post('address');
        $locality = $this->input->post('locality');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $pincode = $this->input->post('pincode');

        $order_note = $this->input->post('order_note');         
        $payment_type = 0;
        $order_status = 0;
        $addeddate = date('Y-m-d H:i:s');
        $orderdate = date('Y-m-d');

        $order_amount = applied_coupon('','');  
        $shipping_charge = $order_amount['shipping_charge'];
        $sub_total = $order_amount['sub_total'];
        $finalprice = $order_amount['finalprice'];
        $discount = $order_amount['discount'];
        $discount_amount = $order_amount['discount_amount'];
        $after_discount_final_price = $order_amount['after_discount_final_price'];

    
        $data = array(
            "orderdate"=>$orderdate,
            "order_id"=>$order_id,
            "user_id"=>$user_id,
            "name"=>$name,
            "email"=>$email,
            "mobile"=>$mobile,
            "address"=>$address,
            "locality"=>$locality,
            "state"=>$state,
            "city"=>$city,
            "pincode"=>$pincode,
            "order_note"=>$order_note,
            "payment_type"=>$payment_type,
            "addeddate"=>$addeddate,
            "shipping_charge"=>$shipping_charge,
            "sub_total"=>$sub_total,
            "finalprice"=>$finalprice,
            "after_discount_final_price"=>$after_discount_final_price,
            "discount"=>$discount,
            "discount_amount"=>$discount_amount,
            "order_status"=>$order_status,
        );

                                    
        $cartmodel = cart_products();
        foreach($cartmodel as $key => $value)
        {   
            $order_data = array(
                "user_id"=>$user_id,
                "p_id"=>$value->p_id,
                "quantity"=>$value->quantity,
                "order_id"=>$order_id,
                "color_id"=>$value->color_id,
                "size_id"=>$value->size_id,
                "sale_price"=>$value->sale_price,
                "image"=>$value->image,
                "name"=>$value->name,
            );
            $this->crud->insert('orders',$order_data);
        }
        
        if(!empty($user_id))
        {
            $this->crud->insert('finalorder',$data);
            $url = base_url('app/user/payment.php?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);

            $result['message'] = "Loading...";
            $result['status']  = "200";
            $result['data']    = $data;
            $result['url']    = $url;
        }
        else
        {
            $result['message'] = "Already Exits";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = [];
        }
        echo json_encode($result);  
    }


    /*payment type select*/

    public function payment_type_select()
    {
        $result = array();

        $url = "";

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 
        $user_id = $this->session->userdata("user")['id'];

        $order_id = $this->input->post('order_id');
        $payment_type = $this->input->post('payment_type');

        if(!empty($order_id))
        {
           $this->db->update("finalorder",array("payment_type"=>$payment_type,),array('user_id'=>$user_id,'order_status'=>0,'order_id'=>$order_id));
           /*cod*/
           if($payment_type==1)
           {
                $this->db->update('finalorder',array('payment_id'=>$order_id,'status'=>1,'order_status'=>1),array('order_id'=>$order_id,'user_id'=>$user_id));
                $this->db->delete("add_to_temp_cart",array("user_id"=>$user_id,));
                $this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>$user_id,'status'=>0,));

                $url = base_url('app/user/cod-success?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);
           }
           /*raqzorpay*/
           else if($payment_type==2)
           {
            $url = base_url('api/Razorpay/pay?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);
           }
           /*phonepay*/
           else if($payment_type==3)
           {
            $url = base_url('api/Phonepay/payment?order_id='.$order_id.'&device_id='.$device_id.'&firebase_token='.$firebase_token);
           }

            $result['message'] = "Loading...";
            $result['status']  = "200";
            $result['data']    = $payment_type;
            $result['url']    = $url;
        }
        else
        {
            $result['message'] = "Order ID Not Found.";
            $result['status']  = "400";
            $result['data']    = [];
            $result['url']    = '';
        }

        echo json_encode($result);  
    }



/*add to wishklist*/
    public function addtowishlist_single()
    {
        $result = array();
        $sale_price = 0;
        $count = 0;

        $device_id = $this->session->userdata("device_id");  
        $firebase_token = $this->session->userdata("firebase_token"); 
        $user_id = $this->session->userdata("user")['id'];

        $p_id = $this->input->post('p_id');
        $addeddate = date('Y-m-d H:i:s');

        $user_data= array(                
                "p_id"=>$p_id,
                "user_id"=>$user_id,
                "addeddate"=>$addeddate,
            );

        $get_cart = $this->crud->selectDataByMultipleWhere('add_to_temp_wishlist',array("p_id"=>$p_id,"user_id"=>$user_id,));

        if(empty($get_cart))
        {
            $this->db->insert("add_to_temp_wishlist",$user_data);
            $count = (count_wishlist());
            $result['message'] = "Add to Wishlist Successfully.";
            $result['status']  = "200";
            $result['data']    = $this->load->view('app/user/include/cart-page','',true);
            $result['count']    = $count;
        }        
        else
        {
            $this->db->update('add_to_temp_wishlist',$user_data,array("user_id"=>$user_id,"p_id"=>$p_id,));
            $count = (count_wishlist());
            $result['message'] = "Already Added.";
            $result['status']  = "200";
            $result['data']    = $this->load->view('app/user/include/cart-page','',true);
            $result['count']    = $count;
        }
        echo json_encode($result);
    }


    /*delete wishlist*/
    function delete_wishlist_item()
    {
        $result = array();
        
        $id = $this->input->post('id');
        $user_id = $this->session->userdata("user")['id'];
        
        $user_data= array(                
                "id"=>$id,
                "user_id"=>$user_id,
            );
        if(!empty($id))
        {
            $this->db->delete("add_to_temp_wishlist",$user_data,array('id'=>$id,'user_id'=>$user_id,));

            $count = (count_wishlist());

            $result['message'] = "Item Remove successfully";
            $result['status']  = "200";
            $result['data']    = $this->load->view('app/user/include/wishlist-page','',true);
            $result['count']    = $count;
        }
        else
        {
            $count = (count_wishlist());
            $result['message'] = "Wrong Product ID";
            $result['status']  = "400";
            $result['data']    = $this->load->view('app/user/include/wishlist-page','',true);
            $result['count']    = $count;
        }
        echo json_encode($result);
    }






    /*filter shop pagew*/

    public function product_filter()
    {       
        $result = array();
        $html = '';

        $color = $this->input->post('color');
        $size = $this->input->post('size');
        $cat_id = $this->input->post('cat_name');
        $sort_op = $this->input->post('sort_op');

        if(!empty($color))
        {   
            // $this->db->group_by('color_id');
            $color = explode(",", $color);  
            $this->db->where_in("color_id",$color);
        }
        if(!empty($size))
        { 
            // $this->db->group_by('size_id');
            $size = explode(",", $size);
            $this->db->where_in("size_id",$size);
        }
        if(!empty($cat_id))
        {
            // $this->db->group_by('cat_id');
            $cat_id = explode(",", $cat_id);
            $this->db->where_in("cat_id",$cat_id);
        }        

        if(!empty($sort_op))
        {
            if($sort_op==1)
            {
                $this->db->order_by('sale_price asc');
            }
            else
            {
                $this->db->order_by('sale_price desc');
            }
        }
        $this->db->group_by('p_id');
        // $this->db->group_by('color_id');
        $query = $this->db->get('all_images');
        $all_image = $query->result_object();
        
        foreach($all_image as $key => $value)
        {
            $html .= $this->load->view('app/user/include/shop-card',array("value"=>$value,),true);

        }
        if(!empty($html))
        {
            $result['message'] = "data fetch successfully";
            $result['status']  = "200";
            $result['data']    = $html;
        }
        else
        {
            $result['message'] = "data not fetch";
            $result['status']  = "400";
            $result['data']    = [];
        }

        echo json_encode($result);
    }




    /*prooduct search*/

    public function searchproduct()
    {
        $result = array();
        $html = '';
        $search = $this->input->post('search');

        $this->db->like('name', $search);
        $this->db->order_by('id desc');
        $query = $this->db->get('product');
        $all_image = $query->result_object();

        foreach($all_image as $key => $value)
        {
            $html .= $this->load->view('app/user/include/search-card',array("value"=>$value,),true);

        }

        if(!empty($html))
        {
            $result['message'] = "data fetch successfully";
            $result['status']  = "200";
            $result['data']    = $html;
        }
        else
        {
            $result['message'] = "data not fetch";
            $result['status']  = "400";
            $result['data']    = "<p class='text-center' style='font-weight: 700;font-size: 22px;'>Not Found</p>";
        }

        echo json_encode($result);
    }





    /*notification add more*/

    public function notificationlist()
    {
        $result = array();
        $html = '';
       
        $page = $this->input->post("page");
        $limit = 8;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $notification = $this->crud->selectDataByMultipleWhere('notification',array('status'=>1,'adddate !='=>$today,'type'=>1));

        if(!empty($notification))
        {
            $response_data['data'] = $notification;
            $html = $this->load->view('app/user/include/notification-list',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }





    /*coupon add more*/

    public function couponlist()
    {
        $result = array();
        $html = '';
       
        $page = $this->input->post("page");
        $limit = 8;
        $offset = 0;

        if($page>0)
        {
            $offset = $page*$limit;
        }
        $this->db->limit($limit,$offset);

        $today = date('Y-m-d');
        $this->db->order_by('id desc');
        $coupen_code = $this->crud->selectDataByMultipleWhere('coupen_code',array('status'=>1,'expirey_date >= '=>$today,));

        if(!empty($coupen_code))
        {
            $response_data['data'] = $coupen_code;
            $html = $this->load->view('app/user/include/coupen-list',$response_data,true);

            $result['status'] = '200';
            $result['message'] = 'SUCCESS';
            $result['data'] = $html;
        }
        else
        {
            $result['status'] = '400';
            $result['message'] = 'No More';
            $result['data'] = [];
        }
        echo json_encode($result);
    }
















 

}