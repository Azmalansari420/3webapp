<?php
$url = current_url();
$id = $this->input->get('id');
$target = $this->crud->selectDataByMultipleWhere('warning_so',array('id'=>$id));
if(!empty($target))
{
    $target = $target[0];
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
                    <label>Select RSM:</label>
                    <select name="asm_id" required class="asm_id">
                        <option value="" selected>Select SO</option>
                        <?php
                        $rsm = $this->crud->selectDataByMultipleWhere('users',array('status'=>1,'role'=>4,'asm_id'=>$full_detail->id));
                        foreach($rsm as $data)
                            { ?>
                        <option <?php if(!empty($target->so_id)) if($target->so_id==$data->id) echo 'selected' ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                    <?php } ?>
                    </select>
                </div>
                              
                
                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message" rows="5" placeholder="Enter Somthing.."><?php if(!empty($target)) echo $target->message ?></textarea>
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




const asm_id = '<?=$full_detail->id ?>';
const get_id = '<?=$id ?>';



    $(document).on("click", ".submit-btn",(function(e) {
      add_target();
    }));

    function add_target()
    {
        var so_id = $(".asm_id").val();       
        var message = $(".message").val();
        
      
        if(so_id=='')
        {
            toaster('Select SO.', 'success');
            return false;
        }
        if(message=='')
        {
            toaster('Enter Message', 'success');
            return false;
        }
       
        
        var form = new FormData();
        
        form.append("id", get_id);
        form.append("asm_id", asm_id);
        form.append("so_id", so_id);
        form.append("message", message);
        
        var settings = {
          "url": "<?=base_url() ?>api/asm/upadate_notice",
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
              }, 2000); 
            } 
            else 
            {
              toaster(response.message, 'success');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>