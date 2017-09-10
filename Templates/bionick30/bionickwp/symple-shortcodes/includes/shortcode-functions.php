<?php
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');


// Section Title Shortcode (Visual)

if(! function_exists('wr_vc_section_title_shortcode')){
	function wr_vc_section_title_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'background'=>'',
			'margin'=>'',
			'padding'=>'',			
			'color'=>'',
			'font_size'=>'',
			'font_weight'=>'',
			'line_height'=>'',
			'text_align'=>'',
			'text_transform'=>'',
			), $atts) );

				
		return '
		     <div class="text-title '.$class.'" style="background:'.$background.';">
			 <h2 style="margin:'.$margin.';padding:'.$padding.'; color:'.$color.'; font-size:'.$font_size.'; font-weight:'.$font_weight.'; line-height:'.$line_height.'; text-align:'.$text_align.'; text-transform:'.$text_transform.';">'.$title.'</h2>
			 </div>
                
				';
	}
	add_shortcode('wr_vc_section_title', 'wr_vc_section_title_shortcode');
}


// Section Text Shortcode (Visual)

if(! function_exists('wr_vc_section_text_shortcode')){
	function wr_vc_section_text_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'background'=>'',
			'margin'=>'',
			'padding'=>'',			
			'color'=>'',
			'font_size'=>'',
			'font_weight'=>'',
			'line_height'=>'',
			'text_align'=>'',
			'text_transform'=>'',
			), $atts) );

				
		return '
		     <div class="sec-text '.$class.'" style="background:'.$background.';">
			 <p style="margin:'.$margin.';padding:'.$padding.'; color:'.$color.'; font-size:'.$font_size.'; font-weight:'.$font_weight.'; line-height:'.$line_height.'; text-align:'.$text_align.'; text-transform:'.$text_transform.';">'.$content.'</p>
			 </div>
                
				';
	}
	add_shortcode('wr_vc_section_text', 'wr_vc_section_text_shortcode');
}


// Section Image Shortcode (Visual)

if(! function_exists('wr_vc_section_image_shortcode')){
	function wr_vc_section_image_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'width'=>'',
			'height'=>'',
			'margin'=>'',
			'padding'=>'',			
			'position'=>'',			
			'float'=>'',			
			'top'=>'',
			'bottom'=>'',
			'right'=>'',
			'left'=>'',
			'img_url'=>'',
			'link_url'=>'',
			'link_target'=>'',			
			'img_popup'=>'',			

			), $atts) );

		$html='';
			
            $wr_back_image ="";
            if($img_url != '' || $img_url != ' ') { 
	            $wr_back_image = wp_get_attachment_image_src( $img_url, 'full');
            }
				
		
		    $html .='<div class="sec-image post-media '.$class.'">';
			if($link_url != '') {	
			$html .='<a class="img-link" href="'.$link_url.'" target="'.$link_target.'">';
			} else {				
			$html .='<a class="'.$img_popup.' img-cursor" href="'.$wr_back_image[0].'" >';	
			}
			$html .='<img src="'.$wr_back_image[0].'" style="width:'.$width.';height:'.$height.';float:'.$float.';margin:'.$margin.';padding:'.$padding.';position:'.$position.';top:'.$top.';bottom:'.$bottom.';right:'.$right.';left:'.$left.';" alt="img" class="img-responsive respimg"/>';
			if($link_url != '') {
			$html .='</a>';
			}  else {
			$html .='</a>';
			}			
			$html .='</div>';
                
		return $html;
	}
	add_shortcode('wr_vc_section_image', 'wr_vc_section_image_shortcode');
}


// Section Button Shortcode (Visual)

if(! function_exists('wr_vc_section_button_shortcode')){
	function wr_vc_section_button_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'link_url'=>'',
			'link_target'=>'',
			'button_style'=>'',
			'margin'=>'',
			'padding'=>'',			
			'background'=>'',			
			'color'=>'',
			'border'=>'',
			'border_radius'=>'',		
			'font_size'=>'',
			'font_weight'=>'',
			'float'=>'',
			'text_transform'=>'',
			), $atts) );

				
		return '
		     <div class="sec-button '.$class.'">
			 <a class="btn hide-icon" href="'.$link_url.'" target="'.$link_target.'" style="margin:'.$margin.';padding:'.$padding.'; background:'.$background.'; color:'.$color.'; border:'.$border.'; border-radius:'.$border_radius.'; font-size:'.$font_size.'; font-weight:'.$font_weight.'; float:'.$float.';text-transform:'.$text_transform.';"><i class="fa fa-angle-right"></i><span>'.$title.'</span></a>
			 </div>
                
				';
	}
	add_shortcode('wr_vc_section_button', 'wr_vc_section_button_shortcode');
}


