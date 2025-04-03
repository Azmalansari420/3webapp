<style>
    /*a.nav-link>i {
        color: black !important;
        font-weight: 600;
        font-size: 23px !important;
    }*/

    a.nav-link>i {
/*    color: #5f94bf !important;*/
    font-weight: 600;
    font-size: 23px !important;
}

.tf-balance-box .wallet-footer .wallet-card-item a .icon {
    display: flex
;
    justify-content: center;
    align-items: center;
    font-size: 40px;
    color: #5f94bf;
}
    .panel-sidebar .box-nav .nav-link span {
        color: #000;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
    }
    .btn-primary {
    color: #fff;
    background-color: #5f94bf;
    border-color: #5f94bf;
}

    .icon-arrow-up_minor:before {
        content: "\e95b";
        color: black !important;
    }

    .icon-star:before {
        content: "\e90a";
        color: black !important;
    }

    .panel-sidebar .panel-body {
        padding: 0px 0px 30px;
    }
    .panel-sidebar .box-nav {
    margin-top: 5px;
}
a.download-btn {
    background: #5f94bf;
    padding: 11px 26px;
    border-radius: 10px;
    color: white;
}
</style>

<div class="tf-panel left">
    <div class="panel_overlay"></div>
    <div class="panel-box panel-left panel-sidebar">
        <div class="header-sidebar bg_white_color is-fixed" style="padding: 5px 0;">
            <div class="tf-container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="tab-pane fade show active" id="icon1" role="tabpanel">

                        <div class="noti-box">
                            <a href="profile.php" class="noti-list text-white border-0 p-0 m-0">
                                <div class="icon-box bg_service-4">
                                    <img src="<?=base_url() ?>media/uploads/distributor/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'" style="border-radius: 93px;">
                                </div>
                                <div class="content-right d-flex justify-content-center px-2">
                                    <div class="title">
                                        <h3 class="fw_6 text-white"><?=$full_detail->name ?></h3>
                                    </div>
                                    <!-- <div class="desc">
                                        <p class="on_surface_color fw_4">Others</p>
                                        <span style="color:green;">100 Advance</span>
                                    </div> -->
                                </div>
                            </a>
                        </div>

                    </div>
                    <a href="javascript:void(0);" class="clear-panel"> <i class="icon-close1"></i> </a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="tf-container">
                <div class="box-content">

                    <ul class="box-nav">
                        <!-- <li class="nav-title">MENU</li> -->
                        <li>
                            <a href="home.php" class="nav-link">
                                <i class="icon icon-home"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <?php
                        if($full_detail->role==1)
                            { ?>
                        <li>
                            <a href="sku.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SKU Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="target-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Target</span>
                            </a>
                        </li>

                        <li>
                            <a href="scheme-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Scheme</span>
                            </a>
                        </li>

                        <li>
                            <a href="rsm-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>RSM Performance</span>
                            </a>
                        </li>

                        <li>
                            <a href="asm-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>ASM Performance</span>
                            </a>
                        </li>

                        <li>
                            <a href="sale-officer.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SO Performance</span>
                            </a>
                        </li>
                        <li>
                            <a href="my-notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Performance Notices</span>
                            </a>
                        </li>

                        <li>
                            <a href="notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>ASM Notices</span>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>RSM Notices</span>
                            </a>
                        </li> -->
                        
                        <!-- <li>
                            <a href="distributer-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>DS Application Status</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="distributer-wallet.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Wallet Report</span>
                            </a>
                        </li> -->
                        
                        

                         <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </li>


                        <?php } ?>

                        <?php
                        if($full_detail->role==2)
                            { ?>

                        <li>
                            <a href="scheme-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Scheme</span>
                            </a>
                        </li>

                        <li>
                            <a href="asm-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>ASM Performance</span>
                            </a>
                        </li>
                        <li>
                            <a href="sale-officer.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SO Performance</span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="distributer-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>DS Application Status</span>
                            </a>
                        </li>
                        <li>
                            <a href="sku.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SKU Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="distributer-wallet.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Wallet Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="distributer-ledger.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Ledger</span>
                            </a>
                        </li>

                        <li>
                            <a href="my-target.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Target (<?php echo $countrsm_target = countrsm_target($full_detail->id); ?>)</span>
                            </a>
                        </li>
                        <li>
                            <a href="assign-target-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Assign Target</span>
                            </a>
                        </li>

                         <li>
                            <a href="raise-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Grievances</span>
                            </a>
                        </li>


                       <!--  <li>
                            <a href="my-notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Performance Notices</span>
                            </a>
                        </li> -->

                        <li>
                            <a href="notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SO Notices</span>
                            </a>
                        </li>
                        

                        <!-- <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Reject Distributor</span>
                            </a>
                        </li> -->

                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- ASm -->
                    <?php
                        if($full_detail->role==3)
                            { ?>
                        <li>
                            <a href="approved-distributor-list.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Approved Distributor</span>
                            </a>
                        </li>
                        <li>
                            <a href="pending-distributor-list.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Pending Distributor</span>
                            </a>
                        </li>

                        <li>
                            <a href="sales-officer.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Sales Officers</span>
                            </a>
                        </li>
                        <li>
                            <a href="sales-officer-perfor.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Sales Officers Performance</span>
                            </a>
                        </li>
                        <li>
                            <a href="monthly-target.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Monthly Target </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="active-sales-officer.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Active Sales Officers</span>
                            </a>
                        </li>


                        <li>
                            <a href="comment.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Comment and Feedback</span>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Not Billed</span>
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>Distributor Ranking –</span>
                            </a>
                        </li>

                        <li>
                            <a href="scheme-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Scheme</span>
                            </a>
                        </li>

                        <li>
                            <a href="raise-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Grievances</span>
                            </a>
                        </li>
                        <li>
                            <a href="raise-my-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Grievances</span>
                            </a>
                        </li>


                        <!-- <li>
                            <a href="my-notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Performance Notices</span>
                            </a>
                        </li>

                        <li>
                            <a href="notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SO Notices</span>
                            </a>
                        </li> -->
                        



                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="update-profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span> Update Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="change-password.php" class="nav-link">
                                <i class="icon icon-secure1"></i>
                                <span> Change Password</span>
                            </a>
                        </li>
                    <?php } ?>


                    <!-- sales officer -->
                    <?php
                        if($full_detail->role==4)
                            { ?>                      
                        
                        <li>
                            <a href="distributor-list.php" class="nav-link">
                                <i class="icon icon-user3"></i>
                                <span>My Distributors</span>
                            </a>
                        </li>
                        <li>
                            <a href="distributer-active-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Active Distributor</span>
                            </a>
                        </li>
                        <li>
                            <a href="add-distributor.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Add Distributor</span>
                            </a>
                        </li>
                        <li>
                            <a href="search-filter.php" class="nav-link">
                                <i class="icon icon-search"></i>
                                <span>Search and Filters</span>
                            </a>
                        </li>
                        <li>
                            <a href="scheme-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Scheme</span>
                            </a>
                        </li>
                         <li>
                            <a href="my-notice-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Performance Notices</span>
                            </a>
                        </li>
                        <li>
                            <a href="raise-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Grievances</span>
                            </a>
                        </li>
                        <li>
                            <a href="raise-my-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>My Grievances</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="update-profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span> Update Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="change-password.php" class="nav-link">
                                <i class="icon icon-secure1"></i>
                                <span> Change Password</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- distributer -->
                        <?php
                        if($full_detail->role==5)
                            { ?>
                        <li>
                            <a href="wallet.php" class="nav-link">
                                <i class="icon icon-wallet1"></i>
                                <span>Wallet Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="cart.php" class="nav-link">
                                <i class="icon icon-market"></i>
                                <span>Cart</span>
                            </a>
                        </li>
                        <li>
                            <a href="order-history.php" class="nav-link">
                                <i class="icon icon-calendar3"></i>
                                <span>Order History</span>
                            </a>
                        </li>
                        <li>
                            <a href="get-invoice.php" class="nav-link">
                                <i class="icon icon-bills-1"></i>
                                <span>Invoice Recipt</span>
                            </a>
                        </li>
                        <li>
                            <a href="ledger.php" class="nav-link">
                                <i class="icon icon-add-card"></i>
                                <span>Ledger</span>
                            </a>
                        </li>
                        <li>
                            <a href="scheme-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Scheme</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-wallet-filled-money-tool"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="update-profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span> Update Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="raise-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Grievances</span>
                            </a>
                        </li>
                        <li>
                            <a href="change-password.php" class="nav-link">
                                <i class="icon icon-secure1"></i>
                                <span> Change Password</span>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-bar-chart-1"></i>
                                <span>My Performence</span>
                            </a>
                        </li> -->

                        <li>
                            <a href="term-condition.php" class="nav-link">
                                <i class="icon icon-bar-chart-1"></i>
                                <span>Term & Condition</span>
                            </a>
                        </li>

                        <li>
                            <a href="privacy-policy.php" class="nav-link">
                                <i class="icon icon-bar-chart-1"></i>
                                <span>Privacy Policy</span>
                            </a>
                        </li>
                        
                        
                    <?php } ?>


                    <?php
                        if($full_detail->role==6)
                            { ?>

                      
                        <li>
                            <a href="rsm-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>RSM Performance</span>
                            </a>
                        </li>

                        <li>
                            <a href="asm-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>ASM Performance</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="sale-officer.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SO Performance</span>
                            </a>
                        </li>

                        <li>
                            <a href="sku.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>SKU Report</span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="distributer-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Wallet Report</span>
                            </a>
                        </li>
                       
                        <!-- <li>
                            <a href="distributer-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>DS Application Status</span>
                            </a>
                        </li> -->
                        
                        <!-- <li>
                            <a href="distributer-wallet.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Wallet Report</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="distributer-ledger.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Ledger</span>
                            </a>
                        </li>

                        <li>
                            <a href="distributer-payment.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Payment</span>
                            </a>
                        </li>


                        <li>
                            <a href="transaction-records.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Transaction Records</span>
                            </a>
                        </li>



                        <!-- <li>
                            <a href="#!" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Reject Distributor</span>
                            </a>
                        </li> -->

                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </li>
                    <?php } ?>


                    <!-- account Team -->
                     <?php
                        if($full_detail->role==7)
                            { ?>

                      
                       
                       
                        
                        <li>
                            <a href="distributer-ledger.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Ledger</span>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="distributer-wallet-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Distributor Wallet Rc.</span>
                            </a>
                        </li> -->

                        <li>
                            <a href="ledger-creation-list.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Ledger Creation</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="credit-note.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Credit Note </span>
                            </a>
                        </li>

                        
                        <li>
                            <a href="get-invoice.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Invoice </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="wallet-recharge.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Wallet Recharge </span>
                            </a>
                        </li>

                     

                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </li>
                    <?php } ?>




                     <?php
                        if($full_detail->role==8)
                            { ?>

                      
                       
                       
                        
                        <li>
                            <a href="employees-add.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Add Employees</span>
                            </a>
                        </li>


                        <li>
                            <a href="profile.php" class="nav-link">
                                <i class="icon icon-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </li>



                        <?php } ?>

























                        <li>
                            <a href="<?=base_url() ?>api/auth/logout" class="nav-link">
                                <i class="icon icon-sign-in1"></i>
                                <span>Logout</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>