<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
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
<div class="<?php echo $settings['blog_layout_width'];?>">
    <div class="row">
        <?php if($settings['blog_archive_layout_sidebar'] == 'left'){?>
        <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
            <?php get_sidebar(); ?>
        </div>
        <?php }?>
        <section id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <div id="content" role="main">
            <?php if ( have_posts() ) : ?>
                <?php
                    /* Queue the first post, that way we know
                     * what author we're dealing with (if that is the case).
                     *
                     * We reset this later so we can run the loop
                     * properly with a call to rewind_posts().
                     */
                    the_post();
                ?>

                <header class="archive-header">
                    <h1 class="archive-title"><?php printf( __( 'Author Archives: %s', '3dprinting' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
                </header><!-- .archive-header -->

                <?php
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                ?>

                <?php
                // If a user has filled out their description, show a bio on their entries.
                if ( get_the_author_meta( 'description' ) ) : ?>
                <div class="author-info">
                    <div class="author-avatar">
                        <?php
                        /**
                         * Filter the author bio avatar size.
                         *
                         * @since 3D Printing 1.0
                         *
                         * @param int $size The height and width of the avatar in pixels.
                         */
                        $author_bio_avatar_size = apply_filters( 'zo_zap_author_bio_avatar_size', 68 );
                        echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                        ?>
                    </div><!-- .author-avatar -->
                    <div class="author-description">
                        <h2><?php printf( __( 'About %s', '3dprinting' ), get_the_author() ); ?></h2>
                        <p><?php the_author_meta( 'description' ); ?></p>
                    </div><!-- .author-description	-->
                </div><!-- .author-info -->
                <?php endif; ?>

                <?php /* Start the Loop */ ?>
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
