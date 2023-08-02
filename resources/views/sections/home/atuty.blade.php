@php

$data = get_field('advantages');
$tiles = $data['tiles'] ?? null;
$counters = $data['counters'] ?? null;
$form = $data['form'] ?? null;

$badge = $form['badge'] ?? null;
$title = $form['title'] ?? null;
$shortcode = $form['shortcode'] ?? null;

@endphp

@if ($data)
<section class="home-atuty relative w-full pt-half bg-gray-light rounded-absolute">
    <div class="container relative z-10">
        @if ($tiles)
        <div class="flex flex-wrap items justify-center">
            @foreach ($tiles as $tile)
            <div class="item w-full sm:w-1/2 lg:w-1/5 relative flex flex-col items-center py-half" data-aos="fade-up">
                @if ($tile['image'])
                <div class="item-icon bg-primary rounded p-5 w-fit h-fit">
                    <img class="item-icon--img" src="{{ $tile['image']['url'] }}" alt="">
                </div>
                @endif
                @if ($tile['title'])
                <div class="text-5xl mt-[30px] block text-center">
                    {!! $tile['title'] !!}
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
        @if ($counters)
        <div class="counters md:mt-half relative" data-aos="fade-up">
            <div class="lg:grid grid-cols-12 absolute h-full w-full hidden ">
                <div class="w-full h-px bg-gray opacity-50 absolute z-10 top-1/2 -translate-y-1/2"></div>
                <div class="col-span-1"></div>
                <div class="col-span-2 bg-gray-light z-10"></div>
                <div class="col-span-2"></div>
                <div class="col-span-2 bg-gray-light z-10"></div>
                <div class="col-span-2"></div>
                <div class="col-span-2 bg-gray-light z-10"></div>
                <div class="col-span-1"></div>
            </div>
            <div class="grid grid-cols-12 gap-5 relative z-20">
                @foreach ($counters as $counter)
                <div class="col-span-full lg:col-span-4  text-center">
                    @if ($counter['number'])
                    <div class="text-8xl text-primary heading">
                        <p>{{ $counter['number'] }}</p>
                    </div>
                    @endif
                    @if ($counter['text'])
                    <div class="text-5xl mt-2.5">
                        <p>{{ $counter['text'] }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @if ($form)
        <div id="formularz" class="form md:py-full py-half" data-aos="fade-up">
            <div class="text-center">
                @if ($badge)
                    <span class="badge">{{ $badge }}</span>
                @endif
                @if ($title)
                <div class="my-half text-8xl heading">
                    <h2>{!! $title !!}</h2>
                </div>
                @endif
                @if ($shortcode)
                    {!! do_shortcode($shortcode) !!}
                @endif
            </div>
        </div>
        @endif
    </div>
</section>
@endif