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
    <div class="row intent-portfolio-gallery">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?php if(has_post_thumbnail()) : ?>
                <div class="zo-portfolio-image">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
            <?php endif ?>
            <div class="zo-portfolio-detail">
                <div class="zo-portfolio-title">
                    <h2><label><?php _e('Project:', '3dprinting'); ?></label><?php the_title(); ?></h2>
                </div>
                <div class="portfolio-client">
                    <p><label><?php _e('Client:', '3dprinting'); ?></label><?php echo esc_attr($meta_data->_zo_portfolio_client) ?></p>
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div id="portfolio-gallery-<?php the_ID(); ?>" class="zo-slick">
                <?php foreach ($image_ids as $image_id) : ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):
                    ?>
                        <div>
                            <img src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</article>
