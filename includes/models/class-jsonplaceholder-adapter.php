<?php
/**
 * JSONPlaceholder Supplier Adapter
 *
 * PURPOSE:
 * This class simulates a supplier integration using the
 * JSONPlaceholder demo API.
 *
 * WHY THIS EXISTS:
 * Allows us to build and test import functionality before
 * connecting to real suppliers.
 *
 * This class implements the Supplier Adapter interface,
 * meaning it MUST provide fetch_products().
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_JSONPlaceholder_Adapter implements WCSS_Supplier_Adapter {

    /**
     * Fetch products from mock supplier API
     *
     * @return array
     */
    public function fetch_products() {

        // Get API Base URL from plugin settings
        $settings = get_option( 'wcss_settings' );
        $base_url = $settings['api_base_url'] ?? '';


        if ( empty( $base_url ) ) {
            return [];
        }

        // Example endpoint for mock products
        $endpoint = trailingslashit( $base_url ) . 'posts';

        // Make HTTP request using WordPress API
        $response = wp_remote_get( $endpoint );

        // Handle request error
        if ( is_wp_error( $response ) ) {
            return [];
        }

        // Retrieve response body
        $body = wp_remote_retrieve_body( $response );

        // Convert JSON to PHP array
        return json_decode( $body, true );
    }

}
