<?php
/**
 * The template for displaying Search Results pages
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$settings = zo_get_blog_search();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['blog_search_layout_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
get_header(); ?>
<div class="<?php echo $settings['blog_layout_width'];?>">
    <div class="row">
        <?php if($settings['blog_search_layout_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <section id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>

                <?php get_template_part( 'blog-templates/blog', $settings['blog_search_layout'] ); ?>

            <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', '3dprinting' ); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', '3dprinting' ); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <?php if($settings['blog_search_layout_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
