@php
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 3,
);
$query = new WP_Query( $args );
@endphp

@if ($query->have_posts())
<section class="home__blog bg-gray-light pb-half | lg:pb-full">
  <div class="container relative">
    <div class="absolute bg-white w-[calc((1520/1868)*100%)] h-[calc(100%-30px)] left-0 right-0 top-0 mx-auto z-0"></div>
    <div class="w-full badge  text-center relative z-10 py-half | lg:py-full" data-aos="fade-up">
      <h2>{!! __('Bądź na bieżąco') !!}</h2>
    </div>
    <div class="grid gap-5 grid-cols-1 | lg:grid-cols-3">
      @while ($query->have_posts())
      @php
      $query->the_post();
      @endphp
      <div class="col-span-1 w-fit lg:w-auto mx-auto" data-aos="fade-up">
        <div class="blog relative">
          <a href="@permalink">
            <img class="mx-auto" src="@thumbnail('full', false)" alt="">
            <div class="absolute opacity-0 transition-kaemde w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
              <span class="btn-primary">{!! __('Przeczytaj więcej') !!}</span>
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
    <div class="w-full flex items-center justify-center mt-half lg:mt-full" data-aos="fade-up">
      <a href="/aktualnosci/" class="btn-primary">{!! __('Zobacz wszystkie') !!}</a>
    </div>
  </div>
</section>
@endif
