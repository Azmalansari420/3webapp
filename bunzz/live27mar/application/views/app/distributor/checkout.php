<?php
$cartmodel = cart_products();
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$full_detail->id,"status"=>0,))->result_object();

$this->load->view('app/include/header'); 

?>

<style>
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Checkout</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="content-card mt-3">
            <?php
                if(!empty($cartmodel))
                    { ?>
                <div class="tf-container checkout-page-data">                          
                    <?php  $this->load->view('app/distributor/checkout-list');?>
                </div>
            <?php } ?>
        </div>
        <?php
        if(!empty($cartmodel))
            { ?>
        <div class="tf-container">            
            <form class="tf-form mt-5" action="">

                <div class="tf-balance-box mt-4 mb-3">
                    <div class="tf-spacing-16"></div>
                    <div class="tf-form">
                        <div class="group-input input-field input-money">
                            <label for="">Enter Coupon</label>
                            <input type="text" placeholder="Enter Coupon" required class="search-field value_input st1 amount-val coupon_code" type="text" value="<?php if(!empty($coponapply[0]->coupon)) echo $coponapply[0]->coupon; ?>">
                            <div class="d-flex mt-3">
                                <button type="button" class="btn btn-sm btn-primary apply-coupen-btn" style="width: 25%;">Apply</button>
                                <button type="button" class="btn-sm btn btn-danger delete-coupen-btn" style="display: <?php if(!empty($coponapply[0]->coupon)) {echo "inline-block"; } else{ echo "none"; } ?>;width: 28%;">Remove</button>
                            </div>
                        </div>
                    </div>   
                </div>
                <input type="hidden" class="sales_office_id" value="<?=$full_detail->sales_office_id ?>">
                <input type="hidden" class="nsm_id" value="<?=$full_detail->nsm_id ?>">
                <input type="hidden" class="asm_id" value="<?=$full_detail->asm_id ?>">
                <input type="hidden" class="rsm_id" value="<?=$full_detail->rsm_id ?>">
                
                <div class="group-input">
                    <label>Name</label>
                    <input type="text" placeholder="Name" class="name" value="<?=$full_detail->name ?>">
                </div>
                <div class="group-input">
                    <label>Email</label>
                    <input type="text" placeholder="Email" class="email" value="<?=$full_detail->email ?>">
                </div>
                <div class="group-input">
                    <label>Mobile</label>
                    <input type="text" placeholder="Mobile" class="mobile" value="<?=$full_detail->mobile ?>">
                </div>
                <div class="group-input">
                    <label>Address</label>
                    <textarea class="address"><?=$full_detail->address ?></textarea>
                </div>
                <div class="group-input">
                    <label>State</label>
                    <select name="state" required class="state-id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option <?php if(!empty($full_detail->state)) if($full_detail->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>City:</label>
                    <select class="city-list" name="city">
                        <?php
                        $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                        foreach($city as $data)
                            { ?>
                        <option <?php if(!empty($full_detail->city)) if($full_detail->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>Order Notes</label>
                    <textarea class="order_notes"></textarea>
                </div>

                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Pay Now</button>
                </div>
            </form>
        </div>
    <?php } else{ ?>
           <div class="text-center">
               <img src="<?=base_url() ?>media/cart-empty.webp" class="img-fluid">
               <a href="home.php" class="btn btn-primary">Go Home</a>
           </div>
        <?php } ?>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>


$(document).on("click", ".apply-coupen-btn",(function(e) {
      coupen_apply();
    }));

    function coupen_apply()
    {
        var coupon = $(".coupon_code").val();
        if(coupon=='')
          {
            toaster("Please Enter Coupon Name...", 'success');
            return false;
          }

        var form = new FormData();
        form.append("coupon", coupon);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/apply_couponcode",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          $(".checkout-page-data").html(response.checkout_card);
          if(response.status==400)
          {
            $('.coupon_code').val('');
          }
          else
          {
            $(".delete-coupen-btn").css("display", "inline-block");
          }
          toaster(response.message, 'success');
        });
    }


 /*-------delete coupon---*/

    $(document).on("click", ".delete-coupen-btn",(function(e) {
      delete_couponcode();
    }));

    function delete_couponcode()
    {
        var form = new FormData();

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/delete_coupon",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          $(".checkout-page-data").html(response.checkout_card);
          if(response.status==200)
          {
            $('.coupon_code').val('');
            $(".delete-coupen-btn").css("display", "none");
          }
          toaster(response.message, 'success');
        });
    }


/*checkout*/

    $(document).on("click", ".submit-btn",(function(e) {
      finalorder();
    }));

    function finalorder()
    {
        var sales_office_id = $(".sales_office_id").val();
        var nsm_id = $(".nsm_id").val();
        var asm_id = $(".asm_id").val();
        var rsm_id = $(".rsm_id").val();
        var name = $(".name").val();
        var email = $(".email").val();
        var mobile = $(".mobile").val();
        var address = $(".address").val();
        var state = $(".state-id").val();
        var city = $(".city-list").val();
        var order_note = $(".order_notes").val();

        
        var form = new FormData();

        
        form.append("sales_office_id", sales_office_id);
        form.append("nsm_id", nsm_id);
        form.append("asm_id", asm_id);
        form.append("rsm_id", rsm_id);
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("address", address);
        form.append("state", state);
        form.append("city", city);
        form.append("order_note", order_note);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/final_order",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
                    toaster(response.message, 'success');
            if (response.status == 200) {
                setTimeout(function () {
                    toaster(response.message, 'success');
                    window.location.href = response.url;
                }, 1000);  // 2-second delay
            }
        });
    }

    

</script>