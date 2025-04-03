<?php
$cartcount = count_cart();
// print_r($cartcount);
// die;
$sitesetting = $this->crud->fetchdatabyid('1','site_setting'); 
$this->load->view('app/include/header'); 
?>

<style>
    .header .is-fixed {
      background: #4441ae;
      padding: 12px 0;
    }

    .tf-topbar .icon-notification1 {
      color: #ffffff;
      font-size: 28px;
    }

    .tf-topbar .icon-more1 {
      color: #ffffff;
      font-size: 28px;
    }

    .tf-topbar .icon-search {
      color: #ffffff;
      font-size: 28px;
    }

    .icon-more {
      color: #ffffff;
      font-size: 28px;
    }

    .nav-tabs .nav-item .nav-link.active {
      color: #533dea;
      font-weight: 600;
      font-size: 16px;
    }

    .nav-tabs .nav-item .nav-link {
      font-weight: 600;
      color: black;
      font-size: 15px;
    }

    li.bottom-icons>a {
      font-weight: 600;
      color: black;
      font-size: 13px;
    }

    li.bottom-icons>a>i {
      font-weight: 600;
      font-size: 20px;
      color: black;
    }

    .bottom-box {
      display: flex;
    }

    .box-3 {
      width: 100%;
      border: 1px solid;
      text-align: center;
      font-weight: 700;
      font-size: 15px;
      padding: 10px 5px;
    }

    .green {
      color: green !important;
    }

    .red {
      color: red !important;
    }

    .tf-btn-2 {
      width: 100%;
      font-weight: 600;
      font-size: 16px;
      line-height: 24px;
      text-transform: capitalize;
      display: flex;
      gap: 8px;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
    }
.food-box .img-box img{
    border-radius: 0 !important;
  
  width: 100%;
  height: 128px !important;
  object-fit: cover !important;
}
    a.tf-btn-2.accent {
      background: #533dea;
      padding: 10px 6px;
      color: white;
    }

    a.tf-btn-2.secondary {
      background: #1e1e1e;
      padding: 10px 6px;
      color: white;
    }

    .icon-bar-tax {
      color: black;
      font-size: 21px;
      font-weight: 600;
      margin-right: 5px;
    }

    .botom-menu-text {
      color: black !important;
      font-size: 14px !important;
      font-weight: 600 !important;
    }
    .mrp-price{
      color: black;
     
      margin-top: 5px;
    }
.app-content {

  margin: 60px 0 0 0 !important;
}

    .app-header {
      background: #5f94bf;
      padding: 10px 0px 10px;
      margin: 0;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center center;
      position: fixed;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  top: 0;
  right: 0;
  width: 100%;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      z-index: 9;
  }
  .app-header .tf-topbar .icon-market {
    color: #ffffff;
    font-size: 28px;
  }
  .icon-market {
      color: #1e1e1e;
      position: relative;
  }
  .icon-market span {
      font-family: "Plus Jakarta Sans", sans-serif;
      position: absolute;
      font-size: 10px;
      line-height: 9px;
      color: #ffffff;
      width: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 14px;
      background: #ea3434;
      border-radius: 50%;
      right: -1px;
      top: 1px;
  }
   .food-box h4 a {
       font-size: 12px !important;
  font-weight: 500 !important;
   }
  .food-box .content {
  box-shadow: unset !important;
  padding: 8px;
  text-align: center;
}
.food-box {
 box-shadow: 0 0px 8px -1px #0000003b !important;
  border: 2px solid #80808030 !important;
  border-radius: 6px !important;
  overflow: hidden !important;
}






.box-content .box-nav li{
  box-shadow: 0 0px 8px -1px #00000017;
 
  border-radius: 6px;
  padding: 1px 10px;
  margin: 8px 0;
}

.banner-tes img {
 
  object-fit: unset !important;
}


.mrp-price {
  
  font-size: 12px !important;
 
}

  .products_grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr); /* 2 columns */
      grid-template-rows: repeat(4, auto);  /* 4 rows */
      gap: 20px; /* Space between items */
    }
