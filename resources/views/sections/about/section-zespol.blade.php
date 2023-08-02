@php
    $team = $data['team'] ?? null;
    $right = $team['right'] ?? null;
    $title = $right['title'] ?? null;
    $subtitle = $right['subtitle'] ?? null;
    $content = $right['content'] ?? null;
    $links = $right['links'] ?? null;

    $image = $team['image']['url'] ?? null;
@endphp
@if (!empty($team))
<section class="about__section py-half lg:pb-full bg-gray-light relative z-10">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-start-2 xl:col-span-10 col-span-12 grid grid-cols-10 gap-5 relative">
                <div class="xl:col-span-4 lg:col-span-5 col-span-full flex flex-col justify-center">
                    @if (!empty($title))
                    <div class="badge mb-30 lg:mb-half w-full 4xl:whitespace-nowrap"  data-aos="fade-up">
                       {!! $title !!}
                    </div>
                    @endif
                    @if (!empty($subtitle))
                    <div class="text-5xl font-semibold mb-30 lg:mb-half"  data-aos="fade-up">
                        {!! $subtitle !!}
                    </div>
                    @endif
                    @if (!empty($content))
                    <div class="text-desc text-gray"  data-aos="fade-up">
                       {!! $content !!}
                    </div>
                    @endif
                    @if (!empty($links))
                    <div class="btn mt-auto pt-30 lg:pt-half flex flex-wrap gap-5 items-center justify-center lg:justify-start">
                        @foreach ($links as $item)
                        
                        @php
                            $link = $item['link'] ?? null;
                        @endphp
                        <a href="{{$link['url']}}" class="btn-primary"  data-aos="fade-up"> {{$link['title']}}</a>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="xl:col-start-6 xl:col-span-5 lg:col-span-5 col-span-full flex items-center justify-center lg:justify-start">
                    
                    <div class="relative overflow-hidden drop-shadow-cien-2"  data-aos="fade-up">
                        <img class="aspect-[750/560] object-center object-cover" src="{{$image}}" alt="">
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</section>
@endif