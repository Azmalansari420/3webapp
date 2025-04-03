<?php
$wishlist = wishlist_cart();
if(!empty($wishlist))
{
foreach($wishlist as $data)
	{
		$product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$data->p_id));
		if(!empty($product))
			$product = $product[0];

		$this->db->limit(1);
		$this->db->group_by('color_id');
		$this->db->order_by('id asc');
		$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$data->p_id));
	 ?>
<div class="col-6">
					<div class="shop-card style-4">
						<div class="dz-media">
							<a href="<?=('product-detail.php?id='.$data->p_id) ?>">
								<img src="<?=base_url() ?>media/uploads/product/<?=$product->thumb_image ?>" alt="image">	
							</a>
							<a href="javascript:void(0);" class="item-bookmark active">
								<i class="icon feather icon-x-circle delete-wishlist-btn" style="color:red;" data-id="<?=$data->id ?>"></i>
							</a>
						</div>
						<div class="dz-content">
							<span class="font-12"><?=categoryname($product->cat_id) ?></span>
							<h6 class="title"><a href="<?=('product-detail.php?id='.$data->p_id) ?>"><?=$product->name ?></a></h6>
							<h6 class="price"><?=currency_simble($allimage[0]->sale_price) ?><del><?=currency_simble($allimage[0]->mrp_price) ?></del></h6>
						</div>
					</div>
				</div>
				<?php } } else {?>
<div class="col-12 text-center">
	<img src="<?=base_url() ?>media/wishlist.webp">
</div>

<?php } ?>