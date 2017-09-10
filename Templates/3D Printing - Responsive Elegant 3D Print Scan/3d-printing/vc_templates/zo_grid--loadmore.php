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
        wp_deregister_script('zo-grid-shuffle');
        wp_register_script('zo-grid-shuffle', get_template_directory_uri() . '/assets/js/jquery.shuffle.zo.js', array( 'jquery'), '1.0.0', true);
        wp_enqueue_script('zo-grid-shuffle');
?>
<div class="zo-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
	<?php if (isset($atts['filter']) && $atts['filter'] == 1 && $atts['layout'] == 'masonry'): ?>
        <div class="zo-filter-wrapper clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="zo-grid-filter clearfix">
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
        </div><!-- End Filter Wrapper -->
    <?php endif; ?>
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
        /*===== Loadmore masonry =========*/

        $posts = $atts['posts'];
        $layout = isset( $atts['layout'] ) ? $atts['layout'] : 'basic';
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
        $zo_loadmore = array(
            'posts'  => $atts['posts']->query,
            'atts'   => array(
                'layout'         => $layout,
                'item_class'     => $atts['item_class'],
                'paged'          => $paged,
                'post_count'     => $posts->post_count,
                'max_num_pages'  => $posts->max_num_pages,
                'found_posts'    => $posts->found_posts,
            ),
        );
        // Call Script
        wp_enqueue_script('mediaelement');
        wp_enqueue_style('mediaelement');
        wp_register_script( 'zo-load-more-js', get_template_directory_uri().'/assets/js/zo_loadmore.js', array('jquery') ,'1.0',true);
        $atts           = $zo_loadmore['atts'];
        $layout         = ($atts['layout']=='masonry') ? 'masonry' : 'basic';
        $adminajax      = admin_url('admin-ajax.php');

        if($atts['layout']=='masonry'){
            $zo_masonry                 = $zo_loadmore['posts'];
            $zo_masonry['item_class']   = $atts['item_class'];
        }
        else {
            $zo_masonry = '';
        }

        wp_localize_script(
            'zo-load-more-js',
            'zo_more_obj',
            array(
                'startPage'     => $atts['paged'],
                'maxPages'      => $atts['max_num_pages'],
                'total'         => $atts['found_posts'],
                'perpage'       => $atts['post_count'],
                'nextLink'      => next_posts($atts['max_num_pages'], false),
                'ajaxType'      => 'Button',
                'masonry'       => $layout,
                'ajaxurl'       => $adminajax,
                'zo_masonry'    => $zo_masonry,
            )
        );
        wp_enqueue_script( 'zo-load-more-js');

        /*==== End Loadmore ===*/

        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]' data-order-newest='<?php the_date(); ?>' data-order-title='<?php the_title(); ?>'>
                <?php get_template_part( 'single-templates/portfolio/content', 'grid' ); ?>
             </div>
            <?php
        }
        ?>
    </div>
    <div class="zo_items_loadmore"></div>
    <div class="zo_pagination"></div>
    <?php
    wp_reset_postdata();
    ?>
</div>