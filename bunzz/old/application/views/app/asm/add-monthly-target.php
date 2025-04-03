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
                <h3>Add Target</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">                
                <div class="group-input">
                    <label>Select Sale Officer</label>
                    <select class="sales_office_id">
                        <?php
                        $sale = $this->crud->selectDataByMultipleWhere('users',array('status'=>1,'asm_id'=>$full_detail->id,'role'=>4));
                        foreach($sale as $value)
                            { ?>
                        <option value="<?=$value->id ?>"><?=$value->name ?></option>
                    <?php } ?>
                    </select>
                </div>
                
                <div class="group-input">
                    <label>Task</label>
                    <textarea class="task" rows="5"></textarea>
                </div>

               
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
        var sales_office_id = $(".sales_office_id").val();
        var task = $(".task").val();

        if(sales_office_id=='')
        {
            toaster('Select Sale Officer', 'success');
            return false;
        }
        if(task=='')
        {
            toaster('Enter Task', 'success');
            return false;
        }

        
        var form = new FormData();
        form.append("user_id", user_id);        
        form.append("sales_office_id", sales_office_id);
        form.append("task", task);

        var settings = {
          "url": "<?=base_url() ?>api/asm/assign_task",
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