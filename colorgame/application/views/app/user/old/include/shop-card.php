<?php
if(!empty($value))
{

?>
<div class="col-6">
	<div class="shop-card">
		<div class="dz-media">
			<img src="<?=base_url() ?>media/uploads/product/<?=$value->image ?>" alt="image">	
			<a href="javascript:void(0);" class="item-bookmark add-to-wishlist" data-p_id="<?=$value->p_id ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
			</a>
		</div>
		<div class="dz-content">
			<span class="font-12 brand-tag"><?=categoryname($value->cat_id) ?></span>
			<h6 class="title mb-1"><a href="<?=('product-detail.php?id='.$value->p_id) ?>"><?=$value->name ?></a></h6>
			<h6 class="price mb-2"><?=currency_simble($value->sale_price) ?><del><?=currency_simble($value->mrp_price) ?></del></h6>
			<div class="dz-review-meta">
				<h6 class="review">[<?=colorname($value->color_id) ?>] [<?=sizename($value->size_id) ?>]</h6>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
	<div class="col-12">
		<img src="<?=base_url() ?>media/not.webp" alt="image">
	</div>
<?php } ?>