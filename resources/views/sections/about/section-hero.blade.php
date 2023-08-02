@php

$hero = $data['hero'] ?? null;
$leftG = $hero['left'] ?? null;
$title = $leftG['title'] ?? null;
$content = $leftG['content'] ?? null;
$content_2  = $leftG['content2'] ?? null;
$link = $leftG['link'] ?? null;

$rightG = $hero['right'] ?? null;

@endphp


@if (!empty($hero))
<section class="about__hero overflow-hidden">
    <div class="container">
        <div class="grid grid-cols-12 gap-5 xl:overflow-hidden relative py-half lg:py-full">
            <div class="hidden lg:block  absolute bg-white w-[calc(((154/1828)*100%)+20px)] h-full -right-5 top-0 z-[1]"></div>
            @if (!empty($leftG))
            <div class="col-span-full lg:col-span-6">
                <div class="py-10 relative mb-10">
                    <div class="absolute bg-gray-light w-[300%] h-full top-0 -left-5 xl:right-0"></div>
                    <div class="lg:grid lg:grid-cols-6">
                        <div class="xl:col-start-2 xl:col-span-5 lg:col-span-6 relative z-10" data-aos="fade-up">
                            @if (!empty($title))
                            <div class="text-9xl font-extrabold">
                                {!! $title !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="lg:grid lg:grid-cols-6">
                    <div class="xl:col-start-2 xl:col-span-5 lg:col-span-6 relative z-10">
                        @if (!empty($content))
                        <div class="text-6xl font-semibold" data-aos="fade-up">
                            {!! $content !!}
                        </div>
                        @endif
                        @if (!empty($content_2))
                        <div class="text-desc mt-half" data-aos="fade-up">
                            {!! $content_2 !!}
                        </div>
                        @endif
                        @if (!empty($link))
                        <div class="inline-flex mt-30 w-full justify-center lg:justify-start" data-aos="fade-up">
                            <a href="{{ $link['url'] }}" class="btn-primary">{{ $link['title'] }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @if (!empty($rightG))
            <div class="lg:col-span-6 col-span-full grid lg:grid-cols-6 grid-cols-12 gap-5 relative z-10 h-fit">
               
                <div class="col-span-1 flex items-center justify-end">
                    @include('partials.swiper-arrow', ['class' => "swiperAbout__nav--prev transform rotate-180 relative left-10 lg:left-0 z-10", 'color' => "gray-light"])
                    
                </div>
                <div class="col-span-10 lg:col-span-4 relative drop-shadow-cien-2 ">
                    <div class="swiperAbout relative overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($rightG as $item)
                            @php
                                $image = $item['image']['url'] ?? null;
                            @endphp
                            <div class="swiper-slide" data-aos="fade-up">
                                <img class="aspect-[596/640] object-center object-cover w-full h-full" src="{{ $image }}" alt="">
                            </div>
                            @endforeach
                            
                        </div>

                    </div>
                </div>
                <div class="col-span-1 flex items-center justify-start" data-aos="fade-up">
                    @include('partials.swiper-arrow', ['class' => "swiperAbout__nav--next relative right-10 lg:right-0 z-10", 'color' => "gray-light"])
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
