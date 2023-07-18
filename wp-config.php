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
define( 'DB_NAME', 'kn_web_dev' );

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
define( 'AUTH_KEY',         '~YIC[WoI9S<F>p5Sp,0:<SCq5WtO[@9_0yCFm}PO6?]>telrt 4~HV:<Tvlym.Xv' );
define( 'SECURE_AUTH_KEY',  'PP`%T]aj`]A3eJu#~Y!fz[au0YxC?w5Fhf?^[fA&t[b_.;z 7c0k$1)o%q(Oa|C,' );
define( 'LOGGED_IN_KEY',    'lbx?M%.{x]%T ~x,&>6bpd.fl>rM? PktI!OWU_&]Fn,eD6bOM_UQ)FpSmk]]{U$' );
define( 'NONCE_KEY',        '*RW{ty{m((kj![iE<S{,ghxrh~U7q@<>~>)HFcxXyQ^ 0Qf=[h{@ZKT522nA0FGO' );
define( 'AUTH_SALT',        'Zo}+U)!T:}mlHNZfv46cJE#p&9Y8Q-P~`yV`?K)D7Kb4kJ=|k1;j-Ur/PC=alkVE' );
define( 'SECURE_AUTH_SALT', 't>S7W!C36%u>ml,p;@!y;UvSO8~O5hvM#:2 Dz8}:]qs*m6vI}f(]!@a%-JxA,+i' );
define( 'LOGGED_IN_SALT',   '-A!9e.i6a]=y^S)_x@Brp #g,sn){d|/mZ`2@N/9o!YfECWtM`E[@UoE,30$EELE' );
define( 'NONCE_SALT',       'rS`o_0NU*!vH)8a2%c2yS(p2rw[0`wL:LN+>MHhaNvjd?n6@H;u{{dZReo#OhWT2' );

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
