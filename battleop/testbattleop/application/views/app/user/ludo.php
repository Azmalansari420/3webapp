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
        padding: 10px 20px 13px;
    }
    /*.single-product-wrap 
    {
        padding: 10px 6px;
    }*/
    .single-product-wrap {
        padding: 3px 6px;
    }
    .single-product-wrap .details .thumb img {
        margin: auto;
        height: 50px;
        border-radius: 52px;
    }
    slick-track {
        width: 200px!important;
    }
        .single-product-wrap .betting-wrap h2 {
        font-size: 12px;
        font-weight: 600;
            color: black;
    }
    .single-product-wrap .betting-meta ul li {
        font-size: 14px;
        display: unset;
        align-items: center;
        width: 50%;
        color: white;
        padding: 5px 0;
    }
    .single-product-wrap .betting-meta {
         margin-top: 0px; 
        border-top: 1px solid var(--border-color, #E5E5E5);
         padding-top: 0px; 
    }
    .single-product-wrap.slick-slide.slick-current.slick-active
    {
        background: white!important;
    }
    .single-product-wrap .title {
        font-size: 14px;
        font-weight: 600;
        color: #000;
            margin-bottom: 0;
    }
    .single-product-wrap .details .team-name {
        font-size: 12px;
        font-weight: 600;
        margin-top: 10px;
        color: black;
    }
    .time {
        color: #4fcd3a !important;
        font-weight: 600 !important;
    }
    .single-product-wrap {
        border-radius: 8px;
        background: #ffffff;
    }
    .single-product-wrap .betting-meta ul li a {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .mybet-page-wrap
    {
        margin-top: 0!important;
    }
    .top-bar {
        background: white;
        padding: 4px 13px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        font-weight: 600;
        color: black;
    }
    .balance>a>span {
    display: none !important;
}
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ms-5 ps-5">Ludo</h3>
            <div class="balance"><?=price_formate($full_detail->wallet+$full_detail->winning_amt) ?> </div> 
        </div>
        <div class="mybet-page-wrap">            
            <div class="container">
                <div class="banner-slider owl-carousel mb-4">
                    <div class="item">
                        <img src="<?=base_url() ?>assets/img/banner/1.png" alt="img">
                    </div>
                    <div class="item">
                        <img src="<?=base_url() ?>assets/img/banner/2.png" alt="img">
                    </div>
                    <div class="item">
                        <img src="<?=base_url() ?>assets/img/banner/3.png" alt="img">
                    </div>
                </div>
<style>
    .item.sec-item {
    width: 200px;
}
.owl-nav {
    display: none;
}
.owl-dots {
    display: none;
}
.my-challemge p {
    font-size: 11px;
    color: black;
}
.thumb-2 {
    display: flex;
    justify-content: center !important;
}
.thumb-2>img{
    height: 50px!important;
    width: 50px!important;
    text-align: center;
}
span.win-lose {
    color: black;
    font-weight: 600;
    font-size: 11px;
    color: red;
}
button.cancel-btn.w-100 {
    background: red;
    border: red;
    color: white;
    font-size: 13px;
}
</style>
                <div class="top-bar">
                    <a class="top-bar-btn" href="ludo-user-list.php">My Challenges</a>
                    <a class="top-bar-btn" href="ludo-all-challenge.php">View All Challenges</a>
                </div>

                <div class="containe11r">
                    <div class="owl-carousel owl-theme">
                        <div class="item" style="width:195px">
                            <div class="item sec-item">
                                <div class="single-product-wrap my-challemge">
                                    <h6 class="title">Ludo #2022 <button style="color: red;border: none;font-weight: 600;">Classic</button></h6>
                                    <p>Your Challenge Has Been Accepted</p>
                                    <div class="thumb-2">
                                        <img src="<?=base_url() ?>assets/logo.png" alt="img" style="height: 50px;">
                                    </div>
                                    <span class="win-lose">Winning 1230</span>
                                <button class="cancel-btn w-100">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class="item" style="width:195px">
                            <div class="item sec-item">
                                <div class="single-product-wrap my-challemge">
                                    <h6 class="title">Ludo #2022 <button style="color: red;border: none;font-weight: 600;">Classic</button></h6>
                                    <p>Your Challenge Has Been Accepted</p>
                                    <div class="thumb-2">
                                        <img src="<?=base_url() ?>assets/logo.png" alt="img" style="height: 50px;">
                                    </div>
                                    <span class="win-lose">Winning 1230</span>
                                <button class="cancel-btn w-100">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class="item" style="width:195px">
                            <div class="item sec-item">
                                <div class="single-product-wrap my-challemge">
                                    <h6 class="title">Ludo #2022 <button style="color: red;border: none;font-weight: 600;">Classic</button></h6>
                                    <p>Your Challenge Has Been Accepted</p>
                                    <div class="thumb-2">
                                        <img src="<?=base_url() ?>assets/logo.png" alt="img" style="height: 50px;">
                                    </div>
                                    <span class="win-lose">Winning 1230</span>
                                <button class="cancel-btn w-100">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class="item" style="width:195px">
                            <div class="item sec-item">
                                <div class="single-product-wrap my-challemge">
                                    <h6 class="title">Ludo #2022 <button style="color: red;border: none;font-weight: 600;">Classic</button></h6>
                                    <p>Your Challenge Has Been Accepted</p>
                                    <div class="thumb-2">
                                        <img src="<?=base_url() ?>assets/logo.png" alt="img" style="height: 50px;">
                                    </div>
                                    <span class="win-lose">Winning 1230</span>
                                <button class="cancel-btn w-100">Cancel</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <!--     <div class="banner-slider owl-carousel mb-4">

                    <div class="item sec-item">
                        <div class="single-product-wrap">
                            <h6 class="title">Ludo #2022 <button class="btn-sm btn-c btn-danger">Classic</button></h6>
                            <div class="details">
                                <div class="thumb"><h6 class="team-name">Your Challange Accept</h6></div>
                            </div>
                            <div class="betting-meta">
                                <ul>
                                    <li style="background: green;">Winning 539.00 Coins</li>
                                    <li style="background: darkblue;"><a data-bs-toggle="modal" data-bs-target="#user-accept-model">Accept</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div> -->

                <div class="slider-content">
                    <div class="single-product-wrap">
                        <h6 class="title">Ludo #2022 <button class="btn-sm btn-c btn-danger">Classic</button></h6>
                        <div class="details">
                            <div class="thumb"><img src="<?=base_url() ?>assets/img/comment/my-profile.png" alt="img"><h6 class="team-name">Amit</h6></div>
                            <div class="betting-wrap">
                                <h2>Has Challenged For</h2>
                                <div class="time">300.00 Coins</div>
                            </div>
                            <div class="thumb"><img src="<?=base_url() ?>assets/logo.png" alt="img"><h6 class="team-name">Wating</h6></div>
                        </div>
                        <div class="betting-meta">
                            <ul>
                                <li style="background: green;">Winning 539.00 Coins</li>
                                <li style="background: darkblue;"><a data-bs-toggle="modal" data-bs-target="#user-accept-model">Accept</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-product-wrap">
                        <h6 class="title">Ludo #2022 <button class="btn-sm btn-c btn-danger">Classic</button></h6>
                        <div class="details">
                            <div class="thumb"><img src="<?=base_url() ?>assets/img/comment/my-profile.png" alt="img"><h6 class="team-name">Amit</h6></div>
                            <div class="betting-wrap">
                                <h2>Has Challenged For</h2>
                                <div class="time">310.00 Coins</div>
                            </div>
                            <div class="thumb"><img src="<?=base_url() ?>assets/logo.png" alt="img"><h6 class="team-name">Wating</h6></div>
                        </div>
                        <div class="betting-meta">
                            <ul>
                                <li style="background: green;">Winning 539.00 Coins</li>
                                <li style="background: green;"><a href="ludo-match-join-wallet.php">Accepted</a></li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <?php include('include/menubar-ludo.php'); ?>
 

<style>
    .modal-card-wrap {
        text-align: unset !important;
    }
    .modal-card-wrap.text-center>h3 {
        text-align: center;
    }   
    .edit-form-wrap .single-input-wrap {
    margin-bottom: 0px!important;
    padding-bottom: 0px !important;
}
     .money-btn {
        position: inherit !important;
        background: white !important;
        color: black !important;
        border-radius: 7px;
        padding: 0px 20px;
        height: 35px;
        line-height: 1;
        margin: 0 0 5px 0;
    }
    .money-btn:after {
        content: inherit;
    }
    .form-control {
    color: #ffffff !important;
    background-color: #1b183e !important;
    border: 1px solid #ffffff !important;
    padding: 10px !important;
    border-radius: 5px !important;
}
.modal-card-wrap .btn {
    margin-top: 20px;
}
</style>


<!-- create challenge -->
<div class="modal fade filter-modal-popup" id="user-add-model" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="modal-card-wrap text-center">
                    <h3 class="title">Add Challenge (Classic)</h3>
                    <form class="edit-form-wrap front_form_data" id="SignupForm1" method="post">
                        <div class="single-input-wrap">
                            <input type="text" class="form-control" placeholder="Game Name" name="fname" required >
                        </div>
                        <div class="single-input-wrap">
                            <input type="text" class="form-control" placeholder="Enter Amount" id="w_amount" readonly>
                        </div>
                        <div class="single-input-wrap">
                            <input type="text" class="form-control" placeholder="Enter Room ID" id="w_amount" >
                        </div>
                        <?php  
                        $buttons = explode(",", $sitesetting[0]->withdraw);
                        foreach ($buttons as $key => $value) {
                        ?>
                            <button type="button" class="btn btn-default money-btn" data-amt="<?=$value ?>"><?=$value ?></button>
                        <?php } ?>                          
                        <button type="submit" class="btn btn-base w-100 mt-4">Submit & Pay</button>
                    </form>               
                </div>
            </div>              
        </div>            
    </div>
</div>



<!-- -user-accept chellange model -->
    <div class="modal fade filter-modal-popup" id="user-accept-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <h3 class="title">Accept Challenge (Classic)</h3>
                        <form class="edit-form-wrap front_form_data" id="SignupForm1" method="post">
                            <div class="single-input-wrap">
                                <!-- <label>Game Name</label> -->
                                <input type="text" class="form-control" placeholder="Game Name" name="fname" required >
                            </div>
                            <div class="single-input-wrap">
                                <input type="text" class="form-control" placeholder="Enter Amount" id="w_amount" readonly value="300">
                            </div>
                                                    
                            <button type="submit" class="btn btn-base w-100 mt-4">Submit & Pay</button>
                        </form>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

   
    

      <?php include('include/allscript.php'); ?>
<script>

$('.owl-carousel').owlCarousel({
    margin:10,
    loop:false,
    autoWidth:true,
    items:2
})
</script>
</body>
</html>