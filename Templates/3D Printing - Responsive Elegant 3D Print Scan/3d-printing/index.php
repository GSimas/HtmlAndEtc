<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

$settings = zo_get_blog_setting();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['blog_layout_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
get_header(); ?>
<div class="<?php echo $settings['blog_layout_width'];?>">
    <div class="row">
        <?php if($settings['blog_layout_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <div id="content" role="main">
                <?php if ( have_posts() ) : ?>

                    <?php get_template_part( 'blog-templates/blog', $settings['blog_layout'] ); ?>

                <?php else : ?>

                    <article id="post-0" class="post no-results not-found">

                        <?php if ( current_user_can( 'edit_posts' ) ) :
                            // Show a different message to a logged-in user who can add posts.
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php _e( 'No posts to display', '3dprinting' ); ?></h1>
                            </header>

                            <div class="entry-content">
                                <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', '3dprinting' ), admin_url( 'post-new.php' ) ); ?></p>
                            </div><!-- .entry-content -->

                        <?php else :
                            // Show the default message to everyone else.
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php _e( 'Nothing Found', '3dprinting' ); ?></h1>
                            </header>

                            <div class="entry-content">
                                <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', '3dprinting' ); ?></p>
                                <?php get_search_form(); ?>
                            </div><!-- .entry-content -->
                        <?php endif; // end current_user_can() check ?>

                    </article><!-- #post-0 -->

                <?php endif; // end have_posts() check ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <?php if($settings['blog_layout_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
