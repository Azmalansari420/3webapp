<script>
    window.location.href="add_number.php";
</script>

<?php 

// url('add_number.php');


	//include topbar page
	include_once('include/topbar.php');
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('result',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_result.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
		
		//user table column name and input text fields name
		$col_val = array(
			'create_date' => $add_date,
			'name' 		  => $name,
			'breakfast'   => $breakfast,
			'lunch'       => $lunch,
			'dinner'      => $dinner,
			'status'	  => $c_status,
			
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('result',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_result.php?id=".$c_id;
				alert('Successfully Update',$reload_path);
			}
		}else{
			//insert code
			
			
			$row = $con->insert('result',$col_val); 
			//alert message
			if($row==1){
				alert('Successfully Added','add_result.php');
			}
			
		}
		
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content">
				<form action="" method="post" enctype="multipart/form-data">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Add Result
						<span class="pull-right"><a href="all_result.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
						   
							
							
							<div class="col-sm-2 col-xs-6">
								<div class="form-group">
									<label for="">11:00</label>
									<input type="text" name="name" value="<?php echo @$c_fsd->name; ?>" class="form-control">
								</div>
							</div>
							
							<div class="col-sm-2 col-xs-6">
								<div class="form-group">
									<label for="">12:00</label>
									<input type="text" name="breakfast" value="<?php echo @$c_fsd->breakfast; ?>" class="form-control">
								</div>
							</div>
							
							<div class="col-sm-2 col-xs-6">
								<div class="form-group">
									<label for="">01:00</label>
									<input type="text" name="lunch" value="<?php echo @$c_fsd->lunch; ?>"  class="form-control">
								</div>
							</div>
							
							<div class="col-sm-2 col-xs-6">
								<div class="form-group">
									<label for="">02:00</label>
									<input type="text" name="dinner" value="<?php echo @$c_fsd->dinner; ?>" class="form-control">
								</div>
							</div>
						  
								<div class="col-sm-2  col-xs-12">
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