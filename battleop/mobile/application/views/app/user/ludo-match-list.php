
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
        height: 75px;
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
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ms-5">Ludo King</h3>
            <!-- <div class="balance">$500 <span><img src="<?=base_url() ?>assets/img/icon/dollar-sign.png" alt="img"></span></div>  -->
        </div>
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
            <div class="sports-wrap mt-4">
                <div class="sports-slider slider-nav text-center">
                    <div class="sports-slider-item">Classic</div>
                    <div class="sports-slider-item">Popular</div>                  
                </div>
                <div class="sports-slider-wrap slider-for">
                    <!-- live now -->
                    <div class="slider-content">
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
                                    <li style="background: darkblue;"><a href="ludo-match-join-wallet.php">Accept</a></li>
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
                                    <li style="background: darkblue;"><a href="ludo-match-join-wallet.php">Accept</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- ---result -->
                    <div class="slider-content">
                        <div class="single-product-wrap">
                            <h6 class="title">Ludo #2022 <button class="btn-sm btn-c btn-gradient-05">Popular</button></h6>
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
                                    <li style="background: darkblue;"><a href="ludo-match-join-wallet.php">Accept</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>                    
            </div>
        </div>
        <?php include('include/menubar.php'); ?>
    </div>  

    <!-- Modal -->
    <div class="modal fade filter-modal-popup" id="sorry-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-error-warning-line"></i>
                        </div>
                        <h3 class="title">So Sorry!</h3>
                        <p>You do not have enough balance. Please make a deposit</p>
                        <a class="btn btn-base w-100" href="my-wallet.html">Deposit Now</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

    <div class="modal fade filter-modal-popup" id="success-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="title">Success!</h3>
                        <p>Check the results in notifications after finish the match</p>
                        <a class="btn btn-base w-100" href="notification.html">Okay</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

    <div class="modal fade filter-modal-popup" id="failed-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-error-warning-line"></i>
                        </div>
                        <h3 class="title">Failed!</h3>
                        <p>So Sorry! The system is overloaded please try again later</p>
                        <a class="btn btn-base w-100" href="">Try Again</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>
    

   <?php include('include/allscript.php'); ?>
</body>
</html>