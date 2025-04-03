<?php 
$about =  $this->db->get_where('content',array('id'=>2))->result_object();
include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

<style>

</style>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title text-white">Privacy Policy</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>

<style>
  section.section-lg-t-space.text-content {
    color: white !important;
}
</style>
  
  <!-- header end -->

  <!-- Terms and Condition start -->
  <div class="custom-container">
    <div class="main-wrap terms-condition section-lg-b-space">
      <!-- Introduction Section start -->
      <section class="section-lg-t-space text-content">
        <?=$about[0]->content ?>
      </section>
      
    </div>
  </div>
  <!-- Terms and Condition end -->

   <section class="panel-space"></section>

<!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 