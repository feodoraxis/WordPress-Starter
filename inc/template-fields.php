<?php
if ( !defined('ABSPATH') ) die();

/** 
 * Use only if was installed plugin "Carbon Fields"
 * https://carbonfields.net
*/

/*
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block; //For Gutenberg

Container::make( 'theme_options', 'Настройки темы' )
    ->add_tab( 'Общее', array(
        Field::make( 'text', 'main_worktime', 'График работ' ),
        Field::make( 'text', 'main_link-vk', 'Ссылка VK' )
            ->set_width(50),
        Field::make( 'text', 'main_link-insta', 'Ссылка Instagram' )
            ->set_width(50),
        Field::make( 'text', 'main_phone', 'Телефон' ),
    ) )
    ->add_tab( 'Шапка', array(
        Field::make( 'image', 'main_logo', 'Логотип' ),
    ) );

Container::make( 'post_meta', 'Контакты' )
    ->show_on_post_type( 'page' )
    ->show_on_template( 'contact-page.php' )
    ->add_tab( __('main'), Array(
        Field::make('text', 'contact_page-phone', 'Телефон')
            ->set_width(25),
    ) );

// For Gurenberg
Block::make( __( 'My Shiny Gutenberg Block' ) )
    ->add_fields( array(
        Field::make( 'text', 'heading', __( 'Block Heading' ) ),
        Field::make( 'image', 'image', __( 'Block Image' ) ),
        Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
    ) )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>

        <div class="block">
            <div class="block__heading">
                <h1><?php echo esc_html( $fields['heading'] ); ?></h1>
            </div><!-- /.block__heading -->

            <div class="block__image">
                <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
            </div><!-- /.block__image -->

            <div class="block__content">
                <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
            </div><!-- /.block__content -->
        </div><!-- /.block -->

        <?php
    } );
*/