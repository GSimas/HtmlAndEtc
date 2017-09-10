<?php
  add_action('wp_footer', 'wr_custom_colors', 160);
  function wr_custom_colors() { 
  $wr_options = get_option('bionick_wp');
 ?>
<style type="text/css" class="custom-dynamic-css">
 
    <?php if(!empty($wr_options['custom-css'])):?> 

	<?php echo esc_attr(AfterSetupTheme::return_thme_option('custom-css',''));?>		

	<?php endif;?>	
	
<?php if(!empty($wr_options['opt-theme-style'])):?> 

.color-bg , .logo-holder , .section-title h3 , .st-separator , .st-separator:before , .section-title-icon , .facts-title h3  ,   .section-separator a:before  , .box-popup:before , .featur-carousel-holder .customNavigation a ,  .services-holder li:before , .bg-title:before , .single-slider-holder .customNavigation a  , .btn, .custom-skillbar , .testi-item-text:before  , .testi-item-text:after ,  .nav-inner:before , .resume-box-holder:before  , .resume-box-holder:after , .section-separator span:before , .to-top , .to-top-holder p:before  , .to-top-holder p:after , .footer-social li a , .footer-info h4:before  , .ser-tooltip h5:before , .scroll-nav li a:before , .nav-button span:before , #contact-form input[type="submit"] , .fixed-filter a:before , .vis-filter li a   , .project-decr h3.text-title:before ,  .share-icon  , .fwslider-holder .customNavigation  a , .show-info , .pagination a.current-page  , .pagination a:hover , .post-tags a:hover  , .fwslider-holder .owl-dots .owl-dot.active span:before , .halig-center h4:before  , .ser-carous-holder .customNavigation a , .scroll-nav-btn , .controls button, .spo-footer-widget-title:before, .widget_tag_cloud a:hover, .spo-sidebar-widget-title:before, .pagination span
{

	background: <?php echo esc_attr($wr_options['opt-theme-style']);?>;

}

.sticky h4 a, .scroll-nav-holder nav li a:hover , .nav-inner nav a.curpage  , .social-item a i  , .grid-item span  ,.box-popup i ,  .text-title span , .testi-item-text a , #twitter-feed li a , .footer-contacts li a  i , .price , .contact-info ul li a i , .skills-description , .services-box h3 , .accordion-title i , .pr-list li span , .project-pagination ul li a , .post-link , .post-meta i , .search-submit , .hero-title h4 a:hover , .abl , #success_page p strong , #success_page h3 , .nav-inner nav li.subnav:hover i.subnavicon, .copyright a
{

	color: <?php echo esc_attr($wr_options['opt-theme-style']);?>;

}

.loader {
	border-top: 10px solid  <?php echo esc_attr($wr_options['opt-theme-style']);?>;
	border-right: 10px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>;
	border-bottom: 10px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>; 
}
.facts-title h3:before {
	border-color: transparent transparent transparent <?php echo esc_attr($wr_options['opt-theme-style']);?>;
}
.section-title h3:before {
	border-color: transparent <?php echo esc_attr($wr_options['opt-theme-style']);?> transparent transparent;
}
.tooltip h5 {
	border-top:2px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>
}
.fw-title {
	border-bottom:4px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>
}
.hero-wrap {
	border-left:4px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>;
}
.halig-right .hero-wrap {
	border-right:4px solid <?php echo esc_attr($wr_options['opt-theme-style']);?>;
	border-left:none;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
.scroll-nav li a.act-link  {
	background:<?php echo esc_attr($wr_options['opt-theme-style']);?>;
}
@media only screen and  (max-width: 1036px) {
.scroll-nav li a.act-link {
	color:<?php echo esc_attr($wr_options['opt-theme-style']);?>;
}
.hero-title h4:before {
	background:<?php echo esc_attr($wr_options['opt-theme-style']);?>;
}
}


<?php endif;?>		
  
 </style>
 
 <?php 
	}
?>