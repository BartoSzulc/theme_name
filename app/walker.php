<?php
// Check if Class Exists.
if (!class_exists('Custom_Nav_Walker')) :
    /**
     * Custom_Nav_Walker class.
     */
    class Custom_Nav_Walker extends Walker_Nav_Menu
    {

        /**
         * Starts the list before the elements are added.
         *
         * @since WP 3.0.0
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @param string           $output Used to append additional content (passed by reference).
         * @param int              $depth  Depth of menu item. Used for padding.
         * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
         */
        public function start_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $submenu_class = ($depth > 0) ? 'sub-menu' : 'menu-item__dropdown-menu';
            $output .= "\n$indent<ul class=\"$submenu_class depth-$depth\">\n";
        }

        /**
         * Starts the element output.
         *
         * @since WP 3.0.0
         * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
         *
         * @see Walker_Nav_Menu::start_el()
         *
         * @param string           $output Used to append additional content (passed by reference).
         * @param WP_Nav_Menu_Item $item   Menu item data object.
         * @param int              $depth  Depth of menu item. Used for padding.
         * @param WP_Nav_Menu_Args $args   An object of wp_nav_menu() arguments.
         * @param int              $id     Current item ID.
         */
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            $output .= $indent . '<li class="menu-item';

            // Add "current-page" class if the menu item is the current page
            if (in_array('current-menu-item', $item->classes)) {
                $output .= ' menu-item__current-page';
            }

            // Add dropdown class if the menu item has children
            if ($args->walker->has_children && $depth === 0) {
                $output .= ' menu-item__dropdown';
            }
            if ($depth === 0) {
                $output .= ' menu-item__first-level';
            }
            if ($depth === 1) {
                $output .= ' menu-item__second-level';
            }
            if ($depth === 2) {
                $output .= ' menu-item__third-level';
            }
            $output .= '">';

            $attributes = $item->attr_title ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= $item->target ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= $item->xfn ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= $item->url ? ' href="' . esc_attr($item->url) . '"' : '';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';

            // Add SVG element inside the <a> tag
            if ($depth === 0) {
                $svg = '<svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="-0.5" x2="53.0754" y2="-0.5" transform="matrix(-0.67828 0.734803 -0.67828 -0.734803 36 0)" stroke="#8EC43F"/>
                </svg>';
                $item_output .= $svg;
            }

            $item_output .= '<span>' . $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after . '</span>';
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }
endif;
