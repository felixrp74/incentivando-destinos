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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'incentivame_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '7f .9oc(SLm1-%aj+,@Kh7Nj4m)[GTu<6Xd_0qyG(GPDBOjh(RT+.TrIg^f:?n<r' );
define( 'SECURE_AUTH_KEY',  '&S5etqqu/zH?9_tac,jb}vMql{nA)^al4J&2{N* 3:[RogX>14fEcbF{AI&FxuWv' );
define( 'LOGGED_IN_KEY',    '|}a.IruZ5Bk}R>L@WGA,/p>uv?t Zv;NVekLZ_/3%-&rOD)n8ZSwn;-]uQga!;}D' );
define( 'NONCE_KEY',        'UhHx1m.o5TmGLLgvgW#Y_IkmVvw1q= UU#_q/z^}gE*5#pE;|]!A:=thLA(0N,+a' );
define( 'AUTH_SALT',        '}D_.bM?6Q#:R0l@HYj_b.UctC[xR);TB9zo,f*Wpur^QCA~)iEBN4X6+Lq (J;-%' );
define( 'SECURE_AUTH_SALT', 'Zz.JQ%LS@X2[o^Cg[:xl0mZQ~~5sU`RnYSy+FBgS&Oq(Y@H]DQAQg25g SK_=Fy<' );
define( 'LOGGED_IN_SALT',   '4g0t2Zx,r`3S .4QZR&E1wR^9>fIaQhRglHI@U(N&Pla.j(-&(MY;@-$qMQsMr$-' );
define( 'NONCE_SALT',       '-&wo> iUN!T/Hznwr!Ft:z<C4LTAz,gw06Cg)T [J|qX3P!9d|BlJ/7%P$Wzps+/' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
