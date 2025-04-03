<?php
$this->load->view('app/include/header'); 

?>

<style>
    .nav-tabs.lined .nav-link.active {
        background-color: #5f94bf;
        border: 1px solid #5f94bf;
        color: #ffffff;
    }
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 10px;
    }
    .box-components {
        padding: 6px 5px;
    }
    .nav-tabs .nav-item .nav-link {
/*        border: 0;*/
        color: #1e1e1e;
        font-size: 14px;
        line-height: 15px;
        border-bottom: 1px solid transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        padding: 7px 7px;
        border: 1px solid black;
    }

    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a  class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Sales Officers</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
                <!-- <a href="add-sale-officer.php" class="action-right"><i class="icon-plus" style="font-size: 24px;"></i></a> -->
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">

                    <form class="row">
                        <div class="col-8">
                            <div class="group-input">
                                <label>Select ASM:</label>
                                <select  class="asm_id">
                                    <option value="" selected>Select ASM</option>
                                    <?php
                                    $users = $this->crud->selectDataByMultipleWhere('users',array('rsm_id'=>$full_detail->id,'role'=>3));
                                    foreach($users as $data)
                                        { ?>
                                    <option  value="<?=$data->id ?>"><?=$data->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                                <button type="button" class="tf-btn accent large submit-btn submit-btn">Submit</button>
                            </div>
                        </div>
                    </form>

                    
                    <div class="tab-content mt-4">
                        <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
                            <ul class="mt-3 mb-5 load-more"></ul>
                        </div>
                        
                        

                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script>
    var asm_id = 0;
     $(document).on("click", ".submit-btn", function(e) {
        asm_id = $(".asm_id").val();
        if (asm_id == "") {
            toaster("Please Select an ASM", 'success');
            return;
        }
        // console.log(asm_id);
        load_more();
    });
    
    function load_more()
    {
        var form = new FormData();
        form.append("asm_id", asm_id);

        var settings = {
          "url": "<?=base_url() ?>api/rsm/saleofficerlist",
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
              $('.load-more').html(response.data);
            }
            else
              {
                toaster(response.message, 'success');
                $(".load-more").html('');
              }
          
        });
    }

    load_more();

   



</script>


