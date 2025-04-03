<?php include 'header.php';
$about = $this->crud->fetchdatabyid('1','about_us');

?>


<div class=" for-desk overflow-hidden pt-5 mt-4">
  <div class="">
    <div class="row align-items-center">

      <div class="col-md-12 col-lg-12 p-0 m-0">

        <div class="carousel__slide__inner">
          <img class=" img-fluid w-100"
            src="<?=base_url() ?>img/slide-3.jpg"
            alt="Image">

        </div>

      </div>
    </div>
  </div>
</div>



<div class="featurs py-5 mt-5">
  <div class="container">
    <h2 class="text-center fs-1 pb-3 product-title">About Us</h2>
    <div class="row bg-white">

      <div class="col-md-12">
        <div class="about-content pt-3 pt-lg-0 ps-2">

          <?=$about[0]->content ?>

        </div>
      </div>


    </div>

  </div>
</div>
<!-- Featurs Section End -->



<section class=" our-mission py-5">

  <div class="container">
    <div class="row">

      <div class="col-md-6  d-flex justify-content-end">

        <div class="vision text-center">
          <img src="<?=base_url() ?>img/mission_1628441.png" width="75px" alt="">
          <h2>Our Mission</h2>
          <p class="text-center pe-4"><?=$about[0]->mission ?></p>

        </div>


      </div>
      <div class="col-md-6 mt-3 mt-lg-0">
        <div class="vision text-center ">
          <img src="<?=base_url() ?>img/high-visibility_2819998.png" width="75px" alt="">
          <h2>Our Vision</h2>
          <p class="text-center"><?=$about[0]->vision ?></p>
        </div>
      </div>

    </div>



  </div>

</section>



<!-- <section class="mt-5">
  <div class="container swiper social-bg-img">
    <h2 class="text-start text-ctm text-white  text-uppercase product-title pb-3 ">Get Social</h2>

    <div class="">
      <div class="row social-media-embed">

        <iframe src="//instagram.com/p/CMP0s_lAmed/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
        <iframe src="//instagram.com/p/aWUm2GFPmC/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
        <iframe src="//instagram.com/p/CMP0s_lAmed/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
        <iframe src="//instagram.com/p/CMP0s_lAmed/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
        <iframe src="//instagram.com/p/CMP0s_lAmed/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
        <iframe src="//instagram.com/p/CMP0s_lAmed/embed/" width="300" height="400" frameborder="0" scrolling="no"
          allowtransparency="true"></iframe>
      </div>

    </div>

  </div>
</section> -->

<?php include 'footer.php'; ?>