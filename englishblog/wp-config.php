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
define('DB_NAME', 'dhakaobs_blog_english');

/** MySQL database username */
define('DB_USER', 'dhakaobs_masude');

/** MySQL database password */
define('DB_PASSWORD', 'masud@rana!@#$%');

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
define('AUTH_KEY',         'Opm5zM@DMkgos*~L63$gs]Gqe;V+&)fKZQ8Rg>q}-7NVDHHS=?&d>f$kw>}/)Yc ');
define('SECURE_AUTH_KEY',  '/QIBAS]X1yO<;|3ue@fQ+Vu/RF,}W}1D/{7f7+q(*.k#f&J(?*yHWb[0=!WJ((wR');
define('LOGGED_IN_KEY',    '+]>|RuyZPs6Q,U-a(,,-iK58c*Wdv%|n+cJ+9YJ>m5#[_G&];1e:{+WMmyZAW~PF');
define('NONCE_KEY',        'Wn)Jt? >}O7NkzEK~HyW8ObukE/xOcRA~w9kw_w$%9ni&Mq%#-<_GO|/|s`g_Y!]');
define('AUTH_SALT',        '6NOjYh_I|=M+^U<GZIRnU+o9bke6Y+Kv$kw=Q-q:Rr*P|lZQff$=W>*7xes*woh{');
define('SECURE_AUTH_SALT', 'Wg8Uc|V2m9NO-<Jx.. cFa+#N~tKD2K|Bakc1Pr(01-yX|-vjW:5ts8@ A/%g6hY');
define('LOGGED_IN_SALT',   'Y)#,a4OITS-uwUxVL@t 6^FdL;AOWhJU2b{}e),5YDxj_>W-5{B+p^o|b?H2ZCP)');
define('NONCE_SALT',       'oE6)Q[wHtLV#i$b3<sNz]O^nI6`,WQDYT4B++aR{)?LdfF-Q93RmKB{[SMF0viAI');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
