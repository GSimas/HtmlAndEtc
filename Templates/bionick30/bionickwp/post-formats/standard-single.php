                    <?php if (has_post_thumbnail( $post->ID ) ):?>
					
					        <?php get_template_part('post-formats/image-single'); ?>
									
					<?php else:?>	

                    <!-- Empty -->
									
					<?php endif;?>									