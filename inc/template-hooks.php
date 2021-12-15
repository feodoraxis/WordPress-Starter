<?php
if ( !defined('ABSPATH') ) {
    die();
}

add_filter( 'script_loader_tag', 'add_defer_tag_script', 10, 3 );
function add_defer_tag_script( $tag, $handle, $source ) {
    
    $path = parse_url( $_SERVER['REQUEST_URI'] );

    if ( strripos( $path['path'], 'wp-admin/') ) {
        return $tag;
    }

    return str_replace( "'>", "' defer>", $tag );
}

/**
 * If you need use some hooks, but only not hooks for ajax-requests, do it in this file. 
 * If need to categorized by category hooks, than do it in this file.
 * Include any files for hooks need here.
 */

/*
add_action( 'admin_menu', 'admin_menu_management' );
function admin_menu_management() {
    remove_menu_page('index.php');                // Console 
    remove_menu_page('edit.php');                 // Posts
    remove_menu_page('edit-comments.php');        // Comments 
    remove_menu_page('edit.php?post_type=page');  // Pages 
    remove_menu_page('upload.php');               // Media 
    remove_menu_page('themes.php');               // Themes 
    remove_menu_page('plugins.php');              // Plugins 
    remove_menu_page('users.php');                // Users 
    remove_menu_page('tools.php');                // Toolls 
    remove_menu_page('options-general.php');      // Parameters 
};
*/
