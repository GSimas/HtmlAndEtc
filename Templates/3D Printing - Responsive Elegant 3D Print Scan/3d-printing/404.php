<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php zo_get_page_loading(); ?>
<div id="page">
	<div id="main">
		<div id="primary" class="site-content">
			<div id="content" role="main" class="container">

				<article id="post-0" class="entry-error404 no-results not-found">
					<header class="entry-header">
						<img src="<?php print get_template_directory_uri(); ?>/assets/images/direction.png" alt="<?php _e('404 Page Not Found', '3dprinting'); ?>" />
						<h1><?php _e('404', '3dprinting'); ?></h1>
						<h2><?php _e('PAGE NOT FOUND', '3dprinting'); ?></h2>
					</header>

					<div class="entry-content">
						<p><?php _e('Whoops, sorry, this page does not exist.', '3dprinting'); ?></p>
					</div><!-- .entry-content -->
					
					<footer class="entry-footer">
						<a class="btn btn-white btn-home" href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Go Back Home', '3dprinting'); ?></a>
					</footer>
				</article><!-- #post-0 -->

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #main -->
</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>