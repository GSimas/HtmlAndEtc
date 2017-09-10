<?php if (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='slider'):?>
           <!-- Hero section   -->
            <div class="hero-wrap fl-wrap full-height">
                <!-- hero-wrap-image-slider-holder  end -->
                <div class="hero-slider-holder fl-wrap full-height">
                    <div class="num-holder3"></div>
                    <!-- hero-wrap-image-slider  -->
                    <div class="hero-slider fscs fl-wrap full-height">
                        <!-- 1  -->
                        <div class="item fl-wrap full-height">
							<?php $cooper_image = rwmb_meta( 'rnr_port-section-intro-image','type=image&size=' );
									foreach ( $cooper_image as $image ){
										 echo "<div class='bg' data-bg='{$image['url']}'></div>";
								};?>	
							<div class="overlay"></div>
							<div class="hero-wrap-item  left-her alt">
								<div class="container">
									<div class="fl-wrap section-entry">
										<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-content',true))):?>		
										<p> <?php echo balanceTags(get_post_meta($post->ID,'rnr_port-section-intro-content',true)) ?></p>
										<?php endif;?>
									
										<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-title',true))):?>
										<h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_port-section-intro-title',true)) ?></h2>
										<?php else:?>
										<h2><?php the_title();?></h2>
										<?php endif;?>
										
										<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-subtitle',true))):?>
										<h3><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-subtitle',true)); ?></h3>
										<?php endif;?>
										
										<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-button',true))):?>
										<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-button-scrollto',true))=='yes'){?>											
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_port-section-intro-button-url',true)); ?>" class="btn hide-icon custom-scroll-link"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-button',true)); ?></span></a>
										<?php } else {?>
										<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_port-section-intro-button-url',true)); ?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-button',true)); ?></span></a>
										<?php };?>	
										<?php endif;?>	
									</div>
								</div>
							</div>							
                        </div>
                        <!-- 1  end--> 
						<?php $cooper_images = rwmb_meta( 'rnr_port-section-intro-slider','type=image&size=' );
								foreach ( $cooper_images as $image ){
									 echo "<div class='item fl-wrap full-height'><div class='bg' data-bg='{$image['url']}'></div></div>";
							};?>							
                               
                    </div>
                    <!-- hero-wrap-image-slider  end -->
                    <!--  navigation -->
                    <div class="customNavigation gals">
                        <a class="prev-slide transition"> <i class="fa fa-angle-left"></i></a>
                        <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!--  navigation end-->
                </div>
                <!-- hero-wrap-image-slider-holder  end -->
            </div>
            <!-- Hero section   end -->					

<?php elseif (( get_post_meta($post->ID,'rnr_portfolio-section-style',true))=='video'):?>

            <!-- Hero section   -->
            <div class="hero-wrap fl-wrap full-height">
                <div class="media-container">
                    <a href="#sec1" class="ajax custom-scroll-link show-info"><i class="fa fa-info"></i></a>
                    <div class="video-mask"></div>
					<!--=============== add you video id  in data-vid="" if you want add sound change data-mv="1" on data-mv="0" ===============-->
					<?php if(get_post_meta($post->ID,'rnr_portfolio-section-video',true)):?>
					<div  class="background-video" data-vid="<?php echo (get_post_meta($post->ID,'rnr_portfolio-section-video',true)) ?>" data-mv="<?php echo (get_post_meta($post->ID,'rnr_portfolio-section-video-sound',true)) ?>"> </div>
					<?php endif;?>						
					<?php $cooper_images = rwmb_meta( 'rnr_port-section-intro-image','type=image&size=' );
								  foreach ( $cooper_images as $image ){
									echo "<div class='bg mob-bg' style=background-image:url('{$image['url']}') width='{$image['width']}' height='{$image['height']}'></div>";
							};?>						
					<div class="overlay"></div>
                </div>				
				<div class="hero-wrap-item  left-her alt">
                	<div class="container">
						<div class="fl-wrap section-entry">
							<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-content',true))):?>		
							<p> <?php echo balanceTags(get_post_meta($post->ID,'rnr_port-section-intro-content',true)) ?></p>
							<?php endif;?>
						
							<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-title',true))):?>
							<h2><?php echo balanceTags(get_post_meta($post->ID,'rnr_port-section-intro-title',true)) ?></h2>
							<?php else:?>
							<h2><?php the_title();?></h2>
							<?php endif;?>
							
							<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-subtitle',true))):?>
							<h3><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-subtitle',true)); ?></h3>
							<?php endif;?>
							
							<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-button',true))):?>
							<?php if (( get_post_meta($post->ID,'rnr_port-section-intro-button-scrollto',true))=='yes'){?>											
							<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_port-section-intro-button-url',true)); ?>" class="btn hide-icon custom-scroll-link"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-button',true)); ?></span></a>
							<?php } else {?>
							<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_port-section-intro-button-url',true)); ?>" class="btn hide-icon"><i class="fa fa-eye"></i><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_port-section-intro-button',true)); ?></span></a>
							<?php };?>	
							<?php endif;?>	
						</div>
                    </div>
                </div>
            </div>
            <!-- Hero section   end -->

<?php else:?>	
			
	 <!-- Empty -->	

<?php endif ;?>		

            <!-- fixed column  -->
            <div class="fixed-column">
                <div class="column-image fl-wrap full-height">
                    <?php $cooper_images = rwmb_meta( 'rnr_portfolio-section-image','type=image&size=menu-feature-img' );
                            foreach ( $cooper_images as $image ){
                                echo "<div class='bg' data-bg='{$image['url']}'></div>";
                        };?>				
                    <div class="overlay"></div>
                </div>
				<?php if (( get_post_meta($post->ID,'rnr_portfolio-section-title',true))){?>
                <div class="bg-title alt"><span><?php echo esc_attr(get_post_meta($post->ID,'rnr_portfolio-section-title',true)); ?></span></div>
				<?php } else {?>
                <div class="bg-title alt"><span><?php the_title();?></span></div>
				<?php };?> 
                <div class="progress-bar-wrap">
                    <div class="progress-bar"></div>
                </div>
            </div>
            <!-- fixed column  end -->				