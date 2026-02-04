<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Ajax_Handler {

    public function __construct() {
        add_action( 'wp_ajax_wcss_test_connection', [ $this, 'test_connection' ] );
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
}
