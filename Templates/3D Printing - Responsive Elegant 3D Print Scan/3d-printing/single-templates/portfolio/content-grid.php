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
$meta_data = zo_post_meta_data();
$images = !empty($meta_data->_zo_portfolio_images) ? $meta_data->_zo_portfolio_images : '';
$image_ids = explode(',', $images);
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="intent-portfolio-default">
        <?php if(has_post_thumbnail()) : ?>
            <div class="zo-portfolio-image">
                <?php echo zo_post_thumbnail($post->ID,720,560, true, true,true);
                ?>
                <div class="portfolio-content-hover">
                    <h2 class="zo-portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full')['0'];?>" class="prettyPhoto" data-rel="prettyPhoto[pp_gal]"><img src="<?php echo get_template_directory_uri().'/assets/images/woo/car-poup.png';?>"></a>
                </div>
            </div>

        <?php endif ?>
    </div>
</article>
