                    <!--=============== hero-wrapper ===============-->
                    <div class="hero-wrapper ">
                        <div class="section-parallax" data-top-bottom="transform: translateY(450px);" data-bottom-top="transform: translateY(-450px);">
                            <div class="media-container">
				
                                <div class="slideshow-wrap owl-carousel">
								
								<?php global $post;
		                            $categoryname= get_post_meta($post->ID, 'rnr_intro-slider-post-cat', true);
		                            $paged=(get_query_var('paged'))?get_query_var('paged'):1;
		                            $loop = new WP_Query( array( 'post_type' => 'slider','posts_per_page'=> -1, 'slider_category'=> $categoryname) );
		                            while ( $loop->have_posts() ) : $loop->the_post();?>
									
                                    <div class="item full-height">
									<?php if (has_post_thumbnail( $post->ID ) ): 
  									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
                                        <div class="bg" style="background-image:url(<?php echo esc_url($image[0]); ?>)"></div>
                                    <?php endif ;?>

                                    <div class="overlay"></div>
                                        
										<?php if (( get_post_meta($post->ID,'rnr_intro-slider-title-style',true))=='left'):?>
										
										<div class="hero-title">
                                            <div class="hero-wrap" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
											    <?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
                                                <h3><?php echo (get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h3>
                                                <div class="clearfix"></div>
												<?php endif;?>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
                                                <h4>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-link',true))):?>
												<a href="<?php echo (get_post_meta($post->ID,'rnr_intro-slider-link',true)) ?>" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php else:?>
												<a href="#sec1" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php endif;?>
												</h4>
												<?php endif;?>
                                            </div>
										</div>	
											
										<?php elseif (( get_post_meta($post->ID,'rnr_intro-slider-title-style',true))=='right'):?>	
										
										<div class="hero-title halig-right">
                                            <div class="hero-wrap" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
											    <?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
                                                <h3><?php echo (get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h3>
                                                <div class="clearfix"></div>
												<?php endif;?>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
                                                <h4>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-link',true))):?>
												<a href="<?php echo (get_post_meta($post->ID,'rnr_intro-slider-link',true)) ?>" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php else:?>
												<a href="#sec1" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php endif;?>
												</h4>
												<?php endif;?>
                                            </div>
										</div>											
											
										<?php elseif (( get_post_meta($post->ID,'rnr_intro-slider-title-style',true))=='center'):?>	
										
										<div class="hero-title halig-center no-padding">
                                            <div class="hero-wrap no-border" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
											    <?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
                                                <h3><?php echo (get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h3>
                                                <div class="clearfix"></div>
												<?php endif;?>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
                                                <h4>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-link',true))):?>
												<a href="<?php echo (get_post_meta($post->ID,'rnr_intro-slider-link',true)) ?>" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php else:?>
												<a href="#sec1" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php endif;?>
												</h4>
												<?php endif;?>
                                            </div>
										</div>		
											
										<?php else:?>	

										<div class="hero-title">
                                            <div class="hero-wrap" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
											    <?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
                                                <h3><?php echo (get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h3>
                                                <div class="clearfix"></div>
												<?php endif;?>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
                                                <h4>
												<?php if (( get_post_meta($post->ID,'rnr_intro-slider-link',true))):?>
												<a href="<?php echo (get_post_meta($post->ID,'rnr_intro-slider-link',true)) ?>" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php else:?>
												<a href="#sec1" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)) ?></a>
												<?php endif;?>
												</h4>
												<?php endif;?>
                                            </div>
										</div>	
											
                                        <?php endif ;?>	
										
									</div>
								<?php endwhile; wp_reset_postdata(); ?>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hero-wrapper  end -->