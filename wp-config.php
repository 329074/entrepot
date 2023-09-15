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
define( 'WPCACHEHOME', '/www/wwwroot/wordpress/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'fsg' );

/** Database username */
define( 'DB_USER', 'fsg' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'N1Sf_UOUC:$6?li|w`3}lBy_J(MtDF&{]B)88Cg!Sqz7gW1{ f#waa[s8bEC[/sX' );
define( 'SECURE_AUTH_KEY',  'oZo`v2u0]=nMrX6qS1J32Qv;xucZ@v!BUca0|uTZ;aQhB[W30A.^s@;JEg^*TLLa' );
define( 'LOGGED_IN_KEY',    'wmhrY;e+T&[`z#N(wkiuz*F?rCDy#ao&zjRdl7*wI)~3A,N3oFzff#.o:tW]fh<_' );
define( 'NONCE_KEY',        '6HtYqmUDGqNDhO}[>2xX(5TgFF%)EY`_%t{}ORj?CXbES!ij![_z=&fN_u417EMQ' );
define( 'AUTH_SALT',        'D4^Xt.KI[N#IR42I7tkDc;C6FW^#!uTCY@DK.x7WMhcI^pW`-]$6_#|3?S{N-f8]' );
define( 'SECURE_AUTH_SALT', '[X3{`|j1m!3{7tpDi]OXTMJqD3`AyFaQ__8$@AY}SdwWGA[5&>S]Cq5%n@Vm&((C' );
define( 'LOGGED_IN_SALT',   'uD3@>=DLc]j>Fx}sc)6ht>voNO/QYq|r*k15>,dm*NF3cH.#N0}%JDRJ8OKW0ZKx' );
define( 'NONCE_SALT',       'S V~u_KrDv4|fOB~o>g9+i>_Lka@ qWj3rbXesXPiC-;=Vd?9ZT.YliFbpINH1M,' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
