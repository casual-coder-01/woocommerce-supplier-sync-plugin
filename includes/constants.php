<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WCSS_PLUGIN_PATH' ) ) {
    define( 'WCSS_PLUGIN_PATH', plugin_dir_path( dirname( __FILE__ ) ) );
}

if ( ! defined( 'WCSS_PLUGIN_URL' ) ) {
    define( 'WCSS_PLUGIN_URL', plugin_dir_url( dirname( __FILE__ ) ) );
}
