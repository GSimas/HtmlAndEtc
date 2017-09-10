				   <?php if (( get_post_meta($post->ID,'rnr_portfolio-image',true))):?>
							<!-- image  -->
							<div class="post-media">
								<div class="item">	

                                   <?php $cooper_images = rwmb_meta( 'rnr_portfolio-image','type=image&size=cooper-portfolio-slider' );
										foreach ( $cooper_images as $image )
										{
										echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class='respimg'/>";
								    };?>								
							    </div>
                            </div>
                            <!-- image end -->
							
					<?php else: ?>	
						
						<?php if (has_post_thumbnail( $post->ID ) ):?>	
						<?php $cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>			
							<!-- image  -->
							<div class="post-media">
								<div class="item">
										<img src="<?php echo esc_url($cooper_image[0]);?>" class="respimg" alt="">
								</div>
							</div>
							<!-- image end -->
						
					    <?php endif; ?>	

					<?php endif;?>						