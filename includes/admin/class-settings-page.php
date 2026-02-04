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
            'wcss_settings',
            [ 'sanitize_callback' => [ $this, 'sanitize_settings' ] ]
        );

        add_settings_section(
            'wcss_api_section',
            'API Configuration',
            null,
            'wcss_settings_group'
        );

        add_settings_field(
            'api_base_url',
            'API Base URL',
            [ $this, 'render_api_base_url_field' ],
            'wcss_settings_group',
            'wcss_api_section'
        );
    }

    public function sanitize_settings( $input ) {

        $output = [];

        if ( isset( $input['api_base_url'] ) ) {
            $output['api_base_url'] = esc_url_raw( trim( $input['api_base_url'] ) );
        }

        return $output;
    }

    public function render_api_base_url_field() {

        $options = get_option( 'wcss_settings' );
        $value   = $options['api_base_url'] ?? '';

        ?>
        <input
            type="url"
            name="wcss_settings[api_base_url]"
            value="<?php echo esc_attr( $value ); ?>"
            class="regular-text"
            placeholder="https://api.example.com"
        />
        <?php
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

            <hr>

            <h2>API Connection Test</h2>

            <button
                type="button"
                class="button button-secondary"
                id="wcss-test-connection"
            >
                Test Connection
            </button>

            <p id="wcss-test-result" style="margin-top:10px;"></p>
        </div>
        <?php
    }
}


