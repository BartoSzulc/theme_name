@php


$image = $block['image']['url'] ?? null;
$title = $block['title'] ?? null;
$subtitle = $block['subtitle'] ?? null;
$content = $block['content'] ?? null;


@endphp

<div class="grid grid-cols-8 gap-5 lg:mb-half mb-30">
    <div class="lg:col-span-3 col-span-full">
        <img src="{{ $image }}" alt="">
    </div>
    <div class="lg:col-start-5 lg:col-span-4 col-span-full flex flex-col space-y-30 lg:space-y-half">
        <div class="text-primary text-8xl font-bold">
            <h1>
                @if ($title)
                    {!! $title !!}
                @else 
                    @title
                @endif
            </h2>
        </div>
        @if (!empty($subtitle))
        <div class="text-6xl uppercase text-black">
            <h2>
                {!! $subtitle !!}
            </h2>
        </div>
        @endif
        @if (!empty($content))
        <div class="text-gray lg:text-desc text-base">
            {!! $content !!}
        </div>
        @endif
    </div>
</div>