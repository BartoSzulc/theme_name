@php

$title = $block['title'] ?? null;
$content = $block['content'] ?? null;

@endphp

<div class="lg:my-half my-30 relative z-10">
    @if (!empty($title))
    <div class="text-5xl uppercase text-black font-semibold tracking-tightest lg:mb-half mb-30">
        <h2>{!! $title !!}</h2>
    </div>
    @endif
    @if (!empty($content))
    <div class="w-full text-gray lg:text-desc text-base">
        {!! $content !!}
    </div>
    @endif
</div>
