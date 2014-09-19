<?php
# Database Configuration
define( 'DB_NAME', 'wp_hillsborough' );
define( 'DB_USER', 'hillsborough' );
define( 'DB_PASSWORD', 'xEZ6r27SzJC2wHFMoDaX' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'z=~@0;SZT^TJoq#bv:IPgg&N<+XPi{uQq<jw`<W|.`v;:5y:*|7<YHE.(`|GuzhA');
define('SECURE_AUTH_KEY',  '@|u!Knpr<JUx/G}V52Alk-HS]zE}?Wg !zh-@#qAhABLn}N &~`#?vX^F`[c_2+d');
define('LOGGED_IN_KEY',    'h?!>qp`ul3*><mm|%t.G0D2qF,+y#p]=7K0,i3,n{k+UY-($esTsgPF]LQMDHT4-');
define('NONCE_KEY',        '2!}l&V[B6c/rZZ8#>!sX82Om%EuN-Yr5T9~/PQ0+ )UD1tVh6#Akc$(?P|%Qg5^n');
define('AUTH_SALT',        '4~Tl$H?O%8GBVZZ.Jb-G:jKtEbcjaA3xg|<Dxk]J[X--de-^LPh<^X0Fw:kxoPxJ');
define('SECURE_AUTH_SALT', '!y5Mro<G)HgkwNP)kPlSj/QVk;O}{q-qh80;L-qO,hWFq9|mj$l5,~0<bQYt0F}H');
define('LOGGED_IN_SALT',   ']G9>9k@J c{*xB`XlNlSNKLG-Zl1I [&>qO=4M iN!qi7=R]DgdFBwQd_Wrsj<I!');
define('NONCE_SALT',       '9q3@EtbQ/V3nZTA_$+f!M/JOzgTY>x+EAQ&QmP?&=swou-s<=eJ-P+Nj+W~PGNO<');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'hillsborough' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '4beec9de8916584444cb82d46c11b015bc41556e' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '2602' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

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

$wpe_all_domains=array ( 0 => 'hillsborough.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-2602', );

$wpe_special_ips=array ( 0 => '176.58.110.97', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WPE_LBMASTER_IP', '176.58.110.97' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
