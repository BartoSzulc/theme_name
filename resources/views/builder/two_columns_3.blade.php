@php

$column_1 = $block['column_1'] ?? null;

$title = $column_1['title'] ?? null;
$image = $column_1['image']['url'] ?? null;
$content = $column_1['content'] ?? null;

$column_2 = $block['column_2'] ?? null;

$title_2 = $column_2['title'] ?? null;
$image_2 = $column_2['image']['url'] ?? null;
$content_2 = $column_2['content'] ?? null

@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:my-full my-half text-center">
    
    @if (!empty($column_1))
        <div class="col-span-1 flex flex-col space-y-30">
            @if (!empty($title))
            <div class="text-6xl uppercase text-black font-bold tracking-tightest">
                <h2>{!! $title !!}</h2>
            </div>
            @endif
            @if (!empty($image))
            <div class="w-full">
                <a class="glightbox" href="{{ $image }}">
                    <img class="mx-auto" src="{{ $image }}" alt="">
                </a>
            </div>
            @endif
            @if (!empty($content))
            <div class="w-full text-gray lg:text-desc text-base">
                {!! $content !!}
            </div>
            @endif
        </div>
    @endif
    @if (!empty($column_2))
        <div class="col-span-1 flex flex-col space-y-30">
            @if (!empty($title_2))
            <div class="text-6xl uppercase text-black font-bold tracking-tightest">
                <h2>{!! $title_2 !!}</h2>
            </div>
            @endif
            @if (!empty($image_2))
            <div class="w-full">
                <a class="glightbox" href="{{ $image_2 }}">
                    <img class="mx-auto" src="{{ $image_2 }}" alt="">
                </a>
            </div>
            @endif
            @if (!empty($content_2))
            <div class="w-full text-gray lg:text-desc text-base">
                {!! $content_2 !!}
            </div>
            @endif
        </div>
    @endif
</div>