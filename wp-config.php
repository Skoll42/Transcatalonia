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

if (empty($_SERVER['SERVER_NAME'])) {
    $_SERVER['SERVER_NAME'] = 'transcatalonia.lh';
}

defined('WP_HOME') or define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
defined('WP_SITEURL') or define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);

define('APP_PATH', dirname(__FILE__));
defined('CONTENT_DIR') or define('CONTENT_DIR', '/wp-content');

defined('WP_CONTENT_DIR') or define('WP_CONTENT_DIR', APP_PATH . CONTENT_DIR);
defined('WP_CONTENT_URL') or define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/** Enable W3 Total Cache */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'transcatalonia_tours_new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'ud!&;a3|2kbrfLEH]qGlh43Pn74;O--*aJ+o@wHocT(Y(6Z0]HDZOz3jN-_nEs{c');
define('SECURE_AUTH_KEY',  '@zu}m+=Qz*cl:lWkB+Md#NFI^|>4[)=5=2aDg(|-%1i0|-LTPvD6?UBcL7E9%wEM');
define('LOGGED_IN_KEY',    '>-sK#I!Cx_?I]?B|*APtb$:|!ZOtWY@@-71`U|D6I[rQld^xd7>Y*+8Lyz(H%.hP');
define('NONCE_KEY',        '*-5Q92-AZ$+NY7,5!|VS-ctByw{tVwC{bIm>Kh*e,93;}w33h2cxEWZWyQ~_9 )-');
define('AUTH_SALT',        'c7b+mfp<]i{Ko#]f/9xB~@b:ZXpUL;PL-AO)k,Z@LB%6<2E/^) Y>0@OH-2)W[? ');
define('SECURE_AUTH_SALT', 'O3@lt]`y!#g0<a9dw|=)<>2/~A-u:E9u, x*Bh]l1NX]9zHcOM47i_=*R4]Qm!-M');
define('LOGGED_IN_SALT',   'D*S:M^?cO46fFgu/ Zf#H~a[-3{4I@Umk$[EjIifA6;la&Uk F|xz-Ge&w7oRQ}G');
define('NONCE_SALT',       'm!Z+HN2fk]sO+b~;%D4;sF`Ley|u(  UJM0gn%t/~9HVPhyhe=+d!wh%=C%}+6?>');
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
if (!defined('ABSPATH')) {
    define('ABSPATH', APP_PATH );
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

