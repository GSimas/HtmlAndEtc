					<?php if(get_post_meta($post->ID,'rnr_portfolio-video',true)):?>	
                                <div class="iframe-holder">
                                    <div class="resp-video">					
									<?php if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):?>
									    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" frameborder="0" allowfullscreen></iframe>
									<?php else:?>
                                        <iframe src="https://player.vimeo.com/video/<?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-video',true)); ?>" width="640" height="273" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
									<?php endif ;?>		
                                    </div>
                                </div>									
									
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						