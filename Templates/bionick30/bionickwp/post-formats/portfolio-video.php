					<?php if(get_post_meta($post->ID,'rnr_portfolio-video',true)):?>									
									
                                    <!-- video  -->
                                    <div class="iframe-holder">
                                        <div class="resp-video">
                                            <iframe src="<?php echo esc_url(get_post_meta($post->ID,'rnr_portfolio-video',true));?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
                                        </div>
                                    </div>
                                    <!-- video end -->
									
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						