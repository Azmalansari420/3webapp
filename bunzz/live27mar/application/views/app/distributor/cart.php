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
                <h3>My Cart</h3>
            </div>
        </div>
    </div>
    <div class="content-card mt-3">
        <?php
            if(!empty($cartmodel))
                { ?>
        <div class="tf-container cart-page-data">                          
            <?php  $this->load->view('app/distributor/cart-list');?>                
        </div>
        <?php } else{ ?>
           <div class="text-center">
               <img src="<?=base_url() ?>media/cart-empty.webp" class="img-fluid">
           </div>
        <?php } ?>
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