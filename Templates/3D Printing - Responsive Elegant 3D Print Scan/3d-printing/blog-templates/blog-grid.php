
<?php
/* Start the Loop */
global $smof_data;
$cols = 3;
$count = 3;
$container_class = '';
$blog_layout = '';
if(is_search()){
    if(!empty($smof_data['blog_search_layout_grid'])){
        $count = (int)$smof_data['blog_search_layout_grid'];
    }
    if(!empty($smof_data['blog_search_layout_grid_masonry'])) {
        $blog_layout = 'zo-grid-masonry';
    }
}elseif(is_archive()){
    if(!empty($smof_data['blog_archive_layout_grid'])){
        $count = (int)$smof_data['blog_archive_layout_grid'];
    }
    if(!empty($smof_data['blog_archive_layout_grid_masonry'])) {
        $blog_layout = 'zo-grid-masonry';
    }
}else{
    if(!empty($smof_data['blog_layout_grid'])){
        $count = (int)$smof_data['blog_layout_grid'];
    }
    if(!empty($smof_data['blog_layout_grid_masonry'])) {
        $blog_layout = 'zo-grid-masonry';
    }
}
if(!empty($blog_layout)){
    wp_enqueue_script('zo-jquery-shuffle');
}

$cols = 12/$count;
$container_class .= "zo-lg-" . $count . "cols";
$container_class .= " zo-md-" . $count . "cols";
$container_class .= " zo-sm-2cols zo-xs-1cols";

$class = 'col-sm-6 col-xs-12';
$class .= ' col-lg-' . $cols;
$class .= ' col-md-' . $cols;
?>
<div id="zo-blog-grid" class="<?php echo $container_class . ' ' . $blog_layout;?> row">
    <?php
    while ( have_posts() ) : the_post();?>
        <div class="zo-grid-item <?php echo $class;?>">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-grid'); ?>>
                <div class="zo-blog-media">
                <?php
                switch(get_post_format()){
                    case '':
                        if(!empty($smof_data['blog_post_feature_media']) && has_post_thumbnail()){?>
                            <div class="zo-blog-image">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                            </div>
                        <?php }
                        break;
                    case 'video':
                        if(!empty($smof_data['blog_post_feature_media'])){
                            echo '<div class="zo-blog-video">';
                            echo zo_archive_video();
                            echo '</div>';
                        }
                        break;
                    case 'gallery':
                        if(!empty($smof_data['blog_post_feature_media'])){
                            echo '<div class="zo-blog-gallery">';
                            echo zo_archive_gallery('full');
                            echo '</div>';
                        }
                        break;
                    case 'audio':
                        echo '<div class="zo-blog-audio">';
                        if(has_post_thumbnail()) {
                            ?>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                            <?php
                        }
                        echo zo_archive_audio();
                        echo '</div>';
                        break;
                    case 'link':
                        echo '<div class="zo-blog-link">';
                        echo zo_archive_link();
                        echo '</div>';
                        break;
                    case 'quote':
                        echo '<div class="zo-blog-quote">';
                        if(has_post_thumbnail()) {
                            ?>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                            <?php
                        }
                        echo zo_archive_quote();
                        echo '</div>';
                        break;
                }?>
                </div>
                <div class="zo-blog-detail">
                    <div class="zo-blog-meta">
                        <ul>
                            <?php if(!empty($smof_data['blog_post_author'])){?>
                            <li class="zo-blog-author">
                                <?php the_author_link(); ?>
                            </li>
                            <?php }?>
                            <?php if(!empty($smof_data['blog_post_date'])){?>
                            <li class="zo-blog-date">
                                <?php
                                    $date_format = 'M.d, Y';
                                    if(!empty($smof_data['blog_post_date_format'])){
                                        $date_format = $smof_data['blog_post_date_format'];
                                    }
                                    echo get_the_date($date_format); ?>
                            </li>
                            <?php }?>
                            <?php if(!empty($smof_data['blog_post_categories'])){?>
                            <li class="zo-blog-category">
                                <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                            </li>
                            <?php }?>
                            <?php if(has_tag() && !empty($smof_data['blog_post_tags'])){ ?>
                                <li class="zo-blog-tag"><?php the_tags('', ', ' ); ?></li>
                            <?php } ?>
                            <?php if(!empty($smof_data['blog_post_comment'])){?>
                            <li class="zo-blog-comment">
                                <a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a><?php echo esc_html__(' Comments', '3dprinting'); ?>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <?php if(!empty($smof_data['blog_post_title'])){?>
                    <h3 class="zo-blog-title">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                    </h3>
                    <?php }?>
                    <div class="zo-blog-content">
                        <?php
                        if(get_post_type( get_the_ID() ) != 'page'):
                            the_excerpt();
                        endif;
                        ?>
                    </div>
                    <div class="zo-blog-link row">
                        <div class="zo-blog-social col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <?php if(!empty($smof_data['blog_post_social'])){?>
                                <?php zo_social_share(); ?>
                            <?php }?>
                        </div>
                        <div class="zo-blog-readmore col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <?php if(!empty($smof_data['blog_post_readmore'])){?>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                                <?php if(!empty($smof_data['blog_post_readmore_text']))
                                        echo esc_attr($smof_data['blog_post_readmore_text']);
                                    else
                                        echo esc_html__('Read More', '3dprinting'); ?>
                            </a>
                            <?php }?>
                        </div>

                    </div>
                </div>
            </article>
        </div>
    <?php
    endwhile;
?>
</div>
<?php zo_paging_nav(); ?>
