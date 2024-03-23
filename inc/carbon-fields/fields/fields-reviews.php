<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Typhoon_Coffee\Reviews_Post_Type;

Container::make( 'post_meta', 'Дополнительно об отзыве' )
	->where( 'post_type', '=', Reviews_Post_Type::POST_TYPE )
	->add_fields( array(
		Field::make( 'text', 'author', 'Имя автора' ),
		Field::make( 'text', 'position', 'Должность' ),
		Field::make( 'text', 'country', 'Страна' ),
	) );