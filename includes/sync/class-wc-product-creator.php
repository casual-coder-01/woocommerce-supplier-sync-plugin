<?php
/**
 * WooCommerce Product Creator
 *
 * PURPOSE:
 * Handles creation of WooCommerce products using WooCommerce CRUD.
 *
 * WHY THIS EXISTS:
 * Keeps product creation logic separate from importer logic.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_WC_Product_Creator {

    /**
     * Create WooCommerce product from supplier data
     *
     * @param array $supplier_product
     * @return int|false Product ID or false on failure
     */
    public function create_product( $supplier_product ) {

        if ( empty( $supplier_product ) ) {
            return false;
        }

        // Create new WooCommerce product
        $product = new WC_Product_Simple();

        // Map supplier fields to Woo fields
        $product->set_name( $supplier_product['title'] ?? 'Supplier Product' );

        $product->set_description( $supplier_product['body'] ?? '' );

        // Random demo price (JSONPlaceholder has no price)
        $product->set_regular_price( rand( 100, 500 ) );

        // Publish product
        $product->set_status( 'publish' );

        // Save product
        return $product->save();
    }
}
