<?php
$url = current_url();
// print_r($full_detail->id);


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
                <h3>Invoice Recipt</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            <form class="tf-form mt-5" action="">
                
                <div class="group-input">
                    <label>Enter Your Order ID</label>
                    <input type="text" placeholder="Enter Your Order ID" class="order_id" >
                </div>


                <a style="display:none;" href="" class="btn btn-sm btn-primary invoice-btn">Click To View Invoice</a>
            

                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>

const user_id = '<?=$full_detail->id ?>';
    $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var order_id = $(".order_id").val();

        if(order_id=='')
        {
            toaster('Enter Order ID', 'success');
            return false;
        }
        
        var form = new FormData();
        form.append("user_id", user_id);
        form.append("order_id", order_id);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/get_invoice",
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
          if(response.status==200)
          {
            toaster(response.message, 'success');
            $('.invoice-btn').css("display","block");
            $('.invoice-btn').attr('href', response.url);
          }
        });
    }

    

</script>