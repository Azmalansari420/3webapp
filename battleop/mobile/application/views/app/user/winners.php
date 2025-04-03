
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
        ul#myTab
        {
            display: flex;
            justify-content: center;
        }
        .green-text
        {
            color: green!important;
        }
        .amount-details>h6 {
            color: white !important;
        }
        .transaction-wrap .header-wrap {
            border-radius: 0;
            margin-top: 0;
        }
    </style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Winners</h3>
        </div>
        <div class="container1">
            <div class="mybet-page-wrap">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Ludo King </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">E-Sports</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">                    
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="transaction-wrap">
                        <div class="header-wrap">
                            <div class="container">
                                <div class="media">
                                    <h5>Winners</h5>
                                    <!-- <select class="single-select">
                                        <option>All</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly </option>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <ul class="transaction-list">
                            <!-- <li>
                                <button class="icon" data-bs-toggle="modal" data-bs-target="#deposit-modal">
                                    <img src="<?=base_url() ?>assets/img/comment/my-profile.png" alt="img" style="height:40px;">
                                </button>
                                <div class="details">
                                    <h6>Raj bala</h6>
                                    <span class="green-text">Win ₹ 7850.00</span>
                                </div>
                                <div class="amount-details">
                                    <h6>#1</h6>
                                </div>
                            </li> -->
                            <li class="text-center" style="justify-content: center;margin-top: 50px;">
                                <h2>Coming Soon</h2>
                            </li>
                        </ul>
                    </div> 
                </div>

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="transaction-wrap">
                        <div class="header-wrap">
                            <div class="container">
                                <div class="media">
                                    <h5>Winners</h5>
                                    <!-- <select class="single-select">
                                        <option>All</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly </option>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <ul class="transaction-list">
                            <?php
                            $this->db->limit(500);
                            $this->db->where(" winning_amt!='0' ");
                            $this->db->order_by('winning_amt desc');
                            $join_match_participates = $this->crud->get_data('join_match_participates');
                            foreach($join_match_participates as $data)
                                { ?>
                            <li>
                                <button class="icon" data-bs-toggle="modal" data-bs-target="#deposit-modal">
                                    <img src="<?=base_url() ?>media/uploads/user.png" alt="img" style="height:40px;border-radius: 50%;">
                                </button>
                                <div class="details">
                                    <h6><?=$data->username ?></h6>
                                    <!-- <span class="green-text">Win ₹ <?=number_format($data->winning_amt,2) ?></span> -->
                                </div>
                                <div class="amount-details">
                                    <h6>₹ <?=number_format($data->winning_amt,2) ?></h6>
                                </div>
                            </li>
                        <?php } ?>
                            
                           
                        </ul>
                    </div> 
                </div>

               
            </div>
        </div>

            
        
     
        <?php include('include/menubar.php'); ?>       
    </div>  
    
   

    <?php include('include/allscript.php'); ?>
</body>
</html>