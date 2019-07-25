<?php
if ( !defined('ABSPATH') ) die();

function enqueue_styles() {
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', Array(), '1.1.1', false );
}

function enqueue_scripts() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery',  get_template_directory_uri() . '/assets/js/jquery.js', array(),         '1.1.1', true );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js',   array('jquery'), '1.1.1', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );