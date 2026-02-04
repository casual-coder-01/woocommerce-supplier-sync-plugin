<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Admin_Menu {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function register_menu() {

        add_submenu_page(
            'woocommerce',
            'Supplier Sync',
            'Supplier Sync',
            'manage_woocommerce',
            'wcss-supplier-sync',
            [ 'WCSS_Settings_Page', 'render' ]
        );
    }

    public function enqueue_admin_assets( $hook ) {

        if ( $hook !== 'woocommerce_page_wcss-supplier-sync' ) {
            return;
        }

       wp_enqueue_script(
    'wcss-admin-js',
    WCSS_PLUGIN_URL . 'assets/js/admin.js',
    [ 'jquery' ],
    '1.0',
    true
);


        wp_localize_script(
            'wcss-admin-js',
            'wcss_ajax',
            [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'wcss_nonce' )
            ]
        );
    }

}
