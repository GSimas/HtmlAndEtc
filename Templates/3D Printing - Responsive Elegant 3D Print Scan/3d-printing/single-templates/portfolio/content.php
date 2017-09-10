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
        <div class="media-image">
            <?php if(has_post_thumbnail()) : ?>
                <div class="zo-portfolio-image">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
            <?php endif ?>
        </div>
        <div class="zo-portfolio-detail">
                <div class="zo-portfolio-title">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="portfolio-client">
                    <p><label><?php _e('Client:', '3dprinting'); ?></label>
                        <?php echo esc_attr($meta_data->_zo_portfolio_client) ?>
                    </p>
                </div>
                <div class="portfolio-date">
                    <p><label><?php _e('Date:', '3dprinting'); ?></label><?php echo mysql2date('M d Y', $meta_data->_zo_portfolio_date) ?></p>
                </div>
                <div class="zo-portfolio-content">
                    <label><?php _e('Description:', '3dprinting'); ?></label>
                    <?php the_content();
                    ?>
                </div>
            </div>
    </div>
</article>