// Divider Section Shortcode (Visual)
if(! function_exists('wr_vc_bar_shortcode')){
	function wr_vc_bar_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'width'=>'',
			'height'=>'',
			'float'=>'',
			'color'=>'',
			'position'=>'',
			'margin'=>'',
			'padding'=>'',					
			'border'=>'',					
			'border_radius'=>'',
			
			), $atts) );

				
		return '
		    

            <div class="'.$class.'" style="width:'.$width.';height:'.$height.';float:'.$float.'; background:'.$color.'; position:'.$position.'; margin:'.$margin.'; padding:'.$padding.'; border:'.$border.'; border-radius:'.$border_radius.';"></div>			
			
				';
	}
	add_shortcode('wr_vc_bar', 'wr_vc_bar_shortcode');
}

// Blog Section Shortcode (Visual)

if(! function_exists('wr_vc_blog_shortcode')){
	function wr_vc_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
            'categoryname'=>'',
            'showpost'=>'',			

			), $atts) );
			
			$html='';
			$wr_options = get_option('bionick_wp');
			$html .='<section id="blog-list '.$class.'">';
			
			global $post;
		    $paged=(get_query_var('paged'))?get_query_var('paged'):1;
		    $loop = new WP_Query( array( 'post_type' => 'post','category_name'=> $categoryname, 'posts_per_page'=> $showpost) );
 		    while ( $loop->have_posts() ) : $loop->the_post();
			
			$html .='<article class="post">';
			
			$html .='<h4><a href="';
			$html .= get_the_permalink();
			$html .='">';			
			$html .=get_the_title();
			$html .='</a></h4>';
			
			$html .='<ul class="post-meta">';
			$html .='<li><i class="fa fa-clock-o"></i> ';
			$html .=get_the_date('M . d . Y');
			$html .='</li>';
			$html .='<li><i class="fa fa-comments-o"></i> ';			
			$commentscount = get_comments_number();	
			if($commentscount == 1): $commenttext = 'Comment'; endif;
			if($commentscount == 0): $commenttext = 'Comment'; endif;
			if($commentscount > 1): $commenttext = 'Comments'; endif;
			$html .=$commentscount.' '.$commenttext;			
			$html .='</li>';			
			$html .='<li><i class="fa fa-files-o"></i> ';
			$html .=get_the_category_list(', ');	
			$html .='</li>';
			if(!empty($wr_options['blog-posted-by'])):;
			$html .='<li><i class="fa fa-user"></i> ';
			$html .= ($wr_options['blog-posted-by']);
			$html .=' <span>';	
			$html .=get_the_author();
			$html .='</span></li>';	
			else :
			$html .='<li><i class="fa fa-user"></i> Posted by <span>';
			$html .=get_the_author();
			$html .='</span></li>';	
			endif;
			$html .='</ul>';
			
			
			if (has_post_thumbnail( $post->ID ) ):
			$html .='<div class="post-media">';
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
			$html .='<a href="';
			$html .= get_the_permalink();
			$html .='">';	
		    $html .='<img src="';
		    $html .= $image[0];
		    $html .= '" alt="" class="respimg"/>';			
			$html .='</a>';	
			$html .='</div>';           			
			
			elseif( has_post_format( 'video' ) !='') :
			if (get_post_meta($post->ID,'rnr_bl-video',true)!=''):;
			
			$html .='<div class="post-media">';
                $html .='<div class="iframe-holder">';
                    $html .='<div class="post-media">';
                        $html .='<div class="resp-video">';
		                    $html .='<iframe src="';
		                        $html .= get_post_meta($post->ID,'rnr_bl-video',true);
		                    $html .= '" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';							
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
            endif;
			
			elseif( has_post_format( 'audio' ) !='') :
			if (get_post_meta($post->ID,'rnr_bl-audio',true)!=''):;			
			
                $html .='<div class="iframe-holder">';
                    $html .='<div class="post-media">';
                        $html .='<div class="resp-video">';
		                    $html .='<iframe src="';
		                        $html .= get_post_meta($post->ID,'rnr_bl-audio',true);
		                    $html .= '" width="100%" scrolling="no" frameborder="no"></iframe>';							
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            endif;			
			
			elseif( has_post_format( 'gallery' ) !='') :
			
            $html .='<div class="post-media">';
                $html .='<div class="single-slider-holder">';
                    $html .='<div class="customNavigation">';
                        $html .='<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>';
                        $html .='<a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>';
					$html .='</div>';	
					$html .='<div class="single-slider owl-carousel">';	
					
		                $images = rwmb_meta( 'rnr_blog-image','type=image&size=portfolio-slider' );
						
						foreach ( $images as $image ){
							
						$html .='<div class="item">';
							$html .='<img src="';
		                         $html .= $image['url'];
		                    $html .= '" class="respimg"/>';			
		                $html .= '</div>';			
						}
							
                    $html .='</div>';
                $html .='</div>';			
			$html .='</div>';
			
			endif;		
			
			$html .='<p>';	
			$html .= substr(strip_tags($post->post_content), 0, 300);
			$html .='...';	
			$html .='</p>';	
			
            if(!empty($wr_options['blog-read-more'])):;
			$html .='<a href="';
			$html .= get_the_permalink();
			$html .='" class="ajax post-link">';			
			$html .= ($wr_options['blog-read-more']);
            $html .='</a>';	
			else :
			$html .='<a href="';
			$html .= get_the_permalink();
			$html .='" class="ajax post-link">';			
			$html .='Continue reading ...';	
            $html .='</a>';	
            endif;
			
			$html .='<ul class="post-tags">';               
            $html .=get_the_tag_list('<li>',', ','<li>');                
            $html .='</ul>';
			
            $html .='</article>';
			
			endwhile;
			wp_reset_query();
			$html .='</section>';
			

				
		return $html;
		         
				
	}
	add_shortcode('wr_vc_blog', 'wr_vc_blog_shortcode');
}

