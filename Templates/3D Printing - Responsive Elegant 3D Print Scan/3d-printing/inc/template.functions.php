<?php
/**
 * Page title template
 * @since 1.0.0
 * @author ZoTheme
 */
/* Set Variable For Scss */
function zo_setvariablescss($var, $output, $var_default, $var_empty = null) {
	if(trim($var_empty) == null || trim($var_empty) == '') $var_empty = $var_default;
    $var = isset($var) ? (empty($var) ? $var_empty : esc_attr($var)) : $var_default;
    echo do_shortcode($output . ':' . $var . ';'). "\n";
}

//Load header top contact
function zo_header_top_contact($contact = array()){
    ?>
    <ul class="header-top-contact">
        <?php if(!empty($contact['contact_address'])) echo '<li class="contact-address">' . esc_attr($contact['contact_address']) . '</li>'; ?>
        <?php if(!empty($contact['contact_phone'])) echo '<li class="contact-phone"><i class="fa fa-phone"></i> ' . esc_attr($contact['contact_phone']) . '</li>'; ?>
        <?php if(!empty($contact['contact_email'])) echo '<li class="contact-email"><i class="fa fa-envelope"></i> '
        . '<a href="mailto:' . esc_attr($contact['contact_email']) . '" title ="Email">' . esc_attr($contact['contact_email'])
        . '</a></li>'; ?>
    </ul>
    <?php
}

//Load social links
function zo_header_top_social(){
    global $smof_data;
    $socials = $smof_data['social_link_header_top'];
    ?>
    <ul class="header-top-social">
        <?php
        foreach($socials as $social => $key) {
            if(isset($smof_data[$social]) && $key){
                echo '<li class="' . esc_attr($social) . '">';
                echo '<a href="' . esc_attr($smof_data[$social]) . '" title="' . esc_attr($social) . '">';
                echo '<i class="fa fa-' . esc_attr($social) . '"></i>';
                echo '</a></li>';
            }
        }
        ?>
    </ul>
    <?php
}

//Load social links
function zo_footer_social(){
    global $smof_data;
    $socials = $smof_data['social_link_header_top'];
    ?>
    <ul class="footer-social">
        <?php
        foreach($socials as $social => $key) {
            if(isset($smof_data[$social]) && $key){
                echo '<li class="' . esc_attr($social) . '">';
                echo '<a href="' . esc_attr($smof_data[$social]) . '" title="' . esc_attr($social) . '">';
                echo '<i class="fa fa-' . esc_attr($social) . '"></i>';
                echo '</a></li>';
            }
        }
        ?>
    </ul>
    <?php
}

//Load Header top navigation
function zo_header_top_navigation(){
    $attr = array(
        'menu' => zo_menu_location(),
        'menu_class' => 'nav-menu header-top-navigation',
    );
    $menu_locations = get_nav_menu_locations();
    if (!empty($menu_locations['top_navigation'])) {
        $attr['theme_location'] = 'top_navigation';
    }
    wp_nav_menu($attr);
}

//Load Page title
function zo_page_title(){
    global $smof_data, $zo_meta;
    $settings = array();
    //get theme options
    $settings = zo_page_title_default();
    if(is_page()){
        if(isset($zo_meta->_zo_page_title) && $zo_meta->_zo_page_title!='off'){
            //get page options
            $settings = zo_page_title_page($settings,$zo_meta);
            zo_page_title_content($settings);
        }
    } else {
		/* Page title post */
        //get page options
        $posttype = 'post';
        if(is_home()){
            if(isset($smof_data['blog_pt_bar']) && empty($smof_data['blog_pt_bar'])){
                return;
            }elseif(!empty($smof_data['blog_pt_bar'])){
                $settings = zo_page_title_blog($settings,$smof_data);
            }
        }else{

        }
        //$settings = zo_page_title_posttype($settings,$zo_meta,$posttype);
        zo_page_title_content($settings);
	}
}


/**
 * Get page title default from theme options.
 *
 * @author ZoTheme
 */
