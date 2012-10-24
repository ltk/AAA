<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

 /* Load in our environment variables */
require_once('environment/load_environment.php');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_ENV["DB_NAME"]);

/** MySQL database username */
define('DB_USER', $_ENV["DB_USER"]);

/** MySQL database password */
define('DB_PASSWORD', $_ENV["DB_PASSWORD"]);

/** MySQL hostname */
define('DB_HOST', $_ENV["DB_HOST"]);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '-Mo7_Clbk]j<lk*Wa|Nw3HY;_;|n~uheF+fOyteirG.>`nfhO|-U,0nnbAJisRk,');
define('SECURE_AUTH_KEY',  'Ro}2DQ<zFU@T-zwsuS<-VGr[]=]EphoQp9*d545([`+>*me_G1qf^D3Z$nH}AnS}');
define('LOGGED_IN_KEY',    'zwCfOe2J,nVLNf`1TC_}j7L4{Ua;S[JxuU]R]fQe}NL+W`IcBK,2jdYWu;&s6|v|');
define('NONCE_KEY',        ')xMml<O6DZ5j+#N-4crKdwy0 %1vt4zGV9*tN-jdiTBEkGVmEb vbe*,O[Uz+ <:');
define('AUTH_SALT',        'z:gVmu+?*DjP_c[+Jc[BjW@#a>_/O(o&_*J@-zAW`i_+t(BMF.q3&EA>d2j@Xy7}');
define('SECURE_AUTH_SALT', '?G#lCxLN]-9@.yQ%{~e2PvzHy1>m+4}7)m:pA<6^bX8Z9-grb~)O`LHWcw5SnWyW');
define('LOGGED_IN_SALT',   'N:qg:o{-N5G6_~V%rp@H<O5C$2L2 >MEBY==+LX=JC+U/I7[dqro_pg|>?z.1XIZ');
define('NONCE_SALT',       ',N%*8!.<S$I>Q(LQb,Z!dHL{?A{PF8Z6MG|JC`Qdfg*U SL=U,]r(KW%Uf0h4)f|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', $_ENV["WP_DEBUG"]);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');