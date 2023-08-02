<?php 

// Rejestracja nowego Custom Post Type
function register_custom_post_type() {  
    $labels = array(
        'name' => 'Opinie',
        'singular_name' => 'Opinia',
        'add_new' => 'Dodaj nową opinie',
        'add_new_item' => 'Dodaj nową opinie',
        'edit_item' => 'Edytuj opinie',
        'new_item' => 'Nowa opinia',
        'view_item' => 'Zobacz opinie',
        'search_items' => 'Szukaj opinii',
        'not_found' => 'Nie znaleziono opinii',
        'not_found_in_trash' => 'Nie znaleziono opinii w koszu'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-google',
        'rewrite' => array('slug' => 'opinie', 'with_front' => false),
    );

    register_post_type('places', $args);
}
add_action('init', __NAMESPACE__ . '\\register_custom_post_type');

// Funkcja pobierająca dane z API i tworząca posty
function import_places_data_from_api() {
    // Sprawdzenie, czy upłynął miesiąc od ostatniego importu danych

    $last_import_time = get_option('last_import_time');
    $current_time = time();
    $time_difference = $current_time - $last_import_time;

    if ($time_difference < 30 * 24 * 60 * 60) { // Jeśli upłynął mniej niż miesiąc, przerwij import
        return;
    }

    $language = "pl";
    $place_id = "ChIJn875_9JQAkcRCbhpHlqyarE";
    $api_key = "AIzaSyD-2XCusq0aMzCuOSc28MkqLLLUZEjjJFs";
    $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=name,rating,review&language=$language&key=$api_key";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($resp, true);
    if ($response['status'] == 'OK') {
        $place = $response['result'];
        $name = isset($place['name']) ? $place['name'] : null;
        $rating = isset($place['rating']) ? $place['rating'] : null;
        $reviews = isset($place['reviews']) ? $place['reviews'] : null;
        foreach ($reviews as $review) {
            $author_name = isset($review['author_name']) ? $review['author_name'] : null;
            $text = isset($review['text']) ? $review['text'] : null;
            $review_rating = isset($review['rating']) ? $review['rating'] : null;
            $post_date = isset($review['time']) ? date('Y-m-d H:i:s', $review['time']) : null;
            $avatar_url = isset($review['profile_photo_url']) ? $review['profile_photo_url'] : null;
    
            // Sprawdzenie, czy post z tą opinią już istnieje
            $args = array(
                'post_type' => 'places',
                'meta_query' => array(
                    array(
                        'key' => 'place_id',
                        'value' => $place_id,
                    ),
                    array(
                        'key' => 'author_name',
                        'value' => $author_name,
                    ),
                    array(
                        'key' => 'text',
                        'value' => $text,
                    ),
                    array(
                        'key' => 'rating',
                        'value' => $review_rating,
                    ),
                ),
            );
            $existing_posts = get_posts($args);
    
            if (empty($existing_posts)) {
                // Tworzenie nowego postu na podstawie danych z API
                $post = array(
                    'post_title' => $author_name,
                    'post_content' => $text,
                    'post_status' => 'publish',
                    'post_type' => 'places',
                    'post_date' => $post_date,
                );
    
                $post_id = wp_insert_post($post);
    
                // Ustawienie meta-danych postu
                if (!empty($review_rating)) {
                    update_post_meta($post_id, 'rating', $review_rating);
                }
                update_post_meta($post_id, 'place_id', $place_id);
                update_post_meta($post_id, 'author_name', $author_name);
                update_post_meta($post_id, 'text', $text);
                update_post_meta($post_id, 'avatar_url', $avatar_url);
                
                
            }
        }
    
        // Ustawienie czasu ostatniego importu danych jako opcji w bazie WordPress
        update_option('last_import_time', $current_time);
    }

}

// Wywołanie funkcji importującej dane z API
add_action('wp_loaded',  __NAMESPACE__ . '\\import_places_data_from_api');

// Dodanie kolumny z meta danymi w widoku listy postów
function add_rating_column($columns) {
    $columns['rating'] = 'Ocena';
    return $columns;
}
add_filter('manage_places_posts_columns',  __NAMESPACE__ . '\\add_rating_column');

function display_rating_column($column, $post_id) {
    if ($column == 'rating') {
        $rating = get_post_meta($post_id, 'rating', true);
        $rating_number = floatval($rating);
        $star_rating = round($rating_number);
        for ($i = 0; $i < $star_rating; $i++) {
            echo '<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="#FFD500"/>
            </svg>';
        }
        for ($i = 0; $i < 5 - $star_rating; $i++) {
            echo '<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 0.404509L12.1263 6.94846L12.1543 7.03483H12.2451H19.1259L13.5592 11.0792L13.4858 11.1326L13.5138 11.219L15.6401 17.7629L10.0735 13.7185L10 13.6652L9.92653 13.7185L4.35991 17.7629L6.48617 11.219L6.51423 11.1326L6.44076 11.0792L0.874146 7.03483H7.75486H7.84568L7.87374 6.94846L10 0.404509Z" fill="white" stroke="black" stroke-width="0.25"/>
            </svg>';
        } 
        //echo $rating;
    } else {
        echo '-';
    }
}
add_action('manage_places_posts_custom_column',  __NAMESPACE__ . '\\display_rating_column', 10, 2);

function add_review_meta_box() {
    add_meta_box(
        'review_meta_box',
        'Edytuj pola',
        __NAMESPACE__ . '\\review_meta_box_callback',
        'places', // nazwa typu postów, dla których ma być wyświetlany meta box
        'normal',
        'default'
    );
}

add_action( 'add_meta_boxes', __NAMESPACE__ . '\\add_review_meta_box' );

function review_meta_box_callback( $post ) {
    wp_nonce_field( 'review_meta_box', 'review_meta_box_nonce' );

    $author_name = get_post_meta( $post->ID, 'author_name', true );
    $text = get_post_meta( $post->ID, 'text', true );
    $rating = get_post_meta( $post->ID, 'rating', true );
    ?>
    <div class="form">
        <br/>
        <label for="rating"><?php _e( 'Ocena', 'myplugin_textdomain' ); ?></label>
        <input type="number" id="rating" name="rating" min="1" max="5" step="1" value="<?php echo esc_attr( $rating ); ?>">
    </div>

    <?php
}
function save_review_meta( $post_id ) {
    if ( ! isset( $_POST['review_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['review_meta_box_nonce'], 'review_meta_box' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['rating'] ) ) {
        update_post_meta( $post_id, 'rating', sanitize_text_field( $_POST['rating'] ) );
    }
}

add_action( 'save_post_places', __NAMESPACE__ . '\\save_review_meta' );



function my_post_time_ago_function($time) {
    return sprintf( esc_html__( '%s temu', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}

add_filter( 'the_time', __NAMESPACE__ . '\\my_post_time_ago_function' );