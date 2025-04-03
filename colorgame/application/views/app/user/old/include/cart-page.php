<?php
$sub_total = 0; 
$finalprice = 0; 
$shipping_charge = 0;
$product_total = 0;

$cartmodel = cart_products();
if(!empty($cartmodel))
{
$user_id = $this->session->userdata("user")['id'];  
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');

?>
<style>
	.view-cart ul li span {
	    display: block;
	    font-size: 14px;
/*	    color: black;*/
	    font-weight: 600;
	}
	.quantity {
	  display: flex;
	  border: 2px solid var(--primary);
	  border-radius: 4px;
	  overflow: hidden;
	  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}

	.quantity button {
	  background-color: var(--primary);
	  color: #fff;
	  border: none;
	  cursor: pointer;
/*	  font-size: 20px;*/
	      font-size: 16.5px;
	  width: 30px;
	  height: 25px;
/*	  height: auto;*/
	  text-align: center;
	  transition: background-color 0.2s;
	}

	.quantity button:hover {
	  background-color: #2980b9;
	}

	.input-box {
	  width: 40px;
	  height: 25px;
	  text-align: center;
	  border: none;
	  padding: 8px 10px;
	  font-size: 16px;
	  outline: none;
	}

	/* Hide the number input spin buttons */
	.input-box::-webkit-inner-spin-button,
	.input-box::-webkit-outer-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}

	.input-box[type="number"] {
	  -moz-appearance: textfield;
	}
	.cart-box {
	    border: 1px solid #000000;
	    border-radius: 10px;
	    padding: 10px 12px;
	    margin-bottom: 5px;
	}
	.coupon-bx .form-control {
	    border: 0;
	    height: 45px;
	    background-color: var(--bg-white);
	    padding: 10px 15px;
	    border: 2px dashed #000000;
	    font-weight: 600;
	}

</style>
		
			<?php
			foreach($cartmodel as $key => $value)
			{

			?>
			<div class="cart-box">
				<div class="dz-media">
					<i class="icon feather icon-x-circle delete-cart-btn" style="color:red;" data-id="<?=$value->id ?>"></i>
					<img src="<?=base_url() ?>media/uploads/product/<?=$value->image ?>" alt="">
				</div>
				<div class="cart-content">
					<h6 class="title mb-1"><a href="<?=('product-detail.php?id='.$value->p_id) ?>"><?=$value->name ?></a></h6>
					<span class="badge badge-outline-secondary"><?=sizename($value->size_id) ?></span>
					<span class="badge badge-outline-danger"><?=colorname($value->color_id) ?></span>
					<div class="cart-footer">
						<h6 class="price mb-0" style="font-size: 13px;"> <?=$value->quantity ?> x <?=currency_simble($value->sale_price) ?></h6>
						<div class="quantity">
						  <button class="minus" aria-label="Decrease">&minus;</button>
						  <input type="number" class="input-box" value="<?=$value->quantity ?>" min="1" max="10" data-id="<?=$value->id ?>">
						  <button class="plus" aria-label="Increase">&plus;</button>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<p class="mb-2 mt-3">Have a coupon code ? enter here</p>	

			<div class="coupon-bx">
				<input type="text" class="form-control coupon_code" placeholder="Enter Your Offer Code" value="<?php if(!empty($coponapply[0]->coupon)) echo $coponapply[0]->coupon; ?>">

				<button type="button" class="btn-sm mt-2 btn btn-primary apply-coupen-btn" style="width: 28%;">Apply</button>
				<button type="button" class="btn-sm mt-2 btn btn-danger delete-coupen-btn" style="display: <?php if(!empty($coponapply[0]->coupon)) {echo "inline-block"; } else{ echo "none"; } ?>;width: 28%;">Remove</button>
			</div>

			<div class="view-cart mb-2 mt-3">
				<ul>
					<li>
						<span class="name">Sub Total :</span>
						<span class="text-secondary font-w500"><?=currency_simble($applied_coupon['sub_total']) ?></span>
					</li>
					<?php if($applied_coupon['discount_amount']>0){ ?>
					<li>
						<span class="name">Coupon Discount (<?php if($applied_coupon['type']==1)echo $applied_coupon['discount'].'%'; else echo 'Flat' ?>) :</span>
						<span class="text-secondary font-w500"><?=currency_simble($applied_coupon['discount_amount']) ?></span>
					</li>
					<?php } ?>
					
					<li class="divider divider-dashed mt-0 pb-0"></li>
					<li>
						<span class="name">Total Price :</span>
						<h4 class="price"><?=currency_simble($applied_coupon['after_discount_final_price']) ?></h4>
					</li>
				</ul>
			</div>
<?php } else{ ?>
       <div class="text-center">
           <img src="<?=base_url() ?>media/cart-empty.webp" class="img-fluid">
       </div>
    <?php } ?>

<script type="text/javascript">
	$(document).ready(function(){
	    $('.plus, .minus').click(function(){
	        var inputBox = $(this).siblings('.input-box'); // Get the sibling input box
	        var id = inputBox.data('id'); // Get the data-id from the input box
	        
	        var value = parseInt(inputBox.val());
	        if ($(this).hasClass('plus')) {
	            value = value < 10 ? value + 1 : 10;
	        } else {
	            value = value > 1 ? value - 1 : 1;
	        }
	        inputBox.val(value);
	        quantity_update(id, value);
	    });
	});
</script>