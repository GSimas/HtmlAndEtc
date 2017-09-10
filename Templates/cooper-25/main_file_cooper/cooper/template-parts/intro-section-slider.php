            <!-- Hero section   -->
            <div class="hero-wrap fl-wrap full-height">
                <!-- hero-wrap-image-slider-holder  end -->
                <div class="hero-slider-holder fl-wrap full-height">
                    <div class="num-holder3"></div>
                    <!-- hero-wrap-image-slider  -->
                    <div class="hero-slider fscs fl-wrap full-height">
                        <!-- item  -->
						<?php global $post;
							$categoryname= get_post_meta($post->ID, 'rnr_intro-slider-post-cat', true);
							$paged=(get_query_var('paged'))?get_query_var('paged'):1;
							$loop = new WP_Query( array( 'post_type' => 'slider','posts_per_page'=> -1, 'slider_category'=> $categoryname) ); while ( $loop->have_posts() ) : $loop->the_post();
						?>						
                        <div class="item fl-wrap full-height">
							<?php if (has_post_thumbnail( $post->ID ) ): 
  								$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); ?>
								<div class="bg"  data-bg="<?php echo esc_url($cooper_image[0]); ?>"></div>
							<?php endif ;?>	
                            <div class="overlay"></div>
							<?php if (( get_post_meta($post->ID,'rnr_intro-slider-title-style',true))=='right'):?>
                            <div class="hero-wrap-item right-her alt">
							<?php else:?>
							<div class="hero-wrap-item left-her alt">
							<?php endif ;?>	
                                <div class="container">
                                    <div class="fl-wrap section-entry">
									
										<?php $cooper_content= get_the_content();?>
                                        <?php if($cooper_content != '') { ?>		
                                        <p> <?php the_content();?></p>
			                            <?php };?>
									
										<?php if (( get_post_meta($post->ID,'rnr_intro-slider-title',true))):?>
                                        <h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_intro-slider-title',true)) ?></h2>
										<?php else:?>
								        <h2><?php the_title();?></h2>
								        <?php endif;?>
										
										<?php if (( get_post_meta($post->ID,'rnr_intro-slider-subtitle',true))):?>
                                        <h3><?php echo esc_attr(get_post_meta($post->ID,'rnr_intro-slider-subtitle',true)); ?></h3>
										<?php endif;?>
										
										<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button',true))):?>
										<?php if (( get_post_meta($post->ID,'rnr_slider-intro-button-scrollto',true))=='yes'){?>											
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>" class="btn hide-icon custom-scroll-link"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_slider-intro-button',true)); ?></span></a>
										<?php } else {?>
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_slider-intro-button-url',true)); ?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_slider-intro-button',true)); ?></span></a>
										<?php };?>	
										<?php endif;?>	
										
                                    </div>
                                </div>
							<?php if (( get_post_meta($post->ID,'rnr_intro-slider-title-style',true))=='right'):?>	
                            </div>
							<?php else:?>	
							</div>
							<?php endif ;?>	
                        </div>
                        <!-- item  end-->
						<?php endwhile; wp_reset_postdata(); ?>                           
                    </div>
                    <!-- hero-wrap-image-slider  end -->
                    <!--  navigation -->
                    <div class="customNavigation gals">
                        <a class="prev-slide transition"> <i class="fa fa-angle-left"></i></a>
                        <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!--  navigation end-->
                </div>
                <!-- hero-wrap-image-slider-holder  end -->
            </div>
            <!-- Hero section   end -->