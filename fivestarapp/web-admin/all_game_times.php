<?php 
	//include topbar page
	include_once('include/topbar.php');




// $i=15;
// while ($i<62) {






// 	$c_fsd = $con->all_fetch('all_times',array('status'=>"Yes","id"=>$i,),"order by id desc limit 1")[0];
// 	$selectedTime = $c_fsd->time;
// 	$endTime = strtotime("+15 minutes", strtotime($selectedTime));
// 	$time = date('h:i a', $endTime);

	


// 	$col_val = array(
// 			'status'	  =>"Yes",
// 			"time"   =>$time,
// 			"game_id"=>"59",
// 			"game_time_id"=>$i,
			
// 			);  	
// 	$row = $con->insert('game_times',$col_val); 
// 	$i++;
// }


// die;









	//delete code
	if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
		$del_sdf = $con->all_delete('game_times',array('id'=>$_GET['del_id']));
		//alert message
			if($del_sdf==1){
				alert('Successfully delete',"all_game_times.php");
			}
	}
?>
	
 <div class="content-wrapper">
             
            <section class="content"> 
				<div class="panel panel-primary">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Menu Lists

						<span class="pull-right"><a href="add_game_times.php" class="btn btn-xs btn-danger">Add New</a></span>

						<?php
						$fetch_all_clients = @$con->all_fetch('game',Null,'order by id desc');
						if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
							$is = 1;
							foreach($fetch_all_clients as $fac){ 
						?>

							<span class="pull-right" style="margin-right: 5px;"><a href="all_game_times.php?game_id=<?php echo $fac->id; ?>" class="btn btn-xs btn-danger"><?php echo $fac->name; ?></a></span>

						<?php }
						}	?>


					 </div>
					 <div class="panel-body">
					     <div style="overflow-x:auto;">
						 <table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							<tr>
								<th>Sr no</th>
								<th>Game Id</th>
								<th>Game Time Id</th>								
								<th>Game Status</th>
							</tr>
							</thead>
							<tbody>
							<?php
							if(isset($_GET['game_id']))
							{
								$where = array("game_id"=>$_GET['game_id'],);
							}
							else
							{
								$where = Null;
							}
							 $fetch_all_clients = @$con->all_fetch('game_times',$where,'order by time asc');
							 if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
								 $is = 1;
								 foreach($fetch_all_clients as $fac){ 
								 	// $cate = fs("month",array('id' => $fac->month ));
								 	?>
									 <tr>
								<td><?php echo $is++; ?></td>
								<td><?php 

								// echo $fac->game_id;
								echo fs("game",array("id"=>$fac->game_id,))->name;


								 ?></td>
								<td><?php //echo $fac->game_time_id;
									echo date("h:i a",strtotime(fs("all_times",array("id"=>$fac->game_time_id,))->time));
								 ?></td>
								<td><?php echo $fac->status; ?></td>
								<td>
								<?php if($fac->status=='Yes'){
								   echo "Show";
								        }else{
								            echo "Hide";
								        } ?></td>
							
								<td>
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