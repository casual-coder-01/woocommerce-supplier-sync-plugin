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

require_once WCSS_PLUGIN_PATH . 'includes/admin/admin-notices.php';

require_once WCSS_PLUGIN_PATH . 'includes/sync/class-sync-manager.php';



function wcss_plugin_init() {

    // If WooCommerce is not active, show notice and stop further execution
    if (!wcss_is_woocommerce_active()) {
        add_action('admin_notices', 'wcss_admin_notice_woocommerce_missing');
        return;
    }

    // WooCommerce is active — future plugin setup will go here
     new WCSS_Sync_Manager();

}

