<?php 
	//include topbar page
	include_once('include/topbar.php');
	//delete code
	if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
		$del_sdf = $con->all_delete('month',array('id'=>$_GET['del_id']));
		//alert message
			if($del_sdf==1){
				alert('Successfully delete',"all_month.php");
			}
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content"> 
				<div class="panel panel-primary">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Month Lists
						<span class="pull-right"><a href="add_month.php" class="btn btn-xs btn-danger">Add New</a></span>
					 </div>
					 <div class="panel-body">
						 <table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							<tr>
								<th>Sr no</th>
								<th>Name</th>
								
								<th>Status</th>
							
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							 $fetch_all_clients = $con->all_fetch('month',Null,'order by id desc');
							 if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
								 $is = 1;
								 foreach($fetch_all_clients as $fac){ 
								 	//$cate = fs("plan_category",array('id' => $fac->category ));
								 	?>
									 <tr>
								<td><?php echo $is++; ?></td>
								<td><?php echo $fac->name; ?></td>
								
								
								<td><?php if($fac->status=="Yes"){
									echo '<span class="btn btn-xs btn-success">Show</span>';
								}
								else{
									echo '<span class="btn btn-xs btn-danger">Hide</span>';
								} ?></td>
							
								<td><a href="add_month.php?id=<?php e($fac->id); ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>
									<a href="?del_id=<?php e($fac->id); ?>" class="btn btn-xs btn-danger del_confirm">Delete</a>
								</td>
							</tr>
<?php 								 }
								 
							 }
							?>
							
							    </tbody>
						 </table>
					 </div>
					  
				</div> 
            </section>
            <!-- /.content -->
         </div>

<?php 
	//include footer page
	include_once('include/footer.php');
?>