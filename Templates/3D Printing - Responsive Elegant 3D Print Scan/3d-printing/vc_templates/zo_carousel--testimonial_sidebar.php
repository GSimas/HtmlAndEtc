<?php
/* Get Categories */
$taxonomy = 'testimonial-category';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;
$layouts = isset( $atts['testimonial_layout'] ) ? $atts['testimonial_layout'] : 'default';
?>
<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); echo 'testimonial-'.$layouts; ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];

        if( $layouts == 'default' ) {
            while ($posts->have_posts()) :
                $posts->the_post();
                $groups = array();
                $groups[] = 'zo-carousel-filter-item all';
                foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                    $groups[] = 'category-' . $category->slug;
                }
                $post_meta = zo_post_meta_data();
                ?>
                <div class="zo-carousel-item <?php echo implode(' ', $groups);?> layout-default">
                	<div class="zo-carousel-testimonial-content">
                		<p><?php echo '"'. get_the_content() . '"'; ?></p>
                	</div>
                    <div class="zo-carousel-testimonial-title">
                        <div class="testimonial-image">
                            <?php if(has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            <?php endif ?>
                        </div>
                        <div class="title-content">
                            <h3><?php the_title();?></h3>
                            <?php $country = isset( $post_meta->_zo_testimonial_country ) ? $post_meta->_zo_testimonial_country : '';?>
                                  <h4><?php _e('From ', '3dprinting'); echo esc_attr( $country );?></h4>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        } else {
            while ($posts->have_posts()) :
                $posts->the_post();
                $groups = array();
                $groups[] = 'zo-carousel-filter-item all';
                foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
                    $groups[] = 'category-' . $category->slug;
                }
                $post_meta = zo_post_meta_data();
                ?>
                <div class="zo-carousel-item <?php echo implode(' ', $groups);?> layout-1">
                    <div class="zo-carousel-testimonial-title">
                        <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        <?php endif ?>

                        <h3><?php the_title();?> - </h3>
                        <?php $country = isset( $post_meta->_zo_testimonial_country ) ? $post_meta->_zo_testimonial_country : '';?>
                                  <h4><?php _e('From ', '3dprinting'); echo esc_attr( $country );?></h4>
                    </div>

                    <div class="zo-carousel-testimonial-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php
            endwhile;
        }
        wp_reset_postdata();
        ?>
    </div>
</div>
