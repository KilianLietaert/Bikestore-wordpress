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
define( 'DB_NAME', 'bikestore' );

/** MySQL database username */
define( 'DB_USER', 'doran' );

/** MySQL database password */
define( 'DB_PASSWORD', 'doran' );

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
define( 'AUTH_KEY',         ':? j&>j{{|4c*WrO{*JU)<G~ &h&Cg)8S&KyRC)%D>^i)N|sP6LP[3O$N[QZBkLG' );
define( 'SECURE_AUTH_KEY',  'A!rfARs1-f%!rNGz.qY]R2=<o-ff4Q8# |9(?gNS[oEyecjH<rrO,8hAzM3v_uc/' );
define( 'LOGGED_IN_KEY',    '%Q6p!k@Z+Y}xjJ-/@ETwOwM:JeVA<r_i/Th!3se,y-WP%PQ4MB%dH3*GmG)F:Fz5' );
define( 'NONCE_KEY',        'KEWaNg4oxpBY?Vucqx,u<KR|4PdyO=ie1DqW]mQ`72FPYkQBX(8`c#RkuCjSF/e^' );
define( 'AUTH_SALT',        'V_Yn,i9~1r!`.YOs@(;HS ^6 eR8xM+-J{F8,y lh0K:n*Pq =x0EAkWnFGe(-r+' );
define( 'SECURE_AUTH_SALT', '`1Z)b{AgoA,=%LJ0hj=)_&FqkMJ&.eCG@:IdL[QHQED)%IT@N-4uj e*Aqto/n3)' );
define( 'LOGGED_IN_SALT',   'PhWx|*^*G25i(^Y6W^AU]~IT8&%bdoP!VuPxT)pn1XY-(-D#G&1+g$CxlycDm_% ' );
define( 'NONCE_SALT',       'k[x_ggx]g[BO%)M,CbK>)NX VSV:#*]Qi@6% @|%Ru,h9#/GSG]}Wg::I/CepPu@' );

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

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
