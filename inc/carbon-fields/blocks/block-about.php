<?php
if ( !defined('ABSPATH') ) {
    die();
}

use Carbon_Fields\Field;
use Carbon_Fields\Block;

Block::make( 'About' )
    ->add_fields( array(
        Field::make( 'text', 'about-title', 'Заголовок' ),
        Field::make( 'textarea', 'about-text', 'Текст' )
            ->set_rows(2),
        Field::make( 'text', 'about-link-text', "Текст ссылки"),
        Field::make( 'text', 'about-link-uri', "Адрес ссылки"),
    ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
        <section class="about">
            <div class="wrapper">
                <h2><?php echo $fields["about-title"]; ?></h2>
                <p><?php echo nl2br( $fields['about-text'] ); ?></p>
                <p><a href="<?php echo $fields['about-link-uri']; ?>"><?php echo $fields['about-link-text']; ?></a></p>
            </div>
        </section>
        <?php

    } );