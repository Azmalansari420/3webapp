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
                <h3>Approved Distributors</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
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
                              $users = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$full_detail->id,'kyc_status'=>1));

                              if(!empty($users))
                              {
                              foreach($users as $data)
                                {
                                    $kycrecord = kyc_details($data->id);
                                    if(!empty($kycrecord))
                                    {
                                        $kycrecord = $kycrecord[0];
                                        $image = $kycrecord->self_image;
                                    }
                                    else
                                    {
                                        $kycrecord = '';
                                        $image = '';
                                    }                                  
                                 ?>
                                <li class="list-card-invoice">
                                    <div class="logo">
                                        <img src="<?=base_url() ?>media/uploads/distributor/<?=$image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'" style="border-radius: 93px;">
                                    </div>
                                    <div class="content-right">
                                        <h4>
                                          <a href="<?=('rsm/distributor-kyc-details.php?id='.$data->id) ?>"><?=$data->firm_name ?> 
                                            <?=distributer_app_status($data->kyc_status) ?>
                                          </a>
                                        </h4>
                                        <span style="font-weight: 700;color: green;"><?=walletamt($data->id) ?></span>
                                        <p><?=$data->name ?> <br> <?=$data->mobile ?></p>
                                        <?php
                                        if($data->kyc_status==0)
                                            { ?>
                                        <a style="color: green;" href="<?=('sales_office/edit-distributor.php?id='.$data->id) ?>">Click to Update Details </a>
                                    <?php } ?>
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