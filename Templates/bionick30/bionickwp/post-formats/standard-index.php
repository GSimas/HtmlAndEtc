                    <?php if (has_post_thumbnail( $post->ID ) ):?>
					
					        <?php get_template_part('post-formats/image-index'); ?>
									
					<?php else:?>	

                    <!-- Empty -->    
									
					<?php endif;?>									