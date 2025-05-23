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
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Update Target</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">

                <div class="group-input">
                    <label>Target Type:</label>
                    <select name="type" required class="target_type">
                        <option value="" selected>Select Target Type</option>
                        <option value="1" <?php if($target->target_type=="1") echo 'selected' ?>>SKU</option>
                        <option value="2" <?php if($target->target_type=="2") echo 'selected' ?>>Value Wise</option>
                    </select>
                </div>

                <div class="group-input sku-group" style="display: <?=$skubloac ?>;">
                    <label>Select SKU:</label>
                    <select name="rsm_id" required class="sku_code">
                        <option value="" selected>Select SKU</option>
                        <?php
                        $rsm = $this->crud->selectDataByMultipleWhere('product', array('status' => 1,));
                        foreach ($rsm as $data) { ?>
                            <option <?php if($target->sku_code==$data->id) echo 'selected' ?> value="<?= $data->id ?>"><?= $data->name ?></option>
                        <?php } ?>
                    </select>
                </div>



                <div class="group-input amount-group" style="display: <?=$priceloac ?>;">
                    <label>Enter Amount:</label>
                    <input type="text" placeholder="Enter Amount.." class="amount" value="<?=$target->amount ?>">
                </div>

                <div class="group-input">
                    <label>Select RSM:</label>
                    <select name="rsm_id" required class="rsm_id">
                        <option value="" selected>Select RSM</option>
                        <?php
                        $rsm = $this->crud->selectDataByMultipleWhere('users',array('status'=>1,'role'=>2,'nsm_id'=>$full_detail->id));
                        foreach($rsm as $data)
                            { ?>
                        <option <?php if($target->rsm_id==$data->id) echo 'selected' ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>Title</label>
                    <input type="text" placeholder="Enter Title.." class="title" value="<?=$target->title ?>">
                </div>

                <div class="group-input">
                    <label>Type:</label>
                    <select name="type" required class="type">
                        <option value="" selected>Select Type</option>
                        <option <?php if($target->type=="Monthly") echo 'selected' ?> value="Monthly">Monthly</option>
                        <option <?php if($target->type=="Quarterly") echo 'selected' ?> value="Quarterly">Quarterly</option>
                        <option <?php if($target->type=="Half Yearly") echo 'selected' ?> value="Half Yearly">Half Yearly</option>
                        <option <?php if($target->type=="Annually") echo 'selected' ?> value="Annually">Annually</option>
                    </select>
                </div>
                              
                
                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message_to_rsm" rows="5" placeholder="Enter Somthing.."><?=$target->message_to_rsm ?></textarea>
                </div>

                
               
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


       $(document).ready(function () 
      {
        $('.target_type').change(function () 
        {
            var selectedValue = $(this).val();
            $('.sku-group').hide();
            $('.amount-group').hide();

            if (selectedValue === "1") {
                $('.sku-group').show();
            } else if (selectedValue === "2") {
                $('.amount-group').show();
            }
        });
    });

const nsm_id = '<?=$full_detail->id ?>';
const get_id = '<?=$id ?>';



    $(document).on("click", ".submit-btn",(function(e) {
      add_target();
    }));

    function add_target()
    {
        var target_type = $(".target_type").val();
        var sku_code = $(".sku_code").val();
        var rsm_id = $(".rsm_id").val();
        var title = $(".title").val();
        var type = $(".type").val();
        var amount = $(".amount").val();
        var message_to_rsm = $(".message_to_rsm").val();
        
        if(target_type=='')
        {
            toaster('Select Target Type.', 'success');
            return false;
        }
        if(rsm_id=='')
        {
            toaster('Select RSM.', 'success');
            return false;
        }
        if(type=='')
        {
            toaster('Select Type', 'success');
            return false;
        }
       
        
        var form = new FormData();
        
        form.append("nsm_id", nsm_id);
        form.append("target_type", target_type);
        form.append("sku_code", sku_code);
        form.append("id", get_id);
        form.append("nsm_id", nsm_id);
        form.append("rsm_id", rsm_id);
        form.append("title", title);
        form.append("type", type);
        form.append("amount", amount);
        form.append("message_to_rsm", message_to_rsm);
        
        var settings = {
          "url": "<?=base_url() ?>api/nsm/upadate_target",
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