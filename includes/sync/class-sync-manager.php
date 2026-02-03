<?php
/**
 * Sync Manager.
 *
 * Responsible for coordinating product sync operations.
 */

if (!defined('ABSPATH')) {
    exit;
}

class WCSS_Sync_Manager {

    /**
     * Constructor.
     *
     * Registers admin-side hooks for the sync system.
     */
    public function __construct() {
        add_action('admin_init', [$this, 'register_admin_hooks']);
    }

    /**
     * Register admin-side hooks.
     *
     * Future admin-related functionality (buttons, screens, actions)
     * will be wired from here.
     */
    public function register_admin_hooks() {
        add_action('admin_menu', [$this, 'register_admin_menu']);
    }

    /**
 * Register admin menu page for Supplier Sync.
 */
public function register_admin_menu() {

    add_menu_page(
        'Supplier Sync',                 // Page title
        'Supplier Sync',                 // Menu title
        'manage_woocommerce',            // Capability
        'wcss-supplier-sync',             // Menu slug
        [$this, 'render_admin_page'],     // Callback
        'dashicons-update',               // Icon
        56                                 // Position (near WooCommerce)
    );
}


   /**
 * Render the Supplier Sync admin page.
 */
public function render_admin_page() {
    ?>
    <div class="wrap">
        <h1>Supplier Sync</h1>
        <p>Manual sync and settings will appear here.</p>
    </div>
    <?php
}


}

