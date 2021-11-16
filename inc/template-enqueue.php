<?php
if ( !defined('ABSPATH') ) {
    die();
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
function enqueue_scripts() {
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.min.css', Array(), '1.0', false ); 

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', Array('jquery'),  '1.0', true );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js',     Array('libs-js'), '1.0', true );
    wp_enqueue_script( 'web-js',  get_template_directory_uri() . '/assets/js/web.js',      Array('main-js'), '1.0', true );
}