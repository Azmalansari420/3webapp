<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
   
    .single-page-area {
	    padding-top: 50px;
	}
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
   
    .single-page-area .title-area h3 {
    font-size: 16px;
    font-weight: 500;
    margin: 0 auto;
}
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">RDL STAR</h3>
            <a class="icon-btn" href=""><i class="ri-share-line"></i></a>
        </div>

                
        <div class="container">
            <ul class="profile-list-inner">

                <?php
                $games = $this->crud->selectDataByMultipleWhere('game', array('status' => 1));

                foreach ($games as $data) { ?>
                <li>
                    <a class="single-profile-wrap" href="game-details.php?game_id=<?= $data->id ?>"><i class="fa fa-user"></i> <?=$data->name ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <?php } ?>

                

                <li>
                    <a class="single-profile-wrap" href="about.php"><i class="fas fa-atom"></i> About Us<i class="ri-arrow-right-s-line"></i></a>
                </li>
             
              
              
                <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-share"></i>Share App <i class="ri-arrow-right-s-line"></i></a>
                </li>
                             
            </ul>
        </div>

    </div>     

   <?php include('include/allscript.php'); ?>
</body>
</html>