// Protfolio Section Shortcode (Visual)

 if(! function_exists('wr_vc_portfolio_shortcode')){
	function wr_vc_portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			), $atts) );
			
		$html='';		
		
		global $post;
		$wr_options = get_option('bionick_wp');
		
        $html .= '<div class="port-vc '.$class.'">';
		
		if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
		$portfolio_category = get_terms('portfolio_category');
		if($portfolio_category):
		$html .= '<div class="filter-holder">';
		$html .= '<div class="gallery-filters vis-filter">';
		$html .= '<ul>';
		
		if(!empty($wr_options['prf-project-filter-all'])):
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>';
		$html .= ($wr_options['prf-project-filter-all']);
		$html .= '</span></a></li>';	
		else :
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>All</span></a></li>';	
		endif;		
		
		foreach($portfolio_category as $portfolio_cat):
		$html .= '<li><a href="#" data-filter=".';
		$html .= $portfolio_cat->slug;
		$html .= '" class="gallery-filter"><span>';
		$html .= $portfolio_cat->name;
		$html .= '</span></a>';
		$html .= '</li>';
		endforeach;
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		endif; 
		endif;
        
		$html .= do_shortcode('[wr_vc_portfolio]');
		
		$html .= '</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio_header', 'wr_vc_portfolio_shortcode');
}

 if(! function_exists('wr_vc_portfolio_body_shortcode')){
	function wr_vc_portfolio_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'showpost'=>'',
			
			), $atts) );
		$html='';
		
		
		global $post;
		
		$html .= '<div class="gallery-items grid-small-pad" >';
		
		query_posts(array('post_type' => 'portfolio','posts_per_page' => '-1'));
		while ( have_posts() ) : the_post();
		$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
        $firenze_class = ""; 
		$firenze_categories = ""; 
		foreach ($portfolio_category as $firenze_item) {
			$firenze_class.=esc_attr($firenze_item->slug . ' ');
			$firenze_categories.='<span class="cat-divider">';
			$firenze_categories.=esc_attr($firenze_item->name . '  ');
			$firenze_categories.='</span>';
		}	
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '<div class="gallery-item gallery-item-second ';
		$html .= $firenze_class;	
		$html .= ' ">';
		} else {
		$html .= '<div class="gallery-item ';
		$html .= $firenze_class;	
		$html .= ' ">';			
		}
		
		$html .= '<div class="grid-item-holder">';

		if (has_post_thumbnail( $post->ID ) ):		
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		
		if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){
			
		if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):	
		$html .= '<div class="port-popup-youtube">';
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-youtube box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';		
		$html .= '</div>';		
		else :
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-vimeo box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		endif;
		
		} else {
		$html .= '<a href="';
		$html .= $image[0];
		$html .= '"  class="image-popup box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		}
		
		$html .= '<div class="folio-img">';
		$html .= '<span class="overlay"></span>';
		$html .='<img src="';
		$html .= $image[0];
		$html .= '" alt="" />';		
		$html .= '</div>';		
		endif;
		
		$html .= '<div class="grid-item">';	
		$html .= '<h3><a href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .=get_the_title();
		$html .= '</a></h3>';

		$html .= '<span class="prf-in-cat ">';
		$html .= $firenze_categories;
		$html .= '</span>';
		
		if (( get_post_meta($post->ID,'rnr_port_icon',true))):
		$html .='<i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_port_icon',true);
		$html .= '"></i>';
        else :	
		$html .= '<i class="fa fa-camera-retro"></i>';
		endif;
		
		$html .= '</div>';
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '</div>';	
		} else {
        $html .= '</div>';
        }	

        $html .= '</div>';		
		
		endwhile;
		wp_reset_query();
		
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio', 'wr_vc_portfolio_body_shortcode');
}

