<?php
/**
 * Supplier Adapter Interface
 *
 * Defines a standard contract that every supplier integration
 * must follow.
 *
 * This allows our importer system to remain scalable and
 * supplier-independent.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct file access
}

interface WCSS_Supplier_Adapter {

    /**
     * Fetch products from supplier API
     *
     * @return array
     * Should return supplier products as array
     */
    public function fetch_products();

}
