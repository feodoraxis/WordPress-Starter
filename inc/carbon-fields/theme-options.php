<?php
if ( !defined('ABSPATH') ) {
    die();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'feodoraxis_theme_options_fields' );
function feodoraxis_theme_options_fields() {
    Container::make( 'theme_options', 'Настройки темы' )
        ->add_tab( 'Общие настройки', array(
            Field::make( 'text', 'option-phone', 'Телефон' )
                ->set_width(33),
            Field::make( 'text', 'option-email', 'E-mail' )
                ->set_width(33),
            Field::make( 'text', 'option-email-recall', 'E-mail для формы' )
                ->set_width(33),
            Field::make( 'text', 'option-fb', 'Facebook' )
                ->set_width(20),
            Field::make( 'text', 'option-ig', 'Instagram' )
                ->set_width(20),
            Field::make( 'text', 'option-in', 'Linked In' )
                ->set_width(20),
            Field::make( 'text', 'option-tg', 'Telegram' )
                ->set_width(20),
            Field::make( 'text', 'option-yt', 'Youtube' )
                ->set_width(20),
            Field::make( 'textarea', 'option-copyright', 'Copyright' ),

        ) )
        ->add_tab( 'Соглашение об обработке персональных данных', array(
            Field::make( "rich_text", "option-confirm", "Условия обработки персональных данных" )
        ) );   
}