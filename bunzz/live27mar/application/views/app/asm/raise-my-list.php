<?php
// print_r($full_detail->id);
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
    .icon-plus:before {
        font-size: 24px;
    }
        
        .icon-home:before {
        font-size: 24px;
    }
    .tf-statusbar .back-btn2 {
        left: 16px;
        position: absolute;
    }
    .back-btn2, .icon-close {
        min-width: 44px;
        height: 50px;
        display: flex;
        align-items: center;
    }
    i.icon-clear {
    color: red;
    font-size: 18px;
    position: relative;
    top: 5px;
}
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="home.php" class="back-btn2"> <i class="icon-home"></i> </a>
                <h3>My Raise a Grievances</h3>
                <a href="raise-my-add.php" class="action-right"><i class="icon-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">
                    <div class="tab-content mt-4">

                        <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                                $this->db->order_by('id desc');
                                $users = $this->crud->selectDataByMultipleWhere('raise_asm_to_rsm', array('asm_id' => $full_detail->id,));

                                if (!empty($users)) {
                                    foreach ($users as $data) 
                                    {
                                        $addeddate = $data->modifieddate;
                                        $addedTimestamp = strtotime($addeddate);
                                        $currentTimestamp = time();
                                        
                                ?>
                                    <li class="list-card-invoice">
                                        <div class="logo">
                                            <img src="" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">
                                        </div>
                                        <div class="content-right">
                                            <h4>
                                                <?php
                                                if($data->status==1)
                                                    { ?>
                                                <a href="<?= ('distributor/raise-my-add.php?id=' . $data->id) ?>">
                                                <?php } else {?>
                                                    <a href="javascript:;">
                                                        <?php } ?>
                                                    <?=raiseissue($data->issue_type) ?>
                                                    <!-- <br> [from <?=userdetails($data->asm_id) ?>] -->
                                                
                                                    <div>
                                                        <?=raiseexcel($data->status) ?>
                                                    </div>
                                                </a>
                                            </h4>
                                            <p><?= $data->message ?> </p>
                                        </div>
                                    </li>
                                <?php } } ?>

                            </ul>
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
    var id = 0; 
    $(document).on("click", ".delete-btn",(function(e) {
       id = $(this).data('id');
      delete_target();
    }));

    function delete_target()
    {
        var form = new FormData();
        form.append("id", id);

        var settings = {
          "url": "<?=base_url() ?>api/nsm/delete_target",
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

</script>
