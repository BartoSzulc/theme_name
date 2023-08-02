@php

$column_1 = $block['column_1'] ?? null;

$title = $column_1['title'] ?? null;
$content = $column_1['content'] ?? null;

$column_2 = $block['column_2'] ?? null;

@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:my-full my-half">
    @if (!empty($column_2))
        <div class="col-span-1 flex flex-col lg:space-y-half space-y-30">
            @foreach ($column_2 as $item)
                @php
                    $image = $item['image']['url'] ?? null;
                @endphp
                <img src="{{ $image }}" alt="">
            @endforeach
        </div>
    @endif
    @if (!empty($column_1))
        <div class="col-span-1 flex flex-col lg:space-y-half space-y-30">
            @if (!empty($title))
            <div class="text-5xl uppercase text-black font-semibold tracking-tightest">
                <h2>{!! $title !!}</h2>
            </div>
            @endif
            @if (!empty($content))
            <div class="w-full text-gray lg:text-desc text-base">
                {!! $content !!}
            </div>
            @endif
        </div>
    @endif
</div>