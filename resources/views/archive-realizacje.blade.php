
{{--
  Template Name: Realizacje
--}}

@php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'realizacje',
  'posts_per_page' => 8,
  'paged' => $paged
);
$query = new WP_Query( $args );

$data = get_field('realizacje', 'option');

@endphp
@extends('layouts.app')

@section('content')

<section class="archive_realizacje__main">
    <div class="container">
        @if (!empty($data['realizacje_title']))
        <div class="w-full badge text-center pt-half lg:pt-full"  data-aos="fade-up">
            <h1>{{ $data['realizacje_title'] }}</h1>
        </div>
        @endif
        @if (!empty($data['realizacje_subtitle']))
        <div class="pb-half lg:pb-full mt-30 lg:mt-half w-full text-center xl:px-40 text-gray"  data-aos="fade-up">
          <p>{{ $data['realizacje_subtitle'] }}</p>
        </div>
        @endif
        <div class="grid grid-cols-12 gap-x-5">
          @if ($query->have_posts())
          <div class="col-start-2 col-span-10 grid grid-cols-1 md:grid-cols-2 gap-5 gap-y-5 lg:gap-y-full">
              @while ($query->have_posts())
              @php $query->the_post() @endphp
              <div class="col-span-1">
                  <div class="realizacja relative"  data-aos="fade-up">
                      <a href="@permalink">
                        <img class="mx-auto aspect-[750/500] object-cover w-full h-full object-center" src="@thumbnail('full', false)" alt="">
                        <div class="absolute opacity-0 transition-kaemde w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
                          <span class="btn-primary">{!! __('Zobacz projekt') !!}</span>
                        </div>
                        <div class="absolute bg-white bottom-0 left-0 min-h-[100px] w-[calc((442/750)*100%)] flex items-center">
                          <div class="text-6xl text-black font-semibold">
                          <h2>@title</h2>
                          </div>
                        </div>
                      </a>
                  </div>
              </div>
              @endwhile  
          </div>
          @if ($query->max_num_pages > 1)
          <div class="col-span-full"  data-aos="fade-up">
            @php page_navi($query, 8); @endphp
          </div>
          @else
          <div class="col-span-full mb-full"></div>
          @endif
          @php wp_reset_postdata() @endphp
          @endif
        </div>
        
    </div>
</section>

@endsection