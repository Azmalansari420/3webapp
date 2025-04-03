<?php include 'header.php'; ?>

<!-- Hero Start -->


<style>
    .teams .shadow-effect{
        width:350px !important;
    }
    .owl-stage{
    display: flex;
    justify-content: center;
    /*transform: translate3d(200px, 0px, 0px) !important;*/
}

.bg-pakistani-gree{
    background: unset !important;
}


.video-bg-check{
    background: url(./img/bg-vide.avif) !important;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    background-size: cover;
    width: 100%;
    height: 300px;
}

.text-ctm {
    font-size: 45px !important;
    font-weight: 700;
}
@media only screen and (max-width:992px){
    #customers-teams .item{
      opacity: 1 !important;
    }
    .description {
  font-size: 14px !important;
}
.video-bg-check{
    height: 200px;
}
.feature-item{
    padding: 14px 0;
}
.feature-item h3,.feature-item i{
   font-size: 20px;
}
.side-img {
 
  height: 276px;
  
}
  .text-ctm {
    font-size: 30px !important;
  
}
  
  
       .video-bg {
        height: 337px !important;
    }
    .count span{
            font-size: 30px;
    }
    .count{
         font-size: 30px;
         padding: 0 !important;
    }
    
    .banner-slider{
            margin: 63px 0 0 0 !important;
    }
}
    
</style>

<div class="banner-slider" style="margin: 84px 0 0 0;">
    <?php
    $this->db->order_by('id desc');
    $slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,'website'=>1));
    foreach($slider as $data)
    {
        ?>
    <div>
        <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" class=" w-100 img-fluid" alt="Banner">
    </div>
    <?php } ?>
    
</div>


<section class="bg-white">
    <div class="container pt-lg-5 py-0">
        <div class="row pt-5">
            <div class="col-md-7">
                <h1 class=" fw-light text-uppercase">We Are <span class=" fw-bold">BUNZZ</span></h1>
                <p class="subtitle fs-4">Your Friendly Neighbourhood Snacks</p>
                <p class="description">
                    Welcome to Namkeen Chips by BUNZZ, where tradition meets flavor! <br>
                    Our passion for authentic Indian snacks drives us to craft high-quality treats that unite people. Using only the finest ingredients, we ensure a perfect crunch and memorable taste in every bite. From classic to innovative flavors, our snacks are ideal for any occasion. Committed to quality and sustainability, we source responsibly and support local communities.<br>
                    BUNZZ aims to bridge urban and tier 2/3 markets, offering healthier snacks and fair trade opportunities.<br>
                    Join us in celebrating flavor and community with every delicious bite!
                </p>

                <div class="row py-3">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="icon-div d-flex align-items-center">
                                <i class="fa fa-ban fs-4 text-danger pe-3" aria-hidden="true"></i>
                                <h3 class="p-0 m-0 fw-light"><span class="text-dark fw-bold">No</span> Preservatives</h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="icon-div d-flex align-items-center">
                                <i class="fa fa-heartbeat text-success fs-4 pe-3" aria-hidden="true"></i>
                                <h3 class="p-0 m-0 fw-light"> <span class="text-dark fw-bold">Health</span> Friendly</h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 pt-0 pt-lg-3">
                        <div class="feature-item">
                            <div class="icon-div d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="" class="bi bi-currency-rupee pe-3" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" style="fill: #0d6efd;" />
                                </svg>

                                <h3 class="p-0 m-0 fw-light"><span class="text-dark fw-bold">Low</span> Cost</h3>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 pt-0 pt-lg-3">
                        <div class="feature-item">
                            <div class="icon-div d-flex align-items-center">
                                <i class="fa fa-commenting fs-4 pe-3" aria-hidden="true" style=" color:#fd7e14;"></i>
                                <h3 class="p-0 m-0 fw-light"><span class="text-dark fw-bold">24/7</span> Support</h3>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-5 d-flex justify-content-lg-end justify-content-center" data-aos="fade-up">
                <img src="<?=base_url() ?>img/malai.png" class="side-img img-fluid" alt="">
            </div>
        </div>

    </div>
</section>











<!-- Hero End -->


<!-- Featurs Section Start -->
<div class="featurs bg-img2 py-0 py-lg-5">
    <div class=" container py-5">
        <h2 class="text-center fs-1 mb-2 product-title">Hot Selling List</h2>
        <p class="text-center pb-3">Choose any of our range of snacks that better suits your needs</p>



        <div class="row pro-slider">
            <div class="swiper-wrapper">

                <?php
          $this->db->order_by('id desc');
          $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,));
          foreach($product as $data)
            {

              

             ?>

                <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="1">
                    <a href="<?=base_url() ?>product-detaile?id=<?=$data->id ?>">
                        <div class="image-container">
                            <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="Bunzz Sev Mamra" class="main-image">
                            <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="Alternate Bunzz Sev Mamra" class="hover-image">

                        </div>
                        <div class="bottom text-center">
                            <h5><?=$data->name ?></h5>
                            <p class="mb-2"><strong> Price </strong>₹ <?=number_format($data->sale_price,2) ?></p>

                        </div>
                    </a>
                </div>

            <?php } ?>

            </div>
            <div class="btn-slide">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


        </div>



    </div>
