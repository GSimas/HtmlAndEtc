<?php
/*prettyphoto*/
wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js', array( 'jquery' ), '1.0.0', true);
wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '1.0.1');
?>

<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            ?>
            <div class="zo-carousel-item">
                <div class="zo-carousel-media">
                <?php
                    if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        if($atts['image_size']=='custom'){
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                            $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                            echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
                           $img_full =  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()) );
                        }else{
                            the_post_thumbnail($atts['image_size']);
                        }
                    else:
                        echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                        $img_full =  ZO_IMAGES.'no-image.jpg';
                    endif;
                ?>
                    <div class="zo-product-overlay">

                        <a data-rel="prettyPhoto" class="prettyPhoto product-zoom" href="<?php echo $img_full; ?>" ><span><?php _e('View', '3d-printing'); ?></span></a>
                        <?php
                        /**
                         * woocommerce_after_shop_loop_item hook
                         *
                         * @hooked woocommerce_template_loop_add_to_cart - 10
                         */
                        do_action( 'woocommerce_after_shop_loop_item' );
                        ?>
                        <a href="<?php the_permalink(); ?>" class="product-view"><span><?php _e('Links', '3dprinting'); ?></span></a>

                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        /*  prettyPhoto  */
        jQuery("[class ^='prettyPhoto']").prettyPhoto({
            allow_resize: true,
            default_width: 800,
            default_height: 600,
            horizontal_padding: 20
        });
    })
</script>