function zo_page_title_default(){
    global $smof_data, $zo_meta;
    $settings = array();
    //Page Title Settings
    $settings['pt_width'] = !empty($smof_data['pt_width']) ? (int)$smof_data['pt_width'] : 0;
    $settings['pt_parallax'] = !empty($smof_data['pt_parallax'])? (int)$smof_data['pt_parallax'] : 0;
    $settings['pt_alignment'] = !empty($smof_data['pt_alignment'])? $smof_data['pt_alignment'] : 'left';
    $settings['pt_vertical_alignment'] = !empty($smof_data['pt_vertical_alignment'])? $smof_data['pt_vertical_alignment'] : 'middle';
	$settings['pt_breadcrumb'] = !empty($smof_data['pt_breadcrumb'])? $smof_data['pt_breadcrumb'] : 'breadcrumb';
    $settings['pt_breadcrumb_position'] = !empty($smof_data['pt_breadcrumb_position'])? $smof_data['pt_breadcrumb_position'] : 'bellow';
    $settings['breacrumb_prefix'] = !empty($smof_data['breacrumb_prefix'])? $smof_data['breacrumb_prefix'] : '';
	if(!empty($zo_meta->_zo_page_title_sub_text)){
		$settings['pt_sub'] = $zo_meta->_zo_page_title_sub_text;
	}else {
		$settings['pt_sub'] = !empty($smof_data['pt_sub'])? $smof_data['pt_sub'] : '';
	}
    return $settings;
}

function zo_page_title_page($settings = array(),$zo_meta = array()){
    //Merge page options
    if(!empty($zo_meta->_zo_page_title_width) && $zo_meta->_zo_page_title_width!='default'){
        $settings['pt_width'] = $zo_meta->_zo_page_title_width;
    }
    if(!empty($zo_meta->_zo_page_title_text_alignment) && $zo_meta->_zo_page_title_text_alignment!='default'){
        $settings['pt_alignment'] = $zo_meta->_zo_page_title_text_alignment;
    }
    if(!empty($zo_meta->_zo_page_title_text_horizontal_alignment) && $zo_meta->_zo_page_title_text_horizontal_alignment!='default'){
        $settings['pt_vertical_alignment'] = $zo_meta->_zo_page_title_text_horizontal_alignment;
    }
    if(!empty($zo_meta->_zo_page_title_breadcrumb_display) && $zo_meta->_zo_page_title_breadcrumb_display!='default'){
        $settings['pt_breadcrumb'] = $zo_meta->_zo_page_title_breadcrumb_display;
    }
    if(!empty($zo_meta->_zo_page_title_breadcrumb_position) && $zo_meta->_zo_page_title_breadcrumb_position!='default'){
		$settings['pt_breadcrumb_position'] = $zo_meta->_zo_page_title_breadcrumb_position;
	}
    return $settings;
}

function zo_page_title_blog($settings = array(),$smof_data){
    if(!empty($smof_data['blog_layout_width'])){
		$settings['pt_width'] = $smof_data['blog_layout_width'];
	}
    if(!empty($smof_data['blog_pt_sub'])){
		$settings['pt_sub'] = $smof_data['blog_pt_sub'];
	}
    return $settings;
}
function zo_page_title_posttype($settings = array(),$zo_meta = array(), $posttype = ''){
    //Merge post options
    return $settings;
}

function zo_page_title_content($settings = array()){
    global $zo_base;
    $pa_class = '';
    $pa_style = '';
    if((int)$settings['pt_parallax'] == 1) {
        $pa_class = "zo_header_parallax";
        $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
    }
    $container = 'container';
    if($settings['pt_width']){
        $container = 'container-fluid';
    }
    ?>
    <div id="zo-page-element-wrap" class="<?php echo esc_attr($pa_class); echo ' ' . $settings['pt_breadcrumb_position']; ?>" <?php echo do_shortcode($pa_style); ?>>
         <div class="<?php echo $container;?> zo-page-title-container">
            <div class="zo-page-title-content">
                <?php if($settings['pt_alignment']=='left' && $settings['pt_breadcrumb_position']=='symmetric'){?>
                    <div class="zo-page-title-text">
                        <h1><?php $zo_base->getPageTitle();?></h1>
                        <?php if($settings['pt_sub']!='')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>'; ?>
                    </div>
                <?php if($settings['pt_breadcrumb']!='none'){
                        zo_page_title_breadcrumb($settings['pt_breadcrumb'],'zo-page-title-secondary');
                    }
                }elseif($settings['pt_alignment']=='right' && $settings['pt_breadcrumb_position']=='symmetric'){
                    if($settings['pt_breadcrumb']!='none'){
                        zo_page_title_breadcrumb($settings['pt_breadcrumb'],'zo-page-title-secondary');
                    }?>
                    <div class="zo-page-title-text">
                        <h1><?php $zo_base->getPageTitle();?></h1>
                        <?php if($settings['pt_sub']!='')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>'; ?>
                    </div>
                <?php }else{ //Align center?>
                        <?php if($settings['pt_breadcrumb_position']!='above'){?>
                            <div class="zo-page-title-text">
                                <h1><?php $zo_base->getPageTitle();?></h1>
                                <?php if($settings['pt_sub']!='')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>'; ?>
                            </div>
                            <?php if($settings['pt_breadcrumb']!='none'){
                                echo '<div class="zo-breadcrumb col-md-12">';
                                zo_page_title_breadcrumb($settings['pt_breadcrumb'],'zo-page-title-secondary-bellow');
                                echo '</div>';
                            }
                        }else{
                            if($settings['pt_breadcrumb']!='none'){
                                echo '<div class="zo-breadcrumb">';
                                zo_page_title_breadcrumb($settings['pt_breadcrumb'],'zo-page-title-secondary-above');
                                echo '</div>';
                            }?>
                            <div class="zo-page-title-text">
                                <h1><?php $zo_base->getPageTitle();?></h1>
                                <?php if($settings['pt_sub']!='')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';?>
                            </div>
                        <?php }
                    } ?>
            </div>
        </div>
    </div>
<?php
}

