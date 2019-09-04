<?php
if ( !defined('ABSPATH') ) die();

add_theme_support( 'title-tag' );

register_nav_menus( array(
    'main-menu' => esc_html__( 'Main menu' ),
) );

add_theme_support( 'html5', array(
    'title-tag',
    'post-thumbnails',
    'search-form',
    'gallery',
    'caption',
) );

//WordPress-Starter - is dir-name of this starter. If you change dir name - you need change name here to. 
load_theme_textdomain( 'WordPress-Starter', get_template_directory() . '/langs' );

// function main_widgets_init() {
//     register_sidebar( array(
//         'name'          => esc_html__( 'Sidebar' ),
//         'id'            => 'sidebar-1',
//         'description'   => esc_html__( 'Add widgets here.' ),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h2 class="widget-title">',
//         'after_title'   => '</h2>',
//     ) );
// }
// add_action( 'widgets_init', 'main_widgets_init' );
