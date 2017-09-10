<?php
  add_action('wp_footer', 'cooper_custom_colors', 160);
  function cooper_custom_colors() { 
  $cooper_options = get_option('cooper_wp');
 ?>
<style type="text/css" class="custom-dynamic-css">
 
    <?php if(!empty($cooper_options['custom-css'])):?> 

	<?php echo esc_attr(Cooper_AfterSetupTheme::return_thme_option('custom-css',''));?>		

	<?php endif;?>	
	
<?php if(!empty($cooper_options['opt-theme-style'])):?> 

header.sticky  li.act-link a , .footer-social li a  ,   .share-icon , .fixed-icons-wrap ul li a  , .bold-separator , .fixed-column , .btn , .scroll-nav li a.act-link:before  , .scroll-nav li a.act-link:after  , .custom-skillbar , .price:before , .color-bg , ul.tabs li.current .tb-item , .testimonials-slider-holder .customNavigation a  , .accordion-title.activeac  h5 a , .resum-header:before  , .menu-inner:before , .customNavigation.gals a , .bold-title:before , .progress-bar  , #submit , .grid-det h3:before , .inline-filter .gallery-filters a.gallery-filter-active , .box-item.vis-det a , .inline-filter .folio-counter , .fixed-filter .folio-counter , .box-item.hd-box .image-popup , .post-tags li a:hover , .pagination a.current-page , .pagination a:hover , .carousel-item h3:before   , .box-item.vis-det a.popgal , .show-share:before, form input[type="submit"], .spo-sidebar-widget-title:before, .widget_tag_cloud a:hover, .page-links a span:hover, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .widget_product_tag_cloud a:hover 
{

	background: <?php echo esc_attr($cooper_options['opt-theme-style']);?>;

}
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range{background-color: <?php echo esc_attr($cooper_options['opt-theme-style']);?>;}

header li.act-link a , .text-title span , .dec-list li:before  , .resum-header i , .sl-tabs li i , .testimonials-slider ul.star-rating li , .to-top-wrap i ,.scroll-nav a.external:after , .mail-link:hover  , .price  , .fixed-filter .gallery-filters a.gallery-filter-active , .slider-zoom , .page-nav a span , .post-meta li i , .post-author-wrap li a , .controls button , .sliding-menu a:hover, span.wr-text-logo, .sticky h4 a, .woocommerce #review_form #respond .form-submit input 
{

	color: <?php echo esc_attr($cooper_options['opt-theme-style']);?>;

}

.loader {
	border-top: 10px solid  <?php echo esc_attr($cooper_options['opt-theme-style']);?>;
	border-right: 10px solid <?php echo esc_attr($cooper_options['opt-theme-style']);?>;
	border-bottom: 10px solid <?php echo esc_attr($cooper_options['opt-theme-style']);?>; 
}

.hd-box-wrap h2:after{
	border-color: transparent <?php echo esc_attr($cooper_options['opt-theme-style']);?> transparent transparent;
}

.tab-content:before,
.contact-info:before 
{
    border-color: transparent transparent <?php echo esc_attr($cooper_options['opt-theme-style']);?> transparent;
}


<?php endif;?>		
  
 </style>
 
 <?php 
	}
?>