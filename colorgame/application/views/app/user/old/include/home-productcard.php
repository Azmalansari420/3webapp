<?php
$this->db->limit(1);
$this->db->group_by('color_id');
$this->db->order_by('id asc');
$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$data->id));
?>
<style>
	.shop-card .dz-media .item-bookmark {
    z-index: 9999999 !important;
}
</style>
<div class="swiper-slide">
						<div class="shop-card">
							<div class="dz-media">
								<a href="<?=('product-detail.php?id='.$data->id) ?>">
									<img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_image ?>" alt="<?=$data->name ?>">
									<a href="#!" class="item-bookmark active11 add-to-wishlist" data-p_id="<?=$data->id ?>">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
									</a>	
								</a>
							</div>
							<div class="dz-content">
								<span class="font-12"><?=categoryname($data->cat_id) ?></span>
								<h6 class="title "><a href="<?=('product-detail.php?id='.$data->id) ?>"><?=$data->name ?></a></h6>
								<h6 class="price"><?=currency_simble($allimage[0]->sale_price) ?><del><?=currency_simble($allimage[0]->mrp_price) ?></del></h6>
							</div>
						</div>
					</div>