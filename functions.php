<?php
global $am_option;

$am_option['shortname'] = "am";
$am_option['textdomain'] = "am";

// Functions
require get_parent_theme_file_path( '/inc/fn-core.php' );

//Where to edit login page and dashboard logo
require get_parent_theme_file_path('/inc/theme-appearance.php');

//Load Custom Posts file
require get_parent_theme_file_path('/inc/custom-posts.php');

//Load Custom Taxonomies file
require get_parent_theme_file_path('/inc/custom-taxonomies.php');

//Custom functions that act independently of the theme templates.
require get_parent_theme_file_path('/inc/extras.php');

// Extensions
require get_parent_theme_file_path( '/inc/extensions/breadcrumb-trail.php' );

/* Theme Init */
require get_parent_theme_file_path( '/inc/theme-widgets.php' );
require get_parent_theme_file_path( '/inc/theme-init.php' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_parent_theme_file_path( '/inc/class-wp-bootstrap-navwalker.php' );
}
add_action( 'after_setup_theme', 'register_navwalker' );


?>