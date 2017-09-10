<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, 3D Printing already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
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
if($settings['blog_archive_layout_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
get_header(); ?>
<div class="container">
    <div class="row">
        <?php if($settings['blog_archive_layout_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <section id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>
            
                <?php get_template_part( 'blog-templates/blog', $settings['blog_archive_layout'] ); ?>

            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <?php if($settings['blog_archive_layout_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
