<?php

class ZO_Base
{
    /**
     * Page title
     * 
     * @since 1.0.0
     */
    public static function getPageTitle(){
        global $zo_meta, $smof_data;
        
        if (!is_archive()){
            /* page. */
            if(is_page()){
                /* custom title. */
                if(!empty($zo_meta->_zo_page_title_text) && $zo_meta->_zo_page_title_text):
                    echo esc_attr($zo_meta->_zo_page_title_text);
                else :
                    the_title();
                endif;
            /* blog */
            } elseif (is_front_page() || is_home()){
                if(!empty($smof_data['blog_pt']))
                    echo $smof_data['blog_pt'];
                else
                    _e( 'Our Blog', '3d-printing' );
            /* search */
            }elseif (is_search()){
                printf( __( 'Search Results for: %s', '3dprinting' ), '<span>' . get_search_query() . '</span>' );
            /* 404 */ 
            }elseif (is_404()){
                _e( '404', '3dprinting');
            /* other */
            }else {
                the_title();
            }
        } else { 
            /* category. */
            if ( is_category() ) :
                single_cat_title();
            elseif ( is_tag() ) :
            /* tag. */
                single_tag_title();
            /* author. */
            elseif ( is_author() ) :
                printf( __( 'Author: %s', '3dprinting' ), '<span class="vcard">' . get_the_author() . '</span>' );
            /* date */
            elseif ( is_day() ) :
                printf( __( 'Day: %s', '3dprinting' ), '<span>' . get_the_date() . '</span>' );
            elseif ( is_month() ) :
                printf( __( 'Month: %s', '3dprinting' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', '3dprinting' ) ) . '</span>' );
            elseif ( is_year() ) :
                printf( __( 'Year: %s', '3dprinting' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', '3dprinting' ) ) . '</span>' );
            /* post format */
            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                _e( 'Asides', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                _e( 'Galleries', '3dprinting');
            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                _e( 'Images', '3dprinting');
            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                _e( 'Videos', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                _e( 'Quotes', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                _e( 'Links', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                _e( 'Statuses', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                _e( 'Audios', '3dprinting' );
            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                _e( 'Chats', '3dprinting' );
            /* woocommerce */
            elseif (class_exists('Woocommerce') && is_woocommerce()):
                woocommerce_page_title();
            else :
            /* other */
                the_title();
            endif;
        }
    }
    /**
     * Breadcrumb
     * 
     * @since 1.0.0
     */
    public static function getBreadCrumb($separator = '') {
        global $smof_data, $post;
        echo '<ul class="breadcrumbs">';
        /* not front_page */
        if ( !is_front_page() ) {
            echo '<li><a href="';
            echo esc_url(home_url('/'));
            echo '">'.$smof_data['breacrumb_prefix'];
            echo "</a></li>";
        }
    
        $params['link_none'] = '';
    
        /* category */
        if (is_category()) {
            $categories = get_the_category();
            $cats[] ='<li>';
            $count = 1;
            foreach($categories as $cat){
                $cats[] = '<a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a>';
                if($count < count($categories)){
                    $cats[] = '<span class="zo-breadcrumb-categrory-space">,</span>';
                }
                $count++;
            }
            $cats[] = '</li>';
            //$ID = $category[0]->cat_ID;
            //echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
            echo join( '', $cats );
        }
        /* tax */
        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $link = get_term_link( $term );
            	
            if ( is_wp_error( $link ) ) {
                echo sprintf('<li>%s</li>', $term->name );
            } else {
                echo sprintf('<li><a href="%s" title="%s">%s</a></li>', $link, $term->name, $term->name );
            }
        }
        /* home */
        
        /* page not front_page */
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
            $page = get_page( $parent_id );
            if ( $params["link_none"] )
                $parents[]  = get_the_title( $page->ID );
            else
                $parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
            $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            echo join( '', $parents );
            echo '<li>'.get_the_title().'</li>';
        }
		
        /* single */
        if(is_single()) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
            foreach($categories_1 as $cat_1):
            $cat_1_ids[] = $cat_1->term_id;
            endforeach;
            $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( isset( $cat_1_line ) && $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                $cats[] = '<li>';
                $count = 1;
                foreach ( $categories as $cat ) :
                $cats[] = '<a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a>';
                if($count < count($categories)){
                    $cats[] = '<span class="zo-breadcrumb-categrory-space">,</span>';
                }
                $count++;
                endforeach;
                $cats[] = '</li>';
                echo join( '', $cats );
                endif;
            }
            //echo '<li>'.get_the_title().'</li>';
        }
        /* tag */
        if( is_tag() ){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        /* search */
        if( is_search() ){ echo '<li>'.__("Search", '3d-printing').'</li>'; }
        /* date */
        if( is_year() ){ echo '<li>'.get_the_time('Y').'</li>'; }
        /* 404 */
        if( is_404() ) {
            echo '<li>'.__("404 - Page not Found", '3d-printing').'</li>';
        }
        /* archive */
  		if( is_archive() && is_post_type_archive() ) {
  		    $title = post_type_archive_title( '', false );
  		    echo '<li>'. $title .'</li>';
  		}
        echo "</ul>";
    }
    
    /**
     * Get Shortcode From Content
     * 
     * @param string $shortcode
     * @param string $content
     * @return unknown
     */
    public static function getShortcodeFromContent($shortcode = '', $content = ''){
        
        preg_match("/\[".$shortcode."(.*)/", $content , $matches);
        
        return !empty($matches[0]) ? $matches[0] : null ;
    }
    
    /**
     * Get list name local fonts.
     * 
     * @return multitype:unknown Ambigous <string, mixed>
     * @since 1.0.0
     */
    public static function getListLocalFontsName(){
        
        /* array fonts. */
        $localfonts = array();
        
        /* folder fonts. */
        $font_path = get_template_directory() . "/assets/fonts";
        
        if (!$handle = opendir($font_path)) {
        } else {
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, ".ttf") !== false || strpos($file, ".eot") !== false || strpos($file, ".svg") !== false || strpos($file, ".woff") !== false) {
                    $file = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $file);
                    $localfonts[$file] = $file;
                }
            }
        }
        closedir($handle);
        
        return $localfonts;
    }
    
    public static function setTypographyLocal($name = '' , $selecter = ''){
        
        $font_part = get_template_directory_uri()."/assets/fonts/".esc_attr($name);        
        /* load font files. */
        if($name){
			echo "@include font-face($name, '{$font_part}.eot', '{$font_part}.woff','{$font_part}.ttf');\n";
            /* add font selecter. */
            if($selecter){
                echo esc_attr($selecter)."{font-family:'".esc_attr($name)."';}\n";
            }
        }
    }   
    
    /**
     * set google font for selecter.
     * 
     * @param array $googlefont
     * @param string $selecter
     */
    public static function setGoogleFont($googlefont = array(), $selecter = ''){
        
        if(!empty($googlefont['font-family'])){
            /* add font selecter. */
            if($selecter){
                echo esc_attr($selecter)."{font-family:'".esc_attr($googlefont['font-family'])."';}";
            }
        }
    }   
    
    /**
     * minimize CSS styles
     *
     * @since 1.1.0
     */
    public static function compressCss($buffer){
    
        /* remove comments */
        $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace("	", " ", $buffer); //replace tab with space
        $arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
        $rep = array("", "", "", "", " ", " ", " ");
        $buffer = str_replace($arr, $rep, $buffer);
        /* remove whitespaces around {}:, */
        $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
        /* remove last ; */
        $buffer = str_replace(';}', "}", $buffer);
    
        return $buffer;
    }
}

global $zo_base;
$zo_base = new ZO_Base();
