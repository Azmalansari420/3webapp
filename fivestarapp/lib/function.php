<?php

 //fetch_state_name
function state_name_id($sid){
	global $con;
	$fetch_state_name =  $con->all_fetch('states',array('id'=>$sid));
	if(is_array($fetch_state_name) || is_object($fetch_state_name)){
		foreach($fetch_state_name as $fsn){
			return $fsn->name;
		}
	}
}

function con_id($table,$sid){
	global $con;
	$fetch_state_name =  $con->all_fetch($table,array('id'=>$sid));
	if(is_array($fetch_state_name) || is_object($fetch_state_name)){
		foreach($fetch_state_name as $fsn){
			return $fsn->name;
		}
	}
}

function e($e){
	echo $e;
}

function goto_home(){
	 echo "<script>window.location.href='index.php'</script>";	
}

function goto_c_url($path){
	 echo "<script>window.location.href='$path'</script>";	
}

function url($path){
	echo "<script>window.location.href='$path'</script>";	
} 
 
 




function alert($message,$url=null){
   
   if($url==null){
	  echo "<script>alert('$message');</script>";   
   }else{
	   echo "<script>alert('$message');window.location.href='$url';</script>";   
   }
}

function sfu($a){
    
    $a = trim($a);
    
    $a = html_entity_decode($a);
     
    $a = strip_tags($a);
    
    $a = strtolower($a);
    
    $a = preg_replace('~[^ a-z0-9_.]~', ' ', $a);
    
    $a = preg_replace('~ ~', '-', $a);
     
    $a = preg_replace('~-+~', '-', $a);
        
    return $a;
}

//fetch single subsctipiton array
function fs($table,$where){
	GLOBAL $con;
	$row = $con->all_fetch($table,$where);
	return $row[0];
	  
}



function gender($input_name,$i=null){
	?>
	<label>Select Gender</label>
	<select name="<?php echo $input_name; ?>" class="form-control">
	<option value="">Select Gender</option>
	<?php 
	$g_arr = array('1'=>'Male','2'=>'Female','3'=>'Other');
	foreach($g_arr as $k=>$v){
		if(@$i==$k){	?>
	    <option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }else{ ?>
		<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }   } ?>
	</select>
<?php 
  
   
  }

function status($input_name,$i=null){
	?>
	
	<select name="<?php echo $input_name; ?>" required class="form-control">
	<option value="">Select Status</option>
	<?php 
	$g_arr = array('Yes'=>'Show','Hide'=>'Hide');
	foreach($g_arr as $k=>$v){
		if(@$i==$k){	?>
	    <option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }else{ 
	    if($k=="Show")
	    $selected = "selected";
	    else
	    $selected = "";
	?>
		<option <?=$selected ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }   } ?>
	</select>
<?php 
  
  }


  function name($input_name,$i=null){
	?>
	
	<select name="<?php echo $input_name; ?>" class="form-control">
	<option value="">Select Game</option>
	<?php 
	$g_arr = array('Yes'=>'Show','No'=>'Hide');
	foreach($g_arr as $k=>$v){
		if(@$i==$k){	?>
	    <option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }else{ ?>
		<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }   } ?>
	</select>
<?php 
  
  }


function dateDiff($date1, $date2)
{
 $date1_ts = strtotime($date1);
 $date2_ts = strtotime($date2);
 $diff = $date2_ts - $date1_ts;
 return round($diff / 86400);
}

function timeDiff($time1, $time2)
{
 $date1_ts = strtotime($time1);
 $date2_ts = strtotime($time2);
 $difference = round(abs($date2_ts - $date1_ts) / 3600,2);
 return $difference;
}
  
  function weekday($input_name,$i=null){
	?>
	<label>Select Weekdays</label>
	<select name="<?php echo $input_name; ?>" class="form-control">
	<option value="">Select Weekdays</option>
	<?php 
	
	foreach($weekday as $k=> $v){
		if(@$i==$k){	?>
	    <option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }else{ ?>
		<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
	<?php }   } ?>
	</select>


<?php } ?>