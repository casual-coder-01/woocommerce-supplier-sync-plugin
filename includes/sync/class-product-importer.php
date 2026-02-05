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

    // Fetch supplier products
    $supplier_products = $adapter->fetch_products();

    if ( empty( $supplier_products ) ) {
        return [
            'success' => false,
            'message' => 'No products returned from supplier.'
        ];
    }

    // Initialize WooCommerce product creator
    $product_creator = new WCSS_WC_Product_Creator();

    $created_count = 0;
    $failed_count  = 0;

    // Loop through supplier products
    foreach ( $supplier_products as $supplier_product ) {

        $product_id = $product_creator->create_product( $supplier_product );

        if ( $product_id ) {
            $created_count++;
        } else {
            $failed_count++;
        }
    }

    return [
        'success' => true,
        'message' => "Products Imported: {$created_count}. Failed: {$failed_count}."
    ];
}
 
}
