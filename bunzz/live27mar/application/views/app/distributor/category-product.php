<?php
$this->load->view('app/include/header'); 
$id = $this->input->get('id');
$categories = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$id)); 
if(!empty($categories))
	$categories = $categories[0];
?>

  <style>
      
      .food-box {
 box-shadow: 0 0px 8px -1px #0000003b !important;
  border: 2px solid #80808030 !important;
  border-radius: 6px !important;
  overflow: hidden !important;
}
  .food-box .img-box img {
  border-radius: 0;
  width: 100%;
  height: 100%;
}    
  </style>
      <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center" style="height: 40px;">
                <a href="javascript:void(0);" class="back-btn"> <i class="icon-left"></i> </a>
                <h3><?=$categories->name ?></h3>
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
                    $this->db->order_by('id desc');
                    $product = $this->crud->selectDataByMultipleWhere('product',array('cat_id'=>$id,'status'=>1,));
                    foreach($product as $data)
                      { ?>
                      <div class="col-6 mb-3">
                          <div class="food-box">
                              <div class="img-box">
                                  <img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="images">
                                  <span><?=discount($data->mrp_price,$data->sale_price) ?>%</span>
                              </div>
                              <div class="content">
                                  <h4>
                                    <a href="<?=('distributor/product-details.php?id='.$data->id) ?>"><?=$data->name ?></a>
                                  </h4>
                                  <p class="mrp-price"><strong> ₹ <?=number_format($data->sale_price,2) ?></strong> &nbsp;&nbsp; <del style="color:red;">₹ <?=number_format($data->mrp_price,2) ?></del></p>
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