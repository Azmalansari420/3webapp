<?php 
	//include topbar page
	include_once('include/topbar.php');
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('month',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_month.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
		
		//user table column name and input text fields name
		$col_val = array(
			'name' 			=> $name,
			'status'		=> $c_status,
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('month',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_month.php?id=".$c_id;
				alert('Successfully Update',$reload_path);
			}
		}else{
			//insert code
			
			
			$row = $con->insert('month',$col_val);
			print_r($row);
			//alert message
			if($row==1){
				alert('Successfully Added','add_month.php');
			}
			
		}
		
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content">
				<form action="" method="post" enctype="multipart/form-data">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Add Month
						<span class="pull-right"><a href="all_month.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
						   <div class="col-sm-4">
								<div class="form-group">
									<label for="">Month *</label>
									<select class="form-control" name="name">
										<option value="">Select Month</option>
										<?php
										foreach ($month_list as $key => $m_l) {
											if($m_l == $c_fsd->name){
										?>
										<option value="<?php echo $m_l; ?>" selected><?php echo $m_l; ?></option>
									<?php } else{ ?>
										<option value="<?php echo $m_l; ?>"><?php echo $m_l; ?></option>
										<?php 
										}
									}
										?>
									</select>
								</div>
							</div>
							
							
							<div class="col-sm-4">
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