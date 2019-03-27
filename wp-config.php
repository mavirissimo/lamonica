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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lamonica_novo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '/<tZlupW.l!ZUOA=:WA{8cR<43EvI=lkw4Cg*)_AHTgdL(OvDmSsBm7B3(+8X/1s');
define('SECURE_AUTH_KEY',  'ZH|g,!Of.=:`HB3vL/^?V#Iv(3ok;$zKz=4>z1nOYwxhfY0%H21dDmzdjElq]6%o');
define('LOGGED_IN_KEY',    '/:v*l+l*{)EIP~>bBm_:9r%}717%CoYq<v.<=`rV<8hy?F{^/GQCVj;I|<|&xF&~');
define('NONCE_KEY',        '>IY8LvFERC48..*xpoICs,2#{dt=W]NOo9ns^@7p&#C7^7^R^L,3|_c1+hIB^,l1');
define('AUTH_SALT',        '1=Y[vF!P~<!x1hv7=6QfYDBmt W8VE.Q!PAY662n6m=r|pfHz[bf_1{.3ZgXxJOM');
define('SECURE_AUTH_SALT', 'w&o==r`W)*?el5 o@mP?0/%&v1^bRNLR?.[[=I-EF[m/$cu-e;[`} Z@qmZP[!{~');
define('LOGGED_IN_SALT',   '`.Dg_ROve(xBe.3HK~0]1iV80sPgYS<3+Y/~OTH?y+oQqUcg|T7g`@Csg3Pf2_bx');
define('NONCE_SALT',       'o:l2r6k,l^5p~SVJ$gMIh{htI3RqFs5YwW1BD+9?EMVl.jm$^Px60t;>75%$uG%Q');

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
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