// Protfolio 2 Section Shortcode (Visual)

 if(! function_exists('wr_vc_portfolio2_shortcode')){
	function wr_vc_portfolio2_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			), $atts) );
			
		$html='';
				
		global $post;
		$wr_options = get_option('bionick_wp');
		
        $html .= '<div class="port-vc '.$class.'">';
		
		if(!get_post_meta(get_the_ID(), 'portfolio2_category', true)):
		$portfolio2_category = get_terms('portfolio2_category');
		if($portfolio2_category):
		$html .= '<div class="filter-holder">';
		$html .= '<div class="gallery-filters vis-filter">';
		$html .= '<ul>';
		if(!empty($wr_options['prf-project-filter-all'])):
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>';
		$html .= ($wr_options['prf-project-filter-all']);
		$html .= '</span></a></li>';	
		else :
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>All</span></a></li>';	
		endif;	
		foreach($portfolio2_category as $portfolio2_cat):
		$html .= '<li><a href="#" data-filter=".';
		$html .= $portfolio2_cat->slug;
		$html .= '" class="gallery-filter"><span>';
		$html .= $portfolio2_cat->name;
		$html .= '</span></a>';
		$html .= '</li>';
		endforeach;
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		endif; 
		endif;
        
		$html .= do_shortcode('[wr_vc_portfolio2]');
		
		$html .= '</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio2_header', 'wr_vc_portfolio2_shortcode');
}

 if(! function_exists('wr_vc_portfolio2_body_shortcode')){
	function wr_vc_portfolio2_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'showpost'=>'',
			
			), $atts) );
		$html='';
		
		
		global $post;
		
		$html .= '<div class="gallery-items grid-small-pad" >';
		
		query_posts(array('post_type' => 'portfolio2','posts_per_page' => '-1'));
		while ( have_posts() ) : the_post();
		$portfolio2_category = wp_get_post_terms($post->ID,'portfolio2_category');
        $firenze_class = ""; 
		$firenze_categories = ""; 
		foreach ($portfolio_category as $firenze_item) {
			$firenze_class.=esc_attr($firenze_item->slug . ' ');
			$firenze_categories.='<span class="cat-divider">';
			$firenze_categories.=esc_attr($firenze_item->name . '  ');
			$firenze_categories.='</span>';
		}	
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '<div class="gallery-item gallery-item-second ';
		$html .= $firenze_class;	
		$html .= ' ">';
		} else {
		$html .= '<div class="gallery-item ';
		$html .= $firenze_class;	
		$html .= ' ">';			
		}
		
		$html .= '<div class="grid-item-holder">';

		if (has_post_thumbnail( $post->ID ) ):		
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		
		if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){
			
		if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):	
		$html .= '<div class="port-popup-youtube">';
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-youtube box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';		
		$html .= '</div>';		
		else :
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-vimeo box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		endif;
		
		} else {
		$html .= '<a href="';
		$html .= $image[0];
		$html .= '"  class="image-popup box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		}
		
		$html .= '<div class="folio-img">';
		$html .= '<span class="overlay"></span>';
		$html .='<img src="';
		$html .= $image[0];
		$html .= '" alt="" />';		
		$html .= '</div>';		
		endif;
		
		$html .= '<div class="grid-item">';	
		$html .= '<h3><a href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .=get_the_title();
		$html .= '</a></h3>';
		
		$html .= '<span class="prf-in-cat ">';
		$html .= $firenze_categories;
		$html .= '</span>';
		
		if (( get_post_meta($post->ID,'rnr_port_icon',true))):
		$html .='<i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_port_icon',true);
		$html .= '"></i>';
        else :	
		$html .= '<i class="fa fa-camera-retro"></i>';
		endif;
		
		$html .= '</div>';
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '</div>';	
		} else {
        $html .= '</div>';
        }	

        $html .= '</div>';		
		
		endwhile;
		wp_reset_query();
		
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio2', 'wr_vc_portfolio2_body_shortcode');
}

