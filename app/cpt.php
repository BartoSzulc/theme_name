<?php 

function register_custom_post_type_realizacje() {  
    $labels = array(
        'name' => 'Realizacje',
        'singular_name' => 'Realizacja',
        'add_new' => 'Dodaj nową realizacje',
        'add_new_item' => 'Dodaj nową realizacje',
        'edit_item' => 'Edytuj realizacje',
        'new_item' => 'Nowa realizacja',
        'view_item' => 'Zobacz realizacje',
        'search_items' => 'Szukaj realizacji',
        'not_found' => 'Nie znaleziono realizacji',
        'not_found_in_trash' => 'Nie znaleziono realizacji w koszu'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-gallery',
    );

    register_post_type('realizacje', $args);
}
add_action('init', __NAMESPACE__ . '\\register_custom_post_type_realizacje');


function page_navi($query, $posts_per_page = 8, $before = '', $after = '') {
    $request        = $query->request;
    $paged          = intval($query->query_vars['paged']);
    $numposts       = $query->found_posts;
    $max_page       = ceil($numposts / $posts_per_page); // Calculate the total number of pages based on fixed posts_per_page

    if ($numposts <= $posts_per_page) {
        return;
    }
    if (empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show         = 4;
    $pages_to_show_minus_1 = $pages_to_show - 1;
    $half_page_start       = floor($pages_to_show_minus_1 / 2);
    $half_page_end         = ceil($pages_to_show_minus_1 / 2);
    $start_page            = $paged - $half_page_start;
    if ($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end;
    if (($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1;
    }
    if ($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page   = $max_page;
    }
    if ($start_page <= 0) {
        $start_page = 1;
    }

    echo $before . '<nav class="w-full" aria-label="RealizationNavigation"><ul class="pagination">' . "";

    if ($paged > 1) {
        $prevposts = get_previous_posts_page_link();
        if ($prevposts) {
            echo '<li class="page-item prev"><a href="' . $prevposts . '" class="page-link">';
            ?>
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="30" fill="#383436"/>
            <g clip-path="url(#clip0_1436_74)">
            <path d="M15.3437 30.8295C15.3441 30.8299 15.3444 30.8303 15.3448 30.8306L21.468 36.9244C21.9268 37.3809 22.6688 37.3792 23.1254 36.9204C23.5819 36.4617 23.5802 35.7197 23.1214 35.2631L19.0103 31.1719L43.8281 31.1719C44.4754 31.1719 45 30.6472 45 30C45 29.3528 44.4754 28.8281 43.8281 28.8281L19.0103 28.8281L23.1214 24.7369C23.5801 24.2803 23.5819 23.5383 23.1253 23.0796C22.6687 22.6208 21.9267 22.6192 21.468 23.0756L15.3447 29.1694C15.3444 29.1697 15.3441 29.1701 15.3437 29.1705C14.8847 29.6286 14.8862 30.373 15.3437 30.8295Z" fill="#8EC43F"/>
            </g>
            <defs>
            <clipPath id="clip0_1436_74">
            <rect width="30" height="30" fill="white" transform="translate(45 45) rotate(-180)"/>
            </clipPath>
            </defs>
            </svg>
            <?php
            echo '<span class="sr-only">Previous</span></a></li>';
        }
    }

    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $paged) {
            echo '<li class="active page-item"><a class="page-link">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a href="' . get_pagenum_link($i) . '" class="page-link">' . $i . '</a></li>';
        }
    }

    $nextposts = get_next_posts_page_link();
    if ($nextposts && $paged < $max_page) {
        echo '<li class="page-item next"><a href="' . $nextposts . '" class="page-link">';
        ?>
        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="30" cy="30" r="30" fill="#383436"/>
        <g clip-path="url(#clip0_1530_262)">
        <path d="M44.6563 29.1705C44.6559 29.1701 44.6556 29.1697 44.6552 29.1694L38.532 23.0756C38.0732 22.6191 37.3312 22.6208 36.8746 23.0796C36.4181 23.5383 36.4198 24.2803 36.8786 24.7369L40.9897 28.8281H16.1719C15.5246 28.8281 15 29.3528 15 30C15 30.6472 15.5246 31.1719 16.1719 31.1719H40.9897L36.8786 35.2631C36.4199 35.7197 36.4181 36.4617 36.8747 36.9204C37.3313 37.3792 38.0733 37.3808 38.532 36.9244L44.6553 30.8306C44.6556 30.8303 44.6559 30.8299 44.6563 30.8295C45.1153 30.3714 45.1138 29.627 44.6563 29.1705Z" fill="#8EC43F"/>
        </g>
        <defs>
        <clipPath id="clip0_1530_262">
        <rect width="30" height="30" fill="white" transform="translate(15 15)"/>
        </clipPath>
        </defs>
        </svg>
        <?php
        echo '<span class="sr-only">Next</span></a></li>';
    }
    echo '</ul></nav>' . $after . "";
}



