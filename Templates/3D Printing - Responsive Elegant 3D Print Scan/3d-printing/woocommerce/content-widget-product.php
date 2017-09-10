<?php global $product; ?>
<li>
    <div class="zo-product-img">
        <?php echo $product->get_image(array(80,80)); ?>
        <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
            <img src="<?php echo get_template_directory_uri().'/assets/images/woo/links-car.png'?>">
        </a>
    </div>
    <div class="zo-product-detail">
        <h3>
            <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
                <?php echo $product->get_title(); ?>
            </a>
        </h3>

        <?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
        <?php echo $product->get_price_html(); ?>
    </div>

</li>