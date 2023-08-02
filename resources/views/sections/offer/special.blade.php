@php

$standard = $data['offer_standard'] ?? null;
$standard_title = $standard['title'] ?? null;
$standard_content = $standard['content'] ?? null;

$systemy_przeciwpozarowe = $standard['systemy-przeciw'] ?? null;
$systemy_dymoszczelne = $standard['systemy-dymoszczelne'] ?? null;
$systemy_ewakuacyjne = $standard['systemy-ewakuacyjne'] ?? null;
$systemy_oddymiajace = $standard['systemy-oddymiajace'] ?? null;


@endphp

@if (!empty($standard))
<section id="stolarka-specjalistyczna" class="offer__tabs offer__tabs--special mb-half lg:mb-full relative">
    
    <div class="container relative">
        <div class="absolute bg-gray-light h-full left-0 right-0 mx-auto top-0 w-[calc((1520/1868)*100%)]">
        </div>
        <div class="grid grid-cols-12 gap-x-5 relative z-10 pt-half lg:pt-full">
            <div class="col-span-full md:col-span-8 md:col-start-3 mb-half lg:mb-full text-center" >
                @if (!empty($standard_title))
                <div class="text-8xl font-bold mb-5 lg:mb-10"  data-aos="fade-up">
                    {!! $standard_title !!}
                </div>
                @endif
              
                @if (!empty($standard_content))
                <div class="lg:text-desc text-base text-gray"  data-aos="fade-up">
                    {!! $standard_content !!}
                </div>
                @endif
            
            </div>
           
            <div class="col-span-full grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
               
                @if (!empty($systemy_przeciwpozarowe))
                @php
                    $content_przeciwpozarowe = $systemy_przeciwpozarowe['content'] ?? null;
                    $image_przeciwpozarowe = $systemy_przeciwpozarowe['image']['url'] ?? null;
                    $elements_przeciwpozarowe = $systemy_przeciwpozarowe['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_przeciwpozarowe) }}" class="active col-span-1 tab-header" data-tab="{{ sanitize_title($content_przeciwpozarowe) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_przeciwpozarowe))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_przeciwpozarowe !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_przeciwpozarowe))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_przeciwpozarowe }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($systemy_dymoszczelne))
                @php
                    $content_dymoszczelne = $systemy_dymoszczelne['content'] ?? null;
                    $image_dymoszczelne = $systemy_dymoszczelne['image']['url'] ?? null;
                    $elements_dymoszczelne = $systemy_dymoszczelne['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_dymoszczelne) }}" class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_dymoszczelne) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_dymoszczelne))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_dymoszczelne !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_dymoszczelne))
                          <img class="w-full h-full object-cover object-center" src="{{ $image_dymoszczelne }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($systemy_ewakuacyjne))
                @php
                    $content_ewakuacyjne = $systemy_ewakuacyjne['content'] ?? null;
                    $image_ewakuacyjne = $systemy_ewakuacyjne['image']['url'] ?? null;
                    $elements_ewakuacyjne = $systemy_ewakuacyjne['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_ewakuacyjne) }}" class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_ewakuacyjne) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_ewakuacyjne))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_ewakuacyjne !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_ewakuacyjne))
                          <img class="w-full h-full object-cover object-[50%,58%]" src="{{ $image_ewakuacyjne }}" alt="">
                          @endif
                          <div class="hover-box absolute bg-primary transition-kaemde">
                            @svg('images/down-arrow')
                          </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($systemy_oddymiajace))
                @php
                    $content_oddymiajace = $systemy_oddymiajace['content'] ?? null;
                    $image_oddymiajace = $systemy_oddymiajace['image']['url'] ?? null;
                    $elements_oddymiajace = $systemy_oddymiajace['elements_slider'] ?? null;
                @endphp
                <div id="{{ sanitize_title($content_oddymiajace) }}" class="col-span-1 tab-header" data-tab="{{ sanitize_title($content_oddymiajace) }}"  data-aos="fade-up">
                    <div class="img relative home__oferta--box group">
                        <div class="flex items-center transition-kaemde hover:shadow-cien-1 cursor-pointer">
                            @if (!empty($content_oddymiajace))
                            <div class="text-5xl text-white pl-30 z-10 uppercase tracking-tightest font-semibold absolute">
                                {!! $content_oddymiajace !!}
                            </div>
                            @endif
                          <div class="absolute bg-black/50 top-0 left-0 w-full h-full"></div>
                          @if (!empty($image_oddymiajace))
                          <img class="w-full h-full object-cover object-top" src="{{ $image_oddymiajace }}" alt="">
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
                @if (!empty($elements_przeciwpozarowe))
                <div id="{{ sanitize_title($content_przeciwpozarowe) }}" class="active swiper-container tab-content" data-tab="{{ sanitize_title($content_przeciwpozarowe) }}">
                    
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_przeciwpozarowe as $element)
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
                @if (!empty($elements_dymoszczelne))
                <div id="{{ sanitize_title($content_dymoszczelne) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_dymoszczelne) }}">
                    
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_dymoszczelne as $element)
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
                @if (!empty($elements_ewakuacyjne))
                <div id="{{ sanitize_title($content_ewakuacyjne) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_ewakuacyjne) }}">
                    
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_ewakuacyjne as $element)
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
                @if (!empty($elements_oddymiajace))
                <div id="{{ sanitize_title($content_oddymiajace) }}" class="swiper-container tab-content" data-tab="{{ sanitize_title($content_oddymiajace) }}">
                    
                    @include('partials.swiper-arrow', ['class' => "swiperContain__nav--prev transform rotate-180 $left_button"])
                    
                    <div class="swiperContain">
                      <div class="swiper-wrapper">
                        @foreach ($elements_oddymiajace as $element)
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