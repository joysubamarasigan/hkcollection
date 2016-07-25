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
define('WP_CACHE', false); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\xampp\htdocs\hkcollection\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'hkcollection');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?oLzSf}ieBNdEsEeP*tca6tPn:]ayR$9b[>Z6s09Ul7:^vd1@8$_r>GDdDw[4,!U');
define('SECURE_AUTH_KEY',  'qn9SI>w1/l 6@Q@P(#0R}g)h3X~q5;=k<p]}3&S~P.W!y6{hiWtv(H55mE?rLEHB');
define('LOGGED_IN_KEY',    'm-muT$P{}|02Ya?p{%:&O``82KwG:w>7Jd,1*uya1$8#l?GrO^t;7P%*.Pf!FzA}');
define('NONCE_KEY',        '*j_IG+0Lxl4nN/aA!<Sgl{!BtnW>+P1q~{BDT*;6]>Pf`[uwWbT03WO`I;6wQChk');
define('AUTH_SALT',        'Yy$B;6R@D$!T6mU1ehS.F)u%<Jaos}yCdH;mki``qrc}*NY`]4ADjkHiv_#J`TS)');
define('SECURE_AUTH_SALT', 'mpoP_,zH;vVlkjG}E#AvjC|-+wgYcG9[0wO:OZVSQfOQ*Q,!E>VpK5b=G bH?{qV');
define('LOGGED_IN_SALT',   'a@8f&u7D*t>;xO)4`;O90~gH74vp2O`a6cVwfPa^=!zwS}Q[I00Vyl5-6uI>-k`4');
define('NONCE_SALT',       'sR`x=y.0(7?N&WJSs:E-A=IEqsB9zG/aWvX??luk62[t{3L9BHK:biD9)d~cqV+V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hkcollection_';

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
ini_set('max_execution_time', 30000); 
define('WP_DEBUG', false);
define('DISABLE_CACHE', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
