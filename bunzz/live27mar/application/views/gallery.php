<?php include 'header.php'; ?>


<div class=" for-desk overflow-hidden  pt-5 mt-4">
  <div class="">
    <div class="row align-items-center">

      <div class="col-md-12 col-lg-12 p-0 m-0">

        <div class="carousel__slide__inner">
          <img class=" img-fluid w-100"
            src="<?=base_url() ?>img/slide-4.jpg"
            alt="Image">

        </div>

      </div>
    </div>
  </div>
</div>






<div class="featurs bg-color pt-5 bg-light">
  <div class="container process_bg_img">

    <h4 class=" fs-1 fw-bold text-center">Our Video</h4>
    <div class="row">
      <section class=" pt-5" style="width:100%;">
        <div class="container">

          <div class="row">
            <div class="col-sm-12">
              <div id="customers-teams" class="owl-carousel">

                <?php
                $this->db->order_by('id desc');
                $video = $this->crud->selectDataByMultipleWhere('videos',array('status'=>1,'type'=>1));
                foreach($video as $data)
                  { ?>
                <div class="item w-100 mb-3" data-aos="fade-up" data-aos-delay="100">
                  <div class="shadow-effect w-100">
                    <video width="100%" class=" rounded" src="<?=base_url() ?>media/uploads/videos/<?=$data->image ?>" loop muted controls></video>
                  </div>

                </div>
                <?php } ?>


              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </div>
</div>


<section class=" bg-img py-5 ">
    
    <div class="overlay-2"></div>
  <div class="container swiper ">

    <h4 class=" fs-1 fw-bold text-center pb-2">Corporate Videos</h4>

    <div class="row d-flex">
      <div class="col-lg-12">
        <div class="slider-wrapper-2">
          <div class="card-list swiper-wrapper">

            <?php
            $this->db->order_by('id desc');
            $youtube = $this->crud->selectDataByMultipleWhere('youtube',array('status'=>1,));
            foreach($youtube as $data)
              { ?>
            <div class="card-item custom-wrap  swiper-slide">
              <?=$data->content ?>
              <div class="btn-parent p-5">
                <h4 class="pb-2 text-dark"><?=$data->name ?></h4>

              </div>
            </div>


          <?php } ?>


          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-slide-button swiper-button-prev"></div>
          <div class="swiper-slide-button swiper-button-next"></div>
        </div>
      </div>

    </div>

  </div>
</section>


<section class="reels-section">

  <div class="container py-5">
    <h2 class="text-center pb-3">Influencers Reels</h2>
    <div class="row">
      <div class="col-sm-12">
        <div id="customers-video" class="owl-carousel">

          <?php
                $this->db->order_by('id desc');
                $video = $this->crud->selectDataByMultipleWhere('videos',array('status'=>1,'type'=>2));
                foreach($video as $data)
                  { ?>
          <div class="item w-100 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="shadow-effect w-100">
              <video width="80%" class=" profile-video rounded" src="<?=base_url() ?>media/uploads/videos/<?=$data->image ?>" loop muted controls></video>
            </div>

          </div>
          <!--END OF team 1 -->


        <?php } ?>



        </div>
      </div>
    </div>
  </div>

</section>


<?php include 'footer.php'; ?>