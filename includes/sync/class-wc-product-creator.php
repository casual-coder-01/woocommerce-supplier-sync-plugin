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

    $supplier_id = $supplier_product['id'] ?? null;

    if ( ! $supplier_id ) {
        return false;
    }

    /**
     * STEP 1: Find existing product by supplier ID
     * This query includes ALL post statuses (publish, draft, trash, etc.)
     */
    $existing_products = get_posts([
        'post_type'      => 'product',
        'post_status'    => 'any', // 🔥 TRASH-PROOF
        'meta_key'       => '_wcss_supplier_id',
        'meta_value'     => $supplier_id,
        'posts_per_page' => 1,
        'fields'         => 'ids'
    ]);

    if ( ! empty( $existing_products ) ) {

        // Product exists (even if trashed)
        $product_id = $existing_products[0];
        $product    = wc_get_product( $product_id );

        // If product was trashed, restore it
        if ( get_post_status( $product_id ) === 'trash' ) {
            wp_untrash_post( $product_id );
        }

    } else {

        // Create new product
        $product = new WC_Product_Simple();
    }

    /**
     * STEP 2: Update product fields
     */
    $product->set_name( $supplier_product['title'] ?? 'Supplier Product' );
    $product->set_description( $supplier_product['body'] ?? '' );
    $product->set_regular_price( rand( 100, 500 ) );
    $product->set_status( 'publish' );

    /**
     * STEP 3: Save product
     */
    $product_id = $product->save();

    /**
     * STEP 4: Persist supplier ID (sync anchor)
     */
    update_post_meta( $product_id, '_wcss_supplier_id', $supplier_id );

    return $product_id;
}

}
