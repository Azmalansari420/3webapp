<?php 
	//include topbar page
	include_once('include/topbar.php');
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('user',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_user.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
		
		//user table column name and input text fields name
		$col_val = array(
			
			'name' 		 => $name,
			'password'   => $password,
			// 'status'	 => $c_status,
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('user',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_user.php?id=".$c_id;
				alert('Successfully Update',$reload_path);
			}
		}else{
			//insert code
			
			
			$row = $con->insert('user',$col_val); 
			//alert message
			if($row==1){
				alert('Successfully Added','add_user.php');
			}
			
		}
		
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content">
				<form action="" method="post" enctype="multipart/form-data">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Add User
						<span class="pull-right"><a href="all_user.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
						   
							
							
							<div class="col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="">User Name</label>
									<input type="text" name="name" value="<?php echo @$c_fsd->name; ?>" class="form-control">
								</div>
							</div>
							
							<div class="col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="">User Password</label>
									<input type="text" name="password" value="<?php echo @$c_fsd->password; ?>" class="form-control">
								</div>
							</div>

							<!-- <div class="col-sm-4  col-xs-12">
								<div class="form-group">
									<label for="">Status</label>
									<?php status('c_status',@$c_fsd->status); ?>
								</div>
							</div> -->
							
						
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