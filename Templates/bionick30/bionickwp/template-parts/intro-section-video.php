                    <!--=============== hero-wrapper ===============-->
                    <div class="hero-wrapper">
                        <div class="section-parallax" data-top-bottom="transform: translateY(450px);" data-bottom-top="transform: translateY(-450px);">
                            <div class="media-container">
                                <div class="video-mask"></div>
                                <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
								<?php if(get_post_meta($post->ID,'rnr_intro-section-video',true)):?>
                                <div  class="background-video" data-vid="<?php echo (get_post_meta($post->ID,'rnr_intro-section-video',true)) ?>" data-mv="<?php echo (get_post_meta($post->ID,'rnr_intro-section-video-sound',true)) ?>"> </div>
								<?php endif;?>
								
	                            <?php $images = rwmb_meta( 'rnr_intro-section-image','type=image&size=' );
                                      foreach ( $images as $image ){
                                        echo "<div class='bg mob-bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
                                };?>								
                                <div  class="background-video" data-vid="eZ70TaAUhQo" data-mv="1"> </div>
                                <div class="bg mob-bg" style="background-image:url(images/bg/7.jpg)"></div>
                                <div class="overlay"></div>
                            </div>
							
							<?php if (( get_post_meta($post->ID,'rnr_intro-section-title',true))):?>
                            <div class="hero-title">
                                <div class="hero-wrap" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
                                    <h3><?php echo (get_post_meta($post->ID,'rnr_intro-section-title',true)) ?></h3>
                                    <div class="clearfix"></div>
                                    <h4><a href="#sec1" class="custom-scroll-link"><?php echo (get_post_meta($post->ID,'rnr_intro-section-subtitle',true)) ?></a></h4>
                                </div>
                            </div>
							<?php else:?>
							<!-- empty -->
							<?php endif;?>
                        </div>
                    </div>
                    <!-- hero-wrapper  end -->