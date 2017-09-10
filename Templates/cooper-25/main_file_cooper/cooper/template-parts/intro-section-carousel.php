            <!-- Hero section   -->
            <div class="hero-wrap fl-wrap full-height">
                <div class="hero-item">
                    <div class="overlay"></div>
                    <?php $cooper_images = rwmb_meta( 'rnr_intro-section-image','type=image&size=' );
                                      foreach ( $cooper_images as $image ){
                                        echo "<div class='bg' data-bg='{$image['url']}'></div>";
                                };?>
                </div>
                <div class="single-carousel-holder fl-wrap full-height">
                    <div class="single-carousel">
						<?php global $post;
							$categoryname= get_post_meta($post->ID, 'rnr_intro-slider-post-cat', true);
							$paged=(get_query_var('paged'))?get_query_var('paged'):1;
							$loop = new WP_Query( array( 'post_type' => 'slider','posts_per_page'=> -1, 'slider_category'=> $categoryname) ); while ( $loop->have_posts() ) : $loop->the_post();
						?>						
                        <!-- item    -->
                        <div class="item">
                            <div class="overlay"></div>
							<?php if (has_post_thumbnail( $post->ID ) ): 
  								$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
								<div class="bg"  data-bg="<?php echo esc_url($cooper_image[0]); ?>"></div>
							<?php endif ;?>								
                            
                            <div class="carousel-item alt">
								<?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
								
								<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button-url',true))):?>
								
								<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button-scrollto',true))=='yes'){?>
								<h3><a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>" class="custom-scroll-link"><?php echo balanceTags(get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></a></h3>
								<?php } else {?>
								<h3><a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>"><?php echo balanceTags(get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></a></h3>
								<?php };?>	
								
								<?php else:?>
								<h3><?php echo balanceTags(get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h3>
								<?php endif;?>	
								
								<?php else:?>
								
								<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button-url',true))):?>
								
								<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button-scrollto',true))=='yes'){?>
								<h3><a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>" class="custom-scroll-link"><?php the_title();?></a></h3>
								<?php } else {?>
								<h3><a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>"><?php the_title();?></a></h3>
								<?php };?>	
								<?php else:?>
								<h3><?php the_title();?></h3>
								<?php endif;?>	
								
								<?php endif;?>							
								<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
								<p><?php echo esc_attr(get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)); ?></p>
								<?php endif;?>
                            </div>
                        </div>
                        <!-- item end   -->
						<?php endwhile; wp_reset_postdata(); ?>  
                    </div>
                    <div class="customNavigation gals">
                        <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                        <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                    </div>
                </div>
            </div>
            <!-- Hero section   end -->