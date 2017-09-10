            <!--=============== fixed-column ===============-->
            <div class="fixed-column">
                <div class="column-image fl-wrap full-height">
                    <?php if (has_post_thumbnail( $post->ID ) ):
						$cooper_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cooper-menu-feature-img' );?>				
                    <div class="bg" data-bg="<?php echo esc_url($cooper_image[0]);?>"></div>
					<?php endif;?>	
                    <div class="overlay"></div>
                </div>
				<?php if (( get_post_meta($post->ID,'rnr_sec-menu-title',true))){?>
                <div class="bg-title alt"><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_sec-menu-title',true)); ?></span></div>
				<?php } else {?>
                <div class="bg-title alt"><span><?php the_title();?></span></div>
				<?php };?> 
                <div class="progress-bar-wrap">
                    <div class="progress-bar"></div>
                </div>
            </div>					
            <!-- fixed-column end -->