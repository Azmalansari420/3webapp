<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('include/allcss.php'); ?>
</head>
<style>
    .pd-top-110 {
    padding-top: 32px;
/*    padding-top: 45px;*/
}
    
    .e-sports {
/*    padding-bottom: 80px;*/
}
.esport-box {
    width: 33%;
    float: left;
    padding: 5px;
}
.main-home-area .profile-area {
    padding: 5px 20px 8px;
    background: #000;
    border-radius: unset;
}
.balance>a>span {
    display: none !important;
}
.blog-page-wrap {
    margin-top: 15px;
}
</style>
<body class='sc5 dark'>
    <!-- preloader area start -->
   <?php include('include/loader.php'); 
    
   ?>

    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    
    <div class="container">
        <div class="main-home-area">
            <div class="profile-area" style="justify-content: space-between !important;">
                <div class="media">
                    <a href="profile.php" class="thumb">
                        <img src="<?=$get_user['image'] ?>" alt="img">
                    </a>
                    <div class="media-body">
                        <!-- <span class="profile-name"><?=$full_detail->fname.' '.$full_detail->lname ?></span> -->
                        <div class="balance">
                            <a href="<?=('user-wallet') ?>"><?=price_formate($full_detail->wallet+$full_detail->winning_amt) ?></a>
                        </div>
                    </div>
                </div>
                <div>
                    <h5 style="margin: 0;">Battle OP</h5>
                </div>
                <div class="btn-wrap" style="    margin-left: 0;">
                    <!-- <a class="icon-btn" href=""><i class="ri-search-line"></i></a> -->
                    <a class="icon-btn" href="notification.php"><i class="ri-notification-3-line"></i> 
                        <!-- <span class="badge">2</span> -->
                    </a>
                </div>
            </div>  

            <div class="banner-slider owl-carousel pd-top-110 mb-3">

                <?php
                $this->db->select('url,image');
                $this->db->order_by('id desc');
                $slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,));
                foreach($slider as $data)
                    { ?>
                <div class="item">
                    <a data-href="<?=$data->url ?>" class="chrome-btn">
                        <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" alt="img">
                    </a>
                </div>
            <?php } ?>
                
            </div>

            <h6 class="mb-2">Games</h6>
            <div class="slider-content">
                <div class="single-product-wrap">
                    <a href="ludo.php">
                    <!-- <a href="ludo-match-list.php"> -->
                        <img src="<?=base_url() ?>assets/ludo.png" class="img">
                    </a>
                </div>
            </div>

            <h6 class="mb-2 mt-3">E-Sports</h6>

            <div class="blog-page-wrap ">
                <div class="e-sports row m-0">
                    <?php
                    $this->db->select('id,image');
                    $games = $this->crud->selectDataByMultipleWhere('games',array('status'=>1,));
                    foreach($games as $data)
                        { ?>
                    <div class="item esport-box">
                        <div class="single-blog-card">
                            <div class="card-img">
                                <a href="<?=('e-sport?id='.$data->id) ?>">
                                    <img src="<?=base_url() ?>media/uploads/games/<?=$data->image ?>" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            
                </div>
            </div>
            
            
            <?php include('include/menubar.php'); ?>


        </div>
    </div>  


    <?php include('include/allscript.php'); ?>

</body>
</html>