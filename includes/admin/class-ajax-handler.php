<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Ajax_Handler {

    public function __construct() {
        add_action( 'wp_ajax_wcss_test_connection', [ $this, 'test_connection' ] );
        // Product import AJAX action
        add_action( 'wp_ajax_wcss_import_products', [ $this, 'handle_import_products' ] );

        }


    public function test_connection() {

        check_ajax_referer( 'wcss_nonce', 'nonce' );

        $settings = get_option( 'wcss_settings' );
        $api_url  = $settings['api_base_url'] ?? '';

        if ( empty( $api_url ) ) {
            wp_send_json_error([
                'message' => 'API URL is missing.'
            ]);
        }

        // Simple test request
        $response = wp_remote_get( $api_url );

        if ( is_wp_error( $response ) ) {
            wp_send_json_error([
                'message' => 'Connection failed.'
            ]);
        }

        wp_send_json_success([
            'message' => 'Connection successful!'
        ]);
    }
/**
 * Handle Product Import AJAX Request
 */
public function handle_import_products() {

    // Security check
    check_ajax_referer( 'wcss_nonce', 'nonce' );

    // Create supplier adapter
    $adapter = new WCSS_JSONPlaceholder_Adapter();

    // Create importer service
    $importer = new WCSS_Product_Importer();

    // Run import process
    $result = $importer->import_products( $adapter );

    // Send JSON response
    wp_send_json( $result );
}


}

