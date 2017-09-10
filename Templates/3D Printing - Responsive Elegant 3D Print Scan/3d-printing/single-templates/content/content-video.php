<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
<?php
global $template;
if( basename($template) === 'blog-classic.php') {
    $zo_image_size = 'full';
} else {
    $zo_image_size = 'zo-blog-medium';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>

        <?php echo zo_archive_video(); ?>
    <div class="zo-blog-image zo-blog-video">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail( $zo_image_size ); ?>
            <div class="overlay">
                <div class="overlay-inner">
                    <a class="play-button" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                        <i class="ion-ios-play-outline"></i>
                    </a>
                </div>
            </div>
        <?php else : ?>
            <?php echo zo_archive_video(); ?>
        <?php endif; ?>
    </div>

    <div class="zo-blog-detail">
        <h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
        <div class="zo-blog-meta"><?php zo_archive_detail(); ?></div>
        <div class="zo-blog-content">
            <?php the_excerpt();
            wp_link_pages( array(
                'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', '3dprinting' ) . '</span>',
                'after'       => '</p>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', '3dprinting' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>
        <a class="btn-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More ', '3dprinting') ?></a>
    </div>
</article>
