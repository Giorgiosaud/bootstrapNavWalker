<?php 
add_filter('get_custom_logo','change_logo_class');

function change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-fluid"', $html);
	$html = str_replace('class="custom-logo-link"', 'class="navbar-brand"', $html);
	return $html;
}

if(!function_exists('wp_nav_bt4')){
	function wp_nav_bt4($menu){
		wp_nav_menu( array(
			'menu'              => 'main-menu',
			'theme_location'    => 'main-menu',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'nav navbar-nav',
			'container_id'      => 'exCollapsingNavbar2',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => '\jorgelsaud\WordpressTools\NavWalker::fallback',
			'walker'            => new \jorgelsaud\WordpressTools\NavWalker())
		);

	}
}