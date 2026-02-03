<?php
/**
 * Plugin Name: WooCommerce Supplier Sync
 * Description: Syncs WooCommerce products with external suppliers via a secure Node.js API.
 * Version: 1.0.0
 * Author: Abhinav Thakur
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants
define( 'WCSS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WCSS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load core files
require_once WCSS_PLUGIN_PATH . 'includes/admin/class-admin-menu.php';

// Initialize plugin
add_action( 'plugins_loaded', function () {
    new WCSS_Admin_Menu();
});
