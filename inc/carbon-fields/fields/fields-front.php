<?php
if ( !defined('ABSPATH') ) {
    die();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Контент' ) )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'front-page.php' )
    ->add_tab( "Название таба", Array(
        Field::make( "text", "b-fourth-title", 'Заголовок' ),
        Field::make( 'textarea', 'b-fourth-text', 'Текст под заголовком' )
            ->set_rows(2),
        Field::make( 'complex', 'b-fourth-list', 'Список' ) 
            ->set_collapsed( true )
            ->setup_labels( Array(
                'plural_name'   => 'пункт',
                'singular_name' => 'пункт',
            ) )
            ->set_max(6)
            ->add_fields( Array(
                Field::make( 'text', 'b-fourth-item', 'Текст пункта')
            ) )
    ) ); 