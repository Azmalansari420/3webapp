<?php 
$id = $this->input->get('id');
if(!empty($id))
{
  $categories = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$id));
  $cat_name = $categories[0]->name;
}

include 'header.php'; ?>

<?php
if(!empty($id))
{ ?>

  <section class="mt-5 pt-5">
    <div class="container">
      <h2 class="text-center fs-1 mb-2 product-title"><?=$cat_name ?></h2>
      <p class="text-center pb-3">Choose any of our range of snacks that better suits your needs</p>
    </div>
  </section>

  <section class=" ">
    <div class="container p-3 content-box">
      <div class="row align-items-center">

    <!--     <div class="col-md-6">
          <h5 class="p-0 m-0 text-center text-lg-start py-2">18 Grams - 25 Grams per packet</h5>
        </div> -->

        <div class="col-md-12">
          <div class="container ">
            <!-- <label for="weightFilter">Select Packet Weight:</label> -->
            <select id="weightFilter" class="form-select bg-transparent text-dark" style=" border-color:#e1145f">
              <!-- <option value="Packet-Weight" selected>Select Packet Weight</option> -->
              <option value="all">Show All</option>
              <?php
              $subcat = $this->crud->selectDataByMultipleWhere('sub_categories',array('status'=>1,'cat_id'=>$id));
              foreach($subcat as $data)
                { ?>
                <option value="<?=$data->slug ?>"><?=$data->name ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </section>




  <div class="featurs bg-img2 py-0 py-lg-5 ">
    <div class="container">
      <div class="row ">

        <div class="grid-container">

          <!--  -->
          <?php
          $this->db->order_by('id desc');
          $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'cat_id'=>$id));
          foreach($product as $data)
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

    <div class="featurs bg-img2  " style="margin: 100px 0;">
    <div class="container">
      <div class="row ">
        <div class="col-md-12 text-center">
          <h2>Oops Somthing Wrong</h2>
        </div>
      </div>
    </div>
  </div>
<?php } ?>




<?php include 'footer.php'; ?>