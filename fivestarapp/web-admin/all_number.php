<?php 
	//include topbar page
	include_once('include/topbar.php');
	//delete code
	if(isset($_GET['del_id']) and !empty($_GET['del_id'])){
		$del_sdf = $con->all_delete('number',array('id'=>$_GET['del_id']));
		//alert message
			if($del_sdf==1){
				alert('Successfully delete',"all_number.php");
			}
	}
?>
<style>
	/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
	
 <div class="content-wrapper">
             
            <section class="content"> 
				<div class="panel panel-primary">
					 <div class="panel panel-heading">
						<i class="fa fa-users"></i> Menu Lists
						<span class="pull-right"><a href="add_menu.php" class="btn btn-xs btn-danger">Add New</a></span>


						<?php
						$fetch_all_clients = @$con->all_fetch('game',Null,'order by id desc');
						if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
							$is = 1;
							foreach($fetch_all_clients as $fac){ 
						?>

							<span class="pull-right" style="margin-right: 5px;"><a href="all_number.php?game_id=<?php echo $fac->id; ?>" class="btn btn-xs btn-danger"><?php echo $fac->name; ?></a></span>

						<?php }
						}	?>



					 </div>
					 <div class="panel-body">
					     <div style="overflow-x:auto;    width: 100%;">
						 <table id="example" class="table table-striped table-bordered" style="width:100%;">
							<thead>
							<tr>
								<th>Sr no</th>
								<th>Date Time</th>
								<th>Game Name</th>
								<th>Game Number</th>								
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


							 $fetch_all_clients = @$con->all_fetch('number',$where,'order by id desc limit 500');
							 if(is_array($fetch_all_clients) || is_object($fetch_all_clients)){
								 $is = 1;
								 foreach($fetch_all_clients as $fac){ 
								 	// $cate = fs("month",array('id' => $fac->month ));

								 	$date_timeee = $fac->create_on.' '.fs("all_times",array("id"=>fs("game_times",array("id"=>$fac->game_time_id,))->game_time_id,))->time;
								 	?>
									 <tr>
								<td><?php echo $is++; ?></td>
								<td><?php echo date("Y-m-d h:i A", strtotime($date_timeee)); ?></td>
								<td><?php echo fs("game",array("id"=>$fac->game_id,))->name; ?></td>
								<td>
									<?php // echo $fac->number; ?>
									<input type="number" class="number_game" data-id="<?=$fac->id ?>" id="number_game<?=$fac->id ?>" value="<?=$fac->number ?>" style="border: 0;background: transparent;">

								</td>
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



<script>
	  $(document).on("keyup", ".number_game",(function(e) {
        
        event.preventDefault();
        var id = $(this).data("id");
        var value = $(this).val();
        var  change_staus1 = "ok";
        $.ajax({
            url:"ajax_to_php/admin_file.php",
            type:"post",
            data:{id:id,value:value,change_staus1:change_staus1},
            success:function(d)
            {
                console.log(d);
                
            },
            error: function(e) 
          {
              
            
          } 
        });

      }));
</script>