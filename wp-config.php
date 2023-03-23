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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sportisland' );

/** Database username */
define( 'DB_USER', 'vladimir' );

/** Database password */
define( 'DB_PASSWORD', 'PhmEQQ5TgzG7N9F' );

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
define( 'AUTH_KEY',         '&T-pga2t(=ex.*+ayM 9-%~eEWdV?K7_7 CCD8KSfN+;PkC:KAJ!a]yE.[ut:%e8' );
define( 'SECURE_AUTH_KEY',  't`?}M*~Dga&PPG?+J5aaxA6@SY1O6n<[*n-D}~]Hw`2>rPrI_fbZ,Nz~~Fe0)lEg' );
define( 'LOGGED_IN_KEY',    'ecD~o|wP@bn?V041R([0R-FkpRbs`RkMF&7bnFrANw%R5W-)VXdBZ(L6%&~b{:@F' );
define( 'NONCE_KEY',        '{xKN?H8d6AK3!J#/C|Y0Z&~pmv>sovv1y:wOq,QSPk`03/5-Bx_U0zI~W<g4js}W' );
define( 'AUTH_SALT',        '7.4HsBPo:R$h=>!C,;<fw<7INf<!Xs!r$4J</qlQOd0iw(;Dm7*9j<e`[vG/4{TA' );
define( 'SECURE_AUTH_SALT', 'M%2LhqjkJ_g$N1ft--t|tqBiv<M]gA*<pzwD#Mo|i3Yr;VEX(4}[!F dHtc2Rf;4' );
define( 'LOGGED_IN_SALT',   '}aWpG1oE@~Q*UL_7l>WWOQKf*_zVia{Mwr[H`{8>d1nF/$uQ( zN925r+b):Afs2' );
define( 'NONCE_SALT',       ']?$Pz&/,lUD]DNh4q~v#@0)UP+T:zcN17zG|,T#wqz5we:.K>SeQ/ 47)>oJ,YV<' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
