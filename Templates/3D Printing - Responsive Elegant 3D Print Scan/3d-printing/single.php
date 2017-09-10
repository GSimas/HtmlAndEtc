<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$settings = zo_get_blog_single_setting();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['blog_single_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
get_header(); ?>
<div class="<?php echo $settings['blog_single_width'];?>">
    <div class="row">
        <?php if($settings['blog_single_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser zo-blog-single'); ?>>
                <div class="zo-blog-media">
                <?php while ( have_posts() ) : the_post();
                    $content = '';
                    switch(get_post_format()){
                        case '':
                            if(!empty($settings['blog_single_media']) && has_post_thumbnail()){
                                echo '<div class="zo-blog-image">';
                                the_post_thumbnail(  'full' );
                                ?>
                                <?php if( !empty($settings['blog_single_author']) || !empty($settings['blog_single_categories'])){?>
                                <ul class="zo-blog-data">
                                    <?php if( !empty($settings['blog_single_author'])) {?>
                                    <li class="zo-blog-author"><?php _e('By ', '3d-printing'); ?> <?php the_author_posts_link(); ?></li>
                                    <?php }?>
                                    <?php if(has_category() && !empty($settings['blog_single_categories'])): ?>
                                        <li class="zo-blog-category"><?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <?php } ?>
                                <?php
                                echo '</div>';
                            }
                            $content = get_the_content();
                            break;
                        case 'video':
                            if(!empty($settings['blog_single_media'])){
                                echo '<div class="zo-blog-video">';
                                echo zo_archive_video();
                                echo '</div>';
                            }
                            $content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content(), 1));
                            break;
                        case 'gallery':
                            if(!empty($settings['blog_single_media'])){
                                echo '<div class="zo-blog-gallery">';
                                echo zo_archive_gallery('full');
                                ?>
                                <?php if( !empty($settings['blog_single_author']) || !empty($settings['blog_single_categories'])){?>
                                <ul class="zo-blog-data">
                                    <?php if( !empty($settings['blog_single_author'])) {?>
                                    <li class="zo-blog-author"><?php _e('By ', '3d-printing'); ?> <?php the_author_posts_link(); ?></li>
                                    <?php }?>
                                    <?php if(has_category() && !empty($settings['blog_single_categories'])): ?>
                                        <li class="zo-blog-category"><?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <?php } ?>
                                <?php
                                echo '</div>';
                            }
                            $content = apply_filters('the_content', preg_replace('/\[gallery.*ids=.(.*).\]/', '', get_the_content()));
                            break;
                        case 'audio':
                            echo '<div class="zo-blog-audio">';
                            // Check image
                            if(has_post_thumbnail()) {
                                echo '<div class="zo-blog-audio zo-image-media">';
                               ?>
                                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                                <?php if( !empty($settings['blog_single_author']) || !empty($settings['blog_single_categories'])){?>
                                <ul class="zo-blog-data">
                                    <?php if( !empty($settings['blog_single_author'])) {?>
                                    <li class="zo-blog-author"><?php _e('By ', '3d-printing'); ?> <?php the_author_posts_link(); ?></li>
                                    <?php }?>
                                    <?php if(has_category() && !empty($settings['blog_single_categories'])): ?>
                                        <li class="zo-blog-category"><?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <?php } ?>
                            <?php
                            }
                            else {
                                echo '<div class="zo-blog-audio">';
                            }
                            echo zo_archive_audio();
                            echo '</div>';
                            $content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[audio(.*)](.*)\[\/audio\]/'), '', get_the_content(), 1));
                            break;
                        case 'link':
                            echo '<div class="zo-blog-link">';
                            echo zo_archive_link();
                            echo '</div>';
                            $content = apply_filters('the_content', preg_replace('/<a(.*)href=\"(.*)\"(.*)<\/a>/', '', get_the_content()));
                            break;
                        case 'quote':
                            if(has_post_thumbnail()) {
                                echo '<div class="zo-blog-quote zo-image-media">';
                                ?>
                                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                                <?php if( !empty($settings['blog_single_author']) || !empty($settings['blog_single_categories'])){?>
                                <ul class="zo-blog-data">
                                    <?php if( !empty($settings['blog_single_author'])) {?>
                                    <li class="zo-blog-author"><?php _e('By ', '3d-printing'); ?> <?php the_author_posts_link(); ?></li>
                                    <?php }?>
                                    <?php if(has_category() && !empty($settings['blog_single_categories'])): ?>
                                        <li class="zo-blog-category"><?php _e('In ', '3d-printing'); ?><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></li>
                                    <?php endif; ?>
                                </ul>
                                <?php } ?>
                                <?php

                            }
                            else {
                                echo '<div class="zo-blog-quote">';

                            }
                             echo zo_archive_quote();
                            echo '</div>';
                            $content = apply_filters('the_content', preg_replace('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));
                            break;
                    }?>
                    </div>
                    <div class="zo-blog-detail">
                    <?php if(!empty($settings['blog_single_title'])){?>
                        <h3 class="zo-blog-title">
                            <?php the_title(); ?>
                        </h3>
                    <?php }?>
                    <?php if( !empty($settings['blog_single_date']) || !empty($settings['blog_single_tags'])){?>
                        <div class="zo-blog-meta">
                            <ul>
                                <?php if(!empty($settings['blog_single_date'])){?>
                                    <li class="zo-blog-date">
                                        <?php
                                        $date_format = 'M.d, Y';
                                        if(!empty($settings['blog_single_date_format'])){
                                            $date_format = $settings['blog_single_date_format'];
                                        }
                                        echo get_the_date($date_format); ?>
                                    </li>
                                <?php }?>

                                <?php if(!empty($settings['blog_single_comment'])){ ?>
                                    <li class="zo-blog-comment">
                                        <a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a><?php echo esc_html__(' Comments', '3dprinting'); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php }?>
                    <div class="zo-blog-content">
                        <?php if(empty(get_post_format())){
                            the_content();}else{
                            echo $content;
                        }?>
                    </div>
                    </div><!--End detail-->
                    <div class="zo-blog-link row">
                      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  zo-blog-tags">
                          <?php if(has_tag() && !empty($settings['blog_single_tags'])){ ?>
                              <li class="zo-blog-tag"><?php the_tags('', '' ); ?></li>
                          <?php } ?>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  social-share">
                          <?php if(!empty($settings['blog_single_social'])){?>
                              <?php zo_social_share(); ?>
                          <?php }?>
                      </div>

                     </div>

                    <?php if(!empty($settings['blog_single_pagination'])){
                        zo_post_nav();
                    }?>

                    <?php if(!empty($settings['blog_single_author'])){?>
                        <div class="zo-author-about clearfix">
                            <div class="zo-author-avatar">
                                <?php echo get_avatar( $post->ID, 70 ); ?>
                            </div>
                            <div class="zo-author-info">
                                <div class="zo-header-author">
                                    <h2 class="zo-author-info-name">
                                        <?php the_author_posts_link();?>
                                    </h2>
                                    <ul class="social-author-lists">
                                        <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
                                            <li class="box"><a href="<?php if(!empty(the_author_meta( 'facebook' ))){ echo esc_url(the_author_meta( 'facebook' )); }?>" title="<?php _e('Follow', '3dprinting');?> <?php the_author_meta( 'display_name' ); ?> <?php _e('on Facebook', '3dprinting');?>"><i class="fa fa-facebook"></i></a></li>
                                        <?php endif; ?>
                                        <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
                                            <li class="box"><a href="<?php if(!empty(the_author_meta( 'twitter' ))){ echo esc_url(the_author_meta( 'twitter' )); }?>" title="<?php _e('Follow', '3dprinting');?> <?php the_author_meta( 'display_name' ); ?> <?php _e('on Twitter', '3dprinting');?>"><i class="fa fa-twitter"></i></a></li>
                                        <?php endif; ?>
                                        <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
                                            <li class="box"><a href="<?php if(!empty(the_author_meta( 'linkedin' ))){ echo esc_url(the_author_meta( 'linkedin' )); }?>" title="<?php _e('Follow', '3dprinting');?> <?php the_author_meta( 'display_name' ); ?> <?php _e('on Linkedin', '3dprinting');?>"><i class="fa fa-linkedin"></i></a></li>
                                        <?php endif; ?>
                                        <?php if ( get_the_author_meta( 'google' ) ) : ?>
                                            <li class="box"><a href="<?php if(!empty(the_author_meta( 'google' ))){ echo esc_url(the_author_meta( 'google' )); }?>" title="<?php _e('Follow', '3dprinting');?> <?php the_author_meta( 'display_name' ); ?> <?php _e('on Google +', '3dprinting');?>"><i class="fa fa-google-plus"></i></a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                                <div class="zo-author-description">
                                    <?php echo get_the_author_meta( 'description'); ?>
                                </div>
                            </div>
                        </div>

                    <?php }?>
                    <?php if(!empty($settings['blog_single_comment'])){
                        comments_template( '', true );
                    }?>

                <?php endwhile; // end of the loop. ?>
            </article><!-- #content -->
        </div><!-- #primary -->
        <?php if($settings['blog_single_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
