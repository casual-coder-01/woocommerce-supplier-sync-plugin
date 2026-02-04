<?php
/**
 * Product Importer Service
 *
 * PURPOSE:
 * This class controls the full product import workflow.
 *
 * RESPONSIBILITIES:
 * 1. Request products from supplier adapter
 * 2. Loop through supplier product data
 * 3. Send products for WooCommerce creation (future step)
 * 4. Return import summary
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Product_Importer {

    /**
     * Import products using supplier adapter
     *
     * @param WCSS_Supplier_Adapter $adapter
     * @return array Import results summary
     */
    public function import_products( WCSS_Supplier_Adapter $adapter ) {

        // Fetch products from supplier
        $supplier_products = $adapter->fetch_products();

        // Basic validation
        if ( empty( $supplier_products ) ) {
            return [
                'success' => false,
                'message' => 'No products returned from supplier.'
            ];
        }

        // Count products (for testing stage)
        $total_products = count( $supplier_products );

        // Return temporary summary
        return [
            'success' => true,
            'message' => "Fetched {$total_products} products from supplier."
        ];
    }
}
