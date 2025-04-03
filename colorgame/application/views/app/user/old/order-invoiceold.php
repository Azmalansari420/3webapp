<?php
$order_id = $this->input->get('order_id');
// print_r($order_id);
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
    	body {
    margin: 0;
    font-family: var(--bs-font-sans-serif);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent
}

      *,
::after,
::before {
    box-sizing: border-box
}
@media (prefers-reduced-motion:no-preference) {
    :root {
        scroll-behavior: smooth
    }
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
        padding: 14px 0;
       
      }
    </style>
  </head>
  <body>
    <section class="main-pd-wrapper" style="width: 450px; ">
      <div style="
                  text-align: center;
                  margin: 0 auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
                <img src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" style="width: 160px;">

                <p style="font-weight: bold; color: #000; margin-top: 15px; font-size: 18px;"><?=$finalorder->name ?></p>
                <p style="margin-top: 5px;"><?=$finalorder->address ?></p>
                <p style="margin: 0 auto;"><?=statename($finalorder->state) ?>, <?=cityname($finalorder->state) ?></p>
                <p>
                  <b>Mobile:</b> <?=$finalorder->mobile ?>
                </p>
                <p>
                  <b>Email:</b> <?=$finalorder->email ?>
                </p>

                <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
              </div>
              <table style="width: 100%; table-layout: fixed">
                <thead>
                  <tr>
                    <th style="width: 50px; padding-left: 0;">Sn.</th>
                    <th style="width: 250px;">Item Name</th>
                    <th>QTY</th>
                    <th style="text-align: right; padding-right: 0;">Price</th>
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
					<td >
            <?=$data->name ?><br>
            <?=colorname($data->color_id) ?>, [<?=sizename($data->size_id) ?>]
          </td>
					<td><?=$data->quantity ?></td>
					<td style="text-align: right;"><?=currency_simble($data->sale_price*$data->quantity) ?></td>
                  </tr>
                  <?php } ?>
               
                </tbody>
              </table>

             

              <table style="width: 100%;
              margin-top: 15px;
              border: 1px dashed #00cd00;
              border-radius: 3px;">
                <thead>
                  <tr>
                    <td>Sub total: </td>
                    <td style="text-align: right;"><?=currency_simble($finalorder->sub_total) ?></td>
                  </tr>
                  <?php
					if(!empty($finalorder->discount_amount))
						{ ?>
                  <tr>
                    <td>Coupon Discount: </td>
                    <td style="text-align: right;"><?=currency_simble($finalorder->discount_amount) ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Total Price: </td>
                    <td style="text-align: right;"><?=currency_simble($finalorder->after_discount_final_price) ?></td>
                  </tr>
                </thead>
             
              </table>
              <button id="print-button">Print Page</button>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
	function printPage() {
    window.print();
}

// Attach the printPage function to a button or link
document.getElementById('print-button').addEventListener('click', printPage);
</script>

  </body>
</html>
  
  
 