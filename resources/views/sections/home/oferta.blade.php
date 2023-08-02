@php
    
$data = get_field('offer');
$badge = $data['badge'] ?? null;

$left = $data['left'] ?? null;
$title_l = $left['title'] ?? null;
$content_l = $left['content'] ?? null;
$link_l = $left['link'] ?? null;
$elements_l = $left['elements'] ?? null;

$right = $data['right'] ?? null;
$title_r = $right['title'] ?? null;
$content_r = $right['content'] ?? null;
$link_r = $right['link'] ?? null;
$elements_r = $right['elements'] ?? null;

@endphp

@if (!empty($data))
<section class="home__oferta bg-gray-light pb-half lg:pb-full">
    <div class="container">
      @if (!empty($badge))
      <div class="badge py-half lg:py-full w-full text-center" data-aos="fade-up">
        {!! $badge !!}
      </div>
      @endif
      <div class="grid grid-cols-12 gap-5">
        @if (!empty($left))
          <div class="col-span-full md:grid-cols-2 xl:col-span-6 3xl:col-span-5 grid 3xl:grid-cols-5 xl:grid-cols-6 gap-5 elements">
            <div class="col-span-1 xl:col-span-3 3xl:col-span-3 lg:space-y-10 space-y-5">
              @if (!empty($elements_l))
              @foreach ($elements_l as $element)
                @php
                $title = $element['title'] ?? null;
                $image = $element['image'] ?? null;
                $link = $element['link'] ?? null;
                @endphp
              <div class="img relative max-h-[140px] home__oferta--box group" data-aos="fade-up">
                <a class="flex items-center transition-kaemde hover:shadow-cien-1" href="{{ $link }}">
                  <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                    {!! $title !!}
                  </div>
                  <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                  <img class="w-full h-full object-cover max-h-[140px] object-center" src="{{ $image['url'] }}" alt="">
                  <div class="hover-box absolute bg-primary opacity-0 transition-kaemde">
                    @svg('images.right-arrow')
                  </div>
                </a>
              </div>
              @endforeach
              @endif
            </div>
            <div class="order-first md:order-last col-span-1 xl:col-span-3 3xl:col-span-2 flex flex-col">
              @if (!empty($title_l))
              <div class="4xl:text-8xl lg:text-6xl text-6xl font-bold mb-5 lg:mb-10 title" data-aos="fade-up">
                {!! $title_l !!}
              </div>
              @endif
              @if (!empty($content_l))
              <div class="text-desc text-gray" data-aos="fade-up">
                {!! $content_l !!}
              </div>
              @endif
              
              @if (!empty($link_l))
              <div class="inline-flex lg:mt-auto mt-5" data-aos="fade-up">
                <a class="btn-primary" href="{{ $link_l['url'] }}">{{ $link_l['title'] }}</a>
              </div>
              @endif
            </div>
          </div>
          @endif
          @if (!empty($right))
          <div class="mt-half lg:mt-0 md:grid-cols-2 col-span-full xl:col-span-6 xl:grid-cols-6 3xl:col-start-7 3xl:col-span-5 grid 3xl:grid-cols-5 gap-5 elements">
            <div class="col-span-1  xl:col-span-3 lg:space-y-10 space-y-5">
              @if (!empty($elements_r))
              @foreach ($elements_r as $element)
                @php
                $title = $element['title'] ?? null;
                $image = $element['image'] ?? null;
                $link = $element['link'] ?? null;
                @endphp
              <div class="img relative max-h-[140px] home__oferta--box group" data-aos="fade-up">
                <a class="flex items-center transition-kaemde hover:shadow-cien-1" href="{{ $link }}">
                  <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                    {!! $title !!}
                  </div>
                  <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                  <img class="w-full h-full object-cover max-h-[140px] object-center" src="{{ $image['url'] }}" alt="">
                  <div class="hover-box absolute bg-primary opacity-0 transition-kaemde">
                    @svg('images.right-arrow')
                  </div>
                </a>
              </div>
              @endforeach
              @endif
              
            </div>
            <div class="order-first md:order-last col-span-1 xl:col-span-3 2xl:col-span-2 flex flex-col">
              @if (!empty($title_r))
              <div class="4xl:text-8xl lg:text-6xl text-6xl font-bold mb-5 lg:mb-10 title" data-aos="fade-up">
                {!! $title_r !!}
              </div>
              @endif
              @if (!empty($content_r))
              <div class="text-desc text-gray" data-aos="fade-up">
                {!! $content_r !!}
              </div>
              @endif
              
              @if (!empty($link_r))
              <div class="inline-flex lg:mt-auto mt-5" data-aos="fade-up">
                <a class="btn-primary" href="{{ $link_r['url'] }}">{{ $link_r['title'] }}</a>
              </div>
              @endif
            </div>
          </div>
          @endif
      </div>
    </div>
</section>
@endif
  
