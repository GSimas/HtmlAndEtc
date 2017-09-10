					<?php if (has_post_thumbnail( $post->ID ) ):?>	
					
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>			
                                    <!-- image  -->
                                    <div class="post-media">
                                        <div class="item">
                                                <img src="<?php echo esc_url($image[0]);?>" class="respimg" alt="">
                                        </div>
                                    </div>
                                    <!-- image end -->
									
					<?php else:?>	

                    <!-- empty -->
					 
					<?php endif;?>						