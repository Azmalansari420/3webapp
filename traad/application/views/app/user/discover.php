<?php include('include/allcss.php'); ?>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">Discover</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Statistics starts -->
  <section class="section-lg-t-space section-b-space">
    <div class="custom-container">
      <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
                 

          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="accordion-one">
              <ul>
                <?php
                $instruments = $this->db->get_where('instruments',array('status'=>1))->result_object();
                foreach ($instruments as $key => $data) 
                  { ?>
                <div class="accordion-item">
                    <div class="accordion-header" id="heading1">
                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                            <div class="nft-horizontal-box d-block">
                                <a href="option-list.php?instrument_key=<?=$data->instrument_key ?>&expirey_key=<?=$data->expiry_date ?>" class="product-details d-block">
                                    <div class="product-content w-100">
                                        <div>
                                            <h4 style="color: white;"><?=$data->name ?></h4>
                                        </div>
                                        <div class="counter"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
                

                
                


          </ul>
          
            </div>
            
          </div>

         
        </div>
      </div>
    </div>
  </section>
  <!-- Statistics end -->

 

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 

 <script>
 </script>