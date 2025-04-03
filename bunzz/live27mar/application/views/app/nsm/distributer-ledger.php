<?php
$from_date = $this->input->get('from_date');
$to_date = $this->input->get('to_date');
$device_id = $this->input->get('device_id');
$firebase_token = $this->input->get('firebase_token');

if(!empty($userorder)) {
	$totalAmount = 0;
    $dataPoints = array();
    foreach($userorder as $key => $value) {
    	$totalAmount += $value->amount;
        $dataPoints[] = array("label"=> "$value->add_date_time", "y"=> $value->amount);
    }
}

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
	.nav-tabs .nav-item {
    text-align: start;
}
</style>

    <!-- /preload -->


    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
                <a href="home.php" class="back-btn11"> <i class="icon-left"></i> </a>
                <h3>Ledger</h3>
                <a href='home.php' class="action-right"><i class="icon-home"></i></a>
                
            </div>
        </div>
    </div>
    
    <div class="app-content" style="padding-top:0;">
	    <div class="app-section st1 mt-1 bg_white_color">
            <div class="tf-container">
                

                <div class="mt-5 tf-tab">
	                <div class="tf-tab box-components mt-0" style="padding: 10px 0;">
	                    <form action="<?=base_url('api/rsm/distributerleadgerdata') ?>" class="nav nav-tabs lined" role="tablist" style="justify-content: space-around!important;">
	                    	<li class="nav-item" style="width: 100%;">
	                    		<label>Select Diastributer</label>
	                    		<select name="user_id">
	                    			<option value="">---Select Distributer---</option>
	                    			<?php
	                    			$user = $this->crud->selectDataByMultipleWhere('users',array('rsm_id'=>$full_detail->id,'role'=>5));
	                    			foreach($user as $data)
	                    			{ ?>
	                    			<option value="<?=$data->id ?>"><?=$data->name ?></option>
	                    			<?php } ?>
	                    		</select>
	                    	</li>

	                        <li class="nav-item" style="width: 46%;">
	                          <label>From Date</label>
	                          <input type="date" name="from_date" value="<?php if(!empty($from_date)) echo $from_date; ?>">
	                        </li>
	                        <li class="nav-item" style="width: 46%;">
	                          <label>To Date</label>
	                          <input type="date" name="to_date" value="<?php if(!empty($to_date)) echo $to_date; ?>">
	                        </li>
	                        <li class="nav-item" style="width: 46%;">
	                          <button type="submit" class="btn btn-primary btn-sm mt-3 mb-3">Submit</button>
	                        </li>	                        
	                    </form>
	                    
	                </div>	                
	            </div>
	            <?php
	            if(!empty($userorder)) { ?>
	            <div class="wrap-total">
                    <div class="total-item" style="width: 100%;justify-content: center;">
                        <a href="#!" class="box-icon bg_primary"><i class="icon-arrow-up_minor primary_color"></i></a>
                        <div class="content">
                            <p class="fw_4" style="font-weight: 700;color: black;">Total Amount</p>
                            <h2 class="fw_6 success_color"><?=currency_simble($totalAmount) ?></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>

               
            </div>
        </div>

	    
        
	</div>

    
    
<?php $this->load->view('app/include/footer'); ?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<style>
	a.canvasjs-chart-credit {
	    display: none !important;
	}
</style>


<script>

window.onload = function () 
{ 
	var chart = new CanvasJS.Chart("7daychartContainer", {
		animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title: {
			text: ""
		},
		axisY: {
			title: "Rupess"
		},
		data: [{
			type: "column",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render(); 
}






</script>