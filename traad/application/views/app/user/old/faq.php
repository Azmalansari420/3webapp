<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title text-white">FAQ'S</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>

<style>
  .accordion-body.p-0>p {
    color: white !important;
}
</style>


  <!-- accordion section start -->
  <section class="section-lg-t-space section-lg-b-space">
    <div class="custom-container">

      <?php
      $faw = $this->db->get_where('faqs',array('status'=>1))->result_object();
      foreach($faw as $key => $data)
        { ?>
      <div class="accordion theme-accordion nft-accordion" id="accordion">
        <div class="accordion-item">
          <div class="accordion-header" id="headingone">
            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$key ?>"><?=$data->question ?>
            </div>
          </div>
        </div>

        <div id="collapseOne<?=$key ?>" class="accordion-collapse collapse <?php if($key==0) echo "show"; ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <p class="text-content"><?=$data->answere ?></p>
          </div>
        </div>
      </div>
    <?php } ?>

 
     



    </div>
  </section>
  <!-- accordion section start -->

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->


 
  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 