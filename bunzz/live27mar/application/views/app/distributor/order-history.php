<?php
$cartmodel = cart_products();
// print_r($cartmodel);
// die;
$this->load->view('app/include/header'); 

?>
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="#" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Order History</h3>
            </div>
        </div>
    </div>
    <div class="content-card mt-3">
        <div class="tf-container">
          <div class="tf-tab mt-3">
            <div class="swiper-container tes-noti">
              <ul class="swiper-wrapper menu-tabs">
                <li class="swiper-slide nav-tab active "><a href="#!">All Orders</a></li>
                <li class=" swiper-slide nav-tab "><a href="#!">Pending Order</a></li>
                <li class=" swiper-slide nav-tab "><a href="#!">Confirm Order</a></li>
                <li class="swiper-slide nav-tab"><a href="#!"> Cancel Order</a></li>
                <li class="swiper-slide nav-tab "><a href="#!">Complete</a></li>
              </ul>
            </div>
            <div class="content-tab mt-5">
              <div class="noti-box">
                <?php
                $this->db->order_by('id desc');
                $getallorder = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$full_detail->id));
                foreach($getallorder as $value)
                    { ?>
                <?php $this->load->view('app/distributor/order-list',array('value'=>$value)); ?>
                <?php } ?>

              </div>
              <div class="noti-box">
                <?php
                $this->db->order_by('id desc');
                $getallorder = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$full_detail->id,'order_status'=>0));
                foreach($getallorder as $value)
                    { ?>
                <?php $this->load->view('app/distributor/order-list',array('value'=>$value)); ?>
                <?php } ?>

              </div>
              <!-- 2 -->
              <div class="noti-box">
                <?php
                $this->db->order_by('id desc');
                $getallorder = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$full_detail->id,'order_status'=>1));
                foreach($getallorder as $value)
                    { ?>
                <?php $this->load->view('app/distributor/order-list',array('value'=>$value)); ?>
                <?php } ?>
              </div>
              <!-- 3 -->
              <div class="noti-box">
                <?php
                $this->db->order_by('id desc');
                $getallorder = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$full_detail->id,'order_status'=>5));
                foreach($getallorder as $value)
                    { ?>
                <?php $this->load->view('app/distributor/order-list',array('value'=>$value)); ?>
                <?php } ?>
              </div>
              <!-- 4 -->
              <div class="noti-box">
                <?php
                $this->db->order_by('id desc');
                $getallorder = $this->crud->selectDataByMultipleWhere('finalorder',array('user_id'=>$full_detail->id,'order_status'=>4));
                foreach($getallorder as $value)
                    { ?>
                <?php $this->load->view('app/distributor/order-list',array('value'=>$value)); ?>
                <?php } ?>
                
              </div>

            </div>
          </div>
        </div>
    </div>
    
    
  


   


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script>
    var id = 0;
    $(document).on("click", ".delete-cart-btn",(function(e) {
      id = $(this).data('id');
      delete_cart();
      event.preventDefault();
    }));

   function delete_cart()
   {
      var form = new FormData();
      form.append("id", id);

      var settings = {
        "url": "<?=base_url() ?>api/Distributor/delete_cart_item",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };

      $.ajax(settings).done(function (response) {
        toaster(response.message, 'success');
        console.log(response);
        $(".cart-page-data").html(response.cart_page_data);
      });
   }
</script>