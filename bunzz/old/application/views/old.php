<?php include 'header.php';
$id = $this->input->get('id');
$product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$id));
if(!empty($product))
{
  $product = $product[0];
}
?>
<div class=" for-desk overflow-hidden pt-5 mt-4">
  <div class="">
    <div class="row align-items-center">

      <div class="col-md-12 col-lg-12 p-0 m-0">

        <div class="carousel__slide__inner">
          <img class=" img-fluid w-100"
            src="<?=base_url() ?>img/Picture2.jpg"
            alt="Image">

        </div>

      </div>
    </div>
  </div>
</div>
<!-- Featurs Section Start -->
<div class="featurs">
  <div class="container  py-5">

    <div class="row">
      <div class="col-md-6 p-0">

        <div class="detail-img">
          <div class="gallery">
            <!-- Main Image -->
            <div class="main-image">
              <img src="<?=base_url() ?>img/bunzz-img/panjabi-tadka.jpg" alt="Image 1" class="active">
              <img src="<?=base_url() ?>img/bunzz-img/panjabi-tadka1.jpg" alt="Image 2">


              <!-- Arrows -->
              <button class="arrow left"><i class="bi bi-caret-left"></i></button>
              <button class="arrow right"><i class="bi bi-caret-right"></i></button>
            </div>

            <!-- Thumbnails -->
            <div class="thumbnails">
              <img src="<?=base_url() ?>img/bunzz-img/panjabi-tadka.jpg" alt="Thumbnail 1" class="active" data-index="0">
              <img src="<?=base_url() ?>img/bunzz-img/panjabi-tadka1.jpg" alt="Thumbnail 2" data-index="1">

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 p-0">
        <div class="detail-content w-100">
          <h1>Punjabi Tadka </h1>
          <h6>Rs 5/- Per Pkt</h6>
          <p class="p-0 m-0">1 CARTON = 240 Pkt
          </p>
          <p class="p-0 m-0 mb-2"> 1 Ladi = 12 Pkt</p>

          <div class="rating-star ">
            <div class="bv_stars_component_container d-flex "><svg xmlns="http://www.w3.org/2000/svg" width="20px"
                height="20px" viewBox="0 0 25 25" aria-hidden="true" focusable="false">
                <polygon style="fill: url(&quot;#bv_rating_summary_star_filled_1_0_99.99_673&quot;) !important;"
                  points="">
                </polygon>
                <path style="fill: url(&quot;#bv_rating_summary_star_filled_1_0_99.99_673&quot;) !important;"
                  d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z">
                </path>
                <defs>
                  <linearGradient id="bv_rating_summary_star_filled_1_0_99.99_673" x1="99.99%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color: rgb(238, 49, 36); stop-opacity: 1;"></stop>
                    <stop offset="1%" style="stop-color: rgb(254, 228, 17); stop-opacity: 1;"></stop>
                  </linearGradient>
                </defs>
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25"
                aria-hidden="true" focusable="false">
                <polygon style="fill: url(&quot;#bv_rating_summary_star_filled_1_1_99.99_673&quot;) !important;"
                  points="">
                </polygon>
                <path style="fill: url(&quot;#bv_rating_summary_star_filled_1_1_99.99_673&quot;) !important;"
                  d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z">
                </path>
                <defs>
                  <linearGradient id="bv_rating_summary_star_filled_1_1_99.99_673" x1="99.99%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color: rgb(238, 49, 36); stop-opacity: 1;"></stop>
                    <stop offset="1%" style="stop-color: rgb(254, 228, 17); stop-opacity: 1;"></stop>
                  </linearGradient>
                </defs>
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25"
                aria-hidden="true" focusable="false">
                <polygon style="fill: url(&quot;#bv_rating_summary_star_filled_1_2_99.99_673&quot;) !important;"
                  points="">
                </polygon>
                <path style="fill: url(&quot;#bv_rating_summary_star_filled_1_2_99.99_673&quot;) !important;"
                  d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z">
                </path>
                <defs>
                  <linearGradient id="bv_rating_summary_star_filled_1_2_99.99_673" x1="99.99%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color: rgb(238, 49, 36); stop-opacity: 1;"></stop>
                    <stop offset="1%" style="stop-color: rgb(254, 228, 17); stop-opacity: 1;"></stop>
                  </linearGradient>
                </defs>
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25"
                aria-hidden="true" focusable="false">
                <polygon style="fill: url(&quot;#bv_rating_summary_star_filled_1_3_99.99_673&quot;) !important;"
                  points="">
                </polygon>
                <path style="fill: url(&quot;#bv_rating_summary_star_filled_1_3_99.99_673&quot;) !important;"
                  d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z">
                </path>
                <defs>
                  <linearGradient id="bv_rating_summary_star_filled_1_3_99.99_673" x1="99.99%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color: rgb(238, 49, 36); stop-opacity: 1;"></stop>
                    <stop offset="1%" style="stop-color: rgb(254, 228, 17); stop-opacity: 1;"></stop>
                  </linearGradient>
                </defs>
              </svg><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 25 25"
                aria-hidden="true" focusable="false">
                <polygon style="fill: url(&quot;#bv_rating_summary_star_filled_1_4_84.21_673&quot;) !important;"
                  points="">
                </polygon>
                <path style="fill: url(&quot;#bv_rating_summary_star_filled_1_4_84.21_673&quot;) !important;"
                  d="M24.8676481,9.0008973 C24.7082329,8.54565507 24.2825324,8.23189792 23.7931772,8.20897226 L16.1009423,8.20897226 L13.658963,0.793674161 C13.4850788,0.296529881 12.9965414,-0.0267985214 12.4623931,0.00174912135 L12.4623931,0.00174912135 C11.9394964,-0.00194214302 11.4747239,0.328465149 11.3146628,0.81767189 L8.87268352,8.23296999 L1.20486846,8.23296999 C0.689809989,8.22949161 0.230279943,8.55030885 0.0640800798,9.0294023 C-0.102119784,9.50849575 0.0623083246,10.0383495 0.472274662,10.3447701 L6.69932193,14.9763317 L4.25734261,22.4396253 C4.08483744,22.9295881 4.25922828,23.4727606 4.68662933,23.7767181 C5.11403038,24.0806756 5.69357086,24.0736812 6.11324689,23.7595003 L12.6333317,18.9599546 L19.1778362,23.7595003 C19.381674,23.9119158 19.6299003,23.9960316 19.8860103,23.9994776 C20.2758842,24.0048539 20.6439728,23.8232161 20.8724402,23.5127115 C21.1009077,23.202207 21.1610972,22.8017824 21.0337405,22.4396253 L18.5917612,14.9763317 L24.6967095,10.3207724 C25.0258477,9.95783882 25.0937839,9.43328063 24.8676481,9.0008973 Z">
                </path>
                <defs>
                  <linearGradient id="bv_rating_summary_star_filled_1_4_84.21_673" x1="84.21%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color: rgb(238, 49, 36); stop-opacity: 1;"></stop>
                    <stop offset="1%" style="stop-color: rgb(254, 228, 17); stop-opacity: 1;"></stop>
                  </linearGradient>
                </defs>
              </svg>
              <p class="px-3 rating-count">4.8 <span>(95)</span></p>
            </div>
          </div>
          <h1 class="description">Description</h1>
          <p><strong>Delicious Punjabi Tadka!</strong></p>
          <p class="text-dark">Spices and herbs are mixed to create a flavorful mixture with key ingredients:</p>
          <ul>
            <li>Gram flour (besan)</li>
            <li>Fried lentils (moong dal)</li>
            <li>Peanuts</li>
            <li>Spices (cumin, coriander, garam masala, etc.)</li>
            <li>Herbs (cilantro, mint, etc.)</li>
          </ul>

          <h2 class="description">Nutritional Information per 100 Grams</h2>
          <div class="nutrition-table">
            <div class="table-header">
              <div class="header-item" style="border: 1px solid #b81c06;color: #fff;">Nutrients</div>
              <div class="header-item" style="border: 1px solid #b81c06;color: #fff;">PER 100g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">Energy</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">570 kcal</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">Protein</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">11.5g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border-top:  1px solid #b81c06;border-right: 1px solid #b81c06;color: #000; font-weight:600">Total Carbohydrate</div>
              <div class="table-item" style="border: 1px solid #b81c06; color:#000;">45.7g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border-right: 1px solid #b81c06;color: #000;">-Total Sugars</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">3.4g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border-right: 1px solid #b81c06;color: #000;">-Added Sugars</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">2.7g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border-bottom:  1px solid #b81c06; border-right: 1px solid #b81c06; color:#000;">-Dietary Fibers</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">6.7g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border-top:  1px solid #b81c06;border-right: 1px solid #b81c06;color: #000;font-weight:600;">Total Fat</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">38.0g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="color: #000;">-Saturated Fat</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">16.6g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="color: #000;">-Trans Fat</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">&lt;0.2g</div>
            </div>
            <div class="table-row">
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">Sodium</div>
              <div class="table-item" style="border: 1px solid #b81c06;color: #000;">1468.1mg</div>
            </div>
          </div>

          <p class="note text-dark">* %RDA Daily Values are based on a 2000 kcal diet. Per serve size is 20g.</p>

        </div>

      </div>
    </div>
    <div class="container swiper">
      <h2 class="text-center text-dark pb-3 relative-title pt-4">Related Products</h2>

      <div class="row pro-slider">
        <div class="swiper-wrapper">


          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="100">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/sev-mamra.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/sev-mamra1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Sev Mamra</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>


          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="200">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/moong-daal.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/moong-daal1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Moong Daal</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>


          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="300">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/nav-ratan-mixer.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/nav-ratan-mixer1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Navratna Mixture</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>


          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="400">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/nut-craker.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/nut-craker1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Nut Cracker</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="500">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/panjabi-tadka.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/panjabi-tadka1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Punjabi Tadaka</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="600">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/soulted-peanuts.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/soulted-peanuts1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Salted Peanut</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="700">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/teekha-metha-mixer.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/teekha-metha-mixer1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Teekha Meetha Mixture</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="800">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/masala-matar.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/masala-matar.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Masala Matar</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="900">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/malai-bhujia.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/malai-bhujia.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Malai Bhujia</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="1000">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/ghatiya.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/ghatiya1.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Ghatiya</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>
          <div class="product-card swiper-slide" data-aos="fade-up" data-aos-delay="1100">
            <div class="image-container">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/alu-bhujia.png" alt="Bunzz Sev Mamra" class="main-image">
              <img src="<?=base_url() ?>img/bunzz-product-rm-img/alu-bhujia.png" alt="Alternate Bunzz Sev Mamra" class="hover-image">

            </div>
            <div class="bottom text-center">
              <h5>Aaloo Bhujia</h5>
              <p class="mb-2"><strong> Price </strong>₹5.00</p>

            </div>
          </div>

        </div>
        <div class="btn-slide">
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>


      </div>
    </div>



  </div>
</div>









<?php include 'footer.php'; ?>