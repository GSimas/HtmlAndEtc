<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

get_header(); ?>
<div class="<?php zo_main_class(); ?>">
    <div class="row">
    	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 service-sidebar">
           	<?php if ( is_active_sidebar( 'service-sidebar' ) ) : ?>
				<div id="secondary" class="secondary widget-area" role="complementary">
					<?php dynamic_sidebar( 'service-sidebar' ); ?>
				</div><!-- #secondary -->
			<?php endif; ?>
        </div>

        <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9 service-content">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="content">
                    	<?php the_content(); ?>
                    </div>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
       
    </div>
</div>
<?php get_footer(); ?>