<?php
/**
 * Template Name: Shop No Sidebar
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */

get_header(); ?>

<?php global $product, $wp_query;
    ob_start();


global  $paged;
    $num = isset($_GET['show']) ? $_GET['show'] : get_option('posts_per_page');
    $order = isset( $_GET['orderby'] ) ? $_GET['orderby'] : 'menu_order';
    $query_args = array(
        'post_status' => 'publish',
        'meta_query'     => array(),
        'post_type'      => 'product',
        'posts_per_page' => $num,
        'paged'         => $paged,
        'meta_query'     => array(),
    );
    /*Query By Tax*/
    $brand = !empty($_GET['pa_brand']) ? $_GET['pa_brand']: 'all';
    if($brand != 'all'){
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'pa_brand',
                'field' => 'term_id',
                'terms'    => $brand
            )
        );
    }
    $wp_query = new WP_Query($query_args);

    /*Query sort*/
    switch ( $order ) {
        case 'price-desc':
            $query_args['order'] = 'desc';
            $query_args['orderby'] = '_price';
            break;
        case 'price':
            $query_args['order'] = 'asc';
            $query_args['orderby'] = '_price';
            break;
        case 'popularity':
            $query_args['order'] = 'asc';
            $query_args['orderby'] = 'total_sales';
            break;
        case 'rating':

            add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
            $query_args['no_found_rows'] = 1;
        case 'date':
            $query_args['meta_key'] = '';
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'desc';
            break;
        default:
            $query_args['meta_key'] = '';
            $query_args['orderby'] = 'menu_order title';
            $query_args['order'] = 'asc';

            break;
    }
    $wp_query->query($query_args);
    set_query_var('column',3);
?>
<div id="page-front-page">
    <div class="container woocommerce post-type-archive">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product-content none-sidebar">
                <div id="content" role="main">
                    <?php wc_print_notices(); ?>
                    <div class="product-filter">

                        <?php
                        /*--Show Categories--*/
                        zo_archive_product_sort_by_categories(3);
                        /*--Show Paging--*/
                        woocommerce_catalog_ordering();
                        unset($_COOKIE['zo_items_show']);
                        zo_archive_product_show_paging(3);
                        ?>
                        <div class="filter zo-nav-top col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <?php zo_paging_nav(); ?>
                        </div>


                    </div><!--End filter-->


                <?php if ( have_posts() ) : ?>
                    <ul class="content-detail products clearfix">
                        <?php
                            while ( have_posts() ) : the_post();
                                ob_start();
                                wc_get_template( 'woocommerce/content-product.php', array('column'=>4) );
                                $content_product = ob_get_contents();
                                ob_end_clean();
                                echo $content_product;
                            endwhile;
                        ?>

                    </ul>
                       <?php zo_paging_nav();?>
                <?php else : ?>
                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>
                <?php endif; ?>
                <?php
                    wp_reset_postdata();
                    $content = ob_get_clean();
                    echo ent2ncr( $content );
                ?>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
    </div>
</div>
<?php get_footer();