<?php 
function register_custom_post_type_stolarka_premium() {  
    $labels = array(
        'name' => 'Stolarka premium',
        'singular_name' => 'Stolarka premium',
        'add_new' => 'Dodaj nową',
        'add_new_item' => 'Utwórz stolarke premium',
        'edit_item' => 'Edytuj',
        'new_item' => 'Nowa stolarka premium',
        'view_item' => 'Zobacz ',
        'search_items' => 'Szukaj',
        'not_found' => 'Nie znaleziono',
        'not_found_in_trash' => 'Nie znaleziono w koszu'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-tagcloud',
    );

    register_post_type('premium', $args);
}
add_action('init', __NAMESPACE__ . '\\register_custom_post_type_stolarka_premium');

function custom_taxonomy_category_stolarka_premium() {
    $labels = array(
        'name' => 'Kategorie',
        'singular_name' => 'Kategoria',
        'search_items' => 'Szukaj kategorii',
        'all_items' => 'Wszystkie kategorie',
        'menu_name' => 'Kategorie',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'premium_category', array( 'premium' ), $args );
}
add_action( 'init', __NAMESPACE__ . '\\custom_taxonomy_category_stolarka_premium', 0 );

function register_custom_post_type_stolarka_special() {  
    $labels = array(
        'name' => 'Stolarka specjalistyczna',
        'singular_name' => 'Stolarka specjalistyczna',
        'add_new' => 'Dodaj nową',
        'add_new_item' => 'Utwórz stolarke specjalistyczna',
        'edit_item' => 'Edytuj ',
        'new_item' => 'Nowa stolarka specjalistyczna',
        'view_item' => 'Zobacz',
        'search_items' => 'Szukaj',
        'not_found' => 'Nie znaleziono',
        'not_found_in_trash' => 'Nie znaleziono w koszu'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-text',
        
    );


    register_post_type('specjalistyczna', $args);
}
add_action('init', __NAMESPACE__ . '\\register_custom_post_type_stolarka_special');

function custom_taxonomy_category_stolarka_special() {
    $labels = array(
        'name' => 'Kategorie',
        'singular_name' => 'Kategoria',
        'search_items' => 'Szukaj kategorii',
        'all_items' => 'Wszystkie kategorie',
        'menu_name' => 'Kategorie',
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );

    register_taxonomy( 'special_category', array( 'specjalistyczna' ), $args );
}
add_action( 'init', __NAMESPACE__ . '\\custom_taxonomy_category_stolarka_special', 0 );




