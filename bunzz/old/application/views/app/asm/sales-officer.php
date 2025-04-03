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
    .btn-primary {
    color: #fff;
    background-color: #fa4530;
    border-color: #fa4530;
}
    
</style>
    <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a  class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Sales Officer</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="">
                <div class="tf-tab box-components">
                    <ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item" >
                          <a href="#!" class="nav-link  active" data-bs-toggle="tab" data-bs-target="#tabIcon1" role="tab" aria-controls="tabIcon1" aria-selected="true">
                                All Sales Officer
                            </a>
                        </li>
                        <li class="nav-item">
                           <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon2" role="tab" aria-controls="tabIcon2" aria-selected="false">
                                Active
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabIcon3" role="tab" aria-controls="tabIcon3" aria-selected="false">
                                In-Active
                            </a>
                         </li>                     
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane fade show active" id="tabIcon1" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$full_detail->id,'role'=>4));

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
                                          <a href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>"><?=$data->firm_name ?> 
                                            <?=salesofficerstatus($data->status) ?>
                                          </a>
                                        </h4>
                                        <p><?=$data->name ?> <br> <?=$data->mobile ?></p>
                                        <?php
                                        if($data->status==1)
                                            { ?>
                                        <a style="color: green;" href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>">Click to Update Details </a>
                                    <?php } ?>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>


                        <!-- active -->
                        <div class="tab-pane fade" id="tabIcon2" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$full_detail->id,'status'=>1,'role'=>4));
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
                                          <a href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>"><?=$data->firm_name ?> 
                                            <?=salesofficerstatus($data->status) ?>
                                          </a>
                                        </h4>
                                        <p><?=$data->name ?> <br> <?=$data->mobile ?></p>
                                        <a style="color: green;" href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>">Click to Update Details </a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- in active -->
                        <div class="tab-pane fade" id="tabIcon3" role="tabpanel">
                            <ul class="mt-3 mb-5">
                              <?php
                              $this->db->order_by('id desc');
                              $users = $this->crud->selectDataByMultipleWhere('users',array('asm_id'=>$full_detail->id,'status'=>0,'role'=>4));
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
                                          <a href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>"><?=$data->firm_name ?> 
                                            <?=salesofficerstatus($data->status) ?>
                                          </a>
                                        </h4>
                                        <p><?=$data->name ?> <br> <?=$data->mobile ?></p>
                                        <a style="color: green;" href="<?=('asm/sale-officer-edit.php?id='.$data->id) ?>">Click to Update Details </a>
                                    </div>
                                </li>
                                <?php } ?>
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