<?php
$cartmodel = cart_products();

$user_id = $this->session->userdata("user")['id'];  
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');

$sub_total = 0; 
$finalprice = 0; 
$shipping_charge = 0;


$user_id = $this->session->userdata("user")['id'];  
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');


foreach($cartmodel as $key => $value)
{
    $product_name = $this->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id));
    if(!empty($product_name))
    {
        $p_name = $product_name[0]->name;
        $p_slug = $product_name[0]->slug;
        $thumb_img = $product_name[0]->thumb_img;
    }
    $product_total = 0;
    $product_total = $value->price*$value->quantity;
    $sub_total += $product_total;
    $finalprice = $sub_total+$shipping_charge;
?>

<style>
    .icon-clear {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 16px;
    }
    .input-field .icon-clear {
        display: none;
        position: absolute;
        top: 14px;
        font-size: 18px;
        right: 14px;
        color: #c5c5c5;
    }
      .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
</style>
<ul class="box-card " id="">  
<li class="tf-card-list medium bt-line">
    <div class="logo">
        <img src="<?=base_url() ?>media/uploads/product/<?=$thumb_img ?>" alt="image">
    </div>
    <div class="info">
        <h4 class="fw_6"><a href=""><?=$p_name ?></a></h4>
        <p><?=$value->quantity ?> x <?=$value->price ?> =  <?=currency_simble($product_total) ?></p>
    </div>
    <i class="icon-clear delete-cart-btn" style="color:red" data-id="<?=$value->id ?>"></i>
</li>
<?php } ?>


<div class="mt-3">
    <a class="mt-1 list-setting-profile style1" href="#" id="btn-popup-up">
        <h4 class="fw_6">Sub Total :</h4>
        <span class="inner-right"><?=currency_simble($applied_coupon['sub_total']) ?></span>
    </a>
    <?php if($applied_coupon['discount_amount']>0){ ?>
    <a class="mt-1 list-setting-profile style1" href="#" id="btn-popup-up">
        <h4 class="fw_6">Coupon Discount (<?php if($applied_coupon['type']==1)echo $applied_coupon['discount'].'%'; else echo 'Flat' ?>) :</h4>
        <span class="inner-right"><?=currency_simble($applied_coupon['discount_amount']) ?> </span>
    </a>
<?php } ?>
    <a class="mt-1 list-setting-profile style1" href="#" id="btn-popup-up">
        <h4 class="fw_6">Total Price :</h4>
        <span class="inner-right"><?=currency_simble($applied_coupon['after_discount_final_price']) ?></span>
    </a>
</div>
</ul>


<div class="tf-spacing-20"></div>
<a href="checkout.php" class="tf-btn accent large">Checkout </a>