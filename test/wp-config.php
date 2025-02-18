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
define( 'DB_NAME', 'u548435996_8Us0w' );

/** Database username */
define( 'DB_USER', 'u548435996_ZYPaP' );

/** Database password */
define( 'DB_PASSWORD', '54MUGuv9NZ' );

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
define( 'AUTH_KEY',          ';Ya~pk[l$-0B9(PAo;*Yn7C?kt*qlS4/mi4Lw0IH_U3@V0-l*ys&hqeSfVpSN}gr' );
define( 'SECURE_AUTH_KEY',   'X#r217o*Dx,>%+FjY}fA3jxT%4o)W$v&?<<%1sjPC8;S(@T8{m[n]i{0BmG{`Q&N' );
define( 'LOGGED_IN_KEY',     'faQL4})[]7]P:b;/[|=p<]Dp:#8SnNDncgJC8Yc21~,yW!yVMgg:5Qupci)r~lTG' );
define( 'NONCE_KEY',         'uDn:%Jb6:ar*(oqUgyOD*Xc-f052|!&Jp&6nRsZoDE/ep772Fd3.t]p%NJt:Z9`O' );
define( 'AUTH_SALT',         'cx6z]SP+R1YpI6N6H7j-Ub@x-$Y6>)=FHvWi=-eu.0#ap6GdTxHv62*o_9$8Tlvb' );
define( 'SECURE_AUTH_SALT',  '%.hxx6/[:hEbB#>7h[ahwtYUf N$$?JM~4]@}$M}kM!>[b;9!gf4b17W?T8[ tGS' );
define( 'LOGGED_IN_SALT',    'PPhR@B})kGBbz6q}n2?5&eO68#TkZ{5HWw)uwWhfI>$}?qX,C6;0Ud*^+l&y0;KD' );
define( 'NONCE_SALT',        '&,](k:w/Dc}ryAn<wgd4rA?r~KPD`_hK<II+1mdf2#Ao[%PQ4S1)DHcB,zvQs*e`' );
define( 'WP_CACHE_KEY_SALT', '[;c]*7fTWe)XN$Tbw%H }5k|AaVKd5x/VMwCtRTOlr,2{`^!_2yu2xE2(93}~IQ.' );


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
define( 'COOKIEHASH', '007ad57be50184d380f7474d07b897d5' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
