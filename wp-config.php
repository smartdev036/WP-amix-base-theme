<?php
# Database Configuration
define( 'DB_NAME', 'wp_rhinolabs' );
define( 'DB_USER', 'rhinolabs' );
define( 'DB_PASSWORD', 'ydqBzXRmGj0CxOBEKvEn' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'rhino_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'U2q9}b7D&x`YeXLn}CuwuOe]JkN{f1|<h@hws6~BizGB6>Z$MX)X7S};7-GR-?p`');
define('SECURE_AUTH_KEY',  'i-rA=CQ%(sO9H-O<>59s=}qgh8CUe/}B&V[QFM`<75*#0Y~|C Loy_[%={`%DEO<');
define('LOGGED_IN_KEY',    'n#nGU<J.K,l3p`v](Q!W%}?u%-S-2~vgzqp`Ud;PB9|[$FK&bzZ0lrQP2/R+^&|&');
define('NONCE_KEY',        'Z9xUqN{eOOwwQo;%{A X8414_Fx[MUi?-=BpEGmpw/U|{x;a<AM@^~6}.bB#wCZ4');
define('AUTH_SALT',        'f#<]g6VFkfh:T]YG),u?[7Hv.fT}JF`u:D>KK#s|FJ7D?TI+/$GveC#Gr!Y1%SP$');
define('SECURE_AUTH_SALT', 'o&8BZ@Oan,_SZ!=MoT+q^[(N2rYZE=UVo>A,dFW cSO1TwRQ;7wZ[h9>FoyX$Ne`');
define('LOGGED_IN_SALT',   '7|SF|S)>]:]gMl?*e+wjv|2W2/uH:jw-= &8p.Hp`+hzc9<Pr&]v/PGEJBpGMm@%');
define('NONCE_SALT',       'h(CYRQ;MdOMH{-W&n?esHQC-%BPJivz7rMJ[e{<7,M6yde_/j+PW8#xl(P-Xi-Pg');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'rhinolabs' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'caec652dcd2ceab0a3ce84ff0e99740a9259a87d' );

define( 'WPE_CLUSTER_ID', '120020' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'rhinolabs.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-120020', );

$wpe_special_ips=array ( 0 => '104.196.118.3', );

$wpe_ec_servers=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
