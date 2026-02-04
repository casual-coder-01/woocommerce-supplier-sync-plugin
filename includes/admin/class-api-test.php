<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_API_Test {

    public function __construct() {
        add_action( 'wp_ajax_wcss_test_connection', [ $this, 'test_connection' ] );
    }

    public function test_connection() {

        $options = get_option( 'wcss_settings' );
        $api_url = $options['api_base_url'] ?? '';

        if ( empty( $api_url ) ) {
            wp_send_json_error([
                'message' => 'API Base URL is not set.'
            ]);
        }

        $response = wp_remote_get( trailingslashit( $api_url ) . 'health', [
            'timeout' => 10
        ]);

        if ( is_wp_error( $response ) ) {
            wp_send_json_error([
                'message' => $response->get_error_message()
            ]);
        }

        $code = wp_remote_retrieve_response_code( $response );

        if ( $code !== 200 ) {
            wp_send_json_error([
                'message' => 'API responded with status ' . $code
            ]);
        }

        wp_send_json_success([
            'message' => 'Connection successful!'
        ]);
    }
}
