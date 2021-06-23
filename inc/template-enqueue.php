<?php
if ( !defined('ABSPATH') ) die();

add_action( 'wp_enqueue_scripts', function () {
    //wp_enqueue_style( 'all_libs-css', get_template_directory_uri() . '/assets/css/all_libs.min.css', Array(),     '1.0', false );
    
    //wp_enqueue_style( 'main-css',  get_template_directory_uri() . '/assets/css/main.css',  Array('all_libs-css'), '1.0', false );
    //wp_enqueue_style( 'media-css', get_template_directory_uri() . '/assets/css/media.css', Array('main-css'),     '1.0', false );
    estyle([
        Array(
            'name' => 'all_libs',
            'dir' => '/assets/css/all_libs.min.css',
            'no_in_theme' => false,
            'in_footer' => false,
            'version' => '0.1',
        ),
        Array(
            'name' => 'main',
            'dir' => '/assets/css/main.css',
            'no_in_theme' => false,
            'in_footer' => false,
            'version' => '0.1',
        ),
        Array(
            'name' => 'media',
            'dir' => '/assets/css/media.css',
            'no_in_theme' => false,
            'in_footer' => false,
            'version' => '0.1',
        ),
    ]);
});

add_action( 'wp_enqueue_scripts', function () {
    wp_deregister_script( 'jquery' );
    
    escript([
        Array(
            'name' => 'libs',
            'dir' => '/assets/js/libs.min.css',
            'no_in_theme' => false,
            'in_footer' => true,
            'version' => '0.1',
        ),
        Array(
            'name' => 'common',
            'dir' => '/assets/js/common.css',
            'no_in_theme' => false,
            'in_footer' => true,
            'version' => '0.1',
        ),
    ]);
    //wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/assets/js/libs.min.js', Array(),          '1.0', true );
    
    //wp_enqueue_script( 'common-js', get_template_directory_uri() . '/assets/js/common.js', Array('libs-js'), '1.0', true );
});
