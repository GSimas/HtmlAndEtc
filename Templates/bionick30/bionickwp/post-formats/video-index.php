					<?php if(get_post_meta($post->ID,'rnr_bl-video',true)):?>

                        <div class="post-media">
                            <div class="iframe-holder">
                                <div class="post-media">
                                    <div class="resp-video">
                                        <iframe src="<?php echo esc_url(get_post_meta($post->ID,'rnr_bl-video',true));?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
							
					<?php else:?>	

					        <?php get_template_part('post-formats/standard-index'); ?>

					<?php endif;?>										