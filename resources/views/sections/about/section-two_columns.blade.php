
@php
    $twocolumns = $data['twocolumns'] ?? null;
    $title = $twocolumns['title'] ?? null;
    $kolumna_1 = $twocolumns['kolumna_1'] ?? null;
    $kolumna_2 = $twocolumns['kolumna_2'] ?? null;

    $links = $twocolumns['links'] ?? null;
@endphp
@if (!empty($twocolumns))

<section class="about__section pb-half lg:pb-full bg-gray-light">
    <div class="container">
       
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-span-10 xl:col-start-2 col-span-full">
                @if (!empty($title))
                <div class="col-span-full w-full text-7xl mb-30 font-semibold"  data-aos="fade-up">
                   {!! $title !!}
                </div>
                @endif
                <div class="grid grid-cols-2 gap-5">

                    <div class="col-span-1 text-base lg:text-desc text-gray"  data-aos="fade-up">
                        {!! $kolumna_1 !!}
                    </div>
                    <div class="col-span-1 text-base lg:text-desc text-gray"  data-aos="fade-up">
                        {!! $kolumna_2 !!}
                    </div>
                </div>
                @if (!empty($links))
                <div class="col-span-full flex flex-wrap gap-5 mt-half items-center justify-center">
                    @foreach ($links as $item)
                        
                    @php
                        $link = $item['link'] ?? null;
                    @endphp
                    <a href="{{$link['url']}}" class="btn-primary"  data-aos="fade-up">{{$link['title']}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif