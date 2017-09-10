					<?php if(get_post_meta($post->ID,'rnr_portfolio-image',true)):?>									
                                <!-- portfolio start -->
                                <div class="gallery-items  spad lightgallery">
                                    <!-- gallery-item-->
                                    <?php $cooper_images = rwmb_meta( 'rnr_portfolio-image','type=image&size=services-img' );
                                                foreach ( $cooper_images as $image )
                                                {
                                                echo "<div class='gallery-item'><div class='grid-item-holder'><div class='box-item vis-det folio-img fl-wrap'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' /><a data-src='{$image['full_url']}' title='{$image['title']}' class='popgal'><i class='fa fa-search'></i></a></div></div></div>";
                                        };?>
                                    <!-- gallery-item end-->									
                                </div>
			
					<?php else:?>	

					        <?php get_template_part('post-formats/portfolio-image'); ?>

					<?php endif;?>						