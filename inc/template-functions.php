<?php
if ( !defined('ABSPATH') ) {
    die();
}
  
function d( $arr, bool $is_hide = false ) {
    echo '<pre' . ($is_hide === true ? ' style="display: none;"' : '') . '>'; 
    print_r( $arr );
    echo "</pre>";
}
  
function debug( $arr ) {
    $f = fopen( $_SERVER["DOCUMENT_ROOT"] . "/debug.txt", "a+" );
    fwrite( $f, print_r( [$arr], true ) );
    fclose( $f );
}
  
function plural_format_word( int $number, array $after ):string {
    $cases = [2, 0, 1, 1, 1, 2];
    return $number . ' ' . $after[ ($number%100 > 4 && $number%100 < 20) ? 2 : $cases[ min($number%10, 5) ] ];
}
 
/** 
 * @param  string $date
 * @param  string $date_format
 *
 * @return string
 *
 * $date - use international format
 * $date_format - use needle format. You can use it like in function date()
*/
function change_date_format( string $date, string $date_format ):string {  
    if ( empty($date) || empty($date_format) ) {
        return false;
    }

    $_date = strtotime( $date );

    return date( $date_format, $_date );
}

/**
 * @param  string $s
 *
 * @return string
 */
function translit( string $s ):string {
    $s = (string) $s;
    $s = strip_tags( $s );
    $s = str_replace( array("\n", "\r"), " ", $s );
    $s = preg_replace( "/\s+/", ' ', $s );
    $s = trim( $s );
    $s = function_exists( 'mb_strtolower' ) ? mb_strtolower( $s ) : strtolower( $s );
    $s = strtr(
        $s, 
        array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'')
    );
    $s = preg_replace( "/[^0-9a-z-_ ]/i", "", $s );
    $s = str_replace( " ", "-", $s );

    return $s;
}

/**
 * @param  string $title
 * @param  string $data
 *
 * @return string
 */
function create_message( $title, $data ):string {
    $time = date( 'd.m.Y в H:i' );

    $message = "
			<!doctype html>
				<html>
					<head>
						<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
						<title>{$title}</title>
						<style>
							div, p, span, strong, b, em, i, a, li, td {
								-webkit-text-size-adjust: none;
							}
							td{vertical-align:middle}
						</style>
					</head>
					
					<body>
						
						<table width='500' cellspacing='0' cellpadding='5' border='1' bordercolor='1' style='border:solid 1px #000;border-collapse:collapse;'>
							<caption align='center' bgcolor='#dededd' border='1' bordercolor='1' style='border:solid 1px #000;border-collapse:collapse;background:#dededd;padding:10px 0'><b>{$title}</b></caption>";

    foreach ( $data as $key => $val ) {
        if ( $val != '' ) {
            $message .= '<tr><td bgcolor="#efeeee" style="background:#efeeee">' . $key . ':</td><td>' . $val . '</td>';
        }
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $message .= "<tr><td bgcolor='#efeeee' style='background:#efeeee'>Дата:</td><td>{$time}</td></tr><tr><td bgcolor='#efeeee' style='background:#efeeee'>IP:</td><td>{$ip}</td></tr>";

    if ( file_exists( get_template_directory() . '/inc/data/SxGeo.php' ) ) {

        include get_template_directory() . '/inc/data/SxGeo.php';

        $SxGeoCity = new SxGeo( get_template_directory() . '/inc/data/SxGeoCity.dat' );

        $region     = $SxGeoCity->getCityFull( $ip );
        $regionCity = $region["city"]["name_ru"];

        if ( $regionCity ) {
            $message .= "<td bgcolor='#efeeee' style='background:#efeeee'>Город:<br /><i>(определён на основе IP)</i></td><td>{$regionCity}</td></tr>";
        }

    }
    
    $message .= "</table></body></html>";

    return $message;
}

/**
 * @param  array  $items
 * @param  bool  $to_return
 *
 * @return string|void
 */
function breadcrumbs_render( array $items, bool $to_return = false ) {

    if ( empty( $items ) ) {
        return;
    }

    $output = '<ol class="breadcrumps" itemscope itemtype="http://schema.org/BreadcrumbList">';

    foreach ( $items as $key => $item ) {
        $output .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';

        if ( isset( $items[ $key + 1 ] ) && isset( $item['link'] ) && ! empty( $item['link'] ) ) {
            $output .= "<a itemprop=\"item\" href=\"{$item['link']}\">";
            $output .= "<span itemprop=\"name\">{$item['name']}</span>";
            $output .= '</a>';
        } else {
            $output .= "<span itemprop=\"name\">{$item['name']}</span>";
        }

        $output .= '</li>';
    }

    $output .= '</ol>';

    if ( $to_return === true ) {
        return $output;
    }

    echo $output;
}
