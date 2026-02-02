<?php
/**
 * Plugin initialization logic.
 *
 * This file is responsible for bootstrapping
 * the plugin's internal systems.
 */

if (!defined('ABSPATH')) {
    exit;
}
require_once plugin_dir_path(__FILE__) . 'constants.php';

require_once WCSS_PLUGIN_PATH . 'includes/utils/woocommerce-check.php';



function wcss_plugin_init() {
    // This function is called when plugins are loaded.
    // Further setup will be added step by step.
}
