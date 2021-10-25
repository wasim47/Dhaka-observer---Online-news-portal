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
define('DB_NAME', 'dhakaobs_blog');

/** MySQL database username */
define('DB_USER', 'dhakaobs_masudr');

/** MySQL database password */
define('DB_PASSWORD', 'masudrana123');

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
define('AUTH_KEY',         'Uv xo,yl9z(,%6H4I+Ink>>Yqa6[SqX0,zYgy`@w{FYYy+B+3>&HX[FB|;<v-b:%');
define('SECURE_AUTH_KEY',  '~l]q~tI|:ygy|7srOUB:%8RQ`-$K!k)gP}_A9r2v-x]y{08Uj$DZeee#Mb[:d>`Q');
define('LOGGED_IN_KEY',    'RVomF-yK9Kl6|~~csMGDDKp#W!`~Aa!6U|I92~[<C|E8 | 4f?f=!oj|6K7k~>s6');
define('NONCE_KEY',        'T-?|93cLL*EQ( HXI_R^q3%e>t|w DGyN>`E}i6o_8r&;G}po8ZcevftuLUDK~|M');
define('AUTH_SALT',        'q2OM[h|-vy.nO`5L5B;4fR6vP,qm|v1r^.Yw`US7SU&fw@1z~$?[CnEU1!U+JVM&');
define('SECURE_AUTH_SALT', 'ok$(0{iBj-7&n&T/zY[wybvb!z&v7tr5p+Sk$-fn|XBD*v3+NQlS{|SUKW6f33H[');
define('LOGGED_IN_SALT',   'vQ.f7-Z6In^RW|3GjAL0c16O$C1/rCjNeWBIO3RHwS{xE&3cz&IXAh:v%$8AG_~U');
define('NONCE_SALT',       'olgO<Pe~tS>4,RzlWq|ksbs{kci;/W1/V-*nAU8x[;rN2$<|X^o3tw6JA9&]WD@7');

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
