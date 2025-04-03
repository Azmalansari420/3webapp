<?php 
$search = $this->input->get('search');

include 'header.php'; ?>

<?php
if(!empty($alllist))
{ ?>

  <section class="mt-5 pt-5">
    <div class="container">
      <h2 class="text-center fs-1 mb-2 product-title"><?=$search ?></h2>
      <!-- <p class="text-center pb-3">Choose any of our range of snacks that better suits your needs</p> -->
    </div>
  </section>





  <div class="featurs bg-img2 py-0 py-lg-5 ">
    <div class="container">
      <div class="row ">

        <div class="grid-container">

          <!--  -->
          <?php
          foreach($alllist as $data)
            {

              $subcat = $this->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$data->sub_cat_id));

             ?>
          <div class="product-card " data-aos="fade-up" data-aos-delay="100" data-weight="<?php if(!empty($subcat)) echo $subcat[0]->slug ?>">
            <a href="<?=base_url() ?>product-detaile?id=<?=$data->id ?>">
              <div class="image-container">
                <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="<?=$data->name ?>" class="main-image">
                <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="<?=$data->name ?>" class="hover-image">

              </div>
              <div class="bottom text-center mt-2">
                <h5><?=$data->name ?></h5>
                <!-- <p class="mb-2"> Net Weight : 20 Grams</p> -->

              </div>
            </a>
          </div>
        <?php } ?>
          <!--  -->

          


        </div>

      </div>
    </div>
  </div>

<?php } else { ?>


  <section class="mt-5 pt-5">
    <div class="container">
      <h2 class="text-center fs-1 mb-2 product-title"><?=$search ?></h2>
      <!-- <p class="text-center pb-3">Choose any of our range of snacks that better suits your needs</p> -->
    </div>
  </section>

    <div class="featurs bg-img2  " style="margin: 100px 0;">
    <div class="container">
      <div class="row ">
        <div class="col-md-12 text-center">
          <h2>Not Found!</h2>
        </div>
      </div>
    </div>
  </div>
<?php } ?>




<?php include 'footer.php'; ?>