</div>




<section class="py-5 video-bg-check position-relative">
    <div class="overlay"></div>
    <div class="container">
        
        <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="video-box text-center">
                <i class="bi bi-play-circle-fill"></i>
                <h5 class="text-center text-ctm mb-2 text-uppercase text-white">check our Process</h5>
            </div>

        </div>
        </div>
    </div>
</section>


<section class="pt-5 mt-4">
    <h2 class="text-center text-uppercase fs-1 mb-2 product-title">Picture Gallery</h2>
    <p class="text-center pb-3">Choose any of our range of snacks that better suits your needs</p>
    <div class="pro-gallery">
        <div class="swiper-wrapper">
            <?php
            $this->db->order_by('id desc');
            $gallery = $this->crud->selectDataByMultipleWhere('gallery',array('status'=>1,));
            foreach($gallery as $key => $data)
                { ?>
            <div class=" swiper-slide bg-pakistani-gree" data-aos="fade-up" data-aos-delay="1" style="margin-right: 5px!important;border-radius: 10px;">
                <img src="<?=base_url() ?>media/uploads/gallery/<?=$data->image ?>" class=" img-fluid shake-animation" alt="">
            </div>
        <?php } ?>

            
        </div>
    </div>


</section>




<section class="py-5 video-bg position-relative">
    <div class="overlay-2"></div>
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="video-box text-center">
                <!-- <i class="bi bi-play-circle-fill"></i> -->
                <h6 class="text-center mb-2 fs-1 text-uppercase text-dark"> our Progress</h6>
                <p class=" text-black-50 fs-5">Check our progress over the years </p>

                <div class="counter-inner">
                    <div class="container">
                        <div class="row g-0">
                            <div class="col-6 col-lg-3">
                                <div class="text-center ">
                                    <div>

                                    </div>
                                    <div class="py-2 count">
                                        <span id="count1">107</span>
                                    </div>
                                    <div>
                                        <p class=" text-uppercase fw-bolder">Chennel Partners</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class=" text-center">
                                    <div>

                                    </div>
                                    <div class="py-2 count">
                                        <span id="count2">1000</span>
                                    </div>
                                    <div>
                                        <p class=" text-uppercase fw-bolder">Our Reach</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="text-center">
                                    <div>

                                    </div>
                                    <div class="py-2 count">
                                        <span id="count3">155</span>
                                    </div>
                                    <div>
                                        <p class=" text-uppercase fw-bolder">Our Family</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="text-center ">
                                    <div>

                                    </div>
                                    <div class="py-2 count">
                                        <span id="count4">899</span>
                                    </div>
                                    <div>
                                        <p class=" text-uppercase fw-bolder">Presence</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<section class="teams pt-5" style="width:100%;">
    <div class="container">
        <h4 class=" fs-1 fw-bold text-center">Meet the team</h4>
        <!-- <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, assumenda.</p> -->
        <div class="row">
            <div class="col-sm-12">
                <div id="customers-teams" class="owl-carousel">

                    <?php
                    $this->db->order_by('id desc');
                    $team = $this->crud->selectDataByMultipleWhere('team', array('status'=>1,));
                    foreach($team as $data)
                        { ?>
                    <div class="item p-2 p-lg-5" data-aos="fade-up" data-aos-delay="1">
                        <div class="shadow-effect">
                            <img class="img-circle" src="<?=base_url() ?>media/uploads/team/<?=$data->image ?>" alt="<?=$data->name ?>">
                            <h2><?=$data->name ?> </h2>
                            <p class="title"><?=$data->position ?></p>

                            <div class="social-icons" id="teamsocial">
                                <a target="_blank" href="<?=$data->linkdin ?>" class="social-icon social-icon--linkedin" id="socialicon">
                                    <img src="https://i.imgur.com/egfJ4V2.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>








<div class="featurs product_bg_img py-5 d-none">
    <div class="container swiper ">
        <h2 class="text-start text-ctm text-white pb-3 product-title">Our Process</h2>

        <div class="slider-wrapper-our-procese">
            <div class="card-list  swiper-wrapper">


                <a class="recipe-link swiper-slide" href="/recipes/lays-potato-chip-crusted-holiday-brownies-0">

                    <div class="recipe-wrapper">

                        <!-- RECIPE IMAGE -->
                        <div class="recipe-image">
                            <img src="https://www.lays.com/sites/lays.com/files/styles/recipe_thumbnail/public/LAY%E2%80%99S%20POTATO%20CHIP%20MAGIC%20BARS-023_1920x625.png?itok=bH9cUnSt"
                                alt="">
                        </div>

                        <div class="recipe-body">

                            <!-- RECIPE TITLE -->
                            <div class="recipe-title">
                                <h3>BUNZZ® Potato Chip Crusted Holiday Brownies</h3>
                                <span class="srt"> Rating: out of 5</span>
                            </div>

                            <div class="recipe-bottom">
                                <div class="recipe-button">
                                    <div class="btn btn-recipe"><span>View Recipe</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>


                <a class="recipe-link swiper-slide" href="/recipes/lays-potato-chip-crusted-holiday-brownies-0">

                    <div class="recipe-wrapper">

                        <!-- RECIPE IMAGE -->
                        <div class="recipe-image">
                            <img src="https://www.lays.com/sites/lays.com/files/styles/recipe_thumbnail/public/LAY_SpicyFriedChickySammy_TWITTER_0.jpg?itok=vjRZqVDg"
                                alt="">
                        </div>

                        <div class="recipe-body">

                            <!-- RECIPE TITLE -->
                            <div class="recipe-title">
                                <h3>BUNZZ® Potato Chip Crusted Holiday Brownies</h3>
                                <span class="srt"> Rating: out of 5</span>
                            </div>

                            <div class="recipe-bottom">
                                <div class="recipe-button">
                                    <div class="btn btn-recipe"><span>View Recipe</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <a class="recipe-link swiper-slide" href="/recipes/lays-potato-chip-crusted-holiday-brownies-0">

                    <div class="recipe-wrapper">

                        <!-- RECIPE IMAGE -->
                        <div class="recipe-image">
                            <img src="https://www.lays.com/sites/lays.com/files/styles/recipe_thumbnail/public/LAYS-TENDIES-big.jpg?itok=OfZJPn4e"
                                alt="">
                        </div>

                        <div class="recipe-body">

                            <!-- RECIPE TITLE -->
                            <div class="recipe-title">
                                <h3>BUNZZ® Potato Chip Crusted Holiday Brownies</h3>
                                <span class="srt"> Rating: out of 5</span>
                            </div>

                            <div class="recipe-bottom">
                                <div class="recipe-button">
                                    <div class="btn btn-recipe"><span>View Recipe</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <a class="recipe-link swiper-slide" href="/recipes/lays-potato-chip-crusted-holiday-brownies-0">

                    <div class="recipe-wrapper">

                        <!-- RECIPE IMAGE -->
                        <div class="recipe-image">
                            <img src="https://www.lays.com/sites/lays.com/files/styles/recipe_thumbnail/public/LAY%27S%20CRUSTED%20HOLIDAY%20BROWNIE-032_1920x625.png?itok=-UV2dx7y"
                                alt="">
                        </div>

                        <div class="recipe-body">

                            <!-- RECIPE TITLE -->
                            <div class="recipe-title">
                                <h3>BUNZZ® Potato Chip Crusted Holiday Brownies</h3>
                                <span class="srt"> Rating: out of 5</span>
                            </div>

                            <div class="recipe-bottom">
                                <div class="recipe-button">
                                    <div class="btn btn-recipe"><span>View Recipe</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <a class="recipe-link swiper-slide" href="/recipes/lays-potato-chip-crusted-holiday-brownies-0">

                    <div class="recipe-wrapper">

                        <!-- RECIPE IMAGE -->
                        <div class="recipe-image">
                            <img src="https://www.lays.com/sites/lays.com/files/styles/recipe_thumbnail/public/LAY%27S%20CRUSTED%20HOLIDAY%20BROWNIE-032_1920x625.png?itok=-UV2dx7y"
                                alt="">
                        </div>

                        <div class="recipe-body">

                            <!-- RECIPE TITLE -->
                            <div class="recipe-title">
                                <h3>BUNZZ® Potato Chip Crusted Holiday Brownies</h3>
                                <span class="srt"> Rating: out of 5</span>
                            </div>

                            <div class="recipe-bottom">
                                <div class="recipe-button">
                                    <div class="btn btn-recipe"><span>View Recipe</span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>









            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-slide-button swiper-button-prev"></div>
            <div class="swiper-slide-button swiper-button-next"></div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->




<section class="creative-testimonial--slider py-5">
    <div class="testimonial-inner" style="background-image: url(https://imgpanda.com/upload/ib/2Tgg58L106.png);">
        <div class="testimonial-row">
            <h2 class="testimonial-heading">Honest Reviews from Snack-Loving Influencers</h2>
            <div class="testimonial-wrap">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $this->db->order_by('id desc');
                        $testi = $this->crud->selectDataByMultipleWhere('testimonials',array('status'=>1,));
                        foreach($testi as $data)
                            { ?>
                        <div class="swiper-slide">
                            <div class="swiper-slide--inner">
                                <div class="slide-avatar">
                                    <img width="250px" src="<?=base_url() ?>media/uploads/testimonials/<?=$data->image ?>" alt="">
                                </div>
                                <div class="testimonial-detail">
                                    <!-- <img src="https://imgpanda.com/upload/ib/07fXcY3EIH.png" alt="Company Logo"> -->
                                    <p><?=$data->content ?></p>
                                    <span><?=$data->name ?>, <?=$data->position ?></span>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                    <div class="swiper-button-next slide-btns"></div>
                    <div class="swiper-button-prev slide-btns"></div>
                </div>
            </div>
            <!-- Company details -->

        </div>
    </div>
</section>







<?php include 'footer.php'; ?>