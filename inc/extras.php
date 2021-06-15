
<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ben_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

// Register options page for ACF field
if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'redirect'		=> false
    ));
}

//Styling login form
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// disable for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);
// add_action('init', 'my_remove_editor_from_post_type');
// function my_remove_editor_from_post_type() {
// 	remove_post_type_support( 'page', 'editor' );
// }

//add categories and tages for pages
function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

add_post_type_support( 'page', 'excerpt' );

/**
 * Function that will automatically update ACF field groups via JSON file update.
 * 
 * @link http://www.advancedcustomfields.com/resources/synchronized-json/
 */
function jp_sync_acf_fields() {

	// vars
	$groups = acf_get_field_groups();
	$sync 	= array();

	// bail early if no field groups
	if( empty( $groups ) )
		return;

	// find JSON field groups which have not yet been imported
	foreach( $groups as $group ) {
		
		// vars
		$local 		= acf_maybe_get( $group, 'local', false );
		$modified 	= acf_maybe_get( $group, 'modified', 0 );
		$private 	= acf_maybe_get( $group, 'private', false );

		// ignore DB / PHP / private field groups
		if( $local !== 'json' || $private ) {
			
			// do nothing
			
		} elseif( ! $group[ 'ID' ] ) {
			
			$sync[ $group[ 'key' ] ] = $group;
			
		} elseif( $modified && $modified > get_post_modified_time( 'U', true, $group[ 'ID' ], true ) ) {
			
			$sync[ $group[ 'key' ] ]  = $group;
		}
	}

	// bail if no sync needed
	if( empty( $sync ) )
		return;

	if( ! empty( $sync ) ) { //if( ! empty( $keys ) ) {
		
		// vars
		$new_ids = array();
		
		foreach( $sync as $key => $v ) { //foreach( $keys as $key ) {
			
			// append fields
			if( acf_have_local_fields( $key ) ) {
				
				$sync[ $key ][ 'fields' ] = acf_get_local_fields( $key );
				
			}

			// import
			$field_group = acf_import_field_group( $sync[ $key ] );
		}
	}

}
add_action( 'admin_init', 'jp_sync_acf_fields' );

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    acf_update_setting('show_updates', true);
    acf_update_setting('google_api_key', 'xxx');
}

//Saving points
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}
//Loading points
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//Wp ajax init
add_action( 'wp_head', 'my_wp_ajaxurl' );
function my_wp_ajaxurl() {
	$url = parse_url( home_url( ) );
	if( $url['scheme'] == 'https' ){
	   $protocol = 'https';
	}        
	else{
	    $protocol = 'http';
	}
    ?>
    <?php global $wp_query; ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', $protocol ); ?>';
    </script>
    <?php
}
/* Disable WordPress Admin Bar for all users */
// add_filter( 'show_admin_bar', '__return_false' );

// Add Body Class
add_filter( 'body_class', 'custom_acf_body_class' );
function custom_acf_body_class( $classes ) {
	if ( $body_class = get_field( 'body_class', get_queried_object_id() ) ) {
		$body_class = esc_attr( trim( $body_class ) );
		$classes[] = $body_class;
	}
	return $classes;
}
