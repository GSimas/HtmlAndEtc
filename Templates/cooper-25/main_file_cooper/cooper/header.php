<?php defined('ABSPATH') or die("No script kiddies please!");?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <?php $cooper_options = get_option('cooper_wp'); ?>		
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<!--================= loader ================-->
        <div class="loader-holder">
            <div class="loader-inner loader-vis">
                <div class="loader"></div>
            </div>
        </div>
        <!--================= loader end ================-->
        <!--================= main start ================-->
        <div id="main">
            <!--================= Header ================-->
            <header class="main-header">
			    
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-holder">
				<?php if (Cooper_AfterSetupTheme::return_thme_option('wr-logo-main')=='st2'){?>
				    <?php if(!empty($cooper_options['logopic'])):?>
					<img src="<?php echo esc_url(Cooper_AfterSetupTheme::return_thme_option('logopic','url'));?>" alt=""/>
					<?php endif;?>
				<?php } else{ ?>
					<span class="wr-text-logo">
					<?php if(!empty($cooper_options['wrlogotxt'])):?>
					<?php echo balanceTags($cooper_options['wrlogotxt']);?>
					<?php else:?>
					<?php esc_attr_e('C','cooper');?>
					<?php endif;?>								
					</span>	
				<?php } ?>		
				</a>
				
                <!-- info-button -->
                <div class="nav-button" id="open-button">
                    <span class="menu-global menu-top"></span>
                    <span class="menu-global menu-middle"></span>
                    <span class="menu-global menu-bottom"></span>
                </div>
                <!-- info-button end-->
				<?php if($cooper_options['nav-share'] == 'yes') {?>
				<div class="show-share isShare"><img src="<?php echo get_template_directory_uri(); ?>/includes/images/share.png" alt=""></div>
				<?php } else { ?> 
						<!-- Empty -->					 
				<?php } ;?> 				
                
				
            </header>
            <!-- End header -->
            <!--================= menu ================-->
            <div class="menu-wrap">
                <div class="menu-inner">
                    <!-- menu logo-->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="menu-logo">
					<?php if (Cooper_AfterSetupTheme::return_thme_option('wr-logo-main')=='st2'){?>
						<?php if(!empty($cooper_options['logopic2'])):?>
						<img src="<?php echo esc_url(Cooper_AfterSetupTheme::return_thme_option('logopic2','url'));?>" alt=""/>
						<?php endif;?>
					<?php } else{ ?>
						<span class="wr-text-logo2">
						<?php if(!empty($cooper_options['wrlogotxt2'])):?>
						<?php echo balanceTags($cooper_options['wrlogotxt2']);?>
						<?php else:?>
						<?php esc_attr_e('Cooper','cooper');?>
						<?php endif;?>								
						</span>	
					<?php } ?>		
					</a>					
					
                    <!-- menu logo end -->
                    <div class="hid-men-wrap   alt">
                        <div id="hid-men">
                            <ul class="menu">
                                <?php get_template_part('template-parts/menu-section'); ?> 
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="morph-shape" id="morph-shape" data-morph-open="M-7.312,0H15c0,0,66,113.339,66,399.5C81,664.006,15,800,15,800H-7.312V0z;M-7.312,0H100c0,0,0,113.839,0,400c0,264.506,0,400,0,400H-7.312V0z">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                        <path d="M-7.312,0H0c0,0,0,113.839,0,400c0,264.506,0,400,0,400h-7.312V0z"/>
                    </svg>
                </div>
            </div>
            <!--menu end-->
    