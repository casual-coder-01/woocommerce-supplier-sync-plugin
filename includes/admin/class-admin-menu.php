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
    add_submenu_page(
        'woocommerce',                 // Parent (WooCommerce)
        'Supplier Sync',               // Page title
        'Supplier Sync',               // Menu title
        'manage_woocommerce',          // Capability
        'wcss-supplier-sync',           // Slug
        [ 'WCSS_Settings_Page', 'render' ]
       // Callback
    );
}


    public function render_page() {
        echo '<div class="wrap">';
        echo '<h1>WooCommerce Supplier Sync</h1>';
        echo '<p>✅ Admin menu is working.</p>';
        echo '</div>';
    }
}
