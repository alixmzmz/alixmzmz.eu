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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'www.alixmzmz.eu');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define( 'NOBLOGREDIRECT', 'https://www.alixmzmz.eu' );
define('FORCE_SSL_ADMIN', true);
header('X-Frame-Options: SAMEORIGIN');
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '16327wordpress20120530110147');

/** MySQL database username */
define('DB_USER', 'alixmz4577');

/** MySQL database password */
define('DB_PASSWORD', 'lJQvvEcP');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '6.A?AF!9P^uI~M_K%Mw|MQ]{My<F()I6*>Nm1C5w;<+L9y>A*MIG`H:Yi})zieH_');
define('SECURE_AUTH_KEY',  '*<hm2EA;%UCd*{VER]dc4%Uf#vw>{$b|*r@mafC+9h^rtr[hGx3_6*8l7!682mVC');
define('LOGGED_IN_KEY',    '4b}-I%i_~:AY}(p^ke1BXVujI7t+v4z waMM*>+mZ.bZ_Z}nzIDv|mFO}4.F,4Fr');
define('NONCE_KEY',        'I!o@w1|*!Pj?;FW8gwyTIy_t6<yi&`Vm+g,&ykKCyGgk6L=h2A`}:S%!GY]XAwVH');
define('AUTH_SALT',        '5D&LYdTqC/uJIxBP1j{1AP+mC4tA?#-<[0@7t6)SDDK0&0AESfckutUJ]Z`MIkZ=');
define('SECURE_AUTH_SALT', '{H/@H:Q}0TWfZehZ=sxi;<#jrl]Do+b^q<3ddCt5J8u)%NDz+|;YvTf/G$gQxw^G');
define('LOGGED_IN_SALT',   '~cFU~c?TBD8pX*U-n;[}1B,VO2KyN<#@uG@DDZ:c6d_+OC$3<W6_+oKldl=Z%%%J');
define('NONCE_SALT',       '?O!M=2#LWY:;#<RAL-0^i^6IU[, l> )g-w~NbTK)lklJg6*aF=wMS4o7}:%?4q>');

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
define('WPLANG', 'es_ES');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
