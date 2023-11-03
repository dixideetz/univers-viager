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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'u_.D~*owTA=Xzu?L@2Huy#ZSVYT@zpl&K?{Wlm50Hxa4 5NaRY@>x#u.xLk}|eSg' );
define( 'SECURE_AUTH_KEY',   'n/0cF!UL6pdd;-{MP2Et>pw1-g{B08B$8}22Ky}sCr)-g^Hv[1Yv7$?&/T]7xpni' );
define( 'LOGGED_IN_KEY',     'C,6[O]y|UZ8^wV:EuXA{+{=g<|qMCuJzmdtppH-:t<y0%}_>doEkH2oo#Yl&V&p8' );
define( 'NONCE_KEY',         'i?~4-E;q2j9Sa6REvyP%l-jCcQ.N)4V:/r@h2A=]^JTERs!i-95zCH7DYOPOyI/8' );
define( 'AUTH_SALT',         '*Fc zI ||pTUV*8Ln0r|$VOqRvlz6%Y{E; ~bK vKg-Y@+huC6~<lW]p]%9-<IG ' );
define( 'SECURE_AUTH_SALT',  'pj9P(VTA0P]/sFh!(<l3xo(Jg5h`b]1#jt]UTiRk;eQg[akU~L4,2M# i`zH83sI' );
define( 'LOGGED_IN_SALT',    'ij0e{4c!b#:hPnamBbXtZR~(j(RxftPPbz%to38B|h=x,SrOOU[08>3)1PB1W=Nc' );
define( 'NONCE_SALT',        'T>:D~&#&M{IAI%4dw->hJo<?A]q`@V-;k9/AdmNX9A?$b8oH}DjMJhr?#D6r_Ax-' );
define( 'WP_CACHE_KEY_SALT', '@fM?2eC/*kJ=r!vyNE3X#JvgTQyrd,.p`BIrb{r.P4])XWa[ {5y]hcZC6(h/Q(G' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
