                    <!--=============== fixed-column ===============-->
                    <div class="fixed-column">
                        <div class="bg-wrapper">
                            <?php if (has_post_thumbnail( $post->ID ) ):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'menu-feature-img' );?>						
                            <div class="bg" style="background-image:url(<?php echo esc_url($image[0]);?>)"></div>
							<?php endif;?>
                            <div class="overlay"></div>
							<?php if (( get_post_meta($post->ID,'rnr_sec-menu-title',true))){?>
                            <div class="bg-title"><span><?php echo (get_post_meta($post->ID,'rnr_sec-menu-title',true)); ?></span></div>
							<?php } else {?>
                            <div class="bg-title"><span><?php the_title();?></span></div>
							<?php };?> 
                        </div>
                    </div>
                    <!-- fixed-column end -->