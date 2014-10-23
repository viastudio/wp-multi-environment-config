<?php
// MySQL settings
/** The name of the database for WordPress */
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Set Jetpack Local Development to true to enable it.
 */
define('JETPACK_DEV_DEBUG', true);

// used to override the wp_options and dynamically set the site for this environment
// http://codex.wordpress.org/Editing_wp-config.php#WordPress_address_.28URL.29
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

// used to determine environment from easily accessible constant
define('VIA_ENVIRONMENT', 'dev');
