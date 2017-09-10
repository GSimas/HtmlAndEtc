<?php
/* get categories */
$taxonomy = 'category';
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
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

    <!-- Get Filter Query -->
    <?php if ( isset($atts['filter']) && $atts['filter'] == 1 ): ?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html_e("All", 'cmstheme');?></a></li>
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
                            <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
                        <?php 		}
                    }else{
                        $term = get_term($category, $taxonomy);
                        ?>
                        <li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
                        <?php
                    }
                endforeach;
                ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxonomy) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
             <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
                <ul class="archive-detail">
                    <li class="zo-blog-date"><i class="fa fa-calendar"></i><span class="show-content"><?php the_time('F d, Y');?></span></li>
                    <li class="zo-blog-views"><i class="fa fa-eye"></i><span class="show-content"><?php echo esc_html__('View','3dprinting') ?> <?php echo zo_get_count_view(); ?></span></li>
                    <li class="zo-blog-comment"><i class="fa fa-comment-o"></i><span class="show-content"><?php echo esc_html__('Comment','3dprinting')?> <a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a></span></li>
                </ul>

                    <?php
                    switch(get_post_format()) {
                        case '':
                            ?>
                                <div class="zo-blog-image zo-grid-media">
                                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                                        <?php
                                        if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                                            if ($atts['image_size'] == 'custom') {
                                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                                $attachment_full_image = $attachment_image[0];
                                                $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true);
                                                echo '<img src="' . esc_attr($image_resize) . '" alt="' . get_the_title() . '">';
                                            } else {
                                                the_post_thumbnail($atts['image_size']);
                                            }
                                        else:
                                            echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                                        endif;
                                        ?>
                                    </a>
                                </div>
                          <?php
                            $content = get_the_content();
                            break;
                        case 'video':
                           ?>
                            <div class="zo-blog-image zo-blog-video">
                                <?php echo zo_archive_video(); ?>
                            </div>
                                <?php

                             break;
                        case 'gallery':
                            ?>
                            <div class="zo-blog-image zo-grid-media  zo-blog-gallery">
                                <?php echo zo_archive_gallery( 'full'); ?>
                            </div>
                            <?php
                             break;
                        case 'audio':
                          ?>
                            <div class="zo-blog-image zo-blog-audio">
                                <?php if (has_post_thumbnail()) :
                                    if($atts['image_size']=='custom'){
                                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                        $attachment_full_image = $attachment_image[0];
                                        $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                                        echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
                                    }else{
                                        the_post_thumbnail($atts['image_size']);
                                    }
                                    ?>
                                    <div class="overlay">
                                        <div class="overlay-inner">
                                            <a class="play-button" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                                                <i class="fa fa-play"></i>
                                            </a>
                                            <?php echo zo_archive_audio(); ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <?php echo zo_archive_audio(); ?>
                                <?php endif; ?>
                            </div>
                           <?php
                            break;
                        case 'link':
                            ?>
                            <div class="zo-blog-image zo-grid-media  zo-blog-link">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <div class="overlay-link">
                                        <span class="link"><?php echo zo_archive_link(); ?></span>
                                    </div>
                                <?php else : ?>
                                    <?php echo zo_archive_link(); ?>
                                <?php endif; ?>
                            </div>
                            <?php
                            break;
                        case 'quote':
                            ?>
                            <div class="zo-blog-image zo-grid-media  zo-blog-quote">
                                <?php echo zo_archive_quote(); ?>
                            </div>
                            <?php
                            break;
                    }
                ?>
                <?php
                echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';
                if($atts['title_link']){
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                    <?php
                    echo '</' . $atts['title_element'] .'>';
                }else{
                    the_title();
                    echo '</' . $atts['title_element'] .'>';
                }?>
                <div class="zo-grid-category">
                    <span><?php esc_html_e('In', '3dprinting'); ?></span><?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?>
                </div>
                <div class="zo-grid-content">
                    <p>  <?php
                        if(is_numeric($atts['num_words'])){
                            echo wp_trim_words( get_the_excerpt(), $atts['num_words'], '...' );
                        }else{
                            echo wp_trim_words( get_the_excerpt(), 15, '...' );
                        }
                        ?><a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('[read more]','3dprinting'); ?></a></p>

                </div>
                </article>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>
