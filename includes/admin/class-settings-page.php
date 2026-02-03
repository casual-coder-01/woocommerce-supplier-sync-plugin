<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WCSS_Settings_Page {

    public function __construct() {
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function register_settings() {
        register_setting(
            'wcss_settings_group',
            'wcss_settings'
        );
    }

    public static function render() {
        ?>
        <div class="wrap">
            <h1>WooCommerce Supplier Sync</h1>

            <form method="post" action="options.php">
                <?php
                settings_fields( 'wcss_settings_group' );
                do_settings_sections( 'wcss_settings_group' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
