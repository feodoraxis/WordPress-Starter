<?php
if ( !defined('ABSPATH') ) die();

function wp_explode( $link ) {
    return explode($_SERVER['HTTP_HOST'], $link)['1'];
}
  
function d($arr) {
    echo '<pre>'; print_r($arr); echo"</pre>";
}
  
function debug($arr) {
    $f = fopen($_SERVER["DOCUMENT_ROOT"]."/debug.txt", "a+");
    fwrite($f, print_r(array($arr),true));
    fclose($f);
}
  
function get_picture_posts ( $post_id, $pic_size='thumbnail-size' ) {
    return wp_explode( wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $pic_size, true )['0'] );
}
  
function get_picture_taxonomy ( $term_id, $pic_size='thumbnail-size' ) { 
    //For WooCommerce. Custom taxonomies haven't thumbnails
    return wp_explode( wp_get_attachment_image_src( get_woocommerce_term_meta( $term_id, 'thumbnail_id', true ), $pic_size, true )['0'] );
}
  
function plural_format_word($number, $after) {
    $cases = array (2, 0, 1, 1, 1, 2);
    echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}
  
function change_date_format($date, $date_format) {
    /** 
     * $date - use international format
     * $date_format - use needle format. You can use it like in function date()
    */
  
    if ( empty($date) || !empty($date_format) ) return false;

    $_date = strtotime( $date );
    return date($date_format, $_date);
  
}
