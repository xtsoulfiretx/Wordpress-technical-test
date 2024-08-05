<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '80DhO<q*+P[N0>({RwjI-jdB#Yrt-En-:&sj eY%_hYC{;s;w;2dOp^xXjSoEa3u' );
define( 'SECURE_AUTH_KEY',   'aJ8.ay1a9/~G#)=7=5=?6o_g#,qpwGUa$~%I_x.<${]=J*xYK>sELoz9.#8k)>t+' );
define( 'LOGGED_IN_KEY',     'S~7k-DKC]MFI@vtUAX8w?8xh<k%GT7Ubaw[n&3w{_/VUao`n#b+ykSE}n#q=8wz3' );
define( 'NONCE_KEY',         '2K=(>`2h9xi8A980(c6DLzS:Wx8);WFc6sr?If ?TbR[*C?& G|N!NL,5^*I%pp@' );
define( 'AUTH_SALT',         'ln&qm/wy-KOw;@N9cdLNqYeEk7LJG}3ky].=T#`R <)Bi;S>N@D$B(JSM,D$Iw|=' );
define( 'SECURE_AUTH_SALT',  'NoxvO=Az##<4LuZtJSHIvd%n9`H4DGoT$M8MFG>.*qLgs-E[xbq]BUB]] n/UNCd' );
define( 'LOGGED_IN_SALT',    'I+3H)-B%^?$+><(h!0M#-!WmyqiBf* ALm=)+ShiS?/YDoL5?(s^cm+0^-(TN~}z' );
define( 'NONCE_SALT',        'R+PcL_AHm+TQvC(^w4s8TwA0AtO3|}`YRKiP`@3mqwTBP[+L4BDy1x|X)CDI%RB%' );
define( 'WP_CACHE_KEY_SALT', 'v45$;@yT8=vsubt=tb_P##wi8)8cNN/Ad}m4/vy*Q<nA?ZR)#iZ1C0x7)xBYLKk%' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
