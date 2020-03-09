<?php
if ( !defined('ABSPATH') ) die();

function enqueue_styles() {
    wp_enqueue_style( 'all_libs-css', get_template_directory_uri() . '/assets/css/all_libs.min.css', Array(),               '1.0', false );
    wp_enqueue_style( 'main-css',     get_template_directory_uri() . '/assets/css/main.css',         Array('all_libs-css'), '1.0', false );
    wp_enqueue_style( 'media-css',    get_template_directory_uri() . '/assets/css/media.css',        Array('main-css'),     '1.0', false );
}

function enqueue_scripts() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', Array(),          '1.0', true );
    wp_enqueue_script( 'common-js', get_template_directory_uri() . '/assets/js/common.js', Array('libs-js'), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
