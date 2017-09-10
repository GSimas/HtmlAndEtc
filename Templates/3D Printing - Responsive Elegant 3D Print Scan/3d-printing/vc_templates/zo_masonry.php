<?php 
    /* get categories */
    $taxonomy = 'portfolio-category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
    /*Hock JS Plugin*/
    // shuffle
    // masonry
    wp_deregister_script('zo-masonry-custom');
    wp_register_script('zo-masonry-custom', get_template_directory_uri() . '/assets/js/zo.masonry.js', array( 'jquery'), '1.0.0', true);
    wp_enqueue_script('zo-masonry-custom');
?>
<div class="zo-masonry-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

	<?php if ( isset($atts['filter']) && $atts['filter'] == 1 ): ?>
        <div class="zo-masonry-filter row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="zo-grid-filter clearfix zo-filter-category list-unstyled list-inline">
                    <span><?php echo esc_html__('Sort by','3d-printing'); ?></span>
                    <select class="zo-filter-category list-unstyled list-inline">
                        <option data-group="all"><?php esc_html_e("All", '3d-printing');?></option>
                        <?php
                        $posts = $atts['posts'];
                        $query = $posts->query;
                        $taxs  = array();
                        if(isset($query['tax_query'])){
                            $tax_query=$query['tax_query'];
                            foreach($tax_query as $tax){
                                if(is_array($tax)){
                                    $taxs[] = $tax['terms'];
                                }
                            }
                        }
                        foreach ($atts['categories'] as $category):
                            if(!empty($taxs)){
                                if(in_array($category,$taxs)) {
                                    $term = get_term($category, $taxonomy);
                                    ?>
                                    <option data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></option>
                                <?php 		}
                            }else{
                                $term = get_term($category, $taxonomy);
                                ?>
                                <option data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></option>
                                <?php
                            }
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="zo-grid-filter clearfix">
                    <span><?php echo esc_html__('Sort by','3dprinting'); ?></span>
                    <select name="order" class="zo-filter-order list-unstyled list-inline">
                        <option value=""><?php echo esc_html__('Default','3dprinting');  ?></option>
                        <option value="order-newest"><?php echo esc_html__('Newest','3dprinting');?></option>
                        <option value="order-title"><?php echo esc_html__('Title','3dprinting');?></option>
                    </select>
                </div>
            </div>
        </div>
    <?php endif; ?>
	
    <div class="row zo-masonry">
        <?php
        $posts = $atts['posts'];
        $i = 0;
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            /**
             * Get Masonry Size
             * It's require, don't remove it
             * zo_masonry_size()
             */
            $size = zo_masonry_size($atts['post_id'] , $atts['html_id'], $i);
            ?>
            <div class="zo-masonry-item item-w<?php echo esc_attr($size['width']); ?> item-h<?php echo esc_attr($size['height']); ?>"
                 data-groups='[<?php echo implode(',', $groups);?>]' data-index="<?php echo esc_attr($i); ?>" data-id="<?php echo esc_attr($atts['post_id']); ?>" data-order-newest='<?php the_date(); ?>' data-order-title='<?php the_title(); ?>'>
                <?php
                if(has_post_thumbnail()):
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    $thumbnail = $thumbnail[0];
                else:
                    $thumbnail = ZO_IMAGES.'no-image.jpg';
                endif;

                ?>
                <div class="zo-masonry-inner" style="background-image: url('<?php echo esc_url($thumbnail); ?>')">
                    <div class="portfolio-content-hover">
                        <h2 class="zo-portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'full')['0'];?>" class="prettyPhoto" data-rel="prettyPhoto[pp_gal]"><img src="<?php echo get_template_directory_uri().'/assets/images/woo/car-poup.png';?>"></a>
                    </div>

                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>