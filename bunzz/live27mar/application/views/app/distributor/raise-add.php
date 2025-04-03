<?php
$url = current_url();
$id = $this->input->get('id');
$target = $this->crud->selectDataByMultipleWhere('raise_distributer_to_so',array('id'=>$id));
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
                <h3>Raise a Grievances</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">

               <input type="hidden" class="so_id" value="<?=$full_detail->sales_office_id ?>">
               <input type="hidden" class="distributer_id" value="<?=$full_detail->id ?>">

                <div class="group-input">
                    <label>Select Issue Type:</label>
                    <select name="issue_type" required class="issue_type">
                        <option value="" selected>Issue Type</option>
                        <?php
                        $rsm = $this->crud->selectDataByMultipleWhere('raise_issue',array('status'=>1,));
                        foreach($rsm as $data)
                            { ?>
                        <option <?php if(!empty($target->issue_type)) if($target->issue_type==$data->id) echo 'selected' ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                    <?php } ?>
                    </select>
                </div>
                              
                
                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message" rows="5" placeholder="Enter Somthing.."><?php if(!empty($target)) echo $target->message ?></textarea>
                </div>
                <?php
                if(!empty($target->reply_message))
                    { ?>
                <div class="group-input">
                    <label>Reply Message</label>
                    <textarea class="reply_message" rows="5" placeholder="Enter Somthing.." readonly><?php if(!empty($target)) echo $target->reply_message ?></textarea>
                </div>
            <?php } ?>

                
               
                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Raise  </button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>

const get_id = '<?=$id ?>';

    $(document).on("click", ".submit-btn",(function(e) {
      add_target();
    }));

    function add_target()
    {
        var so_id = $(".so_id").val();       
        var distributer_id = $(".distributer_id").val();       
        var issue_type = $(".issue_type").val();       
        var message = $(".message").val();
        
      
        if(issue_type=='')
        {
            toaster('Select type.', 'success');
            return false;
        }
        if(message=='')
        {
            toaster('Enter Message', 'success');
            return false;
        }
       
        
        var form = new FormData();
        
        form.append("id", get_id);
        form.append("so_id", so_id);
        form.append("distributer_id", distributer_id);
        form.append("issue_type", issue_type);
        form.append("message", message);
        
        var settings = {
          "url": "<?=base_url() ?>api/distributor/add_upadate_raise",
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