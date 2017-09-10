<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, 3D Printing already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$settings = zo_get_portfolio_archive_setting();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['portfolio_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
get_header(); ?>
<div class="container">
    <div class="row">
        <?php if($settings['portfolio_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <section id="primary" class="col-xs-12 col-sm-<?php echo $content_size;?> col-md-<?php echo $content_size;?> col-lg-<?php echo $content_size;?>">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>
                    <?php
                    while ( have_posts() ) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-medium'); ?>>
                            <div class="row">
                                <div class="zo-blog-media col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <?php
                                if(!empty($settings['portfolio_media']) && has_post_thumbnail()){?>
                                    <div class="zo-blog-image">
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                                    </div>
                                <?php }?>
                                </div>
                                <div class="zo-blog-detail col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <?php if(!empty($settings['portfolio_title'])){?>
                                    <h2 class="zo-blog-title">
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                                    </h2>
                                    <?php }?>

                                    <div class="zo-blog-content">
                                        <?php
                                        if(get_post_type( get_the_ID() ) != 'page'):
                                            the_excerpt();
                                        endif;
                                        ?>
                                    </div>
                                    <div class="zo-blog-link">
                                        <div class="zo-blog-readmore col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                                                <?php echo esc_html__('Read More', '3dprinting'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="zo-blog-meta">
                                <ul>
                                    <?php if(!empty($settings['portfolio_author'])){?>
                                        <li class="zo-blog-author">
                                            <?php the_author_link(); ?>
                                        </li>
                                    <?php }?>
                                    <?php if(!empty($settings['portfolio_date'])){?>
                                        <li class="zo-blog-date">
                                            <?php
                                            $date_format = 'M.d, Y';
                                            if(!empty($settings['portfolio_date_format'])){
                                                $date_format = $settings['portfolio_date_format'];
                                            }
                                            echo get_the_date($date_format); ?>
                                        </li>
                                    <?php }?>
                                    <?php if(!empty($settings['portfolio_categories'])){?>
                                        <li class="zo-blog-category">
                                            <?php the_terms( get_the_ID(), 'portfolio-category', '', ', ' ); ?>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </article>
                    <?php
                    endwhile;
                    zo_paging_nav();
                    ?>
            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <?php if($settings['portfolio_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo $sidebar_size;?> col-md-<?php echo $sidebar_size;?> col-lg-<?php echo $sidebar_size;?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
