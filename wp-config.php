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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
define( 'DB_NAME', 'wordpresshotel-database' );

/** MySQL database username */
define( 'DB_USER', 'ehheptqdna' );  // Use the correct username format

/** MySQL database password */
define( 'DB_PASSWORD', 'l0dk$aEyu8ggKWQr' );

/** MySQL hostname */
define( 'DB_HOST', 'wordpresshotel-server.mysql.database.azure.com' );  
define( 'DB_PORT', '3306' ); 

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb3' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1glIYDRZet`a1Fi[*cA.>%;ml Y<60t9W<+=[.-H/nsu3`9{Uy-i6_3}=6h$_LVF' );
define( 'SECURE_AUTH_KEY',  'S9WK[krcs4~w6/v*g8ovwSh%S5NJuB8Z?]@r&H2~+?>dQY8J(F$tnQFvT|B6bgw7' );
define( 'LOGGED_IN_KEY',    'hCziStsnY6M1Z#|}8(wqj{ab`o$fSQVfgGojBxLh|lW|pqb(uPd(J6|6ki`[R-pf' );
define( 'NONCE_KEY',        '0: j:`IK1_t+ikkO<#Ro<z*|?Ji $d#P36!D58x:G-;r/)a`uwFrDX+{95Rl~$o2' );
define( 'AUTH_SALT',        '8iD)2t)v{(qn,7?Dl{=Gm%JUBJ/#3W:xvFS?e7nvOoi2?D4]1^3SzEqe1XZ:Ic`~' );
define( 'SECURE_AUTH_SALT', 'bBt1>/TNZd+O>VOTI1A[`>M1tc2sMHVzSDowZOsJClX]P@7GaxWe;OSud c#1KbU' );
define( 'LOGGED_IN_SALT',   '+[XM)8)RXc[KyBV`D}4&@$1Fz}mc[OBRzGROX^|Af`Ar3:yp_w<1V{#G=Gt<n+eK' );
define( 'NONCE_SALT',       'ReH=z[bCwXo?j~z8oB0ZSu0Izb yKu;eRRt{%P[RHbaSH!oJ(Xg*{|}b!  Z8u!+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_MEMORY_LIMIT', '512M');
//define('FS_METHOD', 'direct');
define('DISALLOW_FILE_MODS', false);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
