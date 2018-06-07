<?php
/**
 * Class Name: s_bootstrap_navwalker
 */

class s_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '<ul class="dropdown-menu">';
	}

	/**
	 * @see Walker::start_el()
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( strcasecmp( $item->title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= '<li class="dropdown-divider">';
		} else {
			/* <li> element  */
			$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children ) {
				$class_names .= ' dropdown';
				if ( $depth > 0 ) {
					$class_names .= ' dropdown-submenu';
				}
			}
			if ( in_array( 'current-menu-item', $classes ) ) {
				$class_names .= ' active';
			}
			$class_attr = $class_names ? ' class="nav-item ' . esc_attr( $class_names ) . '"' : '';

			$id_attr = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id_attr = $id_attr ? ' id="' . esc_attr( $id_attr ) . '"' : '';

			$output .= '<li' . $id_attr . $class_attr . '>';

			/* <a> element */
			$attributes = array(
				'title'  => ! empty( $item->title ) ? $item->title : '',
				'target' => ! empty( $item->target ) ? $item->target : '',
				'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
			);

			if ( $args->has_children ) {
				$attributes['href']          = '#';
				$attributes['data-toggle']   = 'dropdown';
				$attributes['class']         = 'dropdown-toggle nav-link';
				$attributes['aria-haspopup'] = 'true';
			} else {
				$attributes['href']  = ! empty( $item->url ) ? $item->url : '';
				$attributes['class'] = 'nav-link';
			}

			if ( $depth > 0 ) {
				if ( $depth > 0 && ! in_array( 'menu-item-has-children', $classes ) ) {
					$attributes['class'] = 'dropdown-item';
				} elseif ( $depth > 0 && in_array( 'menu-item-has-children', $classes ) ) {
					$attributes['data-toggle'] = 'dropdown';
					$attributes['class']       = 'dropdown-toggle dropdown-item';
				}
			}
			$attributes  = apply_filters( 'nav_menu_link_attributes', $attributes, $item, $args );
			$anchor_attr = '';
			foreach ( $attributes as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value        = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$anchor_attr .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output  = $args->before;
			$item_output .= '<a' . $anchor_attr . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * @see Walker::display_element()
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}
		$id_field = $this->db_fields['id'];

		// Display this element.
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}
