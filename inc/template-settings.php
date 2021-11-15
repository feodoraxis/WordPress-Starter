<?php
if ( !defined('ABSPATH') ) die();

add_theme_support( 'title-tag'       );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'search-form'     );
add_theme_support( 'gallery'         );
add_theme_support( 'caption'         );

register_nav_menus( Array(
    'main-menu' => esc_html__( 'Main menu' ),
) );

/*
 * WordPress-Starter - is dir-name of this starter. If you change dir name - you need change name here to. 
 *
 */
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
// add_image_size( 'auteurs-preview', 361, 260, true );
