<?php 

//include topbar page
	include_once('include/topbar.php');





// $i=0;
// while ($i<95) {






// 	$c_fsd = $con->all_fetch('all_times',array('status'=>"Yes"),"order by id desc limit 1")[0];
// 	$selectedTime = $c_fsd->time;
// 	$endTime = strtotime("+15 minutes", strtotime($selectedTime));
// 	$time = date('h:i a', $endTime);

	


// 	$col_val = array(
// 			'status'	  =>"Yes",
// 			"time"   =>$time,
// 			"time_string"=>strtotime($time),
			
// 			);  	
// 	$row = $con->insert('all_times',$col_val); 
// 	$i++;
// }


// die;





	
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('all_times',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_times.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
	
		//user table column name and input text fields name
		$col_val = array(
			
			// 'name' 		  => $name,
			// 'game_time'   => $game_time,
			'status'	  => $c_status,
			// 'home_page'=>$home_page,
			// "yesturday"   => $yesturday,
			// "today"   => $today,
			// "time"   =>date("H:i a",strtotime($time)),
			"time"   =>$time.':00',
			"time_string"=>strtotime($time.':00'),
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('all_times',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_times.php?id=".$c_id;
				// alert('Successfully Update',$reload_path);
			}
		}else{
			//insert code
			
			
			$row = $con->insert('all_times',$col_val); 
			//alert message
			if($row==1){
				// alert('Successfully Added','add_times.php');
			}
			
		}
		
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content">
				<form action="" method="post" enctype="multipart/form-data">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Add Times
						<span class="pull-right"><a href="all_times.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
						   
							
							
							<div class="col-sm-3 col-xs-6">
								<div class="form-group">
									<label for="">Game Times</label>
									<input type="time" name="time" autofocus="" value="<?php echo @$c_fsd->time; ?>" class="form-control">
								</div>
							</div>
							
							<!-- <div class="col-sm-3 col-xs-6">
								<div class="form-group">
									<label for="">Game Time</label>
									<input type="time" name="game_time" value="<?php echo @$c_fsd->game_time; ?>" class="form-control">
								</div>
							</div> -->

							<!-- <div class="col-sm- col-xs-6" style="display: none;">
								<div class="form-group">
									<label for="">Game Yesterday</label>
									<input type="number" name="yesturday" value="<?php echo @$c_fsd->yesturday; ?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-3 col-xs-6" style="display: none;">
								<div class="form-group">
									<label for="">Game Today</label>
									<input type="number" name="today" value="<?php echo @$c_fsd->today; ?>" class="form-control">
								</div>
							</div> -->
							
							
							
							
						  
								<div class="col-sm-3  col-xs-12">
								<div class="form-group">
									<label for="">Status</label>
									<?php status('c_status',@$c_fsd->status); ?>
								</div>
							</div>
							
							
						
						</div>
					 </div>
					 <div class="panel-footer">
						<input type="submit" value="Submit" name="form_submit" class="btn btn-success" />
					 </div>
				</div>
				</form>
            </section>
            <!-- /.content -->
         </div>

<?php 
	//include footer page
	include_once('include/footer.php');
?>