</style>
  <!-- /preload -->
  <div class="app-header">
    <div class="tf-container">
      <div class="tf-topbar d-flex justify-content-between align-items-center">
        <a class="user-info d-flex justify-content-between align-items-center" href="profile.php">
          <img src="<?=base_url() ?>media/uploads/distributor/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'">

          <div class="content">
            <h4 class="white_color"><?=$full_detail->name ?></h4>
            <p class="white_color fw_4">₹ <?=number_format($full_detail->wallet,2) ?></p>
          </div>
        </a>
        <div class="d-flex align-items-center gap-4">
          <a href="javascript:void(0);" id="btn-popup-left">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path d="M7.25687 5.89462C8.06884 5.35208 9.02346 5.0625 10 5.0625C11.3095 5.0625 12.5654 5.5827 13.4913 6.50866C14.4173 7.43462 14.9375 8.6905 14.9375 10C14.9375 10.9765 14.6479 11.9312 14.1054 12.7431C13.5628 13.5551 12.7917 14.188 11.8895 14.5617C10.9873 14.9354 9.99452 15.0331 9.03674 14.8426C8.07896 14.6521 7.19918 14.1819 6.50866 13.4913C5.81814 12.8008 5.34789 11.921 5.15737 10.9633C4.96686 10.0055 5.06464 9.01271 5.43835 8.1105C5.81205 7.20829 6.44491 6.43716 7.25687 5.89462ZM8.29857 12.5464C8.80219 12.8829 9.3943 13.0625 10 13.0625C10.8122 13.0625 11.5912 12.7398 12.1655 12.1655C12.7398 11.5912 13.0625 10.8122 13.0625 10C13.0625 9.3943 12.8829 8.80219 12.5464 8.29857C12.2099 7.79494 11.7316 7.40241 11.172 7.17062C10.6124 6.93883 9.99661 6.87818 9.40254 6.99635C8.80847 7.11451 8.26279 7.40619 7.83449 7.83449C7.40619 8.26279 7.11451 8.80847 6.99635 9.40254C6.87818 9.99661 6.93883 10.6124 7.17062 11.172C7.40241 11.7316 7.79494 12.2099 8.29857 12.5464ZM24.7431 14.1054C23.9312 14.6479 22.9765 14.9375 22 14.9375C20.6905 14.9375 19.4346 14.4173 18.5087 13.4913C17.5827 12.5654 17.0625 11.3095 17.0625 10C17.0625 9.02346 17.3521 8.06884 17.8946 7.25687C18.4372 6.44491 19.2083 5.81205 20.1105 5.43835C21.0127 5.06464 22.0055 4.96686 22.9633 5.15737C23.921 5.34789 24.8008 5.81814 25.4913 6.50866C26.1819 7.19918 26.6521 8.07896 26.8426 9.03674C27.0331 9.99452 26.9354 10.9873 26.5617 11.8895C26.1879 12.7917 25.5551 13.5628 24.7431 14.1054ZM23.7014 7.45363C23.1978 7.11712 22.6057 6.9375 22 6.9375C21.1878 6.9375 20.4088 7.26016 19.8345 7.83449C19.2602 8.40882 18.9375 9.18778 18.9375 10C18.9375 10.6057 19.1171 11.1978 19.4536 11.7014C19.7901 12.2051 20.2684 12.5976 20.828 12.8294C21.3876 13.0612 22.0034 13.1218 22.5975 13.0037C23.1915 12.8855 23.7372 12.5938 24.1655 12.1655C24.5938 11.7372 24.8855 11.1915 25.0037 10.5975C25.1218 10.0034 25.0612 9.38763 24.8294 8.82803C24.5976 8.26844 24.2051 7.79014 23.7014 7.45363ZM7.25687 17.8946C8.06884 17.3521 9.02346 17.0625 10 17.0625C11.3095 17.0625 12.5654 17.5827 13.4913 18.5087C14.4173 19.4346 14.9375 20.6905 14.9375 22C14.9375 22.9765 14.6479 23.9312 14.1054 24.7431C13.5628 25.5551 12.7917 26.1879 11.8895 26.5617C10.9873 26.9354 9.99452 27.0331 9.03674 26.8426C8.07896 26.6521 7.19918 26.1819 6.50866 25.4913C5.81814 24.8008 5.34789 23.921 5.15737 22.9633C4.96686 22.0055 5.06464 21.0127 5.43835 20.1105C5.81205 19.2083 6.44491 18.4372 7.25687 17.8946ZM8.29857 24.5464C8.80219 24.8829 9.3943 25.0625 10 25.0625C10.8122 25.0625 11.5912 24.7398 12.1655 24.1655C12.7398 23.5912 13.0625 22.8122 13.0625 22C13.0625 21.3943 12.8829 20.8022 12.5464 20.2986C12.2099 19.7949 11.7316 19.4024 11.172 19.1706C10.6124 18.9388 9.99661 18.8782 9.40254 18.9963C8.80847 19.1145 8.26279 19.4062 7.83449 19.8345C7.40619 20.2628 7.11451 20.8085 6.99635 21.4025C6.87818 21.9966 6.93883 22.6124 7.17062 23.172C7.40241 23.7316 7.79494 24.2099 8.29857 24.5464ZM19.2569 17.8946C20.0688 17.3521 21.0235 17.0625 22 17.0625C23.3095 17.0625 24.5654 17.5827 25.4913 18.5087C26.4173 19.4346 26.9375 20.6905 26.9375 22C26.9375 22.9765 26.6479 23.9312 26.1054 24.7431C25.5628 25.5551 24.7917 26.1879 23.8895 26.5617C22.9873 26.9354 21.9945 27.0331 21.0367 26.8426C20.079 26.6521 19.1992 26.1819 18.5087 25.4913C17.8181 24.8008 17.3479 23.921 17.1574 22.9633C16.9669 22.0055 17.0646 21.0127 17.4383 20.1105C17.8121 19.2083 18.4449 18.4372 19.2569 17.8946ZM20.2986 24.5464C20.8022 24.8829 21.3943 25.0625 22 25.0625C22.8122 25.0625 23.5912 24.7398 24.1655 24.1655C24.7398 23.5912 25.0625 22.8122 25.0625 22C25.0625 21.3943 24.8829 20.8022 24.5464 20.2986C24.2099 19.7949 23.7316 19.4024 23.172 19.1706C22.6124 18.9388 21.9966 18.8782 21.4025 18.9963C20.8085 19.1145 20.2628 19.4062 19.8345 19.8345C19.4062 20.2628 19.1145 20.8085 18.9963 21.4025C18.8782 21.9966 18.9388 22.6124 19.1706 23.172C19.4024 23.7316 19.7949 24.2099 20.2986 24.5464Z" fill="white" stroke="white" stroke-width="0.125" />
            </svg>
          </a>
          <?php
            if($full_detail->role==5)
                { ?>  
            <a href="cart.php" class="icon-market"><span class="cart-count"><?=$cartcount ?></span></a>
        <?php } ?>
          <a href="#!" id="btn-popup-up" class="icon-notification1"><span>2</span></a>
        </div>
      </div>
    </div>
  </div>

  


   <div class="app-content">
        <div class="tf-container">
          <!-- banners -->
          <div class="mt-0">
              <div class="swiper-container banner-tes">
                  <div class="swiper-wrapper">
                    <?php
                    $this->db->order_by('id desc');
                    $slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,));
                    foreach($slider as $data)
                      { ?>
                      <div class="swiper-slide">
                          <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" alt="images">
                      </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
          <!-- our category -->
          <div class="mt-5">
                <h4>All Categories</h4>
                <div class="mt-3">
                    <div class="swiper-container recipient-tes">
                        <div class="swiper-wrapper">
                          <?php
                          $category = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                          foreach($category as $data)
                            { ?>
                            <div class="swiper-slide">
                                <a class="recipient-box btn-repicient" href="<?=('distributor/category-product.php?id='.$data->id) ?>">
                                    <img src="<?=base_url() ?>media/uploads/categories/<?=$data->image ?>" alt="images">
                                    <?=$data->name ?>
                                </a>
                            </div>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
          <!-- our product -->
          <div class="mt-5" style="padding-bottom: 0px;">
              <h4>All Products</h4>
              <div class="swiper-container tes-food mt-3">
                  <div class="products_grid">
                    <?php
                    $this->db->order_by('id desc');
                    $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,));
                    foreach($product as $data)
                      { ?>
                      <div class="swiper-slide">
                          <div class="food-box">
                              <a href="<?=('distributor/product-details.php?id='.$data->id) ?>" class="img-box">
                                  <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="images">
                                  <span><?=discount($data->mrp_price,$data->sale_price) ?>%</span>
                              </a>
                              <div class="content">
                                  <h4>
                                    <a href="<?=('distributor/product-details.php?id='.$data->id) ?>"><?=$data->name ?></a>
                                  </h4>
                                  <p class="mrp-price"><strong> ₹ <?=number_format($data->sale_price,2) ?></strong> &nbsp;&nbsp; <del style="color:red;">₹ <?=number_format($data->mrp_price,2) ?></del></p>
                              </div>
                          </div>
                      </div>
                      <?php } ?>
                  </div>
                     
              </div>
          </div>
        </div>
      </div>




  




<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>