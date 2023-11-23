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
define( 'DB_NAME', 'wp_test_db' );

/** Database username */
define( 'DB_USER', 'roman' );

/** Database password */
define( 'DB_PASSWORD', '123' );

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
define('AUTH_KEY',         '<H~J@l!k(o}x^,O^3-d7vTlXmb;f(c*:5Otd$|7H_Bx*e/(]^B^g`t_;&+|bZ.<B');
define('SECURE_AUTH_KEY',  '8u/X$|OQ?]$Vej:V&$YIgL(Fc/$p7z0o&#C-^-U6n8-Ct@`$~kS<+AmFv1Wze79;');
define('LOGGED_IN_KEY',    '16^`w+6e(i?n-fbLb5UT=3:ISV~E&=od~:ePNb$r0+55|BU2D0jn#>4x(wi~iA!!');
define('NONCE_KEY',        ' 1p%,~Rc.KTT g?P]R+w-0L)[%jeT5wS| I?ZY6RubkDecmY3X!@.??2~W87:~0a');
define('AUTH_SALT',        '#e{g4F2k99EM&#sH8Q@T:?clFO&OFELg+-Nl1xH,:.#WYasqk4v/V=?tOx>S7i#B');
define('SECURE_AUTH_SALT', 'q%C6yE/x,d!K0=6I73-{4VDVP-/e7*{WGp6j-!n*aYF8=KY5t/hGkN}Ao*7>b`|%');
define('LOGGED_IN_SALT',   'e;^Mf4GuvNiA_rIUbJJ>f+UbK}byy$|W-h*^|YNgO1$.9>gqJk5wqw7t8ti22|@p');
define('NONCE_SALT',       'jsTMUVNu<YR0O=@q@+`w1zc~*/*?D z7-Ihyt~/{7!}r xiGIHG_IPv5tv5T-,s*');

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
