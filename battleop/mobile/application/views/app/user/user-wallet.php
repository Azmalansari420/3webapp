
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
<style>
    .single-page-area {
        padding-top: 45px;
    }
    .single-page-area {
        padding-bottom: 0;
    }
    .single-page-area .title-area {
        padding: 11px 20px 15px;
    }
    .deposite-boxs
    {
        display: flex;
        justify-content: space-between;
            padding: 10px 5px;
    }
    .deposite-sec {
        padding: 12px 15px;
    }
    .deposite-sec {
         padding: 4px 17px;
        border: 2px solid white;
        text-align: center;
        border-radius: 10px;
    }
    .header-wrap {
        background: #ffffff!important;
        border-radius: 0!important;
        padding: 110px 0px!important;
    }
    .nav {
        justify-content: center;
    }
    span.head-small {
        font-size: small;
    }
    .model-title{
        background: yellow;
        padding: 8px 0px;
        color: black;
    border-radius: 10px;
    }
    .model-ul>li{
        list-style: none;
    }
    .result-btns {
        display: flex;
        justify-content: space-around;
    }
    .result-btns>a {
        margin: 5px;
        padding: 0 35px;
    }
    .mybet-page-wrap .nav-tabs .nav-item {
        width: 30%;
    }
    .money-btn {
        float: left;
        width: 50%;
        text-align: center;
        margin-bottom: 15px;
        padding: 8px 6px;
    }
    .mybet-page-wrap {
         margin-top: 0px; 
    }

    .transaction-list li {
        display: flex;
        gap: 16px;
        align-items: center;
        padding: 10px 10px;
        border: 2px solid black;
        margin: 0;
/*        margin: 19px 0;*/
    }
    .details-box-p
    {
        color: black;
        margin: 0;
    }
    .single-page-area p {
        font-size: 12px;
        line-height: 1.5;
    }
    .transaction-list li .amount-details span {
        font-size: 12px;
        font-weight: 600;
        color: #000000;
    }
    .deposite-sec {
    padding: 4px 10px;
}

</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">My Wallet</h3>
        </div>
        <div class="container" >
            <div style="margin-top: 36px;text-align: center;">
                <h6>Total: &nbsp;&nbsp; <?=price_formate($full_detail->wallet+$full_detail->winning_amt) ?></h6>
            </div>
            <div class="wallet-ballance-card deposite-boxs" style="margin-top: 8px;">
                <div class="deposite-sec">
                    Deposited<br>
                    <span><span class="status-win"><?=price_formate($full_detail->wallet) ?></span></span>
                </div>
                <div class="deposite-sec">
                    Winning<br>
                    <span><span class="status-win"><?=price_formate($full_detail->winning_amt) ?></span></span>
                </div>
                <div class="deposite-sec">
                    Bonus<br>
                    <span><span class="status-win"><?=price_formate($full_detail->bonus_amt) ?></span></span>
                </div>
            </div>
        </div>

        <div class="mybet-page-wrap">
            <div class="btn-top">
                <a href="add-money.php" class="money-btn" style="background: red;color: white;">Add Money</a>
                <a href="withdraw.php" class="money-btn" style="background: green;color: white;">Withdraw</a>
            </div>
            
            <div class="container1" style="background: white;">
                <div class="tab-content" id="myTabContent">                    
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="transaction-list">

                            <?php
                            $id = $full_detail->id;
                            $this->db->order_by('id desc');
                            $wallet_hist = $this->db->get_where('user_history',array('user_id'=>$id,))->result_object();
                            foreach($wallet_hist as $key => $data)
                                {

                                    // $withdraw_request = $this->db->get_where('withdraw_request',array('user_id'=>$id))->result_object();
                                ?>
                            <li class="withdraw">
                                <div class="details">
                                    <p class="details-box-p"><?=$data->amount ?></p>
                                    <?php
                                    if($data->type=='credit')
                                        { ?>
                                    <p class="details-box-p" style="color:green;"><?=$data->message ?> </p>
                                    <?php } else {?>
                                    <p class="details-box-p" style="color:red;"><?=$data->message ?> </p>
                                    <?php } ?>
                                    <p class="details-box-p"><?=$data->message ?></p>
                                    <p class="details-box-p"></p>
                                </div>
                                <div class="amount-details">
                                    <?php
                                    if($data->type=='credit')
                                        { ?>
                                    <h6 style="color: #008000;"><?=$data->message ?></h6>
                                    <?php } else{?>
                                    <h6 style="color: red;"><?=$data->message ?>
                                        <br>
                                        <span><?=$data->reject_reason ?></span>
                                    </h6>
                                    <p style="color:black;padding: 0;margin-bottom: 0;"><?=withdraw_status($data->status) ?></p>
                                    <?php } ?>
                                    <span><?=date('d/m/Y h:i A',strtotime($data->date_time)) ?></span>
                                </div>
                            </li>
                        <?php } ?>

                           
                        </ul>                        
                    </div>                   
                </div>
            </div>
        </div>              
    </div>  
    
    

   

   <?php include('include/allscript.php'); ?>

</body>
</html>