<?php
$this->db->limit(1);
$this->db->group_by('color_id');
$this->db->order_by('id asc');
$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$value->id));

?>
<div class="col-6">
					<div class="shop-card style-4">
						<div class="dz-media">
							<a href="<?=('product-detail.php?id='.$value->id) ?>">
								<img src="<?=base_url() ?>media/uploads/product/<?=$value->thumb_image ?>" alt="image">	
							</a>
						</div>
						<div class="dz-content">
							<span class="font-12"><?=categoryname($value->cat_id) ?></span>
							<h6 class="title"><a href="<?=('product-detail.php?id='.$value->id) ?>"><?=$value->name ?></a></h6>
							<h6 class="price"><?=currency_simble($allimage[0]->sale_price) ?><del><?=currency_simble($allimage[0]->mrp_price) ?></del></h6>
						</div>
					</div>
				</div>
