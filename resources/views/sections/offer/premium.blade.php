@php

$premium = $data['offer_premium'] ?? null;
$premium_title = $premium['title'] ?? null;
$premium_content = $premium['content'] ?? null;

$systemy_przesuwne = $premium['systemy-przesuwne'] ?? null;
$systemy_fasadowe = $premium['systemy-fasadowe'] ?? null;
$ozdobne_drzwi_wejsciowe = $premium['ozdobne-drzwi'] ?? null;
$systemy_okienno_drzwiowe = $premium['systemy-okienno'] ?? null;

@endphp

@if (!empty($premium))
<section id="stolarka-premium" class="offer__tabs offer__tabs--premium mb-half lg:mb-full relative">
    
    <div class="container relative">
        <div class="absolute bg-gray-light h-full left-0 right-0 mx-auto top-0 w-[calc((1520/1868)*100%)]">
        </div>
        <div class="grid grid-cols-12 gap-x-5 relative z-10 pt-half lg:pt-full">
            <div class="col-span-full md:col-span-8 md:col-start-3 mb-half lg:mb-full text-center">
                @if (!empty($premium_title))
                <div class="text-8xl font-bold mb-5 lg:mb-10"  data-aos="fade-up">
                    {!! $premium_title !!}
                </div>
                @endif
                @if (!empty($premium_content))
                <div class="lg:text-desc text-base text-gray"  data-aos="fade-up">
                    {!! $premium_content !!}
                </div>
                @endif
            </div>
           
            <div class="col-span-full grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
               
                @if (!empty($systemy_przesuwne))
                @php
                    $content_przesuwne = $systemy_przesuwne['content'] ?? null;
                    $image_przesuwne = $systemy_przesuwne['image']['url'] ?? null;
                    $elements_przesuwne = $systemy_przesuwne['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_przesuwne) }}" class="active col-span-1 tab-header" data-tab="{{ sanitize_title($content_przesuwne) }}"  data-aos="fade-up"> 
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_przesuwne))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_przesuwne !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_przesuwne))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_przesuwne }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($systemy_fasadowe))
                @php
                    $content_fasadowe = $systemy_fasadowe['content'] ?? null;
                    $image_fasadowe = $systemy_fasadowe['image']['url'] ?? null;
                    $elements_fasadowe = $systemy_fasadowe['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_fasadowe) }}"  class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_fasadowe) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_fasadowe))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_fasadowe !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_fasadowe))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_fasadowe }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($ozdobne_drzwi_wejsciowe))
                @php
                    $content_ozdobne = $ozdobne_drzwi_wejsciowe['content'] ?? null;
                    $image_ozdobne = $ozdobne_drzwi_wejsciowe['image']['url'] ?? null;
                    $elements_ozdobne = $ozdobne_drzwi_wejsciowe['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_ozdobne) }}"  class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_ozdobne) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_ozdobne))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_ozdobne !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_ozdobne))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_ozdobne }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($systemy_okienno_drzwiowe))
                @php
                    $content_okienno = $systemy_okienno_drzwiowe['content'] ?? null;
                    $image_okienno = $systemy_okienno_drzwiowe['image']['url'] ?? null;
                    $elements_okienno = $systemy_okienno_drzwiowe['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_okienno) }}"  class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_okienno) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_okienno))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_okienno !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_okienno))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_okienno }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            {{-- slider --}}
            <div class="lg:col-start-2 lg:col-span-10 col-span-full">
                @if (!empty($elements_przesuwne))
                <div id="{{ sanitize_title($content_przesuwne) }}" class="active swiper-container tab-content" data-tab="{{ sanitize_title($content_przesuwne) }}">
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_przesuwne as $element)
                        @include('sections.offer.swiper-slide')
                        @endforeach
                      </div>
                    </div>
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next $right_button"])
                    <div class="flex items-center justify-center space-x-4 w-full lg:hidden pb-10 swiperContainButtonsMobile">
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev-mobile transform rotate-180"])
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next-mobile "])
                    </div>
                </div> 
                @endif
                @if (!empty($elements_fasadowe))
                <div id="{{ sanitize_title($content_fasadowe) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_fasadowe) }}">
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_fasadowe as $element)
                        @include('sections.offer.swiper-slide')
                        @endforeach
                      </div>
                    </div>
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next $right_button"])
                    <div class="flex items-center justify-center space-x-4 w-full lg:hidden pb-10 swiperContainButtonsMobile">
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev-mobile transform rotate-180"])
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next-mobile "])
                    </div>
                </div>
                @endif
                @if (!empty( $elements_ozdobne))
                <div id="{{ sanitize_title($content_ozdobne) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_ozdobne) }}">
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_ozdobne as $element)
                        @include('sections.offer.swiper-slide')
                        @endforeach
                      </div>
                    </div>
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next $right_button"])
                    <div class="flex items-center justify-center space-x-4 w-full lg:hidden pb-10 swiperContainButtonsMobile">
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev-mobile transform rotate-180"])
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next-mobile "])
                    </div>
                </div>
                @endif
                @if (!empty( $elements_okienno))
                <div id="{{ sanitize_title($content_okienno) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_okienno) }}">
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_okienno as $element)
                        @include('sections.offer.swiper-slide')
                        @endforeach
                      </div>
                    </div>
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next $right_button"])
                    <div class="flex items-center justify-center space-x-4 w-full lg:hidden pb-10 swiperContainButtonsMobile">
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev-mobile transform rotate-180"])
                      @include('partials.swiper-arrow', ['class' => "swiperContain__nav--next-mobile "])
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif