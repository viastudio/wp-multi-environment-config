WordPress Multi-Environment Config
===========================

VIA Studio has development, staging, and production environments for each of our WordPress projects. All requiring specific configurations.  This repository contains our typical config setup, which supports multiple environments.  This set up allows us to move through environments without having to change the config by hand each time.

## How it works

Most all of the WordPress configuration is handled by wp-config.php. We added a few lines to wp-config.php to essentially sniff out the current environment. Then we include a configuration file for that environment to set any specific options. Any additional configurations are set in favor of the production environment. As WordPress is a production-ready system, this makes the most sense. It's also a fail safe so to ensure production remains stable.

An example of our `wp-config.dev.php`

    // MySQL settings
    /** The name of the database for WordPress */
    define('DB_NAME', 'my_wp_db');

    /** MySQL database username */
    define('DB_USER', 'root');

    /** MySQL database password */
    define('DB_PASSWORD', 'xxx');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');

    define('WP_DEBUG', false);

    // used to override the wp_options and dynamically set the site for this environment
    // http://codex.wordpress.org/Editing_wp-config.php#WordPress_address_.28URL.29
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
    define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

    // used to determine environment from easily accessible constant
    define('VIA_ENVIRONMENT', 'dev');


This file configures the MySQL configuration for the development environment. In addition, this allows developers to quickly turn on debugging. Note that setting `WP_SITEURL` and `WP_HOME` are critical for the development and staging environments. This allows us to override the values in the `wp_options` table, which is set for production. Finally, we also define an environment flag, `VIA_ENVIRONMENT`, that allows us to perform any environment specific logic in our WordPress code.

### Environment values

Environment values can be whatever you like. They match to their corresponding `config wp-config.{environment}.php` config file.

Common environment values we use at VIA Studio include:

* `prod` (the live website)
* `stage` (the test website for client review)
* `dev` (the development copy of the website)

### Setting the environment

You can edit the few lines in `wp-config.php` file that check `HTTP_HOST` and define what hostnames are used for which environments.

For example, to set `example.local` as the development environment and `staging.example.com` as the staging environment, the code would look like this:

    if (strpos($_SERVER['HTTP_HOST'], 'example.local') !== false) {

        $config_file = 'config/wp-config.dev.php';

    } elseif (strpos($_SERVER['HTTP_HOST'], 'staging.example.com') !== false) {

        $config_file = 'config/wp-config.stage.php';

    } else {

        $config_file = 'config/wp-config.prod.php';
    }

Note that the default config is production so we didn't need to add a statement to check for `exampmle.com`.  You could also remove or add additional environments here if you need them.

## Installing
1. First make a backup of your existing `wp-config.php` file.
2. Copy `wp-config.php`  and the `config/` folder into your WordPress installation.
3. Set up the website environments for your project in `wp-config.php`.
4. Create one `config/wp-config.{environment}.php` file for each environment. `config/wp-config.prod.php` is the only required environment configuration.
5. Review your backup `wp-config.php` file and copy config settings to either `wp-config.php` or `config/wp-config.prod.php` as appropritate.  Environment specific configurations, such as database settings should go into `config/wp-config.prod.php`, while general configurations such as $table_prefix should go into `wp-config.php`.
6. Update each of your config files by setting the environment specific configurations
