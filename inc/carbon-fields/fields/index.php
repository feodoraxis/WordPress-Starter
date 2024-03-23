<?php

if ( ! defined( "ABSPATH" ) ) {
	exit;
}

add_action( 'carbon_fields_register_fields', 'feodoraxis_pages_fields' );
function feodoraxis_pages_fields() {
	require_once __DIR__ . '/fields-front.php';
}
