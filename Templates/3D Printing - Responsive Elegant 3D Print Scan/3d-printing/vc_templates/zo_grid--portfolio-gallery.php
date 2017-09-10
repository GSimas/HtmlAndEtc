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
                <div class="zo-grid-media">
                <?php
                    $attachment_full_image='';
                    if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        $attachment_full_image = $attachment_image[0];
                        if($atts['image_size']=='custom'){
                            $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                            echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
                        }else{
                            the_post_thumbnail($atts['image_size']);
                        }
                    else:
                        echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
                    endif;
                if(!empty($attachment_full_image)){
                ?>
                <a class="zo-grid-pretty" href="<?php echo esc_url($attachment_full_image); ?>" rel="prettyPhoto[pp_gal]">
                    <i class="fa fa-search-plus"></i>
                </a>
                <?php }?>
                </div>
                <?php
                echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';?>
                <?php  if($atts['title_link']){ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                <?php
					echo '</' . $atts['title_element'] .'>';
				}else{
					the_title();
					echo '</' . $atts['title_element'] .'>';
				}?>
            </div>
            <?php
        }
        ?>
    </div>

	<?php if(isset($atts['pagination']) && $atts['pagination']) {?>
		<nav class="navigation paging-navigation clearfix" role="navigation">
				<div class="pagination loop-pagination">
					<?php print($atts['pagination']); ?>
				</div><!-- .pagination -->
		</nav><!-- .navigation -->
	<?php }?>

    <?php
    wp_reset_postdata();
    ?>
</div>
<?php
// Note: create custom-style.css in folder assets/css/
wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
$gap = (int) $atts['item_gap'];
$gap_left_right = $gap / 2;
$custom_css = '
	#'. esc_attr($atts['html_id']) .' .zo-grid .zo-grid-item {
		padding-left: '. esc_attr($gap_left_right) .'px;
		padding-right: '. esc_attr($gap_left_right) .'px;
		margin-bottom: '. esc_attr($gap) .'px;
	}
';
if($gap == 0) {
	$custom_css .= '
		#'. esc_attr($atts['html_id']) . '.container {
			padding-left: 15px;
			padding-right: 15px;
		}
	';
};
wp_add_inline_style( 'custom-style', $custom_css );
?>
