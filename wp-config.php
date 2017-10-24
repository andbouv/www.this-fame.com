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
define('DB_NAME', 'thisfame');

/** MySQL database username */
define('DB_USER', 'thisfame');

/** MySQL database password */
define('DB_PASSWORD', 'aADAGY3TyPc7y7ny');

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
define('AUTH_KEY',         'p&RUazEJEsMa5M,A`jb! `#?~OGmSN5S<Um7@}`zT_7BB?FR+!MqzExl9K)XP?.G');
define('SECURE_AUTH_KEY',  '_0.]MhU!pM V3HeVvNNn9WWv.C|e1}~e6:xM|w6|i)!X~9WA-kl14vMs)B}v3]zT');
define('LOGGED_IN_KEY',    'C&Gb504n]o(VE]46XW?Ngc~nk,tZa^9mrY)g$/V8!#XKl5A5;>Y!pPxK5}@(P4A[');
define('NONCE_KEY',        '`CW+GQ#_4:9qIG4:=e7:WBfc0Jpes<>M_O7ydOGMKA~tv|}^;Y}>c4?Uk9f+b|b]');
define('AUTH_SALT',        '$fB%S6WQDT#&:tuB~:?Jcf?q z/IO#=Dnn&m$qyw00YjN>No.,7pVjDr7iD$N]{J');
define('SECURE_AUTH_SALT', '>K4VQM$pmVgzGGs7Hd<khQSC]g9E}U2&h5.k+pr_7Sfy81*Om}efI5F %MCrPjdB');
define('LOGGED_IN_SALT',   'YP]!#%[VRs+`bJCQHgx6s:3V@3l;A Qb{T$[zwL=[2=r0qw!hAy/M.HJ()Org3,F');
define('NONCE_SALT',       'Vns.obj5^uGR &I@])BJ}[GEu%`%j|P3clyaK;&8y5uuy@J5T{+&1Pw%luYES&tO');

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
