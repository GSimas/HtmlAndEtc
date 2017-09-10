					<?php if(get_post_meta($post->ID,'rnr_portfolio-image',true)):?>	

						<div class="single-slider-holder fl-wrap lightgallery">
							<div class="single-slider fl-wrap" data-loppsli="0">
								<?php $cooper_images = rwmb_meta( 'rnr_portfolio-image','type=image&size=cooper-portfolio-slider' );
										foreach ( $cooper_images as $image )
										{
										echo "<div class='item'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class='respimg'/><a href='{$image['full_url']}' title='{$image['title']}' class='popup-image slider-zoom'><i class='fa fa-expand'></i></a></div>";
								};?>
							</div>
							<!--  navigation -->
							<div class="customNavigation gals">
								<a class="prev-slide transition"> <i class="fa fa-angle-left"></i></a>
								<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
							</div>
							<!--  navigation end-->
						</div>					
									
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						