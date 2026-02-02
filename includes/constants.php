<?php
/**
 * Plugin constants.
 *
 * Central place for paths, URLs, and identifiers.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('WCSS_PLUGIN_PATH', plugin_dir_path(dirname(__FILE__)));
define('WCSS_PLUGIN_URL', plugin_dir_url(dirname(__FILE__)));
define('WCSS_PLUGIN_VERSION', '1.0.0');
