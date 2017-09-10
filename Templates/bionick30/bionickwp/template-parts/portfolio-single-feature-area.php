<?php if (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='default'):?>

                    <!--=============== fixed-column ===============-->	
                    <div class="fixed-column">
                        <!-- animation bacground -->
                        <div class="bg-wrapper">
                            <?php $images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=menu-feature-img' );
                                    foreach ( $images as $image ){
                                        echo "<div class='bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
                            };?>						
                            <div class="overlay"></div>
							<?php if (( get_post_meta($post->ID,'rnr_port-section-title',true))):?>
                            <div class="bg-title"><span><?php echo (get_post_meta($post->ID,'rnr_port-section-title',true)) ?></span></div>
							<?php else:?>
                            <div class="bg-title"><span><?php the_title();?></span></div>							
							<?php endif;?> 
                        </div>
                    </div>
                    <!-- fixed-column end -->
					
<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='image'):?>	

                    <!--=============== content ===============-->
                    <div class="content full-height">
                        <!--=============== hero wrapper ===============-->
                        <div class="hero-wrapper fixed-wrap">
                            <div class="media-container">
                                <a href="#sec1" class="ajax custom-scroll-link show-info"><i class="fa fa-info"></i></a>
                            <?php $images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=' );
                                    foreach ( $images as $image ){
                                        echo "<div class='bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
                            };?>							
                               
                                <div class="overlay"></div>
								<?php if (( get_post_meta($post->ID,'rnr_port-section-title',true))):?>
                                <div class="fw-title">
                                    <h3><?php echo (get_post_meta($post->ID,'rnr_port-section-title',true)) ?></h3>
                                </div>								
								<?php else:?>
                                <div class="fw-title">
                                    <h3><?php the_title();?></h3>
                                </div>								
								<?php endif;?>
                            </div>
                        </div>
                        <!--hero-wrapper end-->
                    </div>
                    <!--content end-->

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='slider'):?>

                    <!-- content -->
                    <div class="content full-height">
                        <!-- hero wrapper-->
                        <div class="hero-wrapper fixed-wrap">
                            <div class="fwslider-holder fw-in">
                                <div class="customNavigation">
                                    <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                                    <a href="#sec1" class="custom-scroll-link"><i class="fa fa-info"></i></a>
                                    <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="fwslider owl-carousel">

                            <?php $images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=' );
							        $port_sect_title= get_post_meta($post->ID, 'rnr_port-section-title', true);	
                                    foreach ( $images as $image ){
                                        echo "<div class='item full-height'><div class='bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div><div class='fw-title'>
                                        <h3>".$port_sect_title."</h3>
                                        </div></div>";	
                            };?>									
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hero wrappe end-->

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='video'):?>

                    <!--=============== content ===============-->
                    <div class="content full-height">
                        <!--=============== hero-wrapper ===============-->
                        <div class="hero-wrapper fixed-wrap">
                            <div class="media-container">
                                <a href="#sec1" class="ajax custom-scroll-link show-info"><i class="fa fa-info"></i></a>
                                <div class="video-mask"></div>
                                <!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
								<?php if(get_post_meta($post->ID,'rnr_portfolio-section-video',true)):?>
                                <div  class="background-video" data-vid="<?php echo (get_post_meta($post->ID,'rnr_portfolio-section-video',true)) ?>" data-mv="<?php echo (get_post_meta($post->ID,'rnr_portfolio-section-video-sound',true)) ?>"> </div>
								<?php endif;?>
								
	                            <?php $images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=' );
                                      foreach ( $images as $image ){
                                        echo "<div class='bg mob-bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
                                };?>							

                                <div class="overlay"></div>
								<?php if (( get_post_meta($post->ID,'rnr_port-section-title',true))):?>
                                <div class="fw-title">
                                    <h3><?php echo (get_post_meta($post->ID,'rnr_port-section-title',true)) ?></h3>
                                </div>
								<?php else:?>
                                <div class="fw-title">
                                    <h3><?php the_title();?></h3>
                                </div>								
								<?php endif;?>
                            </div>
                        </div>
                        <!-- hero-wrapper  end -->
                    </div>
                    <!-- content  end -->
					
<?php else:?>	

                    <!--=============== fixed-column ===============-->	
                    <div class="fixed-column">
                        <!-- animation bacground -->
                        <div class="bg-wrapper">
                            <?php $images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=menu-feature-img' );
                                    foreach ( $images as $image ){
                                        echo "<div class='bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
                            };?>						
                            <div class="overlay"></div>
							<?php if (( get_post_meta($post->ID,'rnr_port-section-title',true))):?>
                            <div class="bg-title"><span><?php echo (get_post_meta($post->ID,'rnr_port-section-title',true)) ?></span></div>
							<?php else:?>
                            <div class="bg-title"><span><?php the_title();?></span></div>							
							<?php endif;?> 
                        </div>
                    </div>
                    <!-- fixed-column end -->

<?php endif ;?>					