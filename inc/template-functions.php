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
  
function get_taxonomy_posts ( $term_id, $pic_size='thumbnail-size' ) { //Сделано для woocommerce, у кастомных картинок таксономий может не работать
    return wp_explode( wp_get_attachment_image_src( get_woocommerce_term_meta( $term_id, 'thumbnail_id', true ), $pic_size, true )['0'] );
}
  
function plural_form($number, $after) {
    $cases = array (2, 0, 1, 1, 1, 2);
    echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}
  
function change_date_format($date, $date_format) {//international format
  
    if ( empty($date) || !empty($date_format) ) return false;

    $_date = strtotime( $date );
    return date($date_format, $_date);
  
}