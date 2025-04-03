<?php 
	//include topbar page
	include_once('include/topbar.php');
	//delete code
	if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
		$del_sdf = $con->all_delete('game',array('id'=>$_GET['del_id']));
		//alert message
			if($del_sdf==1){
				alert('Successfully delete',"all_menu.php");
			}
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content"> 
				<div class="panel panel-primary">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Menu Lists
						<span class="pull-right"><a href="add_menu.php" class="btn btn-xs btn-danger">Add New</a></span>
					 </div>
					 <div class="panel-body">
					     <div style="overflow-x:auto;">
						 <table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							<tr>
								<th>Sr no</th>
								<th>Game Name</th>
								<th>Game Time</th>
								<th>Show on Home</th>
								<th>Status</th>
								<th>Game Today</th>
							</tr>
							</thead>
							<tbody>
							<?php
							 $fetch_all_clients = @$con->all_fetch('game',Null,'order by id desc');
							 if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
								 $is = 1;
								 foreach($fetch_all_clients as $fac){ 
								 	
								 	?>
									 <tr>
								<td><?php echo $is++; ?></td>
								<td><?php echo $fac->name; ?></td>
								<td><?php echo $fac->game_time; ?></td>
								<td><?php echo $fac->home_page; ?></td>
								<!-- <td><?php echo $fac->status; ?></td> -->
								<td>
								<?php if($fac->status=='Yes'){
								   echo "Show";
								        }else{
								            echo "Hide";
								        } ?></td>
							
								<td><a href="add_menu.php?id=<?php e($fac->id); ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>
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
					  
				</div> 
            </section>
            <!-- /.content -->
         </div>

<?php 
	//include footer page
	include_once('include/footer.php');
?>