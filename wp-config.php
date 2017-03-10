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
define('DB_NAME', 'vedasq');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/*
define('WP_HOME', 'http://nunta-noastra.com');
define('WP_SITEURL', 'http://nunta-noastra.com');
*/
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5A( sfE&k?/q@G.-V#<p ClY?=rta}yw8 ~^=z-2};=>uzbwt;Yf>},/En[3]6/}');
define('SECURE_AUTH_KEY',  'IL?5mNm:.=HE=e-&PqKRtNT3%Li}M}m4b5SmTHsRhyGeMMFW%[$Pa#/izKgK!B~0');
define('LOGGED_IN_KEY',    'B s-_|?|Y0_YYJk+#mA%/yJ<ziJJ+|4}BT}rDvAsjq$n7RH,_o2TB1;1s4qr@}!;');
define('NONCE_KEY',        '<Zsx!2pC.1_-l#D->[aMH2)Wu?]Xywf!qO ?A6+@% ZT+xfPLZfcQ!Q5$S~%a=cD');
define('AUTH_SALT',        '+iRiqT 8f#9{v{z$Ad}TPN=%vxNQ#s*^?x^;uWMC +_TwRQ2SnGv=UhLjjqK`xV/');
define('SECURE_AUTH_SALT', 'o44W>5L7f7JECxNk)/BAFttxy~tDZs7Gk~H H,.i~iBNBnfO$nD)Z1y,hH#e%]FX');
define('LOGGED_IN_SALT',   'Ih+EF5g{_*X$mbptZ~TbV#b|p+$`Dbg6j57L:Wh>CRVwEKAFS(PV?qE!tf:N%beD');
define('NONCE_SALT',       '9g:4na]6F:!AT;ZBv3vE_NAj|a kHm`[CK]$.EA!mxNK#V!Vl^Jx,Yy#k`:*aD1)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
