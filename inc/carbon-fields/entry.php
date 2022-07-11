<?php
if ( !defined('ABSPATH') ) {
    die();
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    if ( !file_exists( __DIR__ . '/../../vendor/autoload.php' ) ) {
        return;
    }

    require_once( __DIR__ . '/../../vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

require_once __DIR__ . "/theme-options.php";

if ( file_exists( __DIR__ . "/fields/_entry.php" ) ) {
    require_once __DIR__ . "/fields/_entry.php";
}

if ( file_exists( __DIR__ . "/blocks/_entry.php" ) ) {
    require_once __DIR__ . "/blocks/_entry.php";
}