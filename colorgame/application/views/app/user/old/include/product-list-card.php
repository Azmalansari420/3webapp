<?php
$this->db->limit(1);
$this->db->group_by('color_id');
$this->db->order_by('id asc');
$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$data->id));
?>
<div class="col-12">
								<div class="product-list">
									<div class="dz-media">
										<img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_image ?>" alt="">
										<a href="javascript:void(0);" class="item-bookmark actives add-to-wishlist" data-p_id="<?=$data->id ?>">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
										</a>
									</div>
									<div class="product-content">
										<div class="dz-review-meta mb-1">
											<h6 class="review"><?=categoryname($data->cat_id) ?></h6>
										</div>
										<h6 class="title font-14"><a href="<?=('product-detail.php?id='.$data->id) ?>"><?=$data->name ?></a></h6>
										<div class="product-footer">
											<h5 class="price mb-0"><?=currency_simble($allimage[0]->sale_price) ?><del><?=currency_simble($allimage[0]->mrp_price) ?></del></h5>
											<small><?=discount($allimage[0]->mrp_price,$allimage[0]->sale_price) ?>% OFF</small>
										</div>
									</div>
								</div>
							</div>