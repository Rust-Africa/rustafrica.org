<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u548435996_nHiTl' );

/** Database username */
define( 'DB_USER', 'u548435996_pnwZF' );

/** Database password */
define( 'DB_PASSWORD', '4Qnobj4XsA' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'ZV[;P}fz~hmhGxean]KWzgJl|aIq>wkYV5(?RR?z5K<GYUO8m>Ge3JtZ*:;JcX1I' );
define( 'SECURE_AUTH_KEY',   'P([mP,iG[EBfo|K^-}.z@ +Lha8cDWnzVRl`iWqS74dG:D3dbg-PdP+e#m^+AGS|' );
define( 'LOGGED_IN_KEY',     '?2v+!v` }r=<PuwurYw?Dv!p(pOdrm|R:T3QA6vIi]0f55>jw8^Pyb|vL+fVkyv`' );
define( 'NONCE_KEY',         '|D8z9Rx`!pE@_0aCa289!K4lEqw.2}%A!% 0}O|X=BGmfK[Q RQM*at+@sdBL;&4' );
define( 'AUTH_SALT',         'y+jqnzOy<A kH-!8j?|5J7wc@8.]fCv^eo];6<W|R}cq!o~IMwJJKcP{@2$]c:]=' );
define( 'SECURE_AUTH_SALT',  'e{F<+.)#AMq7]C/[YGKzx?KIgDG2AKf5dw}11Z2PFQI.lgQHp0MTDA85PMng^sVs' );
define( 'LOGGED_IN_SALT',    'GrJ=]^<EghBJ05>+y=R[zh=:3n:|(osZ52CJA)F-_fT{C+|ne3R3-Uz]C.~13Cha' );
define( 'NONCE_SALT',        'otX=eVa7<X/zxF@>&4#*]YLtFsZnC*Kll>?YBTCN2#|2_R|UG:c* 8(#/]JjQ4R!' );
define( 'WP_CACHE_KEY_SALT', 'j$sla]fAyGIsi;Dd?*:asFqR/U6Od4%E0jSB#f:Pt)Sln(SO1?#m[ZW~(tbduMRk' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'cdb346c2330c11aa41dba19802a187e6' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
