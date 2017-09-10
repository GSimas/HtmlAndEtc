<?php defined('ABSPATH') or die("No script kiddies please!");?>
<!DOCTYPE html>
<html class="no-js"  dir="ltr" <?php language_attributes(); ?>>

<head>
        <meta charset="utf-8" />
        <?php $wr_options = get_option('bionick_wp'); ?>
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
               
        <?php if(!empty($wr_options['favicon'])): ?>
        <link rel="shortcut icon" href="<?php echo esc_url(AfterSetupTheme::return_thme_option('favicon','url'));?>" type="image/x-icon" />
        <?php else:?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/includes/images/favicon.ico" />
        <?php endif;?>  

	<?php 
		if ( is_singular() && comments_open() && get_option('thread_comments') )
		  wp_enqueue_script( 'comment-reply' );
		wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>

        <!--================= loader start ================-->		
	
        <div class="loader-holder">
            <div class="loader-inner loader-vis">
                <div class="loader"></div>
            </div>
        </div>
		
        <!-- loader end -->
		
        <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->	
            <header>
			    <?php if(!empty($wr_options['logopic'])):?>
                <div class="logo-holder"><a href="<?php echo esc_url(home_url('/')); ?>" ><img src="<?php echo esc_url(AfterSetupTheme::return_thme_option('logopic','url'));?>" class="respimg" alt="Logo"></a></div>
				<?php else:?>
                <div class="logo-holder"><a href="<?php echo esc_url(home_url('/')); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/includes/images/logo.png" class="respimg" alt="Logo"></a></div>
				<?php endif;?>
                <div class="nav-button">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                </div>
            </header>
            <!-- header  end -->
            <!--=============== wrapper ===============-->	
            <div id="wrapper">
                <!--=============== content-holder ===============-->	
                <div class="content-holder scale-bg2">
                    <!--=============== navigation ===============-->
                    <div class="nav-inner isDown">
                        <div class="nav-decor nav-decor-tl"></div>
                        <div class="nav-decor nav-decor-br"></div>
                        <div class="overlay"></div>
                        <nav>
                            <?php get_template_part('template-parts/menu-section'); ?>
                        </nav>
                    </div>
                    <!-- navigation  end -->