// Protfolio 3 Section Shortcode (Visual)

 if(! function_exists('wr_vc_portfolio3_shortcode')){
	function wr_vc_portfolio3_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			), $atts) );
			
		$html='';
				
		global $post;
		$wr_options = get_option('bionick_wp');
		
        $html .= '<div class="port-vc '.$class.'">';
		
		if(!get_post_meta(get_the_ID(), 'portfolio3_category', true)):
		$portfolio3_category = get_terms('portfolio3_category');
		if($portfolio3_category):
		$html .= '<div class="filter-holder">';
		$html .= '<div class="gallery-filters vis-filter">';
		$html .= '<ul>';
		if(!empty($wr_options['prf-project-filter-all'])):
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>';
		$html .= ($wr_options['prf-project-filter-all']);
		$html .= '</span></a></li>';	
		else :
		$html .= '<li><a href="#" data-filter="*" class="gallery-filter gallery-filter-active"><span>All</span></a></li>';	
		endif;	
		foreach($portfolio3_category as $portfolio3_cat):
		$html .= '<li><a href="#" data-filter=".';
		$html .= $portfolio3_cat->slug;
		$html .= '" class="gallery-filter"><span>';
		$html .= $portfolio3_cat->name;
		$html .= '</span></a>';
		$html .= '</li>';
		endforeach;
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		endif; 
		endif;
        
		$html .= do_shortcode('[wr_vc_portfolio3]');
		
		$html .= '</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio3_header', 'wr_vc_portfolio3_shortcode');
}

 if(! function_exists('wr_vc_portfolio3_body_shortcode')){
	function wr_vc_portfolio3_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'showpost'=>'',
			
			), $atts) );
		$html='';
		
		
		global $post;
		
		$html .= '<div class="gallery-items grid-small-pad" >';
		
		query_posts(array('post_type' => 'portfolio3','posts_per_page' => '-1'));
		while ( have_posts() ) : the_post();
		$portfolio3_category = wp_get_post_terms($post->ID,'portfolio3_category');
        $firenze_class = ""; 
		$firenze_categories = ""; 
		foreach ($portfolio_category as $firenze_item) {
			$firenze_class.=esc_attr($firenze_item->slug . ' ');
			$firenze_categories.='<span class="cat-divider">';
			$firenze_categories.=esc_attr($firenze_item->name . '  ');
			$firenze_categories.='</span>';
		}		
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '<div class="gallery-item gallery-item-second ';
		$html .= $firenze_class;	
		$html .= ' ">';
		} else {
		$html .= '<div class="gallery-item ';
		$html .= $firenze_class;	
		$html .= ' ">';			
		}
		
		$html .= '<div class="grid-item-holder">';

		if (has_post_thumbnail( $post->ID ) ):		
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		
		if (( get_post_meta($post->ID,'rnr_portfolio-post-formats',true))=='video'){
			
		if (( get_post_meta($post->ID,'rnr_portfolio-video-player',true))=='yes'):	
		$html .= '<div class="port-popup-youtube">';
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-youtube box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';		
		$html .= '</div>';		
		else :
		$html .= '<a href="';
		$html .= get_post_meta($post->ID,'rnr_portfolio-video',true);
		$html .= '"  class="popup-vimeo box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		endif;
		
		} else {
		$html .= '<a href="';
		$html .= $image[0];
		$html .= '"  class="image-popup box-popup"><i class="fa fa-expand"></i>';
		$html .= '</a>';
		}
		
		$html .= '<div class="folio-img">';
		$html .= '<span class="overlay"></span>';
		$html .='<img src="';
		$html .= $image[0];
		$html .= '" alt="" />';		
		$html .= '</div>';		
		endif;
		
		$html .= '<div class="grid-item">';	
		$html .= '<h3><a href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .=get_the_title();
		$html .= '</a></h3>';
		
		$html .= '<span class="prf-in-cat ">';
		$html .= $firenze_categories;
		$html .= '</span>';
		
		if (( get_post_meta($post->ID,'rnr_port_icon',true))):
		$html .='<i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_port_icon',true);
		$html .= '"></i>';
        else :	
		$html .= '<i class="fa fa-camera-retro"></i>';
		endif;
		
		$html .= '</div>';
		
		if (( get_post_meta($post->ID,'rnr_port-img-size',true))=='no'){
		$html .= '</div>';	
		} else {
        $html .= '</div>';
        }	

        $html .= '</div>';		
		
		endwhile;
		wp_reset_query();
		
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('wr_vc_portfolio3', 'wr_vc_portfolio3_body_shortcode');
}

