					<?php if(get_post_meta($post->ID,'rnr_blog-image',true)):?>	

                        <div class="post-media">
                            <div class="single-slider-holder">
                                <div class="customNavigation">
                                    <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                                    <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                                </div>
                                <div class="single-slider owl-carousel">
                                    <?php $images = rwmb_meta( 'rnr_blog-image','type=image&size=portfolio-slider' );
                                                foreach ( $images as $image )
                                                {
                                                echo "<div class='item'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class='respimg'/></div>";
                                    };?>								

                                </div>
                            </div>
                        </div>                                					
									
					<?php else:?>	

					        <?php get_template_part('post-formats/standard-index'); ?>

					<?php endif;?>											