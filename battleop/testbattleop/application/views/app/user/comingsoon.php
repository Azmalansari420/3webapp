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
        padding: 15px 20px 15px;
    }
    .single-page-area {
        padding-top: 60px;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" ><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Coming Soon  </h3>
            <a class="ms-auto" href="#"></a>
        </div>
        <div class="container mt-5">
            <div class="modal-card-wrap text-center">
                <div class="icon">
                    <i class="ri-check-line"></i>
                </div>
                <h3 class="title"> Coming Soon!</h3>
                <!-- <p>We Will be Back </p> -->
                <!-- <a class="btn btn-base w-100" href="main-home.html">Back To Home</a>                -->
            </div>
        </div>
        <?php include('include/menubar.php'); ?>     
    </div>  

    <!-- Modal -->
    <div class="modal fade filter-modal-popup" id="card-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="title"> Success!</h3>
                        <p>Your Payment method has been successfully added</p>
                        <a class="btn btn-base w-100" href="main-home.html">Back To Home</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>

    <?php include('include/allscript.php'); ?>
</body>
</html>