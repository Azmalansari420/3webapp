<?php
$order_id = $this->input->get('order_id');
if(!empty($order_id))
{
	$finalorder = $this->crud->selectDataByMultipleWhere('finalorder',array('order_id'=>$order_id));
	$finalorder = $finalorder[0];
}

$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Tax Invoice</title>

		<style>
		* {
		box-sizing: border-box;
		}
		.table-bordered td,
		.table-bordered th {
		border: 1px solid #ddd;
		padding: 10px;
		word-break: break-all;
		}
		body {
		font-family: Arial, Helvetica, sans-serif;
		margin: 0;
		padding: 0;
		font-size: 16px;
		}
		.h4-14 h4 {
		font-size: 12px;
		margin-top: 0;
		margin-bottom: 5px;
		}
		.img {
		margin-left: "auto";
		margin-top: "auto";
		height: 30px;
		}
		pre,
		p {
		/* width: 99%; */
		/* overflow: auto; */
		/* bpicklist: 1px solid #aaa; */
		padding: 0;
		margin: 0;
		}
		table {
		font-family: arial, sans-serif;
		width: 100%;
		border-collapse: collapse;
		padding: 1px;
		}
		.hm-p p {
		text-align: left;
		padding: 1px;
		padding: 5px 4px;
		}
		td,
		th {
		text-align: left;
		padding: 8px 6px;
		}
		.table-b td,
		.table-b th {
		border: 1px solid #ddd;
		}
		th {
		/* background-color: #ddd; */
		}
		.hm-p td,
		.hm-p th {
		padding: 3px 0px;
		}
		.cropped {
		float: right;
		margin-bottom: 20px;
		height: 100px; /* height of container */
		overflow: hidden;
		}
		.cropped img {
		width: 400px;
		margin: 8px 0px 0px 80px;
		}
		.main-pd-wrapper {
		box-shadow: 0 0 10px #ddd;
		background-color: #fff;
		border-radius: 10px;
		padding: 15px;
		}
		.table-bordered td,
		.table-bordered th {
		border: 1px solid #ddd;
		padding: 10px;
		font-size: 14px;
		}
		.invoice-items {
		font-size: 14px;
		border-top: 1px dashed #ddd;
		}
		.invoice-items td{
		padding: 14px 10px;
    font-weight: 700;
    font-size: 25px;
		
		}
		</style>
	</head>
	<body>
		<section class="main-pd-wrapper" style="width: 890px; margin: 0 auto">
			<div style="text-align: center;margin: auto;line-height: 1.5;font-size: 14px;color: #4a4a4a;">
				<img src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" width="300">
				<p style="font-weight: bold; color: #000; margin-top: 9px; font-size: 50px;"><?=$finalorder->name ?></p>
				<p style="margin: 1px auto;font-size: 44px;font-weight: 600;"><?=$finalorder->address ?></p>
				<p style="margin: 1px auto;font-size: 44px;font-weight: 600;"><?=statename($finalorder->state) ?>, <?=cityname($finalorder->state) ?> </p>
				<p style="margin: 1px auto;font-size: 44px;font-weight: 600;"><?=$finalorder->mobile ?>,<?=$finalorder->email ?></p>
				
				<hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
			</div>
			<table style="width: 100%; table-layout: fixed">
				<thead>
					<tr>
						<th style="width: 60px;padding-left: 0;font-size: 25px;font-weight: 700;">Sn.</th>
						<th style="width: 560px;padding-left: 0;font-size: 25px;font-weight: 700;">Item Name</th>
						<th style="padding-left: 0;font-size: 25px;font-weight: 700;">QTY</th>
						<th style="text-align: right; padding-right: 0;font-size: 25px;font-weight: 700;">Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=0;
					$orders = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$order_id));
					foreach($orders as $data)
						{ $i++; ?>
					<tr class="invoice-items">
						<td><?=$i ?></td>
						<td ><?=$data->name ?></td>
						<td><?=$data->quantity ?></td>
						<td style="text-align: right;"><?=currency_simble($data->sale_price*$data->quantity) ?></td>
					</tr>
				<?php } ?>
					
				</tbody>
			</table>
			
			<table style="width: 100%;margin-top: 40px;border: 1px dashed #00cd00;border-radius: 3px;">
				<thead>
					<tr>
						<td style="font-size: 36px;font-weight: 700;padding-bottom: 24px !important;">Sub total:</td>
						<td style="text-align: right;font-size: 36px;font-weight: 700;"><?=currency_simble($finalorder->sub_total) ?></td>
					</tr>
					<?php
					if(!empty($finalorder->discount_amount))
						{ ?>
					<tr>
						<td style="font-size: 36px;font-weight: 700;padding-bottom: 24px !important;">Discount Amount: </td>
						<td style="text-align: right;font-size: 36px;font-weight: 700;"><?=currency_simble($finalorder->discount_amount) ?></td>
					</tr>
				<?php } ?>
					<tr>
						<td style="font-size: 36px;font-weight: 700;padding-bottom: 24px !important;">Total Price: </td>
						<td style="text-align: right;font-size: 36px;font-weight: 700;"><?=currency_simble($finalorder->after_discount_final_price) ?></td>
					</tr>
				</thead>				
			</table>
			<div style="text-align:center">
				<button style="background: red;color: white;padding: 16px;font-size: 47px;" onclick="history.back();" class="back-btn">Go Back</button>
			</div>
		</section>

	</body>
</html>
		
	