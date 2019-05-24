<?php
if ( !defined('ABSPATH') ) die();

function enqueue_styles() {
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.min.css', Array(), '1.1.1', false );
}

function enqueue_scripts() {

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'libs', get_template_directory_uri() . '/assets/js/libs.min.js', array(), '1.1.1' );
    wp_enqueue_script( 'common', get_template_directory_uri() . '/assets/js/common.js', array(), '1.1.1' );

}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );