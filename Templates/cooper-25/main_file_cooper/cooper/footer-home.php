<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php $cooper_options = get_option('cooper_wp'); ?>                     

				<?php if($cooper_options['social-icon-site'] == 'yes') {?>				
                <!-- header-social-->               
                <div class="footer-social">
                    <ul>				
						<?php if(!empty($cooper_options['facebook'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['facebook']); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php endif;?>
		
						<?php if(!empty($cooper_options['twitter'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php endif;?>
		
						<?php if(!empty($cooper_options['google-plus'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['google-plus']); ?>"><i class="fa fa-google-plus"></i></a></li>
						<?php endif;?>		

						<?php if(!empty($cooper_options['linkedin'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php endif;?>	
		
						<?php if(!empty($cooper_options['instagram'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php endif;?>	

						<?php if(!empty($cooper_options['pinterest'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
						<?php endif;?>	

						<?php if(!empty($cooper_options['whatsapp'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['whatsapp']); ?>"><i class="fa fa-whatsapp"></i></a></li>
						<?php endif;?>			

						<?php if(!empty($cooper_options['skype'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['skype']); ?>"><i class="fa fa-skype"></i></a></li>
						<?php endif;?>	
			
						<?php if(!empty($cooper_options['dribbble'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
						<?php endif;?>				
		
						<?php if(!empty($cooper_options['youtube'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['youtube']); ?>"><i class="fa fa-youtube"></i></a></li>
						<?php endif;?>	
		
						<?php if(!empty($cooper_options['vimeo'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['vimeo']); ?>"><i class="fa fa-vimeo"></i></a></li>
						<?php endif;?>
			
						<?php if(!empty($cooper_options['dropbox'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['dropbox']); ?>"><i class="fa fa-dropbox"></i></a></li>
						<?php endif;?>	

						<?php if(!empty($cooper_options['github'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['github']); ?>"><i class="fa fa-github"></i></a></li>
						<?php endif;?>
						<?php if(!empty($cooper_options['xing'])):?> 
						<li><a href="<?php echo esc_url($cooper_options['xing']); ?>"><i class="fa fa-xing"></i></a></li>
						<?php endif;?>	
						
						<?php if (class_exists('WooCommerce')) { ?>
						<?php if(!empty($cooper_options['email'])):?> 
						<li><a href="mailto:<?php echo esc_attr($cooper_options['email']); ?>"><i class="fa fa-envelope"></i></a></li>
						<?php endif;?>
						<?php }  else { ?>
						<?php } ?>

		            </ul>		
		        </div>
	            <?php } else { ?> 
			        <!-- Empty -->					 
                <?php } ;?> 				
                <!-- header-social end-->      
     
                <div class="copyright"><?php $cooper_copy = Cooper_AfterSetupTheme::return_thme_option('copyright'); echo apply_filters('the_content',$cooper_copy); ?></div>
				
            </footer>
            <!-- footer end -->
            <!-- Share container  -->
			<?php if($cooper_options['nav-share'] == 'yes') {?>
			<div class="share-container  isShare"  data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>
			<?php } else { ?> 
				<!-- Empty -->					 
			<?php } ;?> 			
            <!-- Share container  end-->
        </div>
<?php wp_footer(); ?>
</body>
</html>