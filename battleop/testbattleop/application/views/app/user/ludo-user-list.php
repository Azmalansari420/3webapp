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
            <a class="btn back-page-btn" href="ludo.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ms-5 ps-5">My Challenge</h3>
            <div class="balance"><?=price_formate($full_detail->wallet+$full_detail->winning_amt) ?> </div> 
        </div>
        <div class="mybet-page-wrap">            
            <div class="container">
                

                
                <div class="slider-content">
                    
                    <div class="single-product-wrap">
                        <h6 class="title">Ludo #2022 <button class="btn-sm btn-c btn-danger">Classic</button></h6>
                        <div class="details">
                            <div class="thumb"><img src="<?=base_url() ?>assets/img/comment/my-profile.png" alt="img"><h6 class="team-name">Amit</h6></div>
                            <div class="betting-wrap">
                                <h2>Has Challenged For</h2>
                                <div class="time">300.00 Coins</div>
                            </div>
                            <div class="thumb"><img src="<?=base_url() ?>assets/logo.png" alt="img"><h6 class="team-name">Aakash</h6></div>
                        </div>
                        <div class="betting-meta">
                            <ul>
                                <li style="background: #110e33;">Winning 539.00 Coins</li>
                                <li style="background: #110e33;"><a  href="ludo-match-join-wallet.php">Accepted</a></li>
                            </ul>
                        </div>
                        <div class="betting-meta">
                            <ul>
                                <li style="background: green;"><a data-bs-toggle="modal" data-bs-target="#win-model">WIN</a></li>
                                <li style="background: cyan;"><a data-bs-toggle="modal" data-bs-target="#win-model" style="color: black;font-weight: 600;">ERROR</a></li>
                                <li style="background: red;"><a data-bs-toggle="modal" data-bs-target="#win-model">LOSE</a></li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <?php include('include/menubar-ludo.php'); ?>
    </div>  

   

    <div class="modal fade filter-modal-popup" id="win-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <h3 class="title">Upload Screeshot</h3>
                        <label class="edit-profile">
                            Click To Upload Screeshot
                            <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
                        </label>               
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
                        <a class="btn btn-base w-100" href="bet.html">Try Again</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>
    

      <?php include('include/allscript.php'); ?>


<script>
     $(".upload_image").on('change', function(){
         var files = [];
         var j=1;      
         for (var i = 0; i < this.files.length; i++)
         {
               if (this.files && this.files[i]) 
               {
                   var reader = new FileReader();
                   reader.onload = function (e) {                
                   update_profile_image(e.target.result);
                       j++;
                   // console.log(e.target.result);
                   }
                   reader.readAsDataURL(this.files[i]);
               }
         }
      });
</script>











</body>
</html>