
{{--
  Template Name: Aktualnosci
--}}

@php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 12,
  'paged' => $paged
);
$query = new WP_Query( $args );

@endphp
@extends('layouts.app')

@section('content')

<section class="archive_aktualnosci__main">
    <div class="container">
        <div class="w-full badge text-center py-half lg:py-full"  data-aos="fade-up">
           

            <h1>{!! the_title() !!}</h1>
        </div>
        @if ($query->have_posts())
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 gap-y-half lg:gap-y-full">
          @while ($query->have_posts())
              @php $query->the_post() @endphp
              <div class="col-span-1 w-fit lg:w-auto mx-auto">
                <div class="blog relative"  data-aos="fade-up">
                  <a href="@permalink">
                    <img class="mx-auto aspect-[596/400] object-cover w-full h-full object-center" src="@thumbnail('full', false)" alt="">
                    <div class="absolute opacity-0 transition-kaemde w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
                      <span class="btn-primary">{!! __('Zobacz wpis') !!}</span>
                    </div>
                    <div class="absolute bg-white bottom-0 right-0 min-h-[100px] w-[calc((442/596)*100%)] flex items-center">
                      <div class="text-5xl text-black font-semibold pl-30 uppercase tracking-tightest">
                        <h2>@title</h2>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
          @endwhile 
        </div>
        @if ($query->max_num_pages > 1)
            @php page_navi($query, 12) @endphp
        @else
        <div class="col-span-full mb-half lg:mb-full"  data-aos="fade-up"></div>
        @endif
        @php wp_reset_postdata() @endphp
        @endif
    </div>
</section>
 
@endsection