					<?php if(get_post_meta($post->ID,'rnr_bl-audio',true)):?>									
									
                        <div class="iframe-holder">
                            <div class="post-media">
                                <div class="resp-video">
                                    <iframe width="100%" scrolling="no" frameborder="no" src="<?php echo esc_url(get_post_meta($post->ID,'rnr_bl-audio',true));?>"></iframe>	
                                </div>
                            </div>
                        </div>	
									
					<?php else:?>	

					        <?php get_template_part('post-formats/standard-single'); ?>

					<?php endif;?>										
									