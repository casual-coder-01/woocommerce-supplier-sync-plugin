<?php
/**
 * Plugin Name: WooCommerce Supplier Sync
 * Description: Syncs WooCommerce products with external suppliers via a secure Node.js API.
 * Version: 1.0.0
 * Author: Abhinav Thakur
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

/**
 * Main plugin bootstrap file.
 *
 * This file is intentionally kept minimal.
 * All real logic will live inside the /includes directory.
 */

/**
 * Runs when all plugins are loaded.
 *
 * We use this hook as the starting point
 * for initializing our plugin.
 */
 require_once plugin_dir_path(__FILE__) . 'includes/init.php';

add_action('plugins_loaded', 'wcss_plugin_init');
{
    // For now, we only confirm the plugin is loaded.
    // Real initialization will come in later steps.
}

