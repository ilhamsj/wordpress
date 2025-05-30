<?php

/**
 * Handles Comment Post to WordPress and prevents duplicate comment posting.
 *
 * @package WordPress
 */

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/**
 * Database name
 */
define('DB_NAME', $_ENV['DB_NAME']);

/**
 * Database user
 */
define('DB_USER', $_ENV['DB_USER']);

/**
 * Database user password
 */
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/**
 * Database host
 */
define('DB_HOST', $_ENV['DB_HOST']);

/**
 * WordPress DB Charset (is setup this way when the tables are made)
 */
define('DB_CHARSET', 'utf8');

/**
 * WordPress DB Collation (is setup this way when the tables are made)
 */
define('DB_COLLATE', 'utf8_general_ci');

/**
 * WordPress home URL (for the front-of-site)
 */
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '');

/**
 * WordPress site URL (which is for the admin)
 */
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');

/**
 * WordPress content directory
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');

/**
 * WordPress plugins directory
 */
define('WP_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/plugins');

/**
 * WordPress content directory url
 */
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');

/**
 * Controls the error reporting. When true, it sets the error reporting level
 * to E_ALL.
 */
define('WP_DEBUG', true);

/**
 * If error logging is enabled, this determines whether the error
 * is logged or not in the debug.log file inside /wp-content.
 */
define('WP_DEBUG_LOG', true);

/**
 * If error logging is enabled, this determines whether the error is
 * shown on the site (in-browser)
 */
define('WP_DEBUG_DISPLAY', true);

/**
 * This disables live edits of theme and plugin files on the WordPress
 * administration area. It also prevents users from adding,
 * updating and deleting themes and plugins.
 */
define('DISALLOW_FILE_MODS', true);

/**
 * Prevents WordPress core updates, as this is controlled through
 * Composer.
 */
define('WP_AUTO_UPDATE_CORE', false);

/**
 * Database prefix
 */
$table_prefix = 'wp_';

/*
 * Environment.
 * https://developer.wordpress.org/apis/wp-config-php/#wp-environment-type
*/
define('WP_ENVIRONMENT_TYPE', $_ENV['WP_ENVIRONMENT_TYPE']);

/* Add any custom values between this line and the "stop editing" line. */
define('GRAPHQL_JWT_AUTH_SECRET_KEY', $_ENV['GRAPHQL_JWT_AUTH_SECRET_KEY']);

/*
 * Disable WP Cron
 * need to run this command to trigger the cron job:
 * curl -X POST http://local.wordpress.test/wordpress/wp-cron.php?doing_wp_cron
*/
define('DISABLE_WP_CRON', true);

/* That's all, stop editing! Happy publishing. */

/*
 * Authentication Unique Keys and Salts.
 * https://api.wordpress.org/secret-key/1.1/salt/
*/
define('AUTH_KEY', $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY', $_ENV['NONCE_KEY']);
define('AUTH_SALT', $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT', $_ENV['NONCE_SALT']);

/* Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/public');
}

/* Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';
