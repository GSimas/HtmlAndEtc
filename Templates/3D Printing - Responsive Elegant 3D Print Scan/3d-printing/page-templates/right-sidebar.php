<?php
/**
 * Template Name: Right Sidebar
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */

get_header(); ?>
<div id="page-right-sidebar">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div id="content" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'single-templates/content', 'page' ); ?>
                        <?php comments_template( '', true ); ?>
                    <?php endwhile; // end of the loop. ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>