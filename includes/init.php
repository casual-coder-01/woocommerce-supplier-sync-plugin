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



if ( ! defined( 'WCSS_PLUGIN_PATH' ) ) {
    define( 'WCSS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WCSS_PLUGIN_URL' ) ) {
    define( 'WCSS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}


function wcss_plugin_init() {

    // If WooCommerce is not active, show notice and stop further execution
    if (!wcss_is_woocommerce_active()) {
        add_action('admin_notices', 'wcss_admin_notice_woocommerce_missing');
        return;
    }

    // WooCommerce is active — future plugin setup will go here
     new WCSS_Sync_Manager();

}

if ( is_admin() ) {
    new WCSS_Settings_Page();
}

add_action( 'admin_enqueue_scripts', function () {
    wp_enqueue_script(
        'wcss-admin-js',
        WCSS_PLUGIN_URL . 'assets/js/admin.js',
        [ 'jquery' ],
        '1.0.0',
        true
    );
});


function wcss_boot_plugin() {
require_once WCSS_PLUGIN_PATH . 'includes/admin/class-admin-menu.php';
require_once WCSS_PLUGIN_PATH . 'includes/admin/class-settings-page.php';
require_once WCSS_PLUGIN_PATH . 'includes/admin/class-ajax-handler.php';
require_once WCSS_PLUGIN_PATH . 'includes/models/interface-supplier-adapter.php';
require_once WCSS_PLUGIN_PATH . 'includes/models/class-jsonplaceholder-adapter.php';
require_once WCSS_PLUGIN_PATH . 'includes/sync/class-product-importer.php';
require_once WCSS_PLUGIN_PATH . 'includes/sync/class-wc-product-creator.php';

new WCSS_Ajax_Handler();

new WCSS_Settings_Page();
new WCSS_Admin_Menu();

}

add_action( 'plugins_loaded', 'wcss_boot_plugin' );
