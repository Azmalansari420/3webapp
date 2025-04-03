<?php
$id = $this->input->get('id');
$gamesname = $this->db->get_where('games',array('id'=>$id))->result_object();
if(!empty($gamesname))
    $g_name = $gamesname[0]->name;
    $g_content = $gamesname[0]->content;

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
        padding-top: 60px;
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
    margin-left: 0px;
/*    margin-left: 20px;*/
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
        font-size: 10px;
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

ul.upcomming-list {
    padding-left: 0 !important;
}
ul.oncomming-list {
    padding-left: 0 !important;
}

ul.result-list {
    padding-left: 0 !important;
}


</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" ><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ms-5 ps-5"><?=$g_name ?></h3>
            <div class="balance"><span><a href="notification.php"><i class="ri-notification-3-line"></i></a></span></div> 
        </div>
        <div class="mt-3">
            <marquee><?=$g_content ?></marquee>
        </div>
        <div class="mybet-page-wrap mt-0">
            <div class="container">




<link rel="stylesheet" href="<?=base_url() ?>assets/js/swiper-bundle.min.css" />

<div class="swiper mySwiper">
  <div class="swiper-wrapper">

    <!-- ----ongoing------- -->
    
    <div class="swiper-slide">

        <div class="oncomming-list-laoder" style="text-align:center;">
            <img src="<?=base_url() ?>media/uploads/site_setting/1710411278.png" class="img-fluid">
        </div>
        <ul class="oncomming-list"></ul>
        <!-- <button class="btn btn-danger mt-3 mb-3 oncomming-list-view-more" style="margin: 0 auto;display: block;">View More</button> -->
        
        
    </div>

    <!-- -----------upcoming--------- -->
    <div class="swiper-slide">

        <div class="oncomming-list-laoder" style="text-align:center;">
            <img src="<?=base_url() ?>media/uploads/site_setting/1710411278.png" class="img-fluid">
        </div>
        <ul class="upcomming-list"></ul>
        <!-- <button class="btn btn-danger mt-3 mb-3 upcomming-list-view-more" style="margin: 0 auto;display: block;">View More</button> -->

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
    <!-- ----------result------- -->
    <div class="swiper-slide">

        <div class="oncomming-list-laoder" style="text-align:center;">
            <img src="<?=base_url() ?>media/uploads/site_setting/1710411278.png" class="img-fluid">
        </div>
        <ul class="result-list"></ul>
        <!-- <button class="btn btn-danger mt-3 mb-3 result-list-view-more" style="margin: 0 auto;display: block;">View More</button> -->
       
    </div>


  </div>
  <div class="swiper-pagination"></div>
</div>


<!-- ==model -->
<div class="modal fade filter-modal-popup" id="upcoming-modal-new" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="modal-card-wrap text-center">
                    <h3 style="font-size: 14px;" class="title model-title">Prize Pool<br><span class="head-small" ><span id="head-small"></span> </span></h3>
                    <p id="prize_pool_description"></p>
                </div>
            </div>              
        </div>            
    </div>
</div>



<script src="<?=base_url() ?>assets/js/swiper-bundle.min-2.js"></script>
<script>


