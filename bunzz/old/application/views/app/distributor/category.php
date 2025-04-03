<?php
$this->load->view('app/include/header'); 

?>

<style>
  .food-box .img-box::before {
    border-bottom: none;
}
</style>

  
      <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
                <a href="javascript:void(0);" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Category</h3>
                <a href="home.php" class="action-right"><i class="icon-home"></i></a>
            </div>
        </div>
    </div>



   <div class="app-content">
        <div class="tf-container">         
          <div class="mt-5" style="padding-bottom: 50px;">
              <div class="swiper-container tes-food mt-3">
                  <div class="row">
                    <?php
                    $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                    foreach($categories as $data)
                      { ?>
                      <div class="col-6 mb-3">
                          <div class="food-box">
                              <div class="img-box">
                                  <img src="<?=base_url() ?>media/uploads/categories/<?=$data->image ?>" alt="images">
                              </div>
                              <div class="content">
                                  <h4 style="text-align:center">
                                    <a href="<?=('distributor/category-product.php?id='.$data->id) ?>"><?=$data->name ?></a>
                                  </h4>
                              </div>
                          </div>
                      </div>
                      <?php } ?>
                  </div>                     
              </div>
          </div>
        </div>
      </div>




  




<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>