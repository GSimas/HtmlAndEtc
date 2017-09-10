<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php $wr_options = get_option('bionick_wp'); ?> 
  
<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>	

                    <footer class="sec-footer-layout">
					    
                        <div class="container">
                            <div class="row">
							
								<?php dynamic_sidebar( 'footer-sidebar' ); ?>					

                            </div>
                        </div>
						
						
                        <!--to top / privacy policy-->
                        <div class="to-top-holder copyright">
                            <div class="container">
							
							
                                <?php $copy = AfterSetupTheme::return_thme_option('copyright');
									echo apply_filters('the_content',$copy);
								?>
							
                                
						
                                <div class="to-top"> <i class="fa fa-angle-double-up"></i></div>
                            </div>
							
							
                        </div>
                    </footer>
					<?php }
					else{ ?>
					
					<footer class="wr-footer-fd sec-footer-layout">
					
					<div class="wr-footer-fd to-top-holder copyright">
                            <div class="container">
							
							 
                               <?php $copy = AfterSetupTheme::return_thme_option('copyright');
									echo apply_filters('the_content',$copy);
								?>
							

                                <div class="to-top"> <i class="fa fa-angle-double-up"></i></div>
                            </div>
						
                    </div>
					</footer>
					<?php };?>
                    <!-- footer end -->