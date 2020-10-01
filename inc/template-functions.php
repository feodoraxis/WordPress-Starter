<?php
if ( !defined('ABSPATH') ) die();
  
function d($arr) {
    echo '<pre>'; print_r($arr); echo"</pre>";
}
  
function debug($arr) {
    $f = fopen($_SERVER["DOCUMENT_ROOT"]."/debug.txt", "a+");
    fwrite($f, print_r(array($arr),true));
    fclose($f);
}
  
function get_picture_posts ( $post_id, $pic_size='thumbnail-size' ) {
    return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $pic_size, true )['0'];
}

function get_picture_by_id ( $pic_id, $pic_size='thumbnail-size' ) {
    return wp_get_attachment_image_src( $pic_id, $pic_size, true )['0'];
}

function get_pictures_alt_by_id( $attachment_id ) {
    return get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
}

function get_pictures_alt_by_post( $post_id ) {
    return get_post_meta( get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true );
}
  
function get_picture_taxonomy ( $term_id, $pic_size='thumbnail-size' ) { 
    //For WooCommerce. Custom taxonomies haven't thumbnails
    return wp_get_attachment_image_src( get_woocommerce_term_meta( $term_id, 'thumbnail_id', true ), $pic_size, true )['0'];
}
  
function plural_format_word($number, $after) {
    $cases = array (2, 0, 1, 1, 1, 2);
    return $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}
  
function change_date_format($date, $date_format) {
    /** 
     * $date - use international format
     * $date_format - use needle format. You can use it like in function date()
    */
  
    if ( empty($date) || empty($date_format) ) return false;

    $_date = strtotime( $date );
    return date($date_format, $_date);
  
}

function translit($s) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}

function create_message($title, $data) {
    $time = date('d.m.Y в H:i');

    $message = "
			<!doctype html>
				<html>
					<head>
						<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
						<title>$title</title>
						<style>
							div, p, span, strong, b, em, i, a, li, td {
								-webkit-text-size-adjust: none;
							}
							td{vertical-align:middle}
						</style>
					</head>
					
					<body>
						
						<table width='500' cellspacing='0' cellpadding='5' border='1' bordercolor='1' style='border:solid 1px #000;border-collapse:collapse;'>
							<caption align='center' bgcolor='#dededd' border='1' bordercolor='1' style='border:solid 1px #000;border-collapse:collapse;background:#dededd;padding:10px 0'><b>$title</b></caption>";

    foreach ($data as $key => $val) {
        if ($val != '')
            $message .= '<tr><td bgcolor="#efeeee" style="background:#efeeee">' . $key . ':</td><td>' . $val . '</td>';
    }

    $message .= "<tr><td bgcolor='#efeeee' style='background:#efeeee'>Дата:</td><td>$time</td></tr><tr><td bgcolor='#efeeee' style='background:#efeeee'>IP:</td><td>$_SERVER[REMOTE_ADDR]</td></tr>";

    if (file_exists(get_template_directory() . '/inc/data/SxGeo.php')) {
        include get_template_directory() . '/inc/data/SxGeo.php';

        $SxGeoCity = new SxGeo(get_template_directory() . '/inc/data/SxGeoCity.dat');
        $ip = $_SERVER['REMOTE_ADDR'];
        $region = $SxGeoCity->getCityFull($ip);
        $regionCity = $region["city"]["name_ru"];

        if ($regionCity) {
            $message .= "<td bgcolor='#efeeee' style='background:#efeeee'>Город:<br /><i>(определён на основе IP)</i></td><td>$regionCity</td></tr>";
        }
    }
    $message .= "</table></body></html>";
    return $message;
}
