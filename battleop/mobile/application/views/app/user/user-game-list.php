<?php
$game_id = $this->input->get('game_id');
// print_r($game_id);
// die;
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
    .nav {
        justify-content: center;
    }
    .single-page-area .title-area {
        padding: 15px 20px 13px;
    }
    .single-page-area {
           padding-top: 90px;
            padding-bottom: 80px;
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
        padding: 0 18px;
    /*        padding: 0 35px;*/
    }
    .mybet-single-card .card-title {
        display: flex;
        justify-content: center;
        margin-bottom: 3px;
    }
    .mybet-single-card .card-title h6 {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 0;
    margin-left: 20px;
    margin-top: 5px;
    color: black;
    }
    .mybet-single-card {
        border-radius: 8px;
        background: #ffffff;
    }

    /*.mybet-single-card .bet-details li {
        font-size: 17px;
        color: black;
        font-weight: 600;
    }*/
    .mybet-single-card .bet-status li {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        font-weight: 700;
        color: black!important;
    }
    a.join-btn {
        background: black;
        padding: 5px 10px;
        color: white;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid #ffffff;
        position: relative;
        top: 10px;
    }

    .mybet-single-card .bet-details li {
    display: inline-grid;
    justify-content: space-evenly;
    font-size: 12px;
    font-weight: 400;
    width: 32%;
    margin-bottom: 10px;
    }

.mybet-single-card .bet-details li {
    font-size: 15px;
    color: black;
    font-weight: 600;
}
.progress-body {
    width: 65%;
}
.progress-body1 {
    display: flex;
    justify-content: space-between;
}

