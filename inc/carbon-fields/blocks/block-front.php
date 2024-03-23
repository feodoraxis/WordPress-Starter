<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Carbon_Fields\Field;
use Carbon_Fields\Block;

Block::make( 'About' )
	->set_keywords( array( 'Ключевые слова. Можно кириллицей' ) )
	->add_fields( array(
		Field::make( 'text', 'title', 'Заголовок' ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		//use $fields

		get_template_part( 'template-blocks/block', 'about', $fields );
	} );