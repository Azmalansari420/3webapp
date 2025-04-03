<?php
$id = $this->input->get('id');
$matche = $this->db->get_where('matches',array('id'=>$id))->result_object();
if(!empty($matche))
    $matche = $matche[0];
$matchfee = $matche->entry_fee;
?>
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
    .single-page-area .title-area {
        padding: 16px 20px 22px;
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
/*        padding: 4px 25px;*/
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
    .filter-modal-popup {
        height: 90%!important;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Joinning Match</h3>
        </div>
        <div class="container">
            <div class="wallet-ballance-card deposite-boxs">
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
            <!-- <div class="wallet-btn-wrap btn-wrap mt-4">
                <a class="btn btn-base" href="deposit.html">Deposit</a>
                <a class="btn btn-border" href="withdraw.html">Withdraw</a>
            </div> -->
        </div>
        <div class="transaction-wrap text-center">
            <div class="header-wrap">
                <div class="container">
                    <h6 class="text-dark">Match Entry Fee Per Player: <?=$matchfee ?></h6>
                    
                    <?php
                    if($matche->entry_type!='Free')
                    { 
                        $totalamt = $full_detail->wallet+$full_detail->winning_amt;
                    if($totalamt>=$matchfee)
                        { ?>
                    <h5 class="text-dark">You Have Enough PlayCoin to Join this Match.</h5>
                    <button class="btn btn-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#deposit-modal">Join Now</button>
                <?php  } else { ?>
                    <h5 class="text-dark">You don't Have Enough PlayCoin to Join this Match.</h5>
                    <a href="user-wallet.php" class="btn btn-primary mt-3 w-100"> Please Recharge</a>
                <?php } } else {?>
                    <button class="btn btn-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#deposit-modal">Join Now</button>
                <?php } ?>


                </div>
            </div>

        </div> 
              
    </div>  
    
    <!-- Modal -->
    <div class="modal fade filter-modal-popup" id="deposit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap deposit-modal-wrap">
                        <h3 class="title">Enter Game Username</h3>
                        <form class="default-form-wrap" method="post">
                            <input type="hidden" name="match_id" id="match_id" value="<?=$id ?>">
                            <input type="hidden" name="amount" id="match_amount" value="<?=$matchfee ?>">
                            <input type="hidden" name="match_type" id="match_type" value="<?=$matche->match_type ?>">
                            <?php
                                if($matche->match_type=='Solo')$count=1;
                                if($matche->match_type=='Duo')$count=2;
                                if($matche->match_type=='Squad')$count=4;
                                $count = 1;
                                $i = 0;
                                while ($i<$count){

                                 ?>
                                <div class="single-input-wrap">
                                    <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label> 
                                    <input required type="text" class="form-control username" placeholder="Enter Your Game Username" name="username[]" >
                                </div>
                                <div class="single-input-wrap">
                                    <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label> 
                                    <input required type="text" class="form-control game_uid" placeholder="Enter Your Game UID" name="game_uid[]" >
                                </div>
                            <?php $i++; } ?>


                            <button name="submit" class="btn btn-base w-100 mt-2 join-match-btn" type="button">Submit</button>
                            <p>Note:- Make sure you enter your Game Username(IGN)</p>
                        </form>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>           
                    </div>
                </div>              
            </div>            
        </div>
    </div>


<!-- ---sucsess model -->
<div class="modal fade filter-modal-popup" id="ongoing-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <p class="title model-title">You are Succesfully Join Match</p>
                        <a class="btn btn-primary" onclick="history.go(-1)">Go Back</a>            
                    </div>
                </div>              
            </div>            
        </div>
    </div>
   

   <?php include('include/allscript.php'); ?>


<script>
   $(document).on("click", ".join-match-btn",(function(e) {
      matchjoin();
    })); 

    function matchjoin()
    {
        match_id = $("#match_id").val(); 
        match_type = $("#match_type").val(); 
        amount = $("#match_amount").val(); 

        username = [];
        username_temp = $('.username');
        $.each(username_temp, function(index, item) {
            username.push(item.value);
        });

        game_uid = [];
        game_uid_temp = $('.game_uid');
        $.each(game_uid_temp, function(index, item) {
            game_uid.push(item.value);
        });

        if(username=="")
        {
            print_toast("Please Enter Your Game Username...");
            return false;
        }
        // if(username.length === 0)
        // {
        //     print_toast("Please Enter Your Game Username...");
        //     return false;
        // }
        if(game_uid=="")
        {
            print_toast("Please Enter Your UID...");
            return false;
        }

        var form = new FormData();
        form.append("match_id", match_id);
        form.append("match_type", match_type);
        form.append("amount", amount);
        form.append("username", username);
        form.append("game_uid", game_uid);

        var settings = {
          "url": "<?=base_url() ?>api/user/user_join_match",
          "method": "POST",
          "dataType": "Json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          print_toast(response.message);
          if(response.status==200)
          {
            $("#ongoing-modal").modal("show");
            $("#deposit-modal").modal("hide");
            // window.history.back();

          }
        });
    }
</script>





</body>
</html>