a.join-btn {
    background: #938e8e;
/*    background: black;*/
    padding: 5px 10px;
    color: white;
    font-size: 14px;
    font-weight: 600;
    border: 1px solid #ffffff;
    position: relative;
    top: -9px;
}
.span-class{
    position: relative;
    right: 66%;
    font-weight: 700;
    top: 15px;
    color: black;
    font-size: smaller;
}
.single-page-area .title-area .balance {
    border-radius: 24px;
    border: 1px solid var(--border-color, #E5E5E5);
    background: var(--white-color, #fff);
    display: inline-flex;
    align-items: center;
    padding: 0;
    line-height: normal;
    justify-content: space-between;
    width: auto;
    margin-left: auto;
    font-size: 25px;
}

.mybet-single-card .card-title {
    justify-content: left!important;
}
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" ><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ms-5 ps-5">My Contest</h3>
            <div class="balance"><span><a href="notification.php"><i class="ri-notification-3-line"></i></a></span></div> 
        </div>
        <div class="mybet-page-wrap mt-0">
            <div class="container">




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    
    <div class="swiper-slide">
        
        <?php
      $this->db->order_by('id desc');
        $this->db->group_by('match_id');
        $joinlist = $this->db->get_where('join_match',array('user_id'=>$full_detail->id,'status'=>1,'game_id'=>$game_id))->result_object();
        if(!empty($joinlist))
        {
        foreach($joinlist as $key => $data)
            { 

                  $matche = $this->db->get_where('matches',array('id'=>$data->match_id,))->result_object();
                  if(!empty($matche))
                    $matche = $matche[0];

                if(!empty($matche->id))
                {
                    $query = $this->db->where('match_id',$matche->id)->get('join_match_participates');
                    $count = $query->num_rows();
                    $percantage =  $count/$matche->room_size * 100;

                    $my_participent = $this->db->where(array('match_id'=>$matche->id,"user_id"=>$full_detail->id,))->get('join_match_participates');
                    $my_count = $my_participent->num_rows();

              

            ?>
        <div class="mybet-single-card">
            <div class="card-title">
                <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
                <h6 style="text-transform: uppercase;"><?=$matche->match_title ?><br><span class="card-time"><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></span></h6>
            </div>
            <ul class="bet-details">
                <li class="upcoming-modal-open" data-match_type="<?php if(!empty($matche->match_title)) echo $matche->match_title; ?>" data-entry_type="<?php if(!empty($matche->entry_type)) echo $matche->entry_type; ?>" data-htag=" <?php if(!empty($matche->id)) echo $matche->id; ?>" data-prize_pool_description="<?php if(!empty($matche->prize_pool_description)) echo $matche->prize_pool_description; ?>"><span>Prize Pool:
                            <span>
                            <!-- <span data-bs-toggle="modal" data-bs-target="#upcoming-modal<?=$key ?>"> -->
                            <i class="ri-arrow-down-s-line"></i></span></span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->total_prize_pool ?></span>
                        </li>
                <a href="<?=('e-sport-game-details?id='.$matche->id) ?>">
                    <li><span>Per Kill:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->point_per_kill ?></span></li>
                    <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$matche->entry_fee ?></span></span></li>
                    <li><span>Type:</span><span> <span class="status-win"><?=$matche->match_type ?></span></span></li>
                    <li><span>Version:</span><span> <span class="status-win"><?=$matche->version ?></span></span></li>
                    <li><span>Map:</span><span> <span class="status-win"><?=$matche->map ?></span></span></li>
                </a>
            </ul>
            <div class="progress-body1" style="justify-content: center;">
                <div class="progress progress-md mb-3 progress-body">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$percantage ?>%" aria-valuenow="<?=$count ?>" aria-valuemin="0" aria-valuemax="<?=$matche->room_size ?>"><?=$count ?></div>
                </div>
                <span class="span-class"><?=$count ?>/<?=$matche->room_size ?></span> 
                <a class="join-btn" href="<?=$matche->specter_url ?>" style="background: black;padding: 5px 5px;color: white;font-size: 8px;font-weight: 600;border: 1px solid #ffffff;position: relative;top: -4px;line-height: 2.5;">Spectate URL</a> 

            </div>
        </div>

        <?php } } }else{ ?>
            <img src="<?=base_url() ?>assets/ongoing.png" class="img-fluid">
        <?php } ?>
    </div>


    <div class="swiper-slide">
        <?php
        $this->db->order_by('id desc');
            $this->db->group_by('match_id');
            $joinlist2 = $this->db->get_where('join_match',array('user_id'=>$full_detail->id,'status'=>0,'game_id'=>$game_id))->result_object();
            



            if(!empty($joinlist2))
            {

                foreach($joinlist2 as $key => $data)
                { 
                    $matche = $this->db->get_where('matches',array('id'=>$data->match_id,))->result_object();

                  if(!empty($matche))
                    $matche = $matche[0];

                    if(!empty($matche->id))
                    {

                        $query = $this->db->where('match_id',$matche->id)->get('join_match_participates');
                        $count = $query->num_rows();
                        if(empty($matche->room_size)) $matche->room_size = 1;
                        $percantage =  $count/$matche->room_size * 100;

                        $my_participent = $this->db->where(array('match_id'=>$matche->id,"user_id"=>$full_detail->id,))->get('join_match_participates');
                        $my_count = $my_participent->num_rows();

                ?>
                <div class="mybet-single-card">
                    <div class="card-title">
                        <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
                        <h6 style="text-transform: uppercase;">
                            <?=$matche->match_title ?><br><span class="card-time"><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></span></h6>
                    </div>
                    <ul class="bet-details">
                        <li class="upcoming-modal-open" data-match_type="<?php if(!empty($matche->match_title)) echo $matche->match_title; ?>" data-entry_type="<?php if(!empty($matche->entry_type)) echo $matche->entry_type; ?>" data-htag=" <?php if(!empty($matche->id)) echo $matche->id; ?>" data-prize_pool_description="<?php if(!empty($matche->prize_pool_description)) echo $matche->prize_pool_description; ?>"><span>Prize Pool:
                            <span>
                            <!-- <span data-bs-toggle="modal" data-bs-target="#upcoming-modal<?=$key ?>"> -->
                            <i class="ri-arrow-down-s-line"></i></span></span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->total_prize_pool ?></span>
                        </li>
                        <a href="<?=('e-sport-game-details?id='.$matche->id) ?>">
                            <li><span>Per Kill:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->point_per_kill ?></span></li>
                            <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$matche->entry_fee ?></span></span></li>
                            <li><span>Type:</span><span> <span class="status-win"><?=$matche->match_type ?></span></span></li>
                            <li><span>Version:</span><span> <span class="status-win"><?=$matche->version ?></span></span></li>
                            <li><span>Map:</span><span> <span class="status-win"><?=$matche->map ?></span></span></li>
                        </a>
                    </ul>
                    <div class="progress-body1" style="justify-content: center;">
                        <div class="progress progress-md mb-3 progress-body">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$percantage ?>%" aria-valuenow="<?=$count ?>" aria-valuemin="0" aria-valuemax="<?=$matche->room_size ?>"><?=$count ?></div>
                        </div>
                        <span class="span-class"><?=$count ?>/<?=$matche->room_size ?></span>  

                        <?php 
                        $per_id_user_join = 0;
                        if($matche->match_type=='Solo')$per_id_user_join=1;
                        if($matche->match_type=='Duo')$per_id_user_join=2;
                        if($matche->match_type=='Squad')$per_id_user_join=4;
                        if($per_id_user_join<=$my_count){ ?>
                            <a class="join-btn">Joined</a>
                        <?php }else{ ?>
                            <a href="<?=('e-sport-match-join?id='.$matche->id) ?>" class="join-btn">+ Join</a>
                        <?php } ?>

                    </div>
                   
                </div>

                 
        <?php } } }else{ ?>
            <img src="<?=base_url() ?>assets/ongoing.jpg" class="img-fluid">
        <?php } ?>
    </div>

<style>
    a.result-btn {
        padding: 5px 12px;
        background: green;
        color: white;
        font-size: 13px;
        line-height: 2;
        border-radius: 10px;
        text-align: center;
    }
</style>

    <div class="swiper-slide">
        <?php

         $this->db->group_by('match_id');
         $this->db->order_by('id desc');
         $joinlist3 = $this->db->get_where('join_match',array('user_id'=>$full_detail->id,'status'=>2,'game_id'=>$game_id))->result_object();

        

            if(empty($joinlist3))
                echo '<img src="'.base_url().'assets/result1.jpg" class="img-fluid">';
            foreach($joinlist3 as $key => $data){ 

            $matche = $this->db->get_where('matches',array('id'=>$data->match_id,))->result_object();
            if(!empty($matche))
                    $matche = $matche[0];
            if(!empty($matche->id)) 
            {  
        ?>
            <div class="mybet-single-card">
                <div class="card-title">
                    <img src="<?=base_url() ?>assets/logo.png" class="img-fluid" style="height:50px">
                    <h6 style="text-transform: uppercase;"><?=$matche->match_title ?> <br><span class="card-time"><?=date('d M Y - h:i A',strtotime($matche->match_date_time)) ?></span></h6>
                </div>
                <ul class="bet-details">
                    <li class="upcoming-modal-open" data-match_type="<?php if(!empty($matche->match_title)) echo $matche->match_title; ?>" data-entry_type="<?php if(!empty($matche->entry_type)) echo $matche->entry_type; ?>" data-htag=" <?php if(!empty($matche->id)) echo $matche->id; ?>" data-prize_pool_description="<?php if(!empty($matche->prize_pool_description)) echo $matche->prize_pool_description; ?>"><span>Prize Pool:
                            <span>
                            <!-- <span data-bs-toggle="modal" data-bs-target="#upcoming-modal<?=$key ?>"> -->
                            <i class="ri-arrow-down-s-line"></i></span></span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->total_prize_pool ?></span>
                        </li>
                    <a href="<?=('e-sport-match-result?id='.$matche->id) ?>">
                        <li><span>Per Kill:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <?=$matche->point_per_kill ?></span></li>
                        <li><span>Entry Fee:</span><span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win"><?=$matche->entry_fee ?></span></span></li>
                        <li><span>Type:</span><span> <span class="status-win"><?=$matche->match_type ?></span></span></li>
                        <li><span>Version:</span><span> <span class="status-win"><?=$matche->version ?></span></span></li>
                        <li><span>Map:</span><span> <span class="status-win"><?=$matche->map ?></span></span></li>
                    </a>
                </ul>
                <ul class="bet-status result-btns">
                    <a href="<?=$matche->specter_url ?>" class="result-btn w-100">Watch Match</a>
                </ul>

              <!--   <ul class="bet-status result-btns">
                    <a href="<?=('e-sport-match-result?id='.$matche->id) ?>" class="btn btn-primary w-100">View Match Result</a>
                </ul> -->
            </div>
        <?php } } ?>
    </div>


  </div>
  <div class="swiper-pagination"></div>
</div>



<div class="modal fade filter-modal-popup" id="upcoming-modal-new" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="modal-card-wrap text-center">
                    <h3 style="font-size: 14px;" class="title model-title">Prize Pool<br><span class="head-small" ><span id="head-small"></span> Match #<span id="htag"></span></span></h3>
                    <p id="prize_pool_description"></p>
                </div>
            </div>              
        </div>            
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>


$(document).on("click", ".upcoming-modal-open",(function(e) {
    $("#upcoming-modal-new").modal("show");
    $("#head-small").html($(this).data("match_type")+' '+$(this).data("entry_type"));
    $("#htag").html($(this).data("htag"));
    $("#prize_pool_description").html($(this).data("prize_pool_description"));


})); 


  var swiper = new Swiper(".mySwiper", {
    initialSlide: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {

        if(index==0) name = 'ONGOING ';
        if(index==1) name = 'UPCOMING ';
        if(index==2) name = 'RESULT ';

        return '<span class="' + className + '">' + name + "</span>";
      },
    },
  });
</script>

<style>
.swiper-horizontal {
    touch-action: pan-y;
    padding-top: 70px;
}
.swiper-pagination {
    position: absolute;
    top: 0px !important;
    z-index: 9999999999 !important;
    width: 100% !important;
    height: 50px !important;
    left: 0 !important;
    display: flex;
}
.swiper-pagination > span {
    width: 33.333333%;
}
.swiper-pagination > span {
    width: 33.333333%;
    border-radius: 0 !important;
    height: 34px;
    display: grid;
    align-items: center;
    color: white !important;
    opacity: 1;
}
.swiper-pagination-bullet-active {
    background: #614bff;
    color: white;
}
</style>





            </div>
        </div>
      
    </div>  

    <!--ongoing Modal -->
    <div class="modal fade filter-modal-popup" id="ongoing-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <h3 class="title model-title">Prize Pool<br><span class="head-small">Solo Free Match #2025</span></h3>
                        <ul class="model-ul">
                            <li>Winner: 20</li>
                            <li>Ist Runnerup: 10</li>
                            <li>Runnerup 3-10: 5</li>
                        </ul>              
                    </div>
                </div>              
            </div>            
        </div>
    </div>

   



    <!-- result model -->
    <div class="modal fade filter-modal-popup" id="result-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <h3 class="title model-title">Prize Pool<br><span class="head-small">Solo Free Match #2025</span></h3>
                        <ul class="model-ul">
                            <li>Winner: 20</li>
                            <li>Ist Runnerup: 10</li>
                            <li>Runnerup 3-10: 5</li>
                        </ul>            
                    </div>
                </div>              
            </div>            
        </div>
    </div>
    

     <?php include('include/allscript.php'); ?>

<style>
    #scroll-top {
    position: fixed;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    bottom: 3rem;
    right: 0.5rem;
    z-index: 9999;
    width: 3.6rem;
    height: 3.6rem;
    font-size: 1.4rem;
    font-weight: 700;
    color: #222;
    opacity: 1;
    -webkit-transition: bottom 0.3s, opacity 0.3s;
    transition: bottom 0.3s, opacity 0.3s;
    background: orangered;
    border-radius: 50%;
}

 #scroll-top >img{
    width: 38px;
}
</style>


<!-- <a id="scroll-top" class="scroll-top show" href="<?=base_url('user-game-list') ?>" title="Top" role="button"> 
    <i class="ri-gamepad-line"></i>
</a> -->

</body>
</html>