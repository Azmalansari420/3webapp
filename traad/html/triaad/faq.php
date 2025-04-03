<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="head-content">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <img class="img-fluid logo" src="assets/logo1.png" alt="nfty-logo" />
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>



  <!-- accordion section start -->
  <section class="section-lg-t-space section-lg-b-space">
    <div class="custom-container">
      <div class="accordion theme-accordion nft-accordion" id="accordion">
        <div class="accordion-item">
          <div class="accordion-header" id="headingone">
            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne">How do you buy an NFT?
            </div>
          </div>
        </div>

        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <p class="text-content">You join up to be added to a whitelist that may include a large number of NBA fans.
              You are chosen at random to buy a digital asset when it goes on sale. While OpenSea only accepts
              cryptocurrencies, Top Shot accepts both fiat currency and cryptocurrencies.</p>
          </div>
        </div>
      </div>

      <div class="accordion theme-accordion" id="accordionExample1">
        <div class="accordion-item">
          <div class="accordion-header" id="headingone1">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">How can you
              tell if your NFT is real?</div>
          </div>
        </div>

        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <p class="text-content">NFT ownership is recorded on the blockchain, and that entry acts as a digital pink
              slip. Defining the blockchain is a whole ‘nether can of worms that you can read about here.</p>
          </div>
        </div>
      </div>

      <div class="accordion theme-accordion" id="accordionExample2">
        <div class="accordion-item">
          <div class="accordion-header" id="headingone2">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">Why would
              I want an NFT, you ask? Can I profit from it?</div>
          </div>
        </div>

        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <p class="text-content">If you're not a complete utilitarian, one motivation to purchase an NFT is for its
              emotional value, which is similar to that of tangible goods. Nobody purchases lip gloss because they are
              in need of it. They buy it for the way it makes them feel. The same can be true for a GIF, image, video,
              or other digital asset.</p>
          </div>
        </div>
      </div>

      <div class="accordion theme-accordion nft-accordion" id="accordion">
        <div class="accordion-item">
          <div class="accordion-header" id="headingone">
            <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">How do you
              buy an NFT?</div>
          </div>
        </div>

        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body p-0">
            <p class="text-content">You join up to be added to a whitelist that may include a large number of NBA fans.
              You are chosen at random to buy a digital asset when it goes on sale. While OpenSea only accepts
              cryptocurrencies, Top Shot accepts both fiat currency and cryptocurrencies.</p>
          </div>
        </div>
      </div>
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
 