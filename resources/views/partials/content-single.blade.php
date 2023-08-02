@php

 $featured_image_url = get_the_post_thumbnail_url();
 $data = get_field('post');
 $featured_image_acf = get_field('featured_image');
 $post_title = $data['post_title'] ?? null;
 $columns = $data['post_columns'] ?? null;
 $column_1 = $columns['post_column_1'] ?? null;
 $column_2 = $columns['post_column_2'] ?? null;
 $post_type = get_post_class();
 $class = $post_type[1];
 $archive_url = wp_get_referer() ? wp_get_referer() : home_url();
 $group_field = get_field('post');

@endphp
<article {{post_class()}}>
    <div class="container">

      <div class="flex items-center justify-center lg:justify-between py-half lg:py-full flex-wrap lg:flex-nowrap">
        <div class="badge text-center w-full lg:w-auto"  data-aos="fade-up">
          <span>
            @if ($class == 'post')
            {!! __('Aktualności') !!}
            @else
            {!! __('REALIZACJE') !!}
            @endif
          </span>
        </div>
        <div class="lg:order-first date text-5xl font-semibold tracking-tightest mr-5 mt-5 lg:m-0"  data-aos="fade-up">
          <time class="updated uppercase" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
        </div>
        <a href="<?php echo esc_url($archive_url); ?>"  data-aos="fade-up">
          @include('partials.swiper-arrow', ['class' => "mt-5 lg:m-0 go-back-blog transform rotate-180", 'color' => "gray-light"])
        </a>
      </div>
      <div class="post__heading relative h-[640px] w-full lg:mb-full mb-half"  data-aos="fade-up">
        <div class="absolute top-0 left-0 w-full h-full">
            @if(!empty($featured_image_acf))
              <img class="object-cover w-full h-full object-center" src="{{ $featured_image_acf['url'] }}" alt="">
            @elseif (has_post_thumbnail())
              <img class="object-cover w-full h-full object-center" src="{{ $featured_image_url }}" alt="">
            @else
              <img class="object-cover w-full h-full object-center" src="@asset('images/hero-1.png')" alt="">
            @endif
        </div>
        <div class="absolute bg-white bottom-0 left-0 min-h-[200px]  lg:w-[calc((904/1828)*100%)] flex items-center">
          <div class="text-8xl text-black font-bold xl:pr-20 lg:pr-10 pr-5">
            <h1>@title</h1>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-5 lg:mt-full mt-half">
        <div class="xl:col-start-2 col-span-12 xl:col-span-10">
         
          @if ($data)
            @if(!empty($post_title))
              <div class="lg:mb-full mb-half"  data-aos="fade-up">
                {!! $post_title !!}
              </div>
            @endif
            @if(!empty($columns))
              <div class="grid grid-cols-12 gap-5">
                @if(!empty($column_1))
                  <div class="col-span-12 lg:col-span-6"  data-aos="fade-up">
                    {!! $column_1 !!}
                  </div>
                @endif
                @if(!empty($column_2))
                  <div class="col-span-12 lg:col-span-6">
                    <div class="img w-fit h-fit shadow-cien-2"  data-aos="fade-up">
                      <img src=" {!! $column_2['url'] !!}" alt=" {!! $column_2['alt'] !!}">
                    </div>
                  </div>
                @endif
              </div>
            @endif
          @endif

          @if(empty($post_title || $column_1 || $column_2))
            @php(the_content())
          @endif
        
        </div>
      </div>
    </div>
</article>
@if ($class == 'post' || $class == 'realizacje')
  @include('partials.latest-posts', ['post_type' => $class])
@endif
