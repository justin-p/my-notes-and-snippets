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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'garden');

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
define('AUTH_KEY',         'zY+TAzC#M.N-$?tcgX;BoiKZ?|K$sgip]xa:h@bFFf;}jWLLSClO JC|%eEA!k6k');
define('SECURE_AUTH_KEY',  '||3F}Eq_rl`)5+mj*F(s[C_qM+8fYX!aH;i^OdEe&0ILJ#cUK&t*oue}+N!1pHJ{');
define('LOGGED_IN_KEY',    'e6/jXKduDV#(0v2{xYIDJ3uB2g,Nj_%W31vGr(I!&CVg2.xr$e-wUNJTm4s:>Zaf');
define('NONCE_KEY',        'yV;X.aP}+|GCj+/Y>bwfW+wq5v4_%*66v*CXBc!=+C,y9aBTo:<!nq$?R<aaiV,,');
define('AUTH_SALT',        'K7Fq-WO#DapL|1-+-&}j:(MQ<8~y2Vh[OX^dYNXO82Ki$o0i:qR-6?O@!!|7<(,o');
define('SECURE_AUTH_SALT', 'sDp^0T8HH1*)LgT<$P|#P|g}7B-+,H2b,-ocXGP/4$[Rp9}q+NMy[niWb6SvCOYy');
define('LOGGED_IN_SALT',   'SZc:>&F??VjhK6=l(W7Ml~Q,}bN),h0_<67,-(>aYvS2;Zn0GOmx7|S1-*C;d*hl');
define('NONCE_SALT',       '4=`OuvBpU+o2:FXkhE6Axo#-[o*g{t&.6&7f<qQcN):Mx2=xSa/]xh~+kXytr?7q');
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

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
define('WPLANG', 'nl_NL');

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