// Resume Shortcode (Visual)

if(! function_exists('wr_vc_resume_shortcode')){
	function wr_vc_resume_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'showpost'=>'',	
			'categoryname'=>''						
			
			), $atts) );

		$html='';
		
		$html .='<div class="sec-resume '.$class.'">';
		
		$html .='<div class="accordion" data-name="1">';

		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'resume','resume_category'=> $categoryname,'posts_per_page'=> $showpost) );
 		while ( $loop->have_posts() ) : $loop->the_post();
		
		$html .='<div class="accordion-title transition">';
		$html .='<h5><a href="#">';
		if (get_post_meta($post->ID,'rnr_resume_icon',true)!=''):;
		$html .='<i class="fa ';
		$html .= get_post_meta($post->ID,'rnr_resume_icon',true);
		$html .='"></i>';
		endif;
		if (get_post_meta($post->ID,'rnr_resume_time',true)!=''):;		
		$html .= get_post_meta($post->ID,'rnr_resume_time',true);
		$html .=' <span> - </span>';
		endif;	
		$html .='<span>';		
		$html .=get_the_title();
		$html .='</span>';		
		$html .='</a></h5>';
		$html .='</div>';
		
		$html .='<div class="accordion-inner">';
		if (get_post_meta($post->ID,'rnr_resume_title',true)!=''):;
		$html .= '<h4>';		
		$html .= get_post_meta($post->ID,'rnr_resume_title',true);
		$html .= '</h4>';
		endif;
		$html .= '<ul>';
		$values =  rwmb_meta('rnr_resume_subtitle', $args = array('type'=>'text',),
        $post_id = $post->ID); 
		if($values){foreach ((array) $values as $key => $value) {
		$html .= '<li>';
		$html .= $value;
		$html .= '</li>';
		}}; 					
		$html .='</ul>';
		$html .='<p>';
		$html .=get_the_content();
		$html .='</p>';
		$html .='</div>';
		
		endwhile;
		wp_reset_query();

		$html .='</div>';
		$html .='</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_resume', 'wr_vc_resume_shortcode');
}

// Services Shortcode (Visual)

if(! function_exists('wr_vc_services_shortcode')){
	function wr_vc_services_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'showpost'=>'',	
			'categoryname'=>'',						
			'show_hide'=>'',						
									
			
			), $atts) );
			

		$html='';
		
		$html .='<div class="sec-services '.$class.'">';
		
		$html .='<div class="carous-holder ser-carous-holder">';
		
		$html .='<div class="'.$show_hide.' customNavigation">';
		$html .='<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>';
		$html .='<a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>';
		$html .='</div>';
		$html .='<div class="clearfix"></div>';
		
		$html .='<div class="owl-carousel services-carusel">';		

		global $post, $post_id, $values;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'services','services_category'=> $categoryname,'posts_per_page'=> $showpost) );
 		while ( $loop->have_posts() ) : $loop->the_post();
		
		$html .='<div class="item">';
		$html .='<div class="services-box box-item-holder">';

		if (has_post_thumbnail( $post->ID ) ):				
		$html .='<div class="grid-item-holder services-image">';
		$_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
		$html .='<a class="image-popup box-popup" href="';
		$html .= $_image[0];
		$html .='"><i class="fa fa-expand"></i></a>';
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );		
		$html .='<div class="folio-img">';
		$html .='<span class="overlay"></span>';
		$html .= '<img src="';
		$html .= $image[0];
		$html .= '" alt="" class="respimg"/>';
		$html .= '</div>';
		$html .= '</div>';
		endif;		
		
		$html .='<div class="services-box-info">';		
		$html .='<h4>';
		$html .=get_the_title();
		$html .='</h4>';				
		$html .='<p>';
		$html .=get_the_content();
		$html .='</p>';	
		$html .= '<ul>';
		$values =  rwmb_meta('rnr_services_subtitle', $args = array('type'=>'text',),
        $post_id = $post->ID); 
		if($values){foreach ((array) $values as $key => $value) {
		$html .= '<li>';
		$html .= $value;
		$html .= '</li>';
		}}; 		
		$html .='</ul>';		
		if (get_post_meta($post->ID,'rnr_services_price',true)!=''):;
		$html .='<div class="price">';
		$html .= get_post_meta($post->ID,'rnr_services_price',true);
		$html .='</div>';
		endif;
		$html .='</div>';

		$html .='</div>';
		$html .='</div>';
		endwhile;
		wp_reset_query();

		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_services', 'wr_vc_services_shortcode');
}

// Testimonials Shortcode (Visual)

