<?php

namespace Typhoon_Coffee;

if ( ! defined( "ABSPATH" ) ) {
	exit;
}

class Equipment_Post_Type extends Post_Type_Register {

	const POST_TYPE = 'equipment';
	const CATEGORY = 'category-equipment';

	const POST_TYPE_LABELS = array(
		'name'               => 'Товары',
		'singular_name'      => 'Товар',
		'add_new'            => 'Добавить товар',
		'add_new_item'       => 'Добавление товара',
		'edit_item'          => 'Редактирование товара',
		'new_item'           => 'Новый товар',
		'view_item'          => 'Смотреть товар',
		'search_items'       => 'Искать товар',
		'not_found'          => 'Не найдено',
		'not_found_in_trash' => 'Не найдено в корзине',
		'menu_name'          => 'Товары',
	);

	const TAXONOMY_LABELS = array(
		'name'              => 'Категории',
		'singular_name'     => 'Категория',
		'search_items'      => 'Поиска категорий',
		'all_items'         => 'Все категории',
		'view_item '        => 'Посмотреть категорию',
		'parent_item'       => 'Родительская категория',
		'parent_item_colon' => 'Родительская категория:',
		'edit_item'         => 'Изменить категорию',
		'update_item'       => 'Обновить категорию',
		'add_new_item'      => 'Добавить новую категорию',
		'new_item_name'     => 'Имя новой категории',
		'menu_name'         => 'Категории',
		'back_to_items'     => 'Назад к категориям',
	);

	public function register_post_type():void {
		register_post_type( self::POST_TYPE, array(
			'label'         => null,
			'labels'        => self::POST_TYPE_LABELS,
			'description'   => '',
			'public'        => true,
			'show_in_menu'  => true,
			'show_in_rest'  => true,
			'menu_position' => 30,
			'menu_icon'     => 'dashicons-cart',
			'hierarchical'  => false,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ), //// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'    => array( self::CATEGORY ),
			'has_archive'   => true,
			'rewrite'       => true,
			'query_var'     => true,
		) );

		register_taxonomy( self::CATEGORY, array( self::POST_TYPE ), array(
			'labels'                => self::TAXONOMY_LABELS,
			'public'                => true,
			'hierarchical'          => true,

			'rewrite'               => true,
			'capabilities'          => array(),
			'meta_box_cb'           => null,
			'show_admin_column'     => true,
			'show_in_rest'          => true,
		) );
	}
}