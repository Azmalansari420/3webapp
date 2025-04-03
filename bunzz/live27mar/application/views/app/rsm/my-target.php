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
    .icon-more:before {
    font-size: 24px;
}

</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="home.php" class="back-btn2"> <i class="icon-home"></i> </a>
                <h3>My Target</h3>
                <a href="javascript:void(0);" id="btn-popup-left" class="action-right"><i class="icon-more"></i></a>
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
                                $users = $this->crud->selectDataByMultipleWhere('target', array('rsm_id' => $full_detail->id,));

                                if (!empty($users)) {
                                    foreach ($users as $data) {
                                        $addeddate = $data->addeddate;
                                        $addedTimestamp = strtotime($addeddate);
                                        $currentTimestamp = time();
                                ?>
                                    <li class="list-card-invoice">
                                        <div class="logo">
                                            <img src="" onerror="this.src='<?= base_url() ?>media/uploads/1725100321.jpg'">
                                        </div>
                                        <div class="content-right">
                                            <h4>
                                                
                                                <a href="<?= ('rsm/edit-target.php?id=' . $data->id) ?>">
                                                    
                                                    <?=($data->type) ?> [<?=target_type_status($data->target_type) ?>]
                                                    <div>
                                                        <?=rsm_target_status($data->status) ?>
                                                    </div>
                                                </a>
                                            </h4>

                                            <span style="font-weight: 700;color: green;">
                                                <?php
                                                if($data->target_type==1)
                                                    { ?>

                                                <?= skuname($data->sku_code) ?>
                                            <?php } else {?>
                                                <?= currency_simble($data->amount) ?>
                                            <?php } ?>
                                                    
                                            </span>
                                            <p><?= $data->message_to_rsm ?> </p>
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