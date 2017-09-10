
<?php
/* Start the Loop */
global $smof_data;

while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-large'); ?>>
        <div class="zo-blog-media">
        <?php
        switch(get_post_format()){
            case '':
                if(!empty($smof_data['blog_post_feature_media']) && has_post_thumbnail()){?>
                    <div class="zo-blog-image">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                        <?php if(!empty($smof_data['blog_post_author']) || !empty($smof_data['blog_post_categories'])){?>
                            <ul class="zo-blog-data">
                                 <?php if(!empty($smof_data['blog_post_author'])){?>
                                    <li class="zo-blog-author">
                                        <?php _e('By ', '3dprinting'); ?> <?php the_author_posts_link(); ?>
                                    </li>
                                <?php }?>
                                <?php if(!empty($smof_data['blog_post_categories'])){?>
                                    <?php if(has_category()): ?>
                                <li class="zo-blog-category">
                                    <?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                                </li>
                                  <?php endif; ?>
                                <?php }?>
                            </ul>
                        <?php }?>
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
                    ?>
                    <?php if(!empty($smof_data['blog_post_author']) || !empty($smof_data['blog_post_categories'])){?>
                        <ul class="zo-blog-data">
                             <?php if(!empty($smof_data['blog_post_author'])){?>
                                <li class="zo-blog-author">
                                    <?php _e('By ', '3dprinting'); ?> <?php the_author_posts_link(); ?>
                                </li>
                            <?php }?>
                            <?php if(!empty($smof_data['blog_post_categories'])){?>
                                <?php if(has_category()): ?>
                            <li class="zo-blog-category">
                                <?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                            </li>
                              <?php endif; ?>
                            <?php }?>
                        </ul>
                    <?php }?>
                    <?php
                    echo '</div>';
                }
                break;
            case 'audio':

                if(has_post_thumbnail()) {
                    echo '<div class="zo-blog-audio zo-image-media">';
                    ?>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                    <?php if(!empty($smof_data['blog_post_author']) || !empty($smof_data['blog_post_categories'])){?>
                        <ul class="zo-blog-data">
                             <?php if(!empty($smof_data['blog_post_author'])){?>
                                <li class="zo-blog-author">
                                    <?php _e('By ', '3dprinting'); ?> <?php the_author_posts_link(); ?>
                                </li>
                            <?php }?>
                            <?php if(!empty($smof_data['blog_post_categories'])){?>
                                <?php if(has_category()): ?>
                            <li class="zo-blog-category">
                                <?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                            </li>
                              <?php endif; ?>
                            <?php }?>
                        </ul>
                    <?php }?>
                    <?php

                }
                else {
                    echo '<div class="zo-blog-audio">';

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

                if(has_post_thumbnail()) {
                    echo '<div class="zo-blog-quote zo-image-media">';
                    ?>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                    <?php if(!empty($smof_data['blog_post_author']) || !empty($smof_data['blog_post_categories'])){?>
                        <ul class="zo-blog-data">
                             <?php if(!empty($smof_data['blog_post_author'])){?>
                                <li class="zo-blog-author">
                                    <?php _e('By ', '3dprinting'); ?> <?php the_author_posts_link(); ?>
                                </li>
                            <?php }?>
                            <?php if(!empty($smof_data['blog_post_categories'])){?>
                                <?php if(has_category()): ?>
                            <li class="zo-blog-category">
                                <?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                            </li>
                              <?php endif; ?>
                            <?php }?>
                        </ul>
                    <?php }?>
                    <?php

                }
                else {
                    echo '<div class="zo-blog-quote">';

                }
                echo zo_archive_quote();
                echo '</div>';
                break;
        }?>
        </div>
        <div class="zo-blog-detail">

            <?php if(!empty($smof_data['blog_post_title'])){?>
            <h3 class="zo-blog-title">
                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
            </h3>
            <?php }?>
            <div class="zo-blog-meta">
                <ul>

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
                    <?php if(!empty($smof_data['blog_post_comment'])){?>
                        <li class="zo-blog-comment">
                            <a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a><?php echo esc_html__(' Comments', '3dprinting'); ?>
                        </li>
                    <?php }?>

                    <?php if(has_tag() && !empty($smof_data['blog_post_tags'])){ ?>
                        <li class="zo-blog-tag"><?php the_tags('', ', ' ); ?></li>
                    <?php } ?>

                </ul>
            </div>
            <div class="zo-blog-content">
                <?php
                if(get_post_type( get_the_ID() ) != 'page'):
                    the_excerpt();
                endif;
                ?>
            </div>
            <div class="zo-blog-link row">
                <div class="zo-blog-readmore col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if(!empty($smof_data['blog_post_readmore'])){?>
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                        <?php if(!empty($smof_data['blog_post_readmore_text']))
                                echo esc_attr($smof_data['blog_post_readmore_text']);
                            else
                                echo esc_html__('[Read more]', '3dprinting'); ?>
                    </a>
                    <?php }?>
                </div>
                <div class="zo-blog-social col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <?php if(!empty($smof_data['blog_post_social'])){?>
                        <?php zo_social_share(); ?>
                    <?php }?>
                </div>
            </div>
        </div>
    </article>
<?php
endwhile;

zo_paging_nav();
?>
