<?php

if ( ! defined( "ABSPATH" ) ) {
	exit;
}

add_action( 'carbon_fields_register_fields', 'feodoraxis_gutenberg_blocks' );
function feodoraxis_gutenberg_blocks() {
	require_once __DIR__ . '/block-about.php';
}
