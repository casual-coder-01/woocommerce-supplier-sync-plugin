<?php
/**
 * WooCommerce availability check.
 *
 * Ensures WooCommerce is active before
 * running any WooCommerce-dependent code.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if WooCommerce is active.
 *
 * @return bool
 */
function wcss_is_woocommerce_active() {
    return class_exists('WooCommerce');
}
