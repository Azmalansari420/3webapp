<?php

class Product extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Product',
						   	'table_name'=>'product',
						   	'upload_path'=>'media/uploads/product/',
						   	'load_path'=>'admin/product/',
						   	'redirect_path'=>'admin_con/product/',
						   	'back_url'=>'product',
						   	'add_url'=>'product',
						   	'edit_url'=>'product',
						   	'delete_url'=>'product',
						   	'view_url'=>'product',
						   	'table_url'=>'admin/product/table',
						   	'status_value'=>'product',
						   	'multiple_delete'=>'admin_con/product/delete_all',
						   	'pagination_url'=>'admin_con/product/get_table_data',
						   	'controller_name'=>'product',
						   	'page_name'=>'product.php',
						   	'pagination_limit'=>'10',
						   ); 


   //--check user login or not
	public function __construct()
    {
    	parent::__construct(); 
        chech_admin_login(); 
        check_controller_access(7);
    }



	//insert

	function add()
	{
		check_controller_inner_access(7,2);
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			if($_FILES['thumb_image']['name']!='')
			{
				$bthumb_image = rand().'.'.explode(".", $_FILES['thumb_image']['name'])[1];
				$path = $this->arr_values['upload_path'].$bthumb_image;
				move_uploaded_file($_FILES['thumb_image']['tmp_name'],$path);
			}
			else
			{
				$bthumb_image = "";
			}
			
			$thumb_image = $bthumb_image;
			$cat_id = $this->input->post('cat_id');
			$name = $this->input->post('name');
			$slug = slug($name);
			$rating = $this->input->post('rating');
			$skucode = $this->input->post('skucode');
			$small_info = $this->input->post('small_info');
			$specification = $this->input->post('specification');
			$description = $this->input->post('description');
			$show_home = $this->input->post('show_home');
			$most_populer = $this->input->post('most_populer');
			$best_product = $this->input->post('best_product');
			$flash_sale = $this->input->post('flash_sale');
			$deals_of_today = $this->input->post('deals_of_today');
			$status = $this->input->post('status');			
			$addeddate = date('Y-m-d H:i:s');

			/*---add card Item---*/
			$color_id = $this->input->post('color_id');
			$image_arra = array();
			$all_size = array();

			foreach ($color_id as $key => $value)
			{
				$m_images = array();
				if(!empty($_FILES['image'.$key]['name']))
				{
					$images_name = $_FILES['image'.$key]['name'];
					$images_temp = $_FILES['image'.$key]['tmp_name'];
				}
				if(!empty($images_name))
				{
					$size_id = $this->input->post('size_id'.$key);
					$stock = $this->input->post('stock'.$key);
					$mrp_price = $this->input->post('mrp_price'.$key);
					$sale_price = $this->input->post('sale_price'.$key);

					$all_size[] = $size_id;
					$all_stock[] = $stock;
					$all_price[] = $mrp_price;
					$all_sale_price[] = $sale_price;

					foreach ($images_name as $keyimg => $valueimg)
					{						
						$ext = explode(".",$images_name[$keyimg]);
						$ext = end($ext);
						$thumb_img = str_replace($ext,".",slug(rand().$keyimg.$images_name[$keyimg])).$ext;
						$path2 = $this->arr_values['upload_path'].$thumb_img;
						if(move_uploaded_file($images_temp[$keyimg],$path2))
						{
							$m_images[] = $thumb_img;							
						}						
					}					 
					$image_arra[] = array(
						"name"=>$name,
						"cat_id"=>$cat_id,
						"size_id"=>$size_id,
						"color_id"=>$color_id[$key],
						"images"=>$m_images,
						"stock"=>$stock,
						"mrp_price"=>$mrp_price,
						"sale_price"=>$sale_price,
					);	
				}
			}

			$all_image_color_size = json_encode($image_arra);
			$all_images = $all_image_color_size;

			/*---insert data--*/
			$data = array(
				"thumb_image"=>$thumb_image,
				"cat_id"=>$cat_id,
				"name"=>$name,
				"slug"=>$slug,
				"rating"=>$rating,
				"skucode"=>$skucode,
				"small_info"=>$small_info,
				"specification"=>$specification,
				"description"=>$description,
				"show_home"=>$show_home,
				"most_populer"=>$most_populer,
				"best_product"=>$best_product,
				"flash_sale"=>$flash_sale,
				"deals_of_today"=>$deals_of_today,
				"alldata"=>$all_images,
				"status"=>$status,
				"addeddate"=>$addeddate,
			);



			$this->crud->insert($this->arr_values['table_name'],$data);
			$insert_id = $this->db->insert_id();
			// ---all images------
			$this->db->delete("all_images",array("p_id"=>$insert_id,));
			if(!empty($image_arra))
			{
				foreach($image_arra as $key => $value)
				{
					$sizes = $value['size_id'];
	        		$stocks = $value['stock'];
	        		$mrp_price = $value['mrp_price'];
	        		$sale_price = $value['sale_price'];
	        		$images = $value['images'];
	        		foreach ($sizes as $keysize => $valuesize)
	        		{
	        			foreach ($images as $keyimage => $valueimage)
	        			{
			        		$images_data = array(
								"cat_id"=>$cat_id,
			        			"name"=>$name,
			        			"p_id"=>$insert_id,
			        			"size_id"=>$sizes[$keysize],
			        			"color_id"=>$value['color_id'],
			        			"image"=>$valueimage,
			        			"stock"=>$stocks[$keysize],
			        			"mrp_price"=>$mrp_price[$keysize],
			        			"sale_price"=>$sale_price[$keysize],
			        		);
			        		$this->db->insert('all_images',$images_data);
			        	}
		        	}
				}
			}

			/*for slug*/
			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where($this->arr_values['table_name'],array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,$this->arr_values['table_name'],$this->arr_values['controller_name'],$old_slug,$this->arr_values['page_name']);
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update($this->arr_values['table_name'],$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('message','Record has been Successfully Saved..');
			redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$this->load->view($this->arr_values['load_path'].'add',$data);
	}


	//----list dekhney ke lia 

	function listing()
	{		
		check_controller_inner_access(7,1);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['pagination_url'] = $this->arr_values['pagination_url'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['multiple_delete'] = base_url($this->arr_values['multiple_delete']);
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	public function get_table_data() 
	{
	  check_controller_inner_access(7,1);
	  $search = $this->input->post('search');
	  $limit = $this->arr_values['pagination_limit'];
	  $offset = $this->input->post('offset');

	  $this->db->like('name', $search);
	  $this->db->or_like('id', $search);
	  $this->db->order_by('id desc');
	  $data['ALLDATA'] = $this->db->get($this->arr_values['table_name'], $limit, $offset)->result();

	  $total_rows = $this->db->count_all_results($this->arr_values['table_name']);
	  $pagination_links = '';
	  $current_page = ($offset / $limit) + 1;

	  if ($total_rows > $limit) {
	    for ($i = 0; $i < ceil($total_rows / $limit); $i++) 
	    {
			  $pagination_links .= '<a href="#" class="pagination-link btn btn-primary btn-sm ' . ($i == $current_page - 1 ? 'active-page' : '') . '" style="margin: 5px 3px; border-radius: 25%; font-weight: bold;" data-offset="' . ($i * $limit) . '">' . ($i + 1) . '</a>';
			}
	  }

	  if (!empty($pagination_links)) {
	    $data['pagination_links'] = $pagination_links;
	  } else {
	    $data['pagination_links'] = '';
	  }


	  $total_pages = ceil($total_rows / $limit);

	  $data['upload_path'] = $this->arr_values['upload_path'];
	  $data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
	  $data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
	  $data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');

	  $definevariable = array(
	  	'ALLDATA' => $data['ALLDATA'],
	  	'upload_path'=>$data['upload_path'],
	  	'view_url'=>$data['view_url'],
	  	'edit_url'=>$data['edit_url'],
	  	'delete_url'=>$data['delete_url'],
	  	'limit'=>$limit,
	  	'total_rows'=>$total_rows,
	  	'offset'=>$offset,
	  	'total_pages'=>$total_pages,
	  );

	  $html = $this->load->view($this->arr_values['table_url'], $definevariable, true);
	  echo json_encode(array('html' => $html, 'pagination_links' => $data['pagination_links'],'limit'=>$limit));
}




	//------------delete 

	public function delete()
	  {
	  	check_controller_inner_access(7,4);
	  	$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->arr_values['table_name']);
		$this->session->set_flashdata('message','Record has been Successfully Delete..');
	  }

	  /*-------delete multiple*/
	  function delete_all()
		{
			check_controller_inner_access(7,4);
			$ids = $this->input->post('id');
		    if (!empty($ids)) 
		    {
		    	$this->db->where_in('id', $ids);
		        $this->db->delete($this->arr_values['table_name']);
		        $this->session->set_flashdata('message','Record has been Successfully Delete..');
		    }
		}


	//----------------edit

	function edit()
	{
		check_controller_inner_access(7,3);		 
		$args=func_get_args();
		if(isset($_POST['submit']))
		{
			date_default_timezone_set('Asia/Kolkata');

			if($_FILES['thumb_image']['name']!='')
			{
				$thumb_image = time().'.'.explode(".", $_FILES['thumb_image']['name'])[1];
				$path = $this->arr_values['upload_path'].$thumb_image;
				move_uploaded_file($_FILES['thumb_image']['tmp_name'],$path);
			}
			else
			{
				$thumb_image = $_POST['oldthumb_image'];
			}

			$thumb_image = $thumb_image;
			$cat_id = $this->input->post('cat_id');
			$name = $this->input->post('name');
			$slug = slug($name);
			$rating = $this->input->post('rating');
			$skucode = $this->input->post('skucode');
			$small_info = $this->input->post('small_info');
			$specification = $this->input->post('specification');
			$description = $this->input->post('description');			
			$show_home = $this->input->post('show_home');
			$most_populer = $this->input->post('most_populer');
			$best_product = $this->input->post('best_product');
			$flash_sale = $this->input->post('flash_sale');
			$deals_of_today = $this->input->post('deals_of_today');
			$status = $this->input->post('status');			
			$modifieddate = date('Y-m-d H:i:s');

			/*add image*/
			$color_id = $this->input->post('color_id');
			
			$image_arra = array();
			$all_size = array();
			foreach ($color_id as $key => $value)
			{
				$m_images = array();
				if(!empty($_FILES['image'.$key]['name']))
				{
					$images_name = $_FILES['image'.$key]['name'];
					$images_temp = $_FILES['image'.$key]['tmp_name'];
				}
				$oldimage = $this->input->post('oldimage'.$key);
				if(!empty($oldimage))
				{
					foreach ($oldimage as $keyold => $valueold){
						$m_images[] = $valueold;
					}
				}
				if(!empty($images_name))
				{
					$size_id = $this->input->post('size_id'.$key);
					$stock = $this->input->post('stock'.$key);
					$mrp_price = $this->input->post('mrp_price'.$key);
					$sale_price = $this->input->post('sale_price'.$key);

					$all_size[] = $size_id;
					$all_stock[] = $stock;
					$all_price[] = $mrp_price;
					$all_sale_price[] = $sale_price;

					foreach ($images_name as $keyimg => $valueimg)
					{						
						$ext = explode(".",$images_name[$keyimg]);
						$ext = end($ext);
						$thumb_img = str_replace($ext,".",slug(rand().$keyimg.$images_name[$keyimg])).$ext;
						$path2 = $this->arr_values['upload_path'].$thumb_img;
						if(move_uploaded_file($images_temp[$keyimg],$path2))
						{
							$m_images[] = $thumb_img;							
						}						
					}					 
					$image_arra[] = array(
						"name"=>$name,
						"cat_id"=>$cat_id,
						"size_id"=>$size_id,
						"color_id"=>$color_id[$key],
						"images"=>$m_images,
						"stock"=>$stock,
						"mrp_price"=>$mrp_price,
						"sale_price"=>$sale_price,
					);	
				}
			}

			$all_image_color_size = json_encode($image_arra);
			$all_images = $all_image_color_size;

			/*---update data--*/
			$data = array(
				"thumb_image"=>$thumb_image,
				"cat_id"=>$cat_id,
				"name"=>$name,
				"slug"=>$slug,
				"rating"=>$rating,
				"skucode"=>$skucode,
				"small_info"=>$small_info,
				"specification"=>$specification,
				"description"=>$description,
				"show_home"=>$show_home,
				"most_populer"=>$most_populer,
				"best_product"=>$best_product,
				"flash_sale"=>$flash_sale,
				"deals_of_today"=>$deals_of_today,
				"alldata"=>$all_images,
				"status"=>$status,
				"modifieddate"=>$modifieddate,
			);			

			$this->crud->update($this->arr_values['table_name'],$args[0],$data);
			$insert_id = $args[0];

			$this->db->delete("all_images",array("p_id"=>$insert_id,));
	        if(!empty($image_arra))
	        {
	        	foreach ($image_arra as $key => $value)
	        	{
	        		$sizes = $value['size_id'];
	        		$stocks = $value['stock'];
	        		$mrp_price = $value['mrp_price'];
	        		$sale_price = $value['sale_price'];
	        		$images = $value['images'];
	        		foreach ($sizes as $keysize => $valuesize)
	        		{
	        			foreach ($images as $keyimage => $valueimage)
	        			{
			        		$images_data = array(
								"name"=>$name,
								"cat_id"=>$cat_id,
			        			"p_id"=>$insert_id,
			        			"size_id"=>$sizes[$keysize],
			        			"color_id"=>$value['color_id'],
			        			"image"=>$valueimage,
			        			"stock"=>$stocks[$keysize],
			        			"mrp_price"=>$mrp_price[$keysize],
			        			"sale_price"=>$sale_price[$keysize],
			        		);
			        		$this->db->insert('all_images',$images_data);
			        	}
		        	}
	    		}
	    	}



			$old_slug = '';
			$old_slug_data = $this->db->select("slug")->get_where($this->arr_values['table_name'],array("id"=>$insert_id,))->result_object();
			if(!empty($old_slug_data))
    		{
    			$old_slug = $old_slug_data[0]->slug;
    		}
			$slug = $this->crud->insert_slug($slug,$insert_id,$this->arr_values['table_name'],$this->arr_values['controller_name'],$old_slug,$this->arr_values['page_name']);
			$this->crud->insert_meta_tags($slug,$old_slug);
			$update_data['slug'] = $slug;
			$this->db->update($this->arr_values['table_name'],$update_data,array("id"=>$insert_id,));

			$this->session->set_flashdata('message','Record has been successfully Updated.');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'edit',$data);
	}





	//----------------view

	function view()
	{
		check_controller_inner_access(7,5);		 
		$args=func_get_args();
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}


//---------------------status

	public function status_change()
	{
		if(isset($_POST['submit']))
		{						
			$id = $this->input->post('id');						
			$data['status'] = $this->input->post('status');		
			$this->db->update($this->arr_values['table_name'],$data,array("id"=>$id));
			$this->session->set_flashdata('message','<div class="alert alert-success">Record has been successfully Updated.</div>');
		    redirect($this->arr_values['redirect_path'].'listing');	
		}

	}



	public function new_status()
	{
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->db->update($this->arr_values['table_name'],array('status'=>$status),array('id'=>$id));
		$status_html = status($status);
		$data['data'] = array("status"=>$status_html,);
		echo json_encode($data);
	}



	public function addmore_image()
    {
      $data = array();
      $data['i'] = $this->input->post("i");
      $this->load->view("admin/product/add-image",$data);
    }



}