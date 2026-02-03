<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Admin_Menu {

    public function __construct() {
        // Hook menu registration
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
    }

    public function register_menu() {

        add_menu_page(
            'WooCommerce Supplier Sync',      // Page title
            'Supplier Sync',                  // Menu title
            'manage_options',                 // Capability
            'wcss-supplier-sync',             // Menu slug
            [ $this, 'render_page' ],          // Callback
            'dashicons-update',               // Icon
            56                                 // Position
        );
    }

    public function render_page() {
        echo '<div class="wrap">';
        echo '<h1>WooCommerce Supplier Sync</h1>';
        echo '<p>✅ Admin menu is working.</p>';
        echo '</div>';
    }
}
