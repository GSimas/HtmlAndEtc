					<?php if(get_post_meta($post->ID,'rnr_portfolio-image',true)):?>									
									
                                    <!--masonry gallery -->
                                    <div class="gallery-items grid-small-pad">
                                        
                                        <?php $images = rwmb_meta( 'rnr_portfolio-image','type=image&size=services-img' );
                                                foreach ( $images as $image )
                                                {
                                                echo "<div class='gallery-item'><div class='grid-item-holder'><a href='{$image['full_url']}' title='{$image['title']}' rel='thickbox' class='image-popup box-popup'><i class='fa fa-expand'></i></a><div class='folio-img'><span class='overlay'></span><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /></div></div></div>";
                                        };?>
										
                                    </div>
                                    <!--masonry gallery end-->
									
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						