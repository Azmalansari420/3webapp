<?php
$device_id = $this->session->userdata("device_id");  
$firebase_token = $this->session->userdata("firebase_token"); 
?>

<style>
	
	.dz-order {
	    background-color: var(--bg-white);
	    padding: 3px 15px;
	    margin: 0 auto;
	    border-bottom: 1px solid #000000;
	}
	.dz-order .status .badge {
	    font-size: 12px;
	    white-space: nowrap;
	    font-weight: 500;
	    border-radius: var(--border-radius-sm);
	    display: flex;
	    align-items: center;
	    gap: 3px;
	}
	.dz-tab.style-1 .nav.nav-tabs .nav-item .nav-link {
		padding: 8px 0;
	}
	.dz-tab.style-1 .tab-slide-effect .nav-tabs .nav-item.active .nav-link {
	    color: var(--primary) !important;
/*	    background: black;*/
	    border-radius: 10px;
	}
</style>


<div class="col-12" style="padding: 1px 10px;">
	<div class="dz-order" style="padding: 3px 0 !important;">
		<div class="order-info" style="margin-bottom: 0px;">
			<div class="pe-3">
				<span class="productId"><?=date('d M, Y',strtotime($data->addeddate)) ?></span>
				<h6 class="title">
					<a href='order-invoice.php?order_id=<?=$data->order_id ?>&device_id=<?=$device_id ?>&firebase_token=<?=$firebase_token ?>'>#<?=$data->order_id ?></a>
				</h6>
			</div>
			<div class="status">				
				<?=order_statusforweb($data->order_status) ?>
				<a href="order-invoice.php?order_id=<?=$data->order_id ?>&device_id=<?=$device_id ?>&firebase_token=<?=$firebase_token ?>">
					<h5 class="price" style="font-size: 13px;"><?=currency_simble($data->after_discount_final_price) ?></h5>
				</a>
			</div>
		</div>		
	</div>
</div>