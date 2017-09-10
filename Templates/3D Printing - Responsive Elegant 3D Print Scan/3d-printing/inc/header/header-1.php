<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php
global $smof_data, $zo_meta;
$transparent = '';
if(!empty($zo_meta->_zo_header_transparent)){
    if($zo_meta->_zo_header_transparent=='on'){
        $transparent='header-transparent';
    }
}else{
    if(isset($smof_data['header_transparent']) && $smof_data['header_transparent']){
        $transparent='header-transparent';
    }
}
$container='container-fluid';
if(!empty($zo_meta->_zo_header_width)){
    if($zo_meta->_zo_header_width=='off'){
        $container='container';
    }
}else{
    if(isset($smof_data['wide_boxed_header']) && !$smof_data['wide_boxed_header']){
        $container='container';
    }
}
$logo = get_template_directory_uri() . '/assets/logo.png';
if (!empty($zo_meta->_zo_header_logo)) {
    $logo = wp_get_attachment_url($zo_meta->_zo_header_logo);
}else{
    if(!empty($smof_data['main_logo']['url']))
        $logo = $smof_data['main_logo']['url'];
}
?>



<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default <?php echo $transparent; ?> <?php if (!$smof_data['menu_sticky']) {
	echo 'no-sticky';
} ?> <?php if ($smof_data['menu_sticky_tablets']) {
	echo 'sticky-tablets';
} ?> <?php if ($smof_data['menu_sticky_mobile']) {
	echo 'sticky-mobile';
} ?> <?php if (!empty($zo_meta->_zo_enable_header_menu)) {
	echo 'header-menu-custom';
} ?>">

    <!-- Header Top -->
    <div id="zo-header-top">
        <div class="<?php echo $container;?>">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 header-top-left">
                    <?php
                    switch($smof_data['header_top_left']){
                        case 1:
                            $contact = array();
                            $contact['contact_address'] = isset($smof_data['contact_address']) ? $smof_data['contact_address'] : '';
                            $contact['contact_phone'] = isset($smof_data['contact_phone']) ? $smof_data['contact_phone'] : '';
                            $contact['contact_email'] = isset($smof_data['contact_email']) ? $smof_data['contact_email'] : '';
                            zo_header_top_contact($contact);
                            break;
                        case 2:
                            zo_header_top_social();
                            break;
                        case 3:
                            zo_header_top_navigation();
                            break;
                        case 4:
                            if(is_active_sidebar('header-top-sidebar-1')){ dynamic_sidebar('header-top-sidebar-1'); }
                            break;
                        case 5:
                            if(is_active_sidebar('header-top-sidebar-2')){ dynamic_sidebar('header-top-sidebar-2'); }
                            break;
                    }
                    ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 header-top-right">
                    <?php
                    switch($smof_data['header_top_right']){
                        case 1:
                            $contact = array();
                            $contact['contact_address'] = isset($smof_data['contact_address']) ? $smof_data['contact_address'] : '';
                            $contact['contact_phone'] = isset($smof_data['contact_phone']) ? $smof_data['contact_phone'] : '';
                            $contact['contact_email'] = isset($smof_data['contact_email']) ? $smof_data['contact_email'] : '';
                            zo_header_top_contact($contact);
                            break;
                        case 2:
                            zo_header_top_social();
                            break;
                        case 3:
                            zo_header_top_navigation();
                            break;
                        case 4:
                            if(is_active_sidebar('header-top-sidebar-1')){ dynamic_sidebar('header-top-sidebar-1'); }
                            break;
                        case 5:
                            if(is_active_sidebar('header-top-sidebar-2')){ dynamic_sidebar('header-top-sidebar-2'); }
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="<?php echo $container;?>">
		  <div class="row zo-header-main">
			<div id="zo-header-logo" class="zo-header-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="zo-main-logo" alt="" src="<?php echo esc_url($logo); ?>">
                    <?php echo zo_page_header_sticky_logo(); ?>
                </a>
				<?php if(isset($smof_data['text_logo'])&& !empty($smof_data['text_logo'])) echo '<span>'. $smof_data['text_logo'] . '</span>';?>
			</div>
			<div class="zo-header-secondary">
                <?php if (is_active_sidebar('navigation-right-sidebar')): ?>
					<div class="zo-header-navigation-left">
				<?php endif; ?>
						<div class="zo-header-navigation">
							<nav id="site-navigation" class="main-navigation">
								<?php
								$attr = array(
									'menu' => zo_menu_location(),
									'menu_class' => 'nav-menu menu-main-menu',
								);
								$menu_locations = get_nav_menu_locations();
								if (!empty($menu_locations['primary'])) {
									$attr['theme_location'] = 'primary';
								}
								/* enable mega menu. */
								if (class_exists('HeroMenuWalker')) {
									$attr['walker'] = new HeroMenuWalker();
								}
								/* main nav. */
								wp_nav_menu($attr); ?>
							</nav>
						</div>
                <?php if (is_active_sidebar('navigation-right-sidebar')): ?>
					</div>
					<div id="zo-header-navigation-right" class="zo-header-navigation-right">
						<?php dynamic_sidebar('navigation-right-sidebar'); ?>
					</div>
				<?php endif; ?>
			</div>
			<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
		</div>
    </div>
</div>
	<!-- #site-navigation -->
<!--#zo-header-->
