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

// used to override the wp_options and dynamically set the site for this environment
// http://codex.wordpress.org/Editing_wp-config.php#WordPress_address_.28URL.29
define('WP_SITEURL', 'http://staging.##domain##.com');
define('WP_HOME', 'http://staging.##domain##.com');

// turn on caching
define('WP_CACHE', true);

// used to determine environment from easily accessible constant
define('VIA_ENVIRONMENT', 'stage');
