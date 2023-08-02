@php
$heros = get_field('heros');

$class_box_1 = 'box w-fit bg-black xl:pl-10 xl:pr-10 lg:pr-full xl:py-10 p-5 flex lg:min-h-[400px] items-center relative z-10';
$class_content_1 = 'text-7xl lg:text-9xl font-extrabold text-white slide-text';

$class_box_2 = 'box w-full bg-black p-5 lg:px-10 lg:py-10 flex flex-col lg:min-h-[400px] relative z-10';
$class_content_2 = 'text-7xl lg:text-9xl font-extrabold text-white mb-auto slide-text space-y-2.5';

@endphp
@if (!empty($heros))
<section class="home__hero relative">
   <div class="absolute bg-gray-light w-full h-[calc(50%+40px)] left-0 bottom-0"></div>
   <div class="container">
      <div class="swiperHero">
         <div class="swiper-wrapper">
            @php
            $i = 0;
            @endphp
            @foreach ($heros as $hero)
            @php
              $image = $hero['hero_image']['url'];
              $content = $hero['hero_content'];
              $links = $hero['hero_links'];

            @endphp
            <div class="swiper-slide relative !h-[calc(100vh-142px)] xl:h-auto xl:min-h-[800px] pb-10 {{$i}}">
                @if (!empty($image))
                <div class="absolute w-full h-full top-0 left-0 z-[0]">
                    <img class="w-full h-full object-center object-cover" src="{{ $image }}" alt="">
                </div>
                @else
                <div class="absolute w-full h-full top-0 left-0 z-[0]">
                    <img class="w-full h-full object-center" src="@asset('images/hero/hero-1.png')" alt="">
                </div>
                @endif
               <div class="grid grid-cols-12 lg:ml-10 ml-5 mr-5 lg:mr-0 h-full">
                  <div class="col-span-full lg:col-span-7 4xl:col-span-5 flex items-end pb-20 lg:pb-0">
                     <div class="w-fit @if ($i === 0) {{ $class_box_1 }} @else {{$class_box_2}} @endif">
                        @if (!empty($content))
                        <div class="@if ($i === 0) {{ $class_content_1 }} @else {{ $class_content_2 }} @endif" data-swiper-parallax="300">
                           {!! $content !!}
                        </div>
                        @endif
                        @if (!empty($links))
                        <div class="flex items-center slide-btns space-x-5 mt-6" data-swiper-parallax="400">
                           @foreach ($links as $link)
                           @php
                           $url = $link['hero_link']['url'];
                           @endphp
                           <a href="{{ $url }}" class="btn-primary !min-w-[200px]">
                           {!! __('Zobacz ofertę') !!}
                           </a>
                           @endforeach
                        </div>
                        @endif
                     </div>
                     
                  </div>
               </div>
            </div>
            @php $i++; @endphp
            @endforeach
         </div>
         <div class="swiper-nav flex items-center justify-center space-x-5 absolute bottom-5 right-5 lg:bottom-10 lg:right-10 z-10 ">
            @include('partials.swiper-arrow', ['class' => "heroSwiper__nav--prev transform rotate-180"])
            @include('partials.swiper-arrow', ['class' => "heroSwiper__nav--next"])
         </div>
      </div>
   </div>
</section>
@endif