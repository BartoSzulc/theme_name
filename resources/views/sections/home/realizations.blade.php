@php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'realizacje',
  'posts_per_page' => 3,
  'paged' => $paged
);
$query = new WP_Query( $args );

$data = get_field('realizacje', 'option');
$title = $data['realizacje_title--front'] ?? null;
$subtitle = $data['realizacje_subtitle--front'] ?? null;
@endphp


<section class="home__realizacje bg-gray-light py-half lg:py-full overflow-hidden">
    <div class="container">
      @if (!empty($title))
      <div class="badge w-full text-center" data-aos="fade-up">
        <h2>{{ $title }}</h2>
      </div>
      @endif
      @if (!empty($subtitle))
      <div class="w-full py-half text-desc text-center text-gray" data-aos="fade-up">
        <p>{{ $subtitle }}</p>
      </div>
      @endif
      <div class="grid grid-cols-12 gap-5">
        <div class="hidden col-span-1 lg:flex flex-col justify-center space-y-10 relative z-10" data-aos="fade-up">
          @include('partials.swiper-arrow', ['class' => "swiperRealizacje__nav--prev flex w-fit transform rotate-180"])
          @include('partials.swiper-arrow', ['class' => "swiperRealizacje__nav--next flex w-fit"])
        </div>
        <div class="col-span-full lg:col-span-11">
          @if ($query->have_posts())
          <div class="swiperRealizacje">
            <div class="swiper-wrapper">
              @while ($query->have_posts())
              @php $query->the_post() @endphp
              <div class="swiper-slide">
                <div class="realizacja relative" data-aos="fade-up">
                  <a href="@permalink">
                    <img class="aspect-[596/400] w-full h-full object-center object-cover" src="@thumbnail('full', false)" alt="">
                    <div class="absolute bg-gray-light bottom-0 left-0 min-h-[100px] w-[calc((442/596)*100%)] flex items-center z-10">
                      <div class="text-6xl text-black font-semibold">
                      <h2>@title</h2>
                      </div>
                    </div>
                    <div class="absolute opacity-0 transition-kaemde invisible w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
                      <span class="btn-primary">{!! __('Obejrzyj realizacje') !!}</span>
                    </div>
                  </a>
                </div>
              </div>
              @endwhile  
            </div>
          </div>
          @php wp_reset_postdata() @endphp
          @endif
        </div>
      </div>
        <div class="flex items-center justify-center space-x-4 w-full lg:hidden mt-5">
          @include('partials.swiper-arrow', ['class' => "swiperRealizacje__nav--prev-mobile transform rotate-180"])
          @include('partials.swiper-arrow', ['class' => "swiperRealizacje__nav--next-mobile "])
        </div>
      <div class="w-full mt-half lg:mt-full flex items-center justify-center" data-aos="fade-up">
        <a class="btn-primary" href="/realizacje/">{{ __('Zobacz wszystkie realizacje') }}</a>
      </div>
    </div>
  </section>