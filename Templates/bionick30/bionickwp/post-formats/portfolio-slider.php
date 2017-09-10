					<?php if(get_post_meta($post->ID,'rnr_portfolio-image',true)):?>								
									
                                    <!-- slider  -->
                                    <div class="single-slider-holder">
                                        <div class="customNavigation">
                                            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                                            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                                        </div>
										
                                        <div class="single-slider owl-carousel">                                            
                                        <?php $images = rwmb_meta( 'rnr_portfolio-image','type=image&size=portfolio-slider' );
                                                foreach ( $images as $image )
                                                {
                                                echo "<div class='item'><a href='{$image['full_url']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class='respimg'/></a> </div>";
                                        };?>
										</div>
										
                                    </div>
                                    <!-- slider end -->
									
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						