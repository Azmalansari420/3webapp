<?php 
	//include topbar page
	include_once('include/topbar.php');
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('game',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_menu.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
		
		//user table column name and input text fields name
		$col_val = array(
			
			'name' 		  => $name,
			'game_time'   => $game_time,
			'status'	  => $c_status,
			'home_page'=>$home_page,
			"yesturday"   => $yesturday,
			"today"   => $today,
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('game',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_menu.php?id=".$c_id;
				alert('Successfully Update',$reload_path);
			}
		}else{
			//insert code
			
			
			$row = $con->insert('game',$col_val); 
			//alert message
			if($row==1){
				alert('Successfully Added','add_menu.php');
			}
			
		}
		
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content">
				<form action="" method="post" enctype="multipart/form-data">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Add Menu
						<span class="pull-right"><a href="all_menu.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
						   
							
							
							<div class="col-sm-3 col-xs-6">
								<div class="form-group">
									<label for="">Game Name</label>
									<input type="text" name="name" value="<?php echo @$c_fsd->name; ?>" class="form-control">
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