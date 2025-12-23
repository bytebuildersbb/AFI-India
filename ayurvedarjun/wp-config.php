<?php

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'tqtVgnnVcd8O6wH9vpIR0geC12IG1ifYDbcDD5J4tnIkmb7WIBe8I6Y7gJFM4345');
//END Really Simple Security key
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * strcmp this file to "wp-config.php" and fill in the values.
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
define('DB_NAME', 'u512009538_arjun');

/** MySQL database username */
define('DB_USER', 'u512009538_arjun');

/** MySQL database password */
define('DB_PASSWORD', '55cue9cBam#L');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'j9c+utVTtWigoO6W/awT9IjRnBmpvaOR');
define('SECURE_AUTH_KEY',  'ga6izMyroQpYybWv4DyZ6CEZRxrF9F1A');
define('LOGGED_IN_KEY',    'fsguLbSOokz6od+ycya+5+5Yi+fWBK7h');
define('NONCE_KEY',        '1hZ9bJZfQEq8HnHkvIoCpzNTI3/5HnZq');
define('AUTH_SALT',        'DfgRhTDr/IbyAOB7360avC8DacB3ph1f');
define('SECURE_AUTH_SALT', 'QuIyL7xnylieE8cZDw0hlNLiS2P83q0A');
define('LOGGED_IN_SALT',   '81sSXbNj8LXq2KUvazRE0JeT5fQ04gwg');
define('NONCE_SALT',       'bNQH6/9BHzSslKK3jd7raXEOkoL0tcjr');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '73_';

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
