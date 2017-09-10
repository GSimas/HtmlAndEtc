<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */

global $smof_data, $zo_meta;

$container = 'container-fluid';
if(!empty($zo_meta->_zo_header_width)){
    if($zo_meta->_zo_header_width=='off'){
        $container='container';
    }
}else{
    if(isset($smof_data['wide_boxed_header']) && !$smof_data['wide_boxed_header']){
        $container='container';
    }
}
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
    <div class="<?php echo $container;?>">
		  <div class="row zo-header-main">
			<div id="zo-header-logo" class="zo-header-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="zo-main-logo" alt="<?php esc_html_e('Main Logo', '3d-printing');?>" src="<?php echo esc_url($logo); ?>">
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
									'items_wrap'     => '<ul class="nav-menu menu-main-menu">%3$s</ul>',
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