/**
 *
 * @author ZoTheme
 */
function zo_page_title_breadcrumb($breadcrumb_type = 'breadcrumb', $class='zo-page-title-secondary'){
    global $zo_base;
    if($breadcrumb_type == 'breadcrumb'){?>
        <div id="breadcrumb-text" class="<?php echo $class; ?> breadcrumb-text">
            <?php $zo_base->getBreadCrumb(); ?>
        </div>
    <?php } else {?>
        <div id="zo-page-title-secondary" class="<?php echo $class; ?> zo-page-title-custom-widget">
            <?php if(is_active_sidebar('page-title-sidebar')){ dynamic_sidebar('page-title-sidebar'); }  ?>
        </div>
    <?php }
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_header(){
    global $smof_data, $zo_meta;
    /* header for page */
    if(isset($zo_meta->_zo_header_layout) && $zo_meta->_zo_header_layout !='default'){
        $smof_data['header_layout'] = $zo_meta->_zo_header_layout;
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_footer(){
    global $smof_data, $zo_meta;
    /* Footer for page */
    $smof_data['footer_layout'] = '';
    if(isset($zo_meta->_zo_footer) && $zo_meta->_zo_footer){
        if(isset($zo_meta->_zo_footer_layout)){
            $smof_data['footer_layout'] = $zo_meta->_zo_footer_layout;
        }
    }
    /* load template. */
    get_template_part('inc/footer/footer', $smof_data['footer_layout']);
}

if (!function_exists('zo_page_header_sticky_logo')) {
    function zo_page_header_sticky_logo()
    {
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['sticky_logo']['url']) ? $smof_data['sticky_logo']['url'] : '';
        if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
            if (isset($zo_meta->_zo_sticky_logo)) {
                $logo = !empty($zo_meta->_zo_sticky_logo) ? wp_get_attachment_url($zo_meta->_zo_sticky_logo) : $logo;
            }
        }
        if(!empty($logo)){
            $logo = '<img class="zo-sticky-logo" src="' . esc_url($logo) . '" alt="'. esc_html__('Sticky Logo', '3d-printing') .'"/>';
        }
        return $logo;
    }
}

function zo_general_background($setting = array()){
    $css = '';
    // Background color
    if(!empty($setting['background-color']))
        $css .= 'background-color: ' . esc_attr($setting['background-color']) . ';';

    // Background image.
    if(!empty($setting['background-image']))
        $css .= 'background-image: url("' . esc_attr($setting['background-image']) . '");';

    // Background image options
    if(!empty($setting['background-repeat']))
        $css .= 'background-repeat: ' . esc_attr($setting['background-repeat']) . ';';
    if(!empty($setting['background-position']))
        $css .= 'background-position: ' . esc_attr($setting['background-position']) . ';';
    if(!empty($setting['background-size']))
        $css .= 'background-size: ' . esc_attr($setting['background-size']) . ';';
    if(!empty($setting['background-attachment']))
        $css .= 'background-attachment: ' . esc_attr($setting['background-attachment']) . ';';

    return $css;
}
function zo_general_typography($setting = array()){
    $css = '';
    // Font
    if(!empty($setting['font-family'])){
        $css .= 'font-family: ' . esc_attr($setting['font-family']);
        // Font backup
        if(!empty($setting['font-backup']))
            $css .= ',' . esc_attr($setting['font-backup']) . '';
        $css .= ';';
    }
    if(!empty($setting['font-weight']))
        $css .= 'font-weight: ' . esc_attr($setting['font-weight']) . ';';
    if(!empty($setting['font-size']))
        $css .= 'font-size: ' . esc_attr($setting['font-size']) . ';';
    if(!empty($setting['text-align']))
        $css .= 'text-align: ' . esc_attr($setting['text-align']) . ';';
    if(!empty($setting['font-weight']))
        $css .= 'font-weight: ' . esc_attr($setting['font-weight']) . ';';
    if(!empty($setting['line-height']))
        $css .= 'line-height: ' . esc_attr($setting['line-height']) . ';';
    if(!empty($setting['color']))
        $css .= 'color: ' . esc_attr($setting['color']) . ';';
    if(!empty($setting['letter-spacing']))
        $css .= 'letter-spacing: ' . esc_attr($setting['letter-spacing']) . ';';

    return $css;
}

function zo_calc_font_size($font_size = '0', $sensitivity = 100){
    $font_size = str_replace('px','',$font_size);
    $font_size = (int)$font_size;
    $new_size = 0;
    if($sensitivity >= 100){
        $new_size = (int)($font_size * ($sensitivity - 100)) / 100 + $font_size;
    }else{
        $new_size = (int)($font_size * $sensitivity) / 100;
    }
    return $new_size . 'px';
}

/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function zo_menu_location($option = '_zo_primary'){
    global $zo_meta;
    /* get menu id from page setting */
    return (isset($zo_meta->$option) && $zo_meta->$option) ? $zo_meta->$option : null ;
}

function zo_get_page_loading() {
    global $smof_data;

    if($smof_data['enable_page_loadding']){
        echo '<div id="zo-loadding">';
        switch ($smof_data['page_loadding_style']){
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add body layout
 *
 * @author CmsTheme
 * @since 1.0.0
 */
add_filter('body_class', function($classes) {
	global $smof_data, $zo_meta;
	if(isset($zo_meta->_zo_page_layout) && $zo_meta->_zo_page_layout != '0'){
        //Page option
        if($zo_meta->_zo_page_layout =='boxed'){
            array_push($classes, 'zo-boxed');
        }else{
            array_push($classes, 'zo-wide');
        }
	}else{
        //Theme option
		if(isset($smof_data['body_layout']) && $smof_data['body_layout']=='boxed'){
			array_push($classes, 'zo-boxed');
		}else{
			array_push($classes, 'zo-wide');
		}
	}
	if(isset($zo_meta->_zo_page_dark) && !empty($zo_meta->_zo_page_dark) ){
		array_push($classes, 'zo-dark');
	}else{
		if(isset($smof_data['body_layout_dark']) && $smof_data['body_layout_dark']){
			array_push($classes, 'zo-dark');
		}
	}
    return $classes;
});

/**
 * Add main class
 *  NEED CHECK
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_main_class(){
    global $zo_meta;

    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($zo_meta->_zo_full_width) && $zo_meta->_zo_full_width){
        /* full width */
        $main_class = "container-fluid";
    } else {
        /* boxed */
        $main_class = "container";
    }

    echo apply_filters('zo_main_class', $main_class);
}

/**
 * Show post like.
 *
 * @since 1.0.0
 */
function zo_get_post_like(){

    $likes = get_post_meta(get_the_ID() , '_zo_post_likes', true);

    if(!$likes) $likes = 0;

    ?>
    <span class="zo-post-like" data-id="<?php the_ID(); ?>"><i class="<?php echo !isset($_COOKIE['zo_post_like_'. get_the_ID()]) ? 'fa fa-heart-o' : 'fa fa-heart' ; ?>"></i><span><?php echo esc_attr($likes); ?></span></span>
<?php
}

/**
 * Archive detail
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_detail(){
    ?>
    <div class="author vcard"><?php _e('By', '3dprinting'); ?> <?php the_author_posts_link(); ?></div>
    <ul>
        <li class="zo-blog-comment"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a></li>
        <li class="zo-blog-views"><i class="fa fa-eye"></i> <?php echo zo_get_count_view(); ?></li>
        <?php if(has_category()): ?>
            <li class="zo-blog-category"><?php the_terms( get_the_ID(), 'category', '<i class="fa fa-bookmark-o"></i>', ' / ' ); ?></li>
        <?php endif; ?>
        <?php if(has_tag()): ?>
            <li class="zo-blog-tag"><?php the_tags('<i class="fa fa-tags"></i>', ' / ' ); ?></li>
        <?php endif; ?>
        <li class="zo-blog-date">
            <span class="day"><?php echo get_the_date("d"); ?></span>
            <span class="month"><?php echo get_the_date("M"); ?></span>
        </li>
    </ul>
<?php
}

/**
 * Archive readmore
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_readmore(){
    echo '<a class="btn btn-default" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.__('Continue Reading', '3dprinting').'</a>';
}

/**
 * Media Audio.
 *
 * @param string $before
 * @param string $after
 * @return bool|string
 */
function zo_archive_audio() {
    global $zo_base, $smof_data;
    /* get shortcode audio. */
    $shortcode = $zo_base->getShortcodeFromContent('audio', get_the_content());

    if($shortcode){
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function zo_archive_video() {

    global $wp_embed, $zo_base, $smof_data;
    /* Get Local Video */
    $local_video = $zo_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $zo_base->getShortcodeFromContent('embed', get_the_content());

    if($local_video){
        /* view local. */
        return do_shortcode($local_video);

    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));;

    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author ZoTheme
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function zo_archive_gallery($image_size = 'full'){
    global $zo_base, $smof_data;
    /* get shortcode gallery. */
    $shortcode = $zo_base->getShortcodeFromContent('gallery', get_the_content());
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if(!empty($ids)){

            $array_id = explode(",", $ids[1]);
            ob_start();
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if($attachment_image[0] != ''):?>
                            <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                                <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                            </div>
                            <?php $i++; endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php

            return ob_get_clean();

        } else {
            return false;
        }
    }elseif( has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return false;
}

/**
 * Quote Text.
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_quote() {
    global $smof_data;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if(!empty($blockquote[0])){
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author Zacky
 * @since 1.0.0
 */
function zo_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if(!empty($link[0])){
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get icon from post format.
 *
 * @return multitype:string Ambigous <string, mixed>
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_post_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>__('STANDARD', '3dprinting'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = __('GALLERY', '3dprinting');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = __('LINK', '3dprinting');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = __('QUOTE', '3dprinting');
            break;
        case 'video':
            $post_icon['icon'] = 'fa fa-youtube-play';
            $post_icon['text'] = __('VIDEO', '3dprinting');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = __('AUDIO', '3dprinting');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = __('STANDARD', '3dprinting');
            break;
    }
    echo do_shortcode('<i class="'.$post_icon['icon'].'"></i>');
}

/**
 * Get social share link
 *
 * @return string
 * @author Zacky
 * @since 1.0.0
 */

function zo_social_share() {
    global $smof_data;
    if(!empty($smof_data['blog_single_social']) && !empty($smof_data['social_link_blog'])){
        $socials = $smof_data['social_link_blog'];
    ?>
    <ul class="social-list">
        <?php foreach($socials as $key => $value){
            if($value){
                switch($key){
                    case 'facebook':?>
                        <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
                        <?php break;
                    case 'twitter':?>
                        <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
                        <?php break;
                    case 'pinterest':?>
                        <li><a class="pinterest" href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                        <?php break;
                    case 'linkedin':?>
                        <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
                        <?php break;
                    case 'google':?>
                        <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
                        <?php break;
                }
            }
        }?>
    </ul>
<?php }
}

/**
 * Load a template part into a template
 *
 * Makes it easy for a theme to reuse sections of code in a easy to overload way
 * for child themes.
 *
 * Includes the named template part for a theme or if a name is specified then a
 * specialised part will be included. If the theme contains no {slug}.php file
 * then no template will be included.
 *
 * The template is included using require, not require_once, so you may include the
 * same template part multiple times.
 *
 * For the $name parameter, if the file is called "{slug}-special.php" then specify
 * "special".
 *
 * For the var parameter, simple create an array of variables you want to access in the template
 * and then access them e.g.
 *
 * array("var1=>"Something","var2"=>"Another One","var3"=>"heres a third";
 *
 * becomes
 *
 * $var1, $var2, $var3 within the template file.
 *
 * @since 3.0.0
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @param array $vars The list of variables to carry over to the template
 * @author Eugene Agyeman zmastaa.com
 */
function zo_get_template_part( $slug, $name = null, $atts = null ) {
    /**
     * Fires before the specified template part file is loaded.
     *
     * The dynamic portion of the hook name, `$slug`, refers to the slug name
     * for the generic template part.
     *
     * @since 3.0.0
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialized template.
     * @param array $vars The list of variables to carry over to the template
     */
    do_action( "get_template_part_{$slug}", $slug, $name );

    $templates = array();
    $name = (string) $name;
    if ( '' !== $name )
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    foreach ($templates as $template){
        locate_template($template, true, false);
    }
}

function zo_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', '3dprinting' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', '3dprinting' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

if( !function_exists('zo_get_data_theme_options') ) {
	function zo_get_data_theme_options($key) {
		global $smof_data;
		return isset($smof_data[$key]) ? $smof_data[$key] : NULL;
	}
}
function zo_get_blog_search(){
    global $smof_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_search_layout' => 'large',
        'blog_search_layout_sidebar' => 'none',
        'body_sidebar_size' => 3
    );
    if(!empty($smof_data['blog_layout_width']) && $smof_data['blog_layout_width']){
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if(!empty($smof_data['blog_search_layout'])){
        $settings['blog_search_layout'] = $smof_data['blog_search_layout'];
    }
    if(!empty($smof_data['blog_search_layout_sidebar'])){
        $settings['blog_search_layout_sidebar'] = $smof_data['blog_search_layout_sidebar'];
    }
    if(!empty($smof_data['body_sidebar_size'])){
        $settings['body_sidebar_size'] = $smof_data['body_sidebar_size'];
    }
    return $settings;
}
function zo_get_blog_setting(){
    global $smof_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_layout' => 'large',
        'blog_layout_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_archive_layout' => 'large',
        'blog_archive_layout_sidebar' => 'none',
    );
    if(!empty($smof_data['blog_layout_width']) && $smof_data['blog_layout_width']){
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if(!empty($smof_data['blog_layout'])){
        $settings['blog_layout'] = $smof_data['blog_layout'];
    }
    if(!empty($smof_data['blog_layout_sidebar'])){
        $settings['blog_layout_sidebar'] = $smof_data['blog_layout_sidebar'];
    }
    if(!empty($smof_data['body_sidebar_size'])){
        $settings['body_sidebar_size'] = $smof_data['body_sidebar_size'];
    }
    if(!empty($smof_data['blog_archive_layout'])){
        $settings['blog_archive_layout'] = $smof_data['blog_archive_layout'];
    }
    if(!empty($smof_data['blog_archive_layout_sidebar'])){
        $settings['blog_archive_layout_sidebar'] = $smof_data['blog_archive_layout_sidebar'];
    }
    return $settings;
}
function zo_custom_excerpt_length( $length ) {
    global $smof_data;
    if(!empty($smof_data['blog_excerpt'])){
        $length = (int)$smof_data['blog_excerpt'];
    }
    return $length;
}
add_filter( 'excerpt_length', 'zo_custom_excerpt_length', 999 );

function zo_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'zo_excerpt_more' );

function zo_get_blog_single_setting(){
    global $smof_data;
    $settings = array(
        'blog_single_width' => 'container',
        'blog_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_single_media' => '',
        'blog_single_title' => '',
        'blog_single_author' => '',
        'blog_single_date' => '',
        'blog_single_date_format' => 'l, F j, Y',
        'blog_single_categories' => '',
        'blog_single_tags' => '',
        'blog_single_social' => '',
        'blog_single_pagination' => '',
        'blog_single_related' => '',
        'blog_single_comment' => ''
    );
    if(!empty($smof_data['blog_single_width']) && $smof_data['blog_single_width']){
        $settings['blog_single_width'] = 'container-fluid';
    }
    if(!empty($smof_data['blog_single_sidebar'])){
        $settings['blog_single_sidebar'] = $smof_data['blog_single_sidebar'];
    }
    if(!empty($smof_data['body_sidebar_size'])){
        $settings['body_sidebar_size'] = $smof_data['body_sidebar_size'];
    }
    if(!empty($smof_data['blog_single_media'])){
        $settings['blog_single_media'] = $smof_data['blog_single_media'];
    }
    if(!empty($smof_data['blog_single_title'])){
        $settings['blog_single_title'] = $smof_data['blog_single_title'];
    }
    if(!empty($smof_data['blog_single_author'])){
        $settings['blog_single_author'] = $smof_data['blog_single_author'];
    }
    if(!empty($smof_data['blog_single_date'])){
        $settings['blog_single_date'] = $smof_data['blog_single_date'];
    }
    if(!empty($smof_data['blog_single_date_format'])){
        $settings['blog_single_date_format'] = $smof_data['blog_single_date_format'];
    }
    if(!empty($smof_data['blog_single_categories'])){
        $settings['blog_single_categories'] = $smof_data['blog_single_categories'];
    }
    if(!empty($smof_data['blog_single_tags'])){
        $settings['blog_single_tags'] = $smof_data['blog_single_tags'];
    }
    if(!empty($smof_data['blog_single_social'])){
        $settings['blog_single_social'] = $smof_data['blog_single_social'];
    }
    if(!empty($smof_data['blog_single_pagination'])){
        $settings['blog_single_pagination'] = $smof_data['blog_single_pagination'];
    }
    if(!empty($smof_data['blog_single_related'])){
        $settings['blog_single_related'] = $smof_data['blog_single_related'];
    }
    if(!empty($smof_data['blog_single_comment'])){
        $settings['blog_single_comment'] = $smof_data['blog_single_comment'];
    }
    return $settings;
}
function zo_get_portfolio_setting(){
    global $smof_data;
    $settings = array(
        'portfolio_single_width' => 'container',
        'portfolio_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_single_media' => '',
        'portfolio_single_title' => '',
        'portfolio_single_author' => '',
        'portfolio_single_client' => '',
        'portfolio_single_skill' => '',
        'portfolio_single_date' => '',
        'portfolio_single_author_label' => '',
        'portfolio_single_client_label' => '',
        'portfolio_single_skill_label' => '',
        'portfolio_single_date_label' => '',
        'portfolio_single_date_format' => 'l, F j, Y',
        'portfolio_single_categories' => '',
        'portfolio_single_social' => '',
        'portfolio_single_pagination' => '',
    );
    if(!empty($smof_data['portfolio_single_width']) && $smof_data['portfolio_single_width']){
        $settings['portfolio_single_width'] = 'container-fluid';
    }
    if(!empty($smof_data['portfolio_single_sidebar'])){
        $settings['portfolio_single_sidebar'] = $smof_data['portfolio_single_sidebar'];
    }
    if(!empty($smof_data['body_sidebar_size'])){
        $settings['body_sidebar_size'] = $smof_data['body_sidebar_size'];
    }
    if(!empty($smof_data['portfolio_single_media'])){
        $settings['portfolio_single_media'] = $smof_data['portfolio_single_media'];
    }
    if(!empty($smof_data['portfolio_single_title'])){
        $settings['portfolio_single_title'] = $smof_data['portfolio_single_title'];
    }
    if(!empty($smof_data['portfolio_single_author'])){
        $settings['portfolio_single_author'] = $smof_data['portfolio_single_author'];
    }
    if(!empty($smof_data['portfolio_single_skill'])){
        $settings['portfolio_single_skill'] = $smof_data['portfolio_single_skill'];
    }
    if(!empty($smof_data['portfolio_single_client'])){
        $settings['portfolio_single_client'] = $smof_data['portfolio_single_client'];
    }
    if(!empty($smof_data['portfolio_single_date'])){
        $settings['portfolio_single_date'] = $smof_data['portfolio_single_date'];
    }
    if(!empty($smof_data['portfolio_single_author_label'])){
        $settings['portfolio_single_author_label'] = $smof_data['portfolio_single_author_label'];
    }
    if(!empty($smof_data['portfolio_single_skill_label'])){
        $settings['portfolio_single_skill_label'] = $smof_data['portfolio_single_skill_label'];
    }
    if(!empty($smof_data['portfolio_single_client_label'])){
        $settings['portfolio_single_client_label'] = $smof_data['portfolio_single_client_label'];
    }
    if(!empty($smof_data['portfolio_single_date_label'])){
        $settings['portfolio_single_date_label'] = $smof_data['portfolio_single_date_label'];
    }
    if(!empty($smof_data['portfolio_single_date_format'])){
        $settings['portfolio_single_date_format'] = $smof_data['portfolio_single_date_format'];
    }
    if(!empty($smof_data['portfolio_single_categories'])){
        $settings['portfolio_single_categories'] = $smof_data['portfolio_single_categories'];
    }
    if(!empty($smof_data['portfolio_single_social'])){
        $settings['portfolio_single_social'] = $smof_data['portfolio_single_social'];
    }
    if(!empty($smof_data['portfolio_single_pagination'])){
        $settings['portfolio_single_pagination'] = $smof_data['portfolio_single_pagination'];
    }
    return $settings;
}

function zo_get_portfolio_archive_setting(){
    global $smof_data;
    $settings = array(
        'portfolio_width' => 'container',
        'portfolio_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_media' => '',
        'portfolio_title' => '',
        'portfolio_author' => '',
        'portfolio_client' => '',
        'portfolio_skill' => '',
        'portfolio_date' => '',
        'portfolio_date_format' => 'l, F j, Y',
        'portfolio_categories' => '',
    );
    if(!empty($smof_data['portfolio_width']) && $smof_data['portfolio_width']){
        $settings['portfolio_width'] = 'container-fluid';
    }
    if(!empty($smof_data['portfolio_sidebar'])){
        $settings['portfolio_sidebar'] = $smof_data['portfolio_sidebar'];
    }
    if(!empty($smof_data['body_sidebar_size'])){
        $settings['body_sidebar_size'] = $smof_data['body_sidebar_size'];
    }
    if(!empty($smof_data['portfolio_media'])){
        $settings['portfolio_media'] = $smof_data['portfolio_media'];
    }
    if(!empty($smof_data['portfolio_title'])){
        $settings['portfolio_title'] = $smof_data['portfolio_title'];
    }
    if(!empty($smof_data['portfolio_author'])){
        $settings['portfolio_author'] = $smof_data['portfolio_author'];
    }
    if(!empty($smof_data['portfolio_client'])){
        $settings['portfolio_client'] = $smof_data['portfolio_client'];
    }
    if(!empty($smof_data['portfolio_date'])){
        $settings['portfolio_date'] = $smof_data['portfolio_date'];
    }
    if(!empty($smof_data['portfolio_date_format'])){
        $settings['portfolio_date_format'] = $smof_data['portfolio_date_format'];
    }
    if(!empty($smof_data['portfolio_categories'])){
        $settings['portfolio_categories'] = $smof_data['portfolio_categories'];
    }
    return $settings;
}


/*Add social Author*/
add_action( 'show_user_profile', 'zo_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'zo_show_extra_profile_fields' );
function zo_show_extra_profile_fields( $user ) {
    ?>

    <h3><?php esc_html_e('Social Pages: ', '3dprinting');?></h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook"><?php esc_html_e('Facebook', '3dprinting');?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Facebook.', '3dprinting');?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php esc_html_e('Twitter', '3dprinting');?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Twitter.', '3dprinting');?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php esc_html_e('Linkedin', '3dprinting');?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Linkedin.', '3dprinting');?></span>
            </td>
        </tr>
        <tr>
            <th><label for="google"><?php esc_html_e('Google +', '3dprinting');?></label></th>
            <td>
                <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Google +.', '3dprinting');?></span>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'zo_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'zo_save_extra_profile_fields' );
function zo_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'google', $_POST['google'] );
}

/**
 * loadmore
 */

function zo_masonry_loadmore(){

    $paged          =  ( $_POST['startPage']) ? $_POST['startPage'] : 1;
    $zo_data        =  $_POST['zo_data'];
    $order = (isset($zo_data['order'])) ? $zo_masonry['order'] : '';

    $args = array(
        'orderby'           => $zo_data['orderby'],
        'order'             => $order,
        'paged'             => $paged,
        'post_status'       => 'publish',
        'posts_per_page'    => $zo_data['posts_per_page'],
        'post_type'         => $zo_data['post_type']
    );

    $posts = new WP_Query($args);
    $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
    $taxo = 'portfolio-category';
    $tag  = 'portfolio-tag';

    while($posts->have_posts()){
        $posts->the_post();
        $groups = array();
        $groups[] = '"all"';
        foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
            $groups[] = '"category-'.$category->slug.'"';
        } ?>
        <div class="zo-ajax zo-grid-item <?php echo esc_attr($zo_data['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'
             data-order-newest='<?php the_date(); ?>' data-order-title='<?php the_title(); ?>'>
            <?php get_template_part( 'single-templates/portfolio/content', 'grid' ); ?>
        </div>
        <?php

    }
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_zo_masonry_loadmore', 'zo_masonry_loadmore');
add_action('wp_ajax_nopriv_zo_masonry_loadmore', 'zo_masonry_loadmore');
