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
define('DB_NAME', 'trungtam');

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
define('AUTH_KEY',         '!;h_ILyhVPBP<&,Y)aU1^Rk;^*2Z<E3O`VW/Im*1A)u^MXam5|O&22I@s2h$)Hq]');
define('SECURE_AUTH_KEY',  ' L{@A1lMK::=5Mt<CW{4>3rC$m*/Zra(hE.G!<|7%|uzVoH$@e9_E9]Tl#k^wVh1');
define('LOGGED_IN_KEY',    'pCS^[:my`OK{*n*l9TzsZ}c(asQ4iM;6d--Irk+EI`<?:)Umx]Z%Cy:,onvJLert');
define('NONCE_KEY',        '|h4%^.rP)=wF:81Jb}rX<_m=qbgn4 fX:i#mC>7w:rSh&7!)W9P#s==A]TcRsIwQ');
define('AUTH_SALT',        'CaD{*D!E}(uA[AF4fSu>>d6;IgqFB_wybbE8hkO!,t(|7X7`wul*g)2D:Vh_||I(');
define('SECURE_AUTH_SALT', '@L2,A8%sK03rw6_:)(&at?%*>N%Dqgl{0YoloCPiK;Zxe9sN6#UF)rF^hlB@B_uB');
define('LOGGED_IN_SALT',   'h9C*)`?jr[3!yIHM_8$Y|!Eu;#M@=ySr*i2%,!y*mVG_2M+BmNo/4ors3E4}G]r|');
define('NONCE_SALT',       '(2Z*v32<St T)+Ok9e4,5]$e_vRx#q+oV@j`C`T`u2l&!p]6~E-,iK?L_pAA|iix');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_tt';

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
