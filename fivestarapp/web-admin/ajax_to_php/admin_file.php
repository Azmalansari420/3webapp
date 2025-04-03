<?php
///////======  WEB-ADMIN AJAX TO PHP FILE =========////////

	session_start();
    $session_admin  =  @$_SESSION['session_admin'];
	include_once("../../lib/all_files.php");
	

 
//get clients  project with help of client id
if(isset($sel_c_id_name) and !empty($sel_c_id_name)){
	$where = array('client_id'=>$sel_c_id_name);
	$fetch_details = $con->all_fetch('project',$where);
	if(is_array($fetch_details) || is_object($fetch_details)){
		$sub_cat_list = "<option value=''>Select Project</option>";
		foreach($fetch_details as $fd){
			$sub_cat_list .= "<option value='$fd->id'>CDP$fd->id - $fd->name</option>";			
		}
		echo $sub_cat_list;
	}else{
		echo 0;
	}
}	


//get project total costing and remaining amount 
if(isset($select_project_id) and !empty($select_project_id)){
	//get project total costing
	$fpd = fs('project',array('id'=>$select_project_id));
	$ptc = $fpd->project_total_costing;
	 
	//count Recived Amount 
	$countpr = $con->all_sum('all_invoice','amount',array('project_id'=>$select_project_id));
	
	$return_json = array('t_p_c'=>$ptc,'t_r_a'=>$countpr);
	
	echo json_encode($return_json);
	
}
  




//======================\\ DELETE USER CODE //======================\\
$delete_user_id = @$_GET['delete_user_id'];
if(isset($delete_user_id)){
	$check   = array('id'=>$delete_user_id);
	$run     = $con->all_delete("user_register",$check);
	if($run==true){
	   echo $run;
	}
	
}


if(isset($cate) and !empty($cate)){
	$where = array('categoryId'=>$cate);
	$fetch_details = $con->all_fetch('sub_category',$where);
	if(is_array($fetch_details) || is_object($fetch_details)){
		$sub_cat_list = "<option value=''>Select Project</option>";
		foreach($fetch_details as $fd){
			$sub_cat_list .= "<option value='$fd->id'> $fd->name</option>";			
		}
		echo $sub_cat_list;
	}else{
		echo 0;
	}
}	
  
 if(isset($_POST['del_imgs']) && !empty($_POST['del_imgs']) && is_numeric($_POST['del_imgs'])){
 $del_img_id =  $_POST['del_imgs'];
  $del_img = $_POST['img_name'];

  	$check   = array('id'=>$del_img_id);
	$run    = $con->all_delete("product_images",$check);

	if($run==true){
		@unlink('../../upload/'.$del_img);	
	   echo $run;
    }
}




if(isset($change_staus1)){
	$check   = array('id'=>$id);
	$run     = $con->update("number",array('number'=>$value),$check);
	if($run==true){
		echo $run;
	}
}


 



?>