if(! function_exists('wr_vc_testimonial_shortcode')){
	function wr_vc_testimonial_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'showpost'=>'',	
			'categoryname'=>'',						
			'show_hide'=>'',						
			
			), $atts) );

		$html='';
		
		$html .='<div class="sec-testimonial '.$class.'">';
		
		$html .='<div class="single-slider-holder">';
		
		$html .='<div class="'.$show_hide.' customNavigation">';
		$html .='<a class="next-slide transition"><i class="fa fa-angle-right"></i></a>';
		$html .='<a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>';
		$html .='</div>';
		
		$html .='<div class="single-slider owl-carousel testimonials-slider">';		

		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'testimonial','testimonial_category'=> $categoryname,'posts_per_page'=> $showpost) );
 		while ( $loop->have_posts() ) : $loop->the_post();
		
		$html .='<div class="item">';
		$html .='<div class="testi-item">';

		if (has_post_thumbnail( $post->ID ) ):				
		$html .='<div class="testi-item-img">';
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'testimonial-img' );		
		$html .= '<img src="';
		$html .= $image[0];
		$html .= '" alt="" class="respimg" />';
		$html .= '</div>';
		endif;		
		
		$html .='<div class="testi-item-text">';		
		$html .='<h3>';
		$html .=get_the_title();
		$html .='</h3>';				
		$html .='<p>" ';
		$html .=get_the_content();
		$html .=' "</p>';
        if (get_post_meta($post->ID,'rnr_testimonial_linkname',true)!=''):;			
		$html .='<a href="';
        if (get_post_meta($post->ID,'rnr_testimonial_linkurl',true)!=''):;		
		$html .= get_post_meta($post->ID,'rnr_testimonial_linkurl',true);
		endif;		
		$html .='" target="_blank">';	
		$html .= get_post_meta($post->ID,'rnr_testimonial_linkname',true);	
		$html .='</a>';	
		endif;						
		$html .='</div>';

		$html .='</div>';
		$html .='</div>';
		endwhile;
		wp_reset_query();

		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
				
		return $html;
	}
	add_shortcode('wr_vc_testimonial', 'wr_vc_testimonial_shortcode');
}


// Progress Bar Section Shortcode (Visual)

if(! function_exists('wr_vc_progressbar_shortcode')){
	function wr_vc_progressbar_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'counter_num'=>'',			
			'sub_title1'=>'',			
			'sub_counter_num1'=>'',	
			'sub_title2'=>'',			
			'sub_counter_num2'=>'',	
			'sub_title3'=>'',			
			'sub_counter_num3'=>'',	
			'sub_title4'=>'',			
			'sub_counter_num4'=>'',	
			'sub_title5'=>'',			
			'sub_counter_num5'=>'',				
			),  $atts) );

		$html='';

		$html .='<div class="piechart-holder animaper '.$class.'" data-skcolor="#8F8F8F">';
            $html .='<div class="row">';
            
            $html .='<div class="piechart col-md-3">';
			if($counter_num != '') {
            $html .='<span class="chart" data-percent="'.$counter_num.'">';
            $html .='<span class="percent"></span>';
            $html .='</span>';
			}
            $html .='<div class="clearfix"></div>';
            $html .='<div class="skills-description">';
            $html .='<h4>'.$title.'</h4>';
            $html .='</div>';
            $html .='</div>';
            $html .='<div class="col-md-8">';
            $html .='<div class="skillbar-box animaper">';
			
            if($sub_counter_num1 != '') {			
            $html .='<div class="custom-skillbar-title"><span>'.$sub_title1.' </span></div>';
            $html .='<div class="skill-bar-percent">'.$sub_counter_num1.'%</div>';
            $html .='<div class="skillbar-bg" data-percent="'.$sub_counter_num1.'%">';
            $html .='<div class="custom-skillbar"></div>';
            $html .='</div>';
			} if($sub_counter_num2 != '') {			
            $html .='<div class="custom-skillbar-title"><span>'.$sub_title2.' </span></div>';
            $html .='<div class="skill-bar-percent">'.$sub_counter_num2.'%</div>';
            $html .='<div class="skillbar-bg" data-percent="'.$sub_counter_num2.'%">';
            $html .='<div class="custom-skillbar"></div>';
            $html .='</div>';
			} if($sub_counter_num3 != '') {			
            $html .='<div class="custom-skillbar-title"><span>'.$sub_title3.' </span></div>';
            $html .='<div class="skill-bar-percent">'.$sub_counter_num3.'%</div>';
            $html .='<div class="skillbar-bg" data-percent="'.$sub_counter_num3.'%">';
            $html .='<div class="custom-skillbar"></div>';
			$html .='</div>';
			} if($sub_counter_num4 != '') {			
            $html .='<div class="custom-skillbar-title"><span>'.$sub_title4.' </span></div>';
            $html .='<div class="skill-bar-percent">'.$sub_counter_num4.'%</div>';
            $html .='<div class="skillbar-bg" data-percent="'.$sub_counter_num4.'%">';
            $html .='<div class="custom-skillbar"></div>';	
			$html .='</div>';
            } if($sub_counter_num5 != '') {	
            $html .='<div class="custom-skillbar-title"><span>'.$sub_title5.' </span></div>';
            $html .='<div class="skill-bar-percent">'.$sub_counter_num5.'%</div>';
            $html .='<div class="skillbar-bg" data-percent="'.$sub_counter_num5.'%">';
            $html .='<div class="custom-skillbar"></div>';					
            $html .='</div>';
			}			
			$html .='</div>';
            $html .='</div>';
            
		    $html .='</div>';
	        $html .='</div>';
        
        return $html;		
				
	}
	add_shortcode('wr_vc_progress_bar', 'wr_vc_progressbar_shortcode');
}

