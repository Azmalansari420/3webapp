<?php 
	//include topbar page
	include_once('include/topbar.php');
	
	//get url value
	$c_id = @$_GET['id']; 
	
	//fetch data 
	if(isset($c_id) and !empty($c_id) and is_numeric($c_id)){
		$c_fsd = fs('number',array('id'=>$c_id));
		if(is_array($c_fsd) || is_object($c_fsd)){
			$form_action = 2;
		}else{
			url('all_game_times.php');
		}
	}else{ 
		$form_action = 1;
	}
	
	//add & update client 
	if(isset($form_submit)){
 	
 		$number_time = fs('all_times',array('id'=>$game_time_id))->time_string;
		//user table column name and input text fields name
		$col_val = array(
			
			'game_id' 		  => $game_id,
			'game_time_id' 		  => $game_time_id,
			// 'month'   => date_format(date_create("$create_on"),"F"),
			// 'year'   => date_format(date_create("$create_on"),"Y"),
			// 'number'	  => $number,
			'status'  => $status,
			'time'  => $number_time,
			// 'create_on'  => $create_on,	
			// 'home_page'  => $home_page,	
				
			
			);  
			
		//img upload code
		
		if($form_action==2){
			//update code
			$where = array('id'=>$c_id);
		 	$row   = $con->update('game_times',$col_val,$where);
			
		    //alert message
			if($row==1){
				$reload_path = "add_game_times.php?id=".$c_id;
				alert('Successfully Update',$reload_path);
			}
		}else{
			// //insert code
			// $check = $con->all_delete('number',array("game_id"=>$game_id,'create_on'=>$create_on));
			
			
			$row = $con->insert('game_times',$col_val); 
			//alert message
			if($row==1){
				alert('Successfully Added','add_game_times.php');
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
						<span class="pull-right"><a href="all_game_times.php" class="btn btn-xs btn-danger"><i class="fa fa-reply" aria-hidden="true"></i>
 Back</a></span>
					</div>
					 <div class="panel-body">
						<div class="row">
							
				
				<div class="col-sm-4 col-xs-6">			
					<label for="status">Game ID :</label>
                        <select required class="form-control" name="game_id">
                          <option value="">Select Game...</option>
                          <?php
				 $fetch_all_game = $con->all_fetch('game',Null,'order by id asc');
				 if(is_array($fetch_all_game) || is_object($fetch_all_game)){
					 
				foreach($fetch_all_game as $fag){ 
                 
                                if($fag->id==@$game_id){
                                    $sel_d = "selected";
                                }else{
                                    $sel_d = "";
                                }
                              // print_r($select_cat);
                             ?>
                             <option <?php echo $sel_d; ?> value="<?php echo $fag->id; ?>"><?php echo $fag->name; ?>
                           </option>
                            <?php }
                          ?>
                        </select>
								 <?php }?>		   
					</div>

					<div class="col-sm-4 col-xs-6">			
					<label for="status">Game Time ID :</label>
                        <select required class="form-control" name="game_time_id">
                          <option value="">Select Game Time ...</option>
                          <?php
				 $fetch_all_game = $con->all_fetch('all_times',Null,'order by time asc');
				 if(is_array($fetch_all_game) || is_object($fetch_all_game)){
					 
				foreach($fetch_all_game as $fag){ 
                 
                                if($fag->id==@$game_id){
                                    $sel_d = "selected";
                                }else{
                                    $sel_d = "";
                                }
                              // print_r($select_cat);
                             ?>
                             <option <?php echo $sel_d; ?> value="<?php echo $fag->id; ?>"><?php echo date("h:i a",strtotime($fag->time)); ?>
                           </option>
                            <?php }
                          ?>
                        </select>
								 <?php }?>		   
					</div>
							
						
                           <!--  <div class="col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="">Number</label>
									<input type="number" name="number" required value="<?php echo @$c_fsd->number; ?>" maxlenth="3" class="form-control">
								</div>
							</div> -->
							<!-- <div class="col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="">Date</label>
									<input type="date" name="create_on" value="<?php 
								// 	echo @$c_fsd->create_on; 
								echo date("Y-m-d");
									
									?>" class="form-control">
								</div>
							</div> -->

							
							

							<div class="col-sm-4  col-xs-12">
								<div class="form-group">
									<label for="">Status</label>
									<?php status('status',@$c_fsd->status); ?>
								</div>
							</div>


							<!-- <div class="col-sm-4  col-xs-12" style="display:none">
								<div class="form-group">
									<label for="">Show in Machine</label>
									<select id="onchange" name="home_page" class="form-control">
										<option value="">Select Game</option>
										<?php 
										$g_arr = array('Yes'=>'Show','No'=>'Hide');
										foreach($g_arr as $k=>$v){
											if(@$i==$k){	?>
										    <option selected value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php }else{ ?>
											<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
										<?php }   } ?>
										</select>
								</div>
							</div> -->

						

							<!-- <div class="col-sm-4 col-xs-6 time" style="display: none;">
								<div class="form-group">
									<label for="">Time</label>
									<input type="time" id="num_time" name="number_time"  value="<?php echo @$c_fsd->time; ?>" maxlenth="3" class="form-control">
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

<script type="text/javascript">
	
 $(document).ready(function(){

  $('#onchange').change(function(){
  	var get = $(this).val();
  	if(get == 'Yes'){
     $(".time").show();
     $('#num_time').attr('required','required');
  	}else{
  		$(".time").hide();
  		$('#num_time').removeAttr('required','required');
  	}
  }	)
 })

</script>