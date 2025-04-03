<div class="dz-product-preview">
				<div class="swiper product-detail-swiper">
					<div class="swiper-wrapper">
						<?php
				    	foreach($rowd as $key => $data)
				    		{ ?>
						<div class="swiper-slide">
							<div class="dz-media">
								<img src="<?=base_url() ?>media/uploads/product/<?=$data->image ?>" alt="">
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>

<script>
	if(jQuery('.product-detail-swiper').length > 0){
		var swiper = new Swiper('.product-detail-swiper', {
			speed: 500,
			parallax: true,
			slidesPerView: 1,
			spaceBetween: 0,
			autoplay: {
			   delay: 1500,
			},
			loop:true,
			pagination: {
                el: ".swiper-pagination",
                clickable: true,
			},
		});
	}
</script>