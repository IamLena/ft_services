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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'bshang' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mypass' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql-service' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_HOME', 'http://192.168.99.231:5050' ); # EXTERNAL IP
define( 'WP_SITEURL', 'http://192.168.99.231:5050' ); # EXTERNAL IP

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fMX(+)TqX*C-?na*%7slHU)#Wh;=Zc+|#P:?Ap7xfv!o5*><=U_GBoq-nG;6n?19');
define('SECURE_AUTH_KEY',  '-;cP9k)Kr@ABk~Q$RX]8#}bF()KlBA]!~.E[i{WF!H}o%q=^4xCqULo/n~93bntf');
define('LOGGED_IN_KEY',    'FT0di7tmRb{E/(:03F1NZh`wpq<I%!IA+Ix<5[KEX=nl}+);]yVg9q6R.#Wv^aBR');
define('NONCE_KEY',        'Wijr(%@,nuXcq:F%OkjibtQmtyv*23dD/PXx7$JAIS#7>--D].E=QBytFe-dn+KY');
define('AUTH_SALT',        'Xzoa_U_{X6f^E;Q`-DNTvsBTg9(4Vhu6k.F{ H$q*SkakC|RM+|78PRk5|jPCOc5');
define('SECURE_AUTH_SALT', '^P|#5&9A+:bN>_%:E`v~TE1]^u?+mO6m[q@bIq<+FhXB!snKRG5&!z/) Ko(Jfm-');
define('LOGGED_IN_SALT',   'D][5ZWB3/[C^rh)Q7j:CQ(B0RN/of+4(=0sR`aLYC0!yJr_f,M?v*]1<7*=w4v-p');
define('NONCE_SALT',       'L-&u=;oy;/mh:gun:l$:L2>hRXi9Yb+&xf3JRwX{>Up}$SZkSpx@$@#,QrBRq}Ra');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// if ( ! defined( 'ABSPATH' ) ) {
// 	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
// }

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