// Counter Section Shortcode (Visual)

if(! function_exists('wr_vc_counter_shortcode')){
	function wr_vc_counter_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'counter_name1'=>'',			
			'counter_num1'=>'',		
			'counter_name2'=>'',			
			'counter_num2'=>'',	
			'counter_name3'=>'',			
			'counter_num3'=>'',				
			), $atts) );

				
		$html='';
		    
			$html .='<div class="sec-counter '.$class.'">';
			
		        $html .='<div class="facts-title">';
                $html .='<h3>'.$title.'</h3>';
                $html .='</div>';

                $html .='<div class="inline-facts-holder">';
                    
                    if($counter_num1 != '') {                    
                    $html .='<div class="inline-facts">';
                        $html .='<div class="milestone-counter">';
                            $html .='<div class="stats animaper">';
                                $html .='<div class="num" data-content="'.$counter_num1.'" data-num="'.$counter_num1.'">0</div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .='<h6>'.$counter_name1.'</h6>';
                    $html .='</div>';
                    } if($counter_num2 != '') {                   
                    $html .='<div class="inline-facts">';
                        $html .='<div class="milestone-counter">';
                            $html .='<div class="stats animaper">';
                                $html .='<div class="num" data-content="'.$counter_num2.'" data-num="'.$counter_num2.'">0</div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .='<h6>'.$counter_name2.'</h6>';
                    $html .='</div>';
                    } if($counter_num3 != '') {                     
                    $html .='<div class="inline-facts">';
                        $html .='<div class="milestone-counter">';
                            $html .='<div class="stats animaper">';
                                $html .='<div class="num" data-content="'.$counter_num3.'" data-num="'.$counter_num3.'">0</div>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .='<h6>'.$counter_name3.'</h6>';
                    $html .='</div>';
					}					
				$html .='</div>';	
            $html .='</div>';
                
		return $html;
	}
	add_shortcode('wr_vc_counter', 'wr_vc_counter_shortcode');
}

// Contact Info (Visual)
if(! function_exists('wr_vc_contact_info_shortcode')){
	function wr_vc_contact_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'con_phone'=>'',
			'con_address'=>'',
			'con_mail'=>'',
	

			), $atts) );

				
		return '
		
		<div class="contact-info">
			<ul class="'.$class.'">
				<li>
					<a href="tel:'.$con_phone.'"> 
					    <i class="fa fa-phone"></i>
					     '.$con_phone.'
					</a>
				</li>
				<li>
					<a href="#"> 
					    <i class="fa fa-map-marker"></i>
					     '.$con_address.'
					</a>
				</li>
				<li>
					<a href="mailto:'.$con_mail.'"> 
					    <i class="fa fa-envelope-o"></i>
					     '.$con_mail.'
					</a>
				</li>				
			</ul>			
        </div>
        
				';
	}
	add_shortcode('wr_vc_contact_info', 'wr_vc_contact_info_shortcode');
}

// Contact Form (Visual)
if(! function_exists('wr_vc_contact_shortcode')){
	function wr_vc_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'contactfromid'=>'',			
			
					

			), $atts) );

				
		return '

					<div id="contact-form" class="'.$class.'">
						'.do_shortcode('[contact-form-7 id="'.$contactfromid.'" title="Contact form"]').'
					</div>
                
				';
	}
	add_shortcode('wr_vc_contact_form', 'wr_vc_contact_shortcode');
}
