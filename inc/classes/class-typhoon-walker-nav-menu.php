<?php

namespace Typhoon_Coffee;

if ( ! defined( "ABSPATH" ) ) {
	exit;
}

use Walker_Nav_Menu;

class Typhoon_Walker_Nav_Menu extends Walker_Nav_Menu {
	protected bool $is_submenu = false;

	protected function is_submenu( $classes = '' ):bool {
		if ( $this->is_submenu === true ) {
			return true;
		}

		if ( strripos( $classes, 'sub-menu' ) > -1 ) {
			$this->is_submenu = true;
			return true;
		}

		return false;
	}

	protected function is_has_item_childs( array $classes, $menu_item ):bool {
		return in_array( 'menu-item-has-children', $classes ) || carbon_get_nav_menu_item_meta( $menu_item->ID, 'is_catalog_menu' ) == true;
	}
}