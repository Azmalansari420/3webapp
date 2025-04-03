<?php 
	//include topbar page
	include_once('include/topbar.php');
	
	 
?>
	
 <div class="content-wrapper">
             
            <section class="content">
			<div class="row">
			<div class="col-sm-8">
				<form action="">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> My Profile
					 </div>
					 <div class="panel-body">
						<div class="row">
						   <div class="col-sm-4">
								<div class="form-group">
									<label for="">Client Name *</label>
									<input type="text"  required placeholder="Client Name" name="" id="" class="form-control" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">Email *</label>
									<input type="text"  required  placeholder="Email" name="" id="" class="form-control" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">Mobile *</label>
									<input type="number" required   placeholder="Mobile" name="" id="" class="form-control" />
								</div>
							</div>
							 <div class="col-sm-4">
								<div class="form-group">
									<label for="">Business Name *</label>
									<input type="text" placeholder="Business Name" name="" id="" class="form-control" />
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">Domain Name or Url</label>
									<input type="text" placeholder="Domain Name or Url" name="" id="" class="form-control" />
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<label for="">GST Number</label>
									<input type="text" placeholder="GST Number" name="" id="" class="form-control" />
								</div>
							</div>
							 
						</div>
					 </div>
					 <div class="panel-footer">
						<input type="submit" value="Submit" name="form_submit" class="btn btn-success" />
					 </div>
				</div>
				</form>
				</div>
				<div class="col-sm-4">
				<div class="panel panel-success">
					 <div class="panel panel-heading">
						<i class="fa fa-key"></i> Change Password
					 </div>
					 <div class="panel-body">
					<form action="" method="POST">
				<div class="form-group"> 
							<input type="password" placeholder="Old Password" name="old_password" class="form-control">
							<input type="hidden" name="c_user_id" value="1">
						</div>
						<div class="form-group"> 
							<input type="password" placeholder="New Password" name="new_pass" class="form-control">
						</div>
						<div class="form-group"> 
							<input type="password" placeholder="Confirm Password" name="new_confirm_pass" class="form-control">
						</div>
					 
					<button type="submit" name="send_message_btn" class="btn btn-success btn-block">
							Chagne Password
					</button>
                </form>
				</div>
				</div>
				
				
				</div>
            </section>
            <!-- /.content -->
         </div>

<?php 
	//include footer page
	include_once('include/footer.php');
?>