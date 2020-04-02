<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\Users\Dmitriy\Downloads\os\OSPanel\domains\impreza\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'impreza' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?<cC+jUqMR&^/ZVd!9CW]SK9wtPYV/EQL2hS8^,}W/<pBt{Tvva)OGhHP#bKEn:N' );
define( 'SECURE_AUTH_KEY',  '{9$jebR$3A`.t~.tdZ*fWH),G7 :S2}?(C*L$jtz5+(m<f+?m$}z997?.lfI|iXZ' );
define( 'LOGGED_IN_KEY',    'QZ6zVRETN/C`31/Bh/Dapn*n*19`e4FHanNFx]8b/m%uYXBVi9Gd-l}$>3{TmF <' );
define( 'NONCE_KEY',        'Tko&Rv: =BizRC6Qn-_&B8Sp:2MShl_>w@|QsPADc@.Y*(]b0mb{(4Bj,Nj H[ =' );
define( 'AUTH_SALT',        '[S,nhlMepX3<JPsVRH(?f_R{+_:!eD=8`qw5N@$i!%65mAw=1>>BMa05al6XRlN4' );
define( 'SECURE_AUTH_SALT', 'jfOJ+4!V{mm.?o_-%UxFWWDUSsr-n3l)i]pDk(N.Y^jq>cu?eimB,nn}&fLv<g_t' );
define( 'LOGGED_IN_SALT',   '^on~y7>3I9$$A158UsG=q!?le+7@J(QQi]a};[TL 5#Ul1oVn{af{TuTmcR7gr<?' );
define( 'NONCE_SALT',       'z/E?Gok&O@*ph:OaRX@{.y-5t+pRIEkP^>:@)lnC1`| }l>J?Dk{9@MK[/drS#ix' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
