@php

// Get the current post object
$current_post = get_post();
// Get the custom post type labels
$custom_post_type = $current_post->post_type;
$post_type_object = get_post_type_object($custom_post_type);
$post_type_name = $post_type_object->labels->name;
$archive_url = wp_get_referer() ? wp_get_referer() : home_url();

@endphp

<section class="offer__single mb-half lg:mb-full">
    <div class="container">
        <div class="header py-half lg:py-full bg-gray-light grid grid-cols-12 gap-5">
            <div class="col-span-full lg:col-start-3 lg:col-span-8 text-center">
                <div class="badge w-full"  data-aos="fade-up">
                    @php
                    $terms = get_the_terms($post->ID, 'premium_category');
                    if ($terms) {
                        foreach ($terms as $term) {
                            echo $post_type_name;
                        }
                    }
                    $terms_special = get_the_terms($post->ID, 'special_category');
                    if ($terms_special) {
                        foreach ($terms_special as $term) {
                            echo $post_type_name;
                        }
                    }
                    @endphp
                </div>
                <div class="title text-7xl font-semibold mt-5 xl:mt-half lg:mt-30"  data-aos="fade-up">
                    @php
                    $terms = get_the_terms($post->ID, 'premium_category');
                    if ($terms) {
                        foreach ($terms as $term) {
                            echo $term->name;
                        }
                    }
                    $terms_special = get_the_terms($post->ID, 'special_category');
                    if ($terms_special) {
                        foreach ($terms_special as $term) {
                            echo $term->name;
                        }
                    }
                    @endphp
                </div>
            </div>
            <div class="w-full col-span-full justify-center lg:col-span-1 flex items-center lg:justify-end"  data-aos="fade-up">
                <a href="<?php echo esc_url($archive_url); ?>">
                    @include('partials.swiper-arrow', ['class' => "offer__single--button-back transform rotate-180", 'color' => "white"])
                </a>
            </div>
        </div>
    </div>
</section>


<section class="offer__single--flexeditor mb-full">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-start-3 xl:col-span-8 col-span-full">
                @php ($builder = get_field('flexeditor'))
                @if(!empty($builder))
                    @foreach ($builder as $section)
                        @php($name = $section['acf_fc_layout'])
                        @include('builder.' . $name, ['block' => $section])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
