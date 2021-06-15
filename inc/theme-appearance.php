<?php
/**
* Customise the log-in page and admin dashboard area logo 
*/

/**
 * Change admin logo url
 */

function am_login_logo_url() {
    return home_url('/');
}

// Add Gogole Map API

function am_acf_google_map_key() {
	$key = get_field('google_map_api', 'option');
	if($key)
    	acf_update_setting('google_api_key', $key);
}
add_action('acf/init', 'am_acf_google_map_key');

/**
 * Retina 2x plugin supprt: get URL
 */

function am_get_retina($url){
    if(!function_exists('wr2x_get_retina_from_url'))
        return $url;

    $url_temp = wr2x_get_retina_from_url( $url );

    if(!empty($url_temp))
        return $url_temp;
    else
        return $url;
}

/**
 * Retina 2x plugin supprt: return IMG
 */

function am_get_retina_img($url_normal, $class='', $w = '', $h = '', $alt = ''){
    $url_retina = am_get_retina($url_normal);
    $srcset = '';
    if($url_retina){
        $srcset = ' srcset="'.$url_retina.' 2x"';
    }

    $width = '';
    if($w){
        $width = ' width="'.$w.'px"';
    }
    $height = '';
    if($h){
        $height = ' height="'.$h.'px"';
    }
    return '<img src="'.$url_normal.'"'.$srcset.$width.$height.' alt="'.$alt.'" class="'.$class.'">';
}

/**
 * Chnage admin logo image
 */

function am_login_logo(){  ?>
    <style type="text/css">
        body.login div#login h1 a {
			width: 60px;
			height: 100px;
			display: block;
			cursor: pointer;
			text-indent: -9999em;
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png) no-repeat;
            background-size: 100% auto;
            margin: 0 auto 35px;
            outline: none;
        }
    </style>
<?php }
?>