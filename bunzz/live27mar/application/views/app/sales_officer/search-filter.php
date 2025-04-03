<?php

$status = $this->input->get('status');
$city = $this->input->get('city');
$state = $this->input->get('state');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');


$this->load->view('app/include/header'); 
 
?>
<style>
	  
.nav-tabs.lined .nav-link.active {
    background: #5f94bf;
    color: #ffffff;
    border-color: #5f94bf;
}
.chart-wrapper {
  width: 800px; /* Set a fixed width */
  margin: 0 auto; /* Center the wrapper */
}
label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .tf-statusbar .back-btn11 {
	    left: 16px;
	    position: absolute;
	}
	select, textarea, input[type=text], input[type=password], input[type=datetime], input[type=datetime-local], input[type=date], input[type=month], input[type=time], input[type=week], input[type=number], input[type=email], input[type=url], input[type=search], input[type=tel], input[type=color] {
		    padding: 13px 5px;
		}
		.nav-tabs .nav-item {
    text-align: start;
}
</style>

    <!-- /preload -->


    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
                <a href="home.php" class="back-btn11"> <i class="icon-left"></i> </a>
                <h3>Search and Filters</h3>
                <a href='home.php' class="action-right"><i class="icon-home"></i></a>
                
            </div>
        </div>
    </div>
    
    <div class="app-content" style="padding-top:0;">
	    <div class="app-section st1 mt-1 bg_white_color">
            <div class="tf-container">
                

                <div class="mt-5 tf-tab">
	                <div class="tf-tab box-components mt-0" style="padding: 10px 0;">
	                    <form action="<?=base_url('api/Sales_officer/filter_kyc_data') ?>" class="nav nav-tabs lined" role="tablist" style="justify-content: space-around!important;">
	                    	<input type="hidden" name="device_id" value="<?=$device_id ?>">
	                    	<input type="hidden" name="firebase_token" value="<?=$firebase_token ?>">

	                        <li class="nav-item" style="width: 48%;">
	                          	<label>Select State</label>
	                          	<select name="state"  class="state-id">
		                            <option value="" selected>Select State</option>
		                            <?php
		                            $statelist = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
		                            foreach($statelist as $data)
		                                { ?>
		                            <option <?php if(!empty($state)) if($state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
		                            <?php } ?>
		                        </select>
	                        </li>

	                        <li class="nav-item" style="width: 48%;">
	                          	<label>Select City</label>
	                          	<select class="city-list" name="city">
	                          		<option value="" selected>Select City</option>
		                            <?php
		                            $citylist = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
		                            foreach($citylist as $data)
		                                { ?>
		                            <option <?php if(!empty($city)) if($city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
		                            <?php } ?>
		                        </select>
	                        </li>

	                        <li class="nav-item" style="width: 108%;margin-top: 20px;">
	                          	<label>Select Status</label>
	                          	<select class="" name="status">
		                            <option value="">--Select Status--</option>
		                            <option value="0" <?php if(!empty($status)) if($status==0) echo 'selected'; ?>>New</option>
		                            <option value="1" <?php if(!empty($status)) if($status==1) echo 'selected'; ?>>Approved</option>
		                            <option value="2" <?php if(!empty($status)) if($status==2) echo 'selected'; ?>>Under Review</option>
		                            <option value="3" <?php if(!empty($status)) if($status==3) echo 'selected'; ?>>Reject</option>
		                        </select>
	                        </li>

	                      
	                        <li class="nav-item" style="width: 46%;">
	                          <button type="submit" class="btn btn-primary btn-sm mt-3 mb-3">Submit</button>
	                        </li>	                        
	                    </form>
	                    <div class="tab-content mt-4">
	                        <?php
					            if(!empty($userorder)) { ?>
					            <div class="wr1ap-total">
				                    <!-- data found -->
				                    <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
				                        <ul class="mt-3 mb-5">
				                          <?php
				                                                        
				                          foreach($userorder as $data)
				                            {
				                            	$kycrecord = kyc_details($data->id);
				                            	if(!empty($kycrecord))
				                            	{
				                            		$kycrecord = $kycrecord[0];
				                            		$image = $kycrecord->self_image;
				                            	}
				                            	else
				                            	{
				                            		$kycrecord = '';
				                            		$image = '';
				                            	}                                  
				                             ?>
				                            <li class="list-card-invoice">
				                                <div class="logo">
				                                    <img src="<?=base_url() ?>media/uploads/distributor/<?=$image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'" style="border-radius: 93px;">
				                                </div>
				                                <div class="content-right">
				                                    <h4>
				                                      <a href="<?=('rsm/distributor-kyc-details.php?id='.$data->id) ?>"><?=$data->firm_name ?> 
				                                        <?=distributer_app_status($data->status) ?>
				                                      </a>
				                                    </h4>
				                                    <p><?=$data->name ?> <br> <?=$data->mobile ?></p>
				                                    <?php
				                                    if($data->status==0)
				                                    	{ ?>
				                                    <a style="color: green;" href="<?=('sales_office/edit-distributor.php?id='.$data->id) ?>">Click to Update Details </a>
				                                <?php } ?>
				                                </div>
				                            </li>
				                            <?php  } ?>
				                        </ul>
				                    </div>
				                </div>
				            <?php } ?>
	                    </div>
	                </div>	                
	            </div>

	            

               
            </div>
        </div>

	    
        
	</div>

    
    
<?php $this->load->view('app/include/footer'); ?>
