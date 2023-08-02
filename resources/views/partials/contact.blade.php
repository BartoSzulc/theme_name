@php
    $data = get_field('contact', 'option');
    $badge = $data['badge'] ?? null;
    $title = $data['title'] ?? null;
    $subtitle = $data['subtitle'] ?? null;
    $phone = $data['phone'] ?? null;
    $shortcode = $data['shortcode'] ?? null;
@endphp

<div id="contact" class="relative z-10 kontakt-section bg-white py-half lg:py-full">
    <div class="absolute w-full h-[calc((533/912)*100%)] left-0 top-0 bg-gray-light z-0">
    </div>
    <div class="container">
        <div class="relative grid grid-cols-12 ">
            <div class="col-span-full 4xl:col-span-10 4xl:col-start-2">
                @if(!empty($badge))
                    <div class="w-full badge pb-half lg:pb-full text-center" data-aos="fade-up">
                        <h2>{{ $badge }}</h2>
                </div>
                @endif
                <div class="relative z-10 grid grid-cols-10 gap-5 bg-gray p-5 xl:p-half shadow-cien-1 ">
                    <div class="col-span-full lg:col-span-5">
                        @if (!empty($title))
                        <div class="mb-2.5 text-5xl xl:text-6xl font-semibold text-primary" data-aos="fade-up">
                            <h3>{{ $title }}</h3>
                        </div>
                        @endif
                        @if (!empty($subtitle) || !empty($phone))
                        <div class="font-semibold text-white text-6xl xl:text-7xl xl:mb-30 " data-aos="fade-up">
                            <h4>{{ $subtitle }}<a class="transition-kaemde hover:text-primary" href="tel:502 334 110">{{ $phone }}</a> </h4>
                        </div>
                        @endif
                        @if (!empty($shortcode))
                        {!! do_shortcode($shortcode) !!}
                        @endif
                    </div>
                    <div class="hidden lg:block col-span-full relative lg:col-span-5" data-aos="fade-up">
                        <img class="absolute z-0 -bottom-30 xl:-bottom-half" src="@asset('images/kaemde-kontakt.png')" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>