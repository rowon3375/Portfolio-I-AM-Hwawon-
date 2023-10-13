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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/ilove4622/www/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'ilove4622' );

/** Database username */
define( 'DB_USER', 'ilove4622' );

/** Database password */
define( 'DB_PASSWORD', 'ghkdnjs12!' );

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
define( 'AUTH_KEY',         'oiU-;jNnyFrk>A(/r/HitEk5xt*Ixg*fVMS8!h;-9xKC,KI1Slj*>4TLzlu_*:[X' );
define( 'SECURE_AUTH_KEY',  'Z%jWRn/d9czaJ]+^y~F)fD *Cx22rYJufa!.nAhdgWs|#U&ZSxnKWA@c)z4d1,K4' );
define( 'LOGGED_IN_KEY',    'cPmYR;&/YXjl-`78jZ4}NC|!Xelx}@Nfm+&:>qU[+XN4YAd7n++rm%f>?ar^>$&c' );
define( 'NONCE_KEY',        '-uG859k%U|$3,.RTH}%SW EJoww.`05tvdiQ2Gl4z<r.+k$;;Q12Om&aiDW,+aQn' );
define( 'AUTH_SALT',        '[N>a QLqip}_jgzH00b~kXtlM6RR]F4]XhfgRW?Dge:QFyjgiimxt.4_39c 2wdw' );
define( 'SECURE_AUTH_SALT', ']]V?[WyCOAsTScy8^?imbGq,DVo-O.;Z^B`%fXO?)BvCE._Z^e-Er-rRZIf|#we-' );
define( 'LOGGED_IN_SALT',   ':B(|D+fsBhgz[Psc8cV(rp,8ScG+?VXB#*MT5UhhG_U*Wi?FdOrE2 QL,5*mm[)E' );
define( 'NONCE_SALT',       'f,fg+HD/6VAoFRO;Z8U6{?N=ZL 9W%=b|sST{!W~}GyX*${{LaA;Wrj&~vK@YK}u' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

/* custom security setting */
// define('DISALLOW_FILE_EDIT',true);
define('IMAGE_EDIT_OVERWRITE',true);
define('EMPTY_TRASH_DAYS',7);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/* enable core Major update */
define( 'WP_AUTO_UPDATE_CORE', 'true' );
