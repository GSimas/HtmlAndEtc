					<?php if (has_post_thumbnail( $post->ID ) ):?>	

                        <div class="post-media">						
							    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
								<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image[0]);?>" alt="" class="respimg"></a>
						</div>					
										
					<?php else:?>	

					        <?php get_template_part('post-formats/standard-index'); ?>

					<?php endif;?>						