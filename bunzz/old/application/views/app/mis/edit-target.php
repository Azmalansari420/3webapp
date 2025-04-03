<?php
$url = current_url();
$id = $this->input->get('id');
$target = $this->crud->selectDataByMultipleWhere('target',array('id'=>$id));
if(!empty($target))
{
    $target = $target[0];
}
// print_r($target);
if(!empty($target->target_type==1))
{
    $skubloac = 'block';
    $priceloac = 'none';
}
else
{
    $skubloac = 'none';
    $priceloac = 'block';
}

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
    select:disabled {
    opacity: 1;
    background: wheat;
}
input:disabled {
        background-color: wheat;
       
    }
textarea:disabled {
        background-color: wheat;
       
    }
    .icon-more:before {
    font-size: 24px;
}
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Update Target</h3>
                 <a href="javascript:void(0);" id="btn-popup-left" class="action-right"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">

                <div class="group-input">
                    <label>Target Type:</label>
                    <select name="type" required class="target_type" disabled>
                        <option value="" selected>Select Target Type</option>
                        <option value="1" <?php if($target->target_type=="1") echo 'selected' ?>>SKU</option>
                        <option value="2" <?php if($target->target_type=="2") echo 'selected' ?>>Value Wise</option>
                    </select>
                </div>

                <div class="group-input sku-group" style="display: <?=$skubloac ?>;" >
                    <label>Selected SKU:</label>
                    <select name="rsm_id" required class="sku_code" disabled>
                        <option value="" selected>Select SKU</option>
                        <?php
                        $rsm = $this->crud->selectDataByMultipleWhere('product', array('status' => 1,));
                        foreach ($rsm as $data) { ?>
                            <option <?php if($target->sku_code==$data->id) echo 'selected' ?> value="<?= $data->id ?>"><?= $data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input amount-group" style="display: <?=$priceloac ?>;" >
                    <label>Enter Amount:</label>
                    <input type="text" placeholder="Enter Amount.." class="amount" value="<?=$target->amount ?>" disabled>
                </div>

                <div class="group-input">
                    <label>Type:</label>
                    <select name="type" required class="type" disabled>
                        <option value="" selected>Select Type</option>
                        <option <?php if($target->type=="Monthly") echo 'selected' ?> value="Monthly">Monthly</option>
                        <option <?php if($target->type=="Quarterly") echo 'selected' ?> value="Quarterly">Quarterly</option>
                        <option <?php if($target->type=="Half Yearly") echo 'selected' ?> value="Half Yearly">Half Yearly</option>
                        <option <?php if($target->type=="Annually") echo 'selected' ?> value="Annually">Annually</option>
                    </select>
                </div>

                <div class="group-input">
                    <label>Title</label>
                    <input type="text" placeholder="Enter Title.." class="title" value="<?=$target->title ?>" disabled>
                </div>                              
                
                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message_to_rsm" disabled rows="5" placeholder="Enter Somthing.."><?=$target->message_to_rsm ?></textarea>
                </div>

                <div class="group-input">
                    <label>Target Response:</label>
                    <select name="type" required class="status" >
                        <option value="" selected>Select Target Response</option>
                        <option <?php if($target->status=="2") echo 'selected' ?> value="2">Accept</option>
                        <option <?php if($target->status=="3") echo 'selected' ?> value="3">Reject</option>
                    </select>
                </div>


                <!--  -->
                

                
               
                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Update </button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>

const nsm_id = '<?=$full_detail->id ?>';
const get_id = '<?=$id ?>';



    $(document).on("click", ".submit-btn",(function(e) {
      add_target();
    }));

    function add_target()
    {
        var status = $(".status").val();       
        
        var form = new FormData();
       
        form.append("id", get_id);
        form.append("status", status);        
        
        var settings = {
          "url": "<?=base_url() ?>api/rsm/upadate_target",
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
          if(response.status == 200) 
            {
              toaster(response.message, 'success');
              setTimeout(function() {
                window.location.href = response.url;
              }, 2000); // Redirect after 2 seconds
            } 
            else 
            {
              toaster(response.message, 'success');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>