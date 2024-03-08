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
define( 'DB_NAME', 'prowhiz' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '6[F&k/@JcbX[<7KN[(4gxur86h0vQdHOU7iw%M. 9H8T-xjC=V)}lf3%*.!S*y/F' );
define( 'SECURE_AUTH_KEY',  '}1O0c|0zw.IWx53R[A=0QTYrgwDZmb+55%)`SC?{SBy&~ki|21:iEE]OZPRlEq24' );
define( 'LOGGED_IN_KEY',    'xK*GY1v>/x2WW}nJO7nB&3HTgJe;f?]pVZIe=ga+Xh39<(3ZxP|WZM1|Bhdp!;d,' );
define( 'NONCE_KEY',        'iF#xb SPbXf4N02uu87uYBxf~`]H%m62/{gKQn5vOaoQ+DPJSMKU2PX2`CnI8sXl' );
define( 'AUTH_SALT',        '+d6eIDed)3_EEPyRD7D`UbtoNJ5dk>QkY@C|vZtT_@u)/gM{ZuW.DRHO)?kWXNk~' );
define( 'SECURE_AUTH_SALT', 't7Jh]^NPNJHjQQZG+uoGQZ*fG(0OSf/46cecp8_rWr {u%rN&w(o#*`$xTF/gdYx' );
define( 'LOGGED_IN_SALT',   '2&.egy~/!1optS^ovdD(tL-1[&[13eS$9B!SAJU29-otsc2PLh>s%58,VfPd0: ;' );
define( 'NONCE_SALT',       '%lxf;[{V}%{JRs/L*m<JcKB1p ~*U*8~%}7-=BOm^g.ZHy!s[8d{c2),N/nt{p2a' );

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
