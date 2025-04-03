<?php
$url = current_url();
$id = $this->input->get('id');
$scheme = $this->crud->selectDataByMultipleWhere('scheme',array('id'=>$id));
if(!empty($scheme))
{
    $scheme = $scheme[0];
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
    a.download-btn {
        background: transparent!important;
        padding: 0px!important;
    }


</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Add Scheme</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">
                <div class="group-input">
                    <label>Enter Name</label>
                    <input type="text" placeholder="Enter Name." class="name" value="<?=$scheme->name ?>">
                </div>
                <div class="group-input">
                    <label>Upload PDF</label>
                    <input type="file" class="upload_pdf">
                    <?php
                    if(!empty($scheme->pdf))
                        { ?>
                    <input type="hidden" class="oldpdf" value="<?=$scheme->pdf ?>">
                    <a class="download-btn" href="<?=base_url('media/uploads/schema/'.$scheme->pdf) ?>" style="color: black;" download>Download PDF</a>
                <?php } ?>
                </div>                
                
                <div class="group-input">
                    <label>Status:</label>
                    <select name="state" required class="status_che">
                       <option value="1" <?php if($scheme->status=="1") echo 'selected' ?>>Active</option>
                       <option value="0" <?php if($scheme->status=="0") echo 'selected' ?>>DeActive</option>
                    </select>
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

const nsm_id = '<?=$full_detail->id ?>';
const get_id = '<?=$id ?>';



    $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var name = $(".name").val();
        var pdf = $('.upload_pdf')[0].files[0];
        var oldpdf = $(".oldpdf").val();
        var status = $(".status_che").val();

        if(name=='')
        {
            toaster('Enter Name..', 'success');
            return false;
        }
        if(pdf=='')
        {
            toaster('Upload PDF.', 'success');
            return false;
        }
        if(status=='')
        {
            toaster('Select Status.', 'success');
            return false;
        }
        
        var form = new FormData();
       
        form.append("id", get_id);
        form.append("nsm_id", nsm_id);
        form.append("name", name);
        form.append("pdf", pdf);
        form.append("oldpdf", oldpdf);
        form.append("status", status);

        var settings = {
          "url": "<?=base_url() ?>api/nsm/update_schema",
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
              }, 200); 
            } 
            else 
            {
              toaster(response.message, 'success');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>