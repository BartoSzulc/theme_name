<?php 

add_filter('tiny_mce_before_init', __NAMESPACE__ . '\\ws_custom_colors');
function ws_custom_colors($init) {
    $default_colours = '
    "383436", "black",
    "8EC43F", "primary",
    "91B508", "secondary",
    "747172", "gray",
    "F3F3F3", "gray-light",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$default_colours.']';
 
    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 6;
 
    return $init;
}

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', __NAMESPACE__ . '\\my_mce_buttons_2' );
/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\fb_mce_before_init' );

function fb_mce_before_init( $settings ) {

    // Set to true to include the default settings.
    $settings['style_formats_merge'] = false;
    
    $style_formats = array(
        array(
            'title' => 'heading-2',
            'block' => 'div',
            'classes' => 'text-8xl font-bold',
            'wrapper' => true
        ),
        array(
            'title' => 'heading-3',
            'block' => 'div',
            'classes' => 'text-7xl font-bold',
            'wrapper' => true
        ),
        array(
            'title' => 'heading-4',
            'block' => 'div',
            'classes' => 'text-6xl font-semibold',
            'wrapper' => true
            
        ),
        array(
            'title' => 'heading-5',
            'block' => 'div',
            'classes' => 'text-5xl font-semibold',
            'wrapper' => true
        ),
        array(
            'title' => 'text-gray',
            'block' => 'div',
            'classes' => 'text-gray',
            'wrapper' => true
        ),
        array(
            'title' => 'text-black',
            'block' => 'div',
            'classes' => 'text-black',
            'wrapper' => true
        ),
        array(
            'title' => 'margin-50',
            'block' => 'div',
            'classes' => 'my-half',
            'wrapper' => true
        ),
        array(
            'title' => 'text-primary',
            'block' => 'div',
            'classes' => 'text-primary',
            'wrapper' => true
        ),
    );
    
    $settings['style_formats'] = json_encode( $style_formats );
    
    return $settings;

}
     
