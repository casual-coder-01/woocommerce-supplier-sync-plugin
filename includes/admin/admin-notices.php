<?php
/**
 * Admin notices for WooCommerce Supplier Sync.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Show notice if WooCommerce is not active.
 */
function wcss_admin_notice_woocommerce_missing() {
    if (wcss_is_woocommerce_active()) {
        return;
    }

    echo '<div class="notice notice-error"><p>';
    echo '<strong>WooCommerce Supplier Sync:</strong> WooCommerce is not active. Please install and activate WooCommerce to use this plugin.';
    echo '</p></div>';
}