$(document).on("click", ".upcoming-modal-open",(function(e) {
    $("#upcoming-modal-new").modal("show");
    $("#head-small").html($(this).data("match_type"));
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
    bottom: 1rem;
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

#scroll-top {
  animation: vertical-shaking 1.9s infinite;
}

@keyframes vertical-shaking {
  0% {
        transform: translateY(0.5) 
    }
  25% {
        transform: translateY(10px) 
    }
  50% {
        transform: translateY(-10px) 
    }
  70% { 
        transform: translateY(10px) 
    }
    75% {
        transform: translateX(0px)
    }
  100% {
        transform: translateY(0.5) 
    }
}
</style>


<a id="scroll-top" class="scroll-top show" href="<?=('user-game-list?game_id='.$id) ?>" title="Top" role="button"> 
    <i class="ri-gamepad-line"></i>
</a>




<div class="modal fade filter-modal-popup " id="room-details-modelxx" tabindex="-1" aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="modal-card-wrap text-center">
                    <h3 class="title"> Room Details!</h3>
                    <div id="modalcbodyprint">
                        
                    </div>
                           
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                </div>
            </div>              
        </div>            
    </div>
</div>



<script>    
    var page = 0;
    var type = 0;
    var err_image = '<img src="<?=base_url() ?>assets/ongoing.jpg" class="img-fluid">';
    function upcomming_list()
    {
        var api_data_div = 'upcomming-list';
        var click_btn = '.upcomming-list-view-more';
        $("#preloader").addClass("show");
        $(click_btn).attr("disabled",true);
        $(".sweet-loader").addClass("show");
        var form = new FormData();
        form.append("page", page);
        form.append("use_type", type);
        form.append("id", '<?=$id ?>');
        var settings = {
          "url": "<?=base_url('welcome/upcomming_list') ?>",
          "method": "POST",
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType":"json",
          "data": form
        };
        $.ajax(settings).done(function (response) {
          console.log(response);
          $("#preloader").removeClass("show");
          $(".upcomming-list-laoder").hide();
          $('.upcomming-list-view-more').attr("disabled",false);
          if(response.status==200)
          {
            if(page==0)
                $('.'+api_data_div).html(response.data);
            else
                $("."+api_data_div+"").append(response.data);
            page++;
            $(click_btn).show();
          }
          else
          {
            $(click_btn).hide();
            if(page==0)
                $('.'+api_data_div).html(`<li style="color: white;text-align: center;background: darkred;width: 100%;">${err_image}</li>`);
            print_toast(response.message);
          }
        });
    }
    upcomming_list();
    $(document).on("click", ".upcomming-list-view-more",(function(e) {
        click_btn = $(this);
        upcomming_list();
    }));
</script>





<script>    
    var page = 0;
    var type = 0;
    var err_image = '<img src="<?=base_url() ?>assets/ongoing.png" class="img-fluid">';
    function ongoing_list()
    {
        var api_data_div = 'oncomming-list';
        var click_btn = '.oncomming-list-view-more';
        $("#preloader").addClass("show");
        $(click_btn).attr("disabled",true);
        $(".sweet-loader").addClass("show");
        var form = new FormData();
        form.append("page", page);
        form.append("use_type", type);
        form.append("id", '<?=$id ?>');
        var settings = {
          "url": "<?=base_url('welcome/ongoing_list') ?>",
          "method": "POST",
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType":"json",
          "data": form
        };
        $.ajax(settings).done(function (response) {
          console.log(response);
          $("#preloader").removeClass("show");
          $(".oncomming-list-laoder").hide();
          $('.oncomming-list-view-more').attr("disabled",false);
          if(response.status==200)
          {
            if(page==0)
                $('.'+api_data_div).html(response.data);
            else
                $("."+api_data_div+"").append(response.data);
            page++;
            $(click_btn).show();
          }
          else
          {
            $(click_btn).hide();
            if(page==0)
                $('.'+api_data_div).html(`<li style="color: white;text-align: center;background: darkred;width: 100%;">${err_image}</li>`);
            print_toast(response.message);
          }
        });
    }
    ongoing_list();
    $(document).on("click", ".oncomming-list-view-more",(function(e) {
        click_btn = $(this);
        ongoing_list();
    }));
</script>


<script>    
    var page = 0;
    var type = 0;
    var err_image = '<img src="<?=base_url() ?>assets/result1.jpg" class="img-fluid">';
    function result_list()
    {
        var api_data_div = 'result-list';
        var click_btn = '.result-list-view-more';
        $("#preloader").addClass("show");
        $(click_btn).attr("disabled",true);
        $(".sweet-loader").addClass("show");
        var form = new FormData();
        form.append("page", page);
        form.append("use_type", type);
        form.append("id", '<?=$id ?>');
        var settings = {
          "url": "<?=base_url('welcome/result_list') ?>",
          "method": "POST",
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType":"json",
          "data": form
        };
        $.ajax(settings).done(function (response) {
          console.log(response);
          $("#preloader").removeClass("show");
          $(".result-list-laoder").hide();
          $('.result-list-view-more').attr("disabled",false);
          if(response.status==200)
          {
            if(page==0)
                $('.'+api_data_div).html(response.data);
            else
                $("."+api_data_div+"").append(response.data);
            page++;
            $(click_btn).show();
          }
          else
          {
            $(click_btn).hide();
            if(page==0)
                $('.'+api_data_div).html(`<li style="color: white;text-align: center;background: darkred;width: 100%;">${err_image}</li>`);
            print_toast(response.message);
          }
        });
    }
    result_list();
    $(document).on("click", ".result-list-view-more",(function(e) {
        click_btn = $(this);
        result_list();
    }));

    $(document).on("click", ".open-detail-modal",(function(e) {
        var target = $(this).data('target');
        var get_id = $(this).data('get_id');
        var get_data_body = $("#modalcbody"+get_id).html();
        $("#modalcbodyprint").html(get_data_body);
        // modalcbody2684
        $(target).modal("show");
        console.log(get_data_body);
    }));
</script>
















</body>
</html>