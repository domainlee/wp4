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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_4' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '_k?Qud`Hg/?PfT!$B+h<qXQeeakmSIZ`-C9~QY&fY@] p~)lnAE!E3E0`UTUMz*8' );
define( 'SECURE_AUTH_KEY',  'mf(qFD_6/],D7A.yG@g,_UPAu}Ccrl-&Q1I+{G)6!)+d=m~^=_KzodJiQ,KEoI+7' );
define( 'LOGGED_IN_KEY',    '^_hAB8q>>^]}LYWHWBQ[^8Wgh^NLdTEEPbgt)x_8SR]N3W=;L>S]VD3oM_+H(i&,' );
define( 'NONCE_KEY',        'waI5;G6`pzAe[2/P <(E~_|4H=!{^kbO??By*ZZRdQ>!thIW={W9dPzg{Ze@Xzx6' );
define( 'AUTH_SALT',        'NIY,bGM}zqW)@V6&ElM,y)8cgahIO DQO_ vU&ISuKWg94(6wc307A>P5h/f^((S' );
define( 'SECURE_AUTH_SALT', '3mikn&_N|gTsX(LX2hl+*mc>U/XPo@M<lDlB}*Pj.:[i7zx9`84.&birw?fU_C? ' );
define( 'LOGGED_IN_SALT',   'U?,,.M_$2f{TbHhSOr,xJOz_|vmeW7d5N0OE`*jZ%hTknQzbis[]6Et}T9(9@1; ' );
define( 'NONCE_SALT',       'vD*Vr@tp6uy8mQV2HF}y;#<ccLt,gRJ$&RBThRsZXb$}dI[NuIhpRNd#eOI8woqX' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
