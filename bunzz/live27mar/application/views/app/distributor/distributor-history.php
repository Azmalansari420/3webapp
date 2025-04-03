<?php
$this->load->view('app/include/header'); 

 
$dataPoints = array(
	array("label"=> "Chips", "y"=> 284935),
	array("label"=> "Namkeen", "y"=> 256548),
	array("label"=> "All Session", "y"=> 245214),
	array("label"=> "Business", "y"=> 233464),
	array("label"=> "Music & Audio", "y"=> 200285),
	array("label"=> "Personalization", "y"=> 194422),
	array("label"=> "Tools", "y"=> 180337),
	array("label"=> "Books & Reference", "y"=> 172340),
	array("label"=> "Travel & Local", "y"=> 118187),
	array("label"=> "Puzzle", "y"=> 107530)
);
 
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
</style>

    <!-- /preload -->

    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
                <a href="javascript:void(0);" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>History</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
            </div>
        </div>
    </div>
    
    <div class="app-content" style="padding-top:0;">
	    <div class="app-section st1 mt-1 bg_white_color">
            <div class="tf-container">
                <!-- <div class="wrap-total">
                    <div class="total-item">
                        <a href="#" class="box-icon bg_primary"><i class="icon-arrow-up_minor primary_color"></i></a>
                        <div class="content">
                            <p class="fw_4">Income</p>
                            <h2 class="fw_6 success_color">$778.35</h2>
                        </div>
                    </div>
                    <div class="total-item">
                        <a href="#" class="box-icon bg_critical"><i class="icon-arrow-up_minor critical_color arrow-down"></i></a>
                        <div class="content">
                            <p class="fw_4">Outcome</p>
                            <h2 class="fw_6 critical_color">$878.35</h2>
                        </div>
                    </div>
                </div> -->

                <div class="mt-5 tf-tab">
	                <div class="tf-tab box-components mt-5">
	                    <ul class="nav nav-tabs lined" role="tablist">
	                        <li class="nav-item" >
	                          <a href="#!" class="nav-link  active" data-bs-toggle="tab" data-bs-target="#item1" role="tab" aria-controls="item1" aria-selected="true">
	                               Last 7 Days
	                            </a>
	                        </li>
	                        <li class="nav-item">
	                           <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#item2" role="tab" aria-controls="item2" aria-selected="false">
	                                30 Days
	                           </a>
	                        </li>
	                        <li class="nav-item">
	                            <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#item3" role="tab" aria-controls="item3" aria-selected="false">
	                                Date Filter
	                            </a>
	                         </li>
	                    </ul>
	                    <div class="tab-content mt-4">
	                        <div class="tab-pane fade show active" id="item1" role="tabpanel">
	                            <div id="7daychartContainer" style="height: 370px; width: 100%;"></div>
	                        </div>
	                        <div class="tab-pane fade" id="item2" role="tabpanel">
	                            <div id="30daychartContainer" style="height: 370px; width: 350px;"></div>
	                        </div>
	                        <div class="tab-pane fade" id="item3" role="tabpanel">
	                            <div id="cusdaychartContainer" style="height: 370px; width: 350px;"></div>
	                        </div>
	                    </div>
	                </div>	                
	            </div>

                <div class="trading-month mt-4">
                    <h4 class="fw_5 mb-3">Transition history</h4>
                    <div class="group-trading-history mb-5">
                        <a class="tf-trading-history" href="#!">
                            <div class="inner-left">
                                <div class="thumb">
                                    <img src="<?=base_url() ?>media/icon.webp" alt="image">
                                </div>
                                <div class="content">
                                    <h4>Chips buy</h4>
                                    <p>Today 10:27 AM</p>
                                </div>
                            </div>
                            <span class="num-val critical_color">- ₹ 307</span>
                        </a>

                        <a class="tf-trading-history" href="#!">
                            <div class="inner-left">
                                <div class="thumb">
                                    <img src="<?=base_url() ?>media/icon.webp" alt="image">
                                </div>
                                <div class="content">
                                    <h4>Add Money</h4>
                                    <p>Today 7:30 AM</p>
                                </div>
                            </div>
                            <span class="num-val success_color">+ ₹ 50</span>
                        </a>
                     
                    </div>
            	</div>
            </div>
        </div>

	    
        
	</div>

    
    

<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>

window.onload = function () 
{ 
	var chart = new CanvasJS.Chart("7daychartContainer", {
		animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title: {
			text: "7